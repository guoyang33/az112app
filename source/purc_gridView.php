<?php
//---
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
<head>
<script>
function delCfm(id){
if (confirm("Cust delete! Are you sure ?"))
location.href="./purc_delete.php?id="+id ;
}
</script>
</head>
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
die("Custbses connection failed: " . $conn->connect_error);
}
//--- select putchase order info
$sql = "SELECT * FROM poh WHERE 1=1" ;
$result = $conn->query($sql);
//--- draw order table header
echo "<table style='margin: 20px auto ; background-color: #BDBDBD ; border-spacing: 1px'>".
" <tr style='background-color: #FFFFFF'>".
"  <th colspan='7' style='padding: 5px'>Purchase Order Quick View</th></tr>".
" <tr style='background-color: #FFFFFF'>".
"  <th style='padding: 5px'>Purchase No</th>".
"  <th style='padding: 5px'>Purchase date</th>".
"  <th style='padding: 5px'>Vend ID</th>".
"  <th style='padding: 5px'>Purchase Amount</th>".
"  <th colspan='3'  style='padding: 5px'></th>".
" </tr>" ;
//--- draw order table cust
if ($result->num_rows > 0){
while($row = $result->fetch_assoc()) {
echo " <tr style='background-color: #FFFFFF'>".
"  <td style='padding: 5px'><a href='./purc_dataView.php?id=".$row["purc_no"]."'>".$row["purc_no"]."</a></td>".
"  <td style='padding: 5px'><a href='./purc_dataView.php?id=".$row["purc_no"]."'>".$row["purc_date"]."</a></td>".
"  <td style='padding: 5px'><a href='./purc_dataView.php?id=".$row["purc_no"]."'>".$row["vend_id"]."</a></td>".
"  <td style='padding: 5px'><a href='./purc_dataView.php?id=".$row["purc_no"]."'>".$row["purc_amt"]."</a></td>".
"  <td style='padding: 5px'><a href='./purc_detail_gridView.php?id=".$row["purc_no"]."'>Detail</a></td>".
"  <td style='padding: 5px'><a href='./purc_updateView.php?id=".$row["purc_no"]."'>Edit</a></td>".
"  <td style='padding: 5px ; text-decoration: underline ; cursor: pointer' onclick=\"delCfm('".$row["purc_no"]."')\">Delete</a></td>".
" </tr>" ;
}
}
//--- draw order table footer
echo " <tr style='background-color: #FFFFFF'>".
"  <td colspan='7' style='padding: 5px'><a href='./purc_insertView.php'>Insert</a></td>".
" </tr>".
"</table>" ;
?>
</div>
</body>
</html>