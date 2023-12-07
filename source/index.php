<?php
 //--- start session
 session_start() ;
?>
<!DOCTYPE html>
<html>
<body>
<div style="width: 30% ; height: 100px ; float: left">
<?php include 'utility_menu.php';?>
</div>
<div style="width: 70% ; height: 100px ; float: right">
<?php
//--- if user is not logined , show login form
if (!isset($_SESSION["userid"])){
?>
<form method="post" action="login.php">
<table style="margin: 20px auto">
<tr><td><input type="text" name="userid" placeholder="Please input id"></td></tr>
<tr><td><input type="password" name="userpwd" placeholder="Please input password"></td></tr>
<tr><td><input type="submit" value="login"></td></tr>
</table>
</form>
<?php
}
?>
</div>
</body>
</html>