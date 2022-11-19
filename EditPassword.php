<html>
    <head>
        <title>EditPassword</title>
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
            require("Header2.php");
            require("server.php");
            require("FirstCheck_BE.php");
            FirstCheck_Nav();
        ?>
    </head>
    <body>
        <?php 
            $query = "SELECT * FROM Accounts WHERE Account_ID = $Account_ID";
            $result = mysqli_query($conn , $query)or die("Error in SQL : $query".mysqli_error($conn));
            $row = mysqli_fetch_array($result);
        ?>
        
        <h1 class = "alert alert-warning d-flex justify-content-center"><---- แก้ไข Username และ Password ----></h1>

            <!-- ตรวจสอบเมื่อรหัสผ่านผิด -->
                <?php if(isset($_SESSION['error'])) : ?>
                    <div class = "text-danger d-flex justify-content-center">
                        <h3>
                            <?php
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                            ?>
                        </h3>
                    </div>
                <?php endif ?>

        <div id="box" class = "gradient-border container bg-white" style = "padding-bottom: 5%">
            <div>
                <!-- Form สำหรับเปลี่ยน Username & Password -->
                <form action = "EditPassword_DB.php" method = "POST">
                    <div class = "mb-3">
                        <h3><label class = "form-label d-flex justify-content-center my-5 alert alert-success"><-- กรุณากรอก Username และ Password ปัจจุบันก่อนทำการเปลี่ยน Password ใหม่ --></label></h3>
                        <input name = "op" type = "password" placeholder = "Password ปัจจุบัน" class = "form-control mt-2" >
                    </div>

                    <div class = "mb-3">
                        <h3><label for = "Account_Password" class = "form-label d-flex justify-content-center my-5 alert alert-success"><-- Password ใหม่ --></label></h3>
                        <input name = "np" type = "password" placeholder = "Password ใหม่" class = "form-control" required>
                        <input name = "c_np" type = "password" placeholder = "ยืนยัน Password ใหม่" class = "form-control mt-2" required>
                    </div>
             
                    <div class = "btn-group d-flex flex-row-reverse mt-5">
                        <div style = "margin-right: 0.5%">
                            <input type = "hidden" name = "changepassword">
                            <button class="btn btn-lg btn-success border-2 border-dark rounded-3" type = "submit" name = "save_profile">บันทึก</button>
                        </div>

                        <div style = "margin-right: 0.5%">
                            <a href="Profile.php" class="btn btn-lg btn-danger border-2 border-dark rounded-3 mb-5" role="button">ยกเลิก</a>
                        </div> 
                    </div>
                </form>
            </div>
        </div> 

        <!-- Import Footer & Disconnect Database -->
        <?php
            mysqli_close($conn);
            require("Footer.php");
        ?>
    </body>
</html>