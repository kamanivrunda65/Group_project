
<section id="main-content">

<section class="wrapper">
    <div class="table-agile-info">
    <!---728x90--->

<div class="panel panel-default">
<div class="panel-heading">
  Materials
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


function statuschange(id){
  //console.log(id)
  fetch("http://localhost/Group_project/API/sectionstatus?section_id="+id).then(response=>response.json()).then((res)=>{
      console.log(res);
      if(res.Code=="1"){
        window.location.href="http://localhost/Group_project/viewtable";
      }
      else{
        window.location.href="http://localhost/Group_project/viewtable";
      }
    })
}
    
    fetch("http://localhost/Group_project/API/section1").then(response=>response.json()).then((res)=>{
        //console.log(res.Data);
        htmlresponse = '';
        count=1;
            res.Data.forEach(element => {
    
                htmlresponse += `<tr data-expanded="true">
                        <td>${count}</td>
                        <td>${element.slider_title}</td>
                        <td>${element.slider_text}</td>
                      
                       
                        <td>${element.slider_image}</td>
                        <td ><button type="submit" class="btn btn-info">Edit</button>   <button type="submit" class="btn btn-danger">Delete</button>`
                          if(element.status == "0"){
                            htmlresponse +=`  <button type="submit" class="btn btn-primary" onclick="statuschange(${element.section_id})">Disable</button>`
                          }
                          else{
                            htmlresponse +=`  <button type="submit" class="btn btn-primary" onclick="statuschange(${element.section_id})">Inable</button>`
                          }
                          htmlresponse +=`</td></tr>`
                     count++;
      
            })
             //console.log(htmlresponse);
             $("#displaydata").html(htmlresponse)
    })
</script>