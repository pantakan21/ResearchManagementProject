<?php   
    session_start();
    //รับว่าเป็น Account ใครเพื่อนำไป Insert ใน Database(มาจาก Login_DB.php)
    $username = $_SESSION['username'];  
    $Account_ID = $_SESSION['Account_ID'];
?>
<?php 
    $servername = "localhost";
    $username = "root";
    $password = "0921219001";
    $dbname = "researchmanagement";

    //Create Connection , ทำการเชื่อมต่อ
    $conn = mysqli_connect($servername , $username , $password , $dbname);  

    //Check Connection , บอกว่าเชื่อมต่อไม่สำเร็จให้ขึ้นข้อความ
    if(!$conn) {
        die("Connection Failed" . mysqli_connect_error());
    }

    $sql = "SELECT * FROM accounts WHERE Account_ID = $Account_ID";
    $db_query=mysqli_query($conn , $sql);
    $result = mysqli_fetch_array($db_query);
    $image = $result['Account_Avatar'];

    $path = 'fileupload/'; //---->เช่น 'images/';

?>