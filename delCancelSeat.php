<html>
  <head>
   <meta charset=UTF-8>
  </head>
  </body>
<?php
  require("mysql/config.php");
  require("mysql/connect.php");
  $BookingID = $_REQUEST['BookingID'];
  $TimetableID = $_REQUEST['TimetableID'];

  //echo "$BookingID $TimetableID";

  $select = "select SeatID from booking where BookingID='$BookingID'";
  $resselect = mysqli_query($connect,$select);
  while($row=mysqli_fetch_array($resselect)){

    $sql = "update bustable set StatusBustable='1' where SeatID ='$row[SeatID]' and TimetableID='$TimetableID'";
    $result = mysqli_query($connect,$sql);

  }
  $sql2 = "update booking set BookingStatus='1' where BookingID='$BookingID'";
  $result2 = mysqli_query($connect,$sql2);
?>

<script>
  alert('ลบข้อมูลให้เรียบร้อยแล้ว');
  window.open('Main_CheckSeat3.php?TimetableID=<?php echo $TimetableID ?>','_self');


</script>

</body>
</html>