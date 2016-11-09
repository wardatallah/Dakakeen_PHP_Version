<?
require_once("config.php");
$conn = mysql_connect(HOST,USERNAME,PASSWORD);
mysql_select_db(DATABASE_NAME,$conn);
$id=mysql_real_escape_string($_REQUEST['id']);
$msgid=mysql_real_escape_string($_REQUEST['msgid']);
$sql = "UPDATE msgs set `done` =". 0 ." where `rec_id` = ".$id ." and `ID` =".$msgid;
mysql_query($sql);
echo "ID : " . $id . " MSGID : " . $msgid;

?>