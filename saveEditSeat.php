<?php

$SeatID = $_REQUEST['editSeatID'];
$SeatCost = $_REQUEST['editSeatCost'];
$Position = $_REQUEST['editPosition'];
$Username = $_REQUEST['editUsername'];

//echo " $BusID $Color $Model $Numseat";

if($SeatID == "" || $SeatCost == "" || $Position == "" || $Username  == ""){
    echo "<script>alert('ตรวจสอบข้อมูลอีกครั้ง');
    window.open('editSeat.php','_self');</script>";
}
else{
    require("mysql/config.php");
    require("mysql/connect.php");
    
	$sql = "update seat set SeatCost='$SeatCost', Position='$Position', Username='$Username' where SeatID='$SeatID'";
	$res = mysqli_query($connect,$sql);
	if($res == null){
       //echo "คำสั่งผิด -> $sql";
	   //exit;
	   echo "<script>alert('คำสั่ง sql ผิด');window.open('Main_Seat.php','_self');</script>";
	}
    echo "<script>alert('แก้ไขข้อมูลเรียบร้อยแล้ว');window.open('Main_Seat.php','_self');</script>";

}

?>