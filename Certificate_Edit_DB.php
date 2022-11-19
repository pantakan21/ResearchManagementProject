<?php    
    //require และเรียกใช้งาน Function FirstCheck() สำหรับการตรวจว่ามีการ Log in หรือไม่
    require("FirstCheck_BE.php");
    require("Log_BE.php");
    require("server.php");    
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
    $Certificate_THName = $_POST['Certificate_THName'];
    $Certificate_ENGName = $_POST['Certificate_ENGName'];
    $Certificate_Year = $_POST['Certificate_Year'];
    $Certificate_Detail = $_POST['Certificate_Detail'];
    $Certificate_ID = $_POST['Certificate_ID'];

    //Update
    $sql = "UPDATE Certificates SET
                   Certificate_THName = '$Certificate_THName',
                   Certificate_ENGName = '$Certificate_ENGName',
                   Certificate_Year = '$Certificate_Year',
                   Certificate_Detail = '$Certificate_Detail',
                   Certificate_RecentUpdate = '$Cer_date',
                   Certificate_File = '$newname'
            WHERE  Certificate_ID = $Certificate_ID";
    $result = mysqli_query($conn , $sql)or die("Error in SQL : $sql".mysqli_error($conn));
    
    //เรียกใช้ Edit_Log() เพื่อ Insert ข้อมูลใส่ตาราง Log
    Edit_Log("แก้ไขใบประกาศ" , "Certificate ID : " , $Certificate_ID , $Certificate_THName);
    
    //กลับไปหน้า UserHistory และถ้า Error ให้ขึ้นด้วย
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