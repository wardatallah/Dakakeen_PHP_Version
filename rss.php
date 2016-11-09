<?php
@session_start();

if ($_SESSION["signin"]=="yes"){
if ($_SESSION["isAdmin"]=="yes"){
require_once("config.php");
$conn = mysql_connect(HOST,USERNAME,PASSWORD);
mysql_select_db(DATABASE_NAME,$conn);

$id=$_SESSION["a"];
$sql = "SELECT count(done) FROM adminmsgs where done=1";

$result = mysql_query($sql, $conn);
		
$row = mysql_fetch_array($result, MYSQL_NUM);
		
$unread=$row[0];
$_SESSION["unread"]="$unread";

}
else{
require_once("config.php");
$conn = mysql_connect(HOST,USERNAME,PASSWORD);
mysql_select_db(DATABASE_NAME,$conn);

$getid=$_SESSION["a"];

$sql = "SELECT count(done) FROM msgs where rec_id=$getid and done=1";

$result = mysql_query($sql, $conn);
		
$row = mysql_fetch_array($result, MYSQL_NUM);
		
$unread=$row[0];
$_SESSION["unread"]="$unread";
}
}

?>
<html lang="en">
<head>
	
  <title>RSS </title>
  <meta charset="utf-8">
  <LINK REL="SHORTCUT ICON" HREF="images/favicon.ico">
  <link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
  <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
  <link rel="stylesheet" href="css/custom.css" type="text/css" media="all">
  <link rel="stylesheet" href="css/tooltip.css" type="text/css" media="all">
  <script type="text/javascript" src="js/jquery-1.4.2.min.js" ></script>
  <script type="text/javascript" src="js/cufon-yui.js"></script>
  <script type="text/javascript" src="js/Humanst521_BT_400.font.js"></script>
  <script type="text/javascript" src="js/Humanst521_Lt_BT_400.font.js"></script>
	<script type="text/javascript" src="js/roundabout.js"></script>
	<script type="text/javascript" src="js/tooltip.js"></script>
  <script type="text/javascript" src="js/roundabout_shapes.js"></script>
  <script type="text/javascript" src="js/gallery_init.js"></script>
  <script type="text/javascript" src="js/cufon-replace.js"></script>
   
   
   
   
<meta id="Viewport" name="viewport" width="initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">

<script type="text/javascript">
$(function(){
if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
  var ww = ( $(window).width() < window.screen.width ) ? $(window).width() : window.screen.width; //get proper width
  var mw = 480; // min width of site
  var ratio =  ww / mw; //calculate ratio
  if( ww < mw){ //smaller than minimum size
   $('#Viewport').attr('content', 'initial-scale=' + ratio + ', maximum-scale=' + ratio + ', minimum-scale=' + ratio + ', user-scalable=yes, width=' + ww);
  }else{ //regular size
   $('#Viewport').attr('content', 'initial-scale=1.0, maximum-scale=2, minimum-scale=1.0, user-scalable=yes, width=' + ww);
  }
}
});
</script>
   
   
   
   
  <script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
		<script type="text/javascript">
			$(function() {
    			$('a[rel*=leanModal]').leanModal({ top : 200, overlay : 0.4, closeButton: ".modal_close" });		
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

<body >
  <!-- header -->
  
  <header>
    <div class="container">
    	<h1><a href="index.php" class="sitename"><img src="images/dakakeen.png" /></a></h1>
      <nav>
        <ul>
        	<li><a href="index.php" ><div class='top-info'>Home</div></a></li>
			<?
			$signed=$_SESSION["signin"];
			$nameuser=$_SESSION["username"];
			$typeuser=$_SESSION["type"];
			if ($signed=="yes"){
				if($typeuser=="user")
					echo "<li ><a href='user.php?menu=myPro'><div class='top-info'>$nameuser ($unread)</div></a></li>
					<li><a id='go' name='logout' href='logout.php'><div class='top-info'>Logout</div></a></li>";
				else
					echo "<li ><a href='admin.php?menu=myPro'><div class='top-info'>$nameuser ($unread)</div></a></li>
					<li><a id='go' name='logout' href='logout.php'><div class='top-info'>Logout</div></a></li>";
			}
			else 
			echo "<li><a id='go' rel='leanModal' name='signin' href='#signin'><div class='top-info'>Sign In</div></a></li>
					<li><a id='go' rel='leanModal' name='signup' href='#signup'><div class='top-info'>Register</div></a></li>";
			?>
			<li><a href="category.php"><div class="top-info">Category</div></a></li>
			<li><a href="products.php"><div class="top-info">Products</div></a></li>
			<li><a href="contacts.php"><div class="top-info">Contact</div></a></li>
        </ul>
      </nav>
    </div>
	</header>
  <!-- #gallery -->
  <div style="position: relative; width: 100%; background-color: #f1f1f1; overflow: hidden;">
        <div style="position: relative; left: 50%; width: 5000px; text-align: center; margin-left: -2500px;">
            <!-- Jssor Slider Begin -->
            <div id="slider1_container" style="position: relative; margin: 0 auto;
                top: 0px; left: 0px; width: 1050px; height: 400px; background: url(images/major/main_bg.jpg) top center no-repeat;">
                <!-- Loading Screen -->
                <div u="loading" style="position: absolute; top: 0px; left: 0px;">
                    <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block;
                        top: 0px; left: 0px; width: 100%; height: 100%;">
                    </div>
                    <div style="position: absolute; display: block; background: url(images/loading.gif) no-repeat center center;
                        top: 0px; left: 0px; width: 100%; height: 100%;">
                    </div>
                </div>
                <!-- Slides Container -->
				
                <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 1050px;
                    height: 425px; overflow: hidden;">
                    <div>
                        <div style="position: absolute; width: 480px; height: 300px; top: 10px; left: 10px;
                            text-align: left; line-height: 1.8em; font-size: 12px;">
                            <br />
                            <span style="display: block; line-height: 1em; text-transform: uppercase; font-size: 52px;
                                color: #FFFFFF;">Keyboard HiMAX</span>
                            <br />
                            <br />
                            <span style="display: block; line-height: 1.1em; font-size: 2.5em; color: #FF0000;">
                                1000 S.P </span>
                            
                            <br />
                            <br />
                            <a href="good_det.php?id=1">
                                <img src="images/major/find-out-more-bt.jpg" border="0" alt="auction slider" width="215"
                                    height="50" /></a>
                        </div>
                        <img src="upload/1.jpg" style="position: absolute; top: 23px; left: 480px; width: 500px; height: 300px;" />
                        <img u="thumb" src="upload/1.jpg"width="62px" height="32px" />
                    </div>
                    <div>
                        <div style="position: absolute; width: 480px; height: 300px; top: 10px; left: 10px;
                            text-align: left; line-height: 1.8em; font-size: 12px;">
                            <span style="display: block; line-height: 1em; text-transform: uppercase; font-size: 52px;
                                color: #FFFFFF;">MAC Desktop</span>
                            <br />
                            <br />
                            <span style="display: block; line-height: 1.1em; font-size: 2.5em; color: #FF0000;">
                                150,000 S.P </span>
                            <br />
                            <br />
                            <a href="good_det.php?id=2">
                                <img src="images/major/find-out-more-bt.jpg" border="0" alt="ebay slideshow" width="215"
                                    height="50" /></a>
                        </div>
                        <img src="upload/2.jpg" style="position: absolute; top: 23px; left: 480px; width: 500px; height: 300px;" />
                        <img u="thumb" src="upload/2.jpg" />
                    </div>
                    <div>
                        <div style="position: absolute; width: 480px; height: 300px; top: 10px; left: 10px;
                            text-align: left; line-height: 1.8em; font-size: 12px;">
                            <span style="display: block; line-height: 1em; text-transform: uppercase; font-size: 52px;
                                color: #FFFFFF;">Shisha Head</span>
                            <br />
                            <span style="display: block; line-height: 1.1em; font-size: 2.5em; color: #FF0000;">
                                1500 S.P </span>
                            <br />
                            <br />
                            <a href="good_det.php?id=3">
                                <img src="images/major/find-out-more-bt.jpg" border="0" alt="listing slider" width="215"
                                    height="50" /></a>
                        </div>
                        <img src="upload/3.jpg" style="position: absolute; top: 23px; left: 480px; width: 500px; height: 300px;" />
                        <img u="thumb" src="upload/3.jpg" />
                    </div>
                    <div>
                        <div style="position: absolute; width: 480px; height: 300px; top: 10px; left: 10px;
                            text-align: left; line-height: 1.8em; font-size: 12px;">
                            <br />
                            <span style="display: block; line-height: 1em; text-transform: uppercase; font-size: 52px;
                                color: #FFFFFF;">Ford Mustang</span>
                            <br />
                            <br />
                            <span style="display: block; line-height: 1.1em; font-size: 2.5em; color: #FF0000;">
                                2,500,000 S.P </span>
                            <br />
                            <br />
                            <a href="good_det.php?id=4">
                                <img src="images/major/find-out-more-bt.jpg" border="0" alt="ebay store slider" width="215"
                                    height="50" /></a>
                        </div>
                        <img src="upload/4.jpg" style="position: absolute; top: 23px; left: 480px; width: 500px; height: 300px;" />
                        <img u="thumb" src="upload/4.jpg" />
                    </div>
                    <div>
                        <div style="position: absolute; width: 480px; height: 300px; top: 10px; left: 10px;
                            text-align: left; line-height: 1.8em; font-size: 12px;">
                            <span style="display: block; line-height: 1em; text-transform: uppercase; font-size: 52px;
                                color: #FFFFFF;">Nokia 5300</span>
                            <br />
                            <span style="display: block; line-height: 1.1em; font-size: 2.5em; color: #FF0000;">
                                10,000 S.P </span>
                            <br />
                            <br />
                            <a href="good_det.php?id=5">
                                <img src="images/major/find-out-more-bt.jpg" border="0" alt="listing template slider"
                                    width="215" height="50" /></a>
                        </div>
                        <img src="upload/5.jpg" style="position: absolute; top: 23px; left: 480px; width: 500px; height: 300px;" />
                        <img u="thumb" src="upload/5.jpg" />
                    </div>
                    <div>
                        <div style="position: absolute; width: 480px; height: 300px; top: 10px; left: 10px;
                            text-align: left; line-height: 1.8em; font-size: 12px;">
                            <br />
                            <span style="display: block; line-height: 1em; text-transform: uppercase; font-size: 52px;
                                color: #FFFFFF;">Nokia C3</span>
                            <br />
                            <span style="display: block; line-height: 1.1em; font-size: 2.5em; color: #FF0000;">
                                7000 S.P  </span>
                            <br />
                            <br />
                            <a href="good_det.php?id=6">
                                <img src="images/major/find-out-more-bt.jpg" border="0" alt="auction template slider"
                                    width="215" height="50" /></a>
                        </div>
                        <img src="upload/6.jpg" style="position: absolute; top: 23px; left: 480px; width: 500px; height: 300px;" />
                        <img u="thumb" src="upload/6.jpg" />
                    </div>
                    <div>
                        <div style="position: absolute; width: 480px; height: 300px; top: 10px; left: 10px;
                            text-align: left; line-height: 1.8em; font-size: 12px;">
                            <span style="display: block; line-height: 1em; text-transform: uppercase; font-size: 52px;
                                color: #FFFFFF;">Nokia E6</span>
                            <br />
                            <span style="display: block; line-height: 1.1em; font-size: 2.5em; color: #FF0000;">
                                15,000 S.P
                                <br />
                                <br />
                                <a href="good_det.php?id=7">
                                    <img src="images/major/find-out-more-bt.jpg" border="0" alt="ebay slider" width="215"
                                        height="50" /></a>
                        </div>
                        <img src="upload/7.jpg" style="position: absolute; top: 23px; left: 480px; width: 500px; height: 300px;" />
                        <img u="thumb" src="upload/7.jpg" />
                    </div>
                </div>
                <!-- Direction Navigator Skin Begin -->
                <style>
                    /* jssor slider direction navigator skin 07 css */
                    /*
                    .jssord07l              (normal)
                    .jssord07r              (normal)
                    .jssord07l:hover        (normal mouseover)
                    .jssord07r:hover        (normal mouseover)
                    .jssord07ldn            (mousedown)
                    .jssord07rdn            (mousedown)
                    */
                    .jssord07l, .jssord07r, .jssord07ldn, .jssord07rdn
                    {
                        position: absolute;
                        cursor: pointer;
                        display: block;
                        background: url(images/d07.png) no-repeat;
                        overflow: hidden;
                    }
                    .jssord07l
                    {
                        background-position: -5px -35px;
                    }
                    .jssord07r
                    {
                        background-position: -65px -35px;
                    }
                    .jssord07l:hover
                    {
                        background-position: -125px -35px;
                    }
                    .jssord07r:hover
                    {
                        background-position: -185px -35px;
                    }
                    .jssord07ldn
                    {
                        background-position: -245px -35px;
                    }
                    .jssord07rdn
                    {
                        background-position: -305px -35px;
                    }
                </style>
                <!-- Arrow Left -->
                <span u="arrowleft" class="jssord07l" style="width: 50px; height: 50px; top: 123px;
                    left: 8px;"></span>
                <!-- Arrow Right -->
                <span u="arrowright" class="jssord07r" style="width: 50px; height: 50px; top: 123px;
                    right: 8px"></span>
                <!-- Direction Navigator Skin End -->
                <!-- ThumbnailNavigator Skin Begin -->
                <div u="thumbnavigator" class="jssort04" style="position: absolute; width: 600px;
                    height: 60px; right: 0px; bottom: 0px;">
                    <!-- Thumbnail Item Skin Begin -->
                    <style>
                        /* jssor slider thumbnail navigator skin 04 css */
                        /*
                        .jssort04 .p            (normal)
                        .jssort04 .p:hover      (normal mouseover)
                        .jssort04 .pav          (active)
                        .jssort04 .pav:hover    (active mouseover)
                        .jssort04 .pdn          (mousedown)
                        */
                        .jssort04 .w, .jssort04 .pav:hover .w
                        {
                            position: absolute;
                            width: 60px;
                            height: 30px;
                            border: #555555 1px solid;
                        }
                        * html .jssort04 .w
                        {
                            width: /**/ 62px;
                            height: /**/ 32px;
                        }
                        .jssort04 .pdn .w, .jssort04 .pav .w
                        {
                            border-style: solid;
                        }
                        .jssort04 .c
                        {
                            width: 62px;
                            height: 32px;
                            filter: alpha(opacity=45);
                            opacity: .45;
                            transition: opacity .6s;
                            -moz-transition: opacity .6s;
                            -webkit-transition: opacity .6s;
                            -o-transition: opacity .6s;
                        }
                        .jssort04 .p:hover .c, .jssort04 .pav .c
                        {
                            filter: alpha(opacity=0);
                            opacity: 0;
                        }
                        .jssort04 .p:hover .c
                        {
                            transition: none;
                            -moz-transition: none;
                            -webkit-transition: none;
                            -o-transition: none;
                        }
                    </style>
                    <div u="slides" style="bottom: 25px; right: 30px;">
                        <div u="prototype" class="p" style="position: absolute; width: 62px; height: 32px; top: 0; left: 0;">
                            <div class="w">
                                <thumbnailtemplate style="width: 100%; height: 100%; border: none; position: absolute; top: 0; left: 0;"></thumbnailtemplate>
                            </div>
                            <div class="c" style="position: absolute; background-color: #000; top: 0; left: 0">
                            </div>
                        </div>
                    </div>
                    <!-- Thumbnail Item Skin End -->
                </div>
                <!-- ThumbnailNavigator Skin End -->
                <a style="display: none" href="http://www.jssor.com">jQuery Image Slider</a>
            </div>
            <!-- Jssor Slider End -->
        </div>
    </div>
	</div>
  <!-- /#gallery -->
  
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
				    <input name="email" type="email" value=""/>
					</div>
					
					<div class="txt-fld" style="float:bottom;">
					<label for="">Username</label>
				    <input id="" name="user" type="text">
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
     
					
					
					<div class="txt-fld" style="float:bottom;" >
					<label for="">Username</label>
				    <input id="" class="good_input" name="user" type="text">
					</div>
					
					<div class="txt-fld">
					<label for="">Password</label>
				    <input id="" name="pass" type="password">
					</div>
					<div style="float:bottom;margin: 10 0 10 130; color: #222;" >
				    
				    <input id="user" name="type" type="radio" checked value="user"><label for="user">User</label>
					
					
					<input id="admin" name="type" type="radio" value="admin" ><label for="admin">Admin</label>
					
					</div>
					
					
					<a href="forgot_pass.php" style="margin-left:20" >forgot your password ?</a>
					
					
					<div class="btn-fld" >
					 <button type="submit" >Sign In !</button>
					</div>
					
					
				 </form>
			</div>
			
		</div>
  
    <div class="container2">
	<div class="error err-space">
<div id="system-message-container">
</div>
</div>
	<div class="module_new">
<div class="boxIndent">
	<div class="left_content">
	
	<?
			$signed=$_SESSION["signin"];
			$nameuser=$_SESSION["username"];
			if ($signed=="yes");
			
			else 
			echo "<div class='title_box' style='background:url(images/menu_title_bg.jpg) no-repeat center;'>Sign In</div>
	  <div class='border_box'>
				<form  action='login_php.php' method=post>
     

					
					<div style='float:bottom;'>
					<label >Username</label>
				    <input name='user' type='text'>
					</div>
					
					<div >
					<label >Password</label>
				    <input name='pass' type='password'>
					</div>
					
					<div style='float:bottom;margin: 3 0 3 10; color: #222;' >
				    
				    <input id='user' name='type' type='radio' checked value='user'><label for='user'>User</label>
					
					
					<input id='admin' name='type' type='radio' value='admin' ><label for='admin'>Admin</label>
					
					</div>
					
					<a href='forgot_pass.php' style='margin-left:10' >forgot your password ?</a>
					
					
					<div>
					 <input type='submit' value='Sign In !'/>
					</div>
					
					
				 </form>
      </div>";
			?>
	<div class="faceplugin">
	<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2FDakakeen.syr&amp;width=225&amp;height=590&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=true&amp;show_border=true&amp;appId=277894992373876" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:225px; height:590px;" allowTransparency="true"></iframe>
        </div>
	</div>
	
      <div class="wrapper2">
	  <div class="vmgroup_new" >
	  
	  <ul id="vmproduct" class="vmproduct_new" style="margin-top:30px" >
				
				<?php
	$rss = new DOMDocument();
	$rss->load('http://www.reuters.com/rssFeed/technologyNews.xml');
	$feed = array();
	foreach ($rss->getElementsByTagName('item') as $node) {
		$item = array ( 
			'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
			'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
			'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
			'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
			'media' => $node->getElementsByTagName('image')->item(0)->nodeValue
			);
		array_push($feed, $item);
	}
	$limit = 5;
	for($x=0;$x<$limit;$x++) {
		$title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
		$link = $feed[$x]['link'];
		$description = $feed[$x]['desc'];
		$date = date('l F d, Y', strtotime($feed[$x]['date']));
		$media=$feed[$x]['media'];
		echo "<div class=\"product-box spacer\" style=\"height: auto;\">";
		echo '<p><strong><a href="'.$link.'" title="'.$title.'">'.$title.'</a></strong><br />';
		echo '<small><em>Posted on '.$date.'</em></small></p>';
		echo '<p>'.$description.'</p>';
		echo '<img src="'.$media.'"/>';
		echo "</div>";
		echo "<hr/>";
	}
?>
				
				
	  </ul>
	 
	  </div>
      </div>
	  
    </div>
  </div>
  </div>
  
  <div class="clear"></div>
  <!--pop up register -->
  
  
  
  
  
  <!-- footer -->
  <footer>
    <div class="container">
    	<div class="wrapper">
        <div class="fleft">Copyright - Dakakeen</div>
        <div class="fright"><img src="images/facebook.png"> <a href="http://www.facebook.com/Dakakeen.syr" target="_blank" rel="nofollow">Dakakeen.syr</a>&nbsp; &nbsp; |&nbsp; &nbsp; <img src="images/twitter.png"> <a href="http://www.twitter.com/Dakakeen" target="_blank" rel="nofollow">#Dakakeen</a></div>
      </div>
    </div>
  </footer>
  <script type="text/javascript"> Cufon.now(); </script>
</body>
</html>