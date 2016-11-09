<?
@session_start();
$hash=$_GET['id'];
$name=$_GET['name'];

require_once("config.php");
$conn = mysql_connect(HOST,USERNAME,PASSWORD);
mysql_select_db(DATABASE_NAME,$conn);

$sql = "SELECT ID,email FROM users where user_name like '$name'";

$result = mysql_query($sql, $conn);
		
$row = mysql_fetch_array($result, MYSQL_NUM);
		
$id=$row[0];
$mail=$row[1];

if(md5($mail)!=$hash){

echo "<script type=\"text/javascript\">alert('Error Link !');

window.location = 'index.php';
</script>";

}
else{

$sql = "UPDATE users set `activated` = '0' where `user_name` = '".$name."'";

mysql_query($sql);

echo "<script type=\"text/javascript\">alert('Your account have been activated !');

window.location = 'sign_in.php';
</script>";


}
?>