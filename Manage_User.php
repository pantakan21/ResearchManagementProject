<!DOCTYPE html>
<html>
    <head>
        <title>Manage_User</title>
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
            //require และเรียกใช้งาน Function FirstCheck_Admin() สำหรับการตรวจว่ามีการ Log in หรือไม่ และดูว่ามี Level ระดับ Admin หรือไม่ถ้าไม่ให้เด้งออกไปหน้า Login
            require("Header2.php");
            require("server.php");
            require("FirstCheck_BE.php");
            FirstCheck_Admin();
        ?>
        <!-- Datatables -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.css"/>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>
    </head>
    <body>
        <h1 class = "alert alert-warning d-flex justify-content-center"><---- จัดการ User ----></h1>
        <section id="box" class = "gradient-border container bg-white">
            <section>
                <!-- ตาราง -->
                <section id = "table" class = "mt-5" style = "padding-bottom: 25%">
                    <div class = "container mt-1">
                        <div class = "bg-white">  <!-- ใช้เพื่อเปลี่ยนสีพื้นหลัง -->
                            <table id = "userdata" class = "table table-white border table-bordered table-hover table-responsive">  <!-- คุณสมบัติของตารางทั้งหมด -->
                                <thead class = "table-dark text-center">
                                    <tr>
                                        <th>รหัส</th>
                                        <th>Username</th>
                                        <th>ชื่อ</th>
                                        <th>นามสกุล</th>
                                        <th>ระดับ</th>
                                        <th>วันที่สมัคร</th>
                                        <th>วันที่อัพเดทข้อมูลล่าสุด</th>
                                    </tr>
                                </thead>
                                <tbody class = "text-center">
                                
                                <!-- การนำข้อมูลจากฐานข้อมูลมาแสดง -->
                                <?php 
                                    $query = "SELECT * FROM Accounts as a";
                                    $result = mysqli_query($conn , $query) or die("Error in sql : $query".mysqli_error($conn));
                                ?>

                                    <?php foreach($result as $row) { ?>
                                    <tr>
                                        <td><?php echo $row['Account_ID'];?></td> 
                                        <td><a href="ProfileForAdmin.php?Acc_id=<?php echo $row['Account_ID'];?>"><?php echo $row['Account_Username'];?></td></a>
                                        <td><?php echo $row['Account_FName'];?></td>
                                        <td><?php echo $row['Account_LName'];?></td>
                                        <td><?php echo $row['Account_Level'];?></td>
                                        <td><?php echo $row['Account_RegisterDate'];?></td>
                                        <td><?php echo $row['Account_RecentUpdate'];?></td>
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