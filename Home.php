<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <title>Home</title>
  <style>
    .form-container {
      background: #fff;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0px 0px 10px 0px #000;
      margin-left: 320px;
      margin-top: 120px;
    }

    .nav-inverse {
      background-color: transparent;
      border-color: transparent;
    }

    body {
      background-image: url("images/bus.jpg");
      background-repeat: no-repeat;
      background-size: auto;
    }

    .button {
      display: flex;
      align-items: center;
      justify-content: center;
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
  <form name='Bus' action="SelectTimetable.php" method="post">
    <div class="row justify-content-left ">
      <div class="form-container">
        <div class="form-group">
          <p class="text-center font-weight-bold" style="font-size: 20px;">ค้นหาเที่ยวรถ</p>
          <label>วันที่เดินทาง :</label>
          <input type="date" class="form-control" name="Date">
        </div>
        <!--<div class="form-group">
                <label>จุดหมายปลายทาง :</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div> -->
        <div class="form-group">
          <label>เที่ยวรถ :</label>
          <select class="form-control " name='Time'>
            <option value='' selected>กรุณาเลือกเที่ยวรถ</option>
            <option value='1'>9.00 AM</option>
            <option value='2'>10.00 AM</option>
          </select>
        </div>
        <div class="button">
          <button type="submit" class="btn btn-primary">ค้นหา</button>
        </div>
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