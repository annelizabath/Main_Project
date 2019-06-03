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

<br><br><br><br>

<div class="events-coming">
		<h3 class="tittle_w3_agileinfo cen"> Our Events Coming Soon
		</h3>
		<div class="inner_sec_info_w3layouts">
			<div class="content">
				<div class="simply-countdown-custom" id="simply-countdown-custom"></div>
			</div>
		</div>
	</div>
	<div class="banner_bottom">
		<div class="container">
			<h3 class="tittle_w3_agileinfo"> Our Causes
			</h3>
			<div class="inner_sec_info_w3layouts">
				<div class="last_sec">
					<div class="col-md-6 last-img-info-text">
						<h4>The causes title goes here </h4>
						<p>One of the factors that make old age homes attractive to elders is the companionship. 
						They are in constant company of people their own age. If their children are away from home, 
						they have to live alone and that can cause stress and depression. Living in an old age home 
						may give rise to feelings of abandonment as well..
						</p>
						<!-- <div class="ab_button">
							<a class="btn btn-primary btn-lg" href="single.html" role="button">Read More </a>
						</div> -->
					</div>
					<!-- <div class="col-md-6 last-img-info_main">
						<div class="col-md-6 last-img-info">
							<div class="dodecagon l1">
								<div class="dodecagon-in l1">
									<div class="dodecagon-bg l1">

									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 last-img-info">
							<div class="dodecagon l2">
								<div class="dodecagon-in l2">
									<div class="dodecagon-bg l2">

									</div>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
					</div> -->
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>



<?php
include 'components/footer.php';
?>