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
  <title>Contact us</title>
  <meta charset="utf-8">
  <LINK REL="SHORTCUT ICON" HREF="images/favicon.ico">
  <link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
  <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
  <link rel="stylesheet" href="css/custom.css" type="text/css" media="all">
  <script type="text/javascript" src="js/jquery-1.4.2.min.js" ></script>
  <script type="text/javascript" src="js/cufon-yui.js"></script>
  <script type="text/javascript" src="js/Humanst521_BT_400.font.js"></script>
  <script type="text/javascript" src="js/Humanst521_Lt_BT_400.font.js"></script>
  <script type="text/javascript" src="js/cufon-replace.js"></script>
	<script type="text/javascript" src="js/roundabout.js"></script>
  <script type="text/javascript" src="js/roundabout_shapes.js"></script>
  <script type="text/javascript" src="js/gallery_init.js"></script>
  
   
  <script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
		<script type="text/javascript">
			$(function() {
    			$('a[rel*=leanModal]').leanModal({ top : 200, overlay : 0.4, closeButton: ".modal_close" });		
			});
		</script>
		
		
		<script type="text/javascript" src="js/jssor.core.js"></script>
    <script type="text/javascript" src="js/jssor.utils.js"></script>
    <script type="text/javascript" src="js/jssor.slider.js"></script>
    
  
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
    	<h1><a href="index.php" class="sitename"><img src="images/dakakeen.png" /></a></h1>
      <nav>
        <ul>
			<li><a href="index.php" ><div class="top-info">Home</div></a></li>
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
			<li><a href="#" class="current"><div class="top-info">Contact</div></a></li>
        </ul>
      </nav>
    </div>
	</header>
  <!-- #gallery -->
  
  <!-- /#gallery -->
  <div class="main-box">
    <div class="container">
	
      <div class="inside">
        <div class="wrapper">
        	<!-- aside -->
          <aside>
            <h2>Our <span>Contacts</span></h2>
            <!-- .contacts -->
            <ul class="contacts">
            	<li><strong>Zip Code:</strong>00963</li>
              <li><strong>Country:</strong>Syria</li>
              <li><strong>City:</strong>Homs</li>
              <li><strong>Telephone 1:</strong>+963 936 944 653</li>
			  <li><strong>Telephone 2:</strong>+963 932 448 165</li>
              <li><strong>Email:</strong><a href="#">Dakakeen@mail.com</a></li>
            </ul>
            <!-- /.contacts -->
            <h3>Info :</h3>
            Dakakeen.tk is an e-market . <br>Simple to Sell .. Easy to Buy
          </aside>
          <!-- content -->
          <section id="content">
            <article>
            	<h2>Contact <span>Form</span></h2>
              <form id="contacts-form" action="smsg.php" method="post">
                <fieldset>
                  <div class="field">
                    <label>* Name :</label>
                    <input type="text" name="user" value=""/>
					<input type="text" name="iduser" value="" hidden disabled />
                  </div>
                  <div class="field">
                    <label>* E-mail:</label>
                    <input type="email" name="email" value=""/>
                  </div>
                  <div class="field">
                    <label>* Message:</label>
                    <textarea name="msg" cols=50 rows=15></textarea>
                  </div>
                  <div>
				  <input type="submit" value="Send">
				  </div>
                </fieldset>
              </form>
            </article> 
          </section>
        </div>
      </div>
    </div>
  </div>
  
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
  
  
  
  <div id="signin" style="display: none;position: absolute; opacity: 1; z-index: 11000; left: 50%; top: 50px;">
			
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
					
					<div style="float:bottom;margin: 10 0 10 130; color: #222;" >
				    
				    <input id="user" name="type" type="radio" checked value="user"><label for="user">User</label>
					
					
					<input id="admin" name="type" type="radio" value="admin" ><label for="admin">Admin</label>
					
					</div>
					
					<a href="forgot_pass.php" style="margin-left:20" >forgot your password ?</a>
					
					<div class="btn-fld">
					 <button type="submit">Sign In !</button>
					</div>
					
					
				 </form>
			</div>
			
		</div>
  
  
  
  
  
  
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
