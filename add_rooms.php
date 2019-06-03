<?php
//include 'components/session.php';
include 'dbconnection.php';
session_start();
if(!(isset($_SESSION['userid']))){
    header('location:index.php');
}
$id=$_SESSION['userid'];
include 'components/nav/owner_header.php';
?>

<div class="events-coming">
		<h3 class="tittle_w3_agileinfo cen"> Our Events Coming Soon
		</h3>
		<div class="inner_sec_info_w3layouts">
			<div class="content">
				<div class="simply-countdown-custom" id="simply-countdown-custom"></div>
			</div>
		</div>
</div>

<div class="container">
<style>
.container{
	margin-top:5%;
	width:30%;
}
</style>
  <h2>Add Rooms</h2>
  <form action="room_add.php" method="post" enctype="multipart/form-data">
  <table border="1" align="center">
    <div class="form-group">
      <label for="roomtype">Room Type:</label>
      <select class="form-control" name="room" id="room" required="required">
                                        <?php
                                        $con = mysqli_connect("localhost", "root", "", "oldage");
                                        if (!$con) {
                                            echo "Could not connect..Try again";
                                        } else {
                                            $sql = "Select room_id,room_type from tbl_rooms where status=1";
                                            $result = mysqli_query($con, $sql);
                                            echo "<option value =><------Select room-----></option>";
                                            while ($row = mysqli_fetch_array($result)) {
                                                $rnme = $row['room_type'];
                                                $id = $row['room_id'];
                                                echo "<option value='$id'>$rnme</option>";
                                            }
                                        }
                                        mysqli_close($con);
                                        ?>
                                    </select>
                                    <script>
$("body").on("change", "#room", function () {
                                                    //selected type
                                            $type = $(this).val();
                                            //ajax - get the price
                                            $.ajax({
                                            url: 'components/datach.php',
                                            method: 'POST',
                                            data: {'room': $type, "status": "1"},
                                            success: function (data)
                                            {
//                                                 console.log(data);
                                                $("#rent").val(data);
                                            }
                                            });
                                           


                                    });

									</script>

    </div>
    <div class="form-group">
      <label for="nr">Number of Rooms:</label>
      <input type="text" class="form-control"  placeholder="Number of Rooms" name="noroom">
    </div>
	<div class="form-group">
      <label for="rr">Room Rent:</label>
      <input type="text" class="form-control" id="rent" placeholder="Enter Amount" name="roomrent">
    </div>
	<div class="form-group">
      <label for="rp">Upload Photo:</label>
      <input type="file" class="form-control"  name="img" id="image">
    </div>
    <button type="submit" name="submit" class="btn btn-default">Add</button>
	</table>
  </form>
</div>


<?php
include 'components/footer.php';
?>


