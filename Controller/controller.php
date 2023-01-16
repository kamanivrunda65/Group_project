<?php
include_once("Model/model.php");
class controller extends model{
    public function __construct(){
        parent::__construct();
        ob_start();
        $BaseURL="http://localhost/Group_project/";
        $uriarray = explode("/",$_SERVER['REQUEST_URI']);
        $this->BaseURLDynamic = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST']."/".$uriarray[1]."/assets/";
        
        if(isset($_SERVER['PATH_INFO'])){
            switch($_SERVER['PATH_INFO']){
                case '/home':
                    include_once('Views/header.php');
                    include_once('Views/mainpage.php');
                    include_once('Views/footer.php');
                    
                    if(isset($_REQUEST['inquiry'])){
                        array_pop($_REQUEST);
                        //echo "<pre>";
                        //print_r($_REQUEST);
                        $Res=$this->insert("inquiry",$_REQUEST);
                        // if($Res['Code'] == 1){
                        //     $_SESSION['UserData']= $Res['Data'][0];
                        //     header("location:home");
                        // }
                        // else{
                        //     echo "Error";
                        // }
                        if ($Res['Code'] == 1) {
                            $_SESSION['UserData']= $Res['Data'][0];
                    
                           if ($Res['Data'][0]->course == 'JEE') {
                               header("location:jee");
                           } else {
                               header("location:neet");
                            }
                           
                       }else {
                               echo "<script>alert('invalid user crediantials')</script>";
                           } 
                        }
                    
                    break;
                
                 case '/contact':
                    include_once('Views/header.php');
                    include_once('Views/contact.php');
                    include_once('Views/footer.php');
                    break;
                    case '/neet':
                        include_once('Views/header.php');
                        include_once('Views/neet.php');
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
                case '/jee':
                    include_once('Views/header.php');
                    include_once('Views/jee.php');
                    include_once('Views/footer.php');
                    break;
                case '/neet':
                    include_once('Views/header.php');
                    include_once('Views/neet.php');
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
        ob_flush();
    }
}
$controller=new controller;
?>