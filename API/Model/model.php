<?php
date_default_timezone_set('Asia/Kolkata');
    class model{
        public $connection="";
    public function __construct(){
            try{
                $this->connection=new mysqli("localhost","root","","institute");
            }
            catch(Exception $e){
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
        public function select($table){
            $SQL="SELECT * FROM $table";
            $SQLEx=$this->connection->query($SQL);
            if($SQLEx->num_rows>0){
                while($SQLEXFetch=$SQLEx->fetch_object()){
                    $SqlFetchData[]=$SQLEXFetch;
                }
                $ResponseData['Code']="1";
                $ResponseData['Msg']="Success";
                $ResponseData['Data']=$SqlFetchData;
            }else{
                $ResponseData['Code']="0";
                $ResponseData['Msg']="Fail";
                $ResponseData['Data']="0";
    
            }
            return $ResponseData;
        }
        public function insert($table,$data){
            $arraykey=implode(",",array_keys($data));
            $arrayvalue=implode("','",$data);
             $SQL="INSERT INTO $table ($arraykey) VALUES ('$arrayvalue')";
            $SQLEx=$this->connection->query($SQL);
        
            if ($SQLEx > 0) {
                $ResponseData['Code']="1";
                $ResponseData['Msg']="Success";
                $ResponseData['Data']="1";
            }else{
                $ResponseData['Code']="0";
                $ResponseData['Msg']="Error while inserting";
                $ResponseData['Data']="0";
            }
            return $ResponseData;
        }
        public function login($username,$password){
            $SQL="SELECT * FROM users WHERE user_password='$password' AND ( user_name='$username' OR user_email='$username' OR user_mobile_no='$username')";
            $SQLEx=$this->connection->query($SQL);
            //print_r($SQL);
            if ($SQLEx->num_rows > 0) {
                
                while ($SQLExFetch = $SQLEx->fetch_object()) {
                    $SqlFetchData[]=$SQLExFetch;
                }
                $ResponseData['Code']="1";
                $ResponseData['Msg']="Success";
                $ResponseData['Data']=$SqlFetchData;
            }
            else {    
                $ResponseData['Code']="0";
                $ResponseData['Msg']="Error while inserting";
                $ResponseData['Data']="0";
            }
            
            return $ResponseData;
    
        }


    }
?>