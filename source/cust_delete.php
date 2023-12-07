<?php
 session_start() ;
?>
<!DOCTYPE html>
<html>
 <?php
  //--- if user is not logined, redirect to index.php
  if (!isset($_SESSION["userid"])){
   header("location:./index.php") ;
   return ;
  }
  //---
  include 'utility_dbinfo.php';
 ?>
 <body>
  <div style="width: 30% ; height: 100px ; float: left">
   <?php include 'utility_menu.php';?>
  </div>
  <div style="width: 70% ; height: 100px ; float: right">
   <?php
    //--- Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Databses connection failed: " . $conn->connect_error);
    } 
    //---
    $sql = "DELETE FROM cust WHERE cust_id = '".$_GET["id"]."'";

    if ($conn->query($sql) === TRUE){
     $conn->close();
     //---
     header("location:./cust_gridView.php") ;
    }
    else{
     echo "Error: " . $sql . "<br>" . $conn->error."<br>".
       "<a href='./cust_gridView.php'>Go back</a>" ;
     //---
     $conn->close();
    }
   ?>
  </div>
 </body>
</html>