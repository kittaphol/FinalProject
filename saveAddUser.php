<?php
//ฟังก์ชันสุ่มรหัสเอกสาร
function getName($n) { 
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
    $randomString = ''; 

    for ($i = 0; $i < $n; $i++) { 
        $index = rand(0, strlen($characters) - 1); 
        $randomString .= $characters[$index]; 
    } 
return $randomString; 
}


$FName = $_REQUEST['FName'];
$LName = $_REQUEST['LName'];
$G = $_REQUEST['Gender'];
if($G="ชาย"){
    $Gender = 1;
}else{
    $Gender = 2;
}
$Tel = $_REQUEST['Tel'];
$Email = $_REQUEST['Email'];

$TimetableID = $_REQUEST['TimetableID'];
$Date = $_REQUEST['Date'];
$Time = $_REQUEST['Time'];
$LocationName = $_REQUEST['LocationName'];
$TotalPrice = $_REQUEST['TotalPrice'];
//$Payment = $_REQUEST['Payment'];


$numSeat = $_REQUEST['numSeat'];
$num = $numSeat-1;
$SeatID = $_REQUEST['SeatID']; 
$nSeat = array();
$nSeat = explode(',',$SeatID);


date_default_timezone_set("Asia/Bangkok");
$currentDateTime = new \DateTime();
$dateTime = $currentDateTime->format('l-j-M-Y H:i:s A');
//echo "$dateTime";
/*
for($i=0;$i<=$num;$i++){
    echo "$nSeat[$i]";
}*/

    require("mysql/config.php");
    require("mysql/connect.php");

    if ($FName == "" || $LName == "" || $G == "" || $Tel == "" || $Email == "" || $LocationName == "") {
        echo "<script>alert('ตรวจสอบข้อมูลอีกครั้ง');
        window.open('Main_AddUser.php?TimetableID=$TimetableID&numSeatback=$numSeat&SeatIDback=$SeatID&back=1','_self');</script>";
    }else{
        
        
        $customerID = '';
        while(true){
            $customerID = getName(10);
            
            $sqlName = "select * from Customer where  CustomerID ='$customerID';";
            $resultName = mysqli_query($connect,$sqlName);

            if($resultName == null){
                echo "คำสั่งผิด";
            }

            $numRowName = mysqli_num_rows($resultName);
            if($numRowName ==0)
            {
                 break;
            }
        }
       

        $sql = "insert into Customer(CustomerID,FName,LName,Gender,Tel,Email,Username) value('$customerID','$FName','$LName','$Gender','$Tel','$Email','')";
        $res = mysqli_query($connect,$sql);

        if($res == null){
        echo "<script>alert('คำสั่ง sql ผิด');
        window.open('Main_AddUser.php?FName=$FName&LName=$LName&Gender=$Gender&Tel=$Tel&Email=$Email&LocationName=$LocationName&Date=$Date&Time=$Time&numSeat=$numSeat&SeatID=$SeatID','_self');</script>";
        }
        else{
            $sql2 = "select * from Customer where CustomerID ='$customerID'";
            $res2 = mysqli_query($connect,$sql2);
            
            while($row=mysqli_fetch_array($res2)){

                $sql3 = "insert into Booking(BookingID,Bookingdate,Payment,TotalPrice,Destination,BookingStatus,TimetableID,SeatID,CustomerID,Username)
                value('','$dateTime','Owner','$TotalPrice','$LocationName','2','$TimetableID','$nSeat[0]','$row[CustomerID]','')";
                $res3 = mysqli_query($connect,$sql3);
                
                $sql5 = "update bustable set StatusBustable='2' where SeatID='$nSeat[0]' and TimetableID='$TimetableID'";
                $res5 = mysqli_query($connect,$sql5);

            
            $select = "select * from booking where TimetableID ='$TimetableID' and SeatID = '$nSeat[0]'";
            $resselect = mysqli_query($connect,$select);

                
            while($row2=mysqli_fetch_array($resselect)){
                $BookingID = $row2['BookingID'];
            }
                for($i=1;$i<=$num;$i++){

                    $sql4 = "insert into Booking(BookingID,Bookingdate,Payment,TotalPrice,Destination,BookingStatus,TimetableID,SeatID,CustomerID,Username)
                    value('$BookingID','$dateTime','Owner','$TotalPrice','$LocationName','2','$TimetableID','$nSeat[$i]','$row[CustomerID]','')";
                    $res4= mysqli_query($connect,$sql4);

                    $sql6 = "update bustable set StatusBustable='2' where SeatID='$nSeat[$i]' and TimetableID='$TimetableID'";
                    $res6= mysqli_query($connect,$sql6);
                }
            }
        echo "<script>alert('เก็บข้อมูลเรียบร้อยแล้ว');window.open('Main_CheckSeat3.php?TimetableID=$TimetableID','_self');</script>";
        }
    }

?>
