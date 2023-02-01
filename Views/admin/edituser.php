<section id="main-content">
	<section class="wrapper">
		<div class="form-w3layouts">
            <div class="row">
                <div class="col-lg-12">
				<!---728x90--->
                    <section class="panel">
                        <header class="panel-heading">
                            Edit User Data
                           
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal " id="edituserform" method="post" novalidate="novalidate">
                                    <div class="form-group ">
                                        <label class="control-label col-lg-3">Name</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" name="user_name" type="text" value="<?php echo $userdatabyid['Data'][0]->user_name;?>" >
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label col-lg-3">Email</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="email" name="user_email" type="text" value="<?php echo $userdatabyid['Data'][0]->user_email;?>">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label  class="control-label col-lg-3">Mobile no.</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " name="user_mobile_no" type="text" value="<?php echo $userdatabyid['Data'][0]->user_mobile_no;?>">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label  class="control-label col-lg-3">Gender</label>
                                        <div class="col-lg-2">
                                            <input type="radio" class=""  <?php if($userdatabyid['Data'][0]->user_gender == "Male"){ echo "checked";  } ?>  value="Male" name="user_gender" > <label>MALE</label>
                                        </div><div class="col-lg-2">    
                                            <input type="radio" class="" <?php if($userdatabyid['Data'][0]->user_gender == "Female"){ echo "checked";  } ?>  value="Female" name="user_gender"> <label >FEMALE</label>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label  class="control-label col-lg-3">Class</label>
                                            <div class="col-lg-2">
                                                <input type="radio" class=""  <?php if($userdatabyid['Data'][0]->user_class == "ONLINE"){ echo "checked";  } ?>  value="ONLINE" name="user_class" > <label>ONLINE</label>
                                            </div><div class="col-lg-2">
                                                <input type="radio" class="" <?php if($userdatabyid['Data'][0]->user_class == "OFFLINE"){ echo "checked";  } ?>  value="OFFLINE" name="user_class"> <label >OFFLINE</label>
                                            </div>
                                        
                                    </div>
                                    <div class="form-group ">
                                        <label  class="control-label col-lg-3">Course</label>
                                            <div class="col-lg-2">
                                                <input type="radio" class=""  <?php if($userdatabyid['Data'][0]->user_course == "JEE"){ echo "checked";  } ?>  value="JEE" name="user_course" > <label>JEE</label>
                                            </div><div class="col-lg-2">
                                                <input type="radio" class="" <?php if($userdatabyid['Data'][0]->user_course == "NEET"){ echo "checked";  } ?>  value="NEET" name="user_course"> <label >NEET</label>
                                            </div>
                                    </div>
                                    <div class="form-group ">
                                        <label  class="control-label col-lg-3">Password</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " name="user_password" type="text" value="<?php echo $userdatabyid['Data'][0]->user_password;?>">
                                        </div>
                                    </div>
                                   
                                   

                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-primary" type="submit" onclick="edituser(<?php echo $userdatabyid['Data'][0]->user_id ; ?>)">Update</button>
                                            
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </div>
    </section>
</section>

<script>
    function edituser(id){
        event.preventDefault();     
        let FormData = $("#edituserform").serializeArray() ;  
        console.log(FormData);
        var result = {};
        $.each(FormData, function() {
            result[this.name] = this.value;   
        });
        //console.log(result);
        let header_for_post = {
            method: 'POST', 
            body: JSON.stringify(result) 
        }
        //console.log(header_for_post);
         fetch("http://localhost/Group_project/API/edituserdata?id="+id, header_for_post).then(response => response.json()).then((res) => {
            //console.log(res);
            if(res.Code==1){
                
                    window.location.href="http://localhost/Group_project/userstable";
                
             }else{
                     window.location.href="http://localhost/Group_project/edituser";
             }
         });
    }
</script>