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
	
  <title>Products</title>
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
   
  <script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
		<script type="text/javascript">
			$(function() {
    			$('a[rel*=leanModal]').leanModal({ top : 200, overlay : 0.4, closeButton: ".modal_close" });		
			});
		</script>
		   <script>
function confirmDelete(delUrl) {
  if (confirm("Are You Sure You Want To Delete !?")) {
   document.location = delUrl;
  }
}
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
    <script type="text/javascript" src="js/sliderfunc.js"></script>
        
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
		
		 
		 
<div class="container2">
<div class="error err-space">
<div id="system-message-container">
</div>
</div>
<div class="module_new">
<div class="boxIndent">


<div class="left_content">

      <div class="title_box" style="background:url(images/menu_title_bg.jpg) no-repeat center;">Categories</div>
	  <div class='border_box'>
      <ul class="left_menu">
	  <?
	  
		
		//create a query
		$sql = "SELECT good_type FROM goods order by good_type asc";

		$result = mysql_query($sql, $conn);
		$count=0;
		$temp="";
		echo "<li class='odd'><a href='products.php' style='background: url(images/checked.png) no-repeat left #f1f1f1;'>All</a></li>";
		while ($row = mysql_fetch_assoc($result)){

		foreach ($row as $col=>$val){
		if($val!=$temp){
		
			if($count%2!=0){
				echo "<li class='odd'><a href='products.php?categ=$val' style='background: url(images/checked.png) no-repeat left #f1f1f1;'>$val</a></li>";
				$temp=$val;
			}
			else{
				echo "<li class='even'><a href='products.php?categ=$val' style='background: url(images/checked.png) no-repeat left #fff;'>$val</a></li>";
				$temp=$val;
			}
		$count+=1;
		
		}
		
		}
		
	  }
	  ?>
        
        
      </ul>
	  </div>
       <!--<div class="title_box" style="background:url(images/menu_title_bg.gif) no-repeat center;">Special Products</div>
      <div class="border_box">
        <div class="product_title"><a href="details.html">Motorola 156 MX-VL</a></div>
        <div class="product_img"><a href="details.html"><img src="upload/4.jpg" alt="" border="0" width=100 height=100></a></div>
        <div class="prod_price"><span class="reduce">350$</span> <span class="price">270$</span></div>
      </div> -->
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
	
<?
if($signed=="yes" and $_SESSION["isAdmin"]!="yes")
echo "<div style='margin:20 0 20 69;float:left'>
<button style='cursor: pointer' onclick='window.location.href=\"add_goods.php\"'>Add New Product</button>
</div>";
else
echo "<div style='margin:20 0 20 69;float:left'>
<button style='cursor: pointer;display:none' onclick='window.location.href=\"add_goods.php\"'>Add New Product</button>
</div>";
?>
<div class="wrapper2" >

<div class="vmgroup_new" >

<ul id="vmproduct" class="vmproduct_new" >

<li class="item">
<?

//create a query
if ($categ==null)
$sql = "SELECT good_Id,good_name,price,img_path,com_id FROM goods order by good_Id";
else
$sql = "SELECT good_Id,good_name,price,img_path,com_id FROM goods where good_type='$categ'";
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
<a href=\"good_det.php?id=$id\" class=\"img2\"><img src='$img_path'  border=0 width=150 height=175 alt='product $id' class='browseProductImage'/></a> </div>
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
$getid=$_SESSION["a"];
if ($com_id==$getid){
echo "<div style='float:right;;margin-top:5' onmouseover='tooltip.pop(this,\"Delete Product\")'>
<a href='javascript:confirmDelete(\"del_good.php?rec=$getid&proid=$id\")' ><img src='images/delete.png' width='25' height='30' /></a>
</div>
<div style='float:right;margin-left:10;margin-top:5;margin-right:10' onmouseover='tooltip.pop(this,\"Edit Product\")'>
<a href='edit_good.php?id=$id' ><img src='images/settings.png' width='25' height='30' /></a>
</div>";
}
else
echo "<div style='float:right;margin-left:30' onmouseover='tooltip.pop(this,\"Buy Now\")'><a href='buy_good.php?id=$id'><img src='images/add-to-cart.png' width='40' heigh='40' alt='Add To Cart'/></a></div>";
echo "</div>
</div>
</div>";

if ($rws == 4){
echo "</li>
<li class='items'>";
$rws=0;
}
}// end while

?>



</li>
</ul>
</div>
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
