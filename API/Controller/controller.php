<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require ('vendor/autoload.php');
include_once('Model/model.php');
class controller extends model{
    public function __construct(){
            parent::__construct();
            $BaseURL="http://localhost/Group_project/API";
            ob_start();
            if(isset($_SERVER['PATH_INFO'])){
                switch ($_SERVER['PATH_INFO']) {
                    case '/inquiryData':
                            $data=json_decode(file_get_contents('php://input'),true);
                            if($data['name']!="" && $data['password']!=""){
                            $Res=$this->insert("inquiry",$data);
                            json_encode($Res);
                            }else{
                                echo "Username and password is required.";
                            }
                        break;



                    case '/class':
                        $Res = $this->select("batch");
                        echo json_encode($Res);
                        break;


                    case '/adduser':
                       $data=json_decode(file_get_contents("php://input"),true);
                       if($data['user_name']!="" && $data['user_email']!="" && $data['user_mobile_no']!="" && $data['user_password']!="" && $data['user_course']!="" && $data['user_class']!="")
                       {
                            $Res=$this->insert("users",$data);
                            $this->sendemail($data['user_email'],"Welcome","successfully register...");
                            echo json_encode($Res);
                       } else{
                        echo "All Data required";
                        }
                    
                       break;


                    case '/loginuser':
                        $data=json_decode(file_get_contents('php://input'),true);
                        if($data['user_name']!="" && $data['user_password']!=""){
                            $Res=$this->login($data['user_name'],$data['user_password']);
                            echo json_encode($Res);
                            }else{
                                echo "Username and password is required.";
                            }
                        break;


                    case '/alluser':
                        $Res = $this->select("users");
                        echo json_encode($Res);
                        break;

                     case '/allmaterial':
                        $Res = $this->select("material");
                        echo json_encode($Res);
                        break;
                    case '/searchuser':
                        $data=json_decode(file_get_contents('php://input'),true);
                        // echo "<pre>";
                        // print_r($data);
                        // echo "</pre>";
                        if($data['search']!=""){
                        $Res = $this->select_search("users",array("user_name"=>$data['search'],"user_email"=>$data['search'],"user_course"=>$data['search']));
                        echo json_encode($Res);
                        }else{
                            echo "search data required.";
                        }
                        break;
                    case '/deletedata':
                        
                        $Res=$this->delete("users",array("user_id"=>$_REQUEST['id']));
                        echo json_encode($Res);
                        break;
  
                    default:
                        # code...
                        break;
                }

            }else{
                header("location:home");
            }
            ob_flush();
    }
    public function sendemail($sendemailto,$sub,$body){
        $mail = new PHPMailer(true);
        $mail->isSMTP();                            // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';              // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                     // Enable SMTP authentication
        $mail->Username   = 'kamanivrunda123@gmail.com';                     //SMTP username
        $mail->Password   = 'dljorzlqvyzrrwli';  // your password 2step varified 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;                
        $mail->Port = 587;     //587 is used for Outgoing Mail (SMTP) Server.
        $mail->setFrom('kamanivrunda123@gmail.ccom', 'Name');
        //$mail->addAddress($_POST['email']);   // Add a recipient
        $mail->addAddress($sendemailto);
        $mail->isHTML(true);  // Set email format to HTML
        
        $bodyContent = "<h1>HeY!,</h1>: OTP : ";
        $bodyContent .= '<p>This is a email that Vrunda send you From LocalHost using PHPMailer</p>';
        $mail->Body    = $body;
        $mail->Subject = $sub;
        if(!$mail->send()) {
          //echo 'Message was not sent.';
          //echo 'Mailer error: ' . $mail->ErrorInfo;
        } else {
          //echo 'Message has been sent.';
        }
    }
}
$controller= new controller;
?>