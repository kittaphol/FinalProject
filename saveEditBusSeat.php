<?php

$BusID = $_REQUEST['editBusID'];
$SeatID = $_REQUEST['editSeatID'];
$SeatStatus = $_REQUEST['editSeatStatus'];


if($SeatStatus == ""){
    echo "<script>alert('ตรวจสอบข้อมูลอีกครั้ง');
    window.open('editBusSeat.php','_self');</script>";
}
else{
    require("mysql/config.php");
    require("mysql/connect.php");
    
	$sql = "update busseat set SeatStatus='$SeatStatus' where BusID='$BusID' and SeatID='$SeatID'";
	$res = mysqli_query($connect,$sql);
	if($res == null){
       //echo "คำสั่งผิด -> $sql";
	   //exit;
	   echo "<script>alert('คำสั่ง sql ผิด');window.open('Main_BusSeat.php?BusID=$BusID','_self');</script>";
	}
    echo "<script>alert('แก้ไขข้อมูลเรียบร้อยแล้ว');window.open('Main_BusSeat.php?BusID=$BusID','_self');</script>";

}

?>