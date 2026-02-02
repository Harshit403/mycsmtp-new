<?php

namespace App\Controllers;
use App\Models\LoginModel;
use App\Models\BaseModel;
class LoginController extends BaseController
{
	protected $loginModel;
	protected $common;
    public function __construct(){
    	$this->loginModel = new LoginModel();
    	$this->common = new BaseModel();
    }

    public function loadLoginPage(){
    	return view('auth/login');
    }

    public function loadAccessDenied(){
        $data['base_url'] = base_url();
        $data['access_url'] = 'admin/assignment-level-list';
        return view('errors/html/error_403',$data);
    }

    public function verifyAdminLogin(){
    	$postData = $this->request->getPost();
    	$existAdminUser = $this->loginModel->checkModel($postData);
        if($existAdminUser){
            if($existAdminUser->password==md5(md5($postData['password']))){
                $userData = [
                    'id'  => $existAdminUser->id,
                    'user_name'  => $existAdminUser->admin_name,
                    'email'     => $existAdminUser->email,
                    'user_type' => 'admin',
                    'isLoggedIn' => true,
                ];
                session()->set('userData',$userData);
                $response = array(
                    'success'=>true,
                    'message'=>'Login Successfuly',
                );
            } else {
                $response = array(
                    'success'=>false,
                    'message'=>'Wrong email or password',
                );
            }
        } else {
            $response = array(
                'success'=>false,
                'message'=>'User does not exist',
            );
        }
        return json_encode($response);
    }

    public function verifyEaxminarLogin(){
    	$postData = $this->request->getPost();
    	$existExaminarUser = $this->common->getInfo('examinar_table','row',array('examinar_email'=>$postData['email_id']));
        if($existExaminarUser){
            if($existExaminarUser->examinar_password==md5(md5($postData['password']))){
                if($existExaminarUser->blocked!=1){
                    $userData = [
                        'id'  => $existExaminarUser->examinar_id,
                        'user_name'  => $existExaminarUser->examinar_name,
                        'email'     => $existExaminarUser->examinar_email,
                        'user_type' => 'examinar',
                        'isLoggedIn' => true,
                    ];
                    session()->set('userData',$userData);
                    $response = array(
                        'success'=>true,
                        'message'=>'Login Successfuly',
                    );
                } else {
                    $response = array(
                        'success'=>false,
                        'message'=>'You are blocked by the admin please contact admin',
                    );
                }
            } else {
                $response = array(
                    'success'=>false,
                    'message'=>'Wrong email or password',
                );
            }
        } else {
            $response = array(
                'success'=>false,
                'message'=>'User does not exist',
            );
        }
        return json_encode($response);
    }

    function logoutAdmin(){
        session()->remove('userData');
        return redirect()->to('/login');
    }
}