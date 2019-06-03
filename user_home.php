<?php
//include 'components/session.php';
include 'dbconnection.php';
session_start();
if(!(isset($_SESSION['userid']))){
    header('location:index.php');
}
$id=$_SESSION['userid'];
include 'components/nav/user_header.php';
?>
<!--/last-->
	<div class="banner_bottom">
		<div class="container">
<!--			<h3 class="tittle_w3_agileinfo">Welcome you to Relief
			</h3>-->
			<div class="inner_sec_info_w3layouts">
				<div class="last_sec">
					<div class="col-md-6 last-img-info-text">
						<h4>Welcome you to Relief </h4>
						<p>These hands dosen't want walking stick<br>
                                                    All they need is your lovable heart and caring hand.
						</p>
<form method="get" action="view.php">
                        <select name="oldname" id="oname" required>
                    <?php
                    $con = mysqli_connect("localhost", "root", "", "oldage");
                    if (!$con) {
                        echo 'could not connect....Try again!';
                    } else {
                        $sql = "select o_id, location from tbl_owner where status=1";
                        $result = mysqli_query($con, $sql);
                        echo "<option value=><--Choose your Prefeered Relief centers--></option>";
                        while ($row = mysqli_fetch_array($result)) {
                            $loc = $row['location'];
                            $oid = $row['o_id'];
                            echo "<option value='$oid'>$loc</option>";
                        }
                    }
                    mysqli_close($con);
                    ?>
                    </select>
<?php 

?>


                    <div class="ab_button">
							<input type="submit" class="btn btn-primary btn-lg" value="View More info" >
						
							<!-- <a class="btn btn-primary btn-lg" href="inmate_reg.php" role="button">Register Your Inmate</a> -->
						</div>
					</div>
</form>

					
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!--//last-->

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
                                                    <i class="fas fa-quote-left"></i> I'm impressed by this website.
                                                It's a clean and simple website.
                                            This site help us to find a suitable and comfortable old age home for our inmates</p>
                                                <h6>Mery Sara</h6>
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
                                                    <i class="fas fa-quote-left"></i>Simple and Impressive website .
                                                Easy to handle and responsive one.This site meets the coustomer needs I like this website Very much</p>
                                                <h6>James Thomas</h6>
                                            </div>
                                        </div>
                                    </blockquote>
                                </div>
                                <!-- Quote 3 -->
                                
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

