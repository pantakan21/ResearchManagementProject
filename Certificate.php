<!DOCTYPE html>
<html>
    <head>
        <title>Certificate</title>
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
        <!-- Datatables -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.css"/>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>
    </head>
    <body>
        <h1 class = "alert alert-warning d-flex justify-content-center"><---- ใบประกาศ ----></h1>

        <section id="box" class = "gradient-border container bg-white">
            <section class = "mb-5">  <!-- ความสูง -->
                <!-- ปุ่มสำหรับไปยังหน้า Upload -->
                <div class = "d-flex flex-row-reverse" style = "margin-right: 1%">
                   <a href="UploadCertificate.php" class="btn btn-lg btn-warning border-2 border-dark rounded-3 mt-5" role="button">อัปโหลดใบประกาศ&nbsp;&nbsp;<i class="fas fa-plus"></i></a>
                </div>

                <hr class = "bg-dark">

                <!-- ตาราง -->
                <section id = "table" style = "padding-bottom: 25%">
                    <div class = "container mt-1">
                        <div class = "bg-white">  <!-- ใช้เพื่อเปลี่ยนสีพื้นหลัง -->
                            <table id = "userdata" class = "table table-white border table-bordered table-hover table-responsive">  <!-- คุณสมบัติของตารางทั้งหมด -->
                                <thead class = "table-dark text-center">  <!-- thead = Table Head -->
                                    <tr>
                                        <th>รหัส</th>
                                        <th>ชื่อใบประกาศ</th>
                                        <th>วันที่อัปโหลด</th>
                                        <th>ปีการศึกษา</th>
                                        <th>ผู้อัปโหลด</th>
                                    </tr>
                                </thead>
                                <tbody class = "text-center">
                                <?php 
                                    $query = "SELECT c.Certificate_ID , c.Certificate_THName , c.Certificate_Date , c.Certificate_Year , a.Account_FName , a.Account_ID
                                              FROM accounts as a
                                              RIGHT JOIN certificates as c ON c.Account_ID = a.Account_ID
                                              ORDER BY c.Certificate_ID asc";
                                    $result = mysqli_query($conn , $query) or die("Error in sql : $query".mysqli_error($conn));
                                ?>

                                    <?php foreach($result as $row) { ?>
                                    <tr>
                                        <td><?php echo $row['Certificate_ID'];?></td>
                                        <td><a href="ShowCertificate.php?Cer_id=<?php echo $row['Certificate_ID'];?>&Acc_id=<?php echo $row['Account_ID'];?>"><?php echo $row['Certificate_THName'];?></a></td>  
                                        <td><?php echo $row['Certificate_Date'];?></td>
                                        <td><?php echo $row['Certificate_Year'];?></td>
                                        <td><a href="ProfileForUser2.php?Acc_id=<?php echo $row['Account_ID'];?>"><?php echo $row['Account_FName'];?></a></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
                    </div>
                </div>
            </section>
        </section>
        
        <!-- Import Footer & Disconnect Database -->
        <?php
            mysqli_close($conn);
            require("Footer.php");
        ?>
        <!-- Datatables -->
        <script>
            $(document).ready(function(){
                $('#userdata').DataTable();
            })
        </script>
    </body>
</html>