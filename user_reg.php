<?php
include 'components/header.php';
?>
<!--/price-->

<div class="price-sec" id="price">
    <div class="container">
        <h3 class="tittle_w3_agileinfo"></h3>
        <div class="inner_sec_info_w3layouts">
            <div class="col-md-4 last-img-info-text">
                <h4>Become a Guardian</h4>
                <p>The secret of genius is to carry the spirit of the child into old age, which means never losing your enthusiasm.The value of old age depends upon the person who reaches it. To some men of early performance it is useless. To others, who are late to develop, it just enables them to finish the job.
                </p>
            </div>
            <div class="col-md-8 price-grid-main">
                <div class="price-info">
                    <div class="prices">
                        <div class="prices-top">
                            <div class="dodecagon s1">
                                <div class="dodecagon-in s1">
                                    <div class="dodecagon-bg s1">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="prices-bottom">
                            <div class="prices-h">
                                <h4>JUST LOOK</h4>

                            </div>
                            <ul>
                                <li> Elders above the age group of 50 are normally admitted </li>
                                <li>Aged persons of both sexes are admitted </li>
                                <li>Couples are provided with separate apartments with all facilities along with a kitchen
                                    in our couple’s cottage. </li>
                                <li>Relatives are allowed to see the elders at any time. They are not allowed to stay in
                                    their room under any circumstances</li>
                                <li class="dash">-</li>
                            </ul>
                            <a href="#" data-toggle="modal" data-target="#myModal1" class="button">Let's Join</a>
                        </div>
                    </div>
                </div>
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
                <h4>Sign up Form</h4>
                <form name="userform" action="register.php" onsubmit="return" class="oh-autoval-form" method="post">
                    <input type="text" name="name" id="name" class="av-name" av-message="Minimum 3 characters and alphabets only" placeholder="Your Name" required="" />
                    <!-- <input type="text" name="address" placeholder="Your Address" required="" /> -->
                    <textarea name="address" id="address" placeholder="Your Address" required=""></textarea>
                    <input type="text" name="phone" class="av-mobile verify-u" av-message="Must contain 10 Digits (Does't contain alphabets) "  placeholder="Your Mobile Number" required="" />
                    <input type="text" class="av-name" av-message="Min. 3 characters and alphabets only" name="occupation" placeholder="Your Occupation" required="" />
                    
                    <input type="email" name="email" class="av-email verify-u" av-message="Please provide a valid email address (example@example.com)" placeholder="Email" required="" />
                    <input type="password" name="cpass" id="cpass" class="av-password" av-message="Password must contain uppercase,lowercase,special chars,digits and minimum 6 chars." placeholder="Password" required="" />
                    <input type="password" name="cconpass" id="cconpass" placeholder="Confirm Password" required="" />
                    <div class="check-box">
                        <input name="chekbox" type="checkbox" id="brand" value="">
                        <label for="brand">
                            <span></span>Remember Me.</label>
                    </div>
                    <!-- <input type="submit" value="Sign Up" value="u_register"> -->
                    <button type="submit" name="submit" value="u_register">Sign Up</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- //Modal1 -->

<script  language="javascript" type="text/javascript">
    var password = document.getElementById("cpass")
            , confirm_password = document.getElementById("cconpass");

    function validatePassword() {
        if (password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Doesn't Match");
        } else {
            confirm_password.setCustomValidity('');
        }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
</script>
<script>
$(".av-email.verify-u").on("blur", function(){

$email = $(this).val();

//server
$.ajax({
    url:'mailalrdy.php',
    data:{'email':$email},
    method:'post',
    success:function(data){
        if(data){

        }else{
            //email already exists
            alert("Email Already Exists");
            $(".av-email.verify-u").val('');
        }
    }
});
});

</script>
<script>
$(".av-mobile.verify-u").on("blur", function(){

$num = $(this).val();

//server
$.ajax({
    url:'phnalrdy.php',
    data:{'num':$num},
    method:'post',
    success:function(data){
        if(data){

        }else{
            //email already exists
            alert("phone number Already Exists");
            $(".av-mobile.verify-u").val('');
        }
    }
});
});
jQuery(document).ready(function () {
                                        jQuery('#name').keyup(function () {
                                            var str = jQuery('#name').val();


                                            var spart = str.split(" ");
                                            for (var i = 0; i < spart.length; i++) {
                                                var j = spart[i].charAt(0).toUpperCase();
                                                spart[i] = j + spart[i].substr(1);
                                            }
                                            jQuery('#name').val(spart.join(" "));

                                        });
                                    });
                                    jQuery(document).ready(function () {
                                        jQuery('#address').keyup(function () {
                                            var str = jQuery('#address').val();


                                            var spart = str.split(" ");
                                            for (var i = 0; i < spart.length; i++) {
                                                var j = spart[i].charAt(0).toUpperCase();
                                                spart[i] = j + spart[i].substr(1);
                                            }
                                            jQuery('#address').val(spart.join(" "));

                                        });
                                    });

</script>


<?php
include 'components/footer.php';
?>
    