<!DOCTYPE html>
<html>
    <head>
        <title>EditProfile</title>
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
        
        <h1 class = "alert alert-warning d-flex justify-content-center" enctype = "multipart/form-data" name = "upfile" id = "upfile"><---- แก้ไขข้อมูลส่วนตัว ----></h1>

        <div id="box" class = "gradient-border container bg-white" style = "padding-bottom: 5%">
            <!-- Form กรอกข้อมูล -->
            <form action = "EditProfile_DB.php" method = "POST" enctype = "multipart/form-data" name = "upfile" id = "upfile" class = "needs-validation" novalidate>
                <div class = "mb-3 col">  <!-- mb-3 = Margin 3 -->
                    <label for = "Account_FName" class = "form-label">ชื่อ</label>
                    <input name = "Account_FName" type = "text" placeholder = "กรุณากรอกชื่อ" class = "form-control" minlength="3" value = "<?php echo $row['Account_FName'];?>" required>
                    <div class = "invalid-feedback">*กรุณากรอกชื่อ(ขั้นต่ำ 3 ตัวอักษร)</div>
                </div>

                <div class = "mb-3 "> 
                    <label for = "Account_LName" class = "form-label">นามสกุล</label>
                    <input name = "Account_LName" type = "text" placeholder = "กรุณากรอกนามสกุล" class = "form-control" minlength="3" value = "<?php echo $row['Account_LName'];?>" required>
                    <div class = "invalid-feedback">*กรุณากรอกนามสกุล(ขั้นต่ำ 3 ตัวอักษร)</div>
                </div>

                <div class = "mb-3">
                    <label for = "Account_Email" class = "form-label">อีเมล</label>
                    <input name = "Account_Email" type = "email" placeholder = "กรุณากรอกอีเมล" class = "form-control" value = "<?php echo $row['Account_Email'];?>" readonly required>
                    <div class = "invalid-feedback">*กรุณากรอกอีเมล</div>
                </div>

                <div class = "mb-3">
                    <label for = "Account_TNum" class = "form-label">เบอร์โทรศัพท์</label>
                    <input name = "Account_TNum" type = "tel" placeholder = "กรุณากรอกเบอร์โทรศัพท์" class = "form-control" value = "<?php echo $row['Account_TNum'];?>" minlength="10">
                    <div class = "invalid-feedback">*กรุณากรอกเบอร์โทรศัพท์(10 ตัวอักษร)</div>
                </div>

                <div class = "mb-3">
                    <label for = "Account_IDCard" class = "form-label">รหัสบัตรประชาชน</label>
                    <input name = "Account_IDCard" type = "text" placeholder = "กรุณากรอกรหัสบัตรประชาชน" class = "form-control" value = "<?php echo $row['Account_IDCard'];?>" minlength="13">
                    <div class = "invalid-feedback">*กรุณากรอกรหัสบัตรประชาชน(13 ตัวอักษร)</div>
                </div>

                <div class = "mb-3">
                    <label for = "Account_BirthDate" class = "form-label">วัน / เดือน / ปีเกิด</label>
                    <input name = "Account_BirthDate" type = "date" class = "form-control" value = "<?php echo $row['Account_BirthDate'];?>" required>
                    <div class = "invalid-feedback">*กรุณากรอก วัน / เดือน / ปีเกิด</div>
                </div>

                <div class = "mb-3">
                    <label for = "Account_Age" class = "form-label">อายุ</label>
                    <input name = "Account_Age" type = "number" class = "form-control" placeholder = "กรุณากรอกอายุ" value = "<?php echo $row['Account_Age'];?>" required>
                    <div class = "invalid-feedback">*กรุณากรอกอายุ</div>
                </div>

                <div class = "mb-3">
                    <label for = "fileupload" class = "form-label">ภาพประจำตัว</label>
                    <input name = "fileupload" type = "file" class = form-control accept = "image/*" required> 
                    <div class = "invalid-feedback">*กรุณาแนบภาพประจำตัว</div>
                </div>

                <!-- Select , แบบ Dropdown -->
                <div>
                    <label for = "Account_Sex" class = "form-label">เพศ</label>
                    <select name = "Account_Sex" id = "form-select" value = "<?php echo $row['Account_Sex'];?>" required>
                        <option value = "" selected>กรุณาระบุเพศ</option>
                        <option value = "ชาย">ชาย</option>
                        <option value = "หญิง">หญิง</option>
                    </select>
                    <div class = "invalid-feedback">*กรุณาเลือกเพศ</div>
                </div>

                <!-- Select , แบบ Dropdown -->
                <div>
                    <label for = "Account_Department" class = "form-label">แผนก</label>
                    <select name = "Account_Department" id = "form-select" aria-placeholder="กรุณาระบุสาขาวิชา" value = "<?php echo $row['Account_Department'];?>" required>
                        <option value = "" selected>กรุณาระบุสาขาวิชา</option>
                        <option value = "สามัญสัมพันธ์">สาขาวิชาสามัญสัมพันธ์</option>
                        <option value = "ไฟฟ้ากำลัง">สาขาวิชาไฟฟ้ากำลัง</option>
                        <option value = "อิเล็กทรอนิกส์">สาขาวิชาอิเล็กทรอนิกส์</option>
                        <option value = "เทคนิคการผลิต">สาขาวิชาเทคนิคการผลิต</option>
                        <option value = "เทคนิคอุตสาหกรรม">สาขาวิชาเทคนิคอุตสาหกรรม</option>
                        <option value = "ซ่อมบำรุงเครื่องจักรกล">สาขาวิชาซ่อมบำรุงเครื่องจักรกล</option>
                        <option value = "โลหะการ">สาขาวิชาโลหะการ</option>
                        <option value = "เทคโนโลยีสารสนเทศ">สาขาวิชาเทคโนโลยีสารสนเทศ</option>
                        <option value = "เทคนิคพื้นฐาน">สาขาวิชาเทคนิคพื้นฐาน</option>
                        <option value = "บริหารธุรกิจ">สาขาวิชาบริหารธุรกิจ</option>
                        <option value = "ยานยนต์">สาขาวิชายานยนต์</option>
                        <option value = "เทคโนโลยีคอมพิวเตอร์">สาขาวิชาเทคโนโลยีคอมพิวเตอร์</option>
                        <option value = "เมคคาทรอนิกส์">สาขาวิชาเมคคาทรอนิกส์</option>
                    </select>
                    <div class = "invalid-feedback">*กรุณาเลือกแผนก</div>
                </div>

                <!-- ปุ่ม -->                    
                <div class = "btn-group d-flex flex-row-reverse">
                    <div style = "margin-right: 0.5%">
                        <button class="btn btn-lg btn-success border-2 border-dark rounded-3" type = "submit" name = "save_profile">บันทึก</button>
                    </div>

                    <div style = "margin-right: 0.5%">
                        <a href="Profile.php" class="btn btn-lg btn-danger border-2 border-dark rounded-3 mb-5" role="button">ยกเลิก</a>
                    </div> 
                </div>
            </form>
        </div> 

        <!-- Import Footer & Disconnect Database -->
        <?php
            mysqli_close($conn);
            require("Footer.php");  
        ?>
        <script src="script.js"></script>
    </body>
</html>