<?php
//include 'components/session.php';
include 'dbconnection.php';
session_start();
if(!(isset($_SESSION['userid']))){
    header('location:index.php');
}
$id=$_SESSION['userid'];
//print_r($id);
include 'components/nav/user_header.php';
?>
<head>
  <style>
    th{
      width:auto;
      padding-left: 22px;
    }
    .button{
      width:auto;
    color:white;
    background-color:green;
    font-size: 16px;
    }
  </style>
</head>

<table class="table" style="width:auto">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">AadhaarNumber</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
  <?php

    $sql1="SELECT book_id FROM `tbl_book` WHERE lid='$id'";
    $dataSql=mysqli_query($con,$sql1);
    while($ree=mysqli_fetch_array($dataSql)){
      $bid=$_ree['book_id'];
      //echo $res['bid'];
    }
    //print_r($bid);


 $sql="SELECT * FROM `tbl_inmate_reg` WHERE lid='$id' and status='approved' or status='booked'";
 //print_r($sql);
  $data=mysqli_query($con,$sql);
  while($res=mysqli_fetch_array($data)){
  ?>
    <tr>
      <td><?php echo $res['name'];?> </td>
      <td><?php echo $res['address'];?></td>
      <td><?php echo $res['aadharno'];?></td>
      <td><?php echo $res['status'];?></td>
      <!-- <td><button class="button" type="submit" name="submit">Book</button></td> -->
     <td> <?php if($res['status']=='approved'){ ?>
						<a class="btn btn-primary btn-lg scroll" data-toggle="modal" data-target="#myModal1" class="button" href="#">Book Now </a>
				<?php
     }
     else{
       ?>
       <a class="btn btn-primary btn-lg scroll" class="button" href="payment.php?biid=<?php echo $res['id'];?>">Payment</a>
<?php
     }
        ?>
          </td>
    </tr>
    <?php
  }
  ?>
  </tbody>
</table>

<?php
$sql="SELECT * FROM `tbl_inmate_reg` WHERE lid='$id'";
$result=mysqli_query($con,$sql) or die(mysqli_error($con));

while ($row=mysqli_fetch_array($result))
{
	$nme=$row['name']; 
	$ag=$row['age'];
  $addr=$row['address'];
  $oid=$row['o_id'];
}

?>

<!-- Modal1 -->
<div class="modal fade" id="myModal1" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header book-form">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4>Booking Form</h4>
					<form action="booking.php" method="post">
          <input type="hidden" name="oid" value="<?php echo $oid; ?>">
						<label>NAME</label><input type="text" name="name" value="<?php echo $nme;?>" readonly>
						<label>AGE</label><input type="text" name="age" value="<?php echo $ag;?>" reaonly>
						<label>ARRIVAL DATE</label><input type="date" name="arrival_dte" placeholder="arrival date">
						<label>ROOM TYPE</label>
                                <select class="form-control" name="room" id="room" required="required">
                                        <?php
                                        $con = mysqli_connect("localhost", "root", "", "oldage");
                                        if (!$con) {
                                            echo "Could not connect..Try again";
                                        } else {
                                          $sql="SELECT * FROM tbl_rooms as rt ,tbl_room as p WHERE rt.room_id = p.room_typeid and p.lid ='$oid'";
                                            $result = mysqli_query($con, $sql);
                                            echo "<option value =><------Select room-----></option>";
                                            while ($row = mysqli_fetch_array($result)) {
                                                $rnme = $row['room_type'];
                                                $id = $row['room_typeid'];
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
                                            //alert($type);
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


						<label>RENT</label><input type="text" name="rent" id="rent" class="rent" readonly/>
						<input type="submit" name="submit" value="Book Now">
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- //Modal1 -->


<?php
include 'components/footer.php';
?>