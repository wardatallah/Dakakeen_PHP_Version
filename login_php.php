<?
session_start();


$user=$_POST['user']; 
$pass=$_POST['pass'];
$type=$_POST['type'];


require_once("config.php");
$conn = mysql_connect(HOST,USERNAME,PASSWORD);
mysql_select_db(DATABASE_NAME,$conn);
//create a query

if(!$user or !$pass){
session_destroy();
echo "<script type=\"text/javascript\">alert('Empty Fields !');

window.location = 'sign_in.php';
</script>";

}
if ($type=="user"){
$sql = "SELECT password FROM users Where user_name='$user'";

$result = mysql_query($sql, $conn);

$row = mysql_fetch_array($result, MYSQL_NUM);
// Get the first column (you should only have one column anyway) and put it into your variable
$checkPass = $row[0];





$pass=md5($pass);


if($checkPass!=$pass){
	echo "<script type=\"text/javascript\">alert('Incorrect Username / Password !!!');

	window.location = 'sign_in.php';
	</script>";
}
	
else{

	$sql = "SELECT name FROM blocked Where name='$user'";

	$result = mysql_query($sql, $conn);

	$row = mysql_fetch_array($result, MYSQL_NUM);
	
	if($row[0]==$user)
		echo "<script type=\"text/javascript\">alert('You Have Been Blocked !!!');

	history.go(-1);
	</script>";
	else{
		$sql = "SELECT ID,activated FROM users Where user_name='$user'";

		$result = mysql_query($sql, $conn);

		$row = mysql_fetch_array($result, MYSQL_NUM);
		
		
		$getid = $row[0];
		$activated=$row[1];
		
		if ($activated==1){
			echo "<script type=\"text/javascript\">alert('You are not activated yet ... Please check your inbox!');

			window.location = 'sign_in.php';
		</script>";
		}
		else{
		$sql = "SELECT count(done) FROM msgs where rec_id=$getid and done=1";

		$result = mysql_query($sql, $conn);
		
		$row = mysql_fetch_array($result, MYSQL_NUM);
		
		$unread=$row[0];
		
		$_SESSION["type"]="user";
		$_SESSION["a"] = "$getid";
		$_SESSION["username"] = "$user";
		$_SESSION["signin"] = "yes";
		$_SESSION["unread"]="$unread";
		
		echo "<script type=\"text/javascript\">
			history.go(-1);
			</script>";
		
		}
		
		}
	}
}
else{

$sql = "SELECT pass FROM admin Where name='$user'";

$result = mysql_query($sql, $conn);

$row = mysql_fetch_array($result, MYSQL_NUM);
// Get the first column (you should only have one column anyway) and put it into your variable
$checkPass = $row[0];





if($checkPass!=$pass){
	echo "<script type=\"text/javascript\">alert('Incorrect Username / Password !!!');

	history.go(-1);
	</script>";
}
	
else{

	
		$sql = "SELECT ID FROM admin Where name='$user'";

		$result = mysql_query($sql, $conn);

		$row = mysql_fetch_array($result, MYSQL_NUM);
		
		
		$getid = $row[0];
		
		$sql = "SELECT count(done) FROM adminmsgs where done=1";

		$result = mysql_query($sql, $conn);
		
		$row = mysql_fetch_array($result, MYSQL_NUM);
		
		$unread=$row[0];
		
		$_SESSION["type"]="admin";
		$_SESSION["a"]="$getid";
		$_SESSION["username"] = "$user";
		$_SESSION["signin"] = "yes";
		$_SESSION["unread"]="$unread";
		$_SESSION["isAdmin"]="yes";
		
		echo "<script type=\"text/javascript\">
			history.go(-1);
			</script>";
		
	}

}
	
?>
