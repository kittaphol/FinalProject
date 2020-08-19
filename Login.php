
<?php
session_start();
if(!empty($_SESSION['type']))
{
    if($_SESSION['type'] == 'student')
    {
	echo "<script>window.open('#','_self');</script>";
    }
    if($_SESSION['type'] == 'admin')
    {
        echo "<script>window.open('#','_self');</script>";
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
     
    <title>Log in</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <style>
      .login-container{
        margin-top: 8%;
        margin-bottom: 5%;
          
      }
      .login-form-1{
        padding: 5%;
        box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
        background-color: white;
      }
      .login-form-1 h3{
        text-align: center;
        color: #333;
      }
      .login-container form{
        padding: 10%;
        color: aqua;
      }
      .btnSubmit{
        width: 50%;
        border-radius: 1rem;
        padding: 1.5%;
        border: none;
        cursor: pointer;
      }
      .login-form-1 .btn{
        font-weight: 600;
        color: #fff;
        background-color: #0062cc;
      }           
      </style>
<script>
function chkdata()
    {
      if(document.login.username.value.trim() == "")
		   {
			   alert('กรุณาระบุชื่อผู้ใช้งาน');
			   document.login.username.focus();
			   return false;
		   }
		   if(document.login.password.value.trim() == "")
		   {
			   alert('กรุณาระบุรหัสผ่าน');
			   document.login.password.focus();
			   return false;
		   }
    }
</script>
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

   <div class="container login-container" align = 'center'>
            <div>
                <div class="col-md-6 login-form-1">
                    <h3>เข้าสู่ระบบเจ้าของบริษัท</h3>
                    <form name="login" action="Checklogin.php" method="post" onsubmit="return chkdata()">
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" placeholder="ชื่อผู้ใช้งาน" value="" />
                        </div>
                        <div class="form-group">
                            <input type="password" name = "password" class="form-control" placeholder="รหัสผ่าน" value="" />
                        </div>
                        <br>
                        <div class="form-group">
                            <a class="btn btn-primary" href="Home.php" role="button">Back</a>&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="submit" class="btn" value="Login" />
                        </div>
                    </form>
                </div>
            
        </div>
      </div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>