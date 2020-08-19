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
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            $('#myTable').on('click', '#rowcol', function() {

                rowcol = $(this).attr('class');

                divRowCol = '#rowcol' + rowcol;
                col = $(divRowCol).attr('class');

                eq = 'td:eq(' + col + ')';

                val = $(this).closest('tr');
                SeatID = val.find(eq).text();

                bgColor = $(this).attr('bgcolor');

                if (bgColor == '#CCCCCC') {
                    $(this).css("background-color", "#00CCFF");
                    $(this).attr("bgcolor", "#00CCFF");

                }
                if (bgColor == '#00CCFF') {
                    $(this).css("background-color", "#CCCCCC");
                    $(this).attr("bgcolor", "#CCCCCC");
                }


                //---------------------
                rowSeat = $('#rowSeat').val();

                query = '';

                for (i = 0; i <= rowSeat; i++) {
                    for (col = 0; col <= 2; col++) {

                        divRowCol = '#rowcol' + i + "" + col;
                        SeatID = $(divRowCol).text();

                        //alert(SeatID);

                        cBgColorTxt = "." + i + "" + col;
                        cBgColor = $(cBgColorTxt).attr('bgcolor');
                        //alert(i + "" + col + " " + cBgColor);

                        if (cBgColor == '#98FB98') {
                            query += "<tr><td><input type='hidden' name='SeatID[]' value='" + SeatID + "'></td></tr>";
                        }

                    }
                }

                $('#seatTable').html(query);

            });

        });
    </script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Main_BustableShow</title>
    <style>
        .style-sidebar {
            background: #F0FFF0;
            padding: 5px;
            border-radius: 5px;

        }

        th,
        td {
            text-align: center;
        }

        table {
            border-collapse: separate;
            border-spacing: 5px 5px;
            padding: 10px;
        }

        .Button {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .style-symbol {
            position: absolute;
            top: 15%;
            right: 5%;

            width: 300px;
        }

        .square1 {
            height: 40px;
            width: 40px;
            background-color: #CCCCCC;
            margin: 10px;
        }

        .square2 {
            height: 40px;
            width: 40px;
            background-color: #FFFF00;
            margin: 10px;
        }

        .square3 {
            height: 40px;
            width: 40px;
            background-color: #66FF99;
            margin: 10px;
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
                    <h2>ตารางเที่ยวรถ</h2>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group mr-2"><a class="btn btn-outline-danger" href="Main_Timetable.php" role="button">ย้อนกลับ</a></div>
                    </div>
                </div>
                <h5 align="center">รายละเอียดตารางเที่ยวรถ</h5>
                <div class="style-symbol">
                    <form class="form-inline">
                        <div class="square1"></div>
                        <p>ที่นั่งว่าง</p>
                    </form>
                    <form class="form-inline">
                        <div class="square2"></div>
                        <p>ที่นั่งรอการยืนยัน</p>
                    </form>
                    <form class="form-inline">
                        <div class="square3"></div>
                        <p>ที่นั่งไม่ว่าง</p>
                    </form>
                </div>



                <table class="table table-bordered" align="center" style="width:40%" id='myTable'>
                    <?php

                    $TimetableID = $_REQUEST['TimetableID'];
                    require("mysql/config.php");
                    require("mysql/connect.php");

                    $sqlShowBustable = "select bustable.TimetableID as tID, bustable.BusID as bID, bustable.SeatID as sID, bustable.StatusBustable,
                                timetable.TimetableID, timetable.Date, timetable.Time,
                                bus.BusID, bus.Numseat,
                                seat.SeatID, seat.SeatCost from bustable, timetable, bus, seat 
                                where bustable.TimetableID=timetable.TimetableID and bustable.BusID=bus.BusID and bustable.SeatID=seat.SeatID and bustable.TimetableID='$TimetableID' limit 1;";
                    $resultShowBustable = mysqli_query($connect, $sqlShowBustable);
                    if ($resultShowBustable == null) {
                        echo "คำสั่งผิด";
                    }

                    while ($recnumShowBustable = mysqli_fetch_array($resultShowBustable)) {
                    ?>
                        <thead>
                            <tr>
                                <th colspan="4" align="center">Date :&nbsp;&nbsp;<?php echo "$recnumShowBustable[Date]"; ?>&nbsp;&nbsp;
                                    Time :&nbsp;&nbsp;<?php echo "$recnumShowBustable[Time]"; ?>&nbsp;&nbsp;
                                    Bus :&nbsp;&nbsp;<?php echo "$recnumShowBustable[BusID]"; ?></th>
                            </tr>
                        </thead>

                        <?php $Date = "$recnumShowBustable[Date]";
                        $T = "$recnumShowBustable[Time]";
                        if ($T == '9.00 AM') {
                            $Time = "1";
                        } elseif ($T == '10.00 AM') {
                            $Time = "2";
                        }
                    }

                    $sqlShowSeat = "select * from bustable where TimetableID='$TimetableID'";
                    $resultShowSeat = mysqli_query($connect, $sqlShowSeat);
                    if ($resultShowSeat == null) {
                        echo "คำสั่งผิด";
                    }

                    $col = -1;
                    $row = 0;

                    while ($recnumShowSeat = mysqli_fetch_array($resultShowSeat)) {

                        $col++;

                        if ($col == '0') {
                        ?>
                            <tr>
                                <td height='40' width='13%' id='rowcol' class=<?php echo "$row$col";  ?> <?php

                                                                                                            if ($recnumShowSeat['statusBustable'] == '1') {
                                                                                                                echo "bgcolor='#CCCCCC'";
                                                                                                            }
                                                                                                            if ($recnumShowSeat['statusBustable'] == '2') {
                                                                                                                echo "bgcolor='#FFFF00'";
                                                                                                            }
                                                                                                            if ($recnumShowSeat['statusBustable'] == '3') {
                                                                                                                echo "bgcolor='#66FF99'";
                                                                                                            }

                                                                                                            ?>>
                                    <div id=<?php echo "rowcol$row$col"; ?> class='0'><?php
                                                                                        $sqlShowCustomer = "select booking.BookingID, booking.BookingStatus, customer.FName from booking, customer where booking.CustomerID=customer.CustomerID 
                                                                            and TimetableID='$TimetableID' and SeatID='$recnumShowSeat[SeatID]'";
                                                                                        $resultShowCustomer = mysqli_query($connect, $sqlShowCustomer);
                                                                                        if ($resultShowCustomer == null) {
                                                                                            echo "คำสั่งผิด";
                                                                                        }
                                                                                        while ($recnumShowCustomer = mysqli_fetch_array($resultShowCustomer)) {
                                                                                            if ($recnumShowCustomer['BookingStatus'] != '1') {
                                                                                                if ($recnumShowCustomer['BookingID'] != '') {
                                                                                                    echo "$recnumShowCustomer[FName]";
                                                                                                } else {
                                                                                                }
                                                                                            }
                                                                                        } ?>
                                        <br><?php
                                            $sqlShowBooking = "select * from booking where TimetableID='$TimetableID' and SeatID='$recnumShowSeat[SeatID]'";
                                            $resultShowBooking = mysqli_query($connect, $sqlShowBooking);
                                            if ($resultShowBooking == null) {
                                                echo "คำสั่งผิด";
                                            }
                                            while ($recnumShowBooking = mysqli_fetch_array($resultShowBooking)) {
                                                if ($recnumShowBooking['BookingStatus'] != '1') {
                                                    if ($recnumShowBooking['BookingID'] != '') {
                                                        echo "$recnumShowBooking[Destination]";
                                                    } else {
                                                    }
                                                }
                                            } ?>
                                        <br><b><?php echo $recnumShowSeat['SeatID'] ?></b></div>
                                </td>

                            <?php
                        }

                        if ($col == '1') {
                            ?>
                                <td class='border-0' height='50' width='8%'></td>

                                <td height='40' width='13%' id='rowcol' class=<?php echo "$row$col";  ?> <?php

                                                                                                            if ($recnumShowSeat['statusBustable'] == '1') {
                                                                                                                echo "bgcolor='#CCCCCC'";
                                                                                                            }
                                                                                                            if ($recnumShowSeat['statusBustable'] == '2') {
                                                                                                                echo "bgcolor='#FFFF00'";
                                                                                                            }
                                                                                                            if ($recnumShowSeat['statusBustable'] == '3') {
                                                                                                                echo "bgcolor='#66FF99'";
                                                                                                            }

                                                                                                            ?>>
                                    <div id=<?php echo "rowcol$row$col"; ?> class='2'><?php
                                                                                        $sqlShowCustomer = "select booking.BookingID, booking.BookingStatus, customer.FName from booking, customer where booking.CustomerID=customer.CustomerID 
                                                                            and TimetableID='$TimetableID' and SeatID='$recnumShowSeat[SeatID]'";
                                                                                        $resultShowCustomer = mysqli_query($connect, $sqlShowCustomer);
                                                                                        if ($resultShowCustomer == null) {
                                                                                            echo "คำสั่งผิด";
                                                                                        }
                                                                                        while ($recnumShowCustomer = mysqli_fetch_array($resultShowCustomer)) {
                                                                                            if ($recnumShowCustomer['BookingStatus'] != '1') {
                                                                                                if ($recnumShowCustomer['BookingID'] != '') {
                                                                                                    echo "$recnumShowCustomer[FName]";
                                                                                                } else {
                                                                                                }
                                                                                            }
                                                                                        } ?>
                                        <br><?php
                                            $sqlShowBooking = "select * from booking where TimetableID='$TimetableID' and SeatID='$recnumShowSeat[SeatID]'";
                                            $resultShowBooking = mysqli_query($connect, $sqlShowBooking);
                                            if ($resultShowBooking == null) {
                                                echo "คำสั่งผิด";
                                            }
                                            while ($recnumShowBooking = mysqli_fetch_array($resultShowBooking)) {
                                                if ($recnumShowBooking['BookingStatus'] != '1') {
                                                    if ($recnumShowBooking['BookingID'] != '') {
                                                        echo "$recnumShowBooking[Destination]";
                                                    } else {
                                                    }
                                                }
                                            } ?>
                                        <br><b><?php echo $recnumShowSeat['SeatID'] ?></b> </div>
                                </td>

                            <?php
                        }
                        if ($col == '2') {
                            ?>

                                <td height='40' width='13%' id='rowcol' class=<?php echo "$row$col";  ?> <?php

                                                                                                            if ($recnumShowSeat['statusBustable'] == '1') {
                                                                                                                echo "bgcolor='#CCCCCC'";
                                                                                                            }
                                                                                                            if ($recnumShowSeat['statusBustable'] == '2') {
                                                                                                                echo "bgcolor='#FFFF00'";
                                                                                                            }
                                                                                                            if ($recnumShowSeat['statusBustable'] == '3') {
                                                                                                                echo "bgcolor='#66FF99'";
                                                                                                            }

                                                                                                            ?>>
                                    <div id=<?php echo "rowcol$row$col"; ?> class='3'><?php
                                                                                        $sqlShowCustomer = "select booking.BookingID, booking.BookingStatus, customer.FName from booking, customer where booking.CustomerID=customer.CustomerID 
                                                                            and TimetableID='$TimetableID' and SeatID='$recnumShowSeat[SeatID]'";
                                                                                        $resultShowCustomer = mysqli_query($connect, $sqlShowCustomer);
                                                                                        if ($resultShowCustomer == null) {
                                                                                            echo "คำสั่งผิด";
                                                                                        }

                                                                                        while ($recnumShowCustomer = mysqli_fetch_array($resultShowCustomer)) {
                                                                                            if ($recnumShowCustomer['BookingStatus'] != '1') {
                                                                                                if ($recnumShowCustomer['BookingID'] != '') {
                                                                                                    echo "$recnumShowCustomer[FName]";
                                                                                                } else {
                                                                                                }
                                                                                            }
                                                                                        }
                                                                                        /*

                                                                                        $recnumShowCustomer = mysqli_fetch_array($resultShowCustomer);
                                                                                        if ($recnumShowCustomer['BookingStatus'] != '1') {
                                                                                            if ($recnumShowCustomer['BookingID'] != '' ) {
                                                                                                echo "$recnumShowCustomer[FName]";
                                                                                            } else {
                                                                                            }
                                                                                        } 
                                                                                        
                                                                                        */
                                                                                        ?>
                                        <br><?php
                                            $sqlShowBooking = "select * from booking where TimetableID='$TimetableID' and SeatID='$recnumShowSeat[SeatID]'";
                                            $resultShowBooking = mysqli_query($connect, $sqlShowBooking);
                                            if ($resultShowBooking == null) {
                                                echo "คำสั่งผิด";
                                            }
                                            //$recnumShowBooking = mysqli_fetch_array($resultShowBooking);
                                            while ($recnumShowBooking = mysqli_fetch_array($resultShowBooking)) {
                                                if ($recnumShowBooking['BookingStatus'] != '1') {
                                                    if ($recnumShowBooking['BookingID'] != '') {
                                                        echo "$recnumShowBooking[Destination]";
                                                    } else {
                                                    }
                                                }
                                            } ?>
                                        <br><b><?php echo $recnumShowSeat['SeatID'] ?></b></div>
                                </td>
                            </tr>
                    <?php
                            $col = -1;
                            $row++;
                        }
                    }
                    ?>
                </table>

                <input type="hidden" id='rowSeat' value=<?php echo $row; ?>>

                <form name="SelectSeat" action="AddUser.php" method='POST'>

                    <div class="form-group Button">
                        <br>
                        <!--<a class="btn btn-primary" href="SelectTimetable.php?Date=<?php echo "$Date"; ?>&Time=<?php echo "$Time"; ?>" role="button">
                    Back</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btn-primary">Next</button>-->
                        <input type="hidden" name="back" value="0">
                        <input type="hidden" name="TimetableID" value=<?php echo $TimetableID; ?>>

                        <table border='0' id='seatTable'>
                        </table>
                    </div>
                </form>
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