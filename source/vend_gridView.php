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
<head>
<script>
    function delCfm(id){
    if (confirm("Data delete! Are you sure ?"))
        location.href="./vend_delete.php?id="+id ;
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
            die("Databses connection failed: " . $conn->connect_error);
    } 
    //--- select vend info
    $sql = "SELECT * FROM vend WHERE 1=1" ;
    $result = $conn->query($sql);
    //--- draw vendomer table header
    echo "<table style='margin: 20px auto ; background-color: #BDBDBD ; border-spacing: 1px'>".
        " <tr style='background-color: #FFFFFF'>".
        "    <th colspan='6' style='padding: 5px'>vend Information Quick View</th></tr>".
        " <tr style='background-color: #FFFFFF'>".
        "    <th style='padding: 5px'>vend ID</th>".
        "    <th style='padding: 5px'>vend Name</th>".
        "    <th style='padding: 5px'>Address</th>".
        "    <th style='padding: 5px'>Tel</th>".
        "    <th colspan='2'    style='padding: 5px'></th>".
        " </tr>" ;
    //--- draw vendomer table data
    while($row = $result->fetch_assoc()) {
                    echo " <tr style='background-color: #FFFFFF'>".
                        "    <td style='padding: 5px'><a href='./vend_dataView.php?id=".$row["vend_id"]."'>".$row["vend_id"]."</a></td>".
                        "    <td style='padding: 5px'><a href='./vend_dataView.php?id=".$row["vend_id"]."'>".$row["vend_name"]."</a></td>".
                        "    <td style='padding: 5px'><a href='./vend_dataView.php?id=".$row["vend_id"]."'>".$row["vend_addr"]."</a></td>".
                        "    <td style='padding: 5px'><a href='./vend_dataView.php?id=".$row["vend_id"]."'>".$row["vend_tel"]."</a></td>".
                        "    <td style='padding: 5px'><a href='./vend_updateView.php?id=".$row["vend_id"]."'>Edit</a></td>".
                        "    <td style='padding: 5px ; text-decoration: underline ; cursor: pointer' onclick=\"delCfm('".$row["vend_id"]."')\">Delete</a></td>".
                        " </tr>" ;
    }
    //--- draw vendomer table footer
    echo " <tr style='background-color: #FFFFFF'>".
        "    <td colspan='6' style='padding: 5px'><a href='./vend_insertView.php'>Insert</a></td>".
        " </tr>".
        "</table>" ;
?>
</div>
</body>
</html>