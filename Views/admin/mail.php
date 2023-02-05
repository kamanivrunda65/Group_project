<style>
  .compose-mail input, .compose-mail input:focus {
    border: none;
    padding: 10px;
    width: 90%;
    float: left;
}

</style>

<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<!-- page start-->
		<div class="mail-w3agile">
		<!---728x90--->

        <div class="row">
            <div class="col-sm-3 com-w3ls">
                <section class="panel">
                    <div class="panel-body">
                        <a href="email"  class="btn btn-compose">
                            Compose Mail
                        </a>
                        <ul class="nav nav-pills nav-stacked mail-nav">
                            <li class="active"><a href="inbox"> <i class="fa fa-inbox"></i> Inbox</a></li>
                            <li><a href="#"> <i class="fa fa-envelope-o"></i> Send Mail</a></li>
                            <li><a href="#"> <i class="fa fa-certificate"></i> Important</a></li>
                            <li><a href="#"> <i class="fa fa-file-text-o"></i> Drafts </a></a></li>
                            <li><a href="#"> <i class="fa fa-trash-o"></i> Trash</a></li>
                        </ul>
                    </div>
                </section>

            </div>
            <div class="col-sm-9 mail-w3agile">
                <section class="panel">
                    <header class="panel-heading wht-bg">
                       <h4 class="gen-case"> Compose Mail
                           
                       </h4>
                    </header>
                    <div class="panel-body">
                       
                        <div class="compose-mail">
                            <form role="form-horizontal" method="post"  enctype="multipart/form-data" id="emailform">
                                <div class="form-group">
                                    <label for="to" class="">To:</label>
                                    <input type="text" tabindex="1" id="to" class="form-control" name="email_to" value="<?php if(isset($_GET['email'])){echo $_GET['email'];} ?>" required>

                                </div>

                               
                                <div class="form-group">
                                    <label for="subject" class="">Sub:</label>
                                    <input type="text" tabindex="1" id="subject" class="form-control" name="email_sub" required>
                                </div>

                                <div class="compose-editor">
                                
                                    <textarea class="wysihtml5 form-control" rows="9" name="email_msg" required></textarea>
                                    <!-- <input type="file" class="default" name="email_file"> -->
                                </div>
                               
                                <div class="compose-btn">
                                    <button class="btn btn-primary " onclick="email()"><i class="fa fa-check"></i> Send</button></a>
                                    <button class="btn btn-info"><i class="fa fa-times"></i> Discard</button>
                                    <button class="btn btn-warning">Draft</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </section>
            </div>
			<!---728x90--->
        </div>

        <!-- page end-->
		 </div>
</section>
<script>
function email(){
    event.preventDefault();
    let Formdata=$("#emailform").serializeArray();
    //console.log(Formdata);
    var result={};
    $.each(Formdata,function(){
        result[this.name]=this.value;
    });
    let email_post={
        method: 'POST',
        body: JSON.stringify(result) 
    }
    //console.log(email_post);
    fetch("http://localhost/Group_project/API/sendemail", email_post).then(response => response.json()).then((res) => {
            // console.log(res);
            if(res.Code==1){
                
                    window.location.href="http://localhost/Group_project/inbox";
                
             }else{
                    alert("Email not send succesfully");
                     window.location.href="http://localhost/Group_project/mail";
             }
         });

}
</script>