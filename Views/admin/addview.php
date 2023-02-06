

<section id="main-content">
<section class="wrapper">
	<div class="form-w3layouts">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Views Form
                    </header>
                    <div class="panel-body">
                        <div class="position-center form-horizontal text-center">
                            <div class="row">
                                <div class="col-lg-6" ><lable >Home page section 1  </label></div>
                                <div class="col-lg-6"><a href="#myModal-1" data-toggle="modal" class="btn btn-primary ">   Add Sliders</a></div>
                            </div><hr>
                            <div class="row">
                                <div class="col-lg-6" ><lable >Home page section 2  </label></div>
                                <div class="col-lg-6"><a href="#myModal-2" data-toggle="modal" class="btn btn-primary ">   Add Features</a></div>
                            </div>

                       
                       
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>
</section>


<script>
    function addview(){
        event.preventDefault();     
        let FormData = $("#sliderform").serializeArray() ;  
        //console.log(FormData);
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
        fetch("http://localhost/Group_project/API/addslider", header_for_post).then(response => response.json()).then((res) => {
            //console.log(res);
            if(res.Code==1){
                
                    window.location.href="http://localhost/Group_project/viewtable";
                
             }else{
                     window.location.href="http://localhost/Group_project/addview";
             }
         });
    }
    function addfeatures(){
        event.preventDefault();     
        let FormData = $("#section2").serializeArray() ;  
        //console.log(FormData);
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
        fetch("http://localhost/Group_project/API/addsection2", header_for_post).then(response => response.json()).then((res) => {
            //console.log(res);
            if(res.Code==1){
                
                    window.location.href="http://localhost/Group_project/viewtable";
                
             }else{
                     window.location.href="http://localhost/Group_project/addview";
             }
         });
    }

</script>