<?php

namespace App\Controllers;
use App\Models\BaseModel;
use App\Models\DashboardModel;
class DashboardController extends BaseController
{
	protected $common;
	protected $dashboardModel;
	public function __construct(){
		$this->common = new BaseModel();
		$this->dashboardModel = new DashboardModel();
	}
    public function loadAdminPanel(){
        $getStudent = $this->common->getInfo('student_table','array',array());
        $data['uploadNotesCount'] = 0;
        $data['getStudentCount'] = count($getStudent);
        $data['studentLastDayEnrolled'] = $this->dashboardModel->lastDayEnrolloedStudent();
        return view('admin/admin_dashboard',$data);
    }

    public function loadUploadNotesPage(){
        return view('admin/upload-notes');
    }

    public function addLevel(){
        try{
            $postData = $this->request->getPost();
            $level_id = $postData['level_id'];
            unset($postData['$level_id']);
            if(!empty($level_id)){
                $addLevel = $this->common->dbAction('level_table',$postData,'update',array('level_id'=>$level_id));
                $type="updated";
            } else {
                $addLevel = $this->common->dbAction('level_table',$postData,'insert',array());
                $type="added";
            }
            if ($addLevel){
                $response = array(
                    'success' =>true,
                    'message'=>"Level $type successfully",
                );
            } else {
                $response = array(
                    'success' =>false,
                    'message'=>"Level already exists",
                );
            }
        } catch(\Exception $e){
            $pattern = "/Duplicate entry/i";
            if(preg_match($pattern, $e->getMessage())==true){
                $response = array(
                    'success' =>false,
                    'message'=>'Level already exists',
                );
            } else {
                $response = array(
                    'success' =>false,
                    'message'=>'Somthing went wrong',
                );
            }
            
        }
        
        return json_encode($response);
    }
    
    public function fetchLevelList(){
        $fetchLevelList = $this->common->getInfo('level_table','array',array('deleted'=>0));
        if(!empty($fetchLevelList)){
            $response =array(
                'success'=>true,
                'data'=>$fetchLevelList,
            );
        } else {
            $response =array(
                'success'=>false,
                'data'=>[],
                'message'=>'Failed to fetch level lists'
            );
        }
        return json_encode($response);
    }

    public function deleteLevel(){
        $postData = $this->request->getPost();
        $levelId = $postData['level_id'];
        $deleted = $levelId;
        $modifyDate = date('Y-m-d H:i:s');
        $deleteLevel = $this->common->dbAction('level_table',array('deleted'=>$deleted,'modify_date'=>$modifyDate),'update',$postData);
        if(!empty($deleteLevel)){
            $this->unlinkPaperFile('level',$levelId);
            $response = array(
                'success'=>true,
                'message'=>'Level has been deleted successfully',
            );
        } else {
            $response = array(
                'success'=>false,
                'message'=>'Failed to delete Level',
            );
        }
        return json_encode($response);
    }

    public function unlinkPaperFile($deleteOptionType='',$option_id=''){
        if($deleteOptionType=='level'){
            $whereArray = array('level_id'=>$option_id, 'deleted'=>0);
        } else if($deleteOptionType=='type'){
            $whereArray = array('type_id'=>$option_id, 'deleted'=>0);
        } else if($deleteOptionType=='subject'){
            $whereArray = array('subject_id'=>$option_id, 'deleted'=>0);
        }
        $fetchPaperDetails = $this->common->getInfo('paper_table','row',$whereArray);
        if(!empty($fetchPaperDetails)){
            $paper_id = $fetchPaperDetails->paper_id;
            if(!empty($fetchPaperDetails->question_paper_upload) && file_exists(PUBLIC_PATH.$fetchPaperDetails->question_paper_upload)){
                unlink(PUBLIC_PATH.$fetchPaperDetails->question_paper_upload);
            }
            if(!empty($fetchPaperDetails->answer_paper_upload) && file_exists(PUBLIC_PATH.$fetchPaperDetails->answer_paper_upload)){
                unlink(PUBLIC_PATH.$fetchPaperDetails->answer_paper_upload);
            }
            $fetchAssignmentFile = $this->common->getInfo('upload_assignment_table','row',array('paper_id'=>$paper_id));
            if(!empty($fetchAssignmentFile)){
                if(!empty($fetchAssignmentFile->assignment_file) && file_exists(PUBLIC_PATH.$fetchAssignmentFile->assignment_file)){
                    unlink(PUBLIC_PATH.$fetchAssignmentFile->assignment_file);
                }
                if(!empty($fetchAssignmentFile->assignment_checked_file) && file_exists(PUBLIC_PATH.$fetchAssignmentFile->assignment_checked_file)){
                    unlink(PUBLIC_PATH.$fetchAssignmentFile->assignment_checked_file);
                }
            }
            return true;
        }
    }
    public function addType(){
        try{
            $postData = $this->request->getPost();
            $type_id = $postData['type_id'];
            unset($postData['$type_id']);
            if(!empty($type_id)){
                $addType = $this->common->dbAction('type_table',$postData,'update',array('type_id'=>$type_id));
                $type="updated";
            } else {
                $addType = $this->common->dbAction('type_table',$postData,'insert',array());
                $type="added";
            }
            if ($addType){
                    $success =true;
                    $message="Type $type successfully";
            } else {
                    $success =false;
                    $message="Failed to update type";
            }
        } catch(\Exception $e){
            $pattern = "/Duplicate entry/i";
            if(preg_match($pattern, $e->getMessage())==true){
                    $success =false;
                    $message='Type already exists for the selected level';
            } else {
                    $success =false;
                    $message='Somthing went wrong';
            }
        }
        $response = array(
            'success' =>$success,
            'message'=>$message,
        );
        return json_encode($response);
    }

    public function fetchTypeList(){
        $postData = $this->request->getPost();
        $fetchTypeList = $this->common->getInfo('type_table','array',array('deleted'=>0,'level_id'=>$postData['level_id']));
        if(!empty($fetchTypeList)){
            $response =array(
                'success'=>true,
                'data'=>$fetchTypeList,
            );
        } else {
            $response =array(
                'success'=>false,
                'data'=>[],
                'message'=>'Failed to fetch type lists'
            );
        }
        return json_encode($response);
    }

    public function deleteType(){
        $postData = $this->request->getPost();
        $typeId = $postData['type_id'];
        $deleted = $typeId;
        $modifyDate = date('Y-m-d H:i:s');
        $deleteType = $this->common->dbAction('type_table',array('deleted'=>$deleted,'modify_date'=>$modifyDate),'update',$postData);
        if(!empty($deleteType)){
            $this->unlinkPaperFile('type',$typeId);
            $response = array(
                'success'=>true,
                'message'=>'Type has been deleted successfully',
            );
        } else {
            $response = array(
                'success'=>false,
                'message'=>'Failed to delete Type',
            );
        }
        return json_encode($response);
    }

    public function addSubject(){
        try{
            $postData = $this->request->getPost();
            $subject_id = $postData['subject_id'];
            unset($postData['$subject_id']);
            if(!empty($subject_id)){
                $addSubject = $this->common->dbAction('subject_table',$postData,'update',array('subject_id'=>$subject_id));
                $type="updated";
            } else {
                $addSubject = $this->common->dbAction('subject_table',$postData,'insert',array());
                $type="added";
            }
            if ($addSubject){
                $success =true;
                $message="Subject $type successfully";
            } else {
                $success =false;
                $message="Failed to update subject";
            }
        } catch(\Exception $e){
            $pattern = "/Duplicate entry/i";
            if(preg_match($pattern, $e->getMessage())==true){
                    $success =false;
                    $message='Subject name is already exists for the selected level';
            } else {
                    $success =false;
                    $message='Somthing went wrong';
            }
        }
        $response = array(
            'success' =>$success,
            'message'=>$message,
        );
        return json_encode($response);
    }

    public function fetchSubjectList(){
        $postData = $this->request->getPost();
        $fetchSubjectList = $this->common->getInfo('subject_table','array',array('deleted'=>0,'level_id'=>$postData['level_id'],'type_id'=>$postData['type_id']));
        if(!empty($fetchSubjectList)){
            $response =array(
                'success'=>true,
                'data'=>$fetchSubjectList,
            );
        } else {
            $response =array(
                'success'=>false,
                'data'=>[],
                'message'=>'Failed to fetch subject lists'
            );
        }
        return json_encode($response);
    }

    public function deleteSubject(){
        $postData = $this->request->getPost();
        $subjectId = $postData['subject_id'];
        $deleted = $subjectId;
        $modifyDate = date('Y-m-d H:i:s');
        $deleteSubject = $this->common->dbAction('subject_table',array('deleted'=>$deleted,'modify_date'=>$modifyDate),'update',$postData);
        if(!empty($deleteSubject)){
            $this->unlinkPaperFile('subject',$subjectId);
            $response = array(
                'success'=>true,
                'message'=>'Subject has been deleted successfully',
            );
        } else {
            $response = array(
                'success'=>false,
                'message'=>'Failed to delete subject',
            );
        }
        return json_encode($response);
    }

    public function addSubjectAdditionalDetails(){
        $postData = $this->request->getPost();
        $subject_id = $postData['subject_id'];
        unset($postData['$subject_id']);
        $udpateSubjectAdditionalDetails = $this->common->dbAction('subject_table',$postData,'update',array('subject_id' => $subject_id));
        if(!empty($udpateSubjectAdditionalDetails)){
            $response = array('success'=>true,'message'=>'Subject Details updated successfully');
        } else {
            $response = array('success'=>false,'message'=>'Failed to add subject details');
        }
        return json_encode($response);
    }
    public function loadUploadNoticePage()
    {
        return view('admin/upload-notice');
    }

    public function uploadNotice(){
        $postData = $this->request->getPost();
        $uploadNotice = $this->common->dbAction('notice_table',$postData,'insert',array());
        if (!empty($uploadNotice)) {
            $response = array(
                'success'=>true,
                'message'=>'Notice Uploaded successfully',
            );
        } else {
            $response = array(
                'success'=>false,
                'message'=>'Failed to upload notice',
            );
        }
        return json_encode($response);
    }

    public function loadNoticeListPage()
    {
        $data['getnoticeList'] = $this->common->getInfo('notice_table','array',array(),'notice_id asc');
        return view('admin/notice_list',$data);
    }

    public function deleteNotice(){
        $deleteId = $this->request->getPost('deleteId');
        $deleteNotice = $this->common->dbAction('notice_table','','delete',array('notice_id'=>$deleteId));
        if (!empty($deleteNotice)) {
           $response = array(
                'success'=>true,
                'message'=>'Notice deleted successfully'
           );
        } else {
            $response = array(
                'success'=>false,
                'message'=>'Notice can not be deleted right now'
           );
        }
        return json_encode($response);
    }

    public function loadStudentListPage(){
        $data['student_list'] = $this->common->getInfo('student_table','array',array(),'student_id desc','student_id,student_name,email');
        return view('admin/student_list',$data);
    }

    public function getStudentList(){
        $postData = $this->request->getPost();
        $fetchStudentDetails  = $this->dashboardModel->getStudentDetails($postData);
    }

    public function fetchSubjectAdditionalDetails(){
        $postData = $this->request->getPost();
        $postData['deleted']=0;
        $fetchSubjectDetails = $this->common->getInfo('subject_table','row',$postData,'subject_id desc','offer_price,original_price,more_details');
        if($fetchSubjectDetails){
            $response = array(
                'success'=>true,
                'message'=>'Subject price fetched successfully',
                'data'=>$fetchSubjectDetails,
            );
        } else {
            $response = array(
                'success'=>false,
                'message'=>'Subject price fetched successfully',
                'data'=>'',
            );
        }
        return json_encode($response);
    }

    public function uploadPaperDetails(){
        $postData = $this->request->getPost();
        $uploaded_question_file = $this->request->getFile('uploaded_question_paper_file');
        $uploaded_answer_file = $this->request->getFile('uploaded_answer_paper_file');
        if(!empty($uploaded_question_file)){
            if ($uploaded_question_file->isValid() && ! $uploaded_question_file->hasMoved()) {
                $newQuestionName = $uploaded_question_file->getRandomName();
                $question_paper_path = "/assets/assetItems/uploaded_question_paper";
                $uploaded_question_file->move(PUBLIC_PATH.$question_paper_path,$newQuestionName);
                $postData['question_paper_upload'] = $question_paper_path.'/'.$newQuestionName;
            }
        }
        if(!empty($uploaded_answer_file)){
            if ($uploaded_answer_file->isValid() && ! $uploaded_answer_file->hasMoved()) {
                $newAnswerName = $uploaded_answer_file->getRandomName();
                $answer_paper_path = "/assets/assetItems/uploaded_answer_paper";
                $uploaded_answer_file->move(PUBLIC_PATH.$answer_paper_path,$newAnswerName);
                $postData['answer_paper_upload'] = $answer_paper_path.'/'.$newAnswerName;
            }
        }
        $postData['active'] = '0';
       $uploadPaper = $this->common->dbAction('paper_table',$postData,'insert',array());
        if(!empty($uploadPaper)){
            $response = array(
                'success'=>true,
                'message'=>'Paper added successfully'
            );
        } else {
            $response = array(
                'success'=>false,
                'message'=>'Failed to add paper'
            );
        }
        return json_encode($response);
    }

    public function fetchStudentDetails(){
        $postData = $this->request->getPost();
        $fetchStudentDetails = $this->dashboardModel->fetchStudentDetailsModel($postData);
        return json_encode($fetchStudentDetails);
    }

    public function changeStudentStatus(){
        $postData = $this->request->getPost();
        $student_id = $postData['student_id'];
        unset($postData['student_id']);
        if($postData['blocked']==0){
            $type = 'unblocked';
        } else {
            $type = 'blocked';
        }
        $updateStudentStatus = $this->common->dbAction('student_table',$postData,'update',array('student_id' => $student_id));
        if(!empty($updateStudentStatus)){
            $response = array(
                'success'=>true,
                'message'=>'Student '.$type.' successfully'
            );
        } else {
            $response = array(
                'success'=>false,
                'message'=>'Failed to change the status'
            );
        }
        return json_encode($response);
    }
    public function loadAssignmentLevel(){
        $data['getAssignmentLevelDetails'] = $this->dashboardModel->fetchAssignmentLevelDetails();
        return view('admin/assignment_level_list',$data);
    }

    public function loadAssignmentPage($level_id=''){
        $data['level_id']=  $level_id;
        return view('admin/assignment_paper_list',$data);
    }

    public function fetchAssignmentDetails(){
        $postData = $this->request->getPost();
        $fetchAssignment = $this->dashboardModel->fetchAssignmentDetailsModel($postData);
        return json_encode($fetchAssignment);
    }

    public function updateRecheckAssignment(){
        $assignment_id = $this->request->getPost('assignment_id');
        $upload_recheck_file = $this->request->getFile('recheckSubmitted_file');
        $assignment_upload_File_by_student = $this->common->getInfo('upload_assignment_table','row',array('assignment_id'=>$assignment_id),'assignment_id desc','assignment_file');
        $assignmentFileNameArray = explode('/',$assignment_upload_File_by_student->assignment_file);
        $assignment_file_name = array_pop($assignmentFileNameArray);
        $fileNameArray = explode('.',$assignment_file_name);
        $fileName = $fileNameArray[0];
        if(!empty($upload_recheck_file)){
            if ($upload_recheck_file->isValid() && ! $upload_recheck_file->hasMoved()) {
                $newAnswerName = $fileName.'.'.$upload_recheck_file->guessExtension();
                $recheck_paper_path = "/assets/assetItems/upload_recheck_paper";
                $upload_recheck_file->move(PUBLIC_PATH.$recheck_paper_path,$newAnswerName);
                $postData['assignment_checked_file'] = $recheck_paper_path.'/'.$newAnswerName;
            }
        }
        $postData['assignment_status'] =2;
        $postData['checked_by_email'] = '';
        $postData['modify_date'] = date('Y-m-d H:i:s');
        if(session()->get('userData')!==null){
            $postData['checked_by_email'] = session()->get('userData')['email'];
        }
        $updateAssignmentFile = $this->common->dbAction('upload_assignment_table',$postData,'update',array('assignment_id'=>$assignment_id,'deleted'=>0));
        // recheck
        $getStudentDetails = $this->dashboardModel->fetchAssignmentStudentDetails($assignment_id);
        $emailTemplate = file_get_contents(PUBLIC_PATH.'/emailTemplate/recheck_template.php');
        $emailTemplate = str_replace('{student_name}',$getStudentDetails->student_name, $emailTemplate);
        $emailTemplate = str_replace('{subject_name}',$getStudentDetails->subject_name, $emailTemplate);
        $subject = "Test Result";
        if($updateAssignmentFile){
            $send_email = $this->sendMail($getStudentDetails->email, $subject, $emailTemplate,'Test Result');
            $response = array('success'=>true,'message'=>'Assignemnt recheck file uploaded successfully');
        } else {
            $response = array('success'=>false,'message'=>'Failed to upload assignment file');
        }
        return json_encode($response);
    }

    public function loadPromocodePage(){
        return view('admin/add_promocodes');
    }
    public function fetchPromocodes(){
        $postData = $this->request->getPost();
        $fetchPromocodes = $this->dashboardModel->fetchPromocodesModel($postData);
        return json_encode($fetchPromocodes);
    }

    public function addPromoCodes(){
        try{
            $postData = $this->request->getPost();
            $code_id = isset($postData['code_id']) ? $postData['code_id'] : '';
            $postData['validity_date'] = $postData['validity_date'].' 11:59:59';
            unset($postData['code_id']);
            if(!empty($code_id)){
                $addPromocode = $this->common->dbAction('promo_code_table',$postData,'update',array('code_id'=>$code_id,'deleted'=>0));
                $type="update";
            } else {
                $addPromocode = $this->common->dbAction('promo_code_table',$postData,'insert',array());
                $type="added";
            }
            if(!empty($addPromocode)){
                $response = array(
                    'success'=>true,
                    'message'=>'Promocode '.$type.' successfully',
                );
            } else {
                $type = str_replace('ed','',$type);
                $response = array(
                    'success'=>false,
                    'message'=>'Failed to'.$type.' promocode',
                );
            }
        } catch(\Exception $e){
            $pattern = "/Duplicate entry/i";
            if(preg_match($pattern, $e->getMessage())==true){
                $response = array(
                    'success' =>false,
                    'message'=>'Prmocode already exists',
                );
            } else {
                $response = array(
                    'success' =>false,
                    'message'=>'Somthing went wrong',
                );
            }
        }
        return json_encode($response);
    }

    public function deletePromocode(){
        $postData = $this->request->getPost();
        $deletePromocode = $this->common->dbAction('promo_code_table',array('deleted'=>1),'update',$postData);
        if(!empty($deletePromocode)){
            $response = array('success'=>true,'message'=>'Promocode has been deleted successfully');
        } else {
            $response = array('success'=>false,'message'=>'Failed to delted promocode');
        }
        return json_encode($response);
    }

    public function getSubjectList(){
        $postData = $this->request->getPost();
        $student_id = $postData['student_id'];
        $card_table_details = $this->common->getInfo('cart_table','row',array('student_id' => $student_id,'deleted'=>0));
        $fetchSubjectListDetails = array();
        if(!empty($card_table_details)){
            $cart_id = !empty($card_table_details->cart_id) ? $card_table_details->cart_id : '';
            $fetchSubjectListDetails = $this->dashboardModel->fetchSubjectDeatils($cart_id);
        }
        return json_encode($fetchSubjectListDetails);
    }

    public function changeSubVisibility(){
        $postData = $this->request->getPost();
        $cart_items_id = $postData['cart_items_id'];
        unset($postData['$cart_items_id']);
        $updateSubVisibility = $this->common->dbAction('cart_items_table',$postData,'update',array('cart_items_id'=>$cart_items_id));
        if(!empty($updateSubVisibility)){
            $response = array('success'=>true);
        } else {
            $response = array('success'=>false);
        }
        return json_encode($response);
    }

    public function exportStudentDetails(){
        $getData = $this->request->getGet('search');
        $fetchStudentDetailsForExport = $this->dashboardModel->fetchStudentDetailsForExportModel($getData);
        ob_start();
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=csv_export.csv');
        $header_args = array( 'Student Id','Student Name', 'Email', 'Mobile No','City Name','State Name','Create Date','Blocked Status');
        
        ob_end_clean();
        $output = fopen( 'php://output', 'w' );
        fputcsv( $output, $header_args );
        foreach( $fetchStudentDetailsForExport as $student_row){
            fputcsv( $output, $student_row);
        }
        fclose( $output );
        exit;
    }

    public function loadPendingPaymentDeatils(){
        return view('admin/pending_payment');
    }
    public function fetchPendingPaymentList(){
        $postData = $this->request->getPost();
        $fetchPendingPaymentList = $this->dashboardModel->fetchPendingPaymentListModel($postData);
        return json_encode($fetchPendingPaymentList);
    }

    public function verifyManualPayment(){
        $postData = $this->request->getPost();
        $fetchManualPaymentDetails = $this->common->getInfo('manual_payment_table','row',array('manual_payment_id'=>$postData['manual_payment_id']));
        $updatePaymentStatus = $this->common->dbAction('manual_payment_table',array('admin_approve'=>$postData['actionType']),'update',array('manual_payment_id'=>$postData['manual_payment_id']));
        if(!empty($updatePaymentStatus)){
            $paymentStatus = 'Pending';
            if($postData['actionType']==1){
                $paymentStatus = 'Credit';
            } else if($postData['actionType']==2){
                $paymentStatus = 'Failed';
            }
            $purchase_table_array = array(
                'payment_status'=>$paymentStatus,
            );
            $purchase_id = $fetchManualPaymentDetails->purchase_id;
            $updatePurchaseUpdate = $this->common->dbAction('purchase_table',$purchase_table_array,'update',array('purcahse_id'=>$purchase_id));
            if(!empty($updatePurchaseUpdate)){
                $cart_items_ids_array = explode(',',$fetchManualPaymentDetails->cart_items_ids);
                $updateCreditStatus = $this->dashboardModel->updateCartPurchaseDetails($cart_items_ids_array,$paymentStatus);
                if(!empty($updateCreditStatus)){
                    $response = array(
                        'sucess'=>true,
                        'message'=>'Payment status updated successfully',
                    );
                } else {
                    $response = array(
                        'sucess'=>false,
                        'message'=>'Payment status not updated in cart items table',
                    );
                }
            } else {
                $response = array(
                    'sucess'=>false,
                    'message'=>'Payment status not updated in purchase table',
                );
            }
        } else {
            $response = array(
                'sucess'=>false,
                'message'=>'Payment status not updated in manual payment entry table',
            );
        }
        return json_encode($response);
    }

    public function fetchExaminarListPage(){
        return view('admin/examinar_list');
    }

    public function getExaminarList(){
        $postData = $this->request->getPost();
        $getExaminarList = $this->dashboardModel->getExaminarListModel($postData);
        return json_encode($getExaminarList);
    }

    public function addExaminar(){
        $postData = $this->request->getPost();
        $examinar_id = $postData['examinar_id'];
        unset($postData['examinar_id']);
        if(!empty($examinar_id)){
            if($postData['examinar_password']!=''){
                $postData['examinar_password'] = md5(md5($postData['examinar_password']));
            } else {
                unset($postData['examinar_password']);
            }
            $addExaminar = $this->common->dbAction('examinar_table',$postData,'update',array('examinar_id'=>$examinar_id));
        } else {
            $postData['examinar_password'] = md5(md5($postData['examinar_password']));
            $addExaminar = $this->common->dbAction('examinar_table',$postData,'insert',array());
        }
        if(!empty($addExaminar)){
            $response = array(
                'success' => true,
                'message' =>'Examinar added successfully',
            );
        } else {
            $response = array(
                'success' => false,
                'message' =>'Failed to add Examinar',
            );
        }
        return json_encode($response);
    }

    public function changeExaminarBlockedStatus(){
        $postData = $this->request->getPost();
        $examinar_id = $postData['examinar_id'];
        $blockedStatus = ($postData['blocked'] == '1') ? ' blocked' : 'unblocked';
        unset($postData['examinar_id']);
        $changeBlockedStatus = $this->common->dbAction('examinar_table',$postData,'update',array('examinar_id' => $examinar_id));
        if(!empty($changeBlockedStatus)){
            $response = array(
                'success'=>true,
                'message'=>'Examinar has beeen '.$blockedStatus.' successfully'
            );
        } else {
            $response = array(
                'success'=>false,
                'message'=>'Failed to change block status'
            );
        }
        return json_encode($response);
    }

    public function examinarChangePassword(){
        $postData = $this->request->getPost();
        if(session()->get('userData')!==null){
            $examinar_id = session()->get('userData')['id'];
            $fetchUserExist = $this->common->getInfo('examinar_table','row',array('examinar_id'=>$examinar_id));
            if(!empty($fetchUserExist)){
                $current_pass = $postData['current_password'];
                if($fetchUserExist->examinar_password==md5(md5($current_pass))){
                    $new_password = md5(md5($postData['new_password']));
                    $updatePassword = $this->common->dbAction('examinar_table',array('examinar_password'=>$new_password),'update',array('examinar_id'=>$examinar_id));
                    if(!empty($updatePassword)){
                        $response = array(
                            'success'=>true,
                            'message'=>'Password updated successfully'
                        );
                    } else {
                        $response = array(
                            'success'=>false,
                            'message'=>'Failed to update password'
                        );
                    }
                } else {
                    $response = array(
                        'success'=>false,
                        'message'=>'Unauthorized access to change password',
                    ); 
                }
            } else {
                $response = array(
                    'success'=>false,
                    'message'=>'User does not exist',
                ); 
            }
        } else {
            $response = array(
                'success'=>false,
                'message'=>'Unauthorized access to change password',
            );
        }
        return json_encode($response);
    }

    public function exportPaperDetails(){
        $getData = $this->request->getGet();
        $getExportPaperData = $this->dashboardModel->getExportPaperModel($getData);
        if(empty($getExportPaperData)){
            
            session()->setFlashdata('error', 'OOPS! No Records Found to Export');
            return view('errors/html/error_404');
            exit;
        }
        ob_start();
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=csv_export.csv');
        $header_args = array('Paper Name','Level Name', 'Type Name', 'Subject Name', 'Student Name', 'Student Email','Student Mobile No','Checked by','Student Submitted Date');
        
        ob_end_clean();
        $output = fopen( 'php://output', 'w' );
        fputcsv( $output, $header_args );
        foreach( $getExportPaperData as $paper_row){
            $csvPrintValue = array($paper_row['paper_name'], $paper_row['level_name'], $paper_row['type_name'], $paper_row['subject_name'], $paper_row['student_name'], $paper_row['email'], $paper_row['mobile_no'], $paper_row['checked_by_email'],$paper_row['create_date']);
            fputcsv($output, $csvPrintValue);
        }
        fclose( $output );
        exit;
    }

    public function loadPaperListPage(){
        return view('admin/paper_list');
    }

    public function fetchedPaperList(){
        $postData = $this->request->getPost();
        $fetchedPaperList = $this->dashboardModel->fetchedPaperListModel($postData);
        return json_encode($fetchedPaperList);
    }

    public function removePaper(){
        $postData = $this->request->getPost();
        $column_name = $postData['type'];
        $paper_id = $postData['paper_id'];
        $fetchPaperUpload = $this->common->getInfo('paper_table','row',array('paper_id'=>$postData['paper_id'],'deleted'=>0));
        $removePaperUpload = $this->common->dbAction('paper_table',array($column_name=>''),'update',array('paper_id'=>$paper_id));
        if (!empty($removePaperUpload)) {
            $filePath = PUBLIC_PATH.$fetchPaperUpload->$column_name;
            if (file_exists($filePath)) {
               unlink($filePath);
            }
            $response = array('success'=>true,'message'=>'File removed successfully');
        } else {
            $response = array('success'=>false,'message'=>'Failed to remove file');
        }
        return json_encode($response);
    }

    public function uploadFile(){
        $postData = $this->request->getPost();
        $paper_id = $postData['paper_id'];
        $postFile = $this->request->getFile('uploadFile');
        $type = $postData['type'];
        $data = array();
        if ($postFile->isValid() && ! $postFile->hasMoved()) {
            $newName = $postFile->getRandomName();
            if($type=='answer_paper_upload'){
                $paper_path = "/assets/assetItems/uploaded_answer_paper";
            } else {
                $paper_path = "/assets/assetItems/uploaded_question_paper";
            }
            $postFile->move(PUBLIC_PATH.$paper_path,$newName);
            $data[$type] = $paper_path.'/'.$newName;
        }
        $uploadNewFile = '';
        if(!empty($data)){
            $uploadNewFile = $this->common->dbAction('paper_table',$data,'update',array('paper_id'=>$paper_id));
        }
        if(!empty($uploadNewFile)){
            $response = array('success'=>true,'message'=>'File has been uploaded successfully');
        } else {
            $response = array('success'=>false,'message'=>'Failed to update file');
        }
        return json_encode($response);
    }

    public function changePaperStatus(){
        $postData = $this->request->getPost();
        $paper_id = $postData['paper_id'];
        unset($postData['paper_id']);
        $changePaperDetails = $this->common->dbAction('paper_table',$postData,'update',array('paper_id'=>$paper_id));
        if(!empty($changePaperDetails)){
            $response = array('success'=>true,'message'=>'Paper status changed successfully');
        } else {
            $response = array('success'=>false,'message'=>'Failed to change the status');
        }
        return json_encode($response);
    }

    public function updatePaperDetails(){
        $postData = $this->request->getPost();
        $paper_id = $postData['paper_id'];
        unset($postData['paper_id']);
        $updatePaperDetails = $this->common->dbAction('paper_table',$postData,'update',array('paper_id'=>$paper_id));
        if(!empty($updatePaperDetails)){
            $response = array('success'=>true,'message'=>'Paper details has been updated successfully');
        } else {
            $response = array('success'=>false,'message'=>'Failed to update paper details');
        }
        return json_encode($response);
    }

    public function uplodTypeMoreDetails(){
        $postData = $this->request->getPost();
        $type_id = $postData['type_id'];
        unset($postData['type_id']);
        if (!empty($type_id)) {
            $updateMoreDetails = $this->common->dbAction('type_table',$postData,'update',array('type_id'=>$type_id));
            if (!empty($updateMoreDetails)) {
                $success = true;
                $message = 'More details for type has been updated successfully';
            } else {
                $success = true;
                $message = 'Failed to update more details for type';
            }
        } else {
            $success =false;
            $message= 'Please select a type';
        }
        $response = array('success'=>$success,'message'=>$message);
        return json_encode($response);
    }

    public function fetchTypeDetails(){
        $postData = $this->request->getPost();
        $fetchTypeDetails = $this->common->getInfo('type_table','row',$postData);
        if (!empty($fetchTypeDetails)) {
           $response = array('success'=>true,'data'=>$fetchTypeDetails);
        } else {
           $response = array('success'=>false,'data'=>'');
        }
        return json_encode($response);
    }

    public function uploadTypeSchedule()
    {
        $postData =$this->request->getPost();
        $type_name = $postData['type_name'];
        unset($postData['type_name']);
        $postFile = $this->request->getFile('schedule_file');
        if ($postFile->isValid() && ! $postFile->hasMoved()) {
            $fileName = $type_name.'-schedule.'.$postFile->guessExtension();
            $fileName = str_replace("/","_",$fileName);
            $fileName = str_replace(" ","_",$fileName);
            $newName = $postFile->getRandomName();
            $postFile->move(PUBLIC_PATH.'/assets/assetItems/schedule/',$newName);
            $data['schedule_file'] = 'assets/assetItems/schedule/'.$newName;
            $data['file_name'] = $fileName;
        }
        $uploadSchedule = $this->common->dbAction('type_table',$data,'update',$postData);
        if (!empty($uploadSchedule)) {
            $response = array('success'=>true,'message'=>'Schedule has been uploaded successfully');
        } else {
            $response = array('success'=>false,'message'=>'Failed to upload schedule');
        }
        return json_encode($response);
    }

    public function removeTypeSchedule(){
        $postData = $this->request->getPost();
        $fetchTypeDetails = $this->common->getInfo('type_table','row',$postData);
        if (!empty($fetchTypeDetails->schedule_file)) {
            $filePath = PUBLIC_PATH.'/'.$fetchTypeDetails->schedule_file;
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
        $updateTypeTable = $this->common->dbAction('type_table',array('schedule_file'=>''),'update',$postData);
        if (!empty($updateTypeTable)) {
            $response = array('success'=>true,'message'=>'Schedule file has been removed successfully');
        } else {
            $response = array('success'=>false,'message'=>'Failed to remove schedule');
        }
        return json_encode($response);
    }

    public function loadNewsLetterPage(){
        return view('admin/newsletter');
    }

    public function fetchNewsLetter(){
        $postData = $this->request->getPost();
        $fetchNewsLetter = $this->dashboardModel->fetchNewsLetterModel($postData);
        return json_encode($fetchNewsLetter);
    }

    public function changeNewsletterStatus(){
        $postData = $this->request->getPost();
        $active = $postData['active'];
        $actveMessage = $active ? 'activated' : 'deactivated';
        $newsletter_id = $postData['newsletter_id'];
        $updateNewsLetterStatus = $this->common->dbAction('newsletter',array('active'=>$active),'update',array('newsletter_id'=>$newsletter_id));
        if (!empty($updateNewsLetterStatus)) {
           $response = array('success'=>true,'message'=>'Student email has been '.$actveMessage.' successfully');
        } else {
            $response = array('success'=>false,'message'=>'Failed to change Status');
        }
        return json_encode($response);
    }

    public function sendnewsLetter(){
        $postData = $this->request->getPost();
        $message = $postData['message'];
        $subject = $postData['subject'];
        $fetchSubscriberList = $this->common->getInfo('newsletter','',array('deleted'=>0,'active'=>1));
        $totalStudentCount = count($fetchSubscriberList);
        $sendCount = 0;
        if (!empty($fetchSubscriberList)) {
            foreach ($fetchSubscriberList as $value) {
                $to = $value->newsletter_email;
                $sendMail = $this->sendMail($to, $subject, $message,'NewsLetter');
                if ($sendMail) {
                    $sendCount++;
                }
            }
            if ($sendCount>0) {
            $response = array('success'=>true,'message'=>'NewsLetter has been sent successfully');
            } else {
                $response = array('success'=>false,'message'=>'Failed to send newspaper');
            }
        } else {
            $response = array('success'=>false,'message'=>'No subscription details found');
        }
        
        return json_encode($response);
    }

    public function loadBlogPage(){
        return view('admin/blog_list');
    }

    public function fetchBlogList(){
        $postData = $this->request->getPost();
        $fetchBlogList = $this->dashboardModel->fetchBlogListModel($postData);
        return json_encode($fetchBlogList);
    }

    public function loadAddBlogPage($blog_id=''){
        $data['blog_id'] = $blog_id;
        $data['blog_data'] = '';
        if (!empty($blog_id)) {
            $data['blog_data'] = $this->common->getInfo('blog_table','row',array('blog_id'=>$blog_id,'deleted'=>0));
        }
        return view('admin/add_blog',$data);
    }

    public function addBlogDetails(){
        $postData = $this->request->getPost();
        $postFile = $this->request->getFile('imageFile');
        if (!empty($postFile)) {
            if ($postFile->isValid() && ! $postFile->hasMoved()) {
                $newName = $postFile->getRandomName();
                $postFile->move(PUBLIC_PATH.'/assets/assetItems/blog/',$newName);
                $data['blog_temp_image'] = '/assets/assetItems/blog/'.$newName;
            }
        }
        $data['blog_heading'] = $postData['blog_heading'];
        $data['blog_text'] = $postData['blog_text'];
        if (isset($postData['blog_id'])) {
            $insertData = $this->common->dbAction('blog_table',$data,'update',array('blog_id'=>$postData['blog_id']));
            $type = 'updated';
        } else{
            $insertData = $this->common->dbAction('blog_table',$data,'insert',array());
            $type = 'added';
        }
        if (!empty($insertData)) {
            $response = array('success'=>true,'message'=>'Blog has been '.$type.' successfully');
        } else {
            $response = array('success'=>false,'message'=>'Failed to update blog details');
        }
        return json_encode($response);
    }

    public function changeBlogStatus(){
        $postData = $this->request->getPost();
        $active = $postData['active'];
        $activeStatus = $active ? 'activated' : 'deactivated';
        $updateStatus = $this->common->dbAction('blog_table',array('active'=>$active),'update',array('blog_id'=>$postData['blog_id']));
        if (!empty($updateStatus)) {
            $response = array('success'=>true,'message'=>'Status has been '.$activeStatus.' successfully');
        } else {
            $response = array('success'=>false,'message'=>'Failed to change status');
        }
        return json_encode($response);
    }

    public function deleteBlogItem(){
        $postData = $this->request->getPost();
        $delete_id = $postData['blog_id'];
        $deleteBlogItem = $this->common->dbAction('blog_table',array('deleted'=>1),'update',array('blog_id'=>$delete_id));
        if (!empty($deleteBlogItem)) {
            $response = array('success'=>true,'message'=>'Blog item has been deleted successfully');
        } else {
            $response = array('success'=>false,'message'=>'Failed to delete blog item');
        }
        return json_encode($response);
    }

    public function loadNotes(){
        return view('admin/notes_list');
    }

    public function fetchNotesDetails(){
        $postData = $this->request->getPost();
        $fetchNotesDetails = $this->dashboardModel->fetchNotesDetails($postData);
        return json_encode($fetchNotesDetails);
    }

    public function loadAddNotesPage($notes_id=''){
        $data['level_list'] = $this->common->getInfo('level_table','',array('deleted'=>0));
        $data['subject_details'] ='';
        if (!empty($notes_id)) {
            $notes_list = $this->common->getInfo('notes_table','row',array('note_id'=>$notes_id));
            if (!empty($notes_list)) {
                $data['subject_details'] = $this->common->getInfo('subject_table','row',array('subject_id'=>$notes_list->subject_id));
            }
            $data['notes_list'] = $notes_list;
        }
        return view('admin/add_notes',$data);
    }

    public function uploadSubNotes(){
        $postData = $this->request->getPost();
        $postFile = $this->request->getFile('attachment');
        if ($postFile->isValid() && ! $postFile->hasMoved()) {
            $data['notes_name'] = $postData['notes_name'];
            $newName = str_replace(" ", "_", $postData['subject_name']);
            $newName = str_replace("", "_", $newName);
            $newName = $newName.'.'.$postFile->getClientExtension();
            $postFile->move(PUBLIC_PATH.'/assets/assetItems/notes/', $newName);
            $data['attachment'] = '/assets/assetItems/notes/'.$newName;
        }
        $data['subject_id'] = $postData['subject_id'];
        if (isset($postData['note_id'])) {
            $updatePostData = $this->common->dbAction('notes_table',$data,'update',array('note_id'=>$postData['note_id']));
            $message = 'updated';
        } else {
            $updatePostData = $this->common->dbAction('notes_table',$data,'insert',array());
            $message = 'added';
        }
        if (!empty($updatePostData)) {
            $response = array('success'=>true,'message'=>'Notes has been '.$message.' successfully');
        } else {
            $response = array('success'=>true,'message'=>'Notes has been '.$message.' successfully');
        }
        return json_encode($response);
    }

    public function statusUpdate(){
        $postData = $this->request->getPost();
        $note_id = $postData['note_id'];
        unset($postData['note_id']);
        $activeStatus = $postData['active'] ? 'activated' : 'deactivated';
        $updateStatus = $this->common->dbAction('notes_table',$postData,'update',array('note_id'=>$note_id));
        if (!empty($updateStatus)) {
            $response = array('success'=>true,'message'=>'Notes has been '.$activeStatus.' successfully');
        } else {
            $response = array('success'=>false,'message'=>'Failed to change status');
        }
        return json_encode($response);
    }
    public function deleteNotes(){
        $postData = $this->request->getPost();
        $deleteNotes = $this->common->dbAction('notes_table',array('deleted'=>1),'update',$postData);
        if (!empty($deleteNotes)) {
            $response = array('success'=>true,'message'=>'Note has been deleted successfully');
        } else {
            $response = array('success'=>false,'message'=>'Failed to delete note');
        }
        return json_encode($response);
    }
    public function loadStudentAccess(){
        $data['level_list'] = $this->common->getInfo('level_table','',array('deleted'=>0)); 
        return view('admin/student_validation_access',$data);
    }

    public function fetchTypeListForAccess(){
        $postData = $this->request->getPost();
        $fetchTypeList = $this->dashboardModel->fetchTypeListForAccessModel($postData);
        return json_encode($fetchTypeList);
    }

    public function studentAccess(){
        $postData = $this->request->getPost();
        $adminSessionDetails = session()->get('userData');
        $adminDetails = $this->common->getInfo('admin_user','row',array('id'=>$adminSessionDetails['id']));
        if ($adminDetails->password==md5(md5($postData['admin_password']))) {
            // fetchSubjectDetails
            $subjectDetails = $this->common->getInfo('subject_table','',array('type_id'=>$postData['type_id']));
            foreach($subjectDetails as $subjectRow){
                $cartItemsDetails = $this->common->dbAction('cart_items_table',array('access'=>$postData['access']),'update',array('subject_id'=>$subjectRow->subject_id));
            }
            // $typeAccessDetails = $this->common->dbAction('type_table',array('access'=>$postData['access']),'update',array('type_id'=>$postData['type_id']));
            // if (!empty($typeAccessDetails)) {
            if ($postData['access']==0) {
                $this->studentFileDocRemoved($postData['type_id']);
            }
            $accessMsg = $postData['access']==1 ? 'added' : 'removed';
            $response = array('success'=>true,'message'=>'Access '.$accessMsg.' from all the student for this type');
            // } else {
            //     $response = array('success'=>false,'message'=>'Failed to update access');
            // }
        } else {
            $response = array('success'=>false,'message'=>'Admin Password does not match');
        }
        return json_encode($response);
    }

    public function studentFileDocRemoved($type_id=''){
        $subject_details = $this->common->getInfo('subject_table','',array('type_id'=>$type_id));
        if (!empty($subject_details)) {
            foreach ($subject_details as $subjectRow) {
                // notes delete
                $fetchNotesArray = $this->common->getInfo('notes_table','',array('subject_id'=>$subjectRow->subject_id));
                
                foreach ($fetchNotesArray as  $notes_row) {
                    $notesPath = PUBLIC_PATH.$notes_row->attachment;
                    if (!empty($notes_row->attachment) && file_exists($notesPath)) {
                        unlink($notesPath);
                    }
                }
                $notesUpdateArray['deleted']=1;
                $notesUpdateArray['modify_date']=date('Y-m-d');
                $notesUpdateArray['attachment']='';
                $this->common->dbAction('notes_table',$notesUpdateArray,'update',array('subject_id'=>$subjectRow->subject_id));

                // remove paper attachment
                $fetchPaperDetails = $this->common->getInfo('paper_table','',array('subject_id'=>$subjectRow->subject_id));
                if (!empty($fetchPaperDetails)) {
                    foreach ($fetchPaperDetails as  $paper_row) {
                        $questionPaperPath = PUBLIC_PATH.$paper_row->question_paper_upload;
                        if (!empty($paper_row->question_paper_upload) && file_exists($questionPaperPath)) {
                            unlink($questionPaperPath);
                        }
                        $answerPaperPath = PUBLIC_PATH.$paper_row->answer_paper_upload;
                        if (!empty($paper_row->answer_paper_upload) && file_exists($answerPaperPath)) {
                            unlink($answerPaperPath);
                        }
                        // remove assignment
                        $fetchUploadAssignDetails = $this->common->getInfo('upload_assignment_table','',array('paper_id'=>$paper_row->paper_id));
                        if (!empty($fetchUploadAssignDetails)) {
                           foreach ($fetchUploadAssignDetails as $fetchUploadAssignmentRow) {
                                $uploadAssignmentPath = PUBLIC_PATH.$fetchUploadAssignmentRow->assignment_file;
                                if (!empty($fetchUploadAssignmentRow->assignment_file) && file_exists($uploadAssignmentPath)) {
                                    unlink($uploadAssignmentPath);
                                }
                                $uploadAssignmentCheckedPath = PUBLIC_PATH.$fetchUploadAssignmentRow->assignment_checked_file;
                                if (!empty($fetchUploadAssignmentRow->assignment_checked_file) && file_exists($uploadAssignmentCheckedPath)) {
                                    unlink($uploadAssignmentCheckedPath);
                                }
                           }
                        }
                    }
                    $paperUpdateArray['deleted']=1;
                    $paperUpdateArray['modify_date']=date('Y-m-d');
                    $paperUpdateArray['question_paper_upload']='';
                    $paperUpdateArray['answer_paper_upload']='';
                    $this->common->dbAction('paper_table',$paperUpdateArray,'update',array('subject_id'=>$subjectRow->subject_id));
                }
            }
        }
        return true;
    }
}
?>