<html>
  <head>
   <meta charset=UTF-8>
  </head>
  </body>
<?php
  require("mysql/config.php");
  require("mysql/connect.php");
  $SeatID = $_REQUEST['SeatID'];
  $sql = "delete from Seat where SeatID='$SeatID'";
  $result = mysqli_query($connect,$sql);
?>

<script>
  alert('ลบข้อมูลให้เรียบร้อยแล้ว');
  window.open('Main_Seat.php','_self');

  
</script>
</body>
</html>