<?php
    //require และเรียกใช้งาน Function FirstCheck() สำหรับการตรวจว่ามีการ Log in หรือไม่
    require("FirstCheck_BE.php");
    require("Log_BE.php");
    require("server.php");
    FirstCheck();

    //รับตัวแปรค่าจาก URL ที่ส่งมาโดยใช้ Method GET
    $id = $_GET['id'];  

    //เอา Certificate ID , Certificate Name มาเพื่อไปใส่ Log
    $sql_logRea = "SELECT Certificate_ID , Certificate_THName
                   FROM Certificates
                   WHERE Certificate_ID = $id";

    $result_logRea = mysqli_query($conn , $sql_logRea)or die("Error in SQL : $sql_logRea".mysqli_error($conn));
    $row_logRea = mysqli_fetch_array($result_logRea);
    $Certificate_THName = $row_logRea['Certificate_THName'];
    
    //สำหรับการลบข้อมูล
    $sql = "DELETE FROM Certificates WHERE Certificate_ID = $id";
    $result = mysqli_query($conn , $sql)or die("Error in SQL : $sql".mysqli_error($conn));

    //เรียกใช้ Delete_Log() เพื่อ Insert ข้อมูลใส่ตาราง Log
    Delete_Log("ลบใบประกาศ" , "Certificate ID : " , $id , $Certificate_THName);

    mysqli_close($conn);

    //กลับไปหน้า UserHistory และถ้า Error ให้ขึ้นด้วย
    if($result) {
        echo "<script type = 'text/javascript'>";
        echo "window.location = 'UserHistory.php';";
        echo "</script>";
    }else{
        echo "<script type = 'text/javascript'>";
            echo "alert('Error !');";
            echo "window.location = 'UserHistory.php';";
        echo "</script>";
    }
?>