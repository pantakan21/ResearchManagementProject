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

    date_default_timezone_set('asia/bangkok');
    $Log_date = date('Y-m-d H:i:s');
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

    //Insert
    $sql = "INSERT INTO Researchs(Research_THName , Research_ENGName , Research_Budget , Research_Year , Research_Date , Research_RecentUpdate , Research_Detail , Research_File , Account_ID)
            VALUES('$Research_THName' , '$Research_ENGName' , '$Research_Budget' , '$Research_Year' , '$Log_date' , '$Log_date' , '$Research_Detail' , '$newname' , '$Account_ID')";

    $result = mysqli_query($conn , $sql)or die("Error in SQL : $sql".mysqli_error($conn));

    $LastID = mysqli_insert_id($conn);  //เอา ID ต่อไปเพื่อไปใส่ Log

    //เรียกใช้ Function Log
    Upload_Log("อัปโหลดงานวิจัย" , "Research ID : " , $LastID , $Research_THName);
    mysqli_close($conn);

    if($result) {
        echo "<script type = 'text/javascript'>";
            echo "alert('Insert Successfully');";
            echo "window.location = 'Research.php';";
        echo "</script>";
    }else{
        echo "<script type = 'text/javascript'>";
            echo "alert('Error !');";
            echo "window.location = 'Research.php';";
        echo "</script>";
    }
?>