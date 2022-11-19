<?php 
    //require และเรียกใช้งาน Function FirstCheck() สำหรับการตรวจว่ามีการ Log in หรือไม่
    require("FirstCheck_BE.php");
    require("Log_BE.php");
    require('server.php');
    FirstCheck();

    //ต้องมีการ Log in ก่อน
    if (isset($_SESSION['username']) && isset($_SESSION['Account_ID'])) {
        $password = mysqli_real_escape_string($conn , $_POST['np']);
        $password = strlen($_POST['np']);

        //ถ้ากรอกข้อมูลครบทั้ง 3 ช่อง
        if (isset($_POST['op']) && isset($_POST['np']) && isset($_POST['c_np'])) {

            function validate($data){
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            $op = validate($_POST['op']);
            $np = validate($_POST['np']);
            $c_np = validate($_POST['c_np']);
            
            if(empty($op)){
                array_push($errors , "กรุณาใส่ Password ปัจจุบัน");
                $_SESSION['error'] = "กรุณาใส่ Password ปัจจุบัน";
                header("location: EditPassword.php");
            }

            elseif($password < 6){
                array_push($errors , "Password ต้องมากกว่า 6 ตัวอักษร");
                $_SESSION['error'] = "Password ต้องมากกว่า 6 ตัวอักษร";
                header("location: EditPassword.php");
            }
            
            elseif(empty($np)){
                array_push($errors , "กรุณาใส่ Password ใหม่");
                $_SESSION['error'] = "กรุณาใส่ Password ใหม่";
                header("location: EditPassword.php");
            }

            elseif($np !== $c_np){
                array_push($errors , "กรุณาใส่ Password ให้เหมือนกัน");
                $_SESSION['error'] = "กรุณาใส่ Password ให้เหมือนกัน";
                header("location: EditPassword.php");
            }

            else {
                //เข้ารหัส Password
                $op = md5($op);
                $np = md5($np);
                
                $sql = "SELECT Account_Password
                        FROM accounts 
                        WHERE Account_ID = '$Account_ID' 
                        AND Account_Password = '$op'";
                $result = mysqli_query($conn, $sql);

                if(mysqli_num_rows($result) === 1){
                    $sql_2 = "UPDATE accounts
                              SET Account_Password = '$np' , Account_RecentUpdate = '$Log_date'
                              WHERE Account_ID = '$Account_ID'";
                    mysqli_query($conn, $sql_2);

                    //เรียกใช้ Edit_PassLog() เพื่อ Insert ข้อมูลใส่ตาราง Log
                    Edit_PassLog();

                    echo "<script type = 'text/javascript'>";
                        echo "alert('เปลี่ยนรหัสผ่านเรียบร้อย');";
                        echo "window.location = 'Profile.php';";
                    echo "</script>";
                    exit();
                }else {
                    array_push($errors , "รหัสผ่านผิด");
                    $_SESSION['error'] = "รหัสผ่านผิด";
                    header("location: EditPassword.php");                
                    exit();
                }
            }
        }else{
            header("Location: EditPassword.php");
            exit();
        }
    }else{
        header("Location: Profile.php");
        exit();
    }
    mysqli_close($conn);
?>