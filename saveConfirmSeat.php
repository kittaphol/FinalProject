<?php
$BookingID = $_REQUEST['BookingID'];
$TimetableID = $_REQUEST['TimetableID'];
//echo "$BookingID";


require("mysql/config.php");
require("mysql/connect.php");

$sql = "update booking set BookingStatus='3' where BookingID='$BookingID'";
$res = mysqli_query($connect,$sql);

$sql2 = "select * from booking where BookingID='$BookingID'";
$res2 = mysqli_query($connect,$sql2);
while($row=mysqli_fetch_array($res2)){

    $sql3 = "update bustable set statusBustable='3' where SeatID='$row[SeatID]' and TimetableID='$TimetableID'";
    $res3 = mysqli_query($connect,$sql3);
}

if($res&&$res3 == null){
    //echo "คำสั่งผิด -> $sql";
    //exit;
    echo "<script>alert('คำสั่ง sql ผิด');window.open('Main_ConfirmSeat.php','_self');</script>";
 }
 echo "<script>alert('ยืนยันข้อมูลเรียบร้อยแล้ว');window.open('Main_ConfirmSeat.php','_self');</script>";

?>
