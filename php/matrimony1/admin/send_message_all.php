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

	$sqlSeller = "SELECT * from users";
	$resultSeller= mysql_query($sqlSeller);

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
	while($row=mysql_fetch_array($resultSeller))
	{
		$to=$row['EmailAddress'];
		$mail->AddAddress($to);
	}
	$mail->WordWrap = 50;
	$mail->IsHTML(true);

	$mail->Subject = $subject;
	 $email_layout= '<font style="font-size:26pt;"><span style="color:#FF9D3D">GorBanjara </span><span style="color:#FC9E93">Matrimonial</span></font>';
	$email_layout .= "<table border='0' width='100%'><tr><Td colspan='2' background='".$rowsettings['url']."/images/footer_seprator.gif' height='2'></Td></tr></table><br><br>";
	$mail->Body = $email_layout.$description;
	$mail->Send();
	}
	else
	{
	while($row=mysql_fetch_array($resultSeller))
	{
	$to=$row['EmailAddress'];
	$subject=$subject;
	// $email_layout= '<font style="font-size:26pt;"><span style="color:#FF9D3D">GorBanjara </span><span style="color:#FC9E93">Matrimonial</span></font>';
	$email_layout = "<table border='0' width='100%'><tr><Td colspan='2' background='".$rowsettings['url']."/images/footer_seprator.gif' height='2'></Td></tr></table><br><br>";
	$description=$email_layout.$description;
	$headers  = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	$headers .= "From: ".$rowsettings['ScritName']." <".$rowsettings['AdminEmail'].">\r\n";

	$res=@mail($to,$subject,$description,$headers);
	}
	}
	header("Location: home.php?msg=Email has been sent to all members successfully...!");
	exit();
	}
?>

<?php
if ($_SESSION['LoginID'] == '' || $_SESSION['LoginID']!='admin')
	{
		header('LOCATION: index.php');

	}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>.:: Send Message to all users ::.</title>
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

		<Tr>

			<Td height='24' colspan="2" align="right" background='images/headCap.gif'>
				<span class="style1" >
					Welcome <?PHP echo $_SESSION['LoginID'] ?>! |
					<a href='home.php' class='topcap'>Home</a>|
					<a href='logout.php' class='topcap'>Logout</a>
				</span>
			</td>
		</Tr>

		<tr valign="top">
			<td width="218">
				<div style="margin-left:10px">
					<?PHP
					include("leftbar.php");
					?>
			 </div>
			</td>
   			<td width="781" align="center">
					<h1 style="text-align:center; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:18px; color:#990000; ">Send Message to all Members</h1>

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


								 <FORM name="frmform" action="send_message_all.php" method="post">
      <TABLE cellPadding=0 width="100%" align=ceneter border=0>
        <TBODY>
        <TR class=tblrow>
          <TD class=tblcell1>To :</TD>
          <TD class=tblcell2>All Members
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