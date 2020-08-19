<?php
session_start();

$Username = '';
$Password = '';
if(!(isset($_SESSION['Username']) && isset($_SESSION['Password'])))
{
  echo "<script>
  window.open('home.php','_self')
</script>";
  
}else{
  $Username = $_SESSION['Username'];
  $Password = $_SESSION['Password'];
}
?>

<?php 

if(!empty($_GET['search'])){
    $search = $_REQUEST['search'];
    $sqlShowBooking =  "select booking.BookingID, booking.Bookingdate, booking.Payment, booking.TotalPrice, booking.Destination, 
                            booking.BookingStatus, booking.TimetableID, booking.SeatID, booking.CustomerID, booking.Username,
                            timetable.Date, timetable.Time
                            from booking, timetable where booking.TimetableID=timetable.TimetableID and timetable.Date LIKE '%" . $search ."%' and booking.BookingStatus='1';";
}else{
    $sqlShowBooking = "select booking.BookingID, booking.Bookingdate, booking.Payment, booking.TotalPrice, booking.Destination, 
                               booking.BookingStatus, booking.TimetableID, booking.SeatID, booking.CustomerID, booking.Username,
                               timetable.Date, timetable.Time
                               from booking, timetable where booking.TimetableID=timetable.TimetableID and booking.BookingStatus='1';";
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

  <title>Main_SumCancel</title>
  <script>
    function confvar(rec, rec2) {
      var ans;
      ans = confirm('ท่านต้องการตรวจสอบรายการนี้ = ' + rec);
      if (ans == true) {
        window.open('Main_CancelPayment.php?BookingID=' + rec + '&Payment=' + rec2 + '&SumCancel=1', '_self');
      } else
        alert('ไม่ตรวจสอบรายการนี้');
    }

    function confsub(rec, rec2) {
      var ans;
      ans = confirm('ท่านต้องการยืนยันรายการนี้ = ' + rec);
      if (ans == true) {
        window.open('saveConfirmSeat.php?BookingID=' + rec + '&TimetableID=' + rec2, '_self');
      } else
        alert('ไม่ยืนยันรายการนี้');
    }

    function confdel(rec, rec2) {
      var ans;
      ans = confirm('ท่านต้องการลบรายการนี้ = ' + rec);
      if (ans == true) {
        window.open('delConfirmSeat.php?BookingID=' + rec + '&TimetableID=' + rec2, '_self');
      } else
        alert('ไม่ลบรายการนี้');
    }
  </script>
  <style>
    .style-sidebar {
      background: #F0FFF0;
      padding: 5px;
      border-radius: 5px;
    }

    .table-style {
      margin-right: 0px;
      margin-left: -5px;
    }
    form{
        margin-left: 35%;
      }
  </style>
</head>

<body>
  <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">New Hoover Tour</h5>
    <nav class="my-2 my-md-0 mr-md-3">
      <a class="p-2 text-dark" href="Main.php">หน้าหลัก</a>
      <a class="p-2 text-dark" href="#">วิธีการซื้อตั๋วรถทัวร์</a>
      <a class="p-2 text-dark" href="#">ติดต่อเรา</a>
    </nav>
    <a class="btn btn-outline-primary" href="Checklogout.php">Sign out</a>
  </div>

  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 d-none d-md-block sidebar ">
        <div class="sidebar-sticky style-sidebar">

          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>รายการ</span>
          </h6>

          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="Main_CheckSeat.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                  <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                  <circle cx="9" cy="7" r="4"></circle>
                  <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                  <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
                ตรวจสอบรายการที่นั่ง<span class="sr-only">(current)</span></a></li>
            <li class="nav-item">
              <a class="nav-link" href="Main_ConfirmSeat.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                  <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                  <circle cx="9" cy="7" r="4"></circle>
                  <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                  <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
                ยืนยันรายการซื้อที่นั่ง</a></li>
            <li class="nav-item">
              <a class="nav-link" href="Main_CancelSeat.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                  <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                  <circle cx="9" cy="7" r="4"></circle>
                  <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                  <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
                ยืนยันการยกเลิกที่นั่ง</a></li>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>สรุปรายการต่างๆ</span>
            </h6>

            <li class="nav-item">
              <a class="nav-link" href="Main_SumConfirm.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text">
                  <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                  <polyline points="14 2 14 8 20 8"></polyline>
                  <line x1="16" y1="13" x2="8" y2="13"></line>
                  <line x1="16" y1="17" x2="8" y2="17"></line>
                  <polyline points="10 9 9 9 8 9"></polyline>
                </svg>
                สรุปรายการซื้อที่นั่ง</a></li>
            <li class="nav-item">
              <a class="nav-link" href="Main_SumCancel.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text">
                  <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                  <polyline points="14 2 14 8 20 8"></polyline>
                  <line x1="16" y1="13" x2="8" y2="13"></line>
                  <line x1="16" y1="17" x2="8" y2="17"></line>
                  <polyline points="10 9 9 9 8 9"></polyline>
                </svg>
                สรุปรายการยกเลิกที่นั่ง</a></li>
          </ul>

          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>ข้อมูลต่างๆ</span>
          </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link" href="Main_Timetable.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle">
                  <circle cx="12" cy="12" r="10"></circle>
                  <line x1="12" y1="8" x2="12" y2="16"></line>
                  <line x1="8" y1="12" x2="16" y2="12"></line>
                </svg>
                ตารางเที่ยวรถ
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Main_Bus.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle">
                  <circle cx="12" cy="12" r="10"></circle>
                  <line x1="12" y1="8" x2="12" y2="16"></line>
                  <line x1="8" y1="12" x2="16" y2="12"></line>
                </svg>
                รถทัวร์
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Main_Seat.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle">
                  <circle cx="12" cy="12" r="10"></circle>
                  <line x1="12" y1="8" x2="12" y2="16"></line>
                  <line x1="8" y1="12" x2="16" y2="12"></line>
                </svg>
                ที่นั่ง
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Main_Location.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle">
                  <circle cx="12" cy="12" r="10"></circle>
                  <line x1="12" y1="8" x2="12" y2="16"></line>
                  <line x1="8" y1="12" x2="16" y2="12"></line>
                </svg>
                สถานที่ปลายทาง
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="chartjs-size-monitor " style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
          <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
            <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
          </div>
          <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
            <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
          </div>
        </div>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h2>สรุปรายการยกเลิกที่นั่ง</h2>
          <div class="btn-toolbar mb-2 mb-md-0">
            <!--<div class="btn-group mr-2"><a class="btn btn-outline-success" href="Main_ConfirmSeatAdd.php" role="button">เพิ่ม</a></div>-->
          </div>
        </div>
        <h5 align="center">ตรวจสอบรายการยกเลิกที่นั่ง</h5><br>
        <form  class="form-inline" action= 'Main_SumCancel.php' method='get'>
                  <p align='center'>วันที่เดินทาง :&nbsp;&nbsp;<input type ='date' class="form-control" style="width: 200px;" <?php echo"name='search'"; ?>>
                  
                  <button class="btn btn-info">ค้นหา</button>
        </form>


        
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
                <th>การชำระเงิน</th>
                <th>ราคารวม</th>
                <th>ฺสถานะการซื้อ</th>
                <th>ข้อมูลลูกค้า</th>
                <!--<th>ยืนยัน</th>
                <th>ปฏิเสธ</th>-->
              </tr>
            </thead>
            <?php
            require("mysql/config.php");
            require("mysql/connect.php");

            /*$sqlShowBooking = "select booking.BookingID, booking.Bookingdate, booking.Payment, booking.TotalPrice, booking.Destination, 
                               booking.BookingStatus, booking.TimetableID, booking.SeatID, booking.CustomerID, booking.Username,
                               timetable.Date, timetable.Time
                               from booking, timetable where booking.TimetableID=timetable.TimetableID and booking.BookingStatus='1';";*/
            $resultShowBooking = mysqli_query($connect, $sqlShowBooking);



            if ($resultShowBooking == null) {
              echo "คำสั่งผิด";
            }
            $chkBookingID = '';
            $checkround = 1;
            $countrowsame = 1;
            $checkroundall = 1;
            $TotalSeat = '';
            $lashrow = mysqli_num_rows($resultShowBooking);
            //echo $lashrow;
            while ($recnumShowBooking = mysqli_fetch_array($resultShowBooking)) {

              if ($recnumShowBooking['BookingStatus'] == '1') {
                $BookingStatus = 'ยกเลิกแล้ว';
              }

              if ($checkround == 1) {
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
              if ($recnumShowBooking['BookingID'] == $chkBookingID) {
                $TotalSeat .= $recnumShowBooking['SeatID'] . " ";
                $checkround = $checkround + 1;
              } else {
                echo "<tbody>"; ?><tr class="bg-light text-center small"><?php echo "
               <td>$chkBookingID</td>
               <td>$chkDate</td>
               <td>$chkTime</td>
               <td>$TotalSeat</td>
               <td>$chkDestination</td>
               <td>$chkBookingdate</td>";
                                                                          if ($chkPayment == 'Owner') {
                                                                            echo "<td>$chkPayment</td>";
                                                                          } else {
                                                                          ?><td align='center'><button onclick="confvar('<?php echo $chkBookingID; ?>','<?php echo $chkPayment; ?>')">ตรวจสอบ<br>การชำระเงิน</button></td><?php
                                                                                                                                                                                                                    }
                                                                                                                                                                                                                    echo "
               <td>$chkTotalPrice</td>
               <td>$BookingStatus</td>
               <td align='center'><a href='Main_CustomerCan.php?CustomerID=$chkCustomerID&SumCancel=1'>ดูข้อมูลลูกค้า</a></td>"; ?>
                  <!--<td align='center'><button onclick="confsub('<?php echo $chkBookingID; ?>','<?php echo $chkTimetableID; ?>')">ยืนยัน</button></td>
                  <td align='center'><button onclick="confdel('<?php echo $chkBookingID; ?>','<?php echo $chkTimetableID; ?>')">ปฏิเสธ</button></td>-->
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
                echo "<tbody>"; ?>
                <tr class="bg-light text-center small"><?php echo "
               <td>$recnumShowBooking[BookingID]</td>
               <td>$recnumShowBooking[Date]</td>
               <td>$recnumShowBooking[Time]</td>
               <td>$TotalSeat</td>
               <td>$recnumShowBooking[Destination]</td>
               <td>$recnumShowBooking[Bookingdate]</td>";

                                                        if ($recnumShowBooking['Payment'] == 'Owner') {
                                                          echo "<td>$recnumShowBooking[Payment]</td>";
                                                        } else {
                                                        ?><td align='center'><button onclick="confvar('<?php echo $recnumShowBooking['BookingID']; ?>','<?php echo $recnumShowBooking['Payment']; ?>')">ตรวจสอบ<br>การชำระเงิน</button></td><?php
                                                                                                                                                                                      } //<td><img src='images_user/".$recnumShowBooking['Payment']."'></td>
                                                                                                                                                                                      echo "<td>$recnumShowBooking[TotalPrice]</td>
               <td>$BookingStatus</td>
               <td align='center'><a href='Main_CustomerCan.php?CustomerID=$recnumShowBooking[CustomerID]&SumCancel=1'>ดูข้อมูลลูกค้า</a></td>"; ?>
                  <!--<td align='center'><button onclick="confsub('<?php echo $recnumShowBooking['BookingID']; ?>','<?php echo $recnumShowBooking['TimetableID']; ?>')">ยืนยัน</button></td>
                  <td align='center'><button onclick="confdel('<?php echo $recnumShowBooking['BookingID']; ?>','<?php echo $recnumShowBooking['TimetableID']; ?>')">ปฏิเสธ</button></td>-->
              <?php "</tr><tbody>";;
              }
              $checkroundall++;
            }

              ?>
          </table>
        </div>



    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script>
      window.jQuery || document.write('<script src="/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')
    </script>
    <script src="/docs/4.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script src="dashboard.js"></script>

</body>

</html>