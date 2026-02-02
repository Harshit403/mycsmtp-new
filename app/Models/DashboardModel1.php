<?php

namespace App\Models;

use CodeIgniter\Model;

class DashboardModel extends Model
{

    public function addData($data){
    	$builder = $this->db->table('level_table');
        $response = $builder->insert($data);
        return $response;
    }

    public function lastDayEnrolloedStudent(){
        $fromDate = date('Y-m-d',strtotime('-1 days')).' 00:00:00';
        $toDate =  date("Y-m-d H:i:s");
        $builder  = $this->db->table('student_table');
        $builder->where("create_date BETWEEN '{$fromDate}' AND '{$toDate}'");
        $response = $builder->get()->getResultArray();
        return count($response);
    }
  
    public function fetchStudentDetailsModel($postData=''){
        $fieldsArray = array('student_name','email','mobile_no','city_name','state_name','blocked','create_date');
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length'];
        $columnIndex = $postData['order'][0]['column'];
        $columnName = $postData['columns'][$columnIndex]['data'];
        $columnSortOrder = $postData['order'][0]['dir'];
        $searchValue = trim($postData['search']['value']);
        $columnName = $fieldsArray[$columnName];
        
        $searchQuery = "";
        if($searchValue!==''){
            $searchQuery  = '(student_name like "%' .$searchValue .'%" or 
                    email like "%'.$searchValue.'%" or
                    mobile_no like "%'. $searchValue .'%" or 
                    city_name like "%'. $searchValue.'%" or 
                    state_name like "%'.$searchValue.'%")';
        }
        $builder = $this->db->table('student_table');
        $builder->select('student_id');
        $records = $builder->get()->getResultArray();
        $totalRecords = count($records);

        $builder = $this->db->table('student_table');
        if(!empty($searchQuery)){
            $builder->where($searchQuery);
        }
        $builder->select('student_id');
        $records = $builder->get()->getResult();
        $totalRecordsWithFilter = count($records);

        $builder = $this->db->table('student_table');
        if(!empty($searchQuery)){
            $builder->where($searchQuery);
        }
        $builder->orderBy($columnName, $columnSortOrder);
        $builder->select('student_id, student_name, email, mobile_no, city_name, state_name, blocked, create_date');
        $records = $builder->limit($rowperpage, $start)->get()->getResult();

        $finalData = array();
        foreach($records as $row){
            $data = [];
            $checked = '';
            if(!empty($row->blocked)){
                $checked = 'checked';
            }
            $data[] = '<a href="javascript:void(0)" class="btn studentSubjectAccess text-primary" data-student-id="'.$row->student_id.'">'.$row->student_name.'</a>';
            $data[] = $row->email;
            $data[] = $row->mobile_no;
            $data[] = $row->city_name;
            $data[] = $row->state_name;
            $data[] = '<div class="form-check form-switch text-center">
                        <input class="form-check-input flexSwitchCheckChecked" type="checkbox" role="switch"  '.$checked.' data-student-id ="'.$row->student_id.'">
                    </div>';
            $data[] = $row->create_date;
            $finalData[] = $data;
        }
        $response = array(
            'draw'=>intval($draw),
            'iTotalRecords'=>$totalRecords,
            'iTotalDisplayRecords'=>$totalRecordsWithFilter,
            'data'=>$finalData,
        );
        return $response;
    }

    public function fetchAssignmentDetailsModel($postData){
        $fieldsArray = array('paper_name', 'level_name', 'type_name', 'subject_name', 'student_name', 'email', 'mobile_no', '', 'checked_by_email', '', 'create_date');
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length'];
        $columnIndex = $postData['order'][0]['column'];
        $columnName = $postData['columns'][$columnIndex]['data'];
        $columnSortOrder = $postData['order'][0]['dir'];
        $searchValue = trim($postData['search']['value']);
        $columnName = $fieldsArray[$columnName];
        
        $searchQuery = "";
        if($searchValue!==''){
            $searchQuery  = '(paper_name like "%' .$searchValue .'%" or 
                    email like "%'.$searchValue.'%" or
                    student_name like "%'. $searchValue .'%" or 
                    mobile_no like "%'.$searchValue.'%")';
        }
        $builder = $this->db->table('upload_assignment_table');
        $builder->select('upload_assignment_table.*,student_table.student_name, student_table.email, student_table.mobile_no,student_table.student_id,paper_table.paper_name,paper_table.level_id');
        $builder->join('paper_table','paper_table.paper_id = upload_assignment_table.paper_id','left');
        $builder->join('student_table','student_table.student_id = upload_assignment_table.student_id','left');
        $builder->where('upload_assignment_table.deleted',0);
        $builder->where('paper_table.level_id',$postData['level_id']);
        $builder->where('upload_assignment_table.assignment_status!=',0);
        $records = $builder->get()->getResultArray();
        $totalRecords = count($records);

        $builder = $this->db->table('upload_assignment_table');
        $builder->select('upload_assignment_table.*,student_table.student_name, student_table.email, student_table.mobile_no,paper_table.paper_name,student_table.student_id,paper_table.level_id');
        $builder->join('paper_table','paper_table.paper_id = upload_assignment_table.paper_id','left');
        $builder->join('student_table','student_table.student_id = upload_assignment_table.student_id','left');
        $builder->where('upload_assignment_table.deleted',0);
        $builder->where('paper_table.level_id',$postData['level_id']);
        if(!empty($searchQuery)){
            $builder->where($searchQuery);
        }
        $builder->where('upload_assignment_table.assignment_status!=',0);
        $records = $builder->get()->getResult();
        $totalRecordsWithFilter = count($records);

        $builder = $this->db->table('upload_assignment_table');
        $builder->select('upload_assignment_table.*,student_table.student_name, student_table.email, student_table.mobile_no,paper_table.paper_name,student_table.student_id,paper_table.level_id,level_table.level_name,type_table.type_name,subject_table.subject_name');
        $builder->join('paper_table','paper_table.paper_id = upload_assignment_table.paper_id','left');
        $builder->join('student_table','student_table.student_id = upload_assignment_table.student_id','left');
        $builder->join('level_table','level_table.level_id = paper_table.level_id','left');
        $builder->join('type_table','type_table.type_id = paper_table.type_id','left');
        $builder->join('subject_table','subject_table.subject_id = paper_table.subject_id','left');
        $builder->where('upload_assignment_table.deleted',0);
        $builder->where('paper_table.level_id',$postData['level_id']);
        if(!empty($searchQuery)){
            $builder->where($searchQuery);
        }
        $builder->where('upload_assignment_table.assignment_status!=',0);
        $builder->orderBy($columnName, $columnSortOrder);
        $records =$builder->limit($rowperpage, $start)->get()->getResult();
        $finalData = array();
        foreach($records as $row){
            $data = [];
            $data[] = $row->paper_name;
            $data[] = $row->level_name;
            $data[] = $row->type_name;
            $data[] = $row->subject_name;
            $data[] = $row->student_name;
            $data[] = $row->email;
            if(session()->get('userData')!==null && session()->get('userData')['user_type']=='admin'){
                $data[] = $row->mobile_no;
            } else {
                $data[] = '';
            }
            $file_name_array = explode('/',$row->assignment_file);
            $file_name = array_pop($file_name_array);
            if (file_exists(PUBLIC_PATH.$row->assignment_file)) {
                $data[] = '<a href="'.base_url().$row->assignment_file.'" class="btn btn-success btn-sm" download="'.$file_name.'"><i class="fas fa-download"></i> Download</a>';
            } else {
                $data[] = 'N/A';
            }
            $data[] = '<div title="'.$row->checked_by_email.'">'.substr($row->checked_by_email,0,20).'</div>';
            if($row->assignment_status ==1){
                $data[] = '<div class="row">
                            <div class="col-8">
                                <input type="file" class="assignment_file_check_file'.$row->assignment_id.' form-control form-cotrol-sm" >
                            </div>
                            <div class="col-4">
                                <a href="javascript:void(0)" class="btn btn-sm btn-info submitCheckFile" data-assignment-id="'.$row->assignment_id.'">
                                <i class="fas fa-upload"></i></a>
                            </div>
                        </div>';
            } else {
                $data[] = '<div class="row">
                            <div class="col-md-12 text-success">Recheck assingment Submitted</div>
                        </div>';
            }
            $data[] = $row->create_date;
            $finalData[] = $data;
        }
        $response = array(
            'draw'=>intval($draw),
            'iTotalRecords'=>$totalRecords,
            'iTotalDisplayRecords'=>$totalRecordsWithFilter,
            'data'=>$finalData,
        );
        return $response;
    }

    public function fetchAssignmentLevelDetails(){
        $builder = $this->db->table('upload_assignment_table');
        $builder->select('count(upload_assignment_table.student_id) as student_id_count,count(upload_assignment_table.paper_id) as assignment_paper_count,level_table.level_name,level_table.level_id');
        $builder->join('paper_table','paper_table.paper_id=upload_assignment_table.paper_id','left');
        $builder->join('level_table','level_table.level_id=paper_table.level_id','left');
        $builder->where('upload_assignment_table.deleted',0);
        $builder->groupBy('paper_table.level_id');
        $response = $builder->get()->getResult();
        return $response;
    }

    public function fetchPromocodesModel($postData){
        $fieldsArray = array('code_id','code_name','validity_date','discount_type','discount_amt','min_cart_amt','code_id');
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length'];
        $columnIndex = $postData['order'][0]['column'];
        $columnName = $postData['columns'][$columnIndex]['data'];
        $columnSortOrder = $postData['order'][0]['dir'];
        $searchValue = trim($postData['search']['value']);
        $columnName = $fieldsArray[$columnName];
        
        $searchQuery = "";
        if($searchValue!==''){
            $searchQuery  = '(code_name like "%' .$searchValue .'%" or 
                    DATE_FORMAT(validity_date,"%d-%m-%Y") like "%'.$searchValue.'%" or
                    discount_type like "%'. $searchValue .'%" or 
                    discount_amt like "%'. $searchValue.'%" or 
                    min_cart_amt like "%'.$searchValue.'%")';
        }
        $builder = $this->db->table('promo_code_table');
        $builder->select('code_id');
        $builder->where('deleted',0);
        $records = $builder->get()->getResultArray();
        $totalRecords = count($records);

        $builder = $this->db->table('promo_code_table');
        if(!empty($searchQuery)){
            $builder->where($searchQuery);
        }
        $builder->select('code_id');
        $builder->where('deleted',0);
        $records = $builder->get()->getResult();
        $totalRecordsWithFilter = count($records);

        $builder = $this->db->table('promo_code_table');
        if(!empty($searchQuery)){
            $builder->where($searchQuery);
        }
        $builder->orderBy($columnName, $columnSortOrder);
        $builder->where('deleted',0);
        $records = $builder->limit($rowperpage, $start)->get()->getResult();

        $finalData = array();
        foreach($records as $row){
            $data = [];
            $data[] = '<a herf="javascript:void(0)" class="btn btn-sm btn-info editPromocode" data-code-id="'.$row->code_id.'" data-code-validity="'.date('Y-m-d',strtotime($row->validity_date)).'" data-code-name="'.$row->code_name.'" data-discount-type="'.$row->discount_type.'" data-discount-amount="'.$row->discount_amt.'" data-min-cart-amount="'.$row->min_cart_amt.'"><i class="fas fa-pen"></i></a>';
            $data[] = $row->code_name;
            $data[] = date('d-m-Y',strtotime($row->validity_date));
            $data[] = $row->discount_type;
            $data[] = $row->discount_amt;
            $data[] = $row->min_cart_amt;
            $data[] = '<a herf="javascript:void(0)" class="btn btn-sm btn-danger deletePromocode" data-code-id="'.$row->code_id.'"><i class="fas fa-trash-alt"></i></a>';
            $finalData[] = $data;
        }
        $response = array(
            'draw'=>intval($draw),
            'iTotalRecords'=>$totalRecords,
            'iTotalDisplayRecords'=>$totalRecordsWithFilter,
            'data'=>$finalData,
        );
        return $response;
    }

    public function fetchSubjectDeatils($cart_id){
        $builder = $this->db->table('cart_items_table');
        $builder->select('cart_items_table.cart_items_id, cart_items_table.active,subject_table.subject_name, type_table.type_name,level_table.level_name, purchase_table.total_payment_amount, purchase_table.create_date as purchase_date, purchase_table.payment_mode, cart_items_table.promo_code_name');
        $builder->join('cart_table','cart_table.cart_id = cart_items_table.cart_id','left');
        $builder->join('subject_table','subject_table.subject_id = cart_items_table.subject_id','left');
        $builder->join('type_table','type_table.type_id =subject_table.type_id','left');
        $builder->join('level_table','level_table.level_id = subject_table.level_id','left');
        $builder->join('purchase_table','purchase_table.purcahse_id = cart_items_table.purchase_id','left');
        $builder->where('cart_items_table.deleted','1');
        $builder->where('cart_items_table.cart_id',$cart_id);
        $builder->where('cart_items_table.payment_status','Credit');
        $response = $builder->get()->getResult();
        return $response;
    }

    public function fetchStudentDetailsForExportModel($getData=''){
        $searchQuery = "";
        if($getData!==''){
            $searchQuery  = '(student_name like "%' .$getData .'%" or 
                    DATE_FORMAT(create_date,"%d-%m-%Y") like "%'.$getData.'%" or
                    email like "%'. $getData .'%" or 
                    mobile_no like "%'. $getData.'%" or 
                    city_name like "%'. $getData.'%" or 
                    state_name like "%'. $getData.'%" or 
                    blocked like "%'.$getData.'%")';
        }

        $builder = $this->db->table('student_table');
        if(!empty($searchQuery)){
            $builder->where($searchQuery);
        }
        $builder->orderBy('student_id', 'desc');
        $builder->select('student_id, student_name, email, mobile_no, city_name, state_name, create_date, blocked');
        $records = $builder->get()->getResultArray();
        return $records;
    }

    public function fetchPendingPaymentListModel($postData){
        $fieldsArray = array('student_name','email','mobile_no','upi_id','cart_id','payable_amount','admin_approve');
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length'];
        $columnIndex = $postData['order'][0]['column'];
        $columnName = $postData['columns'][$columnIndex]['data'];
        $columnSortOrder = $postData['order'][0]['dir'];
        $searchValue = trim($postData['search']['value']);
        $columnName = $fieldsArray[$columnName];
        
        $searchQuery = "";
        if($searchValue!==''){
            $searchQuery  = '(student_name like "%' .$searchValue .'%" or 
                    email like "%'.$searchValue.'%" or
                    mobile_no like "%'. $searchValue .'%" or 
                    upi_id like "%'. $searchValue.'%" or 
                    payable_amount like "%'. $searchValue.'%" or 
                    admin_approve like "%'.$searchValue.'%")';
        }
        $builder = $this->db->table('manual_payment_table');
        $builder->select('*');
        $builder->join('student_table', 'student_table.student_id = manual_payment_table.student_id');
        $builder->where('manual_payment_table.deleted',0);
        $records = $builder->get()->getResultArray();
        $totalRecords = count($records);

        $builder = $this->db->table('manual_payment_table');
        if(!empty($searchQuery)){
            $builder->where($searchQuery);
        }
        $builder->select('*');
        $builder->join('student_table', 'student_table.student_id = manual_payment_table.student_id');
        $builder->where('manual_payment_table.deleted',0);
        $records = $builder->get()->getResult();
        $totalRecordsWithFilter = count($records);

        $builder = $this->db->table('manual_payment_table');
        if(!empty($searchQuery)){
            $builder->where($searchQuery);
        }
        $builder->select('*');
        $builder->orderBy($columnName, $columnSortOrder);
        $builder->join('student_table', 'student_table.student_id = manual_payment_table.student_id');
        $builder->where('manual_payment_table.deleted',0);
        $records = $builder->limit($rowperpage, $start)->get()->getResult();
        $finalData = array();
        foreach($records as $row){
            $data = [];
            $data[] = $row->student_name;
            $data[] = $row->email;
            $data[] = $row->mobile_no;
            $data[] = $row->upi_id;
            $data[] = '<div class="d-flex justify-content-center"><a href="javascript:void(0)" class="btn btn-secondary btn-xs viewDetailsBtn" data-cart-items="'.$row->cart_items_ids.'"><i class="fas fa-eye"></i></a></div>';
            $data[] = $row->payable_amount;
            $statusText = 'Pending';
            $statuscolor = 'text-warning';
            if(!empty($row->admin_approve)){
                if($row->admin_approve==1){
                    $statusText = 'Approved';
                    $statuscolor  = 'text-success';
                } else if($row->admin_approve==2){
                    $statusText = 'Rejected';
                    $statuscolor  = 'text-danger';
                }
            }
            $data[] = '<font class="'.$statuscolor.'">'. $statusText.'</font>';
            $actionBtn = '';
            if(empty($row->admin_approve)){
                $actionBtn = '<div class="d-flex flex-wrap">
                    <a href="javascript:void(0)" class="btn btn-success mr-1 btn-xs authoriseBtn" data-manual-id="'.$row->manual_payment_id.'" data-action-type="approve" title="Approve"><i class="fas fa-check"></i></a>
                    <a href="javascript:void(0)" class="btn btn-xs btn-danger authoriseBtn" data-manual-id="'.$row->manual_payment_id.'" data-action-type="reject" title="Reject"><i class="fas fa-times-circle"></i></a>
                </div>';
            }
            $data[] = $actionBtn;
            $finalData[] = $data;
        }
        $response = array(
            'draw'=>intval($draw),
            'iTotalRecords'=>$totalRecords,
            'iTotalDisplayRecords'=>$totalRecordsWithFilter,
            'data'=>$finalData,
        );
        return $response;
    }

    public function updateCartPurchaseDetails($cart_items_ids_array,$paymentStatus){
        $builder = $this->db->table('cart_items_table');
        $builder->whereIn('cart_items_id', $cart_items_ids_array);
        $response = $builder->update(['payment_status'=>$paymentStatus]);
        return $response;
    }

    // examinar table
    public function getExaminarListModel($postData){
        $fieldsArray = array('examinar_id','examinar_name','examinar_email','blocked');
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length'];
        $columnIndex = $postData['order'][0]['column'];
        $columnName = $postData['columns'][$columnIndex]['data'];
        $columnSortOrder = $postData['order'][0]['dir'];
        $searchValue = trim($postData['search']['value']);
        $columnName = $fieldsArray[$columnName];
        
        $searchQuery = "";
        if($searchValue!==''){
            $searchQuery  = '(examinar_name like "%' .$searchValue .'%" or 
                    examinar_name like "%'.$searchValue.'%" or
                    examinar_email like "%'.$searchValue.'%")';
        }
        $builder = $this->db->table('examinar_table');
        $builder->select('examinar_id');
        $builder->where('deleted',0);
        $records = $builder->get()->getResultArray();
        $totalRecords = count($records);

        $builder = $this->db->table('examinar_table');
        if(!empty($searchQuery)){
            $builder->where($searchQuery);
        }
        $builder->select('examinar_id');
        $builder->where('deleted',0);
        $records = $builder->get()->getResult();
        $totalRecordsWithFilter = count($records);

        $builder = $this->db->table('examinar_table');
        if(!empty($searchQuery)){
            $builder->where($searchQuery);
        }
        $builder->orderBy($columnName, $columnSortOrder);
        $builder->where('deleted',0);
        $records = $builder->limit($rowperpage, $start)->get()->getResult();

        $finalData = array();
        foreach($records as $row){
            $data = [];
            $data[] = '<a herf="javascript:void(0)" class="btn btn-sm btn-info editExaminar" data-examinar-id="'.$row->examinar_id.'" data-examinar-name="'.$row->examinar_name.'" data-examinar-email="'.$row->examinar_email.'" data-examinar-mobile-no="'.$row->examinar_mobile_no.'"><i class="fas fa-pen"></i></a>';
            $data[] = $row->examinar_name;
            $data[] = $row->examinar_email;
            $data[] = $row->examinar_mobile_no;
            $checked = '';
            if(!empty($row->blocked)){
                $checked = 'checked';
            }
            $data[] = '<div class="form-check form-switch text-center">
                            <input class="form-check-input flexSwitchCheckChecked" type="checkbox" role="switch"  '.$checked.' data-examinar-id ="'.$row->examinar_id.'">
                        </div>';
            $finalData[] = $data;
        }
        $response = array(
            'draw'=>intval($draw),
            'iTotalRecords'=>$totalRecords,
            'iTotalDisplayRecords'=>$totalRecordsWithFilter,
            'data'=>$finalData,
        );
        return $response;
    }

    public function getExportPaperModel($getData) {
        $searchValue = trim($getData['dataTableSearch']);
        $searchQuery = "";
        if($searchValue!==''){
            $searchQuery  = '(paper_name like "%' .$searchValue .'%" or 
                    email like "%'.$searchValue.'%" or
                    student_name like "%'. $searchValue .'%" or 
                    mobile_no like "%'.$searchValue.'%")';
        }
        $builder = $this->db->table('upload_assignment_table');
        $builder->select('upload_assignment_table.*,student_table.student_name, student_table.email, student_table.mobile_no,paper_table.paper_name,student_table.student_id,paper_table.level_id,level_table.level_name,type_table.type_name,subject_table.subject_name');
        $builder->join('paper_table','paper_table.paper_id = upload_assignment_table.paper_id','left');
        $builder->join('student_table','student_table.student_id = upload_assignment_table.student_id','left');
        $builder->join('level_table','level_table.level_id = paper_table.level_id','left');
        $builder->join('type_table','type_table.type_id = paper_table.type_id','left');
        $builder->join('subject_table','subject_table.subject_id = paper_table.subject_id','left');
        $builder->where('upload_assignment_table.deleted',0);
        $builder->where('paper_table.level_id',$getData['level_id']);
        if(!empty($searchQuery)){
            $builder->where($searchQuery);
        }
        if($getData['onlyChecked']==1){
            $builder->where('upload_assignment_table.assignment_status',2);
        } else {
            $builder->where('upload_assignment_table.assignment_status!=',0);
        }
        $builder->orderBy('upload_assignment_table.create_date','desc');
        $response = $builder->get()->getResultArray();
        return $response;
    }

    public function fetchedPaperListModel($postData){
        $fieldsArray = array('paper_id','paper_name','level_name','type_name','subject_name','question_paper_upload','answer_paper_upload','paper_id','create_date');
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length'];
        $columnIndex = $postData['order'][0]['column'];
        $columnName = $postData['columns'][$columnIndex]['data'];
        $columnSortOrder = $postData['order'][0]['dir'];
        $searchValue = trim($postData['search']['value']);
        $columnName = $fieldsArray[$columnName];
        $searchQuery = "";
        if($searchValue!==''){
            $searchQuery  = '(paper_name like "%' .$searchValue .'%" or 
                    level_name like "%'.$searchValue.'%" or
                    type_name like "%'.$searchValue.'%")';
        }
        $builder = $this->db->table('paper_table');
        $builder->select('paper_table.*,level_table.level_name,level_table.deleted,type_table.type_name,type_table.deleted,subject_table.subject_name,subject_table.deleted');
        $builder->join('level_table', 'level_table.level_id = paper_table.level_id', 'left');
        $builder->join('type_table', 'type_table.type_id = paper_table.type_id', 'left');
        $builder->join('subject_table', 'subject_table.subject_id = paper_table.subject_id', 'left');
        $builder->where('paper_table.deleted',0);
        $builder->where('type_table.deleted',0);
        $builder->where('level_table.deleted',0);
        $builder->where('subject_table.deleted',0);
        $records = $builder->get()->getResultArray();
        $totalRecords = count($records);


        $builder = $this->db->table('paper_table');
        $builder->join('level_table', 'level_table.level_id = paper_table.level_id', 'left');
        $builder->join('type_table', 'type_table.type_id = paper_table.type_id', 'left');
        $builder->join('subject_table', 'subject_table.subject_id = paper_table.subject_id', 'left');
        $builder->where('paper_table.deleted',0);
        $builder->where('type_table.deleted',0);
        $builder->where('level_table.deleted',0);
        $builder->where('subject_table.deleted',0);
        if(!empty($searchQuery)){
            $builder->where($searchQuery);
        }
        $builder->select('paper_table.*,level_table.level_name,level_table.deleted,type_table.type_name,type_table.deleted,subject_table.subject_name,subject_table.deleted');
        $records = $builder->get()->getResultArray();
        $totalRecordsWithFilter = count($records);

        $builder = $this->db->table('paper_table');
        $builder->join('level_table', 'level_table.level_id = paper_table.level_id', 'left');
        $builder->join('type_table', 'type_table.type_id = paper_table.type_id', 'left');
        $builder->join('subject_table', 'subject_table.subject_id = paper_table.subject_id', 'left');
        $builder->where('paper_table.deleted',0);
        $builder->where('type_table.deleted',0);
        $builder->where('level_table.deleted',0);
        $builder->where('subject_table.deleted',0);
        if(!empty($searchQuery)){
            $builder->where($searchQuery);
        }
        $builder->select('paper_table.*,level_table.level_name,level_table.deleted,type_table.type_name,type_table.deleted,subject_table.subject_name,subject_table.deleted');
        $builder->orderBy($columnName, $columnSortOrder);
        $records = $builder->limit($rowperpage, $start)->get()->getResult();
        $finalData = array();
        foreach($records as $row){
            $data = [];
            $data[] = '<a herf="javascript:void(0)" class="btn btn-sm btn-info editPaper" data-paper-id="'.$row->paper_id.'" data-paper-name="'.$row->paper_name.'"><i class="fas fa-pen"></i></a>';
            $data[] = $row->paper_name;
            $data[] = $row->level_name;
            $data[] = $row->type_name;
            $data[] = $row->subject_name;
            if(!empty($row->question_paper_upload)){
                $display_uploadSection ='none';
                $display_questionSection ='block';
            } else {
                $display_uploadSection ='block';
                $display_questionSection ='none';
            }
            $data[] = '<div class="questionBtnContainer" style="display:'.$display_questionSection.'"><div class="d-flex align-items-center"><a href="javascript:void(0)" class="btn btn-success viewPreview" data-paper-link="'.$row->question_paper_upload.'"><i class="fas fa-eye fa-fw"></i> Question</a> <i class="fas fa-times-circle removeButton text-danger ml-1" data-paper-id="'.$row->paper_id.'" data-type="question_paper_upload" style="cursor:pointer;"></i></div></div><div class="uploadContainer" style="display:'.$display_uploadSection.'"><div class="d-flex align-items-center"><input type="file" class="questionUpload'.$row->paper_id.' form-control form-control-sm"><i class="fas fa-upload text-success uploadButton ml-1" data-type="question_paper_upload" data-paper-id="'.$row->paper_id.'" style="cursor:pointer;"></i></div></div>';

            if(!empty($row->answer_paper_upload)){
                $display_uploadSection ='none';
                $display_answerSection ='block';
            } else {
                $display_uploadSection ='block';
                $display_answerSection ='none';
            }
            $data[] = '<div class="answerBtnConatainer" style="display:'.$display_answerSection.'"><div class="d-flex align-items-center"><a href="javascript:void(0)" class="btn btn-success viewPreview" data-paper-link="'.$row->answer_paper_upload.'"><i class="fas fa-eye fa-fw"></i> Answer</a> <i class="fas fa-times-circle removeButton text-danger ml-1" data-paper-id="'.$row->paper_id.'" data-type="answer_paper_upload" style="cursor:pointer;"></i></div></div><div class="uploadContainer" style="display:'.$display_uploadSection.'"><div class="d-flex align-items-center"><input type="file" class="answerUpload'.$row->paper_id.' form-control form-control-sm"><i class="fas fa-upload text-success uploadButton ml-1" data-type="answer_paper_upload" data-paper-id="'.$row->paper_id.'" style="cursor:pointer;"></i></div></div>';
            $checked = '';
            if(!empty($row->active)){
                $checked = 'checked';
            }
            $data[] = '<div class="form-check form-switch text-center" style="padding-left:3rem !important;">
                            <input class="form-check-input flexSwitchCheckChecked" type="checkbox" role="switch"  '.$checked.' data-paper-id ="'.$row->paper_id.'">
                        </div>';
            $data[] = $row->create_date;
            $finalData[] = $data;
        }
        $response = array(
            'draw'=>intval($draw),
            'iTotalRecords'=>$totalRecords,
            'iTotalDisplayRecords'=>$totalRecordsWithFilter,
            'data'=>$finalData,
        );
        return $response;
    }

    public function fetchNewsLetterModel($postData){
        $fieldsArray = array('newsletter_email','is_student','create_date','active');
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length'];
        $columnIndex = $postData['order'][0]['column'];
        $columnName = $postData['columns'][$columnIndex]['data'];
        $columnSortOrder = $postData['order'][0]['dir'];
        $searchValue = trim($postData['search']['value']);
        $columnName = $fieldsArray[$columnName];
        
        $searchQuery = "";
        if($searchValue!==''){
            $searchQuery  = '(newsletter_email like "%' .$searchValue .'%" or 
                    (CASE
                        WHEN is_student=1 THEN yes
                        ELSE no
                    END) like "%'.$searchValue.'%" or
                    DATE_FORMAT(create_date,"%d-%m-%Y") like "%'.$searchValue.'%")';
        }
        $builder = $this->db->table('newsletter');
        $builder->select('newsletter_id');
        $builder->where('deleted',0);
        $records = $builder->get()->getResultArray();
        $totalRecords = count($records);

        $builder = $this->db->table('newsletter');
        if(!empty($searchQuery)){
            $builder->where($searchQuery);
        }
        $builder->select('newsletter_id');
        $builder->where('deleted',0);
        $records = $builder->get()->getResult();
        $totalRecordsWithFilter = count($records);

        $builder = $this->db->table('newsletter');
        if(!empty($searchQuery)){
            $builder->where($searchQuery);
        }
        $builder->orderBy($columnName, $columnSortOrder);
        $builder->where('deleted',0);
        $records = $builder->limit($rowperpage, $start)->get()->getResult();
        $finalData = array();
        foreach($records as $row){
            $data = [];
            $data[] = $row->newsletter_email;
            $data[] = $row->is_student ? 'YES' : 'NO';
            $data[] = date('d/m/Y',strtotime($row->create_date));
            $checked = '';
            if(!empty($row->active)){
                $checked = 'checked';
            }
            $data[] = '<div class="form-check form-switch text-center">
                            <input class="form-check-input flexSwitchCheckChecked" type="checkbox" role="switch"  '.$checked.' data-newsletter-id ="'.$row->newsletter_id.'">
                        </div>';
            $finalData[] = $data;
        }
        $response = array(
            'draw'=>intval($draw),
            'iTotalRecords'=>$totalRecords,
            'iTotalDisplayRecords'=>$totalRecordsWithFilter,
            'data'=>$finalData,
        );
        return $response;
    }

    public function fetchBlogListModel($postData){
        $fieldsArray = array('blog_id','blog_temp_image','active','blog_id');
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length'];
        $columnIndex = $postData['order'][0]['column'];
        $columnName = $postData['columns'][$columnIndex]['data'];
        $columnSortOrder = $postData['order'][0]['dir'];
        $searchValue = trim($postData['search']['value']);
        $columnName = $fieldsArray[$columnName];

        $builder = $this->db->table('blog_table');
        $builder->select('blog_id');
        $builder->where('deleted',0);
        $records = $builder->get()->getResultArray();
        $totalRecords = count($records);

        $builder = $this->db->table('blog_table');
        $builder->select('blog_id');
        $builder->where('deleted',0);
        $records = $builder->get()->getResult();
        $totalRecordsWithFilter = count($records);

        $builder = $this->db->table('blog_table');
        $builder->orderBy($columnName, $columnSortOrder);
        $builder->where('deleted',0);
        $records = $builder->limit($rowperpage, $start)->get()->getResult();
        $finalData = array();
        foreach($records as $row){
            $data = [];
            $data[] = '<a href="'.base_url().'admin/blog-list/add/'.$row->blog_id.'" class="btn btn-info btn-sm blogEditBtn" data-blog-id ="'.$row->blog_id.'"><i class="fas fa-pen"></i></a>';
            $data[] = '<a href="javascript:void(0)" class="btn btn-success btn-sm viewPreviewImg" data-blog-id ="'.$row->blog_id.'" data-blog-preview-image="'.$row->blog_temp_image.'"><i class="fas fa-eye"></i> View image</a>';
            $checked = '';
            if(!empty($row->active)){
                $checked = 'checked';
            }
            $data[] = '<div class="form-check form-switch text-center">
                            <input class="form-check-input flexSwitchCheckChecked" type="checkbox" role="switch"  '.$checked.' data-blog-id ="'.$row->blog_id.'">
                        </div>';
            $data[] = '<a href="javascript:void(0)" class="btn btn-danger btn-sm blogDeleteBtn" data-blog-id ="'.$row->blog_id.'"><i class="fas fa-trash-alt"></i></a>';
            $finalData[] = $data;
        }
        $response = array(
            'draw'=>intval($draw),
            'iTotalRecords'=>$totalRecords,
            'iTotalDisplayRecords'=>$totalRecordsWithFilter,
            'data'=>$finalData,
        );
        return $response;
    }

    public function fetchNotesDetails($postData){
        $fieldsArray = array('note_id','notes_name','attachment','active','blog_id');
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length'];
        $columnIndex = $postData['order'][0]['column'];
        $columnName = $postData['columns'][$columnIndex]['data'];
        $columnSortOrder = $postData['order'][0]['dir'];
        $searchValue = trim($postData['search']['value']);
        $columnName = $fieldsArray[$columnName];

        $builder = $this->db->table('notes_table');
        $builder->select('note_id');
        $builder->where('deleted',0);
        $records = $builder->get()->getResultArray();
        $totalRecords = count($records);

        $builder = $this->db->table('notes_table');
        $builder->select('note_id');
        $builder->where('deleted',0);
        $records = $builder->get()->getResult();
        $totalRecordsWithFilter = count($records);

        $builder = $this->db->table('notes_table');
        $builder->orderBy($columnName, $columnSortOrder);
        $builder->where('deleted',0);
        $records = $builder->limit($rowperpage, $start)->get()->getResult();
        $finalData = array();
        foreach($records as $row){
            $builder = $this->db->table('subject_table');
            $builder->where('subject_id',$row->subject_id);
            $builder->where('deleted',0);
            $records = $builder->get()->getRow();
            $data = [];
            $data[] = '<a href="'.base_url().'admin/notes-list/add/'.$row->note_id.'" class="btn btn-info btn-sm noteEditBtn" data-note-id ="'.$row->note_id.'"><i class="fas fa-pen"></i></a>';
            $data[] = !empty($records->subject_name) ? $records->subject_name : '';
            $data[] = $row->notes_name;
            $data[] = '<a href="javascript:void(0)" class="btn btn-success btn-sm viewPreviewImg" data-note-id ="'.$row->note_id.'" data-note-preview-image="'.$row->attachment.'"><i class="fas fa-eye"></i> View Notes</a>';
            $checked = '';
            if(!empty($row->active)){
                $checked = 'checked';
            }
            $data[] = '<div class="form-check form-switch text-center">
                            <input class="form-check-input flexSwitchCheckChecked" type="checkbox" role="switch"  '.$checked.' data-note-id ="'.$row->note_id.'">
                        </div>';
            $data[] = '<a href="javascript:void(0)" class="btn btn-danger btn-sm noteDeleteBtn" data-note-id ="'.$row->note_id.'"><i class="fas fa-trash-alt"></i></a>';
            $finalData[] = $data;
        }
        $response = array(
            'draw'=>intval($draw),
            'iTotalRecords'=>$totalRecords,
            'iTotalDisplayRecords'=>$totalRecordsWithFilter,
            'data'=>$finalData,
        );
        return $response;
    }

      public function fetchTypeListForAccessModel($postData){
        $fieldsArray = array('type_name','level_name','type_id');
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length'];
        $columnIndex = $postData['order'][0]['column'];
        $columnName = $postData['columns'][$columnIndex]['data'];
        $columnSortOrder = $postData['order'][0]['dir'];
        $searchValue = trim($postData['search']['value']);
        $columnName = $fieldsArray[$columnName];

        $builder = $this->db->table('type_table');
        $builder->select('type_id');
        $builder->where('deleted',0);
        $records = $builder->get()->getResultArray();
        $totalRecords = count($records);

        $builder = $this->db->table('type_table');
        $builder->select('type_id');
        $builder->where('deleted',0);
        $records = $builder->get()->getResult();
        $totalRecordsWithFilter = count($records);

        $builder = $this->db->table('type_table');
        $builder->join('level_table', 'level_table.level_id = type_table.level_id', 'left');
        $builder->orderBy($columnName, $columnSortOrder);
        $builder->where('type_table.deleted',0);
        $records = $builder->limit($rowperpage, $start)->get()->getResult();
        $finalData = array();
        foreach($records as $row){
            $data = [];
            $data[] = !empty($row->type_name) ? $row->type_name : '';
            $data[] = $row->level_name;
            $buttonClass = 'btn-success';
            $buttonLevel = 'Active';
            if (!empty($row->access)) {
                $buttonLevel = 'Deactive';
                $buttonClass = 'btn-danger';
            }
            $data[] = '<a href="javascript:void(0)" class="btn '.$buttonClass.' btn-sm accessButton" data-type-id ="'.$row->type_id.'" data-access-type="'.$row->access.'">'.$buttonLevel.'</a>';
            $finalData[] = $data;
        }
        $response = array(
            'draw'=>intval($draw),
            'iTotalRecords'=>$totalRecords,
            'iTotalDisplayRecords'=>$totalRecordsWithFilter,
            'data'=>$finalData,
        );
        return $response;
    }
    
    public function fetchAssignmentStudentDetails($assignment_id){
        $builder = $this->db->table('upload_assignment_table');
        $builder->select('upload_assignment_table.*,student_table.student_name,student_table.email,subject_table.subject_name');
        $builder->join('student_table','student_table.student_id=upload_assignment_table.student_id','left');
        $builder->join('paper_table','paper_table.paper_id=upload_assignment_table.paper_id','left');
        $builder->join('subject_table','paper_table.subject_id=subject_table.subject_id','left');
        $builder->where('upload_assignment_table.assignment_id',$assignment_id);
        $response = $builder->get()->getRow();
        return $response;
    }
   
}
?>
