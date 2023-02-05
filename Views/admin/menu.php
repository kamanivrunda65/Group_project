
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
    <thead>
      <tr>
        <th >No</th>
        <th>Menu Title</th>
        <th>Menu name</th>
        
        <th>Menu Parent</th>
        <th>Change</th>
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

<!-- <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal-1" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                        <h4 class="modal-title">Form Tittle</h4>
                                    </div>
                                    <div class="modal-body">

                                        <form class="form-horizontal" role="form">
                                            <div class="form-group">
                                                <label class="col-lg-3 col-sm-4 control-label">Menu-Title</label>
                                                <div class="col-lg-9">
                                                    <input  class="form-control"  >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-3 col-sm-4 control-label">Menu-Title</label>
                                                <div class="col-lg-9">
                                                    <input  class="form-control"  >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 col-sm-2 control-label">Menu-Title</label>
                                                <div class="col-lg-10">
                                                    <input  class="form-control"  >
                                                </div>
                                            </div>
                                           
                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <button type="submit" class="btn btn-default">Sign in</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>

                                </div>
                            </div>
                        </div>


 -->
<script>


function statuschange(id){
  //console.log(id)
  fetch("http://localhost/Group_project/API/menustatus?menu_id="+id).then(response=>response.json()).then((res)=>{
      console.log(res);
      if(res.Code=="1"){
        window.location.href="http://localhost/Group_project/menu";
      }
      else{
        window.location.href="http://localhost/Group_project/facultytable";
      }
    })
}
    
    fetch("http://localhost/Group_project/API/navbar").then(response=>response.json()).then((res)=>{
        //console.log(res.Data);
        htmlresponse = '';
        count=1;
            res.Data.forEach(element => {
    
                htmlresponse += `<tr data-expanded="true">
                        <td>${count}</td>
                        <td>${element.menu_title}</td>
                        <td>${element.menu_name}</td>
                      
                       
                        <td>${element.menu_parent}</td>
                        <td><button type="submit" class="btn btn-info">Edit</button>   <button type="submit" class="btn btn-danger">Delete</button>`
                          if(element.menu_status == "0"){
                            htmlresponse +=`  <button type="submit" class="btn btn-primary" onclick="statuschange(${element.menu_id})">Disable</button>`
                          }
                          else{
                            htmlresponse +=`  <button type="submit" class="btn btn-primary" onclick="statuschange(${element.menu_id})">Inable</button>`
                          }
                          htmlresponse +=`</td></tr>`
                     count++;
      
            })
             //console.log(htmlresponse);
             $("#displaydata").html(htmlresponse)
    })
</script>