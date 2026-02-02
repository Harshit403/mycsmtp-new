<?php

namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model
{
        public function getActiveCartItems($cartId=''){
            $builder = $this->db->table('cart_items_table');
            $builder->select('cart_items_table.*,subject_table.subject_name,subject_table.offer_price,subject_table.original_price,type_table.type_name,level_table.level_name');
            $builder->join('subject_table','subject_table.subject_id=cart_items_table.subject_id','left');
            $builder->join('type_table','type_table.type_id=subject_table.type_id','left');
            $builder->join('level_table','level_table.level_id=type_table.level_id','left');
            $builder->where('cart_items_table.deleted',0);
            $builder->where('level_table.deleted',0);
            $builder->where('type_table.deleted',0);
            $builder->where('subject_table.deleted',0);
            $builder->where('cart_items_table.cart_id',$cartId);
            return $builder->get()->getResultArray();
        }
}
?>