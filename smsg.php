<?
@session_start();


require_once("config.php");
$conn = mysql_connect(HOST,USERNAME,PASSWORD);
mysql_select_db(DATABASE_NAME,$conn);
$cur_date=date('Y/m/d');

if ($_SESSION['isAdmin']=="yes"){

$user="Admin";
$iduser=$_POST["iduser"];
$msg=$_POST["msg"];
$email="admin@dakakeen.tk";



if(!$user or !$iduser or !$msg ){
echo "<script type=\"text/javascript\">alert('Empty Fields !');

history.go(-1);
</script>";
}
else{


//create a query
$sql = "insert into msgs (rec_id,sender,content,send_email,send_date) values ($iduser,'$user','$msg','$email','$cur_date')";

$result = mysql_query($sql, $conn);

echo "<script type=\"text/javascript\">

window.location = 'admin.php?menu=msgs';
</script>"; 
}

}
else {

$user=$_POST["user"];
$email=$_POST["email"];
$msg=$_POST["msg"];








if(!$user  or !$email or !$msg ){
echo "<script type=\"text/javascript\">alert('Empty Fields !');

history.go(-1);
</script>";

}


else{


//create a query
$sql = "insert into adminmsgs (sender,content,send_email,send_date) values ('$user','$msg','$email','$cur_date')";

$result = mysql_query($sql, $conn);

echo "<script type=\"text/javascript\">

window.location = 'contacts.php';
</script>"; 
}
}
?>