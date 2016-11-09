<?
$username = $_GET['username'];
$password = $_GET['password'];
$conn = mysql_connect("localhost", "$username", "$password");
mysql_select_db("first", $conn);
//create a query
$sql = "SELECT img_path FROM goods order by good_Id desc";
$result = mysql_query($sql, $conn);
//get row data as an associative array
$row = mysql_fetch_assoc($result);
				
foreach($row as $col=>$val)
echo '../' . $val;
?>