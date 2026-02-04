<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model{
    public function getTypeList($levelId=''){
        $builder = $this->db->table('type_table');
        $builder->select('type_table.*,level_table.level_name,level_table.deleted');
        $builder->join('level_table', 'level_table.level_id = type_table.level_id','left');
        $builder->where('type_table.level_id', $levelId);
        $builder->where('type_table.deleted',0);
        $builder->where('level_table.deleted',0);
        $records = $builder->get()->getResultArray();
        return $records;
    }

    public function getSubjectList($typeId=''){
        $builder = $this->db->table('subject_table');
        $builder->select('subject_table.*,level_table.level_name AS level_name,type_table.type_name AS type_name');
        $builder->join('level_table', 'level_table.level_id = subject_table.level_id','left');
        $builder->join('type_table', 'type_table.type_id = subject_table.type_id','left');
        $builder->where('subject_table.type_id', $typeId);
        $builder->where('subject_table.deleted',0);
        $records = $builder->get()->getResultArray();
        return $records;
    }

    public function deleteCartItemsForManualPayment($cart_items_id_array=[]){
        $builder = $this->db->table('cart_items_table');
        $builder->whereIn('cart_items_id', $cart_items_id_array);
        $response = $builder->update(['deleted'=>1]);
        return $response;
    }

    public function getPromoCodeDetails($cart_id){
        $builder = $this->db->table('cart_items_table');
        $builder->select('promo_code_table.min_cart_amt,cart_items_table.promo_code_name');
        $builder->join('promo_code_table', 'promo_code_table.code_name = cart_items_table.promo_code_name','left');
        $builder->where('cart_items_table.cart_id', $cart_id);
        $builder->where('cart_items_table.deleted', 0);
        $response = $builder->get()->getRow();
        return $response;
    }

    public function fetchLevelModel(){
        $builder = $this->db->table('level_table');
        $builder->where('deleted', 0);
        $builder->orderBy('level_id','asc');
        // $records = $builder->limit(3)->get()->getResultArray();
        $records = $builder->get()->getResultArray();
        return $records;
    }

    public function fetchPlansModel(){
        try {
            $builder = $this->db->table('type_table');
            $builder->select('type_table.*');
            $builder->where('type_table.deleted', 0);
            $builder->orderBy('type_table.sort_order', 'asc');
            $builder->orderBy('type_table.type_id', 'asc');
            
            $query = $builder->get();
            if (!$query) {
                throw new \Exception('Query failed');
            }
            
            $records = $query->getResultArray();
        } catch (\Exception $e) {
            $records = [];
        }
        
        if (empty($records)) {
            return [
                [
                    'plan_id' => 1,
                    'plan_name' => 'Detailed Test Series',
                    'plan_description' => 'Perfect for focused preparation',
                    'price' => 349,
                    'features' => json_encode([
                        '4 comprehensive module tests',
                        '1 full syllabus mock test',
                        'Standard evaluation (72 working hrs)',
                        'Performance analytics dashboard'
                    ]),
                    'badge' => '',
                    'badge_text' => '',
                    'is_featured' => 0,
                    'sort_order' => 1
                ],
                [
                    'plan_id' => 2,
                    'plan_name' => 'Full Syllabus Test Series',
                    'plan_description' => 'Complete coverage for best results',
                    'price' => 199,
                    'features' => json_encode([
                        '5 full syllabus mock tests',
                        'Detailed video solutions',
                        'Personalized mentor feedback',
                        'Doubt resolution sessions'
                    ]),
                    'badge' => 'best-value',
                    'badge_text' => 'Best Value',
                    'is_featured' => 1,
                    'sort_order' => 2
                ],
                [
                    'plan_id' => 3,
                    'plan_name' => 'Chapterwise Test Series',
                    'plan_description' => 'Detailed chapter-wise practice',
                    'price' => 549,
                    'features' => json_encode([
                        '8 unit-wise tests with detailed solutions',
                        '2 full syllabus mock tests',
                        'Priority evaluation (48 working hrs)',
                        'Access to toppers\' answer sheets'
                    ]),
                    'badge' => 'popular',
                    'badge_text' => 'Most Popular',
                    'is_featured' => 0,
                    'sort_order' => 3
                ]
            ];
        }
        
        $plans = [];
        foreach ($records as $index => $record) {
            $isFeatured = ($index === 1);
            $plans[] = [
                'plan_id' => $record['type_id'] ?? ($index + 1),
                'plan_name' => $record['type_name'] ?? 'Test Series',
                'plan_description' => $record['type_description'] ?? $record['type_details'] ?? ('Complete test series'),
                'price' => $record['type_price'] ?? $record['price'] ?? 199,
                'features' => json_encode([
                    'Chapter-wise test coverage',
                    'Detailed evaluation & feedback',
                    'All India Ranking',
                    'Performance analytics'
                ]),
                'badge' => $isFeatured ? 'best-value' : '',
                'badge_text' => $isFeatured ? 'Best Value' : '',
                'is_featured' => $isFeatured ? 1 : 0,
                'sort_order' => $record['sort_order'] ?? ($index + 1),
                'type_id' => $record['type_id'] ?? 0
            ];
        }
        
        return $plans;
    }

    public function fetchtypeModel($level_id = '')
    {
        $builder = $this->db->table('type_table');
        $builder->select('type_table.*,level_table.deleted,level_table.level_name');
        $builder->join('level_table', 'level_table.level_id = type_table.level_id','left');
        $builder->where('level_table.deleted', 0);
        $builder->where('type_table.deleted', 0);
        
        // Filter by level_id if provided
        if (!empty($level_id)) {
            $builder->where('type_table.level_id', $level_id);
        }
        
        $builder->orderBy('type_id','asc');
        $records = $builder->get()->getResultArray();
        return $records;
    }

    public function checkExistStudent($email,$mobile_no){
        $builder = $this->db->table('student_table');
        $builder->where('email', $email);
        $builder->orWhere('mobile_no', $mobile_no);
        $records = $builder->get()->getRow();
        return $records;
    }

    public function fetchBlogList($limit=''){
        $builder = $this->db->table('blog_table');
        $builder->where('active',1);
        $builder->where('deleted',0);
        if (!empty($limit)) {
            $builder->limit($limit);
        }
        $records = $builder->get()->getResult();
        return $records;
    }

    public function getSalesInfoModel($purchase_id){
        $builder = $this->db->table('cart_items_table as cit');
        $builder->select('cit.*,pt.create_date as purchase_date,pt.payment_mode,st.subject_name,st.subject_id,tt.type_name,tt.type_id,lt.level_name,lt.level_id');
        $builder->join('purchase_table as pt','pt.purcahse_id=cit.purchase_id','left');
        $builder->join('subject_table as st','st.subject_id=cit.subject_id');
        $builder->join('type_table as tt','tt.type_id=st.type_id');
        $builder->join('level_table as lt','lt.level_id=tt.level_id');
        $builder->where('pt.purcahse_id',$purchase_id);
        $response = $builder->get()->getResult();
        return $response;
    }

    public function fetchPurchaseModel($payment_request_id){
        $builder = $this->db->table('cart_items_table as cit');
        $builder->select('cit.*,sut.student_id,sut.student_name,sut.email,sut.mobile_no,sut.city_name,sut.state_name,pt.payment_request_id,pt.order_id,pt.payment_mode,pt.total_payment_amount,pt.create_date as payement_date,st.subject_name,tt.type_name,lt.level_name');
        $builder->join('cart_table','cart_table.cart_id=cit.cart_id','left');
        $builder->join('student_table as sut','sut.student_id=cart_table.student_id','left');
        $builder->join('purchase_table as pt','pt.purcahse_id=cit.purchase_id');
        $builder->join('subject_table as st','st.subject_id=cit.subject_id','left');
        $builder->join('type_table as tt','tt.type_id=st.type_id','left');
        $builder->join('level_table as lt','lt.level_id=tt.level_id','left');
        $builder->where('pt.payment_request_id',$payment_request_id);
        $builder->where('pt.payment_status','Credit');
        $response = $builder->get()->getResult();
        return $response;
    }

    public function fetchInvoiceList($cart_id){
        $builder = $this->db->table('invoice_table');
        $builder->where('cart_id',$cart_id);
        $builder->orderBy('invoice_id','DESC');
        $response = $builder->get()->getResult();
        return $response;
    }
}
?>