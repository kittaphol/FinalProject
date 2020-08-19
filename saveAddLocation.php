<?php
$LocationName = $_REQUEST['LocationName'];
$Username = $_REQUEST['Username'];

if($LocationName == "" || $Username == ""){
    echo "<script>alert('ตรวจสอบข้อมูลอีกครั้ง');
    window.open('Main_Location.php','_self');</script>";
}
else{
    require("mysql/config.php");
    require("mysql/connect.php");
    
	$sql = "insert into location(LocationID,LocationName,Username) value('','$LocationName','$Username')";
	$res = mysqli_query($connect,$sql);
	if($res == null){
       //echo "คำสั่งผิด -> $sql";
	   //exit;
	   echo "<script>alert('คำสั่ง sql ผิด');window.open('Main_Location.php','_self');</script>";
	}
    echo "<script>alert('เก็บข้อมูลเรียบร้อยแล้ว');window.open('Main_Location.php','_self');</script>";

}

?>