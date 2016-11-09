<?
@session_start();
$cid=$_SESSION["a"];
$signed=$_SESSION["signin"];

require_once("config.php");
$conn = mysql_connect(HOST,USERNAME,PASSWORD);
mysql_select_db(DATABASE_NAME,$conn);

$cur_date=date('Y/m/d');

if ($signed=="yes"){

if(!$name  or !$categ or !$price or !$desc or !$count or !$file){
echo "<script type=\"text/javascript\">alert('Empty Fields !');

history.go(-1);
</script>";

}


else{

$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 200000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    
    }
  else
    {
	
		$sql = "SELECT good_Id FROM goods order by good_Id desc";

		$result = mysql_query($sql, $conn);

		$row = mysql_fetch_array($result, MYSQL_NUM);

		$goodid = $row[0]+1;
		
		
      move_uploaded_file($_FILES["file"]["tmp_name"],"upload/$goodid.jpg");
    }
  }
else
  {
  
  }

//create a query
$sql = "insert into goods (com_id,good_name,good_type,price,description,offer_date,trans_ability,count,img_path) values ('$cid','$name','$categ','$price','$desc','$cur_date','$D1','$count','upload/$goodid.jpg')";

$result = mysql_query($sql, $conn);

echo "<script type=\"text/javascript\">alert('Upload Done !');
window.location = 'xml.php';
</script>";


}

}

else{

echo "<script type=\"text/javascript\">alert('You are not signed in!');

window.location = 'index.php';
</script>";


}


?>