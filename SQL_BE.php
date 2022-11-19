<?php
    //Select + (ชื่อตาราง , เงื่อนไข)
    function Select($tab , $condition){
        session_start();
        $username = $_SESSION['username'];  
        $Account_ID = $_SESSION['Account_ID'];
        require("server.php");

        $query = "SELECT *
                  FROM $tab
                  WHERE $condition = $Account_ID";
        $result = mysqli_query($conn , $query) or die("Error in SQL : $query".mysqli_error($conn));

        return mysqli_fetch_array($result);
    }
?>