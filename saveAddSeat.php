<?php
$SeatID = $_REQUEST['SeatID'];
$SeatCost = $_REQUEST['SeatCost'];
$Position = $_REQUEST['Position'];
$Username = $_REQUEST['Username'];



if($SeatID == "" || $SeatCost == "" || $Position == "" || $Username == ""){
    echo "<script>alert('ตรวจสอบข้อมูลอีกครั้ง');
    window.open('Main_SeatAdd.php','_self');</script>";
}
else{
    require("mysql/config.php");
    require("mysql/connect.php");
    
	$sql = "insert into seat(SeatID,SeatCost,Position,Username) value('$SeatID','$SeatCost','$Position','$Username')";
	$res = mysqli_query($connect,$sql);
	if($res == null){
       //echo "คำสั่งผิด -> $sql";
	   //exit;
	   echo "<script>alert('คำสั่ง sql ผิด');window.open('Main_SeatAdd.php','_self');</script>";
	}
    echo "<script>alert('เก็บข้อมูลเรียบร้อยแล้ว');window.open('Main_Seat.php','_self');</script>";

}

?>