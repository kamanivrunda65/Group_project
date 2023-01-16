<?php

include_once('Model/model.php');
class controller extends model{
    public class __construct{
            parent::__construct();
            //$BaseURL="http://localhost/Group_project/API"
            ob_start();
            if(isset($_SERVER['PATH_INFO'])){
                switch ($_SERVER['PATH_INFO']) {
                    case 'inquiryData':
                        $data=json_decode(file_get_contents('php://input'),true);
                        if($data['name']!="" && $data['password']!=""){
                            $Res=$this->insert("inquiry",$data);
                            json_encode($Res);

                            }else{
                                echo "Username and password is required."
                            }
                        }
                        break;
                    
                    default:
                        # code...
                        break;
                }

            }else{
                header('location':'home');
            }
            ob_flush();
    }
}
$controller= new controller;
?>