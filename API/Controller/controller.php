<?php

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
}
$controller= new controller;
?>