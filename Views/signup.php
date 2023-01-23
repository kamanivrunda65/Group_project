<style>
    .forme_color {
    background-color: #fff;
    padding: 30px;
    border-radius: 8px;
    width: 50%;
    margin: 10px auto;
}
</style> <!-- -------------- section 9 --------------  -->


 <section class="se_9" >
        <div class="container">
            <div class="row align-items">
                
                    
                    <div class="se_7_text"><br>
                        <h4>...REGISTER YOURSELF...</h4>
                        <p>Enter your details</p>
                    </div>
                    <br>
                    <br>
                    <form class="  forme_color"  method="post" id="adduserform">
                        
                    
                        <input type="text" placeholder="Name" name="user_name" onblur="checkreq(this)" required>
                        <input type="text" placeholder="Email" name="user_email"  id="email" required>
                        <input type="tel" placeholder="Mobile number" name="user_mobile_no" onblur="checkreq(this)" onkeypress="return (event.which >=48 && event.which <=57 )" required>
                        <select name="user_gender" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                       
                        <?php
                        if(isset($_GET['course'])){
                        // $batch=$_GET['name'];
                        $course=$_GET['course'];
                        $class=$_GET['class'];
                        ?>
                        <input type="text" value="<?php echo $class;?>" name="user_class" readonly>
                        <input type="text" value="<?php echo $course;?>" name="user_course" readonly>
                        <?php }else{ ?>




                         <select name="user_class" onblur="checkreq(this)" >
                            <option value="Online">Online Course</option>
                            <option value="Offline">Offline Admission</option>
                        </select>
                        <select name="user_course" onblur="checkreq(this)">
                            <option value="JEE">JEE</option>
                            <option value="NEET">NEET</option>
                        </select>
                        <?php } ?>



                        
                        <input type="password" placeholder="Password" name="user_password" onblur="checkreq(this)" required>
                        <!-- <input type="text" value="<?php //echo $batch;?>" name="batch_name" disable> -->
                       
                        

                        <!-- <button name="inquiry">Submit</button> -->
                        <button  onclick="adduser()" >Submit</button>
                    </form>
                
            </div>
        </div>
    </section>
    

<script>
		function checkreq(e){
			const el=e;
			const newEl = document.createElement("span");
            const newContent = document.createTextNode("This field is required");
            newEl.appendChild(newContent);
            if (el.value == "") {  
            if (e.nextSibling.nodeName == "SPAN") {
                e.nextSibling.remove();  
                el.after(newEl);
            } else {
                el.after(newEl);
            }
            } else {
           
            }
		}


		document.getElementById("email").addEventListener("keyup", function() {
        // console.log(event);
        const el = this;          
        //console.log(this.value);           
        const newEl = document.createElement("span");       
        const newContent = document.createTextNode("Invalid email format");  
        newEl.appendChild(newContent);          
        let pattern = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;  
		
        console.log(pattern.test(this.value));  
        if (pattern.test(this.value)) {    
            if (this.nextSibling.nodeName == "SPAN") {
                this.nextSibling.remove();   
                // el.after(newEl);
            }
        } else {
            console.log("inside false", this.nextSibling); 
            if (this.nextSibling.nodeName == "SPAN") {
                this.nextSibling.remove();  
                el.after(newEl);
            } else {
                el.after(newEl);
            }
        }
    })




    function adduser(){
        event.preventDefault();     
        let FormData = $("#adduserform").serializeArray() ;  
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
         fetch("http://localhost/Group_project/API/adduser", header_for_post).then(response => response.json()).then((res) => {
            // console.log(res);
            if(res.Code==1){
                
                    window.location.href="http://localhost/Group_project/login";
                
             }else{
                     window.location.href="http://localhost/Group_project/register";
             }
         });
    }
    </script>