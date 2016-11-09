<?php
 
    //Create Database connection
    require_once("config.php");
	$conn = mysql_connect(HOST,USERNAME,PASSWORD);

    if (!$conn) {
        die('Could not connect to db: ' . mysql_error());
    }
 
	$id=$_GET['rec'];
	$msgid=$_GET['msgid'];
    //Select the Database
	
	mysql_select_db(DATABASE_NAME,$conn);
 
    mysql_query("delete from `msgs` where `rec_id` = ".$id ." and `ID` =".$msgid);  
 
    
 
    mysql_close($conn);
    
	
echo "<script type=\"text/javascript\">

window.location = 'users.php?menu=msgs';
</script>"; 
 
 
 
?>