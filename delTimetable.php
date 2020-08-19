<html>
  <head>
   <meta charset=UTF-8>
  </head>
  </body>
<?php
  require("mysql/config.php");
  require("mysql/connect.php");
  $TimetableID = $_REQUEST['TimetableID'];

  $sql1 = "delete from bustable where TimetableID='$TimetableID'";
  $result1 = mysqli_query($connect,$sql1);

  $sql2 = "delete from Timetable where TimetableID='$TimetableID'";
  $result2 = mysqli_query($connect,$sql2);
?>

<script>
  alert('ลบข้อมูลให้เรียบร้อยแล้ว');
  window.open('Main_Timetable.php','_self');

  
</script>
</body>
</html>