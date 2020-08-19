<?php
$TimetableID = $_REQUEST['TimetableID'];
$Date = $_REQUEST['Date'];
$Time = $_REQUEST['Time'];
$BusID = $_REQUEST['BusID'];
//echo "$TimetableID $Date $Time $BusID";


if($Date == "" || $Time == "" || $BusID == ""){
    echo "<script>alert('ตรวจสอบข้อมูลอีกครั้ง');
    window.open('Main_BustableAdd.php','_self');</script>";
}
else{
    require("mysql/config.php");
    require("mysql/connect.php");

    $sql1 = "select * from busseat where BusID ='$BusID'";
    $res1 = mysqli_query($connect,$sql1);
    while($row=mysqli_fetch_array($res1)){

        $sql2 = "insert into bustable(TimetableID,BusID,SeatID,StatusBustable) value('$TimetableID','$BusID','$row[SeatID]','1')";
        $res2 = mysqli_query($connect,$sql2);
    }
    

   
	if($res2 == null){
       //echo "คำสั่งผิด -> $sql";
	   //exit;
	   echo "<script>alert('คำสั่ง sql ผิด');window.open('Main_BustableAdd.php','_self');</script>";
	}
    echo "<script>alert('เก็บข้อมูลเรียบร้อยแล้ว');window.open('Main_Timetable.php','_self');</script>";

    
}

?>