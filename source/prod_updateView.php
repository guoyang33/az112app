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
    if ($_SERVER["REQUEST_METHOD"] === "GET"){
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
     echo "<form method='post'>".
       "<table style='margin: 20px auto ; background-color: #BDBDBD ; border-spacing: 1px'>".
       " <tr style='background-color: #FFFFFF'>".
              "  <th colspan='2' style='padding: 5px'>Product Information Update</th>".
              " </tr>" ;
     //--- draw update table body
            echo " <tr style='background-color: #FFFFFF'>".
              "  <td style='padding: 5px ; background-color: #EEEEEE'>Product ID</td>".
              "  <td style='padding: 5px'><input type='hidden' name='prod_id' value='".$row["prod_id"]."'>".$row["prod_id"]."</td>".
              " </tr>".
              " <tr style='background-color: #FFFFFF'>".
              "  <td style='padding: 5px ; background-color: #EEEEEE'>Product Name</td>".
              "  <td style='padding: 5px'><input type='text' name='prod_name' value='".$row["prod_name"]."'></td>".
              " </tr>".
              " <tr style='background-color: #FFFFFF'>".
              "  <td style='padding: 5px ; background-color: #EEEEEE'>Unit</td>".
              "  <td style='padding: 5px'><input type='text' name='prod_unit' value='".$row["prod_unit"]."'></td>".
              " </tr>".
              " <tr style='background-color: #FFFFFF'>".
              "  <td style='padding: 5px ; background-color: #EEEEEE'>Unit Price</td>".
              "  <td style='padding: 5px'><input type='text' name='unit_price' value='".$row["unit_price"]."'></td>".
              " </tr>".
              " <tr style='background-color: #FFFFFF'>".
              "  <td style='padding: 5px ; background-color: #EEEEEE'>Onhand Quantity</td>".
              "  <td style='padding: 5px'><input type='text' name='onhand_qty' value='".$row["onhand_qty"]."'></td>".
              " </tr>" ;
     //--- draw update table footer
     echo " <tr style='background-color: #FFFFFF'>".
              "  <th colspan='2' style='padding: 5px'>".
              "   <input type='submit' value='Save'>".
              "   <input type='reset' value='Cancel' onclick=\"location.href='./prod_gridView.php'\">".
       "  </th>".
              " </tr>".
       "</table>".
       "</form>" ;
     //---
     $conn->close();
    }
    else{
     //--- Create connection
     $conn = new mysqli($servername, $username, $password, $dbname);
     // Check connection
     if ($conn->connect_error) {
         die("Databses connection failed: " . $conn->connect_error);
     } 
     //---
     $sql = "UPDATE prod SET prod_name = '".$_POST["prod_name"] ."',".
            "prod_unit = '".$_POST["prod_unit"] ."',".
            "unit_price  = '".$_POST["unit_price"]  ."', ".
            "onhand_qty  = '".$_POST["onhand_qty"]  ."' ".
        " WHERE prod_id = '".$_POST["prod_id"]."'";

     if ($conn->query($sql) === TRUE){
      $conn->close();
      //---
      echo '<meta http-equiv="refresh" content="0; url=./prod_gridView.php">';
      header("location:./prod_gridView.php") ;
     }
     else{
      echo "Error: " . $sql . "<br>" . $conn->error."<br>".
        "<a href='./prod_gridView.php'>Go back</a>" ;
      //---
      $conn->close();
     }
    }
      ?>
  </div>
 </body>
</html>