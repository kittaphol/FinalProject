<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <title>Home</title>
  <script>
    function confselect(rec) {
      var ans;
      ans = confirm('ท่านต้องการเลือก = ' + rec);
      if (ans == true) {
        window.open('SelectSeat.php?TimetableID=' + rec, '_self');
      } else
        alert('ไม่แก้ไขรายการนี้');
    }
  </script>
  <style>
    .nav-inverse {
      background-color: transparent;
      border-color: transparent;
    }

    body {
      background-image: url("images/bus.jpg");
      background-repeat: no-repeat;
      /*background-size: 100%;*/
      background-size: auto;
    }

    .button {
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .table-style {
      margin-right: 250px;
      margin-left: 250px;
    }

    table {
      border-collapse: collapse;
      border-style: hidden;

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

  <br><h4 align="center"><b>รายละเอียดตารางเที่ยวรถ</b></h4><br>
  <div class="table-style">
    <table class="table table-striped shadow-lg p-3 mb-5 bg-white rounded">
      <thead>
        <tr class="bg-info text-center">
          <th>วันที่</th>
          <th>รอบเวลา</th>
          <th>รถทัวร์</th>
          <th>จำนวนที่นั่ง</th>
          <th>ราคา/ที่นั่ง</th>
          <th>เลือก</th>
        </tr>
      </thead>
      <?php
      $Date = $_REQUEST['Date'];
      $T = $_REQUEST['Time'];

      if ($Date == "" || $T == "") {
        echo "<script>alert('ตรวจสอบข้อมูลอีกครั้ง');
                window.open('Home.php','_self');</script>";
      } else {
        if ($T == '1') {
          $Time = "9.00 AM";
        } elseif ($T == '2') {
          $Time = "10.00 AM";
        }

        require("mysql/config.php");
        require("mysql/connect.php");

        $sqlShowBustable = "select bustable.TimetableID as tID, bustable.BusID as bID, bustable.SeatID as sID,
                                    timetable.TimetableID, timetable.Date, timetable.Time,
                                    bus.BusID, bus.Numseat,
                                    seat.SeatID, seat.SeatCost from bustable, timetable, bus, seat 
                                    where bustable.TimetableID=timetable.TimetableID and bustable.BusID=bus.BusID and bustable.SeatID=seat.SeatID and timetable.Date='$Date' and timetable.Time='$Time' limit 1;";
        $resultShowBustable = mysqli_query($connect, $sqlShowBustable);

        if ($resultShowBustable == null) {
          echo "คำสั่งผิด";
        }

        $numrow = mysqli_num_rows($resultShowBustable);

        if ($numrow == 0) {
      ?><tr class="bg-light text-center">
            <td align='center' colspan="6">ไม่มีข้อมูล</td>
          </tr><?php
              } else {
                while ($recnumShowBustable = mysqli_fetch_array($resultShowBustable)) {
                  echo "<tbody>"; ?> <tr class="bg-light text-center"><?php echo "
                                <td>$recnumShowBustable[Date]</td>
                                <td>$recnumShowBustable[Time]</td>
                                <td align='center'>$recnumShowBustable[BusID]</td>
                                <td align='center'>$recnumShowBustable[Numseat]</td>
                                <td align='center'>$recnumShowBustable[SeatCost]</td>"; ?>
              <td align='center'><button onclick="confselect('<?php echo $recnumShowBustable['TimetableID']; ?>')">เลือก</button></td>
        <?php "</tr><tbody>";
                }
              }
            }
        ?>

    </table>
  </div>

  <div class="col-md-15 text-center">
    <a class="btn btn-primary" href="Home.php" role="button">ย้อนกลับ</a>
  </div>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>