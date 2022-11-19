<!DOCTYPE html>
<html>
    <head>
        <title>UploadCertificate</title>
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
            require("FirstCheck_BE.php");
            FirstCheck_Nav();
        ?>
    </head>
    <body>

    <h1 class = "alert alert-warning d-flex justify-content-center"><---- อัปโหลดใบประกาศ ----></h1>

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
            <form action = "UploadCertificate_DB.php" method = "POST" enctype = "multipart/form-data" name = "upfile" id = "upfile" class = "needs-validation" novalidate>  <!-- เมื่อมีการ Upload File ต้องใช้ Method Post และต้องมีการ Encrypt -->
                <!-- Form กรอกข้อมูล -->
                <div class = "mb-3 col">  <!-- mb-3 = Margin 3 -->
                    <label for = "Certificate_THName" class = "form-label">ชื่องานใบประกาศภาษาไทย</label> 
                    <input name = "Certificate_THName" type = "text" placeholder = "กรุณากรอกชื่องานวิจัยภาษาไทย" class = "form-control" autofocus minlength="3"> 
                    <div class = "invalid-feedback">*กรุณากรอกชื่อ(ขั้นต่ำ 3 ตัวอักษร)</div>
                </div>
                <div class = "mb-3 col">
                    <label for = "Certificate_ENGName" class = "form-label">ชื่องานใบประกาศภาษาอังกฤษ</label> 
                    <input name = "Certificate_ENGName" type = "text" placeholder = "กรุณากรอกชื่องานวิจัยภาษาอังกฤษ" class = "form-control" minlength="3"> 
                    <div class = "invalid-feedback">*กรุณากรอกชื่อ(ขั้นต่ำ 3 ตัวอักษร)</div>
                </div>
                <div class = "mb-3">
                    <label for = "Certificate_Year" class = "form-label">ปีการศึกษา</label>
                    <input name = "Certificate_Year" type = "number" placeholder = "กรุณากรอกปีการศึกษา" class = "form-control" required> 
                    <div class = "invalid-feedback">*กรุณากรอกเป็นตัวเลข</div>
                </div>
                <div class = "mb-3">
                    <label for = "Certificate_Detail" class = "form-label">รายละเอียด</label>
                    <textarea name = "Certificate_Detail" class = "form-control" cols = "30" rows = "5" required></textarea>
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
            </div>
            </form>

        <!-- Import Footer -->
        <?php
            require("Footer.php");
        ?>
        <script src="script.js"></script>
    </body>
</html>