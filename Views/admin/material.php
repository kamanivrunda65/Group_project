
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
      <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
        
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
            <th>Material</th>
            <th>Course</th>
            <th>Subject</th>
            <th data-breakpoints="xs">Date</th>
            <th data-breakpoints="xs sm md" data-title="DOB">Download File</th>
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
		
		fetch("http://localhost/Group_project/API/allmaterial").then(response=>response.json()).then((res)=>{
            //console.log(res.Data);
            htmlresponse = '';
            count=1;
				res.Data.forEach(element => {
        
					htmlresponse += `<tr data-expanded="true">
                            <td>${count}</td>
                            <td>${element.material_name}</td>
                            <td>${element.material_course}</td>
                            <td>${element.material_subject}</td>
                           
                            <td>${element.date}</td>
                            <td><a href="downloadfile?material_id=${element.material_id}" ><button type="submit" class="btn btn-info">DOWNLOAD</button></a></td>
                           
                            </tr>`
                         count++;
          
				})
				 //console.log(htmlresponse);
				 $("#displaydata").html(htmlresponse)
		})
	</script>
  <!-- <a href="register?class=${element.batch_class}&course=${element.batch_course}"><button >Register</button></a><br> -->