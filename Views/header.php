
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
    <!-- <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" /> -->
    <!-- font awesome icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="<?php echo $this->BaseURLDynamic;?>lib/jquery.js"></script>
	<script defer src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
    <style>
        .button1{
            background-color: #0071bc;
            color :#fff;
            border-radius: 10px;
        
        }
    </style>

</head>

<body>

    <header>
        <div class="container">
            <div class="row justify align-items">
                <div class="col">
                    <div class="logo">
                        <button class="bar"><i class="fa fa-2x fa-bars"></i></button>
                        <h1>Logo</h1>
                    </div>
                </div>
                <div class="col">
                    <div class="header_text">
                        <ul id="displaydata">
                           
                        </ul>
                    </div>
                </div>
                <?php if(isset($_COOKIE["access_id"])){?>
                    <div class="col">
                    <div class="header_text  align-items">
                        <ul>
                            <li class="dropdown" ><a href="profile"><button class="button button1">YOUR PROFILE</button></a>
                            <ul class="dropdown-nav">
                                    <li><a href="#">JEE</a></li>
                                    <li><a href="logout">LOGOUT</a></li>
                                    
                                </ul>
                            </li>
                        
                        </ul>
                    </div>
                </div>
                
                <?php } elseif(isset($_COOKIE["inquiry"])){?>
                    <div class="col">
                            <a href="login"><button class="button button1">LOGIN</button></a>
                            <a href="register"><button class="button button1">SIGN UP</button></a>
                    </div>
                <?php } else{?>
                <div class="col">
                    <div class="number">
                        <ul>
                            <li><a href="#"><i class="fa-solid fa-phone"></i></a></li>
                            <li class="fon_number"><a href="#">+919876543212</a></li>
                           
                        </ul>

                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </header>
    <div class="marging"></div>

    <!-- -------------- section 1 --------------  -->
    <script>
    
    fetch("http://localhost/Group_project/API/navbar").then(response=>response.json()).then((res)=>{
        //console.log(res.Data);
        htmlresponse = '';
        
            res.Data.forEach(element => {
            
                if(element.menu_parent == "0" && element.menu_status=="0"){
                htmlresponse += `<li class="dropdown"><a href="${element.menu_name}">${element.menu_title}</a><ul class="dropdown-nav">`
                let id=element.menu_id;
                
                res.Data.forEach(element => {
                    if(id==element.menu_parent && element.menu_status=="0"){
                        htmlresponse+=`<li><a href="${element.menu_name}">${element.menu_title}</a></li> `
                    }
                })
                
                
                htmlresponse +=`</ul></li>`;
                }
                     
      
            })
             //console.log(htmlresponse);
             $("#displaydata").html(htmlresponse)
    })
</script>