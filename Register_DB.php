<?php
    session_start();
    require("server.php");
    require("Log_BE.php");

    $errors = array();

    if(isset($_POST['reg_user'])) {  //ดูว่ามีการกดปุ่ม Submit หรือไม่
        //ดูว่าส่งอะไรมา
        $username = mysqli_real_escape_string($conn , $_POST['username']);
        $email = mysqli_real_escape_string($conn , $_POST['email']);
        $password_1 = mysqli_real_escape_string($conn , $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($conn , $_POST['password_2']);

        date_default_timezone_set('asia/bangkok');
        $date = date('Y-m-d H:i:s');

        $Defaultname = "Guest";

        //ดูว่าข้อมูลซ้ำในระบบหรือไม่
        $user_check_query = "SELECT * FROM accounts WHERE Account_Username = '$username' OR Account_Email = '$email' LIMIT 1";
        $query = mysqli_query($conn , $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if($result) {  //ถ้าข้อมูลซ้ำในระบบ
            if($result['Account_Username'] === $username) {
                array_push($errors , "มี Username ซ้ำกันในระบบ");
            }
            if($result['Account_Email'] === $email) {
                array_push($errors , "มี Email ซ้ำกันในระบบ");
            }
        }
        if($password_1 != $password_2) {
            array_push($errors , "กรุณากรอก Password ให้เหมือนกัน");
            $_SESSION['error'] = "กรุณากรอก Password ให้เหมือนกัน";
            header("location: Register.php");
        }

        elseif(empty($username) && empty($email) && empty($password_1) && empty($password_2)) {
            array_push($errors , "กรุณากรอกข้อมูล");
            $_SESSION['error'] = "กรุณากรอกข้อมูล";
            header("location: Register.php");
        }  

        elseif(empty($username) || empty($email) || empty($password_1) || empty($password_2)) {
            array_push($errors , "กรุณากรอกข้อมูลให้ครบ");
            $_SESSION['error'] = "กรุณากรอกข้อมูลให้ครบ";
            header("location: Register.php");
        }
                
        elseif($result['Account_Username'] === $username || $result['Account_Email'] === $email) {
            array_push($errors , "Username หรือ Email ถูกใช้งานแล้ว");
            $_SESSION['error'] = "Username หรือ Email ถูกใช้งานแล้ว";
            header("location: Register.php");
        }
        if(count($errors) == 0) {  //ถ้าไม่มี Error ให้ Encrypt Password แล้วส่งไปฐานข้อมูล
            $password = md5($password_1);
            $Default_Level = 'User';
            $sql = "INSERT INTO accounts (Account_Username, Account_Email, Account_Password , Account_RegisterDate , Account_RecentUpdate , Account_Level , Account_FName) 
                    VALUES('$username', '$email', '$password' , '$date' , '$date' , '$Default_Level' , '$Defaultname')";
            mysqli_query($conn , $sql);

            $LastID = mysqli_insert_id($conn);  //เอา ID ต่อไปเพื่อไปใส่ Log

            //เรียกใช้ Function Log
            Register_Log($LastID , $Account_Username);
            
            //ส่ง Session ออกไป
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now Logged in";
            header('location: Login.php');
        }

        
    }
    mysqli_close($conn);
?>