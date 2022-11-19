<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.js"></script>  
    <!-- แก้ภาษาไทยเพี้ยน -->
    <meta http-equiv = "Content-Type" content = "text/html; charset=UTF-8"/>  
    <!-- นำ Font Awesome(Logo) เข้ามาใช้ -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">  
    <!-- Style.css -->
    <link rel = "stylesheet" href = "styleNavigator.css">
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>
    <body> 
        <!-- Navbar -->   
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">  <!-- เป็น Navbar , ให้ย่อเมื่อ , เป็น Navbar-Dark , ติดอยู่ด้านบนตลอด -->
            <!-- Content -->
            <div class="container">
                <!-- Brand -->
                <b><i><a href="index.php" class="navbar-brand" style = "font-size: 25px;">ระบบจัดการงานวิจัย</a></i></b>
                <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar1">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Menu -->
                <div id="navbar1" class="collapse navbar-collapse">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item me-3">
                            <a href="index.php" class="nav-link">หน้าแรก</a>
                        </li>

                        <li class="nav-item me-3">
                            <a href="Research.php" class="nav-link">งานวิจัย</a>
                        </li>

                        <li class="nav-item me-3">
                            <a href="Certificate.php" class="nav-link">ใบประกาศ</a>
                        </li>

                        <li class="nav-item me-3">
                            <a href="Profile.php" class="nav-link">ดูโปรไฟล์</a>
                        </li>
                        
                        <li class="nav-item me-3">
                            <p><a href = "index.php?logout='1'" class="nav-link">ออกจากระบบ</a></p>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </body>
</html>



