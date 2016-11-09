<?
require_once("config.php");
$conn = mysql_connect(HOST,USERNAME,PASSWORD);
mysql_select_db(DATABASE_NAME,$conn);
$cur_date=date('Y/m/d');
$user=$first.' '.$mid.' '.$last;



$sql = "select count from goods where good_Id=$id";

		$result = mysql_query($sql, $conn);
		$row=mysql_fetch_array($result,MYSQL_NUM);
		
		if( !$first or !$mid or !$last or !$mother or !$addr or !$phone or !$count ){
		echo "<script type=\"text/javascript\">alert('Empty Fields !');

		history.go(-1);
		</script>";
		}
		else if ($row[0]<$count)
		{
		echo "<script type=\"text/javascript\">alert('You are trying to order more than the maximum !');

		history.go(-1);
		</script>";
		}
		else{
		
		
		
		$sql = "insert into pending (good_id,first,mid,last,mother,address,phone,count,date) values ($id,'$first','$mid','$last','$mother','$addr','$phone',$count,'$cur_date')";
		$result = mysql_query($sql, $conn);
		
		
		
		 echo "<script type=\"text/javascript\">alert('Your Order has been submitted .. We will send you a confirmation message!');
		";
		
		$sql = "select ID from pending where good_id=$id order by ID desc";

		$result = mysql_query($sql, $conn);

		$row=mysql_fetch_array($result,MYSQL_NUM);
		
		$index=$row[0];
		
		$msg='The Costumer '.$user.'<br>His Mother : '.$mother.'<br>Wants to buy '.$count.' unit(s) of the product <a href="good_det.php?id='.$id.'" target="_blank">http://'.$_SERVER["SERVER_NAME"].'/good_det.php?id='.$id.' </a><br>Click on the link below to accept <br><a href="confirm_buy.php?id='.$index.'&t='.md5($user).'"><b>http://'.$_SERVER["SERVER_NAME"].'/confirm_buy.php?id='.$index.'&t='.md5($user).'</b></a><br>or Click this link to deny <a href="deny_buy.php?id='.$index.'&t='.md5($user).'">http://'.$_SERVER["SERVER_NAME"].'/deny_buy.php?id='.$index.'&t='.md5($user).'</a><br>Address : '. $addr.'<br>phone number : '.$phone.'<br>';
		
		$sql = "insert into msgs (rec_id,sender,content,send_email,send_date) values ($com_id,'$user','$msg','$email','$cur_date')";
		$result = mysql_query($sql, $conn);
		
		echo "window.location = 'products.php';
		</script>";
		
		
		
		}
?>