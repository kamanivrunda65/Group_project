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


  


    public function select($tbl, $where = ""){
        $SQL = "SELECT * FROM $tbl"; //this is a dynamic parameter recv krya 
        if ($where != "") {
                $SQL .= " WHERE ";
                foreach ($where as $key => $value) 
                {
                    $SQL .= " $key = $value AND";
                }
            $SQL = rtrim($SQL, "AND");
        }
        // echo $SQL;
        // exit; 
        $SQLEx = $this->connection->query($SQL);
        if ($SQLEx->num_rows > 0) {
            while ($Fetch = $SQLEx->fetch_object()) {
                $FetchData[] = $Fetch;
                }
                $Respose["Code"] = "1";
                $Respose["Msg"] = "Success";
                $Respose["Data"] = $FetchData;
            } else {
                $Respose["Code"] = "0";
                $Respose["Msg"] = "Try again";
                $Respose["Data"] = 0;
            }
        return $Respose;
        // echo $SQL; 
    }
}

?>

