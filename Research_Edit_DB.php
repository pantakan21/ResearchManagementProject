<?php
    //require และเรียกใช้งาน Function FirstCheck() สำหรับการตรวจว่ามีการ Log in หรือไม่
    require("server.php");
    require("FirstCheck_BE.php");
    require("Log_BE.php");
    FirstCheck();

    $fileupload = (isset($_POST['fileupload']) ? $_POST['fileupload'] : '');

    //Func วันที่
    date_default_timezone_set('Asia/Bangkok');
    $date = date("Ymd");
    //Func สุ่มเลข
    $numrand = (mt_rand());

    //เพื่มไฟล์
    $upload = $_FILES['fileupload'];
    if($upload != '') {
        $path = "fileupload/";  //ที่เก็บไฟล์

        $type = strrchr($_FILES['fileupload']['name'],".");  //เอาชื่อไฟล์ออกให้เหลือแต่นามสกุล

        //ตั้งชื่อไฟล์ใหม่
        $newname = $date.$numrand.$type;
        $path_copy = $path.$newname;
        $path_link = "fileupload/".$newname;

        move_uploaded_file($_FILES['fileupload']['tmp_name'],$path_copy);  //เอาไฟล์ไปเก็บที่ Server
    }

    //ประกาศตัวแปรรับค่าจาก Form
    $Research_THName = $_POST['Research_THName'];
    $Research_ENGName = $_POST['Research_ENGName'];
    $Research_Budget = $_POST['Research_Budget'];
    $Research_Year = $_POST['Research_Year'];
    $Research_Detail = $_POST['Research_Detail'];
    $Research_ID = $_POST['Research_ID'];

    //Update
    $sql = "UPDATE Researchs SET
                   Research_THName = '$Research_THName',
                   Research_ENGName = '$Research_ENGName',
                   Research_Budget = '$Research_Budget',
                   Research_Year = '$Research_Year',
                   Research_Detail = '$Research_Detail',
                   Research_RecentUpdate = '$Log_date',
                   Research_File = '$newname'
            WHERE  Research_ID = $Research_ID";

    $result = mysqli_query($conn , $sql)or die("Error in SQL : $sql".mysqli_error($conn));
    
    //Insert Log
    Edit_Log("แก้ไขงานวิจัย" , "Research ID : " , $Research_ID , $Research_THName);

    if($result) {
        echo "<script type = 'text/javascript'>";
            echo "alert('Update Successfully');";
            echo "window.location = 'UserHistory.php';";
        echo "</script>";
    }else{
        echo "<script type = 'text/javascript'>";
            echo "alert('Error !');";
            echo "window.location = 'UserHistory.php';";
        echo "</script>";
    }
    mysqli_close($conn);
?>