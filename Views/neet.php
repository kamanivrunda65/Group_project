<style>
    .abc{
        margin :20px;
    }
    
    .active{
        background-color: #69dddd;
        
    }
</style>
<section class="about_sec_4">
        <div class="container">
            
            <center>
                <div class="materials_text">
                    
                        <h2 class="abc">NEET</h2>
                        <h3>NATIONAL ELIGIBILITY CUM ENTRANCE TEST</h3>
                </div>
            </center>
            
        </div>
</section>

<section class="about_sec_2">
        <div class="container">
            <div class="row">
                <div class="col_12">
                    <div class="about_sec_2_text">
                        <p>The National Eligibility cum Entrance Test (Undergraduate) or NEET (UG), formerly the All India Pre-Medical Test (AIPMT), is an all India pre-medical entrance test for students who wish to pursue undergraduate medical (MBBS), dental (BDS) and AYUSH (BAMS, BUMS, BHMS, etc.) courses in government and private institutions in India and also, for those intending to pursue primary medical qualification abroad.</p>

                        <p>The exam is conducted by National Testing Agency (NTA), which provides the results to the Directorate General of Health Services under Ministry of Health and Family Welfare and State Counselling Authorities for seat allocation.</p>

                        <p>NEET-UG replaced the All India Pre Medical Test (AIPMT) and many other pre-medical exams conducted by states and various medical colleges. However, due to lawsuits being filed against the exam, it could not be held in 2014 and 2015.</p>
                        <p>NEET-UG is a single entrance test for admissions to MBBS and BDS colleges across India. NEET UG is one of the largest exam in India in terms of registered applicants.</p>
                        <p>After the enactment of NMC Act 2019 in September 2019, NEET-UG became the sole entrance test for admissions to medical colleges in India including the All India Institutes of Medical Sciences (AIIMS) and Jawaharlal Institute of Postgraduate Medical Education & Research (JIPMER) which until then conducted separate exams.</p>
                    </div>

                </div>
            </div>
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
    <?php if(isset($_COOKIE["inquiry"]) || isset($_COOKIE["access_id"]))  {?>
    
  <!-- -------------- section 3 --------------  -->
  <section class="current_se_2">
        <div class="container">
            
                <center>
                <div class="col_25">
                    <div class="section_text active">
                        <a style="width: 90%;" > Class</a>
                    </div>
                </div>
                </center>
            <!-- <div class="row">
                <div class="col_25">
                </div>
                <div class="col_25">
                    <div class="section_text ">
                        <a href="?jeeonline">JEE(Online Class)</a>
                    </div>
                </div>
                <div class="col_25">
                    <div class="section_text">
                        <a href="?jeeoffline">JEE(Offline Class)</a>
                    </div>
                </div>
                <div class="col_25">
                </div>
            </div>-->
            
        </div>
    </section>


  <section class="current_se_3">
        <div class="container">
            <div class="row" id="displayclass">
              
               
               
            </div>
        </div>
    </section>
    <script>
		
		fetch("http://localhost/Group_project/API/class").then(response=>response.json()).then((res)=>{
            //console.log(res.Data);
            htmlresponse = '';
				res.Data.forEach(element => {
                    if(element.batch_course=="NEET"){
					htmlresponse += `<div class="col_25"><div class="current_affairs_card"><center>
                            <a>     ${element.batch_course}(${element.batch_class})</a>
                            <p>Batch : ${element.batch_name}</p>
                            <p>Faculty : ${element.batch_faculty}</p>
                            
                            <p>Time : ${element.batch_time}</p>
                            <p>Location : ${element.location}</p>
                            <p>Start Date : ${element.start_date}</p>
                            <a href="register?class=${element.batch_class}&course=${element.batch_course}"><button >Register</button></a><br>
                            </center>
                            </div></div>`
                    }      
					
				})
				 //console.log(htmlresponse);
				 $("#displayclass").html(htmlresponse)
		})
	</script>
    <?php } ?>