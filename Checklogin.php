<?php
session_start();
require("mysql/config.php");
require("mysql/connect.php");
$Username = $_REQUEST['username'];
$Password = $_REQUEST['password'];
//echo "username : $Username, password : $Password";

$sql = "select * from owner where username = '$Username' and password = PASSWORD('$Password') ";

$result = mysqli_query($connect, $sql);

$numRowsql = mysqli_num_rows($result);

if($numRowsql == 0){
	?>
	<script>
		alert('ชื่อผู้ใช้/รหัสผ่านไม่ถูกต้อง');
		window.open('Login.php','_self');
 
	</script>
	<?php
 }
 else{
	 $recnumChk = mysqli_fetch_array($result);
	 $_SESSION['Username'] = $recnumChk['Username'];
	 $_SESSION['Password'] = $recnumChk['Password'];

	 $Username = $_SESSION['Username'];
	 $Password = $_SESSION['Password'];

	?>
	<script>
		alert('ยินดีต้อนรับเข้าสู่ระบบ');
		window.open('Main.php','_self');
	</script>
	<?php
 }
 
?>





<!--
if(!empty($record[3])) {
    
	$_SESSION['name'] = $record[1].' '.$record[2];
	$_SESSION['type'] = 'student';
    $_SESSION['studentID'] = $record[0];
    
	echo "<script>alert('ยินดีต้อนรับ ".$_SESSION['name']."');window.open('index.php','_self')</script>";
	exit();
}
require("mysql/unconnect.php");

$sql = "select * from officer,user where officer.username = user.username and user.username = '" . $username ."' and user.password = PASSWORD('" . $password ."') and type_id = 3 and level = 5";
require("mysql/connect.php");
$record = mysqli_fetch_array($result);
if(!empty($record[3])) {
    
	$_SESSION['name'] = $record[1].' '.$record[2];
	$_SESSION['type'] = 'admin';
    $_SESSION['officerID'] = $record[0];
    echo "<script>alert('ยินดีต้อนรับ ".$_SESSION['name']."');window.open('admin.php','_self')</script>";
	exit();
	
}
require("mysql/unconnect.php");

$sql = "select * from officer,user where officer.username = user.username and user.username = '" . $username ."' and user.password = PASSWORD('" . $password ."') and type_id = 2 and level = 3";
require("mysql/connect.php");
$record = mysqli_fetch_array($result);
if(!empty($record[3])) {
    
	$_SESSION['name'] = $record[1].' '.$record[2];
	$_SESSION['type'] = 'officernomal';
    $_SESSION['officerID'] = $record[0];
    echo "<script>alert('ยินดีต้อนรับ ".$_SESSION['name']."');window.open('officernomal.php','_self')</script>";
	exit();
	
}
require("mysql/unconnect.php");

$sql = "select * from officer,user where officer.username = user.username and user.username = '" . $username ."' and user.password = PASSWORD('" . $password ."') and type_id = 1 and level = 4";
require("mysql/connect.php");
$record = mysqli_fetch_array($result);
if(!empty($record[3])) {
    
	$_SESSION['name'] = $record[1].' '.$record[2];
	$_SESSION['type'] = 'officerregis';
    $_SESSION['officerID'] = $record[0];
    echo "<script>alert('ยินดีต้อนรับ ".$_SESSION['name']."');window.open('officerregis.php','_self')</script>";
	exit();
	
}
require("mysql/unconnect.php");

$sql = "select * from teacher,user where teacher.username = user.username and user.username = '" . $username ."' and user.password = PASSWORD('" . $password ."') and level = 2";
require("mysql/connect.php");
$record = mysqli_fetch_array($result);
if(!empty($record[3])) {
    
	$_SESSION['name'] = $record[1].' '.$record[2];
	$_SESSION['type'] = 'teacher';
    $_SESSION['teacherID'] = $record[0];
    
	echo "<script>alert('ยินดีต้อนรับ ".$_SESSION['name']."');window.open('teacher.php','_self')</script>";
	exit();
}
require("mysql/unconnect.php");

echo "<script>alert('ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง');window.open('index.php','_self')</script>";


?>
-->