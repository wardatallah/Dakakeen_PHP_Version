<?
session_start();
require_once("config.php");
$conn = mysql_connect(HOST,USERNAME,PASSWORD);
mysql_select_db(DATABASE_NAME,$conn);

$nameuser=$_SESSION["username"];
$name=$_POST['name'];
$address=$_POST['address'];
$categ=$_POST['categ'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$old=md5($_POST['old']);
$pass=$_POST['pass'];
$cpass=$_POST['cpass'];

if(!$name or !$address or !$categ or !$phone or !$email or !$old or !$pass or !$cpass ){
echo "<script type=\"text/javascript\">alert('Empty Fields !');

history.go(-1);
</script>";

}

else if ($pass==$cpass){

	
	$sql = "SELECT password FROM users where user_name='$nameuser'";

	$result = mysql_query($sql, $conn);

	$row=mysql_fetch_array($result,MYSQL_NUM);
	
	if ($row[0]==$old){
		
		$sql = "UPDATE users set `company_name` ='". $name ."' , `address` ='". $address ."' , `category` ='". $categ ."' , `phone` ='". $phone ."' , `email` ='". $email ."' , `password` ='". md5($pass) ."' where `user_name` = '".$nameuser."'";
		mysql_query($sql);
		
		session_destroy();
		
		echo "<script type=\"text/javascript\">alert('Settings Changed !');

		window.location='sign_in.php';
</script>";
	}
	else{
		echo "<script type=\"text/javascript\">alert('Incorrect Old Password !');

history.go(-1);
</script>";
	}
}

else {
echo "<script type=\"text/javascript\">alert('Passwords Dismatch !');

history.go(-1);
</script>";
}
?>