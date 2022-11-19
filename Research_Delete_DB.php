<?php
    //require และเรียกใช้งาน Function FirstCheck() สำหรับการตรวจว่ามีการ Log in หรือไม่
    require("FirstCheck_BE.php");
    require("Log_BE.php");
    require("server.php");
    FirstCheck();

    $id = $_GET['id'];  //รับตัวแปรค่าจาก URL ที่ส่งมาโดยใช้ Method GET
    
    //เอา Reasearch_ID , Reseach_THName มาเพื่อไปใส่ Log
    $sql_logRea = "SELECT Research_ID , Research_THName
                   FROM researchs
                   WHERE Research_ID = $id";

    $result_logRea = mysqli_query($conn , $sql_logRea)or die("Error in SQL : $sql_logRea".mysqli_error($conn));
    $row_logRea = mysqli_fetch_array($result_logRea);
    $Research_THName = $row_logRea['Research_THName'];

    //สำหรับลบข้อมูล
    $sql = "DELETE FROM Researchs WHERE Research_ID = $id";
    $result = mysqli_query($conn , $sql)or die("Error in SQL : $sql".mysqli_error($conn));

    //เรียกใช้ Function Log
    Delete_Log("ลบงานวิจัย" , "Research ID : " , $id , $Research_THName);

    mysqli_close($conn);

    //กลับไปหน้าเดิม แต่ถ้า Error ให้ขึ้นด้วย
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