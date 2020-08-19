<html>
  <head>
   <meta charset=UTF-8>
  </head>
  </body>
<?php
  require("mysql/config.php");
  require("mysql/connect.php");
  $BusID = $_REQUEST['BusID'];
  $sql = "delete from BusSeat where BusID='$BusID'";
  $sql1 = "delete from Bus where BusID='$BusID'";
  $result = mysqli_query($connect,$sql);
  $result1 = mysqli_query($connect,$sql1);
?>

<script>
  alert('ลบข้อมูลให้เรียบร้อยแล้ว');
  window.open('Main_Bus.php','_self');

  
</script>
</body>
</html>