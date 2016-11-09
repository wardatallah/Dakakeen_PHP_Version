<?
require_once("config.php");
$conn = mysql_connect(HOST,USERNAME,PASSWORD);
mysql_select_db(DATABASE_NAME,$conn);
$id=$_GET['id'];
$user=$_GET['t'];

$sql = "select first,mid,last,count,good_id from pending where ID=$id";

$result = mysql_query($sql, $conn);
if (!$result){
echo "<script type=\"text/javascript\">alert('Error Link !');

		window.location='index.php';
		</script>";

}

$row=mysql_fetch_array($result,MYSQL_NUM);

$gotUser=md5($row[0].' '.$row[1].' '.$row[2]);
$count=$row[3];
$good_id=$row[4];

if($user==$gotUser){

//delete from pending
mysql_query("delete from `pending` where `ID` = ".$id);

echo "<script type=\"text/javascript\">alert('Order Denied !');

		window.location='user.php?menu=msgs';
		</script>";

}
else{
echo "<script type=\"text/javascript\">alert('Error Link !');

		window.location='index.php';
		</script>";

}

?>