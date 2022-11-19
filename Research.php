<!DOCTYPE html>
<html>
    <head>
        <title>Research</title>
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
        <!-- Import Navigator Bar และ Header -->
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
        <h1 class = "alert alert-warning d-flex justify-content-center"><---- งานวิจัย ----></h1>

        <section id="box"  class = "gradient-border container bg-white">
            <section class = "mb-5">
                <!-- ปุ่มสำหรับไปยังหน้า Upload -->
                <div class = "d-flex flex-row-reverse" style = "margin-right: 1%">
                   <a href="UploadResearch.php" class="btn btn-lg btn-warning border-2 border-dark rounded-3 mt-5" role="button">อัปโหลดงานวิจัย&nbsp;&nbsp;<i class="fas fa-plus"></i></a>
                </div>
                
                <hr class = "bg-dark">

                <!-- ตาราง -->
                <section id = "table" style = "padding-bottom: 25%">
                    <div class = "container mt-1">
                        <div class = "bg-white">  <!-- ใช้เพื่อเปลี่ยนสีพื้นหลัง -->
                            <table id = "userdata" class = "table table-white border table-bordered table-hover table-responsive">  <!-- คุณสมบัติของตารางทั้งหมด -->
                                <thead class = "table-dark text-center">
                                    <tr>
                                        <th>รหัส</th>
                                        <th>ชื่องานวิจัย</th>
                                        <th>งบประมาณ</th>
                                        <th>ผู้วิจัย</th>
                                        <th>แผนก</th>
                                        <th>ปีการศึกษา</th>
                                    </tr>
                                </thead>
                                <tbody class = "text-center">
                                
                                <!-- การนำข้อมูลจากฐานข้อมูลมาแสดง -->
                                <?php 
                                    $query = "SELECT r.Research_ID , r.Research_Year , r.Research_THName , r.Research_Budget , a.Account_FName , a.Account_Department , a.Account_ID
                                              FROM accounts as a
                                              INNER JOIN researchs as r ON r.Account_ID = a.Account_ID
                                              ORDER BY r.Research_ID asc";
                                    $result = mysqli_query($conn , $query) or die("Error in sql : $query".mysqli_error($conn));
                                ?>

                                    <?php foreach($result as $row) { ?>
                                    <tr>
                                        <td><?php echo $row['Research_ID'];?></td> 
                                        <td><a href="ShowResearch.php?Rea_id=<?php echo $row['Research_ID'];?>&Acc_id=<?php echo $row['Account_ID'];?>"><?php echo $row['Research_THName'];?></a></td>  
                                        <td><?php echo $row['Research_Budget'];?></td>
                                        <td><a href="ProfileForUser2.php?Acc_id=<?php echo $row['Account_ID'];?>"><?php echo $row['Account_FName'];?></a></td>
                                        <td><?php echo $row['Account_Department'];?></td>
                                        <td><?php echo $row['Research_Year'];?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </section>
        </section>

        <!-- Import Footer & Disconnect Database -->
        <?php
            mysqli_close($conn);
            require("Footer.php");        
        ?>
        <script src="script.js"></script>
    </body>
    <script>
        $(document).ready(function(){
            $('#userdata').DataTable();
        })
    </script>
</html>