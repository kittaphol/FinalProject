<?php
/*if(isset($_REQUEST['CustomerID'])){
    $CustomerID = $_REQUEST['CustomerID'];
    $Detail = $_REQUEST['Detail'];
    
}else{*/    
$FName = $_REQUEST['FName'];
$LName = $_REQUEST['LName'];
$Gender = $_REQUEST['Gender'];
$Tel= $_REQUEST['Tel'];
$Email = $_REQUEST['Email'];
$Detail = $_REQUEST['Detail'];

//echo "$FName $LName $Gender $Tel $Email";
if ($FName == "" || $LName == "" || $Gender == "" || $Tel == "" || $Email == "" || $Detail == "") {
    echo "<script>alert('ตรวจสอบข้อมูลอีกครั้ง');
    window.open('FormCancel.php','_self');</script>";

}
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>FormCancel2</title>

</head>
<script>
    function confdel(rec, rec2, rec3) {
      var ans;
      ans = confirm('ท่านต้องการขอยกเลิกรายการนี้ = ' + rec);
      if (ans == true) {
        window.open('saveFormCancel.php?BookingID=' + rec + '&Detail=' + rec2 + '&CustomerID=' + rec3, '_self');
      } else
        alert('ไม่ต้องการขอยกเลิกรายการนี้');
    }
    </script>
<style>
    /* Create two equal columns that sits next to each other */
    .row {
        margin-left: 35%;
        padding-left:4%;
        padding-Top:1%;
        padding-bottom:1%;
        width: 30%;
    }

    .Button {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40%;
        margin-left: 30%;
        margin-right: 30%;
        padding: 20px;

    }
    .table-style {
      margin-right: 70px;
      margin-left: 70px;
    }
    
</style>
</head>

<body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <h5 class="my-0 mr-md-auto font-weight-normal">New Hoover Tour</h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href="Home.php">หน้าหลัก</a>
            <a class="p-2 text-dark" href="FormCancel.php">ขอยกเลิกที่นั่ง</a>
            <a class="p-2 text-dark" href="#">วิธีการซื้อตั๋วรถทัวร์</a>
            <a class="p-2 text-dark" href="#">ติดต่อเรา</a>
        </nav>
        <a class="btn btn-outline-primary" href="Login.php">Sign up</a>
    </div>
    <br>
    <h2>
        <p class="text-center text-info">ขอยกเลิกที่นั่ง</p>
    </h2>
    <div class="table-style">
          <table class="table table-striped shadow-lg p-3 mb-5 bg-white rounded">
            <thead>
              <tr class="bg-info text-center small">
                <th>รหัสรายการที่นั่ง</th>
                <th>วันที่เดินทาง</th>
                <th>เที่ยวรถ</th>
                <th>ที่นั่ง</th>
                <th>สถานที่ปลายทาง</th>
                <th>วันที่ซื้อที่นั่ง</th>
                <th>ราคารวม</th>
                <th>ฺสถานะการซื้อ</th>
                <th>ข้อมูลลูกค้า</th>
                <th>ขอยกเลิกที่นั่ง</th>
              </tr>
            </thead>
            <?php
            require("mysql/config.php");
            require("mysql/connect.php");
            /*if(isset($_REQUEST['CustomerID'])){
                
                $sqlShowBooking = "select * from booking, customer, timetable where booking.TimetableID = timetable.TimetableID 
                and booking.CustomerID = customer.CustomerID and customer.CustomerID='$CustomerID'";
            }else{*/
            $sqlShowBooking = "select * from booking, customer, timetable where booking.TimetableID = timetable.TimetableID and booking.CustomerID = customer.CustomerID and customer.FName='$FName' and customer.LName='$LName'
            and customer.Gender='$Gender' and customer.Tel='$Tel' and (booking.BookingStatus=2 or booking.BookingStatus=3)";
            
            $resultShowBooking = mysqli_query($connect, $sqlShowBooking);



            if ($resultShowBooking == null) {
                echo "คำสั่งผิด";
            }

            $numrow = mysqli_num_rows($resultShowBooking);

            if ($numrow == 0) {
                ?><tr class="bg-light text-center">
                      <td align='center' colspan="10">ไม่มีข้อมูล</td>
                    </tr><?php
            }else{

            $chkBookingID = '';
            $checkround = 1;
            $countrowsame = 1;
            $checkroundall = 1;
            $TotalSeat = '';
            $lashrow = mysqli_num_rows($resultShowBooking);
            //echo $lashrow;
            while ($recnumShowBooking = mysqli_fetch_array($resultShowBooking)) {

              if ($checkround == 1) {
                $chkBookingID = $recnumShowBooking['BookingID'];
                $chkDate = $recnumShowBooking['Date'];
                $chkTime = $recnumShowBooking['Time'];
                $chkDestination = $recnumShowBooking['Destination'];
                $chkBookingdate = $recnumShowBooking['Bookingdate'];
                //$chkPayment = $recnumShowBooking['Payment'];
                $chkTotalPrice = $recnumShowBooking['TotalPrice'];
                $chkBookingStatus = $recnumShowBooking['BookingStatus'];
                $chkCustomerID = $recnumShowBooking['CustomerID'];
                $chkTimetableID = $recnumShowBooking['TimetableID'];
              }
              if ($recnumShowBooking['BookingID'] == $chkBookingID) {
                $TotalSeat .= $recnumShowBooking['SeatID'] . " ";
                $checkround = $checkround + 1;
              } else {
                if ($chkBookingStatus == '2') {
                  $BookingStatus = 'รอการยืนยัน';
                }
                elseif($chkBookingStatus == '3') {
                  $BookingStatus = 'ยืนยันแล้ว';
                }
                echo "<tbody>"; ?><tr class="bg-light text-center small"><?php echo "
               <td>$chkBookingID</td>
               <td>$chkDate</td>
               <td>$chkTime</td>
               <td>$TotalSeat</td>
               <td>$chkDestination</td>
               <td>$chkBookingdate</td>";
                                                                          /*if ($chkPayment == 'Owner') {
                                                                            echo "<td>$chkPayment</td>";
                                                                          } else {
                                                                          ?><td align='center'><button onclick="confvar('<?php echo $chkBookingID; ?>','<?php echo $chkPayment; ?>')">ตรวจสอบ<br>การชำระเงิน</button></td><?php
                                                                                                                                                                                                                    }*/
                                                                                                                                                                                                                    echo "
               <td>$chkTotalPrice</td>
               <td>$BookingStatus</td>
               <td align='center'><a href='FormCancel3.php?CustomerID=$chkCustomerID&Detail=$Detail'>ดูข้อมูลลูกค้า</a></td>"; ?>
               <td align='center'><button onclick="confdel('<?php echo $chkBookingID; ?>','<?php echo $Detail; ?>','<?php echo $chkCustomerID; ?>')">ขอยกเลิกที่นั่ง</button></td>
                <?php "</tr><tbody>";
                $TotalSeat = $recnumShowBooking['SeatID'] . " ";
                $chkBookingID = $recnumShowBooking['BookingID'];
                $chkDate = $recnumShowBooking['Date'];
                $chkTime = $recnumShowBooking['Time'];
                $chkDestination = $recnumShowBooking['Destination'];
                $chkBookingdate = $recnumShowBooking['Bookingdate'];
                $chkPayment = $recnumShowBooking['Payment'];
                $chkTotalPrice = $recnumShowBooking['TotalPrice'];
                $chkBookingStatus = $recnumShowBooking['BookingStatus'];
                $chkCustomerID = $recnumShowBooking['CustomerID'];
                $chkTimetableID = $recnumShowBooking['TimetableID'];
              }
              if ($checkroundall == $lashrow) {
                if ($chkBookingStatus == '2') {
                  $BookingStatus = 'รอการยืนยัน';
                }
                elseif($chkBookingStatus == '3') {
                  $BookingStatus = 'ยืนยันแล้ว';
                }
                echo "<tbody>"; ?>
                <tr class="bg-light text-center small"><?php echo "
               <td>$recnumShowBooking[BookingID]</td>
               <td>$recnumShowBooking[Date]</td>
               <td>$recnumShowBooking[Time]</td>
               <td>$TotalSeat</td>
               <td>$recnumShowBooking[Destination]</td>
               <td>$recnumShowBooking[Bookingdate]</td>";

                                                        /*if ($recnumShowBooking['Payment'] == 'Owner') {
                                                          echo "<td>$recnumShowBooking[Payment]</td>";
                                                        } else {
                                                        ?><td align='center'><button onclick="confvar('<?php echo $recnumShowBooking['BookingID']; ?>','<?php echo $recnumShowBooking['Payment']; ?>')">ตรวจสอบ<br>การชำระเงิน</button></td><?php
                                                                                                                                                                                      } //<td><img src='images_user/".$recnumShowBooking['Payment']."'></td>*/
                                                                                                                                                             echo "
               <td>$recnumShowBooking[TotalPrice]</td>
               <td>$BookingStatus</td>
               <td align='center'><a href='FormCancel3.php?CustomerID=$recnumShowBooking[CustomerID]&Detail=$Detail'>ดูข้อมูลลูกค้า</a></td>"; ?>
                  <td align='center'><button onclick="confdel('<?php echo $recnumShowBooking['BookingID']; ?>','<?php echo $Detail ?>','<?php echo $recnumShowBooking['CustomerID']; ?>')">ขอยกเลิกที่นั่ง</button></td>
              <?php "</tr><tbody>";;
              }
              $checkroundall++;
            }
        }

              ?>
          </table>
        </div>
        <div class="col-md-15 text-center">
    <a class="btn btn-primary" href="FormCancel.php" role="button">ย้อนกลับ</a>
  </div>



    </div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>