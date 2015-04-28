<?PHP
session_start();
include("connection.php");

$sqlsettings = "SELECT * from admin";
$resultsettings = mysql_query($sqlsettings);
$rowsettings = mysql_fetch_array($resultsettings);

$msg = "";
if($_REQUEST['continue'] == "true")
{

if($rowsettings['smtpstatus'] == 1)
{
require("phpmailer/class.phpmailer.php");

	$mail = new PHPMailer();

	$mail->IsSMTP();
	$mail->Host = $rowsettings['smtp'];
	$mail->Port = $rowsettings['port'];
	$mail->SMTPAuth = true;
	$mail->Username = $rowsettings['AdminEmail'];
	$mail->Password = $rowsettings['AdminEmailPassword'];

	$mail->From = $rowsettings['AdminEmail'];
	$mail->FromName = $rowsettings['ScriptName'];
	$mail->AddAddress($rowsettings['AdminEmail']);


	$mail->WordWrap = 50;                                 // set word wrap to 50 characters
	$mail->IsHTML(true);                                  // set email format to HTML

	$mail->Subject = "Contact Us form submitted";
	$mail->Body = "Name: ".$_REQUEST['name']."<br><br>Email: ".$_REQUEST['email']."<br><br>Message: ".$_REQUEST['message'];
	$mail->Send();
}
else
{
	$to=$rowsettings['AdminEmail'];
	$subject="Contact Us form submitted";
	$description="Name: ".$_REQUEST['name']."<br><br>Email: ".$_REQUEST['email']."<br><br>Message: ".$_REQUEST['message'];
	$headers  = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	$headers .= "From: ".$rowsettings['ScriptName']." <".$rowsettings['AdminEmail'].">\r\n";

	$res=@mail($to,$subject,$description,$headers);
}

	$msg = "Thanks for contacting us...";
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<?php include("common/includes_static.php"); ?>
<?php include("common/constants.php"); ?>
<meta name="description" content="Lambani Matrimonial, Lambani Matrimonials, Lambani Matrimony,Gor Banjara matrimonial Banjara Matrimony, Find Lakhs of Banjara Brides &amp; Grooms on gorbanjara.net marrybanjara.com - Join FREE" />
<meta name="keywords" content="Gor Banjara matrimonial, Lambani Matrimonial, Lambani Matrimonials, Lambani Matrimony,Gor Banjara matrimonial Banjara Matrimony,Gor Banjara matrimonial Matrimonial, Banjara Matrimonials, Banjara Matrimony, marrybanjara.com" />
<meta name="Author" content="gorbanjara.net Lambani Matrimonial Team" />
<meta name="copyright" content="gorbanjara.net Matrimonials" />

<title><? echo $kSiteName." - ".$kSiteTitle; ?></title>

</head>
<body style="margin: 0px;">

<center>

<?php include("sections/site-title.php"); ?>





		<div class="smallcnt width">

			<div class="left tleft">

			</div>
		<!-- FORM ST -->

		<div class="right tright" style="width: 192px;"><!-- right top header --></div><br clear="all">
		<!-- FORM EN-->
	</div>

		<div class="smallcnt width" style=" background-color:#EE1E2C; padding-top:6px;padding-bottom:6px">
			<div class="left tleft" style="width: 10px;"><br></div>
			<div class="left tleft" style="">

	<?php
if($_SESSION['UserID']!="")
{
?>
<br>
<table>
<tr>
	<td><a href="index.php" title="My Account" style="color:#F1F1F1;border-right:1px solid #FFF;"><strong>Home&nbsp;</strong></a> </td>
	<td><a href="gothras.php" title="Gothras" style="color:#F1F1F1;border-right:1px solid #FFF;"><strong>Gothras&nbsp;</strong></a></td>
	<td><a href="contactus.php" title="Log Out" style="color:#F1F1F1;"><strong>Contact Us&nbsp;</strong></a></td>
	<td width="300">&nbsp;</td>
	<td><a href="myaccount.php" title="My Account" style="color:#F1F1F1;border-right:1px solid #FFF;"><strong>My Account&nbsp;</strong></a> </td>
	<td><a href="my_profile.php" title="My Profile" style="color:#F1F1F1;border-right:1px solid #FFF;"><strong>My Profile&nbsp;</strong></a> </td>
	<td><a href="logout.php" title="Log Out" style="color:#F1F1F1;"><strong>Logout [<?PHP echo $_SESSION['Name']?>]</strong></a></td>
</tr>
</table>
<?php
}
else
{
?>
<?php include("sections/default-menu.php"); ?>
		<?php
}
?>

			</div>
		<!-- FORM ST -->

		<br clear="all">
		<!-- FORM EN-->
	</div>
	<div class="width smallcnt">
		
	</div>
	<!-- MAIN CREATIVE EN-->
</div>
<div align="center">
<table bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="762">
<tbody><tr>
<td rowspan="2" bgcolor="#8fa7bf" width="1"><spacer type="block" height="1" width="1"></td>
<td height="1" width="5"><spacer type="block" height="1" width="5"></td>
<td align="center" bgcolor="#FFF7E7" valign="top" width="170"><span style="line-height: 5px;"><br></span>
<!-- LEFT BANNER STARTS HERE -->
<?PHP
 include "myleftbar.php";
?>
<!-- LEFT BANNER ENDS HERE -->
</td>
<td height="1" width="10"><spacer type="block" height="1" width="10"></td>
<td valign="top" align="left"> <p><strong>Contact US</strong></p>

<?PHP
if($msg!="")
{
?>
<p style="font:'Times New Roman', Times, serif; color:#990000">
  	<b><?PHP echo $msg?></b>
</p>
<?PHP
}
?>

  <p>As a member, you can contact us in the following ways:
  </p>
  <ul>
    <li>Email: <?PHP echo str_replace('@','[AT]',$rowsettings['AdminEmail']) ?></li>

</ul>

  <form method="post" action="contactus.php" name="frmcontactus" onSubmit="return validateform(this);">
<div class="boldgreen" style="color:#990000 "><b>Contact Us by submit this form:</b></div>

			<table class="tbl1" style="margin-left: 1px;" border="0" cellpadding="5" cellspacing="0" width="500">
			<tbody>
			<tr valign="top">
					<td class="td1" valign="top">
					<strong>Your Name:</strong> <input type="text" name="name" size="40">
				</td>
			</tr>

				<tr valign="top">
					<td class="td1" valign="top">
					<strong>Your Email:&nbsp;</strong> <input type="text" name="email" size="40">
				</td>
			</tr>
			<tr valign="top">
					<td class="td1" valign="top">
					<strong>Message:</strong><br>
				<textarea name="message" id="message" rows="8" cols="50"></textarea>
				<br> <input type="hidden" name="continue" value="true">
<input type="image" src="images/submit.gif">
				</td>
			</tr>

			</tbody></table>
</form><br>

</td>
<td width="5"><spacer type="block" width="5"></td>
<td rowspan="2" align="right" bgcolor="#8fa7bf" valign="top" width="1"><spacer type="block" width="1"></td>
</tr>
<tr bgcolor="#8fa7bf" valign="top">
	<td colspan="5" height="1"><spacer type="block" height="1" width="1"></td>
</tr>
</tbody></table>
</div>

		<!-- BTM BANNER STARTS-->
		<center>

		<?PHP
			include("footer.php");
		?>
		</center>
</body></html>