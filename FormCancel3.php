<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>FormCancel3</title>

</head>
<style>
    /* Create two equal columns that sits next to each other */
    .row {
        margin-left: 35%;
        padding-left: 4%;
        padding-Top: 1%;
        padding-bottom: 1%;
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
        margin-right: 200px;
        margin-left: 200px;
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
    <h5 align="center">ตรวจสอบลูกค้า</h5>
    <div class="table-style">
        <table class="table table-striped shadow-lg p-3 mb-5 bg-white rounded">
            <thead>
                <tr class="bg-info text-center ">
                    <th>ชื่อจริง</th>
                    <th>นามสกุล</th>
                    <th>เพศ</th>
                    <th>เบอร์โทร</th>
                    <th>อีเมล</th>
                </tr>
            </thead>

            <?php
            $CustomerID = $_REQUEST['CustomerID'];
            $Detail= $_REQUEST['Detail'];
            
            
            require("mysql/config.php");
            require("mysql/connect.php");
            $sqlShowCustomer = "select * from customer where CustomerID='$CustomerID'";
            $resultShowCustomer = mysqli_query($connect, $sqlShowCustomer);

            if ($resultShowCustomer == null) {
                echo "คำสั่งผิด";
            }

            while ($recnumShowCustomer = mysqli_fetch_array($resultShowCustomer)) {
                if ($recnumShowCustomer['Gender'] == '1') {
                    $Gender = 'ชาย';
                } else {
                    $Gender = 'หญิง';
                }
                $FName = $recnumShowCustomer['FName'];
                $LName = $recnumShowCustomer['LName'];
                $G = $recnumShowCustomer['Gender'];
                $Tel = $recnumShowCustomer['Tel'];
                $Email = $recnumShowCustomer['Email'];

                echo "<tbody>"; ?><tr class="bg-light text-center"><?php echo "
                        <td>$recnumShowCustomer[FName]</td>
                        <td>$recnumShowCustomer[LName]</td>
                        <td align='center'>$Gender</td>
                        <td align='center'>$recnumShowCustomer[Tel]</td>
                        <td align='center'>$recnumShowCustomer[Email]</td>"; ?>
                <?php "</tr><tbody>";
            }
                ?>
        </table>
        <div class="col-md-15 text-center">
            <a class="btn btn-primary" href="FormCancel2.php?FName=<?php echo$FName;?>&LName=<?php echo$LName;?>&Gender=<?php echo$G;?>&Tel=<?php echo$Tel;?>&Email=<?php echo$Email;?>&Detail=<?php echo$Detail;?>" role="button">ย้อนกลับ</a>
        </div>



    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>