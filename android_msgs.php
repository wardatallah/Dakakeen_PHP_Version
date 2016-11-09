<?
require_once("config.php");
$conn = mysql_connect(HOST,USERNAME,PASSWORD);
mysql_select_db(DATABASE_NAME,$conn);

$id=$_GET['id'];

$sql="select sender,send_email,content,ID,done from msgs where rec_id=$id order by ID desc";
$msgs=array();
$result=mysql_query($sql,$conn);
$count=0;
while($row=mysql_fetch_array($result,MYSQL_NUM)){
$msgs[$count]=array('sender' => $row[0],'send_email' => $row[1],'content' =>$row[2],'ID' =>$row[3],'done' =>$row[4]);
$count++;
}
//array('sender' => $row[0],'send_email' => $row[1]);
$response["msgs"]=$msgs;
$response["success"]=1;
echo json_encode($response);


?>