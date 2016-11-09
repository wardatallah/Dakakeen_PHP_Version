<?
session_start();
require_once("config.php");
$conn = mysql_connect(HOST,USERNAME,PASSWORD);
mysql_select_db(DATABASE_NAME,$conn);

$id=$_POST['id'];
$name=$_POST['name'];
$categ=$_POST['categ'];
$price=$_POST['price'];
$desc=$_POST['desc'];
$D1=$_POST['D1'];
$count=$_POST['count'];



if(!$name or !$price or !$categ or !$desc or !$D1 or !$count ){
echo "<script type=\"text/javascript\">alert('Empty Fields !');

history.go(-1);
</script>";

}

else  {
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
      move_uploaded_file($_FILES["file"]["tmp_name"],"upload/$id.jpg");
    }
  }
else
  {
  
  }
	
	$img_path="upload/$id.jpg";
		$sql = "UPDATE goods SET `good_name` ='". $name ."' , `good_type` ='". $categ ."' , `price` = '". $price ."' , `description` ='". $desc ."' , `trans_ability` ='". $D1 ."' , `count` ='". $count ."' WHERE `good_Id` =".$id;
		
		
		
		mysql_query($sql);
		echo "<script type=\"text/javascript\">
		window.location='good_det.php?id=$id'</script>";
	}
	


?>