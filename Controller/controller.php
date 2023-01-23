<?php
include_once("Model/model.php");
session_start();
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
                        $course=$_REQUEST['course'];
                        $class=$_REQUEST['class'];
                        $Res=$this->insert("inquiry",$_REQUEST);
                        //echo "<pre>";
                        //print_r($_REQUEST);
                        //$Res=$this->insert("inquiry",$_REQUEST);
                        // if($Res['Code'] == 1){
                        //     $_SESSION['UserData']= $Res['Data'][0];
                        //     header("location:home");
                        // }
                        // else{
                        //     echo "Error";
                        // }
                        //$_SESSION['email']=$_REQUEST['email'];
                    
                        if ($Res['Code'] == 1) {
                            $_SESSION['UserData']= $Res['Data'][0];
                        
                           if ($course == 'JEE') {
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
                case '/class':
                    include_once('Views/header.php');
                    include_once('Views/class.php');
                    include_once('Views/footer.php');
                    break;
                case '/register':
                    include_once('Views/header.php');
                    include_once('Views/signup.php');
                    include_once('Views/footer.php');
                    break;
                case '/neet':
                    
                    include_once('Views/header.php');
                    include_once('Views/neet.php');
                    include_once('Views/footer.php');
                    break;
                    
                 case '/jee':
                    include_once('Views/header.php');
                    include_once('Views/jee.php');
                    include_once('Views/footer.php');
                   break;
                case '/material':
                    include_once('Views/header.php');
                    include_once('Views/materials.php');
                    include_once('Views/footer.php');
                    break;
                case '/login':
                    include_once('Views/login.php');
                    break;
               
                case '/logout':
                    setcookie("access_id", '', time()-7000000);
                    header("location:login");
                    
                    break;   
                 case '/adminlogin':
                    include_once('Views/admin/login.php');
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
                case '/usertable':
                    include_once('Views/admin/adminheader.php');
                    include_once('Views/admin/usertable.php');
                    include_once('Views/admin/adminfooter.php');
                    break;
                case '/addfaculty':
                    include_once('Views/admin/adminheader.php');
                    include_once('Views/admin/faculty.php');
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