
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Institute</title>
    <!-- slick slider -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    <!-- google icon font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!-- font awesome icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="<?php echo $this->BaseURLDynamic;?>lib/jquery.js"></script>
	<script defer src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>


</head>

<body>
    
<style>
    .forme_color {
    background-color: #fff;
    padding: 30px;
    border-radius: 8px;
    width: 40%;
    margin: 10px auto;
}
.abc{
    padding: 200px 100px;
    background-image :url(https://websankul.org/wp-content/uploads/2022/11/background-1-scaled.webp);
    background-size: cover;
    background-position: center center;
}
</style> <!-- -------------- section 9 --------------  -->


 <section class="abc" >
        <div class="container">
            <div class="row align-items">
                
                  
                    <form class="  forme_color"  method="post" id="loginform">
                          
                    <div class="se_7_text"><br>
                        <h4>...LOGIN...</h4>
                        
                    </div><br><br>
                        <input type="text" placeholder="Name" name="user_name">
                        <input type="password" placeholder="Password" name="user_password">
                        <button  onclick="loginform()" >Submit</button>
                    </form>
                
            </div>
        </div>
    </section>
<script>
    function loginform() {
        event.preventDefault();   
        let FormData = $('#loginform').serializeArray();
            //console.log(FormData);
            var result = {};
            $.each(FormData, function() {
            result[this.name] = this.value;  
            });
       
        let header_for_post = {
            method: 'POST', 
            body: JSON.stringify(result) 
        }
        //console.log(header_for_post);


         fetch("http://localhost/Group_project/API/loginuser", header_for_post).then(response => response.json()).then((res) => {
             console.log(res);
             if(res.Code==1){
                document.cookie=`access_id=${res.Data[0].user_email}`;
                if (res.Data[0].role_id==1) {
                    window.location.href="http://localhost/Group_project/admindashboard";
                }else{
                    window.location.href="http://localhost/Group_project/home";
                }
              
             }
             else{
                window.location.href="http://localhost/Group_project/login";
             }
            //data=  $.parseJSON(res)
            //console.log(res.getValue(Code));
         })


    }
</script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <!-- <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer>
 </script> -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- <script type="text/javascript">
        var onloadCallback = function () {
            // alert("grecaptcha is ready!");
        };
    </script> -->

    <!-- <script src="assets/js/custom.js" defer></script> -->

</body>

</html>