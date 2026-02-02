<?php

namespace App\Models;

use App\Models\BaseModel;

class LoginModel extends BaseModel
{
   public function checkModel($postData){
   	 $builder = $this->db->table('admin_user');
	 $builder->where('email',$postData['email_id']);
   	 $response = $builder->get()->getRow();
   	 return $response;
   }
}