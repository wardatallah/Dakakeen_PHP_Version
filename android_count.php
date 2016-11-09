<?
require_once("config.php");
$conn = mysql_connect(HOST,USERNAME,PASSWORD);
mysql_select_db(DATABASE_NAME,$conn);
$id=mysql_real_escape_string($_REQUEST['id']);
$sql = "SELECT count(done) FROM msgs where rec_id=$id and done=1";

$result = mysql_query($sql);
$row=mysql_fetch_array($result,MYSQL_NUM);

echo $row[0];

?>