<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
        <meta http-equiv = "Content-Type" content = "text/html; charset=UTF-8"/>
        <link rel = "stylesheet" href = "css/bootstrap.min.css">
        <script src = "js/bootstrap.min.js"></script>
        <script src = "js/bootstrap.bundle.js"></script>
        <!-- แก้ภาษาไทยเพี้ยน -->
        <meta http-equiv = "Content-Type" content = "text/html; charset=UTF-8"/>  
        <!-- นำ Font Awesome(Logo) เข้ามาใช้ -->
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">  
        <!-- Style.css -->
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

                                <h3 class="mb-3">Register</h3>

                                <form action = "Register_DB.php" method = "POST">
                                    
                                    <!-- ตรวจสอบเมื่อรหัสผ่านผิด -->
                                    <?php require("errors.php"); ?>
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
                                    <div class = "d-flex justify-content-center error">
                                        <input name = "username" id = "username" type = "text" placeholder = "Username" class = "form-control" autofocus minlength="6">
                                    </div>

                                    <div class = "d-flex justify-content-center mt-3">
                                        <input name = "email" id = "email" type = "email" placeholder = "Email" class = "form-control" >
                                    </div>
                                    
                                    <div class = "d-flex justify-content-center mt-3">
                                        <input name = "password_1" id = "password_1" type = "password" placeholder = "Password" class = "form-control" minlength="6">
                                    </div>
                                    
                                    <div class = "d-flex justify-content-center mt-3">
                                        <input name = "password_2" id = "password_2" type = "password" placeholder = "Confirm Password" class = "form-control" minlength="6">
                                    </div>
                                    
                                    <hr class="mt-3">

                                    <!-- Button -->
                                    <button class="btn btn-primary btn-lg btn-block w-100" type = "submit" name = "reg_user">Register</button>
                                    <p class = mt-2>Already a Member ? <a href = "Login.php">Sign in</a></p>
                                    <!-- <a href="Login.php" class="btn btn-primary btn-lg btn-block w-100 mt-1" role="button">Back</a> -->
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php
    mysqli_close($conn);
    ?>
    </body>
</html>