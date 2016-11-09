<?php
@session_start();
?>
<html lang="en">
<head>
  <title>Gallery - Gallery Page | Design Company - Free Website Template from Templatemonster.com</title>
  <meta charset="utf-8">
  <LINK REL="SHORTCUT ICON" HREF="images/favicon.ico">
  <link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
  <link rel="stylesheet" href="css/custom.css" type="text/css" media="all">
  <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
  <script type="text/javascript" src="js/jquery-1.4.2.min.js" ></script>
  <script type="text/javascript" src="js/cufon-yui.js"></script>
  <script type="text/javascript" src="js/Humanst521_BT_400.font.js"></script>
  <script type="text/javascript" src="js/Humanst521_Lt_BT_400.font.js"></script>
  <script type="text/javascript" src="js/cufon-replace.js"></script>
	<script type="text/javascript" src="js/roundabout.js"></script>
  <script type="text/javascript" src="js/roundabout_shapes.js"></script>
  <script type="text/javascript" src="js/gallery_init.js"></script>
  <script type="text/javascript" src="js/loopedslider.min.js"></script>
  
  
   
  <script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
		<script type="text/javascript">
			$(function() {
    			$('a[rel*=leanModal]').leanModal({ top : 200, overlay : 0.4, closeButton: ".modal_close" });		
			});
		</script>
		
  
  
  <script type="text/javascript">
		$(function(){
			// Option set as a global variable
			$('#loopedSlider').loopedSlider({
				container: ".wrap",
				containerClick: false
			});
		});
	</script>
	
	
	
	<script type="text/javascript" src="js/jssor.core.js"></script>
    <script type="text/javascript" src="js/jssor.utils.js"></script>
    <script type="text/javascript" src="js/jssor.slider.js"></script>
    <script>
        jQuery(document).ready(function ($) {
            var options = {
                $AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                $AutoPlayInterval: 4000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $PauseOnHover: 3,                                   //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, default value is 3

                $ArrowKeyNavigation: true,   			            //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
                $SlideDuration: 800,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide , default value is 20
                //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
                //$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
                $SlideSpacing: 0, 					                //[Optional] Space between each slide in pixels, default value is 0
                $DisplayPieces: 1,                                  //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
                $ParkingPosition: 0,                                //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
                $UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, direction navigator container, thumbnail navigator container etc).
                $PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, default value is 1
                $DragOrientation: 1,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)

                $DirectionNavigatorOptions: {                       //[Optional] Options to specify and enable direction navigator or not
                    $Class: $JssorDirectionNavigator$,              //[Requried] Class to create direction navigator instance
                    $ChanceToShow: 1,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $AutoCenter: 2,                                 //[Optional] Auto center arrows in parent container, 0 No, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                    $Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
                },

                $ThumbnailNavigatorOptions: {
                    $Class: $JssorThumbnailNavigator$,              //[Required] Class to create thumbnail navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always

                    $ActionMode: 1,                                 //[Optional] 0 None, 1 act by click, 2 act by mouse hover, 3 both, default value is 1
                    $AutoCenter: 0,                                 //[Optional] Auto center thumbnail items in the thumbnail navigator container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 3
                    $Lanes: 1,                                      //[Optional] Specify lanes to arrange thumbnails, default value is 1
                    $SpacingX: 3,                                   //[Optional] Horizontal space between each thumbnail in pixel, default value is 0
                    $SpacingY: 3,                                   //[Optional] Vertical space between each thumbnail in pixel, default value is 0
                    $DisplayPieces: 9,                              //[Optional] Number of pieces to display, default value is 1
                    $ParkingPosition: 260,                          //[Optional] The offset position to park thumbnail
                    $Orientation: 1,                                //[Optional] Orientation to arrange thumbnails, 1 horizental, 2 vertical, default value is 1
                    $DisableDrag: false                            //[Optional] Disable drag or not, default value is false
                }
            };

            var jssor_slider1 = new $JssorSlider$("slider1_container", options);

            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizes
            function ScaleSlider() {
                var bodyWidth = document.body.clientWidth;
                if (bodyWidth)
                    jssor_slider1.$SetScaleWidth(Math.min(bodyWidth, 1050));
                else
                    window.setTimeout(ScaleSlider, 30);
            }

            ScaleSlider();

            if (!navigator.userAgent.match(/(iPhone|iPod|iPad|BlackBerry|IEMobile)/)) {
                $(window).bind('resize', ScaleSlider);
            }
            //responsive code end
        });
    </script>
  <!--[if lt IE 7]>
  	<link rel="stylesheet" href="css/ie/ie6.css" type="text/css" media="all">
  <![endif]-->
  <!--[if lt IE 9]>
  	<script type="text/javascript" src="js/html5.js"></script>
    <script type="text/javascript" src="js/IE9.js"></script>
  <![endif]-->
</head>

<body>
  <!-- header -->
  <header>
    <div class="container">
    	<h1><a href="index.php">Shop Company</a></h1>
      <nav>
        <ul>
			<li><a href="index.php"><div class="top-info">Home</div></a></li>
			<?
			$signed=$_SESSION["signin"];
			$nameuser=$_SESSION["username"];
			if ($signed=="yes")
			echo "<li ><a id='go' rel='leanModal' href='#'><div class='top-info'>Hi $nameuser</div></a></li>
					<li><a id='go' name='logout' href='logout.php'><div class='top-info'>Logout</div></a></li>";
			else 
			echo "<li><a id='go' rel='leanModal' name='signin' href='#signin'><div class='top-info'>Sign In</div></a></li>
					<li><a id='go' rel='leanModal' name='signup' href='#signup'><div class='top-info'>Register</div></a></li>";
			?>
			<li><a href="category.php"><div class="top-info">Category</div></a></li>
			<li><a href="#"  class="current"><div class="top-info">Products</div></a></li>
			<li><a href="contacts.php"><div class="top-info">Contact</div></a></li>
        </ul>
      </nav>
    </div>
	</header>
  <!-- #gallery -->
  
 
  <!-- /#gallery -->
 
  
<!--pop up register -->
  
  <div id="signup" style="display: none;position: absolute; opacity: 1; z-index: 11000; left: 50%; margin-top: -150px; top: 50px;">
			
			<div id="signup-ct">
				<div id="signup-header">
					<h2>Create a new account</h2>
					<p>It's simple, and free.</p>
					<a class="modal_close" href="#"></a>
				</div>
				
				<form action="register.php" method=post>
     
					
					<div class="txt-fld" >
					<label for="">Name</label>
				    <input id="" name="name" type="text">
					</div>
					
					<div class="txt-fld" style="float:right;">
					<label for="">Category</label>
				    <input id="" name="categ" type="text">
					</div>
					
					<div class="txt-fld" >
					<label for="">Address</label>
				    <input id="" name="addr" type="text">
					</div>
					
					<div class="txt-fld" style="float:right;">
					<label for="">Phone</label>
				    <input id="" name="phone" type="text">
					</div>
					
					<div class="txt-fld" >
					<label for="">Email</label>
				    <input id="" name="email" type="email">
					</div>
					
					<div class="txt-fld" style="float:bottom;">
					<label for="">Username</label>
				    <input id=""  name="user" type="text">
					</div>
					
					<div class="txt-fld" style="float:left;">
					<label for="">Password</label>
				    <input id="" name="pass" type="password">
					</div>
					
					
					<div class="txt-fld" style="float:right;">
					<label for="">Confirm Password</label>
				    <input id="" name="cpass" type="password">
					</div>
					
					<div style="float:bottom;margin-top: 20px; color: #222;" >
					
					<label >Duration : </label><input type="radio" name="R1" value="1" checked id="m1"><label for="m1">1 Month</label>  <input type="radio" name="R1" value="3" id="m2"><label for="m2">3 Months</label>  <input type="radio" name="R1" value="6" id="m3"><label for="m3">6 Months</label>    <input type="radio" name="R1" value="12" id="m4"><label for="m4">1 Year</label></br>
					
					</div>
					
					<div class="btn-fld" style="float:right;">
					 <button type="submit">Register !</button>
					</div>
					
					
				 </form>
			</div>
			
		</div>
  
  


<div id="signin" style="display: none;position: absolute; opacity: 1; z-index: 11000; left: 50%;  top: 50px;">
			
			<div id="signup-ct">
				<div id="signin-header">
					<h2>Sign In !</h2>
					<a class="modal_close" href="#"></a>
				</div>
				
				<form action="login_php.php" method=post>
     
					
					
					<div class="txt-fld" style="float:bottom;">
					<label for="">Username</label>
				    <input id="" class="good_input" name="user" type="text">
					</div>
					
					<div class="txt-fld">
					<label for="">Password</label>
				    <input id="" name="pass" type="password">
					</div>
					
					
					<div class="btn-fld">
					 <button type="submit">Sign In !</button>
					</div>
					
					
				 </form>
			</div>
			
		</div>
		
		 <div class="container2" style="padding:15 200 35 200;">
		 <fieldset style="border: 2px #f1f1f1 solid;">
		 <div id="lh-col">
                <form method="post" id="contacts-form" name="order" action="" accept-charset="utf-8">
                

<input type="hidden" name="ioBlackbox" id="ioBlackbox" autocomplete="off" value="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">

                <input type="hidden" name="session_id" id="session_id" value="4L535414ae1d9ff78" autocomplete="off">
                    <fieldset>
                        <legend><a href="http://www.safecart.com/about/" target="_blank" onclick="wopen(this.href,800,500);event.returnValue=false; return false;" id="sc" title="About SafeCart™ (new window)" tabindex="-1"><img src="/images/logo.jpg" alt="SafeCart™" width="158" height="52"></a> </legend>


                        <div class="left-shadow" style="background-image:url(/images/left-shadow.gif); background-repeat:no-repeat; background-position:bottom left; padding-right:5px;">
                            <ul id="safecart-tab-bar" class="tabs">
                                <li><a href="/remosoft/rs-omr/?name=&amp;email=&amp;country=SY&amp;postal_zip=&amp;sku%5B0%5D=remosoft-omr%2Frsomr&amp;sku%5B1%5D=remosoft-fshred%2Ffsupsell&amp;x=87&amp;y=8&amp;rw_s0=." title="Credit card" id="tab-credit-cards" class="active" tabindex="-1">Credit card</a></li>
                                                                <li><a href="/remosoft/rs-omr/?name=&amp;email=&amp;country=SY&amp;postal_zip=&amp;method=paypal&amp;sku%5B0%5D=remosoft-omr%2Frsomr&amp;sku%5B1%5D=remosoft-fshred%2Ffsupsell&amp;x=87&amp;y=8&amp;rw_s0=." title="Paypal Express Checkout" id="pp" tabindex="-1"><img src="/images/paypal.png" alt="or PayPal" border="0"></a></li>
                            </ul>

                        <div class="box" style="margin:36px 0px 5px 5px;">
                        <div id="Iname" class="field" >
                            <label for="name">Cardholder name:</label>
                            <input type="text" maxlength="100" id="name" name="name" value="" autocomplete="off">
                        </div>
                        <div id="Iemail" class="field" >
                            <label for="email">E-mail address:</label>
                            <input type="text" maxlength="100" id="email" name="email" value="" autocomplete="off">
                        </div>

                        <!-- Credit card section -->
                        <div id="form_section_credit_card" class="field" >
                        <div id="Icc_num" >
                            <label for="cc_num">Card number:</label>
                            <input type="text" maxlength="20" id="cc_num" name="cc_num" value="" autocomplete="off">
                        </div>
                        <div class="field" ><img src="/images/cards.gif" name="cc_type" id="cc_type" alt="Card type" width="192" height="22"></div>
                        <div id="Icc_month" class="field" >
                            <label for="cc_month">Expiry date:</label>

                            <select name="cc_month" id="cc_month" autocomplete="off">
                                <option value="">&nbsp;</option>
                                                                <option value="1">
                                    01 </option>
                                                                <option value="2">
                                    02 </option>
                                                                <option value="3">
                                    03 </option>
                                                                <option value="4">
                                    04 </option>
                                                                <option value="5">
                                    05 </option>
                                                                <option value="6">
                                    06 </option>
                                                                <option value="7">
                                    07 </option>
                                                                <option value="8">
                                    08 </option>
                                                                <option value="9">
                                    09 </option>
                                                                <option value="10">
                                    10 </option>
                                                                <option value="11">
                                    11 </option>
                                                                <option value="12">
                                    12 </option>
                                                                                            </select>

                            <span id="Icc_year">
                            <select name="cc_year" id="cc_year" autocomplete="off">
                                <option value=""></option>
                                                                <option value="2014">2014</option>
                                                                <option value="2015">2015</option>
                                                                <option value="2016">2016</option>
                                                                <option value="2017">2017</option>
                                                                <option value="2018">2018</option>
                                                                <option value="2019">2019</option>
                                                                <option value="2020">2020</option>
                                                                <option value="2021">2021</option>
                                                                <option value="2022">2022</option>
                                                                <option value="2023">2023</option>
                                                                <option value="2024">2024</option>
                                


                            </select>
                            </span>



                        </div>
                        <div id="Icc_cvc" class="field" >
                            <label for="cc_cvc">Card validation code:</label>
                            <input type="text" maxlength="100" id="cc_cvc" name="cc_cvc" value="" autocomplete="off">
                            <a href="/cvc_help" id="cvc" target="_blank" tabindex="-1">what's this?</a>
                            <div id="cvc_help">
                                <table style="width:330px; text-align:center; border:1px solid #ccc;">
                                    <tbody><tr>
                                     <td style="margin:0px; padding:0px;"><h6>American Express</h6></td>
                                     <td style="margin:0px; padding:0px;"><h6>Visa, Mastercard,
                                Discover</h6></td>
                                   </tr>
                                   <tr>
                                     <td style="margin:0px; padding:0px;"><img src="/images/cvc-1.jpg" alt="American Express"></td>
                                     <td style="margin:0px; padding:0px;"><img src="/images/cvc-2.jpg" alt="Visa, Mastercard, Discover"></td>
                                     </tr>
                                   <tr>
                                     <td style="margin:0px; padding:0px;"><h6>4 Digit Verification
                                Code</h6></td>
                                     <td style="margin:0px; padding:0px;"><h6>3 Digit Verification
                                Code</h6></td>
                                   </tr>
                                </tbody></table>
</div>
                        </div>
                    </div> <!-- Credit Card block -->

                    <!-- DIRECTeBanking account information -->
                    <div id="form_section_deb" style="display:none;" class="field" >
                        <div id="Ideb_bankcode" class="">
                            <label for="deb_bankcode">Bank Code:</label>
                            <input type="text" maxlength="20" id="deb_bankcode" name="deb_bankcode" value="" autocomplete="off">
                        </div>
                        <div id="Ideb_accountnum" class="">
                            <label for="deb_accountnum">Account Number:</label>
                            <input type="text" maxlength="20" id="deb_accountnum" name="deb_accountnum" value="" autocomplete="off">
                        </div>
                    </div>

                    <!-- Remaining general information -->
                        <div id="Icountry" class="field" >
                            <label for="country">Country:</label>
                                                        <select name="country" id="country" autocomplete="off">
<option label="Afghanistan" value="AF">Afghanistan</option>
<option label="Albania" value="AL">Albania</option>
<option label="Algeria" value="DZ">Algeria</option>
<option label="American Samoa" value="AS">American Samoa</option>
<option label="Andorra" value="AD">Andorra</option>
<option label="Angola" value="AO">Angola</option>
<option label="Antigua And Barbuda" value="AG">Antigua And Barbuda</option>
<option label="Argentina" value="AR">Argentina</option>
<option label="Armenia" value="AM">Armenia</option>
<option label="Australia" value="AU">Australia</option>
<option label="Austria" value="AT">Austria</option>
<option label="Azerbaijan" value="AZ">Azerbaijan</option>
<option label="Bahamas" value="BS">Bahamas</option>
<option label="Bahrain" value="BH">Bahrain</option>
<option label="Bangladesh" value="BD">Bangladesh</option>
<option label="Barbados" value="BB">Barbados</option>
<option label="Belarus" value="BY">Belarus</option>
<option label="Belgium" value="BE">Belgium</option>
<option label="Belize" value="BZ">Belize</option>
<option label="Benin" value="BJ">Benin</option>
<option label="Bermuda" value="BM">Bermuda</option>
<option label="Bhutan" value="BT">Bhutan</option>
<option label="Bolivia" value="BO">Bolivia</option>
<option label="Bosnia And Herzegovina" value="BA">Bosnia And Herzegovina</option>
<option label="Botswana" value="BW">Botswana</option>
<option label="Brazil" value="BR">Brazil</option>
<option label="Brunei Darussalam" value="BN">Brunei Darussalam</option>
<option label="Bulgaria" value="BG">Bulgaria</option>
<option label="Burkina Faso" value="BF">Burkina Faso</option>
<option label="Burundi" value="BI">Burundi</option>
<option label="Cambodia" value="KH">Cambodia</option>
<option label="Cameroon" value="CM">Cameroon</option>
<option label="Canada" value="CA">Canada</option>
<option label="Cape Verde" value="CV">Cape Verde</option>
<option label="Cayman Islands" value="KY">Cayman Islands</option>
<option label="Central African Republic" value="CF">Central African Republic</option>
<option label="Chad" value="TD">Chad</option>
<option label="Chile" value="CL">Chile</option>
<option label="China" value="CN">China</option>
<option label="Colombia" value="CO">Colombia</option>
<option label="Comoros" value="KM">Comoros</option>
<option label="Congo (DC)" value="CD">Congo (DC)</option>
<option label="Congo (R)" value="CG">Congo (R)</option>
<option label="Cook Islands" value="CK">Cook Islands</option>
<option label="Costa Rica" value="CR">Costa Rica</option>
<option label="Croatia" value="HR">Croatia</option>
<option label="Cuba" value="CU">Cuba</option>
<option label="Cyprus" value="CY">Cyprus</option>
<option label="Czech Republic" value="CZ">Czech Republic</option>
<option label="Denmark" value="DK">Denmark</option>
<option label="Djibouti" value="DJ">Djibouti</option>
<option label="Dominica" value="DM">Dominica</option>
<option label="Dominican Republic" value="DO">Dominican Republic</option>
<option label="East Timor" value="TL">East Timor</option>
<option label="Ecuador" value="EC">Ecuador</option>
<option label="Egypt" value="EG">Egypt</option>
<option label="El Salvador" value="SV">El Salvador</option>
<option label="Equatorial Guinea" value="GQ">Equatorial Guinea</option>
<option label="Eritrea" value="ER">Eritrea</option>
<option label="Estonia" value="EE">Estonia</option>
<option label="Ethiopia" value="ET">Ethiopia</option>
<option label="Falkland Islands" value="FK">Falkland Islands</option>
<option label="Faroe Islands" value="FO">Faroe Islands</option>
<option label="Fiji" value="FJ">Fiji</option>
<option label="Finland" value="FI">Finland</option>
<option label="France" value="FR">France</option>
<option label="French Polynesia" value="PF">French Polynesia</option>
<option label="Gabon" value="GA">Gabon</option>
<option label="Gambia" value="GM">Gambia</option>
<option label="Georgia" value="GE">Georgia</option>
<option label="Germany" value="DE">Germany</option>
<option label="Ghana" value="GH">Ghana</option>
<option label="Gibraltar" value="GI">Gibraltar</option>
<option label="Greece" value="GR">Greece</option>
<option label="Greenland" value="GL">Greenland</option>
<option label="Grenada" value="GD">Grenada</option>
<option label="Guadeloupe" value="GP">Guadeloupe</option>
<option label="Guam" value="GU">Guam</option>
<option label="Guatemala" value="GT">Guatemala</option>
<option label="Guinea" value="GN">Guinea</option>
<option label="Guinea-bissau" value="GW">Guinea-bissau</option>
<option label="Guyana" value="GY">Guyana</option>
<option label="Haiti" value="HT">Haiti</option>
<option label="Holy See" value="VA">Holy See</option>
<option label="Honduras" value="HN">Honduras</option>
<option label="Hong Kong" value="HK">Hong Kong</option>
<option label="Hungary" value="HU">Hungary</option>
<option label="Iceland" value="IS">Iceland</option>
<option label="India" value="IN">India</option>
<option label="Indonesia" value="ID">Indonesia</option>
<option label="Iran" value="IR">Iran</option>
<option label="Iraq" value="IQ">Iraq</option>
<option label="Ireland" value="IE">Ireland</option>
<option label="Israel" value="IL">Israel</option>
<option label="Italy" value="IT">Italy</option>
<option label="Ivory coast" value="CI">Ivory coast</option>
<option label="Jamaica" value="JM">Jamaica</option>
<option label="Japan" value="JP">Japan</option>
<option label="Jordan" value="JO">Jordan</option>
<option label="Kazakhstan" value="KZ">Kazakhstan</option>
<option label="Kenya" value="KE">Kenya</option>
<option label="Kiribati" value="KI">Kiribati</option>
<option label="Kuwait" value="KW">Kuwait</option>
<option label="Kyrgyzstan" value="KG">Kyrgyzstan</option>
<option label="Laos" value="LA">Laos</option>
<option label="Latvia" value="LV">Latvia</option>
<option label="Lebanon" value="LB">Lebanon</option>
<option label="Lesotho" value="LS">Lesotho</option>
<option label="Liberia" value="LR">Liberia</option>
<option label="Liechtenstein" value="LI">Liechtenstein</option>
<option label="Lithuania" value="LT">Lithuania</option>
<option label="Luxembourg" value="LU">Luxembourg</option>
<option label="Lybia" value="LY">Lybia</option>
<option label="Macao" value="MO">Macao</option>
<option label="Macedonia" value="MK">Macedonia</option>
<option label="Madagascar" value="MG">Madagascar</option>
<option label="Malawi" value="MW">Malawi</option>
<option label="Malaysia" value="MY">Malaysia</option>
<option label="Maldives" value="MV">Maldives</option>
<option label="Mali" value="ML">Mali</option>
<option label="Malta" value="MT">Malta</option>
<option label="Martinique" value="MQ">Martinique</option>
<option label="Mauritania" value="MR">Mauritania</option>
<option label="Mauritius" value="MU">Mauritius</option>
<option label="Mexico" value="MX">Mexico</option>
<option label="Moldova" value="MD">Moldova</option>
<option label="Monaco" value="MC">Monaco</option>
<option label="Mongolia" value="MN">Mongolia</option>
<option label="Montenegro" value="ME">Montenegro</option>
<option label="Montserrat" value="MS">Montserrat</option>
<option label="Morocco" value="MA">Morocco</option>
<option label="Mozambique" value="MZ">Mozambique</option>
<option label="Myanmar" value="MM">Myanmar</option>
<option label="Namibia" value="NA">Namibia</option>
<option label="Nauru" value="NR">Nauru</option>
<option label="Nepal" value="NP">Nepal</option>
<option label="Netherlands" value="NL">Netherlands</option>
<option label="Netherlands Antilles" value="AN">Netherlands Antilles</option>
<option label="New Caledonia" value="NC">New Caledonia</option>
<option label="New Zealand" value="NZ">New Zealand</option>
<option label="Nicaragua" value="NI">Nicaragua</option>
<option label="Niger" value="NE">Niger</option>
<option label="Nigeria" value="NG">Nigeria</option>
<option label="North Korea" value="KP">North Korea</option>
<option label="Northern Mariana Islands" value="MP">Northern Mariana Islands</option>
<option label="Norway" value="NO">Norway</option>
<option label="Oman" value="OM">Oman</option>
<option label="Pakistan" value="PK">Pakistan</option>
<option label="Palau" value="PW">Palau</option>
<option label="Palestine" value="PS">Palestine</option>
<option label="Panama" value="PA">Panama</option>
<option label="Papua New Guinea" value="PG">Papua New Guinea</option>
<option label="Paraguay" value="PY">Paraguay</option>
<option label="Peru" value="PE">Peru</option>
<option label="Philippines" value="PH">Philippines</option>
<option label="Poland" value="PL">Poland</option>
<option label="Portugal" value="PT">Portugal</option>
<option label="Puerto Rico" value="PR">Puerto Rico</option>
<option label="Qatar" value="QA">Qatar</option>
<option label="Reunion" value="RE">Reunion</option>
<option label="Romania" value="RO">Romania</option>
<option label="Russian Federation" value="RU">Russian Federation</option>
<option label="Rwanda" value="RW">Rwanda</option>
<option label="Samoa" value="WS">Samoa</option>
<option label="San Marino" value="SM">San Marino</option>
<option label="Sao Tome And Principe" value="ST">Sao Tome And Principe</option>
<option label="Saudi Arabia" value="SA">Saudi Arabia</option>
<option label="Senegal" value="SN">Senegal</option>
<option label="Serbia" value="RS">Serbia</option>
<option label="Seychelles" value="SC">Seychelles</option>
<option label="Sierra Leone" value="SL">Sierra Leone</option>
<option label="Singapore" value="SG">Singapore</option>
<option label="Slovakia" value="SK">Slovakia</option>
<option label="Slovenia" value="SI">Slovenia</option>
<option label="Solomon Islands" value="SB">Solomon Islands</option>
<option label="Somalia" value="SO">Somalia</option>
<option label="South Africa" value="ZA">South Africa</option>
<option label="South Korea" value="KR">South Korea</option>
<option label="Spain" value="ES">Spain</option>
<option label="Sri Lanka" value="LK">Sri Lanka</option>
<option label="St Vincent And The Grenadines" value="VC">St Vincent And The Grenadines</option>
<option label="Sudan" value="SD">Sudan</option>
<option label="Suriname" value="SR">Suriname</option>
<option label="Swaziland" value="SZ">Swaziland</option>
<option label="Sweden" value="SE">Sweden</option>
<option label="Switzerland" value="CH">Switzerland</option>
<option label="Syria" value="SY" selected="selected">Syria</option>
<option label="Taiwan" value="TW">Taiwan</option>
<option label="Tajikistan" value="TJ">Tajikistan</option>
<option label="Tanzania" value="TZ">Tanzania</option>
<option label="Thailand" value="TH">Thailand</option>
<option label="Togo" value="TG">Togo</option>
<option label="Tonga" value="TO">Tonga</option>
<option label="Trinidad And Tobago" value="TT">Trinidad And Tobago</option>
<option label="Tunisia" value="TN">Tunisia</option>
<option label="Turkey" value="TR">Turkey</option>
<option label="Turkmenistan" value="TM">Turkmenistan</option>
<option label="Tuvalu" value="TV">Tuvalu</option>
<option label="Uganda" value="UG">Uganda</option>
<option label="Ukraine" value="UA">Ukraine</option>
<option label="United Arab Emirates" value="AE">United Arab Emirates</option>
<option label="United Kingdom" value="GB">United Kingdom</option>
<option label="United States" value="US">United States</option>
<option label="Uruguay" value="UY">Uruguay</option>
<option label="Uzbekistan" value="UZ">Uzbekistan</option>
<option label="Vanuatu" value="VU">Vanuatu</option>
<option label="Venezuela" value="VE">Venezuela</option>
<option label="Vietnam" value="VN">Vietnam</option>
<option label="Virgin Islands, British" value="VG">Virgin Islands, British</option>
<option label="Virgin Islands, U.S." value="VI">Virgin Islands, U.S.</option>
<option label="Yemen" value="YE">Yemen</option>
<option label="Zambia" value="ZM">Zambia</option>
<option label="Zimbabwe" value="ZW">Zimbabwe</option>
                                                        </select>

                        </div>
                        <div id="Ipostal_zip" class="field" >
                            <label for="postal_zip" id="l_postal_zip"> Postal code:</label>
                            <input name="postal_zip" id="postal_zip" value="" autocomplete="off">
                        </div>
                        <div id="alert"><ul id="errorMsgs" style="display: none;"></ul>
                            
                        </div>
                                                <div id="submit" class="field" >
                            <label for="purchase" id="status">&nbsp;</label>
                            <input type="submit" id="purchase" class="pending" name="purchase" value="Process Order" autocomplete="off">

                        </div>
                                                </div>
                        </div>
                                                <div id="security">


                                <p>SafeCart® does not store Credit Card numbers or share personal information with third parties.</p>
                                <div style="text-align: right;">
                                <div style="float:right;">
                                <a href="http://www.truste.org/ivalidate.php?url=www.safecart.com&amp;sealid=101" title="Click to Verify" target="_blank" onclick="wopen(this.href,800,600);event.returnValue=false; return false;" tabindex="-1"><img width="159" height="54" src="/images/truste.gif" alt="TRUSTe"></a>
                                </div>
                                <!-- Begin DigiCert/ClickID site seal HTML and JavaScript -->
                                <div id="DigiCertClickID_IMLTs3Ds" style="float:right">
                                <div id="DigiCertClickID_IMLTs3DsSeal" style="text-decoration: none; text-align: center; display: block; vertical-align: baseline; font-size: 100%; font-style: normal; text-indent: 0px; line-height: 1; width: auto; margin: 0px auto; padding: 0px; border: 0px; background-color: transparent; position: relative; top: 0px; right: 0px; bottom: 0px; left: 0px; clear: both; float: none; cursor: default; background-position: initial initial; background-repeat: initial initial;"><img src="//seal.digicert.com/seals/cascade/?s=IMLTs3Ds,10,m,safecart.com" alt="DigiCert Seal" style="text-decoration: none; text-align: center; display: block; vertical-align: baseline; font-size: 100%; font-style: normal; text-indent: 0px; line-height: 1; width: auto; margin: 0px auto; padding: 0px; border: 0px; background-color: transparent; position: relative; top: 0px; right: 0px; bottom: 0px; left: 0px; clear: both; float: none; cursor: pointer; background-position: initial initial; background-repeat: initial initial;"></div></div>
                                
                                <script type="text/javascript">
                                var __dcid = __dcid || [];__dcid.push(["DigiCertClickID_IMLTs3Ds", "10", "m", "black", "IMLTs3Ds"]);(function(){var cid=document.createElement("script");cid.type="text/javascript";cid.async=true;cid.src=("https:" === document.location.protocol ? "https://" : "http://")+"seal.digicert.com/seals/cascade/seal.min.js";var s = document.getElementsByTagName("script");var ls = s[(s.length - 1)];ls.parentNode.insertBefore(cid, ls.nextSibling);}());
                                </script><script type="text/javascript" async="" src="https://seal.digicert.com/seals/cascade/seal.min.js"></script>
                                
                                <!-- End DigiCert/ClickID site seal HTML and JavaScript -->
                            </div>
                        </div>
                    </fieldset>
                        <input type="hidden" name="rw_spid" value="" autocomplete="off">
                      <input type="hidden" name="rw_method" id="rw_method" value="" autocomplete="off">
                </form>
            </div>
			</fieldset>
		 </div>
<div class="clear"></div>
</div>

  
  

  
  <!-- footer -->
  <footer>
    <div class="container">
    	<div class="wrapper">
        <div class="fleft">Copyright - Type in your name here</div>
        <div class="fright">Website template designed by <a href="http://www.templatemonster.com/" target="_blank" rel="nofollow">www.templatemonster.com</a>&nbsp; &nbsp; |&nbsp; &nbsp; 3D Models provided by <a href="http://www.templates.com/product/3d-models/" target="_blank" rel="nofollow">www.templates.com</a></div>
      </div>
    </div>
  </footer>
  <script type="text/javascript"> Cufon.now(); </script>
</body>
</html>
