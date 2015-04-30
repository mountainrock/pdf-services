<?PHP
	session_start();
	include("../connection.php");
	
	if ($_SESSION['LoginID'] == '')
	{
		header('LOCATION: index.php');
	
	}
	
	$sqlsettings = "SELECT * from admin";
$resultsettings = mysql_query($sqlsettings);
$rowsettings = mysql_fetch_array($resultsettings);
	

$delete = "update users set ApprovalStatus=".$_REQUEST['status']." WHERE UserID=".$_REQUEST['UserID'];
mysql_query($delete);

	if($_REQUEST['status']==1)
	{	
	$subject="Your Profile has been approved..";
	$description="<br><br>Your Profile has been approved..";
	}
	else
	{
	$subject="Your Profile has been suspended..";
	$description="<br><br>Your Profile has been suspended..";
	}
	if($rowsettings['smtpstatus'] == 1)	
	{
	$to=$_REQUEST['email'];
	require("../phpmailer/class.phpmailer.php");	
	$mail = new PHPMailer();
	
	$mail->IsSMTP();            
	$mail->Host = $rowsettings['smtp'];
	$mail->Port = $rowsettings['port'];
	$mail->SMTPAuth = true;     
	$mail->Username = $rowsettings['AdminEmail'];
	$mail->Password = $rowsettings['AdminEmailPassword'];
	
	$mail->From = $rowsettings['AdminEmail'];
	$mail->FromName = $rowsettings['ScriptName'];
	$mail->AddAddress($to);  
	
	$mail->WordWrap = 50;  
	$mail->IsHTML(true);   
	
	$mail->Subject = $subject;
	$email_layout = "<br><br><table border='0' width='100%'><tr><Td colspan='2' background='".$rowsettings['url']."/images/footer_seprator.gif' height='2'></Td></tr></table><br><br>Dear Member, " . $description . "<br><br>Please click below to visit the site<br><br><a href='".$rowsettings['url']."'>".$rowsettings['url']."</a>";
	$mail->Body = $email_layout;
	$mail->Send();
	}
	else
	{
	$to=$_REQUEST['email'];
	$subject=$subject;
	$email_layout = "<br><br><table border='0' width='100%'><tr><Td colspan='2' background='".$rowsettings['url']."/images/footer_seprator.gif' height='2'></Td></tr></table><br><br>Dear Member, " . $description . "<br><br>Please click below to visit the site<br><br><a href='".$rowsettings['url']."'>".$rowsettings['url']."</a>";
	$description=$email_layout;
	$headers  = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	$headers .= "From: ".$rowsettings['ScriptName']." <".$rowsettings['AdminEmail'].">\r\n";

	$res=@mail($to,$subject,$description,$headers);
	}


header('LOCATION: grooms.php?msg=User Status has been Updated successfully..!');

?>