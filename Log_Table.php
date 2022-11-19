<!DOCTYPE html>
<html>
    <head>
        <title>Log_Table</title>
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
        <h1 class = "alert alert-warning d-flex justify-content-center"><---- Log ----></h1>
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
                                        <th>สิ่งที่กระทำ</th>
                                        <th>วันที่กระทำ</th>
                                        <th>ผู้กระทำ</th>
                                    </tr>
                                </thead>
                                <tbody class = "text-center">
                                
                                <!-- การนำข้อมูลจากฐานข้อมูลมาแสดง -->
                                <?php 
                                    $query = "SELECT l.Log_ID , l.Log_Activity , l.Log_Date , a.Account_ID , a.Account_Username
                                              FROM accounts as a
                                              INNER JOIN logs as l ON l.Account_ID = a.Account_ID
                                              ORDER BY l.Log_ID asc";
                                    $result = mysqli_query($conn , $query) or die("Error in sql : $query".mysqli_error($conn));
                                ?>

                                    <?php foreach($result as $row) { ?>
                                    <tr>
                                        <td><?php echo $row['Log_ID'];?></td> 
                                        <td><?php echo $row['Log_Activity'];?></td>  
                                        <td><?php echo $row['Log_Date'];?></td>
                                        <td><a href="ProfileForAdmin.php?Acc_id=<?php echo $row['Account_ID'];?>"><?php echo $row['Account_Username'];?></a></td>
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