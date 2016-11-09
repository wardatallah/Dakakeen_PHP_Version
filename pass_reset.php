<?
$email=$_POST['email'];

require_once("config.php");
$conn = mysql_connect(HOST,USERNAME,PASSWORD);
mysql_select_db(DATABASE_NAME,$conn);

$sql="select email,company_name from users where email like '$email'";

$result = mysql_query($sql, $conn);

$row = mysql_fetch_array($result, MYSQL_NUM);

$gotEmail = $row[0];
$name=$row[1];

if ($gotEmail!=null){

$gotEmail=md5($email);

$subject="Password Reset !";
$message="You have send us a request to reset your forgotten password .
</br>Click on the link below to reset your password.
</br>
<a href='reset_password.php?id=$gotEmail&name=$name'>RESET</a>";

// Please specify your Mail Server - Example: mail.example.com.
ini_set("SMTP","127.0.0.1");

// Please specify an SMTP Number 25 and 8889 are valid SMTP Ports.
ini_set("smtp_port",25);

// Please specify the return address to use
ini_set('sendmail_from', 'wardatallah6@hotmail.com');
echo $message;
//mail($email,$subject,$message,"From: Dakakeen Feedback\n");



}
else{

echo "<script type=\"text/javascript\">alert('This E_mail is not one of our records !');

history.go(-1);
</script>";

}
?>