<!DOCTYPE html>
<html>
    <head>
        <title>Certificate_EditForAdmin</title>
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
            //require และเรียกใช้งาน Function FirstCheck_Admin() สำหรับการตรวจว่ามีการ Log in หรือไม่ และดูว่ามี Level ระดับ Admin หรือไม่ถ้าไม่ให้เด้งออกไปหน้า Login
            require("Header2.php");
            require("server.php");
            require("FirstCheck_BE.php");
            FirstCheck_Admin();
        ?>
    </head>
    <body>
        <?php 
            $id = $_GET['id'];  //รับ ID จากไฟล์ที่แล้ว
            $query = "SELECT Certificate_ID , Certificate_THName , Certificate_ENGName , Certificate_Year , Certificate_Detail FROM Certificates WHERE Certificate_ID = $id";
            $result = mysqli_query($conn , $query)or die("Error in SQL : $query".mysqli_error($conn));
            $row = mysqli_fetch_array($result);
        ?>

        <h1 class = "alert alert-warning d-flex justify-content-center"><---- แก้ไขใบประกาศ ----></h1>
            <div id="box" class = "gradient-border container bg-white" style = "padding-bottom: 5%">
                <form action = "Certificate_Edit_DB.php" method = "POST" enctype = "multipart/form-data" name = "upfile" id = "upfile" class = "needs-validation" novalidate>  <!-- ส่งข้อมูลไป Certificate_Edit_DB , ถ้าส่งไฟล์ต้อง Encrypt -->
                    <!-- Form กรอกข้อมูล -->
                    <div class = "mb-3 col">
                        <label for = "Certificate_ID" class = "form-label">รหัสใบประกาศ</label>
                        <input name = "Certificate_ID" type = "number" class = "form-control" readonly value = "<?php echo $row['Certificate_ID'];?>">
                    </div>

                    <div class = "mb-3 col">
                        <label for = "Certificate_THName" class = "form-label">ชื่อใบประกาศภาษาไทย</label> 
                        <input name = "Certificate_THName" type = "text" placeholder = "กรุณากรอกชื่อใบประกาศ" class = "form-control" minlength="3" value = "<?php echo $row['Certificate_THName'];?>" autofocus> 
                        <div class = "invalid-feedback">*กรุณากรอกชื่อใบประกาศ(ขั้นต่ำ 3 ตัวอักษร)</div>
                    </div>

                    <div class = "mb-3 col">
                        <label for = "Certificate_ENGName" class = "form-label">ชื่อใบประกาศภาษาอังกฤษ</label> 
                        <input name = "Certificate_ENGName" type = "text" placeholder = "กรุณากรอกชื่อใบประกาศ" class = "form-control" minlength="3" value = "<?php echo $row['Certificate_ENGName'];?>"> 
                        <div class = "invalid-feedback">*กรุณากรอกชื่อใบประกาศ(ขั้นต่ำ 3 ตัวอักษร)</div>
                    </div>

                    <div class = "mb-3">
                        <label for = "Certificate_Year" class = "form-label">ปีการศึกษา</label>
                        <input name = "Certificate_Year" type = "number" placeholder = "กรุณาปีการศึกษา" class = "form-control" required value = "<?php echo $row['Certificate_Year'];?>"> 
                        <div class = "invalid-feedback">*กรุณากรอกปีการศึกษา</div>
                    </div>

                    <div class = "mb-3">
                        <label for = "Certificate_Detail" class = "form-label">รายละเอียด</label>
                        <textarea name = "Certificate_Detail" class = "form-control" cols = "30" rows = "5" required><?php echo $row['Certificate_Detail'];?></textarea>
                        <div class = "invalid-feedback">*กรุณากรอกรายละเอียด</div>
                    </div>

                    <div class = "mb-1">
                        <label for = "Certificate_File" class = "form-label">ไฟล์เอกสาร(PDF)</label>
                        <input name = "fileupload" type = "file" class = "form-control" accept = "application/pdf" required>
                        <div class = "invalid-feedback">*กรุณาแนบไฟล์เอกสาร(PDF)</div>
                    </div>
                    
                    <!-- Button -->                    
                    <div class = "btn-group d-flex flex-row-reverse mt-5">
                        <div style = "margin-right: 0.5%">
                            <button class="btn btn-lg btn-success border-2 border-dark rounded-3" type = "submit">บันทึก</button>
                        </div>

                        <div style = "margin-right: 0.5%">
                            <a href="Certificate.php" class="btn btn-lg btn-danger border-2 border-dark rounded-3 mb-5" role="button">ยกเลิก</a>
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