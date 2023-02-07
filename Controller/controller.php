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
                    setcookie("role_id", '', time()-7000000);
                    header("location:login");
                    
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
                case '/userstable':
                    include_once('Views/admin/adminheader.php');
                    include_once('Views/admin/users.php');
                    include_once('Views/admin/adminfooter.php');
                    break;
                case '/addfaculty':
                    include_once('Views/admin/adminheader.php');
                    include_once('Views/admin/faculty.php');
                    include_once('Views/admin/adminfooter.php');
                    break;
                case '/facultytable':
                    include_once('Views/admin/adminheader.php');
                    include_once('Views/admin/facultytable.php');
                    include_once('Views/admin/adminfooter.php');
                    break;
                 case '/materialupload':
                    include_once('Views/admin/adminheader.php');
                    include_once('Views/admin/material_upload.php');
                    include_once('Views/admin/adminfooter.php');
                    if(isset($_REQUEST['material_upload'])){
                        array_pop($_REQUEST);
                        echo"<pre>";
                        // print_r($_REQUEST);
                        // print_r($_FILES);
                        if ($_FILES['filename']['error'] == 0) {
                        $file = $_FILES['filename']['name'];
                        move_uploaded_file($_FILES['filename']['tmp_name'], "assets/material/$file");
                        }
                        $newArray=array_merge($_REQUEST,array("material_name"=>$file));
                        //print_r($newArray);
                        $Res=$this->insert("material",$newArray);
                        if($Res['Code'] == 1){
                                
                                header("location:materialupload");
                                print_r($file);
                                
                            }
                            else{
                                echo "Error";
                            }
                    }
                    break;
                 case '/materialtable':
                    include_once('Views/admin/adminheader.php');
                    include_once('Views/admin/material.php');
                    include_once('Views/admin/adminfooter.php');
                    break;
                case '/downloadfile' :
                    //print_r($_REQUEST['material_id']);
                    $Res = $this->select('material',array("material_id"=>$_REQUEST['material_id']));
                    if ($Res['Code'] == "1") {
                      
                         //header("location:materialupload");
                        //print_r($Res['Data'][0]->material_name);
                        $file=$Res['Data'][0]->material_name;
                        
                        $file_location="assets/material/".$file;
                        //$size = filesize($file_location);
                        //echo $size;
                        header('Content-Type: application/octet-stream');
                        header('Content-Disposition: attachment; filename="' . basename($file_location) . '"');
                        header('Pragma: public');
                        header('Content-Length: ' . filesize($file_location));
                        
                        readfile($file_location);
                       
                    }else{
                        echo "<script>alert('Error while inserting try after sometime !!!!')</script>";
                    }
                    break;
               
                    case '/profile':
                    include_once('Views/admin/adminheader.php');
                    include_once('Views/admin/profile.php');
                    include_once('Views/admin/adminfooter.php');
                    break;
                 case '/email':
                   
                    include_once('Views/admin/adminheader.php');
                    include_once('Views/admin/mail.php');
                    include_once('Views/admin/adminfooter.php');
                   break;
                case '/inbox':
                    include_once('Views/admin/adminheader.php');
                    include_once('Views/admin/allmails.php');
                    include_once('Views/admin/adminfooter.php');
                    break;
                case '/edituser':
                    include_once('Views/admin/adminheader.php');
                    include_once('Views/admin/edituser.php');
                    include_once('Views/admin/adminfooter.php');
                    break;
                 case '/menu':
                    include_once('Views/admin/adminheader.php');
                    include_once('Views/admin/menu.php');
                    include_once('Views/admin/adminfooter.php');
                    break;
                case '/frontview':
                    include_once('Views/admin/adminheader.php');
                    include_once('Views/admin/menu.php');
                    include_once('Views/admin/adminfooter.php');
                    break;
                case '/addview':
                    include_once('Views/admin/adminheader.php');
                    include_once('Views/admin/addview.php');
                    include_once('Views/admin/popupbox.php');
                    include_once('Views/admin/adminfooter.php');
                    break;
                case '/viewtable':
                    include_once('Views/admin/adminheader.php');
                    include_once('Views/admin/viewtable.php');
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