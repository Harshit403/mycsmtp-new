<?php

namespace App\Models;

use CodeIgniter\Model;

class BaseModel extends Model
{

	public function dbAction($table='',$data=array(), $action='',$where=array()){
    	$builder = $this->db->table($table);
    		switch ($action) {
				case 'insert':
					$response = $builder->insert($data);
					break;
				case 'insert_batch':
					$response =  $builder->insertBatch($data);
					break;
				case 'update':
					$builder->where($where);
					$response =  $builder->update($data);
					break;
				case 'insert_id':
					$builder->insert($data);
					$response =  $this->db->insertID();
					break;
				case 'delete':
					$builder->where($where);
					$response =  $builder->delete();
					break;
				default:
					$response =  $builder->insert($data);
					break;
    		}
		if($response==0){
			$errors = $this->db->error();
			throw new \Exception($errors['message']);
			exit();
		}
    	return $response;
	}
public function getInfo($table='',$action='',$where=array(),$sort="",$select="*")
    {
    	$builder = $this->db->table($table);
        $builder->select($select);
    	$builder->where($where);
        if (!empty($sort)) {
            $builder->orderBy($sort);
        }
        $query = $builder->get();
        if (!$query) {
            return [];
        }
    	switch ($action) {
    		case 'row':
    		$response = $query->getRow();
    			break;
			case 'array':
    		$response =  $query->getResultArray();
    			break;
    		default:
    		$response =  $query->getResult();
    			break;
    	}
    	return $response;
    }
}