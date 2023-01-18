<style>
    .abc{
        margin :20px;
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
    <?php if(isset($_SESSION['UserData'])) { 
    print_r($_SESSION['UserData'])?>
    
  <!-- -------------- section 3 --------------  -->
  <section class="current_se_2">
        <div class="container">
            
            <div class="row">
               
                <div class="col_25">
                    <div class="section_text">
                        <a href="?neetonline">NEET(Online Class)</a>
                    </div>
                </div>
              
                <div class="col_25">
                    <div class="section_text">
                        <a href="?neetoffline">NEET(Offline Class)</a>
                    </div>
                </div>
            </div>
                
            
        </div>
    </section>


  <section class="current_se_3">
        <div class="container">
            <div class="row">
              
                <div class="col_25">
                    <div class="current_affairs_card">
                        
                        <div class="se_3_text_pading">
                            <a>Course : <?php echo $_SESSION['class']->batch_course;?>(<?php echo $_SESSION['class']->batch_class;?>)</a>
                            <p>Fauclty :<?php echo $_SESSION['class']->batch_faculty;?></p> 
                            <p>Batch Name :<?php echo $_SESSION['class']->batch_name;?></p> 
                            <p>Location :<?php echo $_SESSION['class']->location;?></p> 
                            <p>Start Date :<?php echo $_SESSION['class']->start_date;?></p> 
                            
                            
                        </div>
                    </div>
                </div>
               
               
            </div>
        </div>
    </section>
    <?php } ?>