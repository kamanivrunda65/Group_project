

    <section class="m_sec_1">
        <div class="container">
            <div class="row align-items">
                <div class="col_50">
                    <div class="materials_img">
                        <img src="assets/img/img/Group-47609.png" alt="">
                    </div>
                </div>
                <div class="col_50">
                    <div class="materials_text">
                        <h2>Free Materials</h2>
                        <h3> Find by keyword and topic for getting the accurate results. </h3>
                        <form action="" class="mit_form">
                            <input type="search" class="search_field " placeholder="Search" value="" name="">
                            <button class="search_submit">Search</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </section>


    <section class="m_sec_2">
        <div class="container">
            <div class="row">
                <div class="col_12">
                    <div class="header_text">
                        <ul id="displaymenu">
                            <!-- <a href="#">All materials</a>
                            <a href="#">All materials</a> -->
                        </ul>
                        
                    </div>
                    
                </div>
            </div>


            <div class="row  justify" id="displaymaterial">
                <!-- <div class="col_30">
                    <div class="pdf_box">
                        <div class="row align-items">
                            <div class="col_80">
                                <div class="pdf_text">
                                    <h3><span>નરેન્દ્ર મોદી દ્વારા ગ્રેટર નોઇડા ખાતે IDF વર્લ્ડ ડેરી સમિટ 2022નું
                                            ઉદ્ઘાટન</span></h3>
                                </div>
                            </div>
                            <div class="col_20">
                                <div class="pdf_icons">
                                    <p><i class="fa-solid fa-download"></i></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
              
                
            
        </div>
    </section>

    <section class="sec_6">
        <div class="container">
            <div class="row">
                <div class="col_12">
                    <div class="path">
                        <h3>Begin Your Path To Become an Officer With WebSankul</h3>
                        <p>Just one click away to start your journey to become an officer</p>
                        <div class="play">
                            <img src="assets/img/img/google-play-badge.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        
		fetch("http://localhost/Group_project/API/materialmenu").then(response=>response.json()).then((res)=>{
            console.log(res.Data);
            htmltitle = '<li><a href="#">All materials</a><li>';
            
            
				res.Data.forEach(element => {
                   if(element.sub_course=="0"){
					htmltitle += ` <li class="dropdown"><a>${element.course_name}</a><ul class="dropdown-nav">`
                    let course=element.course_id;
                    res.Data.forEach(element => {

                            if(course==element.sub_course)
                             htmltitle += `<li>${element.course_name}</li>`
                            })
                        htmltitle += `</ul><li>`  
                    }  
				})
				 //console.log(htmlresponse);
				 $("#displaymenu").html(htmltitle)
            });


            function material(){
                fetch("http://localhost/Group_project/API/allmaterial").then(response=>response.json()).then((res)=>{
                console.log(res.Data);
                htmlmaterial="";
                res.Data.forEach(element=>{
                    htmlmaterial+=`<div class="col_30">
                                        <div class="pdf_box">
                                            <div class="row align-items">
                                                <div class="col_80">
                                                    <div class="pdf_text">
                                                        <h3><span>${element.material_name}</span></h3>
                                                    </div>
                                                </div>
                                                <div class="col_20">
                                                     <div class="pdf_icons">
                                                     <a href="downloadfile?material_id=${element.material_id}"><p><i class="fa-solid fa-download"></i></p></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`
                })
                $("#displaymaterial").html(htmlmaterial)
            });
        }
        material()
    </script>

// <!-- <ul id="displaydata">
//                         <li><a href="home">HOME</a></li>
//                             <li class="dropdown">
//                                 <a href="currentaffair">CURRENT AFFAIRS<i class="fa-solid fa-caret-down"></i></a>
//                                     <ul class="dropdown-nav">
//                                         <li><a href="jee">JEE</a></li>
//                                         <li><a href="neet">NEET</a></li>
//                                     </ul>
//                             </li> -->