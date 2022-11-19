<!DOCTYPE html>
<html>
    <head>
        <title>ProfileForUser2</title>
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
            $Acc_id = $_GET['Acc_id'];  //รับ ID จากไฟล์ที่แล้ว
    
            $query = "SELECT * FROM accounts WHERE Account_ID = $Acc_id";
            $result = mysqli_query($conn , $query)or die("Error in SQL : $query".mysqli_error($conn));
            $row = mysqli_fetch_array($result);
        ?>

        <section>
        <h1 class = "alert alert-warning d-flex justify-content-center"><---- โปรไฟล์ของคุณ <?php echo $row['Account_FName'];?> <?php echo $row['Account_LName'];?> ----></h1>
        <!-- ปุ่ม -->
        <section class = "d-flex justify-content-center col-sm-12 col-lg-12" style = "margin-right: 0%; margin-bottom:0.2%;">
            <div class = "mt-5 mb-1 ">
                <a href="ProfileForUser2.php?Acc_id=<?php echo $row['Account_ID'];?>" class="btn btn-lg btn-warning border-2 border-dark rounded-3 me-1" role="button">โปรไฟล์</a>
                <a href="UserHistoryForUser2.php?Acc_id=<?php echo $row['Account_ID'];?>" class="btn btn-lg btn-warning border-2 border-dark rounded-3" role="button">ประวัติการจัดทำ</a>
            </div>      
        </section>
        <!-- Container -->
        <div id="box" class = "gradient-border container-lg bootstrap snippets bootdey">
            <div class="panel-body bg-white inf-content mb-5" style = "padding-bottom: 10%">
                <div class="row">
                    <div class="col-sm col-lg-5 col-md-6 col-xl-5 col-xxl-4">
                        <!-- รุปประจำตัว -->
                        <!-- <img alt="" style="width:600px;" title="" class="img-circle img-thumbnail isTooltip" src="image/User.png" data-original-title="Usuario">  -->
                        <img src="<? echo $path.$image ; ?>" class = "p-3" width="375px" height="375px"/>

                        <!-- ข้อมูล(Text) -->
                    </div>
                    <div class="col-sm col-md-6 col-lg-7 col-xl-7 col-xxl-8">
                        <div class="table-responsive">
                            <table class="table table-user-information mt-3">
                                <tbody>
                                    <tr>        
                                        <td>
                                            <strong>
                                                <span class="glyphicon glyphicon-asterisk text-primary"></span>
                                                รหัสบัตรประชาชน                                                
                                            </strong>
                                        </td>
                                        <td class="text-primary">
                                            <?php echo $row['Account_IDCard'];?>     
                                        </td>
                                    </tr>
                                    <tr>    
                                        <td>
                                            <strong>
                                                <span class="glyphicon glyphicon-user text-primary"></span>    
                                                ชื่อ                                                
                                            </strong>
                                        </td>
                                        <td class="text-primary">
                                            <?php echo $row['Account_FName'];?>     
                                        </td>
                                    </tr>
                                    <tr>        
                                        <td>
                                            <strong>
                                                <span class="glyphicon glyphicon-cloud text-primary"></span>  
                                                นามสกุล                                                
                                            </strong>
                                        </td>
                                        <td class="text-primary">
                                            <?php echo $row['Account_LName'];?>  
                                        </td>
                                    </tr>

                                    <tr>        
                                        <td>
                                            <strong>
                                                <span class="glyphicon glyphicon-bookmark text-primary"></span> 
                                                ชื่อผู้ใช้                                                
                                            </strong>
                                        </td>
                                        <td class="text-primary">
                                            <?php echo $row['Account_Username'];?> 
                                        </td>
                                    </tr>

                                    <tr>        
                                        <td>
                                            <strong>
                                                <span class="glyphicon glyphicon-eye-open text-primary"></span> 
                                                แผนก                                                
                                            </strong>
                                        </td>
                                        <td class="text-primary">
                                            <?php echo $row['Account_Department'];?>
                                        </td>
                                    </tr>

                                    <tr>        
                                        <td>
                                            <strong>
                                                <span class="glyphicon glyphicon-envelope text-primary"></span> 
                                                Email                                                
                                            </strong>
                                        </td>
                                        <td class="text-primary">
                                            <?php echo $row['Account_Email'];?> 
                                        </td>
                                    </tr>

                                    <tr>        
                                        <td>
                                            <strong>
                                                <span class="glyphicon glyphicon-calendar text-primary"></span>
                                                อายุ                                                
                                            </strong>
                                        </td>
                                        <td class="text-primary">
                                            <?php echo $row['Account_Age'];?>
                                        </td>
                                    </tr>

                                    <tr>        
                                        <td>
                                            <strong>
                                                <span class="glyphicon glyphicon-calendar text-primary"></span>
                                                เบอร์โทรศัพท์                                                
                                            </strong>
                                        </td>
                                        <td class="text-primary">
                                            <?php echo $row['Account_TNum'];?>
                                        </td>
                                    </tr>    

                                    <tr>        
                                        <td>
                                            <strong>
                                                <span class="glyphicon glyphicon-calendar text-primary"></span>
                                                เพศ                                                
                                            </strong>
                                        </td>
                                        <td class="text-primary">
                                            <?php echo $row['Account_Sex'];?>
                                        </td>
                                    </tr>                                      
                                </tbody>
                            </table>    
                        </div> 
                    </div>
                </div>
            </div>
        </div>            
        </section>

        <!-- Import Footer & Disconnect Database -->
        <?php
            mysqli_close($conn);
            require("Footer.php");
        ?>
    </body>
</html>