<?php

namespace App\Models;

use App\Models\BaseModel;

class StudentDashboardModel extends BaseModel
{
    public function fetchAvailableLevel($cart_id=''){
        $builder = $this->db->table('cart_items_table');
        $builder->select('cart_items_table.*, level_table.level_name,level_table.level_id');
        $builder->join('subject_table','subject_table.subject_id=cart_items_table.subject_id','left');
        $builder->join('level_table','level_table.level_id=subject_table.level_id','left');
        $builder->where('cart_items_table.deleted',1);
        $builder->where('cart_items_table.cart_id',$cart_id);
        $builder->where('cart_items_table.payment_status','Credit');
        $builder->groupBy('subject_table.level_id');
        return $builder->get()->getResultArray();
    }

    public function fetchAvailableType($cart_id='',$level_id=''){
        $builder = $this->db->table('cart_items_table');
        $builder->select('cart_items_table.*, type_table.type_name,type_table.type_id,type_table.level_id');
        $builder->join('subject_table','subject_table.subject_id=cart_items_table.subject_id','left');
        $builder->join('type_table','type_table.type_id=subject_table.type_id','left');
        $builder->where('cart_items_table.deleted',1);
        $builder->where('cart_items_table.cart_id',$cart_id);
        $builder->where('type_table.level_id',$level_id);
        $builder->where('cart_items_table.payment_status','Credit');
        $builder->groupBy('subject_table.type_id');
        return $builder->get()->getResultArray();
    }

    public function fetchAvailableSubject($cart_id='',$limit=''){
        $builder = $this->db->table('cart_items_table');
        $builder->select('cart_items_table.*, subject_table.subject_name,type_table.type_name,level_table.level_name,type_table.schedule_file,type_table.access');
        $builder->join('subject_table','subject_table.subject_id=cart_items_table.subject_id','left');
        $builder->join('type_table','type_table.type_id=subject_table.type_id','left');
        $builder->join('level_table','level_table.level_id=subject_table.level_id','left');
        if (!empty($cart_id)) {
            $builder->where('cart_items_table.cart_id',$cart_id);
            $builder->where('cart_items_table.payment_status','Credit');
        }
        $builder->where('cart_items_table.active','1');
        $builder->where('cart_items_table.access',1);
        if (!empty($limit)) {
            $builder->limit($limit);
        }
        return $builder->get()->getResultArray();
    }

    public function getNotesSubjectList($cart_id='',$limit=''){
        $builder = $this->db->table('cart_items_table');
        $builder->select('cart_items_table.*,subject_table.subject_name');
        $builder->join('subject_table','subject_table.subject_id = cart_items_table.subject_id','left');
        $builder->join('notes_table','cart_items_table.subject_id = notes_table.subject_id');
        $builder->join('type_table','type_table.type_id = subject_table.type_id','left');
        $builder->where('cart_items_table.cart_id',$cart_id);
        $builder->where('cart_items_table.payment_status','Credit');
        $builder->where('cart_items_table.active','1');
        $builder->where('cart_items_table.access','1');
        $builder->where('notes_table.deleted',0);
        $builder->orderBy('subject_table.subject_id','ASC');
        $builder->groupBy('subject_name');
        if (!empty($limit)) {
            $builder->limit($limit);
        }
        $records = $builder->get()->getResult();
        return $records;
    }

    public function getAmendmentSubjectList($cart_id='',$limit=''){
        $builder = $this->db->table('cart_items_table');
        $builder->select('cart_items_table.*,subject_table.subject_name');
        $builder->join('subject_table','subject_table.subject_id = cart_items_table.subject_id','left');
        $builder->join('amendment_table','cart_items_table.subject_id = amendment_table.subject_id');
        $builder->join('type_table','type_table.type_id = subject_table.type_id','left');
        $builder->where('cart_items_table.cart_id',$cart_id);
        $builder->where('cart_items_table.payment_status','Credit');
        $builder->where('cart_items_table.active','1');
        $builder->where('cart_items_table.access','1');
        $builder->where('amendment_table.deleted',0);
        $builder->orderBy('subject_table.subject_id','ASC');
        $builder->groupBy('subject_name');
        if (!empty($limit)) {
            $builder->limit($limit);
        }
        $records = $builder->get()->getResult();
        return $records;
    }

    public function getQbankSubjectList($cart_id='',$limit=''){
        $builder = $this->db->table('cart_items_table');
        $builder->select('cart_items_table.*,subject_table.subject_name');
        $builder->join('subject_table','subject_table.subject_id = cart_items_table.subject_id','left');
        $builder->join('qbank_table','cart_items_table.subject_id = qbank_table.subject_id');
        $builder->join('type_table','type_table.type_id = subject_table.type_id','left');
        $builder->where('cart_items_table.cart_id',$cart_id);
        $builder->where('cart_items_table.payment_status','Credit');
        $builder->where('cart_items_table.active','1');
        $builder->where('cart_items_table.access','1');
        $builder->where('qbank_table.deleted',0);
        $builder->orderBy('subject_table.subject_id','ASC');
        $builder->groupBy('subject_name');
        if (!empty($limit)) {
            $builder->limit($limit);
        }
        $records = $builder->get()->getResult();
        return $records;
    }

    public function fetchSubjectStatusDetails($purchase_id){
        $builder = $this->db->table('cart_items_table');
        $builder->select('cart_items_table.*, subject_table.offer_price, subject_table.subject_name,type_table.type_name, level_table.level_name');
        $builder->join('subject_table','subject_table.subject_id=cart_items_table.subject_id','left');
        $builder->join('type_table','type_table.type_id=subject_table.type_id','left');
        $builder->join('level_table','level_table.level_id=subject_table.level_id','left');
        $builder->where('purchase_id',$purchase_id);
        $response = $builder->get()->getResult();
        return $response;
    }

    public function fetchSubjectStatusInvoice($purchase_id){
        $builder = $this->db->table('cart_items_table');
        $builder->select('cart_items_table.*, subject_table.subject_name,type_table.type_name, level_table.level_name');
        $builder->join('subject_table','subject_table.subject_id=cart_items_table.subject_id','left');
        $builder->join('type_table','type_table.type_id=subject_table.type_id','left');
        $builder->join('level_table','level_table.level_id=subject_table.level_id','left');
        $builder->where('purchase_id',$purchase_id);
        $response = $builder->get()->getResult();
        return $response;
    }

    public function getPaperListModel($subject_id='',$type=''){
        $currentDateTime = date('Y-m-d H:i:s');
        $builder = $this->db->table('paper_table');
        $builder->where('subject_id',$subject_id);
        $builder->where('deleted',0);
        $builder->where('active',1);
        if (!empty($type) && $type=='free') {
            $builder->where('type','free');
        }
        $builder->where('schedule_date <=',$currentDateTime);
        $records = $builder->get()->getResultArray();
        return $records;
    }

    public function getScheduleList($cart_id=''){
        $builder = $this->db->table('cart_items_table');
        $builder->select('cart_items_table.*,type_table.schedule_file,type_table.type_name');
        $builder->join('subject_table','subject_table.subject_id=cart_items_table.subject_id','left');
        $builder->join('type_table','type_table.type_id=subject_table.type_id','left');
        $builder->where('cart_id',$cart_id);
        $builder->where('payment_status','Credit');
        $builder->where('cart_items_table.access','1');
        $builder->where('cart_items_table.active','1');
        $builder->groupBy('cart_items_table.subject_id');
        $builder->limit(3);
        $builder->orderBy('cart_items_table.cart_items_id','desc');
        $response = $builder->get()->getResult();
        return $response;
    }
    
    public function fetchFreeSubject($limit='',$level_id=''){
        $currentDateTime = date("Y-m-d H:i:s");
        $builder = $this->db->table('paper_table');
        $builder->select('paper_table.*,subject_table.subject_name,type_table.type_name,level_table.level_name,type_table.schedule_file');
        $builder->join('subject_table','subject_table.subject_id=paper_table.subject_id','left');
        $builder->join('type_table','type_table.type_id=paper_table.type_id','left');
        $builder->join('level_table','level_table.level_id=paper_table.level_id','left');
        if (!empty($limit)) {
            $builder->limit($limit);
        }
        $builder->where('paper_table.type','free');
        $builder->where('paper_table.active',1);
        $builder->where('paper_table.deleted',0);
        if (!empty($level_id)) {
            $builder->where('paper_table.level_id',$level_id);
        }
        $builder->where('paper_table.schedule_date <=',$currentDateTime);
        $response = $builder->get()->getResultArray();
        return $response;
    }

    public function getFreeNotesSubjectList($limit='',$level_id=''){
        $builder = $this->db->table('notes_table');
        $builder->join('subject_table','subject_table.subject_id=notes_table.subject_id','left');
        $builder->select('notes_table.*,subject_table.subject_name,subject_table.level_id');
        $builder->where('notes_table.active',1);
        $builder->where('notes_table.deleted',0);
        $builder->where('notes_table.type','free');
        $builder->where('subject_table.level_id',$level_id);
        if (!empty($limit)) {
            $builder->limit($limit);
        }
        $response = $builder->get()->getResult();
        return $response;
    }
}