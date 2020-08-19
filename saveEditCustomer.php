<?php
$TimetableID = $_REQUEST['TimetableID'];
$CustomerID = $_REQUEST['editCustomer'];
$FName = $_REQUEST['editFName'];
$LName = $_REQUEST['editLName'];
$Gender = $_REQUEST['editGender'];
$Tel = $_REQUEST['editTel'];
$Email = $_REQUEST['editEmail']; 



if($FName == "" || $LName == "" || $Gender == "" || $Tel  == "" || $Email  == ""){
    echo "<script>alert('ตรวจสอบข้อมูลอีกครั้ง');
    window.open('editCustomer.php?CustomerID=$CustomerID','_self');</script>";
}
else{
    require("mysql/config.php");
    require("mysql/connect.php");
    
	$sql = "update customer set FName='$FName', LName='$LName', Gender='$Gender', Tel='$Tel', Email='$Email' where CustomerID='$CustomerID'";
	$res = mysqli_query($connect,$sql);
	if($res == null){
       //echo "คำสั่งผิด -> $sql";
	   //exit;
	   echo "<script>alert('คำสั่ง sql ผิด');window.open('editCustomer.php?TimetableID=$TimetableID&CustomerID=$CustomerID','_self');</script>";
	}
    echo "<script>alert('แก้ไขข้อมูลเรียบร้อยแล้ว');window.open('Main_Customer.php?TimetableID=$TimetableID&CustomerID=$CustomerID','_self');</script>";

}

?>