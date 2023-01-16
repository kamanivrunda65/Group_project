<?php
date_default_timezone_set('Asia/Kolkata');
    class model{
        public class __construct(){
            try{
                $connection=new mysqli("localhost","root","","institute");
            }
            catch(Exception e){
                $ErrorMsg=$e->getMessage();
                if(!file_exists("log")){
                    mkdir("log");
                }
                $ErrorMsg=PHP_EOL."Error Message    >>>".$e->getMessage();
                $ErrorMsg.=PHP_EOL."Error msg dat    >>>".date("d-m-Y H:i:s A").PHP_EOL;
                $Filename=date("Y-m-d");
                file_put_contents("log/".$Filename."log.txt",$ErroeMesg,FILE_APPEND);
            }
        }

    }
?>