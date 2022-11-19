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

        //เอาไฟล์ไปเก็บที่ Server
        move_uploaded_file($_FILES['fileupload']['tmp_name'],$path_copy);  
    }
    
    //ประกาศตัวแปรรับค่าจาก Form
    $Certificate_THName = $_POST['Certificate_THName'];
    $Certificate_ENGName = $_POST['Certificate_ENGName'];
    $Certificate_Year = $_POST['Certificate_Year'];
    $Certificate_Detail = $_POST['Certificate_Detail'];
    
    //Insert
    $sql = "INSERT INTO Certificates(Certificate_THName , Certificate_ENGName , Certificate_Year , Certificate_Detail , Certificate_Date , Certificate_RecentUpdate , Certificate_File , Account_ID)
            VALUES('$Certificate_THName' , '$Certificate_ENGName' , '$Certificate_Year' , '$Certificate_Detail' , '$Log_date' , '$Log_date' , '$newname' , '$Account_ID')";

    $result = mysqli_query($conn , $sql)or die("Error in SQL : $sql".mysqli_error($conn));
    
    //ID ล่าสุดเพื่อเอาไปใส่ Log
    $LastID = mysqli_insert_id($conn);  //เอา ID ต่อไปเพื่อไปใส่ Log

    //เรียกใช้ Function Log
    Upload_Log("อัปโหลดใบประกาศ" , "Certificate ID : " , $LastID , $Certificate_THName);

    mysqli_close($conn);

    if($result) {
        echo "<script type = 'text/javascript'>";
            echo "alert('Insert Successfully');";
            echo "window.location = 'Certificate.php';";
        echo "</script>";
    }else{
        echo "<script type = 'text/javascript'>";
            echo "alert('Error !');";
            echo "window.location = 'Certificate.php';";
        echo "</script>";
    }
?>