<?php
    //สำหรับเอาข้อมูลและ Insert เอา Log
    function Edit_ProfileLog($What){
        session_start();
        $username = $_SESSION['username'];  
        $Account_ID = $_SESSION['Account_ID'];
        require("server.php");

        //เอาไว้ใส่วันที่ใน Log
        date_default_timezone_set('asia/bangkok');
        $Log_date = date('Y-m-d H:i:s');

        //เอา Account_Username มาเพื่อไปใส่ Log
        $sql_logAcc = "SELECT Account_ID , Account_Username
                    FROM accounts
                    WHERE Account_ID = $Account_ID";

        //ประมวลผลเพื่อเอา Username ออกมา
        $result_logAcc = mysqli_query($conn , $sql_logAcc)or die("Error in SQL : $sql".mysqli_error($conn));
        $row_logAcc = mysqli_fetch_array($result_logAcc);
        $Account_Username = $row_logAcc['Account_Username'];

        //รวมกันเป็นสิ่งที่ผู้ใช้ทำเพื่อไปใส่ Log
        $Log_Activity = "$Account_Username(Account ID : $Account_ID) $What"; 
        
        //Insert Log
        $sql_log = "INSERT INTO Logs(Log_Activity , Log_Date , Account_ID)
                    VALUES('$Log_Activity' , '$Log_date' , '$Account_ID')";

        $result_log = mysqli_query($conn , $sql_log)or die("Error in SQL : $sql_log".mysqli_error($conn));
    }

    function Edit_Log($What , $Where , $ID , $Name){
        session_start();
        $username = $_SESSION['username'];  
        $Account_ID = $_SESSION['Account_ID'];
        require("server.php");

        //เอาไว้ใส่วันที่ใน Log
        date_default_timezone_set('asia/bangkok');
        $Log_date = date('Y-m-d H:i:s');

        //เอา Account_Username มาเพื่อไปใส่ Log
        $sql_logAcc = "SELECT Account_ID , Account_Username
                    FROM accounts
                    WHERE Account_ID = $Account_ID";

        //ประมวลผลเพื่อเอา Username ออกมา
        $result_logAcc = mysqli_query($conn , $sql_logAcc)or die("Error in SQL : $sql".mysqli_error($conn));
        $row_logAcc = mysqli_fetch_array($result_logAcc);
        $Account_Username = $row_logAcc['Account_Username'];

        //รวมกันเป็นสิ่งที่ผู้ใช้ทำเพื่อไปใส่ Log
        $Log_Activity = "$Account_Username(Account ID : $Account_ID) $What : $Name($Where  $ID)"; 
        
        //Insert Log
        $sql_log = "INSERT INTO Logs(Log_Activity , Log_Date , Account_ID)
                    VALUES('$Log_Activity' , '$Log_date' , '$Account_ID')";

        $result_log = mysqli_query($conn , $sql_log)or die("Error in SQL : $sql_log".mysqli_error($conn));
    }

    function Edit_PassLog(){
        session_start();
        $username = $_SESSION['username'];  
        $Account_ID = $_SESSION['Account_ID'];
        require("server.php");

        //เอาไว้ใส่วันที่ใน Log
        date_default_timezone_set('asia/bangkok');
        $Log_date = date('Y-m-d H:i:s');

        //เอา Account_Username มาเพื่อไปใส่ Log
        $sql_logAcc = "SELECT Account_ID , Account_Username
                    FROM accounts
                    WHERE Account_ID = $Account_ID";

        //ประมวลผลเพื่อเอา Username ออกมา
        $result_logAcc = mysqli_query($conn , $sql_logAcc)or die("Error in SQL : $sql".mysqli_error($conn));
        $row_logAcc = mysqli_fetch_array($result_logAcc);
        $Account_Username = $row_logAcc['Account_Username'];
    
        //รวมกันเป็นสิ่งที่ผู้ใช้ทำเพื่อไปใส่ Log
        $Log_Activity = "$Account_Username(Account ID : $Account_ID) แก้ไขรหัสผ่าน";
        
        //Insert Log
        $sql_log = "INSERT INTO Logs(Log_Activity , Log_Date , Account_ID)
                    VALUES('$Log_Activity' , '$Log_date' , '$Account_ID')";

        $result_log = mysqli_query($conn , $sql_log)or die("Error in SQL : $sql_log".mysqli_error($conn));
    }

    function Delete_Log($What , $Where , $ID , $Name){
        session_start();
        $username = $_SESSION['username'];  
        $Account_ID = $_SESSION['Account_ID'];
        require("server.php");

        //เอาไว้ใส่วันที่ใน Log
        date_default_timezone_set('asia/bangkok');
        $Log_date = date('Y-m-d H:i:s');

        //เอา Account_Username มาเพื่อไปใส่ Log
        $sql_logAcc = "SELECT Account_ID , Account_Username
                    FROM accounts
                    WHERE Account_ID = $Account_ID";

        //ประมวลผลเพื่อเอา Username ออกมา
        $result_logAcc = mysqli_query($conn , $sql_logAcc)or die("Error in SQL : $sql".mysqli_error($conn));
        $row_logAcc = mysqli_fetch_array($result_logAcc);
        $Account_Username = $row_logAcc['Account_Username'];

        //รวมกันเป็นสิ่งที่ผู้ใช้ทำเพื่อไปใส่ Log
        $Log_Activity = "$Account_Username(Account ID : $Account_ID) $What : $Name($Where  $ID)"; 

        //Insert Log
        $sql_log = "INSERT INTO Logs(Log_Activity , Log_Date , Account_ID)
                    VALUES('$Log_Activity' , '$Log_date' , '$Account_ID')";

        $result_log = mysqli_query($conn , $sql_log)or die("Error in SQL : $sql_log".mysqli_error($conn));
    }

    function Upload_Log($What , $Where , $ID , $Name){
        session_start();
        $username = $_SESSION['username'];  
        $Account_ID = $_SESSION['Account_ID'];
        require("server.php");

        //เอาไว้ใส่วันที่ใน Log
        date_default_timezone_set('asia/bangkok');
        $Log_date = date('Y-m-d H:i:s');

        //เอา Account_Username มาเพื่อไปใส่ Log
        $sql_logAcc = "SELECT Account_ID , Account_Username
                    FROM accounts
                    WHERE Account_ID = $Account_ID";
    
        //ประมวลผลเพื่อเอา Username ออกมา
        $result_logAcc = mysqli_query($conn , $sql_logAcc)or die("Error in SQL : $sql".mysqli_error($conn));
        $row_logAcc = mysqli_fetch_array($result_logAcc);
        $Account_Username = $row_logAcc['Account_Username'];

        //รวมกันเป็นสิ่งที่ผู้ใช้ทำเพื่อไปใส่ Log
        $Log_Activity = "$Account_Username(Account ID : $Account_ID) $What : $Name($Where  $ID)"; 

        //Insert Log
        $sql_log = "INSERT INTO Logs(Log_Activity , Log_Date , Account_ID)
                    VALUES('$Log_Activity' , '$Log_date' , '$Account_ID')";

        $result_log = mysqli_query($conn , $sql_log)or die("Error in SQL : $sql_log".mysqli_error($conn));
    }

    function Login_Log($ID , $Name){
        require("server.php");

        //เอาไว้ใส่วันที่ใน Log
        date_default_timezone_set('asia/bangkok');
        $Log_date = date('Y-m-d H:i:s');

        //เอา Account_Username มาเพื่อไปใส่ Log
        $sql_logAcc = "SELECT Account_ID , Account_Username
                    FROM accounts
                    WHERE Account_ID = $ID";
        
        //ประมวลผลเพื่อเอา Username ออกมา
        $result_logAcc = mysqli_query($conn , $sql_logAcc)or die("Error in SQL : $sql".mysqli_error($conn));
        $row_logAcc = mysqli_fetch_array($result_logAcc);
        $Account_Username = $row_logAcc['Account_Username'];

        //รวมกันเป็นสิ่งที่ผู้ใช้ทำเพื่อไปใส่ Log
        $Log_Activity = "$Account_Username(Account ID : $ID) เข้าสู่ระบบ";

        //Insert Log
        $sql_log = "INSERT INTO Logs(Log_Activity , Log_Date , Account_ID)
                    VALUES('$Log_Activity' , '$Log_date' , '$ID')";

        $result_log = mysqli_query($conn , $sql_log)or die("Error in SQL : $sql_log".mysqli_error($conn));
    }

    function Register_Log($ID , $Name){
        require("server.php");

        //เอาไว้ใส่วันที่ใน Log
        date_default_timezone_set('asia/bangkok');
        $Log_date = date('Y-m-d H:i:s');

        //เอา Account_Username มาเพื่อไปใส่ Log
        $sql_logAcc = "SELECT Account_ID , Account_Username
                    FROM accounts
                    WHERE Account_ID = $ID";
        
        //ประมวลผลเพื่อเอา Username ออกมา
        $result_logAcc = mysqli_query($conn , $sql_logAcc)or die("Error in SQL : $sql".mysqli_error($conn));
        $row_logAcc = mysqli_fetch_array($result_logAcc);
        $Account_Username = $row_logAcc['Account_Username'];

        //รวมกันเป็นสิ่งที่ผู้ใช้ทำเพื่อไปใส่ Log
        $Log_Activity = "$Account_Username(Account ID : $ID) สมัครสมาชิก";  //รวมกันเป็นสิ่งที่ผู้ใช้ทำเพื่อไปใส่ Log

        //Insert Log
        $sql_log = "INSERT INTO Logs(Log_Activity , Log_Date , Account_ID)
                    VALUES('$Log_Activity' , '$Log_date' , '$ID')";

        $result_log = mysqli_query($conn , $sql_log)or die("Error in SQL : $sql_log".mysqli_error($conn));
    }
?>