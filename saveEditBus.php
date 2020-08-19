<?php

$BusID = $_REQUEST['editBusID'];
$Color = $_REQUEST['editColor'];
$Model = $_REQUEST['editModel'];
$Numseat = $_REQUEST['editNumseat'];
$Username = $_REQUEST['editUsername'];

//echo " $BusID $Color $Model $Numseat";

if($BusID == "" || $Color == "" || $Model == "" || $Numseat  == "" || $Username  == ""){
    echo "<script>alert('ตรวจสอบข้อมูลอีกครั้ง');
    window.open('editBus.php','_self');</script>";
}
else{
    require("mysql/config.php");
    require("mysql/connect.php");
    
	$sql = "update bus set Color='$Color', Model='$Model', Numseat='$Numseat', Username='$Username' where BusID='$BusID'";
	$res = mysqli_query($connect,$sql);
	if($res == null){
       //echo "คำสั่งผิด -> $sql";
	   //exit;
	   echo "<script>alert('คำสั่ง sql ผิด');window.open('Main_Bus.php','_self');</script>";
	}
    echo "<script>alert('แก้ไขข้อมูลเรียบร้อยแล้ว');window.open('Main_Bus.php','_self');</script>";

}

?>