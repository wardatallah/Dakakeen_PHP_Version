<?
session_start();
require_once("config.php");
$conn = mysql_connect(HOST,USERNAME,PASSWORD);
mysql_select_db(DATABASE_NAME,$conn);



//$cur_date=date('Y/m/d');
//$mk_date=mktime(0,0,0,date("m")+$R1,date("d"),date("Y"));

//$exp_date=date("Y/m/d", $mk_date);



if(!$name or !$addr or !$categ or !$phone or !$email or !$user or !$pass or !$cpass ){
echo "<script type=\"text/javascript\">alert('Empty Fields !');

history.go(-1);
</script>";

}
else if ($pass!=$cpass){
echo "<script type=\"text/javascript\">alert('Confirm Password Error !');

history.go(-1);
</script>";
//sleep (5);
}


else{

$user=$_POST['user']; 
// check if email exist
$sql = "SELECT email FROM users Where email='$email'";

$result = mysql_query($sql, $conn);

$row = mysql_fetch_array($result, MYSQL_NUM);
// Get the first column (you should only have one column anyway) and put it into your variable
$checkmail = $row[0];

if ( $checkmail!=null){
echo "<script type=\"text/javascript\">alert('This E_mail has been registered !');

window.location = 'forgot_pass.php';
</script>";
}
else {

// check if username exist
$sql = "SELECT user_name FROM users Where user_name='$user'";

$result = mysql_query($sql, $conn);

$row = mysql_fetch_array($result, MYSQL_NUM);
// Get the first column (you should only have one column anyway) and put it into your variable
$checkuser = $row[0];

if ( $checkuser!=null){
echo "<script type=\"text/javascript\">alert('This user name is not available!');

window.location = 'index.php';
</script>";
}

else { // register the new user
$pass1=$_POST['pass']; 
$pass=md5($pass1);

//create a query
$sql = "insert into users (company_name,address,category,phone,email,user_name,password) values ('$name','$addr','$categ','$phone','$email','$user','$pass')";

$result = mysql_query($sql, $conn);


$gotEmail=md5($email);

$subject="Activation !";
$message="This is an activation message from Dakakeen.tk .
</br>Click on the link below to activate your account.
</br>
<a href='confirm_activation.php?id=$gotEmail&name=$user'>Link</a>";

// Please specify your Mail Server - Example: mail.example.com.
ini_set("SMTP","127.0.0.1");

// Please specify an SMTP Number 25 and 8889 are valid SMTP Ports.
ini_set("smtp_port",25);

// Please specify the return address to use
ini_set('sendmail_from', 'wardatallah6@hotmail.com');


echo "<script type=\"text/javascript\">alert('We sent you a confirmation link .. Check your E_mail inbox!');

</script>";

echo $message;
} // 

}

}


?>
