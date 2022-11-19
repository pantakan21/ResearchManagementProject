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
        <link rel = "stylesheet" href = "styleHeader.css">
        <!-- Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
    </head>
    <body>
        <header id = "page-header" class = "header">
            <div class="intro">ร ะ บ บ จั ด ก า ร ง า น วิ จั ย :)<span class="indeks"></span></div>
        </header>

        <!-- VantaJS สำหรับภาพเคลื่อนไหว -->
        <script src = "https://cdnjs.cloudflare.com/ajax/libs/three.js/r121/three.min.js"></script>
        <script src = "https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.net.min.js"></script>
        <script>
            VANTA.NET({
            el: "#page-header",
            mouseControls: true,
            touchControls: true,
            gyroControls: false,
            minHeight: 200.00,
            minWidth: 200.00,
            scale: 1.00,
            scaleMobile: 1.00,
            color: 0xaa082e,
            backgroundColor: 0x0,
            points: 13.00,
            maxDistance: 25.00,
            spacing: 20.00
            })
        </script>
        <script src="text.js"></script>
    </body>
</html> 