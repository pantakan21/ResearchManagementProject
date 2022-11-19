<?php
    session_start();
    require("server.php");
    require("Log_BE.php");

    $errors = array();

    //ดูว่ากด Submit ไหม
    if(isset($_POST['login_user'])) {
        $username = mysqli_real_escape_string($conn , $_POST['username']);
        $password = mysqli_real_escape_string($conn , $_POST['password']);
    
        if(empty($username)) {
            array_push($errors , "กรูณาใส่ Username");
        }        
        if(empty($password)) {
            array_push($errors , "กรูณาใส่ Password");
        }
        
        if(count($errors) == 0) {
            $password = md5($password);
            $query = "SELECT * FROM accounts WHERE Account_Username = '$username' AND Account_Password = '$password' ";

            $result = mysqli_query($conn , $query);

            //นำเลข Account_ID ออกมา
            $query_ID = "SELECT Account_ID , Account_Level FROM accounts WHERE Account_Username = '$username' AND Account_Password = '$password' ";
            $result_ID = mysqli_query($conn , $query_ID)or die("Error in SQL : $sql".mysqli_error($conn));
            $row_ID = mysqli_fetch_array($result_ID);

            if(mysqli_num_rows($result) == 1) {
                //ส่ง Session ออกไปและเปลี่ยนหน้า
                $_SESSION['username'] = $username;
                $_SESSION['Account_ID'] = $row_ID['Account_ID'];
                $_SESSION['Account_Level'] = $row_ID['Account_Level'];
                $_SESSION['success'] = "คุณเข้าสู่ระบบแล้ว";

                $Account_ID = $row_ID['Account_ID'];
                
                //เรียกใช้ Function Log
                Login_Log($Account_ID , $Account_Username);
                header("location: index.php");
            }
            
            else{
                array_push($errors , "Username หรือ Password ผิด");
                $_SESSION['error'] = "Username หรือ Password ผิด";
                header("location: Login.php");
            }
        }else{
            array_push($errors , "กรุณาใส่ข้อมูลให้ครบ");
            $_SESSION['error'] = "กรุณาใส่ข้อมูลให้ครบ";
            header("location: Login.php");
        }
    }
    mysqli_close($conn);
?>