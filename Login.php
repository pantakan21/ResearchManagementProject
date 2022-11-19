<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <meta http-equiv = "Content-Type" content = "text/html; charset=UTF-8"/>
        <link rel = "stylesheet" href = "css/bootstrap.min.css">
        <script src = "js/bootstrap.min.js"></script>
        <script src = "js/bootstrap.bundle.js"></script>
        <!-- แก้ภาษาไทยเพี้ยน -->
        <meta http-equiv = "Content-Type" content = "text/html; charset=UTF-8"/>  
        <!-- นำ Font Awesome(Logo) เข้ามาใช้ -->
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">  
        <!-- Style.css -->
        <!-- <link rel = "stylesheet" href = "style.css"> -->
        <link rel = "stylesheet" href = "border.css">
        <!-- Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
        <?php 
            session_start();
            require("server.php");
        ?>
    </head>
    <body>
        <section class = "vh-100">  <!-- กำหนดความสูง + Background Color -->
            <div class = "container py-5 h-100">  <!-- Container ด้านใน -->
                <div class="row d-flex justify-content-center align-items-center h-100">  <!-- กำหนดให้อยู่ตรงกลาง -->
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">  <!-- การแสดงผลในอุปกรณ์ต่าง ๆ -->
                        <div id="box" class="gradient-border card shadow-2-strong" style="border-radius: 1rem;">  <!-- ทำให้อยู่ในรูปแบบของ Card , รูปแบบของกรอบ -->
                            <div class = "card-body p-5 text-center">  <!-- ข้อมูลด้านในของ Card -->
                                <!-- Logo -->
                                <div class = "d-flex justify-content-center mb-1">
                                    <img src = "Image/Logo.png">
                                </div>

                                <h3 class="mb-3">Login</h3>

                                <form action = "Login_DB.php" method = "POST">
                                
                                    <!-- ตรวจสอบเมื่อรหัสผ่านผิด -->
                                    <?php if(isset($_SESSION['error'])) : ?>
                                        <div class = "text-danger">
                                            <h3>
                                                <?php
                                                    echo $_SESSION['error'];
                                                    unset($_SESSION['error']);
                                                ?>
                                            </h3>
                                        </div>
                                    <?php endif ?>

                                    <!-- Username & Password Form -->
                                    <div class = "d-flex justify-content-center">
                                        <input name = "username" type = "text" placeholder = "Username" class = "form-control" autofocus>
                                        <!-- <div class = "invalid-feedback">Incorrect Username</div> -->
                                    </div>

                                    <div class = "d-flex justify-content-center mt-3">
                                        <input name = "password" type = "password" placeholder = "Password" class = "form-control">
                                        <!-- <br><div class = "invalid-feedback">Incorrect Password</div> -->
                                    </div>

                                    <hr class="mt-3">

                                    <!-- Button -->
                                    <h1><button type = "submit" name = "login_user" class="btn btn-primary btn-lg btn-block w-100">Login</button></h1>
                                    <p class = mt-2>Not yet a Member ? <a href = "register.php">Sign Up</a></p>
                                    <!-- <a href="Register.php" class="btn btn-primary btn-lg btn-block w-100 mt-1" role="button">Register</a> -->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Import Footer & Disconnect Database -->
        <?php
        mysqli_close($conn);
        ?>
    </body>
</html>