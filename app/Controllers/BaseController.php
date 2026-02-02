<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use \Firebase\JWT\JWT;
use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;
// use App\PHPMailer\PHPMailer\PHPMailer;
use \Nullix\CryptoJsAes\CryptoJsAes;
use App\Models\BaseModel;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * Constructor.
     */
    private $key;
    private $common;
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.
        $this->key = getenv('JWT_SECRET');
        // E.g.: $this->session = \Config\Services::session();
        $this->common = new BaseModel();
    }

    // public function encodeToken($value='')
    // {
    //     $token = JWT::encode($value, $this->key, 'HS256');
    //     return $token;
    // }

    protected function decryptValue($string=''){
          // $key = "ankit#$"; //key to encrypt and decrypts.
          // $result = '';
          // $string = base64_decode($string);
          // for($i=0; $i<strlen($string); $i++) {
          //   $char = substr($string, $i, 1);
          //   $keychar = substr($key, ($i % strlen($key))-1, 1);
          //   $char = chr(ord($char)-ord($keychar));
          //   $result.=$char;
          // }
          return $string;
    }
    protected function encryptValue($string=''){
        // $key = "ankit#$"; //key to encrypt and decrypts.
        // $result = '';
        // for($i=0; $i<strlen($string); $i++) {
        //   $char = substr($string, $i, 1);
        //   $keychar = substr($key, ($i % strlen($key))-1, 1);
        //   $char = chr(ord($char)+ord($keychar));
        //   $result.=$char;
        // }
        // return base64_encode($string);
          return $string;
    }

    function sendMail($to, $subject, $message,$from_name='') {
        // $email = \Config\Services::email();
        // $email->setTo($to);
        // $email->setFrom(FROM_NAME,$from_name);//set From
        // $email->setSubject($subject);
        // $email->setMessage($message);

        // $email->setMailType('html'); 
        // if ($email->send()) 
		// {
        //     return 1;
        // } 
		// else 
		// {
        //     $data = $email->printDebugger(['headers']);
        //     print_r($data);
            
        // }
        $mail = new PHPMailer();
        
        $mail->IsSMTP();
        $mail->Host = SMTP_HOST;
        $mail->SMTPAuth = true;

        $mail->Username = EMAIL_ID; // SMTP username
        $mail->Password = EMAIL_PASSWORD; // SMTP password
        
        $mail->SMTPSecure = 'tls';                             
        $mail->Port       = SMTP_PORT; 
        // $mail->SMTPDebug = 1;
        // print_r($mail);
        // die();

        $mail->setFrom(EMAIL_ID,$from_name);
        $mail->AddAddress($to);
        $mail->WordWrap = 50;
        $mail->IsHTML(true);

        $mail->Subject = $subject;
        $mail->Body = $message;

        if(!$mail->Send())
            return 0;
        else
            return 1;
    }

    public function getCartId(){
        try {
            if(session()->get('studentDetails')!==null){
                $studentDetails = session()->get('studentDetails');
                if(isset($studentDetails['cart_id'])){
                    $cart_id = $studentDetails['cart_id'];
                } else {
                    if(isset($studentDetails['id'])){
                        $studentId = $studentDetails['id'];
                        $checkCartIdExist = $this->common->getInfo('cart_table','row',array('student_id'=>$studentId,'deleted'=>0));
                        if(empty($checkCartIdExist)){
                            $cart_id = $this->common->dbAction('cart_table',array('student_id'=>$studentId),'insert_id',array());
                        }
                    } else {
                        $cart_id='';
                    }
                }
                if(!empty($cart_id)){
                    $response = array('success'=>true,'data'=>$cart_id);
                } else {
                    $response = array('success'=>false,'data'=>'');
                }
            }
        } catch (\Exception $e) {
            error_log($e->getMessage());
            $response = array('success'=>false,'data'=>'');
        }
        return $response;
    }
}
