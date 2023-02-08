<section id="main-content">
	<section class="wrapper">
	<div class="form-w3layouts">
        <!-- page start-->
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
			<!---728x90--->
                    <section class="panel">
                        <header class="panel-heading">
                            Basic Forms
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form class="form-horizontal bucket-form"  method="post"  enctype="multipart/form-data" id="materialupload">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Course</label>
                                    <div class="col-lg-9">
                                        <select class="form-control m-bot15" name="material_course">
                                            <option value="JEE">JEE</option>
                                            <option value="NEET">NEET</option>
                                        </select>
                                    </div>       
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Subject</label>
                                    <div class="col-lg-9">
                                        <select class="form-control m-bot15" name="material_subject">
                                            <option value="PHYSICS">PHYSICS</option>
                                            <option value="CHEMISTRY">CHEMISTRY</option>
                                            <option value="MATHS">MATHS</option>
                                            <option value="BIOLOGY">BIOLOGY</option>
                                        </select>
                                    </div>       
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label col-lg-3" for="exampleInputFile">File input</label>
                                    <div class="col-lg-9">
                                    <input type="file"  name="material_name" id="material_name">
                                    <p class="help-block">Example block-level help text here.</p>
                                    </div>
                                </div>
                               
                                <center><button type="submit" class="btn btn-info" >Submit</button></center>
                            </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
</section>


    <script>
        $("form#materialupload").submit(function(e) {
        e.preventDefault();
         var formData = new FormData(this);
    
    $.ajax({
        url:'http://localhost/Group_project/API/upload',
        type: 'POST',
        dataType: 'text', // <-- what to expect back from the PHP script, if anything
        contentType: false,
        processData: false,
        data: formData,
        success: function (res) {
            //alert(res);
        window.location.href="http://localhost/Group_project/materialtable";
           
            
        },
        cache: false,
        contentType: false,
        processData: false
    });

});
    </script>