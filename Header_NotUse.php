<!DOCTYPE html>
<html>
    <head>
        <title>Header</title>
        <link rel = "stylesheet" href = "css/bootstrap.min.css">
        <script src = "js/bootstrap.min.js"></script>
        <!-- แก้ภาษาไทยเพี้ยน -->
        <meta http-equiv = "Content-Type" content = "text/html; charset=UTF-8"/>  
        <!-- นำ Font Awesome(Logo) เข้ามาใช้ -->
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">  
        <!-- Style.css -->
        <link rel = "stylesheet" href = "style.css">
        <!-- Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
    </head>
    <body>
    <section id="slider">
        <div class="carousel slide" data-bs-ride="carousel" id="mySlider">
             <ol class="carousel-indicators">
                 <button data-bs-target="#mySlider" data-bs-slide-to="0" class="active"></button>
                 <button data-bs-target="#mySlider" data-bs-slide-to="1" class="" aria-current="true"></button>
                 <button data-bs-target="#mySlider" data-bs-slide-to="2" class=""></button>
             </ol>
             <div class="carousel-inner">
                 <div class="carousel-item carousel-image-1 carousel-item-start active">
                    <div class="container">
                         <div class="carousel-caption d-none d-sm-block">
                            <h1 class="display-3"> <!-- หัวข้อ --> </h1>
                            <p> <!-- ข้อความย่อย --> </p>
                         </div>
                     </div>
                 </div>

                 <div class="carousel-item carousel-image-2 carousel-item-next carousel-item-start">
                    <div class="container">
                        <div class="carousel-caption d-none d-sm-block">
                            <h1 class="display-3"> <!-- หัวข้อ --> </h1>
                            <p> <!-- ข้อความย่อย --> </p>
                        </div>
                    </div>
                 </div>

                 <div class="carousel-item carousel-image-3">
                    <div class="container">
                        <div class="carousel-caption d-none d-sm-block">
                            <h1 class="display-3"> <!-- หัวข้อ --> </h1>
                            <p> <!-- ข้อความย่อย --> </p>
                        </div>
                    </div>
                 </div>

                 <!-- ปุ่มสำหรับเปลี่ยนรูปภาพ -->
                 <button class="carousel-control-prev" data-bs-target="#mySlider" data-bs-slide="prev">
                     <span class="carousel-control-prev-icon"></span>
                 </button>
                 <button class="carousel-control-next" data-bs-target="#mySlider" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
             </div>
        </div>
    </section>
    </body>
</html> 