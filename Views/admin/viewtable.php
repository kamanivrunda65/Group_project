<style>
  .btn{
    margin-bottom: 3px;
  }
</style>
<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
              <div class="panel-heading">Views</div>
                  <div class="table-responsive">
                      <table class="table" ui-jq="footable" ui-options='{
                        "paging": { "enabled": true},
                        "filtering": {"enabled": true},
                        "sorting": {"enabled": true}}'>
                            <thead><th>Mainslider</th></thead>
                            <tbody id="displaydata">
       
                            </tbody>
                            <thead><th>Main-page Features</th></thead>
                            <tbody id="section2">
       
                            </tbody>
                            <thead><th>Main-page review</th></thead>
                            <tbody id="section7">
       
                            </tbody>
                      </table>
                  </div>
            </div>
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
        // <button type="submit" class="btn btn-info">Edit</button>
            res.Data.forEach(element => {
    
                htmlresponse += `<tr data-expanded="true">
                        <td>${count}</td>
                        <td>${element.slider_title}</td>
                        
                        <td>${element.slider_image}</td>
                        <td>${element.slider_text}</td>
                        <td ><center>   <button type="submit" class="btn btn-danger">Delete</button>`
                          if(element.status == "0"){
                            htmlresponse +=`  <button type="submit" class="btn btn-primary" onclick="statuschange(${element.section_id})">Disable</button>`
                          }
                          else{
                            htmlresponse +=`  <button type="submit" class="btn btn-primary" onclick="statuschange(${element.section_id})">Inable</button>`
                          }
                          htmlresponse +=`</center></td></tr>`
                     count++;
      
            })
             //console.log(htmlresponse);
             $("#displaydata").html(htmlresponse)
    })



function statuss2(id){
  //console.log(id)
  fetch("http://localhost/Group_project/API/sectionstatus?s2_id="+id).then(response=>response.json()).then((res)=>{
      console.log(res);
      if(res.Code=="1"){
        window.location.href="http://localhost/Group_project/viewtable";
      }
      else{
        window.location.href="http://localhost/Group_project/viewtable";
      }
    })
}
    fetch("http://localhost/Group_project/API/section2").then(response=>response.json()).then((res)=>{
        //console.log(res.Data);
        htmls2 = '';
        count1=1;
        // <button type="submit" class="btn btn-info">Edit</button> 
            res.Data.forEach(element => {
            
                htmls2 += `<tr>
                          <td>${count1}</td>                        
                          <td>${element.s2_icon}</td>
                          <td>${element.s2_title}</td>
                          <td>${element.s2_text}</td>
                          <td ><center>  <button type="submit" class="btn btn-danger">Delete</button>`
                      if(element.status == "0"){
                        htmls2 +=`  <button type="submit" class="btn btn-primary" onclick="statuss2(${element.s2_id})">Disable</button>`
                        }
                      else{
                        htmls2 +=`  <button type="submit" class="btn btn-primary" onclick="statuss2(${element.s2_id})">Inable</button>`
                        }
                        htmls2 +=`</center></td></tr>`
                     
              count1++;
            })
             //console.log(htmls2);
             $("#section2").html(htmls2)
    })


function statuss7(id){
  fetch("http://localhost/Group_project/API/sectionstatus?r_id="+id).then(response=>response.json()).then((res)=>{
      console.log(res);
      if(res.Code=="1"){
        window.location.href="http://localhost/Group_project/viewtable";
      }
      else{
        window.location.href="http://localhost/Group_project/viewtable";
      }
    })
}


    fetch("http://localhost/Group_project/API/section7").then(response=>response.json()).then((res)=>{
        //console.log(res.Data);
        htmls7 = '';
        count7=1;
            res.Data.forEach(element => {
              // <button type="submit" class="btn btn-info">Edit</button>
                htmls7 += `<tr>
                          <td>${count7}</td>                        
                          
                          <td>${element.user_name}</td>
                          <td>${element.review_rate}</td>
                          <td>${element.review_text}</td>
                          
                          <td ><center>   <button type="submit" class="btn btn-danger">Delete</button>`
                      if(element.status == "0"){
                        htmls7 +=`  <button type="submit" class="btn btn-primary" onclick="statuss7(${element.r_id})">Disable</button>`
                        }
                      else{
                        htmls7 +=`  <button type="submit" class="btn btn-primary" onclick="statuss7(${element.r_id})">Inable</button>`
                        }
                        htmls7 +=`</center></td></tr>`
                     
              count7++;
            })
             //console.log(htmls7);
             $("#section7").html(htmls7)
    })
</script>