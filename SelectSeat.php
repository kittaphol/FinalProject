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

                        if (cBgColor == '#00CCFF') {
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

    <title>Home</title>
    <style>
       
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
            top: 23%;
            right: 8%;

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
            <a class="p-2 text-dark" href="Home.php">หน้าหลัก</a>
            <a class="p-2 text-dark" href="FormCancel.php">ขอยกเลิกที่นั่ง</a>
            <a class="p-2 text-dark" href="#">วิธีการซื้อตั๋วรถทัวร์</a>
            <a class="p-2 text-dark" href="#">ติดต่อเรา</a>
        </nav>
        <a class="btn btn-outline-primary" href="Login.php">Sign up</a>
    </div>
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
            <a class="btn btn-primary" href="SelectTimetable.php?Date=<?php echo "$Date"; ?>&Time=<?php echo "$Time"; ?>" role="button">
                ย้อนกลับ</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            
            <button type="submit" class="btn btn-primary">ถัดไป</button>
            <input type="hidden" name="back" value="0">
            <input type="hidden" name="TimetableID" value=<?php echo $TimetableID; ?>>

            <table border='0' id='seatTable'>
            </table>
        </div>
    </form>









































    <!--
    <table border='0' align="center" style="width:50%">
    <tr>
        <td height="50" width="15%" bgcolor="#CCCCCC">กฤตพล<br>KL<br>1A</td>
        <td height="50" width="8%"></td>
        <td height="50" width="15%" bgcolor="#CCCCCC"><br><br>1B</td> 
        <td height="50" width="15%" bgcolor="#CCCCCC"><br><br>1C</td>
    </tr>
    <tr>
        <td bgcolor="#CCCCCC"><br><br>2A</td>
        <td></td>
        <td bgcolor="#CCCCCC"><br><br>2B</td>
        <td bgcolor="#CCCCCC"><br><br>2C</td>
    </tr>
    <tr>
        <td bgcolor="#CCCCCC"><br><br>3A</td>
        <td></td>
        <td bgcolor="#CCCCCC"><br><br>3B</td>
        <td bgcolor="#CCCCCC"><br><br>3C</td>
    </tr>
    <tr>
        <td bgcolor="#CCCCCC"><br><br>4A</td>
        <td></td>
        <td bgcolor="#CCCCCC"><br><br>4B</td>
        <td bgcolor="#CCCCCC"><br><br>4C</td>
    </tr>
    <tr>
        <td bgcolor="#CCCCCC"><br><br>5A</td>
        <td></td>
        <td bgcolor="#CCCCCC"><br><br>5B</td>
        <td bgcolor="#CCCCCC"><br><br>5C</td>
    </tr>
    <tr>
        <td bgcolor="#CCCCCC"><br><br>6A</td>
        <td></td>
        <td bgcolor="#CCCCCC"><br><br>6B</td>
        <td bgcolor="#CCCCCC"><br><br>6C</td>
    </tr>
    <tr>
        <td bgcolor="#CCCCCC"><br><br>7A</td>
        <td></td>
        <td bgcolor="#CCCCCC"><br><br>7B</td>
        <td bgcolor="#CCCCCC"><br><br>7C</td>
    </tr>
    <tr>
        <td bgcolor="#CCCCCC"><br><br>8A</td>
        <td></td>
        <td bgcolor="#CCCCCC"><br><br>8B</td>
        <td bgcolor="#CCCCCC"><br><br>8C</td>
    </tr>
    <tr>
        <td bgcolor="#CCCCCC"><br><br>9A</td>
        <td></td>
        <td bgcolor="#CCCCCC"><br><br>9B</td>
        <td bgcolor="#CCCCCC"><br><br>9C</td>
    </tr>
    <tr>
        <td bgcolor="#CCCCCC"><br><br>10</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    </table>
    -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>