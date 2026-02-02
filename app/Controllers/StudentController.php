<?php

namespace App\Controllers;
use App\Models\BaseModel;
use App\Models\CartModel;
use App\Models\StudentDashboardModel;
use App\Models\StudentModel;
class StudentController extends BaseController{
	protected $common;
	protected $cartModel;
	protected $studentModel;
	private $studentDashboardModel;
	private $errorMsg;
	public function __construct()
	{
		$this->common = new BaseModel();
		$this->cartModel = new CartModel();
		$this->studentModel = new StudentModel();
		$this->studentDashboardModel = new StudentDashboardModel();
		$this->errorMsg = array('success'=>false,'message'=>'Something went wrong, please contact with admin');
	}
	public function loadIndex(){
		$data['fetchNotice'] = $this->common->getInfo('notice_table','row',array(),'notice_id desc');
		$data['fetchLevels'] = $this->studentModel->fetchLevelModel();
		$fetchedTypes = $this->studentModel->fetchtypeModel();
		$existArray = array();
		$data['fetchedTypes'] = array();
		foreach ($fetchedTypes as $value) {
			if (!in_array($value['level_id'], $existArray) && (count($data['fetchedTypes']) < 3)) {
				array_push($existArray, $value['level_id']);
				array_push($data['fetchedTypes'], $value);
			}
		}
		$cartDetails = json_decode($this->getCartDetails());
		$data['cartCount'] = count($cartDetails);
		// $data['blog_items'] = $this->common->getInfo('blog_table','',array('deleted'=>0,'active'=>1));
		$data['blog_items'] = $this->studentModel->fetchBlogList(3);
		return view('student/index',$data);
	}

	public function loadBlogListPage(){
		$data['blog_items'] = $this->studentModel->fetchBlogList();
		$data['fetchLevels'] = $this->studentModel->fetchLevelModel();
		return view('student/blog_list',$data);
	}

	public function loadImportantLinkPage() {
		$data['fetchLevels'] = $this->studentModel->fetchLevelModel();
		return view('student/important_link',$data);
	}
	public function loadSignInPage()
	{
		$data['addClass'] = 'sign_in';
		return view('auth/student_auth',$data);
	}

	public function loadSignUpPage()
	{
		$data['addClass'] = 'sign_up';
		$data['level_list'] = $this->common->getInfo('level_table','array',array('deleted'=>0));
		return view('auth/student_auth',$data);
	}

	public function addStudentDetails()
	{
		$postData = $this->request->getPost();
		$checkUeserExist = $this->studentModel->checkExistStudent($postData['email'],$postData['mobile_no']);
		if(empty($checkUeserExist)){
			$password = $postData['password'];
			$postData['password'] = md5(md5($postData['password']));
			unset($postData['confirm_password']);
			$addStudentData = $this->common->dbAction('student_table',$postData,'insert',array());
			if (!empty($addStudentData)) {
				$emailTemplate = file_get_contents(PUBLIC_PATH.'/emailTemplate/reg_template.php');
				$login_url = base_url().'/sign-in';
				$emailTemplate = str_replace('{login}',$login_url, $emailTemplate);
				$emailTemplate = str_replace('{user_email}',$postData['email'], $emailTemplate);
				$emailTemplate = str_replace('{user_password}',$password, $emailTemplate);
				$subject = "Registration Confirmation";
				$send_email = $this->sendMail($postData['email'], $subject, $emailTemplate,'New Registration');
				$response = array(
					'success'=>true,
					'message'=>'You are registered successfully',
				);
			} else {
				$response = array(
					'success'=>false,
					'message'=>'Failed to add your account',
				);
			}
		} else{
			$response = array(
				'success'=>false,
				'message'=>'User account is already exist',
			);
		}
		return json_encode($response);
	}

	public function verifyStudentLogin() {
		$postData = $this->request->getPost();
		$checkUserExist = $this->common->getInfo('student_table','row',array('email'=>$postData['email']),'student_name,email,password');
		$cryptPass = md5(md5($postData['password']));
		if (!empty($checkUserExist)) {
			if ($cryptPass==$checkUserExist->password) {
				if($checkUserExist->blocked==0){
					$success = true;
					$message = 'You have logged in successfully';
					$studentDetails = array(
						'id'=>$checkUserExist->student_id,
						'student_name'=>$checkUserExist->student_name,
						'mobile_no'=>$checkUserExist->mobile_no,
						'email'=>$checkUserExist->email,
						'is_logged_in'=>true,
					);
					session()->set('studentDetails',$studentDetails);
				} else {
					$success = false;
					$message = 'Your account has been blocked, please contact with admin';
				}
				
			}else {
				$success = false;
				$message = 'You have entered wrong credentials';
			}
		} else {
			$success = false;
			$message = 'Student does not exist';
		}
		$response = array(
			'success'=>$success,
			'message'=>$message,
		);
		return json_encode($response);
	}

	public function logoutStudent(){
		session()->get('studentDetails');
		if(session()->get('studentDetails')!==null){
			session()->remove('studentDetails');
		}
        return redirect()->to('/');
	}

	public function checkoutCartItem(){
		if(session()->get('studentDetails')==null){
			$response = array(
				'success'=>false,
				'message'=>'Unauthorise access found',
			);
			return json_encode($response);
		} else {
			$studentDetails = session()->get('studentDetails');
			$cartItemsDetails = json_decode($this->getCartDetails());
			$orderId = "#ORDER".date('Ymdhis');
			$price = 0;
			$discountAmount = 0;
			$discountType = 'percent';
			$cart_items_ids_array = array();
			foreach($cartItemsDetails as $eachCartValue){
				$price+= $eachCartValue->offer_price;
				$discountAmount = $eachCartValue->discount;
				$discountType = $eachCartValue->discount_type;
				array_push($cart_items_ids_array,$eachCartValue->cart_items_id);
			}
			$finalPrice = $price;
			if($discountType=='percent'){
				$finalPrice = $finalPrice-(($finalPrice*$discountAmount)/100);
			} else {
				$finalPrice = $finalPrice-$discountAmount;
			}
			if($finalPrice > 0){
				$paymentReqInfo = $this->paymentGateway($orderId,$finalPrice,$studentDetails);
				if(!empty($paymentReqInfo)){
					$purchaseArray = array(
						'payment_request_id'=>$paymentReqInfo->payment_request->id,
						'cart_id'=>$cartItemsDetails[0]->cart_id,
						'order_id'=>$orderId,
						'total_payment_amount'=>$finalPrice,
						'payment_mode'=>'instamojo',
					);
					$insertPurchase = $this->common->dbAction('purchase_table',$purchaseArray,'insert_id',array());
					foreach($cart_items_ids_array as $cart_items_id){
						$updatePurchaseId = $this->common->dbAction('cart_items_table',array('purchase_id'=>$insertPurchase,'payment_status'=>'Pending','deleted'=>1),'update',array('cart_items_id'=>$cart_items_id));
					}
					$paymentId = $paymentReqInfo->payment_request->id;
					if (!empty($insertPurchase)) {
						session()->set('paymentRequestId',$paymentId);
						$response = array(
							'success'=>true,
							'url'=>$paymentReqInfo->payment_request->longurl,
						);
					}
				}
			}
			return json_encode($response);
		}
	}

	public function addFreeProductByItsPromoCode(){
		if(session()->get('studentDetails')==null){
			$response = array(
				'success'=>false,
				'message'=>'Unauthorise access found',
			);
		} else {
			$studentDetails = session()->get('studentDetails');
			$student_id = $studentDetails['id'];
			$link_id = uniqid($student_id);
			$cartItemsDetails = json_decode($this->getCartDetails());
			$orderId = "#ORDER".date('Ymdhis');
			$finalPrice = 0;
			$cart_items_ids_array = array();
			foreach($cartItemsDetails as $eachCartValue){
				array_push($cart_items_ids_array,$eachCartValue->cart_items_id);
			}
			$purchaseArray = array(
				'cart_id'=>$cartItemsDetails[0]->cart_id,
				'order_id'=>$orderId,
				'payment_request_id'=>$link_id,
				'total_payment_amount'=>$finalPrice,
				'payment_mode'=>'promo_code_100',
				'payment_status'=>'Credit'
			);
			$insertPurchase = $this->common->dbAction('purchase_table',$purchaseArray,'insert_id',array());
			foreach($cart_items_ids_array as $cart_items_id){
				$this->common->dbAction('cart_items_table',array('purchase_id'=>$insertPurchase,'deleted'=>1,'payment_status'=>'Credit'),'update',array('cart_items_id'=>$cart_items_id));
			}
			if (!empty($insertPurchase)) {
				$this->createInvoice($link_id);
				$this->addSalesInfo($insertPurchase,$link_id);
				$response = array(
					'success'=>true,
					'url'=>base_url().'dashboard',
				);
			}
		}
		return json_encode($response);
	}

	public function getPaymentStatus(){
		$getData = $this->request->getVar();
		$checkPurchaseSession = (session()->get('paymentRequestId')!==null) ? session()->get('paymentRequestId') : '';
		if(!empty($checkPurchaseSession)){
			if(!empty($getData)){
				$updatePurchaseInfo = $this->common->dbAction('purchase_table',$getData,'update',array('payment_request_id'=>$checkPurchaseSession));
				if(!empty($updatePurchaseInfo)){
					// $cartData = json_decode($this->getCartDetails());
					$purchaseDetails = $this->common->getInfo('purchase_table','row',array('payment_request_id'=>$checkPurchaseSession));
					// $cartId = $cartData[0]->cart_id;
					$cartId = $purchaseDetails->cart_id;
					$purchase_id = $purchaseDetails->purcahse_id;
					$updateCartItems = $this->common->dbAction('cart_items_table',array('payment_status'=>$getData['payment_status'],'deleted'=>1),'update',array('purchase_id'=>$purchase_id));
					if ($getData['payment_status']=='Credit') {
						$this->createInvoice($checkPurchaseSession);
						$this->addSalesInfo($purchase_id,$link_id);
					}
					session()->remove('paymentRequestId');
                    return redirect()->to('/dashboard');
				}
			}
		}
	}

	private function createInvoice($payment_request_id){
		$checkthePurchasedSubject = $this->studentModel->fetchPurchaseModel($payment_request_id);
		$insertData = array();
		if (!empty($checkthePurchasedSubject)) {
			$json_encoded_info = json_encode($checkthePurchasedSubject);
			$insertData['student_id'] = $checkthePurchasedSubject[0]->student_id;
			$insertData['cart_id'] = $checkthePurchasedSubject[0]->cart_id;
			$insertData['payment_request_id'] = $checkthePurchasedSubject[0]->payment_request_id;
			$insertData['order_id'] = $checkthePurchasedSubject[0]->order_id;
			$insertData['invoice_json'] = $json_encoded_info;
			$insertInvoice = $this->common->dbAction('invoice_table',$insertData,'insert',array());
			if (!empty($insertInvoice)) {
				return true;
			} else {
				return false;
			}
		}
	}

	public function addSalesInfo($purchase_id='',$link_id=''){
		if (session()->get('studentDetails')!==null) {
			$studentDetails = session()->get('studentDetails');
			$student_id = $studentDetails['id'];
			$getStudentInfo = $this->common->getInfo('student_table','row',array('student_id'=>$student_id));
			$salesInfoArray = array();
			if (!empty($getStudentInfo)) {
				$salesInfoArray['student_id'] = $student_id;
				$salesInfoArray['student_name'] = $getStudentInfo->student_name;
				$salesInfoArray['date_of_enrollment'] = $getStudentInfo->create_date;
			}
			$getSalesInfo = $this->studentModel->getSalesInfoModel($purchase_id);
			if (!empty($getSalesInfo)) {
				$salesBatch = array();
				foreach ($getSalesInfo as  $value) {
					$salesInfoArray['level_name'] = $value->level_name;
					$salesInfoArray['level_id'] = $value->level_id;
					$salesInfoArray['type_name'] = $value->type_name;
					$salesInfoArray['type_id'] = $value->type_id;
					$salesInfoArray['subject_name'] = $value->subject_name;
					$salesInfoArray['subject_id'] = $value->subject_id;
					$salesInfoArray['promo_code'] = $value->promo_code_name;
					$salesInfoArray['discount_type'] = $value->discount_type;
					$salesInfoArray['discount_amt'] = $value->discount;
					$salesInfoArray['original_price'] = $value->original_price;
					$salesInfoArray['offer_price'] = $value->offer_price;
					$salesInfoArray['payment_mode'] = $value->payment_mode;
					$salesInfoArray['purchase_date'] = $value->purchase_date;
					$salesInfoArray['link_id'] = $link_id;
					$salesBatch[] = $salesInfoArray;
				}
				$addSalesInfo = $this->common->dbAction('sales_table',$salesBatch,'insert_batch',array());
			}

			if (!empty($addSalesInfo)) {
				return true;
			}
		}
	}
	public function paymentGateway($cartPaymentTitle='',$price='',$studentDetails=''){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://www.instamojo.com/api/1.1/payment-requests/');
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
		curl_setopt($ch, CURLOPT_HTTPHEADER,
					array("X-Api-Key:a4b994b657c2bd7fc6392f1ee22470bf",
						"X-Auth-Token:91d727edbff356d91bcafabc8b9c7edf"));
		
		$payload = Array(
			'purpose' => $cartPaymentTitle,
			'amount' => $price,
			// 'phone' => '9999999999',
			'buyer_name' => $studentDetails['student_name'],
			'redirect_url' => base_url().'payment-status',
			'send_email' => false,
			'send_sms' => false,
			'email' => $studentDetails['email'],
			'allow_repeated_payments' => false
		);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
		$response = curl_exec($ch);
		curl_close($ch); 
		$response = json_decode($response);
		return $response;
	}

	public function removeCartItems(){
		$postData = $this->request->getPost();
		$cart_items_id =$postData['cart_items_id'];
		$changeStatusDelete = $this->common->dbAction('cart_items_table','','delete',array('cart_items_id'=>$cart_items_id));
		$this->validPromoCode();
		if(!empty($changeStatusDelete)){
			$response = array(
				'success'=>true,
				'message'=>'Item removed successfully',
			);
		} else{
			$response = array(
                'success'=>false,
                'message'=>'Failed to remove item',
            );
		}
		return json_encode($response);
	}

	public function validPromoCode(){
		if(session()->get('studentDetails')!==null){
			$student_details  = session()->get('studentDetails');
			$student_id = $student_details['id'];
			$cartDetails = $this->common->getInfo('cart_table','row',array('student_id' => $student_id));
			if(!empty($cartDetails)){
				$cartItemsDetails = json_decode($this->getCartDetails());
				$priceArray = array_map(function($v){
					return $v->offer_price;
				}, $cartItemsDetails);
				$priceTotal = array_sum($priceArray);
				if($priceTotal!==''){
					$checkPromoCodeMaxValueRow = $this->studentModel->getPromoCodeDetails($cartDetails->cart_id);
					if(!empty($checkPromoCodeMaxValueRow)){
						$checkPromoCodeMaxValue = $checkPromoCodeMaxValueRow->min_cart_amt;
						if($checkPromoCodeMaxValue > $priceTotal){
							$this->common->dbAction('cart_items_table',array('promo_code_name'=>null,'discount_type'=>'percent','discount'=>null),'update',array('cart_id'=>$cartDetails->cart_id,'deleted'=>0));
						}
					}
				}
			}
		}
	}

	public function loadNotesListPage(){
		// $data['notesArray'] = $this->common->getInfo('noteslib','array',array(),'id desc','id,notes_title,notes_description,original_price,offer_price,cover_photo');
		$data['notesArray'] = $this->cartModel->notesListModel();
		return view('student/notes_list',$data);
	}

	public function loadTopicListPage($levelId=''){
		$data['levelId'] = $levelId;
		$data['levelInfo'] = $this->common->getInfo('level_table','row',array('level_id'=>$levelId));
		$data['fetchedTypes'] = $this->studentModel->getTypeList($levelId);
        $data['fetchLevels'] = $this->studentModel->fetchLevelModel();
		return view('student/type_list',$data);
	}

	public function loadSubjectListPage($typeId=''){
		$data['typeId'] = $typeId;
		$data['typeInfo'] = $this->common->getInfo('type_table','row',array('type_id'=>$typeId));
		$data['fetchedSubject'] = $this->studentModel->getSubjectList($typeId);
        $data['fetchLevels'] = $this->studentModel->fetchLevelModel();
		return view('student/subject_list',$data);
	}

	public function addToCartItem(){
		$postData = $this->request->getPost();
		if(session()->get('studentDetails')!==null){
			$studentDetails = session()->get('studentDetails');
			$cartArray = $this->getCartId();
			$cart_id = '';
			if($cartArray['success']){
				$cart_id = $cartArray['data'];
			}
			$fetchSubjectDetails = $this->common->getInfo('subject_table','row',array('subject_id'=>$postData['subject_id'],'deleted'=>0));
			if (!empty($fetchSubjectDetails)) {
				$postData['original_price'] = $fetchSubjectDetails->original_price;
				$postData['offer_price'] = $fetchSubjectDetails->offer_price;
			}
			if(!empty($cart_id)){
				$fetchCartItems = $this->common->getInfo('cart_items_table','row',array('cart_id'=>$cart_id,'subject_id'=>$postData['subject_id'],'deleted'=>0));
				if(!empty($fetchCartItems)){
					$qty = $fetchCartItems->qty;
					$qty++;
					$addCartItems = $this->common->dbAction('cart_items_table',array('qty'=>$qty),'update',array('cart_items_id'=>$fetchCartItems->cart_items_id));
				} else {
					$existCartItemsPromoCode = $this->common->getInfo('cart_items_table','row',array('cart_id'=>$cart_id,'deleted'=>0));
					if(!empty($existCartItemsPromoCode)){
						$postData['promo_code_name'] = $existCartItemsPromoCode->promo_code_name;
						$postData['discount_type'] = $existCartItemsPromoCode->discount_type;
						$postData['discount'] = $existCartItemsPromoCode->discount;
					}
					$postData['qty'] = 1;
					$postData['cart_id'] = $cart_id;
					$addCartItems = $this->common->dbAction('cart_items_table',$postData,'insert',array());
				}
				if(!empty($addCartItems)){
					$cartDetails = json_decode($this->getCartDetails($cart_id));
					$status = true;
					$message = 'Item added to cart successfully';
					$totalQty = count($cartDetails);
				} else{
					$status = false;
					$message = 'Failed to add cart items';
					$totalQty = 0;
				}
			} else{
				$status = false;
				$message = 'Something went wrong';
				$totalQty = 0;
			}
		} else {
			$status = false;
			$message = 'Please login first';
			$totalQty = 0;
		}
		$response = array(
			'success'=>$status,
			'message'=>$message,
			'totalQty'=>$totalQty,
		);
		return json_encode($response);
	}

	public function getCartDetails($cart_id = ''){
		if($cart_id==''){
			if(session()->get('studentDetails')!==null){
				$studentDetails = session()->get('studentDetails');
				$student_id = $studentDetails['id'];
				$cartDetails  = $this->common->getInfo('cart_table','row',array('student_id' => $student_id,'deleted'=>0),'cart_id desc','cart_id');
				if(!empty($cartDetails->cart_id)){
					$cart_id = $cartDetails->cart_id;
					session()->push('studentDetails', ['cart_id' => $cart_id]);
				} else {
					$cart_id = $this->common->dbAction('cart_table',array('student_id' => $student_id),'insert_id',array());
				}
			}
		}
		$getCartItems = $this->cartModel->getActiveCartItems($cart_id);
		return json_encode($getCartItems);
	}

	public function getCartItemsArray(){
		if(session()->get('studentDetails')!==null){
			$studentDetails = session()->get('studentDetails');
			$cart_id = isset($studentDetails['cart_id']) ? $studentDetails['cart_id'] : '' ;
			if($cart_id==''){
				$cart_details = $this->common->getInfo('cart_table','row',array('student_id'=>$studentDetails['student_id'],'deleted=>0'));
				$cart_id = $cart_details->cart_id;
			}
			$cartItemsDetailsArray  = $this->cartModel->getActiveCartItems($cart_id);
			if(!empty($cartItemsDetailsArray)){
				$response = array(
					'success'=>true,
					'message'=>'Cart items are fetched successfully',
					'cartData'=>$cartItemsDetailsArray,
				);
			} else {
				$response = array(
					'success'=>true,
					'message'=>'cart is blanks',
					'cartData'=>[],
				);
			}
			
		} else {
			$response = array(
				'success'=>false,
				'message'=>'Something went wrong',
				'cartData'=>[],
			);
		}
		return json_encode($response);	
	}

	public function loadDashboardPage($item_type=''){
		$data['fetchLevels'] = $this->studentModel->fetchLevelModel();
		$data['fetch_sub'] ='';
		$data['schedule_list'] = '';
        $data['notes_sub'] = '';
        $fetch_sub=array();
        $subject_id_details=array();
        $data['fetchLevels'] = $this->studentModel->fetchLevelModel();
        if(session()->get('studentDetails')!==null){
            $studentDetails = session()->get('studentDetails');
            $student_id = $studentDetails['id'];
            if ($item_type!='free') {
            	$cart_table = $this->common->getInfo('cart_table','row',array('student_id'=>$student_id,'deleted'=>0));
	       		if (!empty($cart_table)) {
	       			$cart_id = $cart_table->cart_id;
	            	$fetch_sub = $this->studentDashboardModel->fetchAvailableSubject($cart_id,3);
	            	$subject_id_details = $this->studentDashboardModel->getNotesSubjectList($cart_table->cart_id,3);
	                $amendmentDetails = $this->studentDashboardModel->getAmendmentSubjectList($cart_table->cart_id,3);
	                $qbankDetails = $this->studentDashboardModel->getQbankSubjectList($cart_table->cart_id,3);
	                $data['amendment_sub'] = $amendmentDetails;
	                $data['qbank_sub'] = $qbankDetails;
	            	$data['schedule_list'] = $this->studentDashboardModel->getScheduleList($cart_table->cart_id);
	       		}
            } else {
                $studentInfo = $this->common->getInfo('student_table','row',array('student_id'=>$student_id));
                $level_id = $studentInfo->current_level;
            	$fetch_sub = $this->studentDashboardModel->fetchFreeSubject(3,$level_id);
            	$subject_id_details = $this->studentDashboardModel->getFreeNotesSubjectList(3,$level_id);
            }
            $i = 0;
	        foreach ($fetch_sub as $key => $value) {
	        	$fetch_sub[$i]['subject_id'] = $this->encryptValue($value['subject_id']);
	        	$i++;
	        }
            $i = 0;
	        foreach ($subject_id_details as $key => $value) {
	        	($subject_id_details[$i])->subject_id = $this->encryptValue($value->subject_id);
	        	$i++;
	        }
	        $data['fetch_sub'] = $fetch_sub;
            $data['notes_sub'] = $subject_id_details;
	        $data['item_type'] = $item_type;
        }
        
		return view('student/student_dashboard',$data);
	}

	public function loadAboutUsPage(){
		$data['fetchLevels'] = $this->studentModel->fetchLevelModel();
		return view('student/about_us',$data);
	}

	public function loadProfilePage(){
		if(session()->get('studentDetails')!==null){
			$studentDetails = session()->get('studentDetails');
			$student_id = $studentDetails['id'];
			$studentDetails = $this->common->getInfo('student_table','row',array('student_id'=>$student_id),'student_id desc','student_id,student_name,email,city_name,state_name,mobile_no,current_level');
		}
		$data['level_list'] = $this->common->getInfo('level_table','array',array('deleted'=>0));
		$data['studentDetails'] = $studentDetails;
		$data['fetchLevels'] = $this->studentModel->fetchLevelModel();
		return view('student/student_profile',$data);
	}

	public function updateStudentProfile(){
		$postData = $this->request->getPost();
		$student_id ='';
		if($postData['student_id']!=''){
			$student_id = $postData['student_id'];
			unset($postData['student_id']);
		} else {
			return redirect('/');
		}
		if($student_id!=''){
			$updateStudentDetails = $this->common->dbAction('student_table',$postData,'update',array('student_id'=>$student_id));
			if(!empty($updateStudentDetails)){
				$response = array(
					'success'=>true,
					'message'=>'Profile updated successfully'
				);
			} else {
				$response = array(
					'success'=>false,
					'message'=>'Failed to update profile'
				);
			}
			return json_encode($response);
		}
	}

	public function updateStudentPassword(){
		$postData = $this->request->getPost();
		$student_id=  $postData['student_id'];
		unset($postData['student_id']);
		$verifyOldPass = $this->common->getInfo('student_table','row',array('student_id'=>$student_id),'','password');
		if(!empty($verifyOldPass)){
			if($verifyOldPass->password != md5(md5($postData['old_pass']))){
				$response = array('success'=>false,'message'=>'Please enter correct current password');
				return json_encode($response);
				exit;
			}
			$newPass = md5(md5($postData['new_pass']));
			$updateNewPass = $this->common->dbAction('student_table',array('password'=>$newPass),'update',array('student_id'=>$student_id));
			if(!empty($updateNewPass)){
				$response = array(
					'success'=>true,
					'message'=>'Password updated sucessfully',
				);
			} else {
				$response = array(
					'success'=>false,
					'message'=>'Failed to update password',
				);
			}
			return json_encode($response);
		}
	}

	public function applyPromocode(){
		$postData = $this->request->getPost();
		$totalPrice = $postData['totalPriceDeciaml'];
		unset($postData['totalPriceDeciaml']);
		$postData['deleted']=0;
		$promoData = [];
		$checkPromocodeExist = $this->common->getInfo('promo_code_table','row',$postData);
		if(empty($checkPromocodeExist)){
			$response = array('success' => false,'message' =>'Promo Code does not exist');
			return json_encode($response);
		} else {
			if($checkPromocodeExist->validity_date < date('Y-m-d h:i:s')){
				$response = array('success'=>false,'message' =>'Promocode is expired');
				return json_encode($response);
				exit;
			} else if($totalPrice < $checkPromocodeExist->min_cart_amt){
				$response = array('success'=>false,'message' =>'Min cart value to apply code is ' . $checkPromocodeExist->min_cart_amt);
				return json_encode($response);
				exit;
			}
			$promoData['promo_code_name'] = $checkPromocodeExist->code_name;
			$promoData['discount_type'] = $checkPromocodeExist->discount_type;
			$promoData['discount'] = $checkPromocodeExist->discount_amt;
			$update_promo_code = '';
			if(session()->get('studentDetails')!==null){
				$studentDetails = session()->get('studentDetails');
				$cart_id = $studentDetails['cart_id'];
				$cartItemsDetailsArray  = $this->cartModel->getActiveCartItems($cart_id);
				$update_promo_code = $this->common->dbAction('cart_items_table',$promoData,'update',array('cart_id'=>$cart_id,'deleted'=>0));
			}
			if(!empty($update_promo_code)){
				$response = array(
					'success'=>true,
					'message'=>'Promo code applied successfully'
				);
			} else {
				$response = array(
					'success'=>false,
					'message'=>'Failed to apply promo code'
				);
			}
			return json_encode($response);
		}
		
	}

	public function loadContactUsPage(){
		$data['fetchLevels'] = $this->studentModel->fetchLevelModel();
		return view('student/contact_us',$data);
	}
	public function loadPrivacyPolicyPage(){
		$data['fetchLevels'] = $this->studentModel->fetchLevelModel();
		return view('student/privacy_policy',$data);
	}

	public function loadTermsAndConditions(){
		$data['fetchLevels'] = $this->studentModel->fetchLevelModel();
		return view('student/terms_and_conditions',$data);
	}

	public function loadForgotPassword(){
		$data['fetchLevels'] = $this->studentModel->fetchLevelModel();
		return view('auth/forgot_password',$data);
	}

	public function forgotPassEmail(){
		$postData = $this->request->getPost();
		$checkEmailExist = $this->common->getInfo('student_table','row',$postData);
		if($checkEmailExist->blocked==1){
			$response = array('success'=>false,'message'=>'User account is blocked by the admin');
			return json_encode($response);
			exit;
		} else if(empty($checkEmailExist)){
			$response = array('success'=>false,'message'=>'User does not exists');
			return json_encode($response);
			exit;
		}
		$otp = random_int(100000, 999999);
		$sendEmail = $this->sendMail($postData['email'], 'OTP',"Dear Student,<br><br>Please find your Password Reset OTP below:<br><br><h4>OTP: $otp</h4><br>Thank you<br>MY CS MTP TEST SERIES HAPPY LEARNING",'Forgot Password');
		if($sendEmail=='1'){
			$tempdata = ['otp' => $otp, 'email' => $postData['email']];
			session()->setTempdata($tempdata,null, 300);
			$response = array('success' =>true,'message' =>'Email has been sent successfully');
		} else {
			$response = array('success'=>false,'message'=>'Failed to send email contact admin');
		}
		return json_encode($response);
	}

	public function verifyOTP(){
		$postData = $this->request->getPost();
		$tempArray = session()->getTempdata();
		if(!empty($tempArray)){
			if($tempArray['email']!=$postData['email']){
				$response = array('success' => false,'message' =>'Please enter your correct mail address');
			} else {
				if($tempArray['otp']==$postData['otp']){
					$response = array('success' => true,'message' =>'OTP verified successfully');
					session()->setTempdata('email',$tempArray['email'],900);
				} else {
					$response = array('success' => false,'message' =>'Wrong OTP entered');
				}
			}
		} else {
			$response = array('success' => false,'message' =>'OTP expired');
		}
		return json_encode($response);
	}

	public function loadSetPasswordPage(){
		return view('auth/password_set');
	}

	public function setNewPassword(){
		$postData = $this->request->getPost();
		$emailTempData = session()->getTempdata('email');
		if(empty($emailTempData)){
			$response = array('success' => false,'message' =>'Session expired, please try again');
		} else {
			$password = md5(md5($postData['password']));
			$updatePassword = $this->common->dbAction('student_table',array('password' => $password),'update',array('email' => $emailTempData));
			if($updatePassword){
				$response = array('success' => true,'message' =>'Password updated successfully');
			} else {
				$response = array('success' => false,'message' =>'Failed to update password');
			}
		}
		return json_encode($response);
	}

	// subject more details
	public function loadSubjectMoreDetailsPage($subject_id=''){
		if(!empty($subject_id)){
			$data['moreDetails'] = $this->common->getInfo('subject_table','row',array('subject_id'=>$subject_id,'deleted'=>0),'subject_id desc','more_details,subject_name');
			$data['fetchLevels'] = $this->studentModel->fetchLevelModel();
			return view('student/subject_more_details',$data);
		} else {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
	}

	public function loadPaymentpage(){
		$data['fetchLevels'] = $this->studentModel->fetchLevelModel();
		return view('student/payment_page',$data);
	}

	public function addManualPayment(){
		$postData = $this->request->getPost();
		if(session()->get('studentDetails')!==null){
			$studentDetails = session()->get('studentDetails');
			$postData['student_id'] = $studentDetails['id'];
			$cartDetails = json_decode($this->getCartItemsArray());
			$cartData = $cartDetails->cartData;
			$postData['cart_id'] = $cartData[0]->cart_id;
			$cart_items_id_array =array();
			foreach ($cartData as $cart_items){
				array_push($cart_items_id_array,$cart_items->cart_items_id);
			}
			$deleteCartItems = $this->studentModel->deleteCartItemsForManualPayment($cart_items_id_array);
			$postData['cart_items_ids'] = implode(',',$cart_items_id_array);
			$addManualPaymentData = $this->common->dbAction('manual_payment_table',$postData,'insert_id',array());
			if(!empty($addManualPaymentData)){
				$purchaseArray = array(
					'cart_id'=>$postData['cart_id'],
					'order_id'=>$postData['order_id'],
					'payment_mode'=>'manual_upi',
					'total_payment_amount'=>$postData['payable_amount'],
				);
				$addPurchaseTableData = $this->common->dbAction('purchase_table',$purchaseArray,'insert_id',array());
				foreach($cart_items_id_array as $cart_items_id){
					$this->common->dbAction('cart_items_table',array('purchase_id'=>$addPurchaseTableData),'update',array('cart_items_id'=>$cart_items_id));
				}
				$updateManualUpdate = $this->common->dbAction('manual_payment_table',array('purchase_id'=>$addPurchaseTableData),'update',array('manual_payment_id'=>$addManualPaymentData));
				if(!empty($updateManualUpdate)){
					$response = array(
						'success'=>true,
						'message'=>'Please wait till the verification done by the admin.It takes around 24 hours. If payment Veified successfully then you will recieve your subject in your dahsboard',
					);
				} else {
					$response = array(
						'success'=>false,
						'message'=>'Something went wrong please contact admin',
					);
				}
			} else {
				$response = array(
					'success'=>false,
					'message'=>'Something went wrong please contact admin',
				);
			}
		} else {
			$response = array(
				'success'=>false,
				'message'=>'Something went wrong please contact admin',
			);
		}
		return json_encode($response);
	}

	public function loadOrderHistoryPage(){
		if (session()->get('studentDetails')!==null) {
			$cart_id = $this->getCartId()['data'];
			$data['invoiceDetails'] = $this->studentModel->fetchInvoiceList($cart_id);
			$data['fetchLevels'] = $this->studentModel->fetchLevelModel();
			return view('student/order_history',$data);
		}
	}

	public function loadLevelList()
	{
		$data['level_list'] = $this->common->getInfo('level_table','',array('deleted'=>0));
		$data['fetchLevels'] = $this->studentModel->fetchLevelModel();
		return view('student/level_list',$data);
	}

	public function removePromocode()
	{
		$studentData = session()->get('studentDetails');
		$getCartDetails = $this->common->getInfo('cart_table','row',array('student_id'=>$studentData['id']));
		$removePromocode = $this->common->dbAction('cart_items_table',array('promo_code_name'=>'','discount_type'=>'percent','discount'=>''),'update',array('cart_id'=>$getCartDetails->cart_id));
		if (!empty($removePromocode)) {
			$response = array('success'=>true,'message'=>'Promocode has been removed successfully');
		} else {
			$response = array('success'=>false,'message'=>'Failed to remove promocode');
		}
		return json_encode($response);
	}

	public function loadStudentFaq(){
		$data['fetchLevels'] = $this->studentModel->fetchLevelModel();
		return view('student/student_faq',$data);
	}

	public function loadStudentTestimonial(){
		$data['fetchLevels'] = $this->studentModel->fetchLevelModel();
		return view('student/student_testimonial',$data);
	}

	public function loadStudentSyllabus()
	{
		$data['fetchLevels'] = $this->studentModel->fetchLevelModel();
		return view('student/syllabus',$data);
	}

	public function loadWhyUsPage()
	{
		$data['fetchLevels'] = $this->studentModel->fetchLevelModel();
		return view('student/why_us',$data);
	}

	public function loadplansPage()
	{
		$data['fetchLevels'] = $this->studentModel->fetchLevelModel();
		return view('student/plans',$data);
	}

	public function loadpricingPage(){
		$data['fetchLevels'] = $this->studentModel->fetchLevelModel();
		return view('student/pricing',$data);
	}

	public function loadsampleAnsPage()
	{
		$data['fetchLevels'] = $this->studentModel->fetchLevelModel();
		$data['fetchAllLevelLists'] = $this->common->getInfo('level_table','array',array('deleted'=>0));
		return view('student/sample_ans',$data);
	}
	
	public function loadDisclaimer(){
		$data['fetchLevels'] = $this->studentModel->fetchLevelModel();
		return view('student/disclaimer',$data);
	}

	public function loadCancelationPolicy(){
		$data['fetchLevels'] = $this->studentModel->fetchLevelModel();
		return view('student/canceling_policy',$data);
	}

	public function loadPassPlanPolicy(){
		$data['fetchLevels'] = $this->studentModel->fetchLevelModel();
		return view('student/pass-plan-policy',$data);
	}


	public function checkoutGatewayRedirect(){
		if (PAYMENTGATEWAY=='PHONEPE') {
			// for phonepe
			$response = $this->phonepePaymentGateway();
		} elseif (PAYMENTGATEWAY=='CASHFREE') {
			// for cashfree
			$response = $this->cashfreePaymentGateway();
		}
		return $response;
	}

	// phone pe 
	public function phonepePaymentGateway(){
		if(session()->get('studentDetails')==null){
			$response = array(
				'success'=>false,
				'message'=>'Unauthorise access found',
			);
			return json_encode($response);
		} else {
			$studentDetails = session()->get('studentDetails');
			$cartItemsDetails = json_decode($this->getCartDetails());
			$orderId = "#ORDER".date('Ymdhis');
			$price = 0;
			$discountAmount = 0;
			$discountType = 'percent';
			$cart_items_ids_array = array();
			foreach($cartItemsDetails as $eachCartValue){
				$price+= $eachCartValue->offer_price;
				$discountAmount = $eachCartValue->discount;
				$discountType = $eachCartValue->discount_type;
				array_push($cart_items_ids_array,$eachCartValue->cart_items_id);
			}
			$finalPrice = $price;
			if($discountType=='percent'){
				$finalPrice = $finalPrice-(($finalPrice*$discountAmount)/100);
			} else {
				$finalPrice = $finalPrice-$discountAmount;
			}
			if ($finalPrice > 0) {
				$paymentReqInfo = $this->paymentPhonePeGateway($orderId,$finalPrice,$studentDetails);
				if(!empty($paymentReqInfo)){
					$purchaseArray = array(
						'payment_request_id'=>$paymentReqInfo['data']['merchantTransactionId'],
						'cart_id'=>$cartItemsDetails[0]->cart_id,
						'order_id'=>$orderId,
						'total_payment_amount'=>$finalPrice,
						'payment_mode'=>'phonepe',
					);
					$insertPurchase = $this->common->dbAction('purchase_table',$purchaseArray,'insert_id',array());
					foreach($cart_items_ids_array as $cart_items_id){
						$updatePurchaseId = $this->common->dbAction('cart_items_table',array('purchase_id'=>$insertPurchase,'payment_status'=>'Pending','deleted'=>1),'update',array('cart_items_id'=>$cart_items_id));
					}
					$paymentId = $paymentReqInfo['data']['merchantTransactionId'];
					if (!empty($insertPurchase)) {
						$response = array(
							'success'=>true,
							'url'=>$paymentReqInfo['data']['instrumentResponse']['redirectInfo']['url'],
						);
						return json_encode($response);
					}
				}
			}
		}
	}

	public function paymentPhonePeGateway($orderId,$finalPrice,$studentDetails){
		// $merchantKey = "099eb0cd-02cf-4e2a-8aca-3e6c6aff0399"; //test
		$merchantKey = "f41bd9e5-39a6-459e-af58-7b9f46cfc400"; //live provided
		$studentDetails =session()->get('studentDetails');
		$student_id = $studentDetails['id'];
		$studentInfo = $this->common->getInfo('student_table','row',array('student_id'=>$student_id));
		$data = array(
		     // "merchantId" => "PGTESTPAYUAT",//test
		     "merchantId" => "M1QP0DRQNEFV", //LIVE
		     "merchantTransactionId" => uniqid($student_id),
			 "merchantUserId"=>"M1QP0DRQNEFV",
		     "amount" => $finalPrice*100,
		     "redirectUrl" => base_url().'success-payment',
		     "redirectMode" => "POST",
		     "callbackUrl" => base_url().'success-payment',
		     "mobileNumber" => $studentInfo->mobile_no,
		     "paymentInstrument" => array(
		         "type" => "PAY_PAGE"
		     )
		);
		$payloadMain = base64_encode(json_encode($data));

	  	$payload = $payloadMain."/pg/v1/pay".$merchantKey;
		$Checksum = hash('sha256', $payload);
		$Checksum = $Checksum.'###1';


		$curl = curl_init();
		curl_setopt_array($curl, [
		  CURLOPT_URL => "https://api.phonepe.com/apis/hermes/pg/v1/pay",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => json_encode([
		      'request' => $payloadMain
		    ]),
		  CURLOPT_HTTPHEADER => [
		    "Content-Type: application/json",
		     "X-VERIFY: ".$Checksum,
		    "accept: application/json"
		  ],
		]);

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
			$responseData = json_decode($response, true);
			// print_r($responseData);
			// die();
			return $responseData;
		}
	}

	public function phonepePaymentSuccess(){
		$postData = $this->request->getPost();
		$payment_status = 'Failed';
		if ($postData['code']=='PAYMENT_SUCCESS') {
			$payment_status = 'Credit';
		}
		$checkPurchaseSession = $postData['transactionId'];
		if(!empty($checkPurchaseSession)){
			if(!empty($postData)){
				$updatePurchaseInfo = $this->common->dbAction('purchase_table',array('payment_status'=>$payment_status),'update',array('payment_request_id'=>$checkPurchaseSession));
				if(!empty($updatePurchaseInfo)){
					$purchaseDetails = $this->common->getInfo('purchase_table','row',array('payment_request_id'=>$checkPurchaseSession));
					$purchaseId = $purchaseDetails->purcahse_id;
					$cartId = $purchaseDetails->cart_id;
					// fetch subject list
					$fetchcartItemsList = $this->common->getInfo('cart_items_table','',array('cart_id'=>$cartId,'purchase_id'=>$purchaseId));

					if (!empty($fetchcartItemsList)) {
						foreach ($fetchcartItemsList as $cart_items_row) {
							$subject_id = $cart_items_row->subject_id;
							$cart_items_id = $cart_items_row->cart_items_id;
							$fetchSubjectRow = $this->common->getInfo('subject_table','row',array('subject_id'=>$subject_id));
							$updateInfo = array();
							if (!empty($fetchSubjectRow)) {
								$updateInfo['original_price'] = $fetchSubjectRow->original_price;
								$updateInfo['offer_price'] = $fetchSubjectRow->offer_price;
								$this->common->dbAction('cart_items_table',$updateInfo,'update',array('cart_items_id'=>$cart_items_id));
							}
						}
					}
					$updateCartItems = $this->common->dbAction('cart_items_table',array('payment_status'=>$payment_status,'deleted'=>1),'update',array('cart_id'=>$cartId,'purchase_id'=>$purchaseId));
					// relogginuser
					$checkStudentDetails = $this->common->getInfo('cart_table','row',array('cart_id'=>$cartId));
					if (!empty($checkStudentDetails) && session()->get('studentDetails')==null) {
						$student_id = $checkStudentDetails->student_id;
						$checkUserExist = $this->common->getInfo('student_table','row',array('student_id'=>$student_id));
						$studentDetails = array(
							'id'=>$checkUserExist->student_id,
							'student_name'=>$checkUserExist->student_name,
							'email'=>$checkUserExist->email,
							'is_logged_in'=>true,
						);
						session()->set('studentDetails',$studentDetails);
					}
                    return redirect()->to('/dashboard');
				}
			}
		}
	}

	// cashfree
	public function cashfreePaymentGateway(){
		try {
			// fetch student cart items
			$getCartDetails = json_decode($this->getCartDetails());
			if (!empty($getCartDetails)) {
				$payableAmtArray = array_map(function($v){
					$discount = $v->discount;
					if ($v->discount_type=='percent') {
						return $v->offer_price - (($v->offer_price*$discount)/100);
					} else {
						return $v->offer_price - $discount;
					}
				}, $getCartDetails);
			}
			$total_amt_to_pay = array_sum($payableAmtArray);
			$studentDetails = session()->get('studentDetails');
			$student_id = $studentDetails['id'];
			$order_id = 'OD'.uniqid($student_id.'M');
			$linkInfo = $this->cashfreePayment($studentDetails,$total_amt_to_pay,$order_id);
			if (!empty($linkInfo)) {
				$linkInfo = json_decode($linkInfo);
				session()->set('link_id',$linkInfo->order_id);
			}
			// save purchase details
			if (!empty($linkInfo)) {
				$insertData = array();
				$cartIdArray = $this->getCartId();
				$insertData['cart_id'] = $cartIdArray['data'];
				$insertData['cf_link_id'] = $linkInfo->cf_order_id;
				$insertData['payment_request_id'] = $linkInfo->order_id;
				$insertData['payment_mode'] = 'cashfree';
				$insertData['total_payment_amount'] = $linkInfo->order_amount;
				$insertData['order_id'] = $order_id;
				$addPurchaseData = $this->common->dbAction('purchase_table',$insertData,'insert',array());
				if (!empty($addPurchaseData)) {
					$response = array('success'=>true,'payment_session_id'=>$linkInfo->payment_session_id);
				} else {
					log_message('error','Link info have not updated in purchase table');
					$response = $this->errorMsg;
				}
			} else{
				log_message('error','Failed to create link info properly');
				$response = $this->errorMsg;
			}
		} catch (\Exception $e) {
			log_message('error',$e->getMessage().' on line no '.$e->getLine());
			$response = $this->errorMsg;
		}
		return json_encode($response);
	}

	public function cashfreePayment($studentDetails,$total_amt_to_pay=0.00,$order_id=''){
		$student_id = $studentDetails['id'];
		$link_id = uniqid($student_id);
		$total_amt_to_pay_formatted = $this->sanitizeAmount($total_amt_to_pay);
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, SERVER_URL.'/pg/orders');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
				    'order_amount' => $total_amt_to_pay_formatted,
				    'order_currency' => 'INR',
				    'customer_details' => [
				    	'customer_id'=>$studentDetails['id'],
				        'customer_name' => $studentDetails['student_name'],
				        'customer_phone' => $studentDetails['mobile_no'],
				        'customer_email' => $studentDetails['email']
				    ],
				    'order_meta' => [
				        'return_url' => base_url().'purchase-status',
				    ],
				    'thank_you_msg'=>'Thank you for your purchase'
				  ]),);

		$headers = array();
		$headers[] = 'X-Client-Secret: '.SECRET_KEY.'';
		$headers[] = 'X-Client-Id: '.CLIENT_ID.'';
		$headers[] = 'X-Api-Version: '.API_VERSION.'';
		$headers[] = 'Content-Type: application/json';
		$headers[] = 'Accept: application/json';
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		$result = curl_exec($ch);
		if (curl_errno($ch)) {
		    echo 'Error:' . curl_error($ch);
		}
		curl_close($ch);
		return $result;
	}

	function sanitizeAmount($rawAmount) {
	    // Remove currency symbols, commas, whitespace
	    $cleaned = preg_replace('/[^0-9.]/', '', $rawAmount);
	    // Convert to float
	    $amount = floatval($cleaned);
	    // Round and format to 2 decimal places
	    return number_format($amount, 2, '.', '');
	}

	public function cashfreepurchaseStatus(){
		echo 'redirecting to.... wait';
		$getData = $this->request->getGet();
		if (session()->get('link_id')==null) {
			echo "Invalid action detected";
			return redirect()->to('dashboard');
			exit;
		}
		$link_id = session()->get('link_id');
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, SERVER_URL.'/pg/orders/'.$link_id);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


		$headers = array();
		$headers[] = 'X-Client-Secret: '.SECRET_KEY.'';
		$headers[] = 'X-Client-Id: '.CLIENT_ID.'';
		$headers[] = 'Accept: application/json';
		$headers[] = "X-Api-Version: ".API_VERSION."";
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		$err = '';
		if (curl_errno($ch)) {
		    echo 'Error:' . curl_error($ch);
		    $err = curl_error($ch);
		}
		$result = curl_exec($ch);

		curl_close($ch);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		   $json_decoded_info = json_decode($result);
		   $purchase_table_fetch_info = $this->common->getInfo('purchase_table','row',array('payment_request_id'=>$link_id));
		   if (!empty($purchase_table_fetch_info)) {
		     $purchaseStatus = $json_decoded_info->order_status;
		     
		     if ($purchaseStatus=='PAID') {
		     	$purchaseStatus = 'Credit';
		   		// update purchase table
		     	$updatePurchaseTable = $this->common->dbAction('purchase_table',array('payment_status'=>$purchaseStatus),'update',array('payment_request_id'=>$link_id));
		     	// update cart items table
	     		$cart_id = $purchase_table_fetch_info->cart_id;
		     	$purchase_id = $purchase_table_fetch_info->purcahse_id;
		     	$update_cart_items_table = $this->common->dbAction('cart_items_table',array('payment_status'=>$purchaseStatus,'purchase_id'=>$purchase_id,'deleted'=>1),'update',array('cart_id'=>$cart_id));
		     	// create invoice for that order
		     	$this->createInvoice($link_id);
		     	// add sales Info
		     	$this->addSalesInfo($purchase_id,$link_id);
	     		return  redirect()->to('dashboard');
		     } else {
			  	$updatePurchaseTable = $this->common->dbAction('purchase_table',array(),'delete',array('payment_request_id'=>$link_id));
			  	if (!empty($updatePurchaseTable)) {
			  		return  redirect()->to('dashboard');
			  	}
		     }
		   }
		}
	}

	public function addNewsLetter(){
		$postData = $this->request->getPost();
		$updateData = array();
		if (isset($postData['newsletter_email'])) {
			$email = $postData['newsletter_email'];
			$userDetails = $this->common->getInfo('student_table','row',array('email'=>$email));

			$updateData['is_student'] = !empty($userDetails) ? 1 : 0;
			$updateData['newsletter_email'] = $email;
			$checkNewsLetterExist = $this->common->getInfo('newsletter','row',array('newsletter_email'=>$email,'deleted'=>0));
			if ($checkNewsLetterExist) {
				$response = array('success'=>false,'message'=>'You have already subsribed newsletter');
			} else {
				$insertNewsLetter = $this->common->dbAction('newsletter',$updateData,'insert',array());
				if ($insertNewsLetter) {
					$response = array('success'=>true,'message'=>'Your subscription request has been taken successfully');
				} else {
					$response = array('success'=>false,'message'=>'Failed to add subscription');
				}
			}
		} else {
			$response = array('success'=>false,'message'=>'Please enter an email Id');
		}
		return json_encode($response);
	}

	public function loadBlogDetailsPage($blog_id=''){
		$data['blog_item'] = $this->common->getInfo('blog_table','row',array('blog_id'=>$blog_id));
		$data['fetchLevels'] = $this->studentModel->fetchLevelModel();
		return view('student/blog_details',$data);
	}

}
