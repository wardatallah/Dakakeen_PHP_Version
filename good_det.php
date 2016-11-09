<?php
@session_start();
require_once("config.php");
$conn = mysql_connect(HOST,USERNAME,PASSWORD);
mysql_select_db(DATABASE_NAME,$conn);
if ($_SESSION["signin"]=="yes"){
if ($_SESSION["isAdmin"]=="yes"){


$id=$_SESSION["a"];
$sql = "SELECT count(done) FROM adminmsgs where done=1";

$result = mysql_query($sql, $conn);
		
$row = mysql_fetch_array($result, MYSQL_NUM);
		
$unread=$row[0];
$_SESSION["unread"]="$unread";

}
else{


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
  <title>Product Details</title>
  <meta charset="utf-8">
  <LINK REL="SHORTCUT ICON" HREF="images/favicon.ico">
  <link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
  <link rel="stylesheet" href="css/custom.css" type="text/css" >
  <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
  <link rel="stylesheet" href="css/tooltip.css" type="text/css" media="all">
  <script type="text/javascript" src="js/jquery-1.4.2.min.js" ></script>
  <script type="text/javascript" src="js/cufon-yui.js"></script>
  <script type="text/javascript" src="js/Humanst521_BT_400.font.js"></script>
  <script type="text/javascript" src="js/Humanst521_Lt_BT_400.font.js"></script>
  <script type="text/javascript" src="js/cufon-replace.js"></script>
	<script type="text/javascript" src="js/roundabout.js"></script>
	<script type="text/javascript" src="js/tooltip.js"></script>
  <script type="text/javascript" src="js/roundabout_shapes.js"></script>
  <script type="text/javascript" src="js/gallery_init.js"></script>
  <script type="text/javascript" src="js/loopedslider.min.js"></script>
  
  <script>
function confirmDelete(delUrl) {
  if (confirm("Are You Sure You Want To Delete !?")) {
   document.location = delUrl;
  }
}
</script>
   
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
			<li><a href="index.php"><div class="top-info">Home</div></a></li>
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
		
		 
		 
<div class="container2" >
<div class="error err-space">
<div id="system-message-container">
</div>
</div>
<div class="module_new" >
<div class="boxIndent" >
<div class="wrapper2" >
<div class="vmgroup_new" >
<div class="grid_8" >
<?
		
		
		$id=$_GET["id"];
$sql = "select good_name,good_type,price,description,offer_date,trans_ability,count,img_path,com_id from goods where good_Id=$id";

$result = mysql_query($sql, $conn);
//get row data as an associative array
$rws=0;
$com_id=0;
$row = mysql_fetch_assoc($result);
$name="";
$type="";
$price=0;
$descr="";
$dte="";
$trn="";
$count=0;
$img_path="";
$counter=1;

if ($row!=null){
foreach ($row as $col=>$val){
if ($counter==1)
$name=$val;
else if ($counter==2)
$type=$val;
else if ($counter==3)
$price=$val;
else if ($counter==4)
$descr=$val;
else if ($counter==5)
$dte=$val;
else if ($counter==6){
$trn=$val;
if($trn=="Y")
$trn="Yes";
else
$trn="No";
}
else if ($counter==7)
$count=$val;
else if ($counter==8)
$img_path=$val;
else if ($counter==9)
$com_id=$val;

$counter=$counter + 1;
} // end foreach
echo "<h2 class='spechead'>$name</h2>";
?>
<div class="mobiporvw ftlt">
<div style="position: relative;" class="product_image_bg">
<table cellspacing="0" cellpadding="0" style="font-size: 12px;">
<tbody>
<tr>
<td style="vertical-align: middle;">
<ul id="product_img_main" class="product_img_main" style="-webkit-padding-start: 0px;">
<li>
<div style="display: inline-block;" id="prodPic">
<div itemtype="" itemscope="">
<div id="wrap" style=" position: relative;">
<?
echo "<a title='$name' rel='zoomWidth: 350, zoomHeight:350' id='cloud_zoom' class='cloud-zoom' href='$img_path' style='position: relative; display: block;'>
<img alt='$name' src='$img_path' itemprop='image' style='display: block; height: 300; width:350;'>
</a>"
?>
<div class="mousetrap" style="z-index: 999; position: absolute; width: 250px; height: 300px; left: 0px; top: 0px;"></div></div>
</div>
</div>
</li>
</ul>
</td></tr></tbody></table><div class="clearAll">
</div>
</div>
</div>
<div class="mobilemodelspec ftlt" id="divRiver" name="divRiver">
<div itemprop="brand"><div class="mobileqkspec"><span class="bold">Key Features</span><ul class="spek" itemprop="description">
<li><div></div><span><label class="good_label">Type :   </label><?echo "$type";?></span></li>
<li><div></div><span><label class="good_label">Description :   </label><?echo "$descr";?></span></li>
<li><div></div><span><label class="good_label">Offer Date :   </label><?echo "$dte";?></span></li>
<li><div></div><span><label class="good_label">Delivery Ability :   </label><?echo "$trn";?></span></li>
<li><div></div><span><label class="good_label">Count :   </label><?echo "$count";?></span></li>
<li><div></div><span><label class="good_label">Price :   </label><?echo "$price S.P";?></span></li>
</ul>
<?
$getid=$_SESSION["a"];
if ($com_id==$getid){
echo "
<div style='float:right;margin-top:30' onmouseover='tooltip.pop(this,\"Delete Product\")'>
<a href='javascript:confirmDelete(\"del_good.php?rec=$getid&proid=$id\")' ><img src='images/delete.png' width='40' height='45' /></a>
</div>
<div style='float:right;margin-top:30;margin-right:15' onmouseover='tooltip.pop(this,\"Edit Product\")'>
<a href='edit_good.php?id=$id' ><img src='images/settings.png' width='40' height='45' /></a>
</div>";
}
else {
echo "<div style='float:right;margin-top:30' onmouseover='tooltip.pop(this,\"Buy Now\")'><a href='buy_good.php?id=$id'><img src='images/add-to-cart.png' width='40' heigh='45' alt='Add To Cart'/></a></div>";
if ($_SESSION["isAdmin"]!="yes")
echo "
<div style='float:right;margin-top:30;margin-right:15' onmouseover='tooltip.pop(this,\"Report This Product\")'>
<a href='report_good.php?id=$id' ><img src='images/report.png' width='40' height='45' /></a>
</div>";
}

?>
<div class="alignright pad5"></div></div><div class="clear"></div></div>
</div>


<div class="clear">
</div>

<hr>


</div>

<?
}
else {
echo "<div height=auto><p>Product No More Available</p></div>";
}
?>



</div>
</div>
</div>
</div>
</div>
<div class="clear"></div>
</div>

  
  

  
  <!-- footer -->
  <footer>
    <div class="container" >
    	<div class="wrapper">
		<center>
        <div class="fleft">Copyright - Dakakeen</div>
        <div class="fright"><img src="images/facebook.png"> <a href="http://www.facebook.com/Dakakeen.syr" target="_blank" rel="nofollow">Dakakeen.syr</a>&nbsp; &nbsp; |&nbsp; &nbsp; <img src="images/twitter.png"> <a href="http://www.twitter.com/Dakakeen" target="_blank" rel="nofollow">#Dakakeen</a></div></center>
      </div>
    </div>
  </footer>
  <script type="text/javascript"> Cufon.now(); </script>
</body>
</html>
