<?php
session_start();

$Username = '';
$Password = '';
if (!(isset($_SESSION['Username']) && isset($_SESSION['Password']))) {
  echo "<script>
  window.open('home.php','_self')
</script>";
} else {
  $Username = $_SESSION['Username'];
  $Password = $_SESSION['Password'];
}

?>

<?php
$back = $_REQUEST['back'];
if ($back == "1") {
  $TimetableID = $_REQUEST['TimetableID'];
  $SeatID = $_REQUEST['SeatIDback'];
  $numSeat = $_REQUEST['numSeatback'];
} else {
  $TimetableID = $_POST['TimetableID'];
  $numSeat = count($_POST['SeatID']);
  $SeatID = "";

  if (isset($_POST['SeatID']) && $numSeat <= 5) {
    for ($i = 0; $i < $numSeat; $i++) {
      $SeatID .=  trim($_POST['SeatID'][$i]);

      if ($i != ($numSeat - 1)) {
        $SeatID .= ',';
      }
    }
    //echo $SeatID;
  } elseif ($numSeat > 5) {
    echo "<script>alert('เลือกที่นั่งได้ไม่เกิน 5 ที่');
                window.open('Main_CheckSeat3.php?TimetableID=$TimetableID','_self');
            </script>";
  } else {
    echo "<script>alert('กรุณาตรวจสอบที่นั่งอีกครั้ง');
                window.open('Main_CheckSeat3.php?TimetableID=$TimetableID','_self');
            </script>";
  }
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

  <title>Main_AddUser</title>
  <style>
    .style-sidebar {
      background: #F0FFF0;
      padding: 5px;
      border-radius: 5px;
    }

    .padding-style {
      padding: 1% 20%;
    }

    .row {
      display: flex;
      padding: auto;
    }

    /* Create two equal columns that sits next to each other */
    .column {
      flex: 50%;
      padding: 20px;
      height: 560px;
      padding: 20px;
      padding-left: 40px;
      padding-right: 0px;

      /* Should be removed. Only for demonstration */
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
  </style>
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
          <h2>ตรวจสอบรายการที่นั่ง</h2>
          <div class="btn-toolbar mb-2 mb-md-0">

          </div>
        </div>
        <h5 align="center">เพิ่มรายการที่นั่ง</h5>
        <div class="padding-style">
          <form name='Main_AddUser' action="saveAddUser.php" method="post">
            <div class="row">
              <div class="column" style="background-color:#bbb; border-style: double;">
                <h4>ข้อมูลส่วนตัว</h4>
                <div class="form-group col-md-10">
                  <label>
                    <h6>ชื่อจริง :</h6>
                  </label>
                  <input type="text" class="form-control" name="FName" placeholder="">
                </div>
                <div class="form-group col-md-10">
                  <label>
                    <h6>นามสกุล :</h6>
                  </label>
                  <input type="text" class="form-control" name="LName" placeholder="">
                </div>
                <div class="form-group col-md-10">
                  <label>เพศ :</label>&nbsp;&nbsp;
                  <input type='radio' name='Gender' value='1'>&nbsp;เพศชาย &nbsp;
                  <input type='radio' name='Gender' value='2'>&nbsp;เพศหญิง
                </div>
                <div class="form-group col-md-10">
                  <label>โทรศัพท์ :</label>
                  <input type="text" class="form-control" name="Tel" maxlength="10" placeholder="">
                </div>
                <div class="form-group col-md-10">
                  <label>Email :</label>
                  <input type="text" class="form-control" name="Email" placeholder="">
                </div>
                <div class="form-group col-md-10">
                  <label>จุดหมายปลายทาง :</label>
                  <select class="form-control" name="LocationName">
                    <option value='' selected>กรุณาเลือกปลายทาง</option>
                    <?php
                    require("mysql/config.php");
                    require("mysql/connect.php");

                    $sqlSearchLocation = "select LocationName from Location;";
                    $resultSearchLocation = mysqli_query($connect, $sqlSearchLocation);

                    if ($resultSearchLocation == null) {
                      echo "คำสั่งผิด";
                    }
                    while ($recnumSearchLocation = mysqli_fetch_array($resultSearchLocation)) {
                      echo "<option value='$recnumSearchLocation[0]'>$recnumSearchLocation[0]</option>";
                    }

                    ?>
                  </select>
                </div>
              </div>
              <?php
              $sqlShowBustable = "select bustable.TimetableID as tID, bustable.BusID as bID, bustable.SeatID as sID, bustable.StatusBustable,
                                timetable.TimetableID, timetable.Date, timetable.Time,
                                bus.BusID, bus.Numseat,
                                seat.SeatID, seat.SeatCost from bustable, timetable, bus, seat 
                                where bustable.TimetableID=timetable.TimetableID and bustable.BusID=bus.BusID and bustable.SeatID=seat.SeatID and bustable.TimetableID='$TimetableID' limit 1;";
              $resultShowBustable = mysqli_query($connect, $sqlShowBustable);

              while ($recnumShowBustable = mysqli_fetch_array($resultShowBustable)) {
                $Date = "$recnumShowBustable[Date]";
                $Time = "$recnumShowBustable[Time]";
              }

              ?>
              <div class="column" style="background-color:#fff; border-style: double;">
                <h4>ข้อมูลที่นั่ง</h4>


                <div class="form-group col-md-10">
                  <input type="hidden" name="TimetableID" value="<?php echo $TimetableID; ?>">
                  <label>
                    <h6>วันที่เดินทาง :</h6>
                  </label>
                  <input type="text" style="text-align: center;" class="form-control" name="Date" readonly value="<?php echo $Date ?>">
                </div>
                <div class="form-group col-md-10">
                  <label>
                    <h6>เที่ยวรถ :</h6>
                  </label>
                  <input type="text" style="text-align: center;" class="form-control" name="Time" readonly value="<?php echo $Time ?>">
                </div>

                <div class="form-group col-md-10">
                  <label>
                    <h6>จำนวนที่นั่ง :</h6>
                  </label>
                  <input type="text" style="text-align: center;" class="form-control" name="numSeat" readonly value="<?php echo $numSeat ?>">

                </div>

                <div class="form-group col-md-10">
                  <label>
                    <h6>ที่นั่ง :</h6>
                  </label>
                  <input type="text" style="text-align: center;" class="form-control" name="SeatID" readonly value="<?php echo $SeatID ?>">
                </div>

                <div class="form-group col-md-10">
                  <label>
                    <h6>ราคารวม :</h6>
                  </label>
                  <input type="text" style="text-align: center;" class="form-control" name="TotalPrice" readonly value="<?php $TotalPrice = $numSeat * 500;
                                                                                                                        echo $TotalPrice
                                                                                                                        ?>">
                </div>

              </div>

              <div class="form-group Button">
                <a class="btn btn-primary" href="Main_CheckSeat3.php?TimetableID=<?php echo $TimetableID; ?>" role="button">
                  Back</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>
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

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>