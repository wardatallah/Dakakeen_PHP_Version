<?php
@session_start();
$menu=$_GET["menu"];
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
?>
<html lang="en">
<head>
  <title>Profile</title>
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
  	<script type="text/javascript" src="js/tooltip.js"></script>
	<script type="text/javascript" src="js/roundabout.js"></script>
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
			$isAdmin=$_SESSION["isAdmin"];
			$signed=$_SESSION["signin"];
			$nameuser=$_SESSION["username"];
			if ($isAdmin=="yes")
			echo "<li ><a href='#'  class='current'><div class='top-info'>$nameuser ($unread)</div></a></li>
					<li><a id='go' name='logout' href='logout.php'><div class='top-info'>Logout</div></a></li>";
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
 <div class="container2" >
<div class="error err-space">
<div id="system-message-container">
</div>
</div>
<div class="module_new">
<div class="boxIndent">

<? $isAdmin=$_SESSION["isAdmin"];
if ($isAdmin=="yes") {?>
<div class="left_content">

      <div class="title_box" style="background:url(images/menu_title_bg.jpg) no-repeat center;">Options</div>
	  <div class='border_box'>
      <ul class="left_menu">
	 
				<li  class='odd'><a href='admin.php?menu=myPro' style='background: url(images/add-to-cart1.png) no-repeat left #f1f1f1;'>Products</a></li>
				<li class='even'><a href='admin.php?menu=msgs' style='background: url(images/messages.png) no-repeat left #fff;'>Messages <font color="red" >( <? echo "$unread"; ?> unread )</font></a></li>
				<li class='even'><a href='admin.php?menu=users' style='background: url(images/users.png) no-repeat left #f1f1f1;'>Users</a></li>
				<li class='odd'><a href='admin.php?menu=settings' style='background: url(images/settings1.png) no-repeat left #fff;'>Settings</a></li>
				
      </ul>
	  </div>
  
		<div class="faceplugin">
		<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2FDakakeen.syr&amp;width=225&amp;height=590&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=true&amp;show_border=true&amp;appId=277894992373876" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:225px; height:590px;" allowTransparency="true"></iframe>
        </div>
      
</div>




	
<?

			

if($menu=="myPro"){
echo "
<div class='wrapper2' >

<div class='vmgroup_new' >

<ul id='vmproduct' class='vmproduct_new' >

<li class='item'>";

//create a query

$sql = "SELECT good_Id,good_name,price,img_path,com_id FROM goods ";

$result = mysql_query($sql, $conn);
//get row data as an associative array
$rws=0;
while ($row = mysql_fetch_assoc($result)){
//look at each field
$rws=$rws+1;
$count=1;
$id=0 ;
$name="";
$price=1000;
$img_path="path";
$com_id=-1;
foreach ($row as $col=>$val){
if ($count==1)
$id=$val;
else if ($count==2)
$name=$val;
else if ($count==3)
$price=$val;
else if ($count==4)
$img_path=$val;
else if ($count==5)
$com_id=$val;

$count=$count + 1;
} // end foreach

echo "<div class=\"product-box spacer\" style=\"height: 350px;\">
<div class=\"browseImage\">
<div class=\"new\"></div>
<a href=\"$img_path\" class=\"img2\"><img src='$img_path'  border=0 width=150 height=175 alt='product $id' class='browseProductImage'/></a> </div>
<div class='fleft'>
<div class='Title'>
<span class='count'>1.</span>$name</div>
<div class='Price'>
<span class='sales'>$price S.P</span>
</div>
<div class='wrapper2'>
<div style='float:left'>
<button style='cursor: pointer' onclick='window.location.href=\"good_det.php?id=$id\"' type='submit' style='float:left'>Details ...<i class='fa fa-arrow-circle-o-right'></i></button>
</div>";

echo "<div style='float:right;;margin-left:40;margin-top:5' onmouseover='tooltip.pop(this,\"Delete Product\")'>
<a href='javascript:confirmDelete(\"del_good.php?rec=$getid&proid=$id\")' ><img src='images/delete.png' width='25' height='30' /></a>
</div>
</div>
</div>
</div>";

if ($rws == 4){
echo "</li>
<li class='items'>";
$rws=0;
}
}// end while


echo "</li>
</ul>
</div>
</div>";

}
else if ($menu=="msgs"){

//create a query
$sql = "SELECT sender,send_date,ID,done FROM adminmsgs order by ID desc";

$result = mysql_query($sql, $conn);
//get row data as an associative array
$count=0;
while ($row = mysql_fetch_assoc($result)){
//look at each field
$count=1;
$sender="";
$date="";
$msgid=0;
$done=1;
foreach ($row as $col=>$val){
if ($count==1)
$sender=$val;
else if ($count==2)
$date=$val;
else if ($count==3)
$msgid=$val;
else if ($count==4)
$done=$val;

$count=$count+1;
} // end foreach

echo "
<div class='wrapper2' >

<div class='vmgroup_new' >

<ul id='vmproduct' class='vmproduct_new' >

<li class='items'>
<div class='product-box spacer' style='height: auto;width:80%;"; 
if ($done==1)
echo "background-color:#f1f1f1";
echo "
'>
<div class='fleft'>
<div class='Price'>
From : $sender
</div>
<div class='date'>
<span class='sales'>$date</span>
</div>
</div>
<div class='wrapper2'>
<div style='float:right;margin-top:50'>
<button style='cursor: pointer;' onclick='window.location.href=\"message.php?msgid=$msgid\"' type='submit'>Details ...<i class='fa fa-arrow-circle-o-right'></i></button>
</div>
<div style='float:right;margin-top:55;margin-right:15' onmouseover='tooltip.pop(this,\"Delete Message\")'>
<a href='javascript:confirmDelete(\"del_msg.php?rec=$id&msgid=$msgid\")' ><img src='images/delete.png' width='25' height='30' /></a>
</div>
</div>
</div>
</li>
</ul>
</div>
</div>";


}
}

else if ($menu=="users"){
echo"<div class='wrapper2' >

<div class='vmgroup_new' >

<ul id='vmproduct' class='vmproduct_new' >
<table>
<tr>
<th class='th1' width='200'>Company Name</th>
<th class='th1' width='200'>Username</th>
<th class='th1' width='150'>Blocked ?</th>
<th class='th1' width='150' >Block/Unblock</th>
<th class='th1' width='100' >Message</th>
</tr>";

//create a query
$sql = "SELECT ID,company_name,user_name FROM users";


$result = mysql_query($sql, $conn);
//get row data as an associative array
$count=0;
while ($row = mysql_fetch_assoc($result)){
//look at each field
$count=1;
$user_name="";
$name="";
$block="No";
$iduser=0;
foreach ($row as $col=>$val){
if ($count==1)
$iduser=$val;
else if ($count==2)
$name=$val;
else if ($count==3)
$user_name=$val;

$count=$count+1;
} // end foreach

// check if user is blocked
$sql2 = "SELECT name FROM blocked Where name='$user_name'";

$result1 = mysql_query($sql2, $conn);

$row1 = mysql_fetch_array($result1, MYSQL_NUM);
	
if($row1[0]==$user_name){
	$block="Yes";}


echo "
<tr>
<td class='td1' >$name</td>
<td class='td1' >$user_name</td>
<td class='td1$block' >$block</td>
<td class='td1'>";
if($block=="Yes")
echo "<a href='unBlock.php?name=$user_name'>Unblock</a></td>";
else
echo "<a href='Block.php?name=$user_name'>Block</a></td>";

echo "<td class='td1'><a href='send_message.php?id=$iduser&name=$user_name'><img src='images/messages.png'></a></td>
</tr>

";


}

echo "</table>
</ul>
</div>
</div>";
}
else if ($menu=="settings"){

//create a query
$sql = "SELECT name FROM admin where ID=$id";

$result = mysql_query($sql, $conn);

$row=mysql_fetch_array($result,MYSQL_NUM);
echo "<div class='wrapper2' >

<div class='vmgroup_new' >
<ul id='vmproduct' class='vmproduct_new' >

<li class='items'>
		<center><legend>Profile Settings</legend></center>
		<fieldset style='border: 2px #f1f1f1 solid;width:300px'>
		
		<form id='contacts-form' method=post action='change_settings.php' enctype='multipart/form-data'>
		
			<div class='field' >
				<label for=''>Username : </label>
			    <input disabled type='text' name='user' value=\"$nameuser\" style='background-color:#f1f1f1'/>
			</div>
			<div class='field' >
				<label for=''>Old Password :</label>
			    <input type='password' name='old' />
			</div>
			<div class='field' >
				<label for=''>New Password :</label>
			    <input type='password' name='pass' />
			</div>
			<div class='field' >
				 <label for=''>Confirm Password :</label>
			    <input type='password' name='cpass' />
			</div>
			<div class='field' style='padding-left:600;padding-right:100'>
				 <input type='submit' value='Save Changes'/>
			</div>

		</form>
			</fieldset>	
</li>
</ul>
</div>
</div>";


}

}
else {

echo "<script type=\"text/javascript\">
			alert('Please Sign In First !!!');
			history.go(-1);
			</script>";
}

?>


</div>
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
