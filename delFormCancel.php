<html>
  <head>
   <meta charset=UTF-8>
  </head>
  </body>
<?php
  require("mysql/config.php");
  require("mysql/connect.php");
  $BookingID = $_REQUEST['BookingID'];
  $FormID = $_REQUEST['FormID'];

  //echo "$BookingID $FormID";

  $sql = "delete from form where FormID='$FormID'";
  $result = mysqli_query($connect,$sql);
?>

<script>
  alert('ปฏิเสธขอยกเลิกที่นั่งให้เรียบร้อยแล้ว');
  window.open('Main_CancelSeat.php?','_self');


</script>

</body>
</html>