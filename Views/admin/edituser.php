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
                                            <input class=" form-control" id="user_id" name="user_id" type="hidden" >
                                            <input class=" form-control" name="user_name" type="text" id="user_name" >
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label col-lg-3">Email</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="user_email" name="user_email" type="text" >
                                            
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label  class="control-label col-lg-3">Mobile no.</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " name="user_mobile_no" type="text" id="user_mobile_no">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label  class="control-label col-lg-3">Gender</label>
                                        <div class="col-lg-2">
                                            <input type="radio" class=""   name="user_gender" id="male"> <label>MALE</label>
                                        </div><div class="col-lg-2">    
                                            <input type="radio" class=""   name="user_gender" id="female"> <label >FEMALE</label>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label  class="control-label col-lg-3">Class</label>
                                            <div class="col-lg-2">
                                                <input type="radio" class=""    value="ONLINE" name="user_class" id="online" > <label>ONLINE</label>
                                            </div><div class="col-lg-2">
                                                <input type="radio" class=""  value="OFFLINE" name="user_class" id="offline"> <label >OFFLINE</label>
                                            </div>
                                        
                                    </div>
                                    <div class="form-group ">
                                        <label  class="control-label col-lg-3">Course</label>
                                            <div class="col-lg-2">
                                                <input type="radio" class=""   value="JEE" name="user_course" id="jee"> <label>JEE</label>
                                            </div><div class="col-lg-2">
                                                <input type="radio" class=""   value="NEET" name="user_course" id="neet"> <label >NEET</label>
                                            </div>
                                    </div>
                                   
                                   
                                   

                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-primary" type="submit" onclick="edituser()">Update</button>
                                            
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
    function edituser(){
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
         fetch("http://localhost/Group_project/API/edituserdata", header_for_post).then(response => response.json()).then((res) => {
            //console.log(res);
            if(res.Code==1){
                
                    window.location.href="http://localhost/Group_project/userstable";
                
             }else{
                     window.location.href="http://localhost/Group_project/edituser";
             }
         });
    }




    let params = new URLSearchParams(location.search);
    let name1 = params.get('user_id')
    //console.log(name1);
    function selectbyid(params) {
      fetch("http://localhost/Group_project/API/selectbyid?user_id=" + name1).then((response) => response.json()).then((res) => {
        console.log(res);
        document.getElementById("user_name").value = res.Data[0].user_name
        document.getElementById("user_email").value = res.Data[0].user_email
        document.getElementById("user_mobile_no").value = res.Data[0].user_mobile_no
        document.getElementById("user_id").value = res.Data[0].user_id
        if (res.Data[0].user_gender == "Male") {
          radiobtnmale = document.getElementById("male");
          radiobtnmale.checked = true;
        } else {
          radiobtnfemale = document.getElementById("female");
          radiobtnfemale.checked = true;
        }
        if (res.Data[0].user_class == "ONLINE") {
          radiobtnmale = document.getElementById("online");
          radiobtnmale.checked = true;
        } else {
          radiobtnfemale = document.getElementById("offline");
          radiobtnfemale.checked = true;
        }
        if (res.Data[0].user_course == "JEE") {
          radiobtnmale = document.getElementById("jee");
          radiobtnmale.checked = true;
        } else {
          radiobtnfemale = document.getElementById("neet");
          radiobtnfemale.checked = true;
        }
      })
    }
    selectbyid()
</script>