<?php
 
    //Create Database connection
    require_once("config.php");
	$conn = mysql_connect(HOST,USERNAME,PASSWORD);
	
    if (!$conn) {
        die('Could not connect to db: ' . mysql_error());
    }
 
	$id=$_GET['rec'];
	$proid=$_GET['proid'];
    //Select the Database
    mysql_select_db(DATABASE_NAME,$conn);
 
    mysql_query("delete from `goods` where `com_id` = ".$id ." and `good_Id` =".$proid);
 
    
 
    mysql_close($conn);
    
 
 echo "<script language='javascript'>
window.location = 'user.php?menu=myPro';
</script>";
 
 
?>