<?
@session_start();
$new=$_POST['password'];
$conf=$_POST['confirm'];

if (!$new or !$conf){
echo "<script type=\"text/javascript\">alert('Empty Fields !');

history.go(-1);
</script>";
}
else{

if($new!=$conf){
echo "<script type=\"text/javascript\">alert('Password does not match the confirmation !');

history.go(-1);
</script>";
}
else{

$userid=$_SESSION["userid"];
require_once("config.php");
$conn = mysql_connect(HOST,USERNAME,PASSWORD);
mysql_select_db(DATABASE_NAME,$conn);

$sql = "UPDATE users SET `password` ='". md5($new) ."' where `ID` = ".$userid;
		
		
		mysql_query($sql);
		
		session_destroy();
		echo "<script type=\"text/javascript\">alert('Your Password Has Been Reset !!');

window.location = 'index.php';
</script>";
}
}
?>