<?php
$BookingID = $_REQUEST['BookingID'];
$TimetableID = $_REQUEST['TimetableID'];
//echo "$BookingID $TimetableID ";


require("mysql/config.php");
require("mysql/connect.php");


$select = "select SeatID from booking where BookingID='$BookingID'";
$resselect = mysqli_query($connect,$select);
while($row=mysqli_fetch_array($resselect)){

    $sql = "update bustable set StatusBustable='1' where SeatID ='$row[SeatID]' and TimetableID='$TimetableID'";
    $result = mysqli_query($connect,$sql);

  }
  $sql2 = "update booking set BookingStatus='1' where BookingID='$BookingID'";
  $result2 = mysqli_query($connect,$sql2);


  $sql3 = "update form set FormSubmit='3' where BookingID='$BookingID'";
  $result3 = mysqli_query($connect,$sql3);

if($result&&$result2 == null){
    //echo "คำสั่งผิด -> $sql";
    //exit;
    echo "<script>alert('คำสั่ง sql ผิด');window.open('Main_CancelSeat.php','_self');</script>";
 }
 echo "<script>alert('ยืนยันยกเลิกที่นั่งเรียบร้อยแล้ว');window.open('Main_CancelSeat.php','_self');</script>";

?>
