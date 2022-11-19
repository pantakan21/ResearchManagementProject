<!DOCTYPE html>
<html>
    <head>
        <title>UserHistoryForUser2</title>
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
        <h1 class = "alert alert-warning d-flex justify-content-center"><---- ประวัติการจัดทำ ----></h1>

        <!-- Container ใหญ่สุด -->
        <section id="box" class = "gradient-border container bg-white">
            <section class = "">
                <?php
                    $Acc_id = $_GET['Acc_id'];  //รับ ID จากไฟล์ที่แล้ว
                    $query2 = "SELECT Account_ID , Account_FName , Account_LName , Account_Department FROM accounts WHERE Account_ID = $Acc_id";
                    $result2 = mysqli_query($conn , $query2)or die("Error in SQL : $query2".mysqli_error($conn));
                    $row2 = mysqli_fetch_array($result2);
                ?>

                <h1 class = "alert alert-danger d-flex justify-content-center mb-5">งานวิจัยของคุณ <?php echo $row2['Account_FName'];?> <?php echo $row2['Account_LName'];?></h1>
                <hr class = "bg-dark">

                <!-- ตารางงานวิจัย-->
                <section id = "table">
                    <div class = "container mt-1">
                        <div class = "bg-white">  <!-- ใช้เพื่อเปลี่ยนสีพื้นหลัง -->
                            <table id = "userdata1" class = "table table-white border table-bordered table-hover table-responsive">  <!-- คุณสมบัติของตารางทั้งหมด -->
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
                                    $query1 = "SELECT Research_ID , Research_THName , Research_Budget , Research_Year FROM researchs WHERE Account_ID = $Acc_id";
                                    $result1 = mysqli_query($conn , $query1)or die("Error in SQL : $query1".mysqli_error($conn));
                                    $row1 = mysqli_fetch_array($result1);
                                ?>

                                    <?php foreach($result1 as $row1) { ?>
                                    <tr>
                                        <td><?php echo $row1['Research_ID'];?></td> 
                                        <td><a href="ShowResearch.php?Rea_id=<?php echo $row1['Research_ID'];?>&Acc_id=<?php echo $row2['Account_ID'];?>"><?php echo $row1['Research_THName'];?></a></td>  
                                        <td><?php echo $row1['Research_Budget'];?></td>
                                        <td><?php echo $row2['Account_FName'];?></td>
                                        <td><?php echo $row2['Account_Department'];?></td>
                                        <td><?php echo $row1['Research_Year'];?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
           
                <h1 class = "alert alert-success d-flex justify-content-center mt-5 mb-5">ใบประกาศของคุณ <?php echo $row2['Account_FName'];?> <?php echo $row2['Account_LName'];?></h1>
                <hr class = "bg-dark">

                <!-- ตาราง -->
                <section id = "table" style = "padding-bottom: 10%">
                    <div class = "container mt-1">
                        <div class = "bg-white">  <!-- ใช้เพื่อเปลี่ยนสีพื้นหลัง -->
                            <table id = "userdata2" class = "table table-white border table-bordered table-hover table-responsive">  <!-- คุณสมบัติของตารางทั้งหมด -->
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

                                <!-- การนำข้อมูลจากฐานข้อมูลมาแสดง -->
                                <?php 
                                    $Acc_id = $_GET['Acc_id'];  //รับ ID จากไฟล์ที่แล้ว
                                
                                    $query1 = "SELECT Certificate_ID , Certificate_THName , Certificate_Date , Certificate_Year FROM certificates WHERE Account_ID = $Acc_id";
                                    $result1 = mysqli_query($conn , $query1)or die("Error in SQL : $query1".mysqli_error($conn));
                                    $row1 = mysqli_fetch_array($result1);
                                ?>
                                    <?php foreach($result1 as $row1) { ?>
                                    <tr>
                                        <td><?php echo $row1['Certificate_ID'];?></td> 
                                        <td><a href="ShowCertificate.php?Cer_id=<?php echo $row1['Certificate_ID'];?>&Acc_id=<?php echo $row2['Account_ID'];?>"><?php echo $row1['Certificate_THName'];?></a></td>  
                                        <td><?php echo $row1['Certificate_Date'];?></td>
                                        <td><?php echo $row1['Certificate_Year'];?></td>
                                        <td><?php echo $row2['Account_FName'];?></td>
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
        <script>
        $(document).ready(function(){
            $('#userdata1').DataTable();
        })

        $(document).ready(function(){
            $('#userdata2').DataTable();
        })
        </script>
    </body>
</html>