<html>
  <head>
   <meta charset=UTF-8>
  </head>
  </body>
<?php
  require("mysql/config.php");
  require("mysql/connect.php");
  $LocationID = $_REQUEST['LocationID'];

  $sql = "delete from location where LocationID='$LocationID'";
  $result = mysqli_query($connect,$sql);
?>

<script>
  alert('ลบข้อมูลให้เรียบร้อยแล้ว');
  window.open('Main_Location.php','_self');

  
</script>
</body>
</html>