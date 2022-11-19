<?php
    //require และเรียกใช้งาน Function FirstCheck_Admin() สำหรับการตรวจว่ามีการ Log in หรือไม่ และดูว่ามี Level ระดับ Admin หรือไม่ถ้าไม่ให้เด้งออกไปหน้า Login
    require("FirstCheck_BE.php");
    require("Log_BE.php");
    require("server.php");
    FirstCheck_Admin();

    $Acc_id = $_GET['Acc_id'];  //รับ ID จากไฟล์ที่แล้ว

    //เป้าหมายสำหรับลบเพื่อนำไปใส่ Log
    $sql_logAcc2 = "SELECT Account_ID , Account_Username
                    FROM accounts
                    WHERE Account_ID = $Acc_id";
    $result_logAcc2 = mysqli_query($conn , $sql_logAcc2)or die("Error in SQL : $result_logAcc2".mysqli_error($conn));
    $row_logAcc2 = mysqli_fetch_array($result_logAcc2);
    $Account_Username2 = $row_logAcc2['Account_Username'];

    //สำหรับลบข้อมูล
    $sql = "DELETE FROM accounts WHERE Account_ID = $Acc_id";
    $result = mysqli_query($conn , $sql)or die("Error in SQL : $sql".mysqli_error($conn));

    //เรียกใช้ Delete_Log() เพื่อ Insert ข้อมูลใส่ตาราง Log
    Delete_Log("ลบบัญชีผู้ใช้" , "Account ID : " , $Acc_id , $Account_Username2);

    mysqli_close($conn);

    //กลับไปหน้า Manage_User แต่ถ้า Error ให้ขึ้นด้วย
    if($result) {
        echo "<script type = 'text/javascript'>";
            echo "window.location = 'Manage_User.php';";
        echo "</script>";
    }else{
        echo "<script type = 'text/javascript'>";
            echo "alert('Error !');";
            echo "window.location = 'Manage_User.php';";
        echo "</script>";
    }
?>