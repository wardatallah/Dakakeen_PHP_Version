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

//fetch count in goods
$sql="select count from goods where good_Id=".$good_id;
$result = mysql_query($sql, $conn);
$row=mysql_fetch_array($result,MYSQL_NUM);
$counter=$row[0];

//calculate new count available
$new=$counter-$count;

if ($new>=0){
//update good's count
$sql = "UPDATE goods SET `count` ='". $new ."' WHERE `good_Id` =".$good_id;
mysql_query($sql);

echo "<script type=\"text/javascript\">alert('Order Accepted .. Please contact the costumer !');

		window.location='user.php?menu=msgs';
		</script>";
		
}
else{
echo "<script type=\"text/javascript\">alert('There's not enough item of this products !');

		window.location='good_det.php?id=$good_id';
		</script>";
}

}
else{
echo "<script type=\"text/javascript\">alert('Error Link !');

		window.location='index.php';
		</script>";

}

?>