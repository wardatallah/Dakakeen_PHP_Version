<?php
require_once("config.php");
$conn = mysql_connect(HOST,USERNAME,PASSWORD);
mysql_select_db(DATABASE_NAME,$conn);
$name=$_GET['name'];
$pass=md5($_GET['pass']);

$query  =  "select ID from users where user_name like '$name' and password like '$pass'";
$result = mysql_query($query);
$row=mysql_fetch_array($result,MYSQL_NUM);
if($row==null)
echo "null";
else
echo $row[0];

 /*
$server_response = array();
//$msgs = getMsgs();
$msgs=array('sender' => 'Ward','send_email' => 'wawa');
if(is_array($msgs)) {
$server_response=array('msgs' => $msgs, 'success' => 1);
//["msgs"] = $msgs;
//$server_response["success"] = 1;
print (json_encode($server_response));
}
function getMsgs() {
$query  =  "select sender,send_email from msgs";
$result = mysql_query($query);
if (!$result) {
die('Invalid query: ' . mysql_error());
}
while($row=mysql_fetch_array($result)) {
$msgs[] = $row;
}
return $msgs;
}*/
?>