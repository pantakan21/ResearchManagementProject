<?php
    //require และเรียกใช้งาน Function FirstCheck() สำหรับการตรวจว่ามีการ Log in หรือไม่
    require('server.php');
    require("FirstCheck_BE.php");
    require("Log_BE.php");
    FirstCheck();

    $fileupload = (isset($_POST['fileupload']) ? $_POST['fileupload'] : '');

    //Func วันที่เพื่อนำไปตั้งชื่อไฟล์ที่ Upload
    date_default_timezone_set('Asia/Bangkok');
    $date = date("Ymd");
    //Func สุ่มเลขวันที่เพื่อนำไปตั้งชื่อไฟล์ที่ Upload
    $numrand = (mt_rand());

    //เพื่มไฟล์ไปใส่ Folder ที่เก็บไฟล์
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
    $Account_FName = $_POST['Account_FName'];
    $Account_LName = $_POST['Account_LName'];
    $Account_Email = $_POST['Account_Email'];
    $Account_TNum = $_POST['Account_TNum'];
    $Account_IDCard = $_POST['Account_IDCard'];
    $Account_Birthdate = date('Y-m-d' , strtotime($_POST['Account_BirthDate']));
    $Account_Age = $_POST['Account_Age'];
    $Account_Avatar = $_POST['Account_Avatar'];
    $Account_Sex = $_POST['Account_Sex'];
    $Account_Department = $_POST['Account_Department'];

    $Account_Username = $_POST['Account_Username'];
    $Account_Password = $_POST['Account_Password'];

    //Update
    $sql = "UPDATE Accounts SET
                   Account_FName = '$Account_FName',
                   Account_LName = '$Account_LName',
                   Account_Email = '$Account_Email',
                   Account_TNum = '$Account_TNum',
                   Account_IDCard = '$Account_IDCard',
                   Account_Birthdate = '$Account_Birthdate',
                   Account_Age = '$Account_Age',
                   Account_Avatar = '$newname',
                   Account_Sex = '$Account_Sex',
                   Account_Department = '$Account_Department',
                   Account_RecentUpdate = '$Log_date'
            WHERE  Account_ID = $Account_ID";
            
    $result = mysqli_query($conn , $sql)or die("Error in SQL : $sql".mysqli_error($conn));

    //เอา Account_Username มาใส่ใน Log
    $sql_logAcc = "SELECT Account_ID , Account_Username
                   FROM accounts
                   WHERE Account_ID = $Account_ID";
    $result_logAcc = mysqli_query($conn , $sql_logAcc)or die("Error in SQL : $sql".mysqli_error($conn));
    $row_logAcc = mysqli_fetch_array($result_logAcc);
    $Account_UsernameLog = $row_logAcc['Account_Username'];

    //Insert Log
    Edit_ProfileLog("แก้ไขข้อมูลส่วนตัว" , "" , "" , "");

    mysqli_close($conn);

    if($result) {
        echo "<script type = 'text/javascript'>";
            echo "alert('Update Successfully');";
            echo "window.location = 'Profile.php';";
        echo "</script>";
    }else{
        echo "<script type = 'text/javascript'>";
            echo "alert('Error !');";
            echo "window.location = 'Profile.php';";
        echo "</script>";
    }
?>