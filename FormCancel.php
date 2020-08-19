
<?php
//$TimetableID = $_REQUEST['TimetableID'];
/*
$back = $_REQUEST['back'];
if ($back =="1") {
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
                window.open('SelectSeat.php?TimetableID=$TimetableID','_self');
            </script>";
    } else {
        echo "<script>alert('กรุณาตรวจสอบที่นั่งอีกครั้ง');
                window.open('SelectSeat.php?TimetableID=$TimetableID','_self');
            </script>";
    }
}*/
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>FormCancel</title>

</head>
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
    
    <form name='FormCancel' action="FormCancel2.php" method="post">
        <div class="row" style="background-color:#bbb; border-style: double;">
                <h5>กรอกข้อมูลที่ทำการซื้อที่นั่ง</h5><br>
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
                    <label>เลขบัญชีธนาคาร :</label>
                    <input type="text" class="form-control" name="Detail" placeholder="">
                </div>
</div>
       

            <div class="form-group Button">
                <a class="btn btn-primary" href="Home.php" role="button">
                    ย้อนกลับ</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btn-primary">ถัดไป</button>
            </div>
        </div>
    </form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>