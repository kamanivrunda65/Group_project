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


                    case '/addvisiter':
                       $data=json_decode(file_get_contents("php://input"),true);
                       //$course=$data['course'];
                       if($data['name']!="" && $data['email']!="" && $data['mobile_no']!="" )
                       {
                            $Res=$this->insert("inquiry",$data);
                            //print_r($Res);
                            echo json_encode($Res);
                            
                        }else{
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


                     case '/materialmenu':
                        $Res = $this->select("course");
                       // $Res = $this->select_join("course",array("material"=>"course.course_name=material.material_course","course_name"));
                        echo json_encode($Res);
                        break;


                    case '/allmaterial':
                        $Res = $this->select("material");
                        echo json_encode($Res);
                        break;


                    case '/allemail':
                        $Res = $this->select("email");
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


                    case '/searchmaterial':
                        $data=json_decode(file_get_contents('php://input'),true);
                        // echo "<pre>";
                        // print_r($data);
                        // echo "</pre>";
                        if($data['search']!=""){
                        $Res = $this->select_search("material",array("material_title"=>$data['search'],"material_name"=>$data['search'],"material_course"=>$data['search'],"material_subject"=>$data['search']));
                        echo json_encode($Res);
                        }else{
                            echo "search data required.";
                        }
                        break;

                    case '/deletedata':
                        
                        $Res=$this->delete("users",array("user_id"=>$_REQUEST['id']));
                        echo json_encode($Res);
                        break;


                    case '/selectmaterial':
                        
                        $Res=$this->select_join("material",array("course"=>"course.course_id=material.material_course"),array("course_id"=>$_REQUEST['id']));
                        echo json_encode($Res);
                        break;


                    case '/deletefile':
                        
                        $Res=$this->delete("material",array("material_id"=>$_REQUEST['id']));
                        echo json_encode($Res);
                        break;


                    case '/menustatus':
                        $Res=$this->select("mainmenu",array("menu_id"=>$_REQUEST['menu_id']));
                        echo json_encode($Res);
                        if($Res['Data']['0']->menu_status=="0"){
                            $result=$this->update("mainmenu",array("menu_status"=>"1"),array("menu_id"=>$Res['Data']['0']->menu_id));
                        }else{
                            $result=$this->update("mainmenu",array("menu_status"=>"0"),array("menu_id"=>$Res['Data']['0']->menu_id));
                        }
                        //echo json_encode($result);
                        break;


                        case '/upload':
                            
                            //print_r($_REQUEST);
                            //print_r($_FILES);


                            if ($_FILES['material_name']['error'] == 0) {
                                    $file = $_FILES['material_name']['name'];
                                    $temp="material/".$_FILES["material_name"]["name"];
                                    $fileType = strtolower(pathinfo($temp, PATHINFO_EXTENSION));
                                    $allowedTypes = ['pdf'];
                                    if (!in_array($fileType, $allowedTypes)) {
                                        $msg = "Type is not allowed";
                                        
                                    }
                                    elseif ($_FILES["material_name"]["size"] > 5000000) {
                                        $msg = "Sorry, your file is too large.";
                                        
                                    } elseif (move_uploaded_file($_FILES["material_name"]["tmp_name"], $temp)) {
                                       
                                        $newArray=array_merge($_REQUEST,array("material_name"=>$file));
                                        $Res=$this->insert("material",$newArray);
                                        echo json_encode($Res);
                                    }
                                   echo $msg;
                                }
                                   
                            break;


                        case '/sectionstatus':
                            if(isset($_REQUEST['section_id']))
                            {
                                $Res=$this->select("section",array("section_id"=>$_REQUEST['section_id']));
                                echo json_encode($Res);
                                if($Res['Data']['0']->status=="0"){
                                    $result=$this->update("section",array("status"=>"1"),array("section_id"=>$Res['Data']['0']->section_id));
                                }else{
                                    $result=$this->update("section",array("status"=>"0"),array("section_id"=>$Res['Data']['0']->section_id));
                                }
                            }
                            elseif(isset($_REQUEST['s2_id'])){
                                $Res=$this->select("section2",array("s2_id"=>$_REQUEST['s2_id']));
                                echo json_encode($Res);
                                if($Res['Data']['0']->status=="0"){
                                    $result=$this->update("section2",array("status"=>"1"),array("s2_id"=>$Res['Data']['0']->s2_id));
                                }else{
                                    $result=$this->update("section2",array("status"=>"0"),array("s2_id"=>$Res['Data']['0']->s2_id));
                                }
                            }
                            elseif(isset($_REQUEST['r_id'])){
                                $Res=$this->select("user_review",array("r_id"=>$_REQUEST['r_id']));
                                echo json_encode($Res);
                                if($Res['Data']['0']->status=="0"){
                                    $result=$this->update("user_review",array("status"=>"1"),array("r_id"=>$Res['Data']['0']->r_id));
                                }else{
                                    $result=$this->update("user_review",array("status"=>"0"),array("r_id"=>$Res['Data']['0']->r_id));
                                }
                            }
                            else{

                            }
                            
                            //echo json_encode($result);
                            break;


                     case '/edituserdata':
                        $data=json_decode(file_get_contents('php://input'),true);
                        $Res=$this->update("users",$data,array("user_id"=>$data['user_id']));
                        echo json_encode($Res);
                        break;



                    case '/navbar':
                        
                        $Res=$this->select("mainmenu");
                        echo json_encode($Res);
                        break;


                    case '/section1':
                        
                        $Res=$this->select("section");
                        echo json_encode($Res);
                        break;


                     case '/section2':
                        
                        $Res=$this->select("section2");
                        echo json_encode($Res);
                        break;


                    case '/section7':
                        
                        $Res=$this->select("user_review");
                        echo json_encode($Res);
                        break;
                    

                    case '/addslider':
                        $data=json_decode(file_get_contents('php://input'),true);
                        $maintitle=addslashes($data['slider_title']);
                        //echo $maintitle;
                        $data['slider_title']=$maintitle;
                        $Res=$this->insert("section",$data);
                        echo json_encode($Res);
                        break;
                    


                    case '/addsection2':
                        $data=json_decode(file_get_contents('php://input'),true);
                        
                        $Res=$this->insert("section2",$data);
                        echo json_encode($Res);
                        break;



                    case "/sendemail":
                        
                        $data=json_decode(file_get_contents('php://input'),true);
                        $email=$_COOKIE["access_id"];
                        //echo $email;
                        $newArray=array_merge($data,array("email_from"=>$email));
                        //print_r($newArray);
                        $Res=$this->insert("email",$newArray);
                        if($Res['Code'] == 1){
                           $this->sendemail($data["email_to"],$data["email_sub"],$data["email_msg"]);
                            header("location:inbox");
                        }
                        else{
                            echo "Error";
                        }
                        echo json_encode($Res);
                        break;


                    case '/selectbyid' :
                        $Res = $this->select("users", array("user_id"=>$_REQUEST['user_id']));
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