
<section id="main-content">

	<section class="wrapper">
		<div class="table-agile-info">
		<!---728x90--->

  <div class="panel panel-default">
    <div class="panel-heading">
      Users Table
    </div>
    
    <div class="row w3-res-tb">
      
      <div class="col-sm-9"></div>
      <div class="col-sm-3">
       <form method="post" id="searchdata"> 
        <div class="input-group">
          <input type="text" class="input-sm form-control" name="search"  placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="submit" onclick="searchdata()">Go!</button>
          </span>
        </div>
       </form>
      </div>
    </div>
    <div class="table-responsive">
    <table class="table" ui-jq="footable" ui-options='{
        "paging": {
          "enabled": true
        },
        "filtering": {
          "enabled": true
        },
        "sorting": {
          "enabled": true
        }}'>
        <thead>
          <tr>
            <!-- <th data-breakpoints="xs">ID</th> -->
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile Number</th>
            <th>Course</th>
            <th>Class</th>
            <th data-breakpoints="xs">Password</th>
            <th data-breakpoints="xs">Date</th>
            <th data-breakpoints="xs sm md" data-title="DOB">Change</th>
          </tr>
        </thead>
        <tbody id="displaydata">
           
         
          
          
          
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
  <!---728x90--->
</div>
</section>
 
</section>
<script>
  function searchdata(){
    event.preventDefault();     
        let FormData = $("#searchdata").serializeArray() ;  
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
         fetch("http://localhost/Group_project/API/searchuser", header_for_post).then(response => response.json()).then((res) => {
            //console.log(res);
            htmlresponse = '';
            count=1;
				res.Data.forEach(element => {
          if(element.role_id=="2"){
					htmlresponse += `<tr data-expanded="true">
                            <td>${count}</td>
                            <td>${element.user_name}</td>
                            <td>${element.user_email}</td>
                            <td>${element.user_mobile_no}</td>
                            <td>${element.user_course}</td>
                            <td>${element.user_class}</td>
                            <td>${element.user_password}</td>
                            <td>${element.date}</td>
                            <td><a href="#"><button class="btn btn-success">Edit</button></a>  <button class="btn btn-danger" onclick="deletedata(${element.user_id})">Delete</button></td>
                            </tr>`
                         count++;
          }
				})
				 //console.log(htmlresponse);
				 $("#displaydata").html(htmlresponse)
  })
}
function deletedata(id){
    //console.log(id)
    fetch("http://localhost/Group_project/API/deletedata?user_id="+id).then(response=>response.json()).then((res)=>{
      console.log(res)
    })
}

	
		fetch("http://localhost/Group_project/API/alluser").then(response=>response.json()).then((res)=>{
            //console.log(res.Data);
            htmlresponse = '';
            count=1;
				res.Data.forEach(element => {
          if(element.role_id=="2"){
					htmlresponse += `<tr data-expanded="true">
                            <td>${count}</td>
                            <td>${element.user_name}</td>
                            <td><a href="mail?email=${element.user_email}">${element.user_email}</a></td>
                            <td>${element.user_mobile_no}</td>
                            <td>${element.user_course}</td>
                            <td>${element.user_class}</td>
                            <td>${element.user_password}</td>
                            <td>${element.date}</td>
                            <td><a href="edituser?user_id=${element.user_id}"><button class="btn btn-success">Edit</button></a>  <button class="btn btn-danger" onclick="deletedata(${element.user_id})">Delete</button></td>
                            </tr>`
                         count++;
          }
				})
				 //console.log(htmlresponse);
				 $("#displaydata").html(htmlresponse)
		})
  
	</script>
 // <!-- <a href="register?class=${element.batch_class}&course=${element.batch_course}"><button >Register</button></a><br> -->