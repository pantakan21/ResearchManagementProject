<?php
    //FirstCheck() สำหรับการตรวจว่ามีการ Log in หรือไม่ , รับ Session และตรวจการ Log out
    function FirstCheck(){
        session_start();
        //รับว่าเป็น Account ใคร(มาจาก Login_DB.php)
        $username = $_SESSION['username'];  
        $Account_ID = $_SESSION['Account_ID'];
        //ตรวจสอบว่ามีการ Login เข้ามาหรือไม่ถ้าไม่ให้ไปหน้า Login
        if(!isset($_SESSION['username'])) {
            $_SESSION['msg'] = "กรุณาเข้าสู่ระบบ";
            header('location: Login.php');
        }
        //ถ้ากด Logout
        if(isset($_GET['logout'])) {
            session_destroy();
            unset($_SESSION['username']);
            header('location: Login.php');
        }
    }

    //FirstCheck_Nav() สำหรับการตรวจว่ามีการ Log in หรือไม่ , รับ Session , ดูว่า Level ไหนเพื่อจะเรียก Navigator Bar ถูก และตรวจการ Log out
    function FirstCheck_Nav(){
        session_start();
        //รับว่าเป็น Account ใคร(มาจาก Login_DB.php)
        $username = $_SESSION['username'];  
        $Account_ID = $_SESSION['Account_ID'];
        $Account_Level = $_SESSION['Account_Level'];
        FirstCheck();

        //ดูสิทธิ์ว่าเป็นระดับไหนเพื่อเรียก Navbar ให้ถูกอัน
        if($Account_Level == 'Admin') {
            require("Navbar_Admin.php");
        }else{
            require("Navbar_User.php");
        }
    }

    //FirstCheck_Admin() สำหรับการตรวจว่ามีการ Log in หรือไม่ , รับ Session และตรวจการ Log out และว่าใช่ Admin ไหมถ้าไม่ใช่ให้ออกไปหน้า Login เลย
    function FirstCheck_Admin(){
        session_start();
        //รับว่าเป็น Account ใคร(มาจาก Login_DB.php)
        $username = $_SESSION['username'];  
        $Account_ID = $_SESSION['Account_ID'];
        $Account_Level = $_SESSION['Account_Level'];
        FirstCheck();

        //ดูสิทธิ์ว่าเป็นระดับไหนเพื่อเรียกถ้าไม่ใช่ Admin ให้ออกไปหน้า Login เลย
        if($Account_Level == 'Admin') {
            require("Navbar_Admin.php");
        }else{
            echo "<script type = 'text/javascript'>";
                echo "alert('คุณไม่ใช่ Admin');";
                echo "window.location = 'Login.php';";
            echo "</script>";
        }
    }
?>