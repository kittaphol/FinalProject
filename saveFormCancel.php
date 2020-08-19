<?php
$BookingID = $_REQUEST['BookingID'];
$Detail = $_REQUEST['Detail'];
$CustomerID = $_REQUEST['CustomerID'];

//echo "$BookingID $Detail $CustomerID";

date_default_timezone_set("Asia/Bangkok");
$currentDateTime = new \DateTime();
$dateTime = $currentDateTime->format('l-j-M-Y H:i:s A');

require("mysql/config.php");
require("mysql/connect.php");

$sql = "insert into form(FormID,FormDate,Detail,FormStatus,FormSubmit,BookingID,CustomerID) 
        value('','$dateTime','$Detail','2','2','$BookingID','$CustomerID')";
$res = mysqli_query($connect,$sql);
if($res == null){
    echo "<script>alert('คำสั่ง sql ผิด');window.open('FormCancel2.php?CustomerID=$CustomerID&Detail=$Detail','_self');</script>";
}
echo "<script>alert('ส่งข้อมูลการขอยกเลิกที่นั่งเรียบร้อยแล้ว');window.open('Home.php','_self');</script>";

?>