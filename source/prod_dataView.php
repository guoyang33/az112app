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
    //--- select prod info
    $sql = "SELECT * FROM prod WHERE prod_id = '".$_GET["id"]."'" ;
    $result = $conn->query($sql);
    //---
    $row = $result->fetch_assoc() ;
    //--- draw update table header
    echo "<table style='margin: 20px auto ; background-color: #BDBDBD ; border-spacing: 1px'>".
      " <tr style='background-color: #FFFFFF'>".
             "  <th colspan='2' style='padding: 5px'>product Information Detail</th>".
             " </tr>" ;
    //--- draw update table body
           echo " <tr style='background-color: #FFFFFF'>".
             "  <td style='padding: 5px ; background-color: #EEEEEE'>ID</td>".
             "  <td style='padding: 5px'>".$row["prod_id"]."</td>".
             " </tr>".
             " <tr style='background-color: #FFFFFF'>".
             "  <td style='padding: 5px ; background-color: #EEEEEE'>Name</td>".
             "  <td style='padding: 5px'>".$row["prod_name"]."</td>".
             " </tr>".
             " <tr style='background-color: #FFFFFF'>".
             "  <td style='padding: 5px ; background-color: #EEEEEE'>Unit</td>".
             "  <td style='padding: 5px'>".$row["prod_unit"]."</td>".
             " </tr>".
             " <tr style='background-color: #FFFFFF'>".
             "  <td style='padding: 5px ; background-color: #EEEEEE'>Unit Price</td>".
             "  <td style='padding: 5px'>".$row["unit_price"]."</td>".
             " </tr>".
             " <tr style='background-color: #FFFFFF'>".
             "  <td style='padding: 5px ; background-color: #EEEEEE'>Onhand Quantity</td>".
             "  <td style='padding: 5px'>".$row["onhand_qty"]."</td>".
             " </tr>" ;
    //--- draw update table footer
    echo " <tr style='background-color: #FFFFFF'>".
             "  <th colspan='2' style='padding: 5px'>".
             "   <input type='reset' value='Cancel' onclick=\"location.href='./prod_gridView.php'\">".
      "  </th>".
             " </tr>".
      "</table>" ;
    //---
    $conn->close();
   ?>
  </div>
 </body>
</html>