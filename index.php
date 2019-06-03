<?php 
session_start();
if(isset($_SESSION['userid'])){

    include 'dbconnection.php';
    $uid = $_SESSION['userid'];
    $sql = "SELECT `role` FROM `tbl_login` WHERE `lid` = '$uid'";
    $res = mysqli_query($con, $sql);

    $role = mysqli_fetch_assoc($res)['role'];

    switch ($role) {
        case  1:
            header('location:user_home.php');
            break;
        case  2:
            header('location:staff-home.php');
            break;
            case  3:
            header('location:owner_main_home.php');
            break;
        default:
            # code...
            break;
    }
}
?>

<?php
include 'components/header.php';
?>

<div class="banner_top">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1" class=""></li>
            <li data-target="#myCarousel" data-slide-to="2" class=""></li>
            <li data-target="#myCarousel" data-slide-to="3" class=""></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <div class="container">
                    <div class="carousel-caption">
                        <h3>Change Begins With You.</h3>
                    </div>
                </div>
            </div>
            <div class="item item2">
                <div class="container">
                    <div class="carousel-caption">
                        <h3>Make good things happen</h3>
                    </div>
                </div>
            </div>
            <div class="item item3">
                <div class="container">
                    <div class="carousel-caption">
                        <h3>Change Begins With You.</h3>
                    </div>
                </div>
            </div>
            <div class="item item4">
                <div class="container">
                    <div class="carousel-caption">

                        <h3>Make good things happen</h3>
                    </div>
                </div>
            </div>
        </div>
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="fa fa-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="fa fa-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        <!-- The Modal -->
    </div>
</div>

<div class="banner_bottom donate-log">
    <div class="donate-inner">
        <div class="col-md-4 donate-f-login">
            <style>
                .blink{
                    width:265px;
                    height: 65px;
                    border-radius: 50px;
                    background-color: #e4eae7;
                    padding: 15px;  
                    text-align: center;
                    line-height: 40px;
                    margin-bottom: -17.3em;
                }
                span{
                    font-size: 25px;
                    font-family: cursive;
                    color: #ff4c00;
                    animation: blink 1s linear infinite;
                }
               /* @keyframes blink{
                0%{opacity: 0;}
                50%{opacity: .5;}
                100%{opacity: 1;}
                }*/
            </style>
            <div class="blink"><span></span></div>
            <div class="donate-log-in book-form">

                <form action="login.php" onsubmit="return" class="oh-autoval-form" method="post">
                    <input type="email" name="email"  class="email" placeholder="Your Email" required="" />
                    <input type="password" name="password"  placeholder="Your Password" required="" />
                    <div class="check-box two">
                        <input name="chekbox" type="checkbox" id="brand1" value="">
                        <label for="brand1">
                            <span></span>Remember Me.</label>
                    </div>
                    <!-- <input type="submit"name="submit" value="Sign In"><br> -->
                    <button type="submit" name="submit" value="log">Login Now</button> 
                    <!--  <label>Don't have an account?</label><a href="index.php">Register Now!</a> -->
                    <label>Forgot Password?</label><a href="forgot_password.php">Click here</a>
                </form>
            </div>
        </div>
        <div class="col-md-8 donate-info">
            <h4>Leave us a Message</h4>
            <p>The secret of genius is to carry the spirit of the child into old age, which means never losing your enthusiasm.
                Cherish all your happy moments; they make a fine cushion for old age.</p>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!--/gallery-->


<!--/ab-->
<div class="banner_bottom" id="about">
    <div class="container">
        <h3 class="tittle_w3_agileinfo">About Our Relief</h3>
        <div class="inner_sec_info_w3layouts">
            <div class="help_full">
                <ul class="rslides" id="slider4">
                    <li>
                        <div class="respon_info_img">
                            <img src="styles/images/gfv.png" class="img-responsive" alt="Relief">
                        </div>
                        <div class="banner_bottom_left">
                            <h4>Lexuary Life</h4>

                            <p>We provide a luxuary life for your inmates.It is generally associated with high prices and exclusivity. We provide.
                                Some people think happiness is a luxury, but it's a necessity. 
                                You need to make space for it in your life.Luxury must be comfortable, 
                                otherwise it is not luxury.</p>
                        </div>
                    </li>
                    <li>
                        <div class="respon_info_img">
                            <img src="styles/images/tro.png" class="img-responsive" alt="Relief">
                        </div>
                        <div class="banner_bottom_left">
                            <h4>Physical,Psychological,Spiritual Support</h4>

                            <p>The emotional and physical needs of those who help others are often forgotten during crisis. They may not consider their own needs, or they may simply be too occupied with other responsibilities to handle personal or family needs.</p>
                            <p>Psychosocial support can include mental health counseling, education, spiritual support, group support, and many other such services. These services are usually provided by mental health professionals, such as psychologists, social workers, counselors, specialized nurses, clergy, pastoral counselors, and others.</p>
                        </div>
                    </li>
                    <li>
                        <div class="respon_info_img">
                            <img src="styles/images/ytfp.png" class="img-responsive" alt="Relief">
                        </div>
                        <div class="banner_bottom_left">
                            <h4>Patient and Family Support</h4>
                            <p>The Patient and Family Support Program offers services to help with emotional, social and financial support, rehabilitation, and clinical nutrition. For Odette patients, or their family members, these services are part of your care before, during, and after treatment.</p>
                            <p>Patient and Family Support Services can help you in a variety of ways. We provide support groups and services for women living with breast cancer and their families. We can also help you locate complementary services such as a massage therapy, Reiki, and meditation.</p>
                        </div>
                    </li>
                    <li>
                        <div class="respon_info_img">
                            <img src="styles/images/gyv.png" class="img-responsive" alt="Relief">
                        </div>
                        <div class="banner_bottom_left">
                            <h4>Provide Treatment</h4>
                            <p>Throughout your care, everyone caring for you should communicate with you honestly and compassionately. You should always be treated with kindness, dignity and respect, and feel supported.

                                Having a number of specialists involved in your care at different times (and possibly at different locations) helps you get the very best care, but can be hard at times. Some patients find it frustrating or upsetting to have to repeat their story to new doctors.</p>
                        </div>
                    </li>
                </ul> 
            </div>
        </div>
        
    </div>
</div>
<!--//ab-->


    <!--/what-->
    <div class="works" id="service">
        <div class="container">
            <h3 class="tittle_w3_agileinfo cen">Why Choose Us</h3>
            <div class="inner_sec_info_w3layouts">
                <div class="ser-first">
                    <div class="col-md-3 ser-first-grid text-center">
                        <div class="dodecagon">
                            <div class="dodecagon-in">
                                <div class="dodecagon-bg">
                                    <span class="far fa-edit" aria-hidden="true"></span>
                                </div>
                            </div>
                        </div>
                        <h3>Food Delivering</h3>
                        <!-- <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p> -->
                    </div>
                    <div class="col-md-3 ser-first-grid text-center">
                        <div class="dodecagon">
                            <div class="dodecagon-in">
                                <div class="dodecagon-bg">
                                    <span class="far fa-paper-plane" aria-hidden="true"></span>
                                </div>
                            </div>
                        </div>
                        <h3>Volunteer</h3>
                        <!-- <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p> -->
                    </div>
                    <div class="col-md-3 ser-first-grid text-center">
                        <div class="dodecagon">
                            <div class="dodecagon-in">
                                <div class="dodecagon-bg">
                                    <span class="far fa-star" aria-hidden="true"></span>
                                </div>
                            </div>
                        </div>
                        <h3>Donation</h3>
                       <!--  <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p> -->
                    </div>
                    <div class="col-md-3 ser-first-grid text-center">
                        <div class="dodecagon">
                            <div class="dodecagon-in">
                                <div class="dodecagon-bg">
                                    <span class="far fa-user" aria-hidden="true"></span>
                                </div>
                            </div>
                        </div>
                        <h3>Charity</h3>
                        <!-- <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p> -->
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>

        </div>
    </div>

<!-- /newsletter-->
    <div class="newsletter">
        <div class="col-sm-6 newsleft">
            <h3>Sign up for Newsletter !</h3>
        </div>
        <div class="col-sm-6 newsright">
            <form action="#" method="post">
                <input type="email" placeholder="Enter your email..." name="email" required="">
                <input type="submit" value="Submit">
            </form>
        </div>

        <div class="clearfix"></div>
    </div>
    <!-- //newsletter-->

<?php
include 'components/footer.php';
?>