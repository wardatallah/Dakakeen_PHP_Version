<?php
 
    //Create Database connection
    require_once("config.php");
	$conn = mysql_connect(HOST,USERNAME,PASSWORD);
	
    if (!$conn) {
        die('Could not connect to db: ' . mysql_error());
    }
 
    //Select the Database
    mysql_select_db(DATABASE_NAME,$conn);
 
    $result = mysql_query("select * from goods order by good_Id desc", $conn);  
 
    //Create SimpleXMLElement object
    $xml = new SimpleXMLElement('<xml/>');
 
    //Add each column value a node of the XML object
    while($row = mysql_fetch_assoc($result)) {
        $mydata = $xml->addChild('good');
		$mydata->addAttribute('ID',$row['good_Id']);
        $mydata->addAttribute('Name',$row['good_name']);
		$mydata->addAttribute('Type',$row['good_type']);
		$mydata->addAttribute('Path',$row['img_path']);
        
    }
 
    mysql_close($conn);
    //Create the XML file
    $fp = fopen("goods.xml","wb");
 
    //Write the XML nodes
    fwrite($fp,$xml->asXML());
 
    //Close the database connection
    fclose($fp);
 
 echo "<script type=\"text/javascript\">
window.location = 'user.php?menu=myPro';
</script>";
 
?>