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
	
	if(isset($_POST['continue']))
	{
		$to=$_REQUEST['Email'];
		$subject=mysql_escape_string($_POST['Subject']);
		$description=mysql_escape_string($_POST['Message']);
		
		if($rowsettings['smtpstatus'] == 1)
		{
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
	$email_layout = "<br><br><img src='".$rowsettings['url']."/images/matrimonial-logo-sm.gif'><br><table border='0' width='100%'><tr><Td colspan='2' background='".$rowsettings['url']."/images/footer_seprator.gif' height='2'></Td></tr></table><br><br>";
	$mail->Body = $email_layout.$description;
	$mail->Send();
	}
	else
	{
	$email_layout = "<br><br><img src='".$rowsettings['url']."/images/matrimonial-logo-sm.gif'><br><table border='0' width='100%'><tr><Td colspan='2' background='".$rowsettings['url']."/images/footer_seprator.gif' height='2'></Td></tr></table><br><br>";
	$description=$email_layout.$description;
	$headers  = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	$headers .= "From: ".$rowsettings['ScriptName']." <".$rowsettings['AdminEmail'].">\r\n";

	$res=@mail($to,$subject,$description,$headers);

	}
	header("Location: brides.php?msg=Email has been sent to ".$_REQUEST['Email']." successfully...!");
	exit();
	}

	
	
	$sqlSeller = "SELECT * from users where UserID=".$_REQUEST['UserID'];
	$resultSeller= mysql_query($sqlSeller);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>.:: Send Message to user ::.</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="style.css" rel="stylesheet" type="text/css">


<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>

<LINK href="adminstyle.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		theme : "simple"
	});
</script>

</head>
<body >
	<table width="1003" border="0" align="center" cellspacing="0">
		<Tr  align="center">
			<Td colspan="3">
				<table border="0" cellpadding="5" cellspacing="0" style="vertical-align:top">
					<Tr align="center">
						<Td  align="center" width="361"><img src="../images/matrimonial-logo-sm.gif"></Td>
					</Tr>
			  </table>
			</td>
		</Tr>
		<Tr>

			<Td height='24' colspan="2" align="right" background='images/headCap.gif'>
				<span class="style1" >
					Welcome <?PHP echo $_SESSION['LoginID'] ?>! |
					<a href='home.php' class='topcap'>Home</a>|
					<a href='logout.php' class='topcap'>Logout</a>
				</span>
			</td>
		</Tr>
		<Tr>
			<Td height='24' colspan="2" align="Center"> 

<div  style="font-weight:bold "class="style2">
		Welcome to Admin Control Panel
</div>


				
			</td>
		</Tr>
		<tr valign="top">
			<td width="218">
				<div style="margin-left:10px">
					<?PHP
					include("leftbar.php");
					
					if (@mysql_num_rows($resultSeller)!=0){
					$row = mysql_fetch_array($resultSeller);	
					}
					?>
			 </div>
			</td>
   			<td width="781" align="center">
					<h1 style="text-align:center; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:18px; color:#990000; ">Send Message to <?PHP echo $row['LoginID']?></h1>

<div style="text-align:center">
					<?PHP
						if(isset($_REQUEST['msg']))
						{
					?>
						<p align="center" class="redbold"><br>

							<?PHP echo $_REQUEST['msg']?><br>
<br>

						</p>
					<?PHP
						}
					?>
					
				</div>


								 <FORM name="frmform" action="send_message.php" method="post">
      <TABLE cellPadding=0 width="100%" align=ceneter border=0>
        <TBODY>
        <TR class=tblrow>
          <TD class=tblcell1>To :</TD>
          <TD class=tblcell2><input type="text" name="Email" size="70" value="<?PHP echo $row['EmailAddress']; ?>">
          </TD></TR>	
		  
		   <TR class=tblrow>
          <TD class=tblcell1>Subject :</TD>
          <TD class=tblcell2><input type="text" name="Subject" size="70">
          </TD></TR>		  
  
		  <TR class=tblrow>
          <TD class=tblcell1>Message :</TD>
          <TD class=tblcell2><textarea id="Message" name="Message" rows="15" cols="80" style="width: 95%"></textarea></TD></TR>
		  
		  
        <TR class=tblrow>
          <TD class=tblcell1></TD>
          <TD class=tblcell2><input type="hidden" name="continue" value="true"><INPUT class=bttn type=submit value="Send Email" name=Submit></TD></TR></TBODY></TABLE></FORM></TD></TR></TBODY></TABLE>

			</td>
		</tr>
		<tr>
		</tr>
</table>
</body>
</html>