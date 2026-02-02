<?php

namespace App\Controllers;
use App\Models\BaseModel;
use App\Models\CartModel;
use App\Models\StudentDashboardModel;
use App\Models\StudentModel;
class STDashboradController extends BaseController{
    private $studentDashboardModel;
    private $common;
    function __construct(){
        $this->studentDashboardModel = new StudentDashboardModel();
        $this->studentModel = new StudentModel();
        $this->common = new BaseModel();
    }

    public function loadMyResourceLevelPage(){
        $studentDetails = session()->get('studentDetails');
        $student_id = $studentDetails['id'];
        $cartDetails = $this->common->getInfo('cart_table','row',array('student_id'=>$student_id,'deleted'=>0),'cart_id desc','cart_id');
        if(!empty($cartDetails)){
            session()->push('studentDeatils',['cart_id'=>$cartDetails->cart_id]);
        }
        $data['fetchAvailbleLevel'] = $this->common->getInfo('level_table','array',array('deleted'=>0));
        $data['fetchLevels'] = $this->studentModel->fetchLevelModel();
        return view('student/my_resource_level_list',$data);
    }

    public function loadMyResourceTypePage($level_id=''){
        $studentDetails = session()->get('studentDetails');
        $cart_id = $studentDetails['cart_id'];
        $data['fetchAvailbleType'] = $this->studentDashboardModel->fetchAvailableType($cart_id,$level_id);
        $data['fetchLevels'] = $this->studentModel->fetchLevelModel();
        return view('student/my_resource_type_list',$data);
    }

    public function loadMyResourceSubjectPage($item_type=''){
        $data['fetchAvailbleSubject'] ='';
        if(session()->get('studentDetails')!==null){
            $studentDetails = session()->get('studentDetails');
            $data['item_type'] = $item_type;
            if ($item_type!='free') {
                $cartIdArray = $this->getCartId();
                if($cartIdArray['success']){
                    $cart_id = $cartIdArray['data'];
                    $fetchAvailbleSubject = $this->studentDashboardModel->fetchAvailableSubject($cart_id);
                }
            } else {
                $student_id = session()->get('studentDetails')['id'];
                $studentInfo = $this->common->getInfo('student_table','row',array('student_id'=>$student_id));
                $level_id = $studentInfo->current_level;
                $fetchAvailbleSubject = $this->studentDashboardModel->fetchFreeSubject('',$level_id);
            }
            $i = 0;
            foreach ($fetchAvailbleSubject as $key => $value) {
                $fetchAvailbleSubject[$i]['subject_id'] = $this->encryptValue($value['subject_id']);
                $i++;
            }
            $data['fetchAvailbleSubject'] = $fetchAvailbleSubject;
        }
        $data['fetchLevels'] = $this->studentModel->fetchLevelModel();
        return view('student/my_resource_subject_list',$data);
    }

    

    public function loadPaperListPage($subject_id='',$item_type=''){
        if(session()->get('studentDetails')!==null){
            $studentDetails = session()->get('studentDetails');
            $data['fetchLevels'] = $this->studentModel->fetchLevelModel();
            $data['item_type'] = $item_type;
            $subject_id = $this->decryptValue($subject_id);
            if ($item_type!='free') {
                $cartIdArray = $this->getCartId();
                $validateSubject = '';
                if($cartIdArray['success']){
                    $cart_id = $cartIdArray['data'];
                    $validateSubject = $this->common->getInfo('cart_items_table','row',array('cart_id'=>$cart_id,'subject_id'=>$subject_id,'payment_status'=>'Credit'));
                }
                if(empty($validateSubject)){
                    throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
                } else {
                    if (!empty($subject_id)) {
                        $data['getPaperDetails'] = $this->studentDashboardModel->getPaperListModel($subject_id);
                        return view('student/my_resource_paper_list_page',$data);
                    } else {
                        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
                    }
                }
            } else{
                $data['getPaperDetails'] = $this->studentDashboardModel->getPaperListModel($subject_id,'free');
                return view('student/my_resource_paper_list_page',$data);
            }
        }
    }

    public function uploadAssignmentFile(){
        $postData = $this->request->getPost();
        $paper_id = $postData['paper_id'];
        $assignment_file = $this->request->getFile('assignment_file');
        if(session()->get('studentDetails')!==null){
            $studentDetails = session()->get('studentDetails');
            $student_id = $studentDetails['id'];
            $student_email = $studentDetails['email'];
            $postData['student_id'] = $student_id;
            $paper_details = $this->common->getInfo('paper_table','row',array('paper_id'=>$paper_id),'paper_id desc','paper_name');
            $checkIfPaperExist = $this->common->getInfo('upload_assignment_table','row',array('student_id' => $student_id,'paper_id'=>$paper_id,'deleted'=>0));
            if(!empty($checkIfPaperExist)){
                $response = array(
                    'success'=>false,
                    'message'=>'Assignment already submitted',
                );
                return json_encode($response);
                exit;
            }
            ini_set('upload_max_filesize', '-1');
            if ($assignment_file->isValid() && ! $assignment_file->hasMoved()) {
                // $file_extension = $assignment_file->guessExtension();
                // $student_email_formated = str_replace('@','_',$student_email);
                // $student_email_formated = str_replace('.','_',$student_email_formated);
                // $student_email_formated = str_replace(' ','_',$student_email_formated);
                // $newName = $student_email_formated.'_'.($paper_details->paper_name).'.'.$file_extension;
                $newName = $assignment_file->getRandomName();
                $assignmentPath = '/assets/assetItems/upload_assignment_paper';
                $assignment_file->move(PUBLIC_PATH . $assignmentPath, $newName);
                $postData['assignment_file'] = $assignmentPath.'/'.$newName;
                $postData['assignment_status'] = '1';
            }
            $uploadAssignment = $this->common->dbAction('upload_assignment_table',$postData,'insert',array());
            if($uploadAssignment){
                $response = array(
                    'success' =>true,
                    'message' =>'Assignment submitted successfully',
                );
            } else {
                $response = array(
                    'success' =>false,
                    'message' =>'Failed to submit assignment',
                );
            }
            return json_encode($response);
        }
    }

    public function fetchAssignmentStatus(){
        if(session()->get('studentDetails')!==null){
            $student_id = session()->get('studentDetails')['id'];
            $fetchAssigment = $this->common->getInfo('upload_assignment_table','array',array('deleted'=>0,'student_id'=>$student_id),'assignment_id desc','assignment_status,paper_id,assignment_checked_file');
            return json_encode($fetchAssigment);
        }else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        
    }

     public function loadNotesSubjectList($item_type=''){
        if (session()->get('studentDetails')!==null) {
            $data['fetchLevels'] = $this->studentModel->fetchLevelModel();
            $studentDetails = session()->get('studentDetails');
            $student_id = $studentDetails['id'];
            if ($item_type!='free') {
                $cart_table = $this->common->getInfo('cart_table','row',array('student_id'=>$student_id,'deleted'=>0));
                if ($cart_table) {
                    $subject_id_details = $this->studentDashboardModel->getNotesSubjectList($cart_table->cart_id);
                    $data['subject_id_details'] = $subject_id_details;
                    return view('student/subject_notes_list',$data);
                }
            } else {
                $studentInfo = $this->common->getInfo('student_table','row',array('student_id'=>$student_id));
                if (!empty($studentInfo)) {
                    $level_id = $studentInfo->current_level;
                    $subject_id_details = $this->studentDashboardModel->getFreeNotesSubjectList('',$level_id);
                    $i = 0;
                    foreach ($subject_id_details as $key => $value) {
                        ($subject_id_details[$i])->subject_id = $this->encryptValue($value->subject_id);
                        $i++;
                    }
                    $data['subject_id_details'] = $subject_id_details;
                    return view('student/subject_notes_list',$data); 
                }
            }
        }
    }

	public function loadNotesList($subject_id='',$item_type=''){
        $subject_id = !empty($subject_id) ? $this->decryptValue($subject_id) : '';
        $subject_details = $this->common->getInfo('subject_table','row',array('subject_id'=>$subject_id,'deleted'=>0));
        $data['subject_details'] = $subject_details;
        $data['notes_list'] = array();
        if (!empty($subject_details)) {
            $data['notes_list'] = $this->common->getInfo('notes_table','',array('subject_id'=>$subject_id,'deleted'=>0));
        }
        $data['fetchLevels'] = $this->studentModel->fetchLevelModel();
        return view('student/student_notes_list',$data);
    }

    public function downloadInvoice(){
        $mpdf = new \Mpdf\Mpdf();
        $getItem = $this->request->getGet();
        if (isset($getItem['order_id'])) {
            $order_id = base64_decode($getItem['order_id']);
            $data['invoice_info'] = $this->common->getInfo('invoice_table','row',array('order_id'=>$order_id));
            $pdf_name = 'invoice-'.$order_id.'.pdf';
            $html = view('student/test',$data); 
            $mpdf->WriteHTML($html);
            $mpdf->Output($pdf_name,"D");
        }
    }
    public function loadAmendmentList($subject_id=''){
        if (!empty($subject_id)) {
            $data['amendment_list'] = $this->common->getInfo('amendment_table','',array('subject_id'=>$subject_id));
            $data['fetchLevels'] = $this->studentModel->fetchLevelModel();
            return view('student/amendment_list',$data);
        } else{
            throw new Exception("Error Processing Request", 404);
        }
    }

    public function loadAmendmentSubjectList(){
        if (session()->get('studentDetails')!==null) {
            $studentDetails = session()->get('studentDetails');
            $student_id = $studentDetails['id'];
            $cart_table = $this->common->getInfo('cart_table','row',array('student_id'=>$student_id,'deleted'=>0));
            if ($cart_table) {
                $subject_id_details = $this->studentDashboardModel->getAmendmentSubjectList($cart_table->cart_id);
                $data['fetchLevels'] = $this->studentModel->fetchLevelModel();
                $data['subject_id_details'] = $subject_id_details;
                return view('student/amendment_subject_list',$data);
            }
        }
    }

    public function loadQbankList($subject_id=''){
        if (!empty($subject_id)) {
            $data['qbank_list'] = $this->common->getInfo('qbank_table','',array('subject_id'=>$subject_id));
            $data['fetchLevels'] = $this->studentModel->fetchLevelModel();
            return view('student/question_bank/qbank_list',$data);
        } else{
            throw new Exception("Error Processing Request", 404);
        }
    }

    public function loadQbankSubjectList(){
        if (session()->get('studentDetails')!==null) {
            $studentDetails = session()->get('studentDetails');
            $student_id = $studentDetails['id'];
            $cart_table = $this->common->getInfo('cart_table','row',array('student_id'=>$student_id,'deleted'=>0));
            if ($cart_table) {
                $subject_id_details = $this->studentDashboardModel->getQbankSubjectList($cart_table->cart_id);
                $data['fetchLevels'] = $this->studentModel->fetchLevelModel();
                $data['subject_id_details'] = $subject_id_details;
                return view('student/question_bank/qbank_subject_list',$data);
            }
        }
    }
   
}