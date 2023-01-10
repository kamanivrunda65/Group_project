<?php
include_once("Model/model.php");
class controller extends model{
    public function __construct(){
        parent::__construct();
        
        $BaseURL="http://localhost/Group_project/";
        if(isset($_SERVER['PATH_INFO'])){
            switch($_SERVER['PATH_INFO']){
                case '/home':
                    include_once('Views/header.php');
                    include_once('Views/mainpage.php');
                    include_once('Views/footer.php');
                    break;
                    // if(isset($_REQUEST['inquiry'])){
                    //     array_pop($_REQUEST);
                    //     $Res=$this->insert("inquiry",$_REQUEST);
                    //     if($Res['Code'] == 1){
                    //         header("location:contact");
                    //     }
                    //     else{
                    //         echo "Error";
                    //     }

                    // }
                
                 case '/contact':
                    include_once('Views/header.php');
                    include_once('Views/contact.php');
                    include_once('Views/footer.php');
                    break;
        
                case '/material':
                    include_once('Views/header.php');
                    include_once('Views/materials.php');
                    include_once('Views/footer.php');
                    break;
                case '/privacy':
                    include_once('Views/header.php');
                    include_once('Views/privacy.php');
                    include_once('Views/footer.php');
                    break;
                
                case '/currentaffair':
                    include_once('Views/header.php');
                    include_once('Views/current_affairs.php');
                    include_once('Views/footer.php');
                    break;
                case '/about':
                    include_once('Views/header.php');
                    include_once('Views/about.php');
                    include_once('Views/footer.php');
                    break;
                case '/condition':
                    include_once('Views/header.php');
                    include_once('Views/conditions.php');
                    include_once('Views/footer.php');
                    break;
                 case '/admindashboard':
                    include_once('Views/admin/adminheader.php');
                    include_once('Views/admin/admindashboard.php');
                    include_once('Views/admin/adminfooter.php');
                    break;
                 
                
                default :
                    
                    break;
            }
        }
        else{
            header("location:home");
        }
        
    }
}
$controller=new controller;
?>