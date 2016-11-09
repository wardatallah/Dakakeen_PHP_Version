<?
@session_start();

require_once("config.php");
$conn = mysql_connect(HOST,USERNAME,PASSWORD);
mysql_select_db(DATABASE_NAME,$conn);

$cur_date=date('Y/m/d');

$id=$_GET["id"];

$msg='Someone Report Product #'.$id.' <br>Please Check the Product :<br><a href="good_det.php?id='.$id.'" target="_blank">http://'.$_SERVER["SERVER_NAME"].'/good_det.php?id='.$id.'</a>';
//create a query
$sql = "insert into adminmsgs (sender,content,send_email,send_date) values ('Reporter','$msg','reporter@dakakeen.tk','$cur_date')";

$result = mysql_query($sql, $conn);

echo "<script type=\"text/javascript\">alert('Report has been sent .. Thanks for your feedback !');

		window.location='products.php';
		</script>";


?>