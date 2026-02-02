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

    // level
    public function loadAddLevelPage($level_id=''){
        $data['levelDetails'] = '';
        if (!empty($level_id)) {
            $data['levelDetails'] = $this->common->getInfo('level_table','row',array('level_id'=>$level_id));
        }
        return view('admin/level/add_level',$data);
    }

    public function loadLevelListPage(){
        return view('admin/level/level_list');
    }

    public function fetchLevelListPage(){
        $postData = $this->request->getPost();
        $fetchLevelList = $this->dashboardModel->fetchLevelListModel($postData);
        return json_encode($fetchLevelList);
    }

    public function addLevel(){
        try{
            $postData = $this->request->getPost();
            $level_id = $postData['level_id'];
            unset($postData['level_id']);
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

    public function deleteLevel(){
        $postData = $this->request->getPost();
        $levelId = $postData['level_id'];
        $deleted = $levelId;
        $modifyDate = date('Y-m-d H:i:s');
        $deleteLevel = $this->common->dbAction('level_table',array('deleted'=>$deleted,'modify_date'=>$modifyDate),'update',$postData);
        $deleteType = $this->common->dbAction('type_table',array('deleted'=>$deleted,'modify_date'=>$modifyDate),'update',$postData);
        $deleteSubject = $this->common->dbAction('subject_table',array('deleted'=>$deleted,'modify_date'=>$modifyDate),'update',$postData);
        $getSubjectList = $this->common->getInfo('subject_table','',$postData);
        foreach ($getSubjectList as $sujectRow) {
            $subject_id = $subjectRow->subject_id;
            $subjectArray = array('subject_id'=>$subject_id);
            $deleteNote = $this->common->dbAction('notes_table',array('deleted'=>$deleted,'modify_date'=>$modifyDate),'update',$subjectArray);
        }
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

    // Type
    public function loadAddTypePage($type_id=''){
        $data['fetchLevelList'] = $this->common->getInfo('level_table','',array('deleted'=>0));
        $data['fetchTypeRow'] = '';
        if (!empty($type_id)) {
            $data['fetchTypeRow'] = $this->common->getInfo('type_table','row',array('type_id'=>$type_id));
        }
        return view('admin/type/add_type',$data);
    }

    public function loadTypeListPage(){
        return view('admin/type/type_list');
    }

    public function fetchTypeListPage(){
        $postData = $this->request->getPost();
        $fetchTypeList = $this->dashboardModel->fetchTypeListModel($postData);
        return json_encode($fetchTypeList);
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
            $type_name = $postData['type_name'];
            unset($postData['type_id']);
            $files = $this->request->getFile('schedule_file');
            if (!empty($files)) {
                $fileName = $type_name.'-schedule.'.$files->guessExtension();
                $fileNewName = $files->getRandomName();
                $uploadPath = 'assetItems/schedule/';
                $files->move(PUBLIC_PATH.'/'.$uploadPath,$fileNewName);
                $postData['schedule_file'] = 'assetItems/schedule/'.$fileNewName;
                $postData['file_name'] = $fileName;
            }
            if(!empty($type_id)){
                $addType = $this->common->dbAction('type_table',$postData,'update',array('type_id'=>$type_id));
                if (isset($postData['batch_info'])) {
                    $checkIfExist = $this->common->getInfo('batch_table','row',array('type_id'=>$type_id));
                    $batchArray = array();
                    $batchArray['batch_name'] = $postData['batch_info'];
                    $batchArray['type_id'] = $type_id;
                    if (!empty($checkIfExist)) {
                        $addBatch = $this->common->dbAction('batch_table',$batchArray,'update',array('type_id'=>$type_id));
                    } else {
                        echo 'jello';
                        $addBatch = $this->common->dbAction('batch_table',$batchArray,'insert',array());
                    }
                    
                }
                $type="updated";
            } else {
                $addType = $this->common->dbAction('type_table',$postData,'insert_id',array());
                if (isset($postData['batch_info'])) {
                    $batchArray = array();
                    $batchArray['batch_name'] = $postData['batch_info'];
                    $batchArray['type_id'] = $addType;
                    $addBatch = $this->common->dbAction('batch_table',$batchArray,'insert',array());
                }
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

    public function deleteType(){
        $postData = $this->request->getPost();
        $typeId = $postData['type_id'];
        $deleted = $typeId;
        $modifyDate = date('Y-m-d H:i:s');
        $fetchTypeDetails = $this->common->getInfo('type_table','row',array('type_id'=>$typeId));
        if (!empty($fetchTypeDetails) && !empty($fetchTypeDetails->schedule_file)) {
            if (file_exists(PUBLIC_PATH.$fetchTypeDetails->schedule_file)) {
                unlink(PUBLIC_PATH.$fetchTypeDetails->schedule_file);
            }
        }
        $deleteType = $this->common->dbAction('type_table',array('deleted'=>$deleted,'modify_date'=>$modifyDate),'update',$postData);
        $deleteSubject = $this->common->dbAction('subject_table',array('deleted'=>$deleted,'modify_date'=>$modifyDate),'update',$postData);
        $getSubjectList = $this->common->getInfo('subject_table','',$postData);
        foreach ($getSubjectList as $sujectRow) {
            $subject_id = $subjectRow->subject_id;
            $subjectArray = array('subject_id'=>$subject_id);
            $deleteNote = $this->common->dbAction('notes_table',array('deleted'=>$deleted,'modify_date'=>$modifyDate),'update',$subjectArray);
        }

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

    // Subject
    public function loadAddSubjectPage($subject_id=''){
        $data['fetchLevelList'] = $this->common->getInfo('level_table','',array('deleted'=>0));
        if (!empty($subject_id)) {
            $data['fetchSubjectRow'] = $this->common->getInfo('subject_table','row',array('subject_id'=>$subject_id,'deleted'=>0));
        }
        return view('admin/subject/add_subject',$data);
    }

    public function getTypeInfo(){
        $postData = $this->request->getPost();
        $postData['deleted'] = 0;
        $getTypeList = $this->common->getInfo('type_table','',$postData);
        return json_encode($getTypeList);
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

    // public function getSubjectInfo(){
    //     $postData = $this->request->getPost();
    //     $postData['deleted'] = 0;
    //     $getSubjectList = $this->common->getInfo('subject_table','',$postData);
    //     return json_encode($getSubjectList);
    // }

    public function loadSubjectListPage(){
        return view('admin/subject/subject_list');
    }

    public function fetchSubjectListPage(){
        $postData = $this->request->getPost();
        $fetchSubjectList = $this->dashboardModel->fetchSubjectListModel($postData);
        return json_encode($fetchSubjectList);
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

    // Paper
    function loadAddPaperPage($paper_id=''){
        $data['fetchLevelList'] = $this->common->getInfo('level_table','',array('deleted'=>0));
        $data['paperDetails'] = '';
        if (!empty($paper_id)) {
            $data['paperDetails'] = $this->common->getInfo('paper_table','row',array('paper_id'=>$paper_id));
        }
       
        return view('admin/paper/add_paper',$data);
    }

    public function updatePaperStatus(){
        $postData = $this->request->getPost();
        $paper_id = $postData['paper_id'];
        unset($postData['paper_id']);
        $updatePaperStatus = $this->common->dbAction('paper_table',$postData,'update',array('paper_id'=>$paper_id));
        if (!empty($updatePaperStatus)) {
            $response = array('success'=>true,'message'=>'Paper status has been changed successfully');
        } else {
            $response = array('success'=>false,'message'=>'Failed to change the status');
        }
        return json_encode($response);
    }

    public function loadPaperListPage(){
        $data['level_list'] = $this->common->getInfo('level_table','',array('deleted'=>0));
        return view('admin/paper/paper_list',$data);
    }

    public function fetchedPaperList(){
        $postData = $this->request->getPost();
        $fetchedPaperList = $this->dashboardModel->fetchedPaperListModel($postData);
        return json_encode($fetchedPaperList);
    }

    public function addPaper(){
        $postData = $this->request->getPost();
        $paper_id = $postData['paper_id'];
        $uploaded_question_file = $this->request->getFile('question_paper_upload');
        $uploaded_answer_file = $this->request->getFile('answer_paper_upload');
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
        unset($postData['paper_id']);
        if (!empty($paper_id)) {
            $uploadPaper = $this->common->dbAction('paper_table',$postData,'update',array('paper_id'=>$paper_id));
            $action = 'update';
        } else {
            $postData['active'] = '0';
            $uploadPaper = $this->common->dbAction('paper_table',$postData,'insert',array());
            $action = 'add';
        }
        if(!empty($uploadPaper)){
            $response = array(
                'success'=>true,
                'message'=>'Paper '.$action.' successfully'
            );
        } else {
            $response = array(
                'success'=>false,
                'message'=>'Failed to add paper'
            );
        }
        return json_encode($response);
    }




    public function deletePaper(){
        $postData = $this->request->getPost();
        $fetchPaper = $this->common->getInfo('paper_table','row',$postData);
        $deletePaper = $this->common->dbAction('paper_table',array('deleted'=>1),'update',$postData);
        if (!empty($deletePaper)) {
            if (!empty($fetchPaper->question_paper_upload) && file_exists(PUBLIC_PATH.$fetchPaper->question_paper_upload)) {
                unlink(PUBLIC_PATH.$fetchPaper->question_paper_upload);
            }
            if (!empty($fetchPaper->answer_paper_upload) && file_exists(PUBLIC_PATH.$fetchPaper->answer_paper_upload)) {
                unlink(PUBLIC_PATH.$fetchPaper->answer_paper_upload);
            }
            $response = array('success'=>true,'message'=>'Paper has been deleted successfully');
        } else {
            $response = array('success'=>true,'message'=>'Failed to delete paper');
        }
        return json_encode($response);
    }

    // Promocode

    public function loadAddPromocodePage($code_id=''){
        $data['promocodeDetails'] = '';
        if (!empty($code_id)) {
            $data['promocodeDetails'] = $this->common->getInfo('promo_code_table','row',array('code_id'=>$code_id));
        }
        return view('admin/promocode/add_promocode',$data);
    }

    public function addPromoCode(){
        $postData = $this->request->getPost();
        $code_id = $postData['code_id'];
        $postData['validity_date'] = $postData['validity_date'].' 23:59:59';
        unset($postData['code_id']);
        if (!empty($code_id)) {
            $addPromocode = $this->common->dbAction('promo_code_table',$postData,'update',array('code_id'=>$code_id));
            $action = 'updat';
        } else {
            $addPromocode = $this->common->dbAction('promo_code_table',$postData,'insert',array());
            $action = 'add';
        }
        if (!empty($addPromocode)) {
            $response = array('success'=>true,'message'=>'Promocode has been '.$action.'ed successfully');
        } else {
            $response = array('success'=>false,'message'=>'Failed to run action');
        }
        return json_encode($response);
    }

    public function loadPromocodeListPage(){
        return view('admin/promocode/promocode_list');
    }

    public function fetchPromocodes(){
        $postData = $this->request->getPost();
        $fetchPromocodes = $this->dashboardModel->fetchPromocodesModel($postData);
        return json_encode($fetchPromocodes);
    }

    public function deletePromocode(){
        $whereArray = $this->request->getPost();
        $deletePromocode = $this->common->dbAction('promo_code_table',array('deleted'=>1),'update',$whereArray);
        if (!empty($deletePromocode)) {
            $response = array('success'=>true,'message'=>'Promocode has been deleted successfully');
        } else {
            $response = array('success'=>false,'message'=>'Failed to delte promocode');
        }
        return json_encode($response);
    }

    // notice
    public function loadAddNotice($notice_id=''){
        $data['noticeDetails'] = '';
        if (!empty($notice_id)) {
            $data['noticeDetails'] = $this->common->getInfo('notice_table','row',array('notice_id'=>$notice_id));
        }
        return view('admin/notice/add-notice',$data);
    }

    public function addNotice(){
        $postData = $this->request->getPost();
        $notice_id = $postData['notice_id'];
        unset($postData['notice_id']);
        if (!empty($notice_id)) {
            $postData['update_time'] = date('Y-m-d H:i:s');
            $addInfo = $this->common->dbAction('notice_table',$postData,'update',array('notice_id'=>$notice_id));
            $action = 'update';
        } else {
            $addInfo = $this->common->dbAction('notice_table',$postData,'insert',array());
            $action = 'add';
        }

        if (!empty($addInfo)) {
            $response = array('success'=>true,'message'=>'Notice Details has beeen '.$action.'ed successfully');
        } else {
            $response = array('success'=>false,'message'=>'Failed to '.$action.' details');
        }
        return json_encode($response);
    }

    public function fetchNoticeList(){
        $postData = $this->request->getPost();
        $fetchPromocodes = $this->dashboardModel->fetchNoticeModel($postData);
        return json_encode($fetchPromocodes);
    }

    public function loadNoticeListPage()
    {
        return view('admin/notice/notice_list');
    }

    public function deleteNotice(){
        $postData = $this->request->getPost();
        $deleteNotice = $this->common->dbAction('notice_table','','delete',$postData);
        if (!empty($deleteNotice)) {
            $response = array(
                'success'=>true,
                'message'=>'Notice deleted successfully'
            );
        } else {
             $response = array(
                'success'=>false,
                'message'=>'Failed to delete notice'
            );
        }
        return json_encode($response);
    }


    // student
    public function loadStudentListPage($value='')
    {
        return view('admin/student/student_list');
    }

    public function fetchStudentList(){
        $postData = $this->request->getPost();
        $fetchStudentList = $this->dashboardModel->fetchStudentListModel($postData);
        return json_encode($fetchStudentList);
    }

    public function changeStudentBlockStatus(){
        $postData = $this->request->getPost();
        $changeStatus = $this->common->dbAction('student_table',array('blocked'=>$postData['blocked']),'update',array('student_id'=>$postData['student_id']));
        if (!empty($changeStatus)) {
            $response = array('success'=>true,'message'=>'Student status has been added successfully');
        } else {
            $response = array('success'=>false,'message'=>'Failed to change the status');
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

    public function loadAssignmentLevelListPage(){
        return view('admin/assignment/assignment_level_list');
    }

    public function fetchAssignmentLevelList(){
        $postData = $this->request->getPost();
        $fetchAssignmentLevelList = $this->dashboardModel->fetchAssignmentLevelListModel($postData);
        return json_encode($fetchAssignmentLevelList);
    }

    public function loadAssignmentListPage($level_id){
        $data['level_id'] = $level_id;
        return view('admin/assignment/assignment_list',$data);
    }

    public function fetchAssignmentList(){
        $postData = $this->request->getPost();
        $fetchAssignmentList = $this->dashboardModel->fetchAssignmentListModel($postData);
        return json_encode($fetchAssignmentList);
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


    // Examinar
    public function loadAddExaminarPage($examinar_id=''){
        $data['examinarDetails'] = '';
        if (!empty($examinar_id)) {
            $data['examinarDetails'] = $this->common->getInfo('examinar_table','row',array('examinar_id'=>$examinar_id));
        }
        return view('admin/examinar/add_examinar',$data);
    }

    public function addExaminar(){
        $postData = $this->request->getPost();
        $examinar_id = $postData['examinar_id'];
        if (isset($postData['examinar_password'])) {
            $postData['examinar_password'] = md5(md5($postData['examinar_password']));
        }
        unset($postData['examinar_id']);
        if (!empty($examinar_id)) {
            $addExaminar = $this->common->dbAction('examinar_table',$postData,'update',array('examinar_id'=>$examinar_id));
            $action = 'updat';
        } else {
            $fetchIfExistEmail = $this->common->getInfo('examinar_table','row',array('examinar_email'=>$postData['examinar_email']));
            $fetchIfExistMobile = $this->common->getInfo('examinar_table','row',array('examinar_email'=>$postData['examinar_mobile_no']));
            if (!empty($fetchIfExistEmail) || !empty($fetchIfExistMobile)) {
                $response = array('success'=>false,'message'=>'Examinar already exists');
                return json_encode($response);
                exit();
            }
            $addExaminar = $this->common->dbAction('examinar_table',$postData,'insert',array());
            $action = 'added';
        }
        if (!empty($addExaminar)) {
            $response = array('success'=>true,'message'=>'Examinar has been '.$action.' ed successfully');
        } else {
            $response = array('success'=>false,'message'=>'Failed to '.$action.' successfully');
        }
        return json_encode($response);
    }

    public function loadExaminarListPage()
    {
        return view('admin/examinar/examinar_list');
    }

    public function getExaminarList(){
        $postData = $this->request->getPost();
        $getExaminarList = $this->dashboardModel->getExaminarListModel($postData);
        return json_encode($getExaminarList);
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

    public function loadAssignExaminar($examinar_id=''){
        $data["examinar_id"] = $examinar_id;
        $data['levelDetails'] = $this->common->getInfo('level_table','',array('deleted'=>0));
        return view('admin/examinar/assign_examinar',$data);
    }

    public function getSubjectInfo(){
        $postData = $this->request->getPost();
        $postData['deleted'] = 0;
        $getSubjectList = $this->common->getInfo('subject_table','',$postData);
        return json_encode($getSubjectList);
    }
    public function assignExaminar(){
        $postData = $this->request->getPost();
        $fetchIfExist = $this->common->getInfo('examinar_assign_table','row',array('subject_id'=>$postData['subject_id'],'examinar_id'=>$postData['examinar_id']));
        if (!empty($fetchIfExist)) {
            $response = array('success'=>false,'message'=>'Subject already has been assigned to this exaninar');
            return json_encode($response);
            exit();
        }
        $assignExaminar = $this->common->dbAction('examinar_assign_table',$postData,'insert',array());
        if (!empty($assignExaminar)) {
            $response = array('success'=>true,'message'=>'Subject assign to the particular examinar');
        } else {
            $response = array('success'=>false,'message'=>'Failed to assign examinar');
        }
        return json_encode($response);
    }

    // assign subject
    public function loadAssignSubjects(){
        return view('admin/examinar/assign_subject_list');
    }

    public function fetchAssignSubList(){
        $postData = $this->request->getPost();
        $fetchAssignSubList = $this->dashboardModel->fetchAssignSubListModel($postData);
        return json_encode($fetchAssignSubList);
    }

    public function deleteAssignSubject(){
        $postData = $this->request->getPost();
        $deleteAssignSubject = $this->commo->dbAction('examinar_assign_table',array(),'delete',$postData);
        if (!empty($deleteAssignSubject)) {
            $response = array('success'=>true,'message'=>'Subject has been deleted successfully');
        } else {
            $response = array('success'=>false,'message'=>'Failed to delete assigned subject');
        }
        return json_encode($response);
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

    // newsletter
    public function loadNewsletterList($value=''){
        return view('admin/newsletter/newsletter');
    }

    public function fetchNewsLetter(){
        $postData = $this->request->getPost();
        $fetchNewsLetter = $this->dashboardModel->fetchNewsLetterModel($postData);
        return json_encode($fetchNewsLetter);
    }
    public function sendnewsLetter(){
        $postData = $this->request->getPost();
        $message = $postData['message'];
        $subject = $postData['subject'];
        $fetchSubscriberList = $this->common->getInfo('newsletter','',array('deleted'=>0,'active'=>1));
        $totalStudentCount = count($fetchSubscriberList);
        $totalStudentList = $this->common->getInfo('student_table','',array('blocked'=>0));
        $sendCount = 0;
        $subscriberArray = array();
        if (!empty($fetchSubscriberList) || !empty($totalStudentList)) {
            if (!empty($fetchSubscriberList)) {
                foreach ($fetchSubscriberList as $value) {
                    $to = $value->newsletter_email;
                    $sendMail = $this->sendMail($to, $subject, $message,'NewsLetter');
                    if ($sendMail) {
                        $sendCount++;
                        array_push($subscriberArray, $to);
                    }
                }
            }

            if (!empty($totalStudentList)) {
                foreach ($totalStudentList as $value1) {
                    $to1 = $value1->email;
                    if (!in_array($to1, $subscriberArray)) {
                        $sendMail1 = $this->sendMail($to1, $subject, $message,'NewsLetter');
                        if ($sendMail1) {
                            $sendCount++;
                        }
                    }
                }
            }
        } else {
            $response = array('success'=>false,'message'=>'No subscription details found');
        }

        if ($sendCount>0) {
            $response = array('success'=>true,'message'=>'NewsLetter has been sent successfully');
        } else {
            $response = array('success'=>false,'message'=>'Failed to send newspaper');
        }
        
        return json_encode($response);
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

    public function loadAddBlogPage($blog_id=''){
        $data['blog_data'] = '';
        if (!empty($blog_id)) {
            $data['blog_data'] = $this->common->getInfo('blog_table','row',array('blog_id'=>$blog_id));
        }
        return view('admin/blog/add_blog',$data);
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

    public function loadBlogListPage(){
        return view('admin/blog/blog_list');
    }

    public function fetchBlogList(){
        $postData = $this->request->getPost();
        $fetchBlogList = $this->dashboardModel->fetchBlogListModel($postData);
        return json_encode($fetchBlogList);
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

    public function loadAddNotesPage($note_id=''){
        $data['level_list'] = $this->common->getInfo('level_table','',array('deleted'=>0));
        if (!empty($note_id)) {
            $data['note_details'] = $this->common->getInfo('notes_table','row',array('note_id'=>$note_id));
            if (!empty($data['note_details'])) {
                $subject_id = $data['note_details']->subject_id;
                $data['subject_details'] = $this->common->getInfo('subject_table','row',array('subject_id'=> $subject_id));
            }
        }
        return view('admin/notes/add_notes',$data);
    }

    public function addNotes(){
        $postData = $this->request->getPost();
        $note_id = isset($postData['note_id']) ? $postData['note_id'] : '';
        $subject_name = $postData['subject_name'];
        unset($postData['subject_name']);
        unset($postData['note_id']);
        $postFile = $this->request->getFile('attachment');
        if (!empty($postFile)) {
            if ($postFile->isValid() && ! $postFile->hasMoved()) {
                $newName = $postFile->getRandomName();
                $postFile->move(PUBLIC_PATH.'/assets/assetItems/notes/', $newName);
                $postData['attachment'] = '/assets/assetItems/notes/'.$newName;
            }
        }
        if (!empty($note_id)) {
            $updatePostData = $this->common->dbAction('notes_table',$postData,'update',array('note_id'=>$note_id));
            $message = 'updated';
        } else {
            $updatePostData = $this->common->dbAction('notes_table',$postData,'insert',array());
            $message = 'added';
        }
        if (!empty($updatePostData)) {
            $response = array('success'=>true,'message'=>'Notes has been '.$message.' successfully');
        } else {
            $response = array('success'=>true,'message'=>'Failed to '.$message.' details');
        }
        return json_encode($response);
    }

    public function loadNoteListPage(){
        return view('admin/notes/notes_list');
    }

    public function fetchNotesDetails(){
        $postData = $this->request->getPost();
        $fetchNotesDetails = $this->dashboardModel->fetchNotesDetails($postData);
        return json_encode($fetchNotesDetails);
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

    public function loadViewSales(){
        $data['sales_info'] = $this->common->getInfo('sales_table','',array());
        return view('admin/sales/view_sales',$data);
    }

    public function fetchSales(){
        $postData = $this->request->getPost();
        $data['fetchSalesInfo'] = $this->dashboardModel->fetchSalesInfo($postData);
        // $data['fetchedCartItemsGroup'] = $this->dashboardModel->fetchCartItemsGroupWise();
        return json_encode($data);
    }

    public function loadAddAmendmentPage($amendment_id=''){
        $data['level_list'] = $this->common->getInfo('level_table','',array('deleted'=>0));
        $data['amendmentDetails'] = '';
        $data['type_list'] = '';
        $data['subject_list'] = '';
        if (!empty($amendment_id)) {
            $amendmentDetails = $this->common->getInfo('amendment_table','row',array('amendment_id'=>$amendment_id));
            $data['type_list'] = $this->common->getInfo('type_table','',array('level_id'=>$amendmentDetails->level_id,'deleted'=>0));
            $data['subject_list'] = $this->common->getInfo('subject_table','',array('type_id'=>$amendmentDetails->type_id,'deleted'=>0));
            $data['amendmentDetails'] = $amendmentDetails;
        }
        return view('admin/amendment/add_amendment',$data);
    }

    public function addAmendment(){
        $postData = $this->request->getPost();
        $postFile = $this->request->getFile('amendment_file');
        if (!empty($postFile)) {
            if ($postFile->isValid() && ! $postFile->hasMoved()) {
                $newName = $postFile->getRandomName();
                $postFile->move(PUBLIC_PATH .'/assets/assetItems/amendment/',$newName);
                $postData['amendment_file'] = '/assets/assetItems/amendment/'.$newName;
            }
        }
        if (!empty($postData['amendment_id'])) {
            $amendment_id = $postData['amendment_id'];
            $addAmendment = $this->common->dbAction('amendment_table',$postData,'update',array('amendment_id'=>$amendment_id));
            $actionMsg = 'updated';
        } else {
            $addAmendment = $this->common->dbAction('amendment_table',$postData,'insert',array());
            $actionMsg = 'added';
        }
        if (!empty($addAmendment)) {
            $response = array('success'=>true,'message'=>'Amendment Details has been successfully '.$actionMsg);
        } else {
            $response = array('success'=>true,'message'=>'Failed to execute action');
        }
        return json_encode($response);
    }

    public function loadAmendmentListPage(){
        return view('admin/amendment/amendment_list');
    }

    public function fetchAmendmentList(){
        $postData = $this->request->getPost();
        $fetchAmendmentList = $this->dashboardModel->fetchAmendmentListModel($postData);
        return json_encode($fetchAmendmentList);
    }

    public function updateAmendmentStatus(){
        $postData = $this->request->getPost();
        $updateStatus =$this->common->dbAction('amendment_table',array('active'=>$postData['active']),'update',array('amendment_id'=>$postData['amendment_id']));
        if (!empty($updateStatus)) {
            $response = array('success'=>true,'message'=>'Status has been updated successfully');
        } else {
            $response = array('success'=>false,'message'=>'Failed to update the status');
        }
        return json_encode($response);
    }

    public function deleteAmendment(){
        $postData = $this->request->getPost();
        $fetchAmendment = $this->common->getInfo('amendment_table','row',$postData);
        $deleteAmendment= $this->common->dbAction('amendment_table',array(),'delete',$postData);
        if (!empty($deleteAmendment)) {
            if (!empty($fetchAmendment->amendment_file)) {
                $path = PUBLIC_PATH.$fetchAmendment->amendment_file;
                if (file_exists($path)) {
                    unlink($path);
                }
            }
            $response = array('success'=>true,'message'=>'Amendment has been deleted successfully');
        } else {
            $response = array('success'=>false,'message'=>'Failed to delete amendment');
        }
        return json_encode($response);
    }

    // Question Bank
    public function loadAddQbankPage($qbank_id=''){
        $data['level_list'] = $this->common->getInfo('level_table','',array('deleted'=>0));
        $data['qbankDetails'] = '';
        $data['type_list'] = '';
        $data['subject_list'] = '';
        if (!empty($qbank_id)) {
            $qbankDetails = $this->common->getInfo('qbank_table','row',array('qbank_id'=>$qbank_id));
            $data['type_list'] = $this->common->getInfo('type_table','',array('level_id'=>$qbankDetails->level_id,'deleted'=>0));
            $data['subject_list'] = $this->common->getInfo('subject_table','',array('type_id'=>$qbankDetails->type_id,'deleted'=>0));
            $data['qbankDetails'] = $qbankDetails;
        }
        return view('admin/question_bank/add_question_bank',$data);
    }

    public function addQbank(){
        $postData = $this->request->getPost();
        $postFile = $this->request->getFile('qbank_file');
        if (!empty($postFile)) {
            if ($postFile->isValid() && ! $postFile->hasMoved()) {
                $newName = $postFile->getRandomName();
                $postFile->move(PUBLIC_PATH .'/assets/assetItems/qbank/',$newName);
                $postData['qbank_file'] = '/assets/assetItems/qbank/'.$newName;
            }
        }
        if (!empty($postData['qbank_id'])) {
            $qbank_id = $postData['qbank_id'];
            $addQbank = $this->common->dbAction('qbank_table',$postData,'update',array('qbank_id'=>$qbank_id));
            $actionMsg = 'updated';
        } else {
            $addQbank = $this->common->dbAction('qbank_table',$postData,'insert',array());
            $actionMsg = 'added';
        }
        if (!empty($addQbank)) {
            $response = array('success'=>true,'message'=>'Question Bank Details has been successfully '.$actionMsg);
        } else {
            $response = array('success'=>true,'message'=>'Failed to execute action');
        }
        return json_encode($response);
    }

    public function loadQbankListPage(){
        return view('admin/question_bank/question_bank_list');
    }

    public function fetchQbankList(){
        $postData = $this->request->getPost();
        $fetchQbankList = $this->dashboardModel->fetchQbankListModel($postData);
        return json_encode($fetchQbankList);
    }

    public function updateQbankStatus(){
        $postData = $this->request->getPost();
        $updateStatus =$this->common->dbAction('qbank_table',array('active'=>$postData['active']),'update',array('qbank_id'=>$postData['qbank_id']));
        if (!empty($updateStatus)) {
            $response = array('success'=>true,'message'=>'Status has been updated successfully');
        } else {
            $response = array('success'=>false,'message'=>'Failed to update the status');
        }
        return json_encode($response);
    }

    public function deleteQbank(){
        $postData = $this->request->getPost();
        $fetchQbank = $this->common->getInfo('qbank_table','row',$postData);
        $deleteQbank= $this->common->dbAction('qbank_table',array(),'delete',$postData);
        if (!empty($deleteQbank)) {
            if (!empty($fetchQbank->qbank_file)) {
                $path = PUBLIC_PATH.$fetchQbank->qbank_file;
                if (file_exists($path)) {
                    unlink($path);
                }
            }
            $response = array('success'=>true,'message'=>'Question Bank has been deleted successfully');
        } else {
            $response = array('success'=>false,'message'=>'Failed to delete amendment');
        }
        return json_encode($response);
    }

    public function getSubjectList(){
        $postData = $this->request->getPost();
        $student_id = $postData['student_id'];
        $card_table_details = $this->common->getInfo('cart_table','row',array('student_id' => $student_id,'deleted'=>0));
        $fetchSubjectListDetails = array();
        $fetchPreviousSessionDetails = array();
        if(!empty($card_table_details)){
            $cart_id = !empty($card_table_details->cart_id) ? $card_table_details->cart_id : '';
            $fetchSubjectListDetails = $this->dashboardModel->fetchSubjectDeatils($cart_id);
            $fetchPreviousSessionDetails = $this->dashboardModel->fetchPreviousSessionDetails($cart_id);
        }
        $response = array('fetchSubjectListDetails'=>$fetchSubjectListDetails,'fetchPreviousSessionDetails'=>$fetchPreviousSessionDetails);
        return json_encode($response);
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

     public function loadControlValidity(){
        $data['fetchTypeList'] = $this->dashboardModel->fetchTypeListWithBatchValid();
        return view('admin/controlValidation/validity-control',$data);
    }

    public function closeValidity(){
        try {
            ini_set('max_execution_time', 0);
            $postData = $this->request->getPost();
            $admin_password = $postData['admin_password'];
            $userData = array();
            if (session()->get('userData')!==null) {
                $userData = session()->get('userData');
            }
            if (isset($userData['id'])) {
                $fetchAdminPassword = $this->common->getInfo('admin_user','row',array('id'=>$userData['id']));
                if (!empty($fetchAdminPassword) && $fetchAdminPassword->password!=md5(md5($admin_password))) {
                    $response = array('success'=>false,'message'=>'You have entered a wrong password');
                    return json_encode($response);
                    exit();
                }
            }
            // $getSubjectIdList = $this->common->getInfo('subject_table','',array('type_id'=>$postData['type_id']));
            $getSubjectIdList = $this->dashboardModel->typeWiseSubjectList($postData['type_id']);
            $subject_id_array = array();
            if (!empty($getSubjectIdList)) {
                foreach ($getSubjectIdList as $value) {
                    $subject_id_array[] = $value->subject_id;
                }
            }
            // $notes__delete_table = $this->deleteNotesItemsTable($subject_id_array);
            $fetchPaperList =  $this->dashboardModel->fetchPaperListInfo($subject_id_array);
            $paper_id_array = array();
            if (!empty($fetchPaperList)) {
                foreach ($fetchPaperList as $value) {
                    $paper_id_array[] = $value->paper_id;
                }
            }
            $delete_assignment_info = $this->deleteAssignmentInfo($paper_id_array);
            $deleteExaminarEntry = $this->dashboardModel->deleteExaminarEntry($subject_id_array);
            $fetch_cart_items_entry = $this->dashboardModel->fetchCartItemsEntry($subject_id_array);
            $cart_id_array = array();
            if (!empty($fetch_cart_items_entry)){
                foreach ($fetch_cart_items_entry as $value) {
                    $cart_id_array[] = $value->cart_id;
                }
            }
            $deletPurchaseItemsEntry = $this->dashboardModel->deletePurchaseEntry($cart_id_array);
            $deletCartItemsEntry = $this->dashboardModel->deleteCartItemsEntry($subject_id_array);
            $removeBatchInfo  = $this->common->dbAction('batch_table','','delete',array('type_id'=>$postData['type_id']));
            $response = array('success'=>true,'message'=>'All the validation cleared successfully');  
        } catch (\Exception $e) {
            $response = array('success'=>false,'message'=>'Failed to delete validation');  
        }
        return json_encode($response);
    }

    private function deleteNotesItemsTable($subject_id_array){
        $notes_items_to_delete = $this->dashboardModel->fetchNotesItemsFilterBySubject($subject_id_array);
        if (!empty($notes_items_to_delete)) {
            foreach ($notes_items_to_delete as $value) {
                if (!empty($value->attachment)) {
                    if (file_exists(PUBLIC_PATH.$value->attachment)) {
                        unlink(PUBLIC_PATH.$value->attachment);
                    }
                }
                sleep(2);
            }
        }
        $deleteNoteEntry = $this->dashboardModel->deleteNotesEntry($subject_id_array);
        if (!empty($deleteNoteEntry)) {
            return true;
        }
    }

    private function deleteAssignmentInfo($paper_id_array){
        try {
            $fetchAssignmentFile = $this->dashboardModel->fetchAssignmentFileByPaper($paper_id_array);
            if (!empty($fetchAssignmentFile)) {
                foreach ($fetchAssignmentFile as $value) {
                    if (!empty($value->assignment_file)) {
                        if (file_exists(PUBLIC_PATH.$value->assignment_file)) {
                            unlink(PUBLIC_PATH.$value->assignment_file);
                        }
                    }
                    
                    if (!empty($value->assignment_checked_file)) {
                        if (file_exists(PUBLIC_PATH.$value->assignment_checked_file)) {
                            unlink(PUBLIC_PATH.$value->assignment_checked_file);
                        }
                    }
                    
                }
            }
            $deleteAssignmentEntry = $this->dashboardModel->deleteAssignmentEntry($paper_id_array);
            if (!empty($deleteAssignmentEntry)) {
                return true;
            }
        } catch (\Exception $e) {
            
        }
        
    }


}
?>