<?php
//include 'components/session.php';
include 'dbconnection.php';
session_start();
if(isset($_SESSION['o_iid']))
{
	$oid = $_SESSION['o_iid'];
	
}

if(!(isset($_SESSION['userid']))){
    header('location:index.php');
}

$id=$_SESSION['userid'];

include 'components/nav/user_header.php';

$res="SELECT * FROM `tbl_inmate_reg` WHERE lid=";


$sql="SELECT * FROM `tbl_inmate_reg` WHERE lid='$id'";
$result=mysqli_query($con,$sql) or die(mysqli_error($con));

while ($row=mysqli_fetch_array($result))
{
	$nme=$row['name']; 
	$ag=$row['age'];
	$addr=$row['address'];
}

?>

<br><br>
	<!--/price-->
	<div class="price-sec" id="price">
		<div class="container">
			<h3 class="tittle_w3_agileinfo"><b><i><font color="orange">"Bring harmony to your family"</font></i></b><div class="ab_button">
						<a class="btn btn-primary btn-lg scroll" data-toggle="modal" data-target="#myModal1" class="button" href="#">Book Now </a>
					</div></h3>
			<div class="inner_sec_info_w3layouts">
				<div class="col-md-4 last-img-info-text">
					<h4>Health & Safty</h4>
					<p>"The happiest moments of my life have been the few which i have passed at home in the bosome of my family.
					 Those who deny freedom to others do not deserve it themselves".
					</p>
					<!-- <div class="ab_button">
						<a class="btn btn-primary btn-lg scroll" data-toggle="modal" data-target="#myModal1" class="button" href="#">Book Now </a>
					</div> -->
				</div>
				<div class="col-md-4 last-img-info-text">
					<h4>Food & Treatment</h4>
					<p>Pellentesque convallis diam consequat magna vulputate malesuada. Cras a ornare elit. Nulla viverra pharetra sem, eget
						pulvinar neque pharetra ac. Lorem Ipsum convallis diam consequat magna vulputate malesuada. Cras a ornare elit. Nulla
						viverra pharetra sem, eget pulvinar neque pharetra ac.
					</p>
					<!-- <div class="ab_button">
						<a class="btn btn-primary btn-lg scroll" data-toggle="modal" data-target="#myModal1" class="button" href="#">Book Now </a>
					</div> -->
				</div>
				<div class="col-md-4 last-img-info-text">
					<h4>Become a Guardian</h4>
					<p>Pellentesque convallis diam consequat magna vulputate malesuada. Cras a ornare elit. Nulla viverra pharetra sem, eget
						pulvinar neque pharetra ac. Lorem Ipsum convallis diam consequat magna vulputate malesuada. Cras a ornare elit. Nulla
						viverra pharetra sem, eget pulvinar neque pharetra ac.
					</p>
					<!-- <div class="ab_button">
						<a class="btn btn-primary btn-lg scroll" data-toggle="modal" data-target="#myModal1" class="button" href="#">Book Now </a>
					</div> -->
				</div>
				<div class="col-md-8 price-grid-main">
					
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--//price-->
	<!-- Modal1 -->
	<div class="modal fade" id="myModal1" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header book-form">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4>Booking Form</h4>
					<form action="booking.php" method="post">
						<label>NAME</label><input type="text" name="name" value="<?php echo $nme;?>" readonly>
						<label>AGE</label><input type="text" name="age" value="<?php echo $ag;?>" reaonly>
						<label>ARRIVAL DATE</label><input type="date" name="arrival_dte" min="2019-05-16" max="2019-07-30" placeholder="arrival date">
						<label>ROOM TYPE</label>
                                <select class="form-control" name="room" id="room" required="required">
                                        <?php
                                        $con = mysqli_connect("localhost", "root", "", "oldage");
                                        if (!$con) {
                                            echo "Could not connect..Try again";
                                        } else {
                                            $sql1="SELECT * FROM tbl_rooms as tr ,tbl_room as p WHERE tr.room_id = p.room_type and p.lid ='$id'";
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


						<label>RENT</label><input type="text" name="rent" id="rent" class="rent" readonly/>
						<input type="submit" name="submit" value="Book Now">
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- //Modal1 -->
	<!--/testimonials-->
	<div class="tesimonials" id="test">
		<div class="container">
			<h3 class="tittle_w3_agileinfo cen">Testimonials</h3>
			<div class="inner_sec">
				<div class="test_grid_sec">
					<div class="col-md-offset-2 col-md-8">
						<div class="carousel slide two" data-ride="carousel" id="quote-carousel">
							<!-- Bottom Carousel Indicators -->
							<ol class="carousel-indicators two">
								<li data-target="#quote-carousel" data-slide-to="0" class="active"></li>
								<li data-target="#quote-carousel" data-slide-to="1"></li>
								<li data-target="#quote-carousel" data-slide-to="2"></li>
							</ol>

							<!-- Carousel Slides / Quotes -->
							<div class="carousel-inner">

								<!-- Quote 1 -->
								<div class="item active">
									<blockquote>
										<div class="test_grid">
											<div class="col-sm-3 text-center test_img">
												<div class="dodecagon c1">
													<div class="dodecagon-in c1">
														<div class="dodecagon-bg c1">

														</div>
													</div>
												</div>
											</div>
											<div class="col-sm-9 test_img_info">
												<p>
													<i class="fas fa-quote-left"></i> Maecenas quis neque libero. Class aptent taciti.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
													Etiam auctor nec lacus ut tempor. Mauris.</p>
												<h6>Sara Lisbon</h6>
											</div>
										</div>
									</blockquote>
								</div>
								<!-- Quote 2 -->
								<div class="item">
									<blockquote>
										<div class="test_grid">
											<div class="col-sm-3 text-center test_img">
												<div class="dodecagon c2">
													<div class="dodecagon-in c2">
														<div class="dodecagon-bg c2">

														</div>
													</div>
												</div>
											</div>
											<div class="col-sm-9 test_img_info">
												<p>
													<i class="fas fa-quote-left"></i> Lorem ipsum dolor sit amet. Class aptent taciti.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
													Etiam auctor nec lacus ut tempor. Mauris.</p>
												<h6>Jane Wearne</h6>
											</div>
										</div>
									</blockquote>
								</div>
								<!-- Quote 3 -->
								<div class="item">
									<blockquote>
										<div class="test_grid">
											<div class="col-sm-3 text-center test_img">
												<div class="dodecagon c3">
													<div class="dodecagon-in c3">
														<div class="dodecagon-bg c3">

														</div>
													</div>
												</div>
											</div>
											<div class="col-sm-9 test_img_info">
												<p>
													<i class="fas fa-quote-left"></i> Maecenas quis neque libero. Class aptent taciti.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
													Etiam auctor nec lacus ut tempor. Mauris.</p>
												<h6>Alice Williams</h6>
											</div>
										</div>
									</blockquote>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--//testimonials-->


<?php
include 'components/footer.php';
?>