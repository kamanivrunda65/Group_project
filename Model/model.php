<?php

date_default_timezone_set('Asia/Kolkata');
class model{
    public $connection="";
    public function __construct(){
        try{
                $this->connection=new mysqli("localhost","root","","institute");
                
                
        }catch(Exception $e){
            $ErrorMsg=$e->getMessage();
            
            if(!file_exists("log")){
                mkdir("log");
            }
            $ErrorMsg = PHP_EOL."Error Msg        >> ".$e->getMessage();
            $ErrorMsg .= PHP_EOL."Error Date Time  >> ".date("d-m-Y H:i:s A").PHP_EOL;
            $FileName = date("d_m_y");
            file_put_contents("log/".$FileName."log.txt",$ErrorMsg,FILE_APPEND);
        }
    }
    


    public function insert($table,$data){
        $arraykey=implode(",",array_keys($data));
        $arrayvalue=implode("','",$data);
        //$id=$table."_id";
        //$email['data']=$data['email'];
        
        $SQL="INSERT INTO $table ($arraykey) VALUES ('$arrayvalue')";
        //echo $SQL;
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


    public function class($class,$course){
        $SQL="SELECT * FROM batch WHERE batch_course='$course' AND batch_class='$class'";
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
}

?>

