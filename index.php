<!DOCTYPE html>
<html>
    <head>        
        <title>Homepage</title>
        <meta http-equiv = "Content-Type" content = "text/html; charset=UTF-8"/>
        <link rel = "stylesheet" href = "css/bootstrap.min.css">
        <script src = "js/bootstrap.min.js"></script>
        <script src = "js/bootstrap.bundle.js"></script>
        <!-- แก้ภาษาไทยเพี้ยน -->
        <meta http-equiv = "Content-Type" content = "text/html; charset=UTF-8"/>  
        <!-- นำ Font Awesome(Logo) เข้ามาใช้ -->
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">  
        <!-- Style.css -->
        <link rel = "stylesheet" href = "style.css">
        <link rel = "stylesheet" href = "border.css">
        <!-- Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
        <?php            
            //require และเรียกใช้งาน Function FirstCheck_Nav() สำหรับการตรวจว่ามีการ Log in หรือไม่ และดูว่ามี Level ระดับไหนเพื่อจะเรียก Navigator Bar ให้ถูกอัน
            require("FirstCheck_BE.php");
            FirstCheck_Nav();
        ?>
    </head>
    <body>
        <!-- สร้างพื้นที่ไว้รอ -->
        <section class = "row">
            <section id = "bg1" style = "height: 450px;">
                <div>
                    <h1 class = "text-light d-flex justify-content-center" style = "font-size: 70px; padding-top: 200px;">ยินดีต้อนรับเข้าสู่ระบบจัดการงานวิจัย</h1>
                    <h2 class = "d-flex justify-content-center" style = "color: #FFC0C7;">เว็ปไซต์สำหรับจัดเก็บข้อมูลเกี่ยวกับงานวิจัยและใบประกาศ</h2>
                </div>
            </section>

            </section>

            <section id = "bg2" style = "height: 450px;">
                <div>
                    <h1 class = "text-dark d-flex justify-content-center pt-5" style = "font-size: 100px; font-weight: 700; color: black;">งานวิจัย</h1>
                </div>

                <section class = "d-flex justify-content-center col-sm-12 col-lg-12" style = "margin-right: 0%; margin-top:0.2%">
                    <div class = "mt-4 mb-1 ">
                        <a href="Research.php" class="p-5 btn btn-lg btn-info border-2 border-dark rounded-3" role="button" style = "font-size: 45px;">เข้าสู่หน้าแสดงงานวิจัย</a>
                    </div>      
                </section>
            </section>

            <section id = "bg3" style = "height: 450px;">
                <div>
                    <h1 class = "text-dark d-flex justify-content-center pt-5" style = "font-size: 100px; font-weight: 700; color: black;">ใบประกาศ</h1>
                </div>

                <section class = "d-flex justify-content-center col-sm-12 col-lg-12" style = "margin-right: 0%; margin-top:0.2%">
                    <div class = "mt-4 mb-1 ">
                        <a href="Certificate.php" class="p-5 btn btn-lg btn-success border-2 border-dark rounded-3" role="button" style = "font-size: 45px;">เข้าสู่หน้าแสดงใบประกาศ</a>
                    </div>      
                </section>
            </section>

            <section id = "bg4" style = "height: 450px;">
                <div>
                    <h1 class = "text-dark d-flex justify-content-center pt-5" style = "font-size: 100px; font-weight: 700; color: black;">โปรไฟล์</h1>
                </div>

                <section class = "d-flex justify-content-center col-sm-12 col-lg-12" style = "margin-right: 0%; margin-top:0.2%">
                    <div class = "mt-4 mb-1 ">
                        <a href="Profile.php" class="p-5 btn btn-lg btn-warning border-2 border-dark rounded-3" role="button" style = "font-size: 45px;">เข้าสู่หน้าโปรไฟล์</a>
                    </div>      
                </section>
            </section>
            
        </section>

        <!-- Import Footer -->
        <?php
            require("Footer.php");
        ?>
    </body>
</html>