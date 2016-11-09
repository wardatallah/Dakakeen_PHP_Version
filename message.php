<?php
@session_start();
$id=$_SESSION["a"];
$msgid=$_GET['msgid'];
if ($_SESSION["signin"]=="yes" ){
if ($_SESSION["isAdmin"]=="yes"){
require_once("config.php");
$conn = mysql_connect(HOST,USERNAME,PASSWORD);
mysql_select_db(DATABASE_NAME,$conn);

$sql = "UPDATE adminmsgs set `done` =". 0 ." where `ID` =".$msgid;
mysql_query($sql);

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

$sql = "UPDATE msgs set `done` =". 0 ." where `rec_id` = ".$id ." and `ID` =".$msgid;
mysql_query($sql);

$sql = "SELECT count(done) FROM msgs where rec_id=$id and done=1";

$result = mysql_query($sql, $conn);
		
$row = mysql_fetch_array($result, MYSQL_NUM);
		
$unread=$row[0];
$_SESSION["unread"]="$unread";


}
}
?>
<html lang="en">
<head>
  <title>Message</title>
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
  <script type="text/javascript" src="js/cufon-replace.js"></script>
	<script type="text/javascript" src="js/roundabout.js"></script>
	<script type="text/javascript" src="js/tooltip.js"></script>
  <script type="text/javascript" src="js/roundabout_shapes.js"></script>
  <script type="text/javascript" src="js/gallery_init.js"></script>
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
		
		
		<script type="text/javascript" src="js/jssor.core.js"></script>
    <script type="text/javascript" src="js/jssor.utils.js"></script>
    <script type="text/javascript" src="js/jssor.slider.js"></script>
    
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
			<li><a href="contacts.php"><div class="top-info">Contact</div></a></li>
        </ul>
      </nav>
    </div>
	</header>
  <!-- #gallery -->
  <div class="container2">
<div class="error err-space">
<div id="system-message-container">
</div>
</div>
<div class="module_new">
<div class="boxIndent">


<div class="left_content">

      <div class="title_box" style="background:url(images/menu_title_bg.jpg) no-repeat center;">Options</div>
	  <div class='border_box'>
      <ul class="left_menu">
			<? if ($_SESSION["isAdmin"]=="yes") { ?>
				<li  class='odd'><a href='admin.php?menu=myPro' style='background: url(images/add-to-cart1.png) no-repeat left #f1f1f1;'>Products</a></li>
				<li class='even'><a href='admin.php?menu=msgs' style='background: url(images/messages.png) no-repeat left #fff;'>Messages <font color="red" >( <? echo "$unread"; ?> unread )</font></a></li>
				<li class='even'><a href='admin.php?menu=users' style='background: url(images/users.png) no-repeat left #f1f1f1;'>Users</a></li>
				<li class='odd'><a href='admin.php?menu=settings' style='background: url(images/settings1.png) no-repeat left #fff;'>Settings</a></li>
			<?}else{?>
				<li  class='odd'><a href='user.php?menu=myPro' style='background: url(images/add-to-cart1.png) no-repeat left #f1f1f1;'>My Products</a></li>
				<li class='even'><a href='user.php?menu=msgs' style='background: url(images/messages.png) no-repeat left #fff;'>Messages <font color="red" >( <? echo "$unread"; ?> unread )</font></a></li>
				<li class='odd'><a href='user.php?menu=settings' style='background: url(images/settings1.png) no-repeat left #f1f1f1;'>Settings</a></li>
			<?}?>
      </ul>
	  </div>
  
		<div class="faceplugin">
		<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2FDakakeen.syr&amp;width=225&amp;height=590&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=true&amp;show_border=true&amp;appId=277894992373876" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:225px; height:590px;" allowTransparency="true"></iframe>
        </div>
      
</div>
<?


//create a query
if ($_SESSION["signin"]=="yes"){
if ($_SESSION["isAdmin"]=="yes")
$sql = "SELECT sender,content,send_email,send_date FROM adminmsgs where ID=$msgid";
else 
$sql = "SELECT sender,content,send_email,send_date FROM msgs where rec_id=$id and ID=$msgid";

$result = mysql_query($sql, $conn);
//get row data as an associative array

if (!$result){
echo "<script type=\"text/javascript\">alert('Invalid Message !');

		history.go(-1);
		</script>";
}
else{
$count=0;
$row = mysql_fetch_array($result);
//look at each field

echo "<div class='wrapper2' >

<div class='vmgroup_new' >

<ul id='vmproduct' class='vmproduct_new' >

<li class='items'>
<div class='product-box' style='width:80%;'>
<div class='fleft'>
<div class='Price'>
From : $row[0]
</div>
<div class='email' style='margin-bottom:5'>
Email : $row[2]
</div>
<div class='date'>
$row[3]
</div>
<hr/>
<div class='msg'>
<b>Message :</b>
<div style='float:right;background-color:#eee;height:350;width:850'>$row[1]</div>

</div>
</div>
<div class='wrapper2'>
<div style='float:right;margin-top:30' onmouseover='tooltip.pop(this,\"Delete Message\")'>
<a href='javascript:confirmDelete(\"del_msg.php?rec=$id&msgid=$msgid\")' ><img src='images/delete.png' width='40' height='45' /></a>
</div>
</div>
</div>
</li>
</ul>
</div>
</div>";


}
}
else{
echo "<script type=\"text/javascript\">alert('Invalid Link !');

		window.location = 'index.php';
		</script>";
}
?>

	  
	  
</div>
</div>
</div>
<div class="clear"></div>
  
  
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
