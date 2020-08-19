<?php

$Date = $_REQUEST['Date'];
$T = $_REQUEST['Time'];
$Username = $_REQUEST['Username'];
$TimetableID = "$Date-$T";
//echo "$TimetableID $Date $Time $Username";


if($Date == "" || $T == "" || $Username == ""){
    echo "<script>alert('ตรวจสอบข้อมูลอีกครั้ง');
    window.open('Main_TimetableAdd.php','_self');</script>";
}
else{
    require("mysql/config.php");
    require("mysql/connect.php");

    if($T == '1'){
        $Time = "9.00 AM";
    }
    elseif($T == '2'){
        $Time = "10.00 AM";
    }
    
	$sql = "insert into Timetable(TimetableID,Date,Time,Username) value('$TimetableID','$Date','$Time','$Username')";
    $res = mysqli_query($connect,$sql);
    
	if($res == null){
       //echo "คำสั่งผิด -> $sql";
	   //exit;
	   echo "<script>alert('คำสั่ง sql ผิด');window.open('Main_TimetableAdd.php','_self');</script>";
	}
    echo "<script>alert('เก็บข้อมูลเรียบร้อยแล้ว');window.open('Main_Timetable.php','_self');</script>";

    //echo "$TimetableID $Date $Time $Username";
}

?>