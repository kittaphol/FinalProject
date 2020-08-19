<?php
$BusID = $_REQUEST['BusID'];
$Color = $_REQUEST['Color'];
$Model = $_REQUEST['Model'];
$Numseat = $_REQUEST['Numseat'];
$Username = $_REQUEST['Username'];

//echo " $BusID $Color $Model $Numseat";


if($BusID == "" || $Color == "" || $Model == "" || $Numseat == "" || $Username == ""){
    echo "<script>alert('ตรวจสอบข้อมูลอีกครั้ง');
    window.open('Main_BusAdd.php','_self');</script>";
}
else{
    require("mysql/config.php");
    require("mysql/connect.php");
    //$sqlShowSeat = "select * from seat;"; ต้องการเอาข้อมูลมาใส่ในตารางbusseat

    $sql1 = "insert into bus(BusID,Color,Model,Numseat,Username) value('$BusID','$Color','$Model','$Numseat','$Username')";
    $res1 = mysqli_query($connect,$sql1);

    $sql2 = "select * from seat";
    $res2 = mysqli_query($connect,$sql2);

    while($row = mysqli_fetch_array($res2))
    {
        $sql3 = "insert into BusSeat(BusID,SeatID,SeatStatus) values('$BusID','$row[SeatID]','1')";
        $res3 = mysqli_query($connect,$sql3);

    }


	if($res1&&$res3 == null){
       //echo "คำสั่งผิด -> $sql";
	   //exit;
	   echo "<script>alert('คำสั่ง sql ผิด');window.open('Main_BusAdd.php','_self');</script>";
	}
    echo "<script>alert('เก็บข้อมูลเรียบร้อยแล้ว');window.open('Main_Bus.php','_self');</script>";

}

?>


