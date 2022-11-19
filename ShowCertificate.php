<!DOCTYPE html>
<html>
    <head>
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
        <!-- ดึงข้อมูลจาก Database -->
        <?php
            $Cer_id = $_GET['Cer_id'];  //รับ ID จากไฟล์ที่แล้ว
            $Acc_id = $_GET['Acc_id'];  //รับ ID จากไฟล์ที่แล้ว
    
            $query1 = "SELECT * FROM certificates WHERE Certificate_ID = $Cer_id";
            $query2 = "SELECT * FROM accounts WHERE Account_ID = $Acc_id";
            $result1 = mysqli_query($conn , $query1)or die("Error in SQL : $query1".mysqli_error($conn));
            $result2 = mysqli_query($conn , $query2)or die("Error in SQL : $query2".mysqli_error($conn));
    
            $row1 = mysqli_fetch_array($result1);
            $row2 = mysqli_fetch_array($result2);
        ?>

        <h1 class = "alert alert-warning d-flex justify-content-center"><---- ใบประกาศ ----></h1>

        <section class = "container d-flex justify-content-end mt-5 mb-2">
            <!-- Button -->
            <div class = "d-flex flex-row-reverse">
                <a href="Certificate.php" class="btn btn-lg btn-primary border-2 border-dark rounded-3" role="button">ย้อนกลับ</a>
            </div> 
        </section>
        <!-- ตารางสำหรับแสดงข้อมูล -->
        <section id="box" class = "gradient-border container h4 mb-5">
            <section>
                <div class = "vh-100 bg-white">
                    <table class = "mx-5">
                        <tbody>
                            <tr>
                                <td>
                                    <div style="border-left: 1px #CCCCCC solid; font-weight: bold; font-size: 18px;"></div>
                                </td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td><span><strong>รหัส</strong> : <strong>
                                <?php echo $row1['Certificate_ID'];?></strong></span></td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td><span><strong>ชื่อใบประกาศภาษาไทย</strong> : <strong>
                                <?php echo $row1['Certificate_THName'];?></strong></span></td>
                            </tr>
                            
                            <tr>
                                <td>&nbsp;</td>
                                <td><span><strong>ชื่อใบประกาศภาษาอังกฤษ</strong> : <strong>
                                <?php echo $row1['Certificate_ENGName'];?></strong></span></td>
                            </tr>
                        
                            <tr>
                                <td>&nbsp;</td>
                                <td><strong>ปีการศึกษา</strong> : <span>
                                <?php echo $row1['Certificate_Year'];?></span></td>
                            </tr>
                        
                            <tr>
                                <td>&nbsp;</td>
                                <td><strong>รายละเอียด</strong>
                                <?php echo $row1['Certificate_Detail'];?></td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td><span><strong>ผู้อัปโหลด</strong> :
                                <?php echo $row2['Account_FName'];?> <?php echo $row2['Account_LName'];?></span></td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td><span><strong>แผนก</strong> :
                                <?php echo $row2['Account_Department'];?></span></td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td><span><strong>เบอร์ติดต่อ</strong> :
                                <?php echo $row2['Account_TNum'];?></span></td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td><strong>ไฟล์เอกสาร</strong> :
                                <?php echo $row1['Certificate_File'];?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </section>
        <!-- Import Footer & Disconnect Database -->
        <?php
            mysqli_close($conn);
            require("Footer.php");
        ?>
    </body>
</html>