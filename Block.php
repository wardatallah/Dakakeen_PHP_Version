<?
session_start();
$user=$_GET['name'];
$isAdmin=$_SESSION['isAdmin'];

if ($isAdmin=="yes")
{

require_once("config.php");
$conn = mysql_connect(HOST,USERNAME,PASSWORD);
mysql_select_db(DATABASE_NAME,$conn);

//create a query
$sql = "insert into blocked (name) values ('$user')";

$result = mysql_query($sql, $conn);

echo "<script type=\"text/javascript\">alert('Block Done !');

history.go(-1);
</script>";

}
else
{
echo "<script language='javascript'>alert(\"Go out idiot\");
window.location = 'index.php';
</script>";

}

?>