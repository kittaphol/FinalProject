<?php
$FName = $_REQUEST['FName'];
$LName = $_REQUEST['LName'];
$G = $_REQUEST['Gender'];
if ($G == '1') {
    $Gender = "ชาย";
} else {
    $Gender = "หญิง";
}
$Tel = $_REQUEST['Tel'];
$Email = $_REQUEST['Email'];
$LocationName = $_REQUEST['LocationName'];

$Date = $_REQUEST['Date'];
$Time = $_REQUEST['Time'];
$numSeat = $_REQUEST['numSeat'];
$SeatID = $_REQUEST['SeatID'];

require("mysql/config.php");
require("mysql/connect.php");

$sqlSearchTimetable = "select TimetableID from Timetable where Date='$Date' and Time='$Time'";
$resultSearchTimetable = mysqli_query($connect, $sqlSearchTimetable);

while ($recnumSearchTimetable = mysqli_fetch_array($resultSearchTimetable)) {
    $TimetableID = "$recnumSearchTimetable[TimetableID]";
}

if ($FName == "" || $LName == "" || $G == "" || $Tel == "" || $Email == "" || $LocationName == "") {
    echo "<script>alert('ตรวจสอบข้อมูลอีกครั้ง');
    window.open('AddUser.php?TimetableID=$TimetableID&numSeatback=$numSeat&SeatIDback=$SeatID&back=1','_self');</script>";
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

    <title>AddUser</title>

</head>
<style>
    .container-center {
        text-align: center;
        align-items: center;
    }

    .background {
        height: 350px;
    }

    .Button {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 75%;
        margin-left: 10%;
        
        padding: 20px;
    }

    .card-style {
        margin-left: 30%;
        margin-right: 30%;
        margin-top: 30px;
        margin-bottom: 30px;
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
        <p class="text-center text-info">กรุณาแนบหลักฐานการชำระเงิน</p>
    </h2><br>
    <div class="p-3 mb-2 bg-light text-dark background">
        <h4>
            <p class="text-muted text-center">ช่องทางการชำระเงิน</p>
        </h4>
        <div class="container container-center">
            <div class="row">
                <div class="col-sm">
                    <img src="images/SCB.png" width="170" height="170">
                    <h5><b>
                            <p class="text-muted text-center">ธนาคารไทยพาณิชย์</p>
                        </b></h5>
                    <p class="text-muted text-center">นายกฤตพล วัชรพาณิชอมร</p>
                    <p class="text-muted text-center">xxx-xxx-xxxx</p>
                </div>
                <div class="col-sm">
                    <img src="images/KBANK.png" width="170" height="170">
                    <h5><b>
                            <p class="text-muted text-center">ธนาคารกสิกรไทย</p>
                        </b></h5>
                    <p class="text-muted text-center">นายกฤตพล วัชรพาณิชอมร</p>
                    <p class="text-muted text-center">xxx-xxx-xxxx</p>
                </div>
                <div class="col-sm">
                    <img src="images/KTB.png" width="170" height="170">
                    <h5><b>
                            <p class="text-muted text-center">ธนาคารกรุงไทย</p>
                        </b></h5>
                    <p class="text-muted text-center">นายกฤตพล วัชรพาณิชอมร</p>
                    <p class="text-muted text-center">xxx-xxx-xxxx</p>

                </div>
            </div>
        </div>

    </div>

    <div class="card card-style">
        <div class="card-body px-lg-5">
            <h5>
                <b>
                    <p align="center">หลักฐานการชำระเงิน</p>
                </b>
            </h5>

            <div class="card">
                <div class="card-body px-lg-5">
                    <b>
                        <p align="left">ข้อมูลลูกค้า</p>
                    </b>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ชื่อ : <?php echo $FName; ?><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;นามสกุล : <?php echo $LName; ?><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เพศ : <?php echo $Gender; ?><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;โทรศัพท์ : <?php echo $Tel; ?><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email : <?php echo $Email; ?>
                    </p>
                    <b>
                        <p align="left">ข้อมูลการซื้อที่นั่ง</p>
                    </b>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;วันที่เดินทาง : <?php echo $Date; ?><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เที่ยวรถ : <?php echo $Time; ?><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;จุดหมายปลายทาง : <?php echo $LocationName; ?><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ที่นั่ง : <?php echo $SeatID; ?><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ราคา : <?php
                                                                $TotalPrice = $numSeat * 500;
                                                                echo $TotalPrice
                                                                ?>&nbsp;บาท<br>
                    </p>
                </div>
            </div>
            <br>
            <form action="saveUser.php" method="post" enctype="multipart/form-data">
                <div class="md-form">
                    <label for="img">แนบหลักฐานการชำระเงิน:</label>&nbsp;&nbsp;&nbsp;
                    <input type="file" name="image" accept="image/*">
                    <input type="hidden" name="FName" value="<?php echo $FName; ?>">
                    <input type="hidden" name="LName" value="<?php echo $LName; ?>">
                    <input type="hidden" name="Gender" value="<?php echo $Gender; ?>">
                    <input type="hidden" name="Tel" value="<?php echo $Tel; ?>">
                    <input type="hidden" name="Email" value="<?php echo $Email; ?>">

                    <input type="hidden" name="TimetableID" value="<?php echo $TimetableID; ?>">
                    <input type="hidden" name="Date" value="<?php echo $Date; ?>">
                    <input type="hidden" name="Time" value="<?php echo $Time; ?>">
                    <input type="hidden" name="LocationName" value="<?php echo $LocationName; ?>">
                    <input type="hidden" name="numSeat" value="<?php echo $numSeat; ?>">
                    <input type="hidden" name="SeatID" value="<?php echo $SeatID; ?>">
                    <input type="hidden" name="TotalPrice" value="<?php echo $TotalPrice; ?>">

                    <div class="form-group Button">
                        <a class="btn btn-primary" href="AddUser.php?TimetableID=<?php echo $TimetableID; ?>&numSeatback=<?php echo $numSeat; ?>&SeatIDback=<?php echo $SeatID; ?>&back=<?php echo "1"; ?>" role="button">
                            ย้อนกลับ</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="submit" class="btn btn-primary" name="uploadimage">ดำเนินการชำระเงิน</button>
                    </div>
            </form>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>