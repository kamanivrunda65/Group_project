
<section id="main-content">

	<section class="wrapper">
		<div class="table-agile-info">
		<!---728x90--->

  <div class="panel panel-default">
    <div class="panel-heading">
      Materials
    </div>
    
    <div class="row w3-res-tb">
      <div class="col-sm-2 m-b-xs">
      <a href="materialupload"><button  class="btn btn-success">Upload Material</button></a>
      </div>
      <div class="col-sm-7"></div>
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
            <th >No</th>
            <th>Title</th>
            <th>Material</th>
            <th>Course</th>
            <th>Subject</th>
            <th data-breakpoints="xs">Date</th>
            <th data-breakpoints="xs sm md" ></th>
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
  let roleid = getCookie("role_id");
 
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
         fetch("http://localhost/Group_project/API/searchmaterial", header_for_post).then(response => response.json()).then((res) => {
            //console.log(res);
            htmlresponse = '';
            count=1;
				res.Data.forEach(element => {
          
					htmlresponse += `<tr data-expanded="true">
                            <td>${count}</td>
                            <td>${element.material_title}</td>
                            <td>${element.material_name}</td>
                            <td>${element.material_course}</td>
                            <td>${element.material_subject}</td>
                           
                            <td>${element.date}</td>`
                            if(roleid==1 || roleid==3){
           htmlresponse +=   `<td><a href="deletefile?material_id=${element.material_id}" ><button type="submit" class="btn btn-info">Delete</button></a></td>`
                          }
                          else{
           htmlresponse +=   `<td><a href="downloadfile?material_id=${element.material_id}" ><button type="submit" class="btn btn-info">DOWNLOAD</button></a></td>`                 
                          }
           htmlresponse += `</tr>`
                         count++;
          
				})
				 //console.log(htmlresponse);
				 $("#displaydata").html(htmlresponse)
  })
}
function deletefile(id){
    //console.log(id)
    fetch("http://localhost/Group_project/API/deletefile?material_id="+id).then(response=>response.json()).then((res)=>{
      console.log(res)
    })
}	
		fetch("http://localhost/Group_project/API/allmaterial").then(response=>response.json()).then((res)=>{
            //console.log(res.Data);
            htmlresponse = '';
            count=1;
				res.Data.forEach(element => {
        
					htmlresponse += `<tr data-expanded="true">
                            <td>${count}</td>
                            <td>${element.material_title}</td>
                            <td>${element.material_name}</td>
                            <td>${element.material_course}</td>
                            <td>${element.material_subject}</td>
                           
                            <td>${element.date}</td>`
                            
                          if(roleid==1 || roleid==3){
           htmlresponse +=   `<td><a href="deletefile?material_id=${element.material_id}" ><button type="submit" class="btn btn-info">Delete</button></a></td>`
                          }
                          else{
           htmlresponse +=   `<td><a href="downloadfile?material_id=${element.material_id}" ><button type="submit" class="btn btn-info">DOWNLOAD</button></a></td>`                 
                          }
          htmlresponse += `</tr>`
                         count++;
          
				})
				 //console.log(htmlresponse);
				 $("#displaydata").html(htmlresponse)
		})
   
	</script>
  