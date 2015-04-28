<?PHP
session_start();
include("connection.php");

$sqlsettings = "SELECT * from admin";
$resultsettings = mysql_query($sqlsettings);
$rowsettings = mysql_fetch_array($resultsettings);


$msg = "";

if($_REQUEST['writemsg'] == "true")
	{
		$sql_messages = "insert into messages (SenderID, RecieverID, Message, MessageDate)
			 values('".mysql_escape_string($_SESSION['LoginID'])."', '".mysql_escape_string($_REQUEST['id'])."', '".mysql_escape_string($_REQUEST['Message'])."', NOW())";
		$result_messagesent = mysql_query($sql_messages);

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
	$mail->AddAddress($_REQUEST['ToEmailAddress']);


	$mail->WordWrap = 50;                                 // set word wrap to 50 characters
	$mail->IsHTML(true);                                  // set email format to HTML

	$mail->Subject = "You have recieved a private message";

	$email_layout = "<br><br><img src='".$rowsettings['url']."/images/matrimonial-logo-sm.gif'><br><table border='0' width='100%'><tr><Td colspan='2' background='".$rowsettings['url']."/images/footer_seprator.gif' height='2'></Td></tr></table><br><br><br>Dear ". mysql_escape_string($_REQUEST['id']) . ",<br><br>You have recieved a private message  from ". mysql_escape_string($_SESSION['LoginID']) . "<br><br>please login to ".$rowsettings['url']." to check your message.";

	$mail->Body = $email_layout;
	$mail->Send();
	}
	else
	{
	$to= $_REQUEST['ToEmailAddress'];
	$subject="You have recieved a private message";
	$email_layout = "<br><br><img src='".$rowsettings['url']."/images/matrimonial-logo-sm.gif'><br><table border='0' width='100%'><tr><Td colspan='2' background='".$rowsettings['url']."/images/footer_seprator.gif' height='2'></Td></tr></table><br><br><br>Dear ". mysql_escape_string($_REQUEST['id']) . ",<br><br>You have recieved a private message  from ". mysql_escape_string($_SESSION['LoginID']) . "<br><br>please login to ".$rowsettings['url']." to check your message.";
	$description=$email_layout;
	$headers  = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	$headers .= "From: ".$rowsettings['ScriptName']." <".$rowsettings['AdminEmail'].">\r\n";

	$res=@mail($to,$subject,$description,$headers);

	}

$msg = "Your Message has been sent successfully and recipient has been notified about your message..";
	}




else if($_REQUEST['interest'] == "true")
	{
		$sql_messages = "insert into interests (SenderID, RecieverID, MessageDate)
			 values('".mysql_escape_string($_SESSION['UserID'])."', '".mysql_escape_string($_REQUEST['id'])."', NOW())";
		$result_messagesent = mysql_query($sql_messages);


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
	$mail->AddAddress($_REQUEST['ToEmailAddress']);


	$mail->WordWrap = 50;                                 // set word wrap to 50 characters
	$mail->IsHTML(true);                                  // set email format to HTML

	$mail->Subject = "A Member Expressed interest in your profile";

	$email_layout = "<br><br><img src='".$rowsettings['url']."/images/matrimonial-logo-sm.gif'><br><table border='0' width='100%'><tr><Td colspan='2' background='".$rowsettings['url']."/images/footer_seprator.gif' height='2'></Td></tr></table><br><br><br>Dear ". mysql_escape_string($_REQUEST['id']) . ",<br><br>You have recieved an express of interest from ". mysql_escape_string($_SESSION['LoginID']);

	$mail->Body = $email_layout;
	$mail->Send();
	}
	else
	{
	$to= $_REQUEST['ToEmailAddress'];
	$subject="A Member Expressed interest in your profile";
	$email_layout = "<br><br><img src='".$rowsettings['url']."/images/matrimonial-logo-sm.gif'><br><table border='0' width='100%'><tr><Td colspan='2' background='".$rowsettings['url']."/images/footer_seprator.gif' height='2'></Td></tr></table><br><br><br>Dear ". mysql_escape_string($_REQUEST['id']) . ",<br><br>You have recieved an express of interest from ". mysql_escape_string($_SESSION['LoginID']);
	$description=$email_layout;
	$headers  = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	$headers .= "From: ".$rowsettings['ScriptName']." <".$rowsettings['AdminEmail'].">\r\n";

	$res=@mail($to,$subject,$description,$headers);

	}

$msg = "<div style='color:#e12328;font-weight:bold;border:1px dotted #000;padding:5px'> Thanks for showing your interest in this member profile. The recipient has been notified about your interest.. We wish you good luck finding your perfect Match..! </div>";
	}




$sql = "SELECT * FROM users, user_profile, countries WHERE users.UserID=user_profile.UserID and users.CountryID=countries.CountryID and users.UserID='".mysql_escape_string($_REQUEST['id'])."' and users.Status=1 and users.ApprovalStatus=1";
$result = mysql_query($sql,$conn);
if(@mysql_num_rows($result)!=0)
{
$row = @mysql_fetch_array($result);

$sqlpartner = "SELECT * FROM users, partner_profile WHERE users.UserID=partner_profile.UserID and users.UserID='".mysql_escape_string($_REQUEST['id'])."'  and users.Status=1 and users.ApprovalStatus=1";
$resultpartner = mysql_query($sqlpartner,$conn);
$rowp = @mysql_fetch_array($resultpartner);
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Marry Banjara - <?PHP echo $row['LoginID'] ?>'s Profile</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/main.css">
</head>

<body topmargin="2" leftmargin="0" marginheight="2" marginwidth="0" background="images/background.jpg">

<script language="javascript" src="js/profile.js"></script>
			<center>

				<!-- The top link table starts here -->
				<div style="width: 762px;" align="right">
					<?PHP
					include("topheader.php");
					?>
				</div>

			</center>

<div align="center">
<table bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="762">
<tbody><tr>
<td rowspan="2" bgcolor="#8fa7bf" width="1"><spacer type="block" height="1" width="1"></td>
<td height="1" width="5"><spacer type="block" height="1" width="5"></td>
<td align="center" bgcolor="#fff7e7" valign="top" width="170"><span style="line-height: 5px;"><br></span>
<!-- LEFT BANNER STARTS HERE -->
<?PHP
 include "myleftbar.php";
?>
<!-- LEFT BANNER ENDS HERE -->
</td>
<td height="1" width="10"><spacer type="block" height="1" width="10"></td>
<td align="left" valign="top">
<!-- CENTER STARTS HERE -->
<?PHP
if(@mysql_num_rows($result)!=0)
{

echo $msg;
?>


		<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tbody><tr>
		<td height="7" width="350"><spacer type="block" height="7" width="350"></td>
		<td width="220"><spacer type="block" width="220"></td>
		</tr>

			<tr>
			<td align="left"><h2>Profile&nbsp;</h2></td>
			<td align="right">&nbsp;		</td>
			</tr>
		<tr><td colspan="2" bgcolor="#8fa7bf" height="1" width="1"><spacer type="block" height="1" width="1"></td></tr>
		<tr><td colspan="2" height="8" width="1"><spacer type="block" height="8" width="1"></td></tr>
		</tbody></table>






<!-- The 1st center content table start's here -->
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody><tr>
<td height="8" width="243"><spacer type="block" height="8" width="243"></td>
<td rowspan="2" height="8" width="10"><spacer type="block" height="8" width="10"></td>
<td height="8" width="140"><spacer type="block" height="8" width="140"></td>
<td rowspan="2" height="8" width="10"><spacer type="block" height="8" width="10"></td>
<td height="8" width="167"><spacer type="block" height="8" width="167"></td>
</tr>


<tr>
<td valign="top">
<table border="0" cellpadding="0" cellspacing="0" width="95%">
<tbody><tr align="left" valign="top">
	<td width="100%" height="20" colspan="2" class="largeblackbold"><?PHP echo $row['Name'] ?></td>
</tr>
<tr>
	<td align="left" nowrap="nowrap" width="4"><img src="images/arrow-grn-4x7.gif" border="0" height="7" width="4"></td>
	<td height="22" align="left" class="mediumblack"><font class="mediumgreenbold" style="color:#990000; ">Posted by:</font> <?PHP echo $row['CreatedBy']?></td>
</tr>
<tr><td colspan="2" bgcolor="#e5e5e5" height="1"></td></tr>
<tr><td colspan="2" bgcolor="#e5e5e5" height="1"></td></tr>
</tbody></table>
<table border="0" cellpadding="0" cellspacing="4" width="95%">
<tbody><tr><td height="1"><spacer type="block" height="1"></td></tr>
<tr>
<td align="left" class="smallblack">
<?PHP
if($row['CreatedBy']!="Self" && $row['Gender']=="Male")
echo "He is ";
else if($row['CreatedBy']!="Self" && $row['Gender']=="Female")
echo "She is ";
else
echo "I am ";
?>
<?PHP echo GetAge($row['BirthYear'], $row['BirthMonth'], $row['BirthDate'])?>, <?PHP echo $row['MaritalStatus']?>, <?PHP echo $row['Caste']?> <?PHP echo $row['Gender']?> living in <?PHP

$sqlstate = "SELECT * FROM user_profile, users, states WHERE users.UserID=user_profile.UserID and users.LoginID='".mysql_escape_string($_REQUEST['id'])."' and user_profile.StateID=states.StateID and users.Status=1 and users.ApprovalStatus=1";
$resultstate = mysql_query($sqlstate,$conn);
$rowstate = @mysql_fetch_array($resultstate);
if(@mysql_num_rows($resultstate) != 0)
{
 echo $rowstate['State'].", ";
}
 ?> <?PHP echo $row['Country']?><br>
<br><font class="mediumblack">
<?PHP
echo substr(stripslashes($row['AboutYourself']),0,100);
?></font> <a href="#more" class="mediumbluelinksp">More...</a></td>
</tr>
</tbody></table>
</td>


	<td valign="middle">	<table bgcolor="#d7d7d7" border="0" cellpadding="2" cellspacing="1" width="100%">
	<tbody><tr bgcolor="#ffffff">
		<td align="left"><img src="images/arrow-profile.gif" align="middle" border="0" height="5" hspace="0" width="6">&nbsp; <a href="#contact" class="smallbluelink" style="color:#000066;"><b>View Contact Details</b></a></td>
	</tr>
	<tr bgcolor="#ffffff">
		<td align="left"><img src="images/arrow-profile.gif" align="middle" border="0" height="5" hspace="0" width="6">&nbsp; <a href="#basics" class="smallbluelink" style="color:#000066;">View Personal Profile</a></td>
	</tr>
	<tr bgcolor="#ffffff">
		<td align="left"><img src="images/arrow-profile.gif" align="middle" border="0" height="5" hspace="0" width="6">&nbsp; <a href="#partner" class="smallbluelink" style="color:#000066;">View Partner Profile</a></td>
	</tr>
	<tr bgcolor="#ffffff">
		<td align="left"><img src="images/arrow-profile.gif" align="middle" border="0" height="5" hspace="0" width="6">&nbsp; <a href="#interest" class="smallbluelink" style="color:#000066;">Express Interest</a></td>
	</tr>

	<tr bgcolor="#ffffff">
		<td align="left"><img src="images/arrow-profile.gif" align="middle" border="0" height="5" hspace="0" width="6">&nbsp; <a href="#message" class="smallbluelink" style="color:#000066;">Write Message</a></td>
	</tr>

	</tbody></table>
</td>

<td align="center" height="210" valign="middle" width="160"><div style="border: 1px solid rgb(192, 192, 192); padding: 5px;">
<?PHP
if($row['photo2'] != "")
{
?>
<a href="javascript:popImg('<?=stripslashes($row['photo1'])?>');"><img src="<?PHP echo $row['photo2']?>" border="0" height="200" width="150"></a>
<?PHP
}
else
{
?>
<img src="<?PHP
				if($row['Gender']!="Male")
				echo "images/rf.gif";
				else
				echo "images/rm.gif";
				?>" border="0" height="200" width="150">
<?PHP
}
?>
</div></td>
</tr>
</tbody></table>
<!-- The 1st center content table end's here -->


<a name="basics"></a>
<!-- The 2nd center content table start's here -->
<table border="0" cellpadding="0" cellspacing="0" width="100%">

<tbody><tr><td colspan="3" class="mediumblack"><br></td></tr>

<tr align="left">
<td height="22" colspan="3"  style="background-color:#600;padding:3px" class="largewhitebold">&nbsp;
About Myself</td>
</tr>
<tr>
<td colspan="3" height="8"><spacer type="block" height="8" width="1"></td>
</tr>
<tr>
<td valign="top">




<table bgcolor="#FFF7FF" border="0" cellpadding="0" cellspacing="0" width="280">
<tbody><tr align="left" bgcolor="#ffffff">
<td height="16" colspan="5" valign="middle" class="mediumblackbold">&nbsp;&nbsp;My Basics</td>
</tr>
<tr align="left" bgcolor="#ffffff">
<td width="8" height="1" bgcolor="#8fa7bf"><spacer type="block" height="1" width="8"></td>
<td width="106" height="1" bgcolor="#8fa7bf"><spacer type="block" height="1" width="106"></td>
<td width="8" height="1" bgcolor="#8fa7bf"><spacer type="block" height="1" width="8"></td>
<td width="150" height="1" bgcolor="#8fa7bf"><spacer type="block" height="1" width="150"></td>
<td width="8" height="1" bgcolor="#8fa7bf"><spacer type="block" height="1" width="8"></td>
</tr>
<tr align="left">
<td class="mediumblack"><br></td>
<td valign="top" class="mediumblack">Age</td>
<td valign="top" class="mediumblack">:</td>
<td valign="top" class="mediumblack"><?PHP echo GetAge($row['BirthYear'], $row['BirthMonth'], $row['BirthDate'])?></td>
<td class="mediumblack"><br></td>
</tr>
<?PHP
		if ($row['dobstatus']==1)
		{
		?>
	<tr align="left">
	<td class="mediumblack"><br></td>
	<td valign="top" class="mediumblack">Date of Birth</td>
	<td valign="top" class="mediumblack">:</td>
	<td valign="top" class="mediumblack"><?PHP echo date("M j, Y",strtotime($row['BirthMonth']."/".$row['BirthDate']."/".$row['BirthYear']))?></td>
	<td class="mediumblack"><br></td>
	</tr>
	<?PHP
}
		?>
<tr align="left">
<td class="mediumblack"><br></td>
<td valign="top" class="mediumblack">Marital Status</td>
<td valign="top" class="mediumblack">:</td>
<td valign="top" class="mediumblack"><?PHP echo $row['MaritalStatus']?></td>
<td class="mediumblack"><br></td>
</tr>
<tr align="left">
<td class="mediumblack"><br></td>
<td valign="top" class="mediumblack">Children</td>
<td valign="top" class="mediumblack">:</td>
<td valign="top" class="mediumblack"><?PHP echo $row['HaveChildren']?></td>
<td class="mediumblack"><br></td>
</tr>
<tr align="left">
<td class="mediumblack"><br></td>
<td valign="top" class="mediumblack">Height</td>
<td valign="top" class="mediumblack">:</td>
<td valign="top" class="mediumblack"><?PHP echo $row['Height']?></td>
<td class="mediumblack"><br></td>
</tr>
<tr align="left">
<td class="mediumblack"><br></td>
<td valign="top" class="mediumblack">Complexion</td>
<td valign="top" class="mediumblack">:</td>
<td valign="top" class="mediumblack"><?PHP echo $row['Complexion']?></td>
<td class="mediumblack"><br></td>
</tr>
<tr align="left">
<td class="mediumblack"><br></td>
<td valign="top" class="mediumblack">Body Type</td>
<td valign="top" class="mediumblack">:</td>
<td valign="top" class="mediumblack"><?PHP echo $row['BodyType']?></td>
<td class="mediumblack"><br></td>
</tr>
<tr align="left">
<td class="mediumblack"><br></td>
<td valign="top" class="mediumblack">Blood Group</td>
<td valign="top" class="mediumblack">:</td>
<td valign="top" class="mediumblack"><?PHP echo $row['BloodGroup']?></td>
<td class="mediumblack"><br></td>
</tr>

<tr bgcolor="#ffffff">
<td colspan="5" bgcolor="#8fa7bf" height="1"><spacer type="block" height="1" width="1"></td>
</tr>
<tr>
<td colspan="5" bgcolor="#ffffff" height="8"><spacer type="block" height="8" width="1"></td>
</tr>
<tr align="left">
<td height="16" colspan="5" valign="middle" bgcolor="#ffffff" class="mediumblackbold">&nbsp;&nbsp;My Education &amp; Career
</td>
</tr>
<tr align="left">
<td height="1" colspan="5" bgcolor="#8fa7bf"><spacer type="block" height="1" width="1"></td>
</tr>

<tr align="left">
<td class="mediumblack"><br></td>
<td valign="top" class="mediumblack">Education</td>
<td valign="top" class="mediumblack">:</td>
<td valign="top" class="mediumblack"><?PHP echo $row['Education']?> - <?PHP echo $row['EducationIn']?></td>
<td class="mediumblack"><br></td>
</tr>
<tr align="left">
<td class="mediumblack"><br></td>
<td valign="top" class="mediumblack">Profession</td>
<td valign="top" class="mediumblack">:</td>
<td valign="top" class="mediumblack"><?PHP echo $row['Profession']?></td>
<td class="mediumblack"><br></td>
</tr>
<tr align="left">
<td class="mediumblack"><br></td>
<td valign="top" class="mediumblack">Annual Income</td>
<td valign="top" class="mediumblack">:</td>
<td valign="top" class="mediumblack"><?PHP echo $row['AnnualIncome']?></td>
<td class="mediumblack"><br></td>
</tr>

<tr>
<td colspan="5" bgcolor="#8fa7bf" height="1"><spacer type="block" height="1" width="1"></td>
</tr>
<tr>
<td colspan="5" bgcolor="#ffffff" height="8"><spacer type="block" height="8" width="1"></td>
</tr>
<tr align="left">
<td height="16" colspan="5" valign="middle" bgcolor="#ffffff" class="mediumblackbold">&nbsp;&nbsp;My Astro Info
</td>
</tr>
<tr align="left">
<td height="1" colspan="5" bgcolor="#8fa7bf"><spacer type="block" height="1" width="1"></td>
</tr>

<tr align="left">
<td class="mediumblack"><br></td>
<td valign="top" class="mediumblack">Sun Sign</td>
<td valign="top" class="mediumblack">:</td>
<td valign="top" class="mediumblack"><div id="star"></div>
<script language="javascript">
document.getElementById('star').innerHTML=starsigns[StarSign(<?PHP echo $row['BirthDate']?>,<?PHP echo $row['BirthMonth']?>)];
</script></td>
<td class="mediumblack"><br></td>
</tr>

<tr>
<td class="mediumblack"><br></td>
<td align="left" valign="top" class="mediumblack">Rasi (moon sign)</td>
<td align="left" valign="top" class="mediumblack">:</td>
<td align="left" valign="top" class="mediumblack"><div id="star"></div><?PHP echo $row['Rasi']?>
</td>
<td class="mediumblack"><br></td>
</tr>

<td class="mediumblack"><br></td>
<td align="left" valign="top" class="mediumblack">Nakshatra</td>
<td align="left" valign="top" class="mediumblack">:</td>
<td align="left" valign="top" class="mediumblack"><div id="star"></div><?PHP echo $row['Nakshatra']?>
</td>
<td class="mediumblack"><br></td>
</tr>

<td class="mediumblack"><br></td>
<td align="left" valign="top" class="mediumblack">Astroprofile</td>
<td align="left" valign="top" class="mediumblack">:</td>
<td align="left" valign="top" class="mediumblack"><div id="star"></div>
<?PHP
if ($row['Astroprofile']!="")
{
?>
<a href="<?PHP echo $row['Astroprofile']?>" target="_blank">Click to see Astroprofile</a>
<?PHP
}
?>
</td>
<td class="mediumblack"><br></td>
</tr>

	<tr>
<td colspan="5" bgcolor="#8fa7bf" height="1"><spacer type="block" height="1" width="1"></td>
</tr>
</tbody></table>

</td>
<td height="1" width="10"><spacer type="block" height="1" width="10"></td>
<td valign="top">

<table bgcolor="#FFF7FF" border="0" cellpadding="0" cellspacing="0" width="280">
<tbody><tr align="left" bgcolor="#ffffff">
<td height="16" colspan="5" valign="middle"><font class="mediumblackbold">&nbsp;&nbsp;My Religious &amp; Social Background</font></td>
</tr>
<tr align="left" bgcolor="#ffffff">
<td width="8" height="1" bgcolor="#8fa7bf"><spacer type="block" height="1" width="8"></td>
<td width="106" height="1" bgcolor="#8fa7bf"><spacer type="block" height="1" width="106"></td>
<td width="8" height="1" bgcolor="#8fa7bf"><spacer type="block" height="1" width="8"></td>
<td width="150" height="1" bgcolor="#8fa7bf"><spacer type="block" height="1" width="150"></td>
<td width="8" height="1" bgcolor="#8fa7bf"><spacer type="block" height="1" width="8"></td>
</tr>

<tr align="left">
<td class="mediumblack"><br></td>
<td valign="top" class="mediumblack">Caste / Sect</td>
<td valign="top" class="mediumblack">:</td>
<td valign="top" class="mediumblack"><?PHP echo $row['Caste']?></td>
<td class="mediumblack"><br></td>
</tr>
<tr align="left">
<td class="mediumblack"><br></td>
<td valign="top" class="mediumblack">Sub caste / sect</td>
<td valign="top" class="mediumblack">:</td>
<td valign="top" class="mediumblack"><?PHP echo $row['SubCaste']?></td>
<td class="mediumblack"><br></td>
</tr>
<tr align="left">
<td class="mediumblack"><br></td>
<td valign="top" class="mediumblack">Mother Tongue</td>
<td valign="top" class="mediumblack">:</td>
<td valign="top" class="mediumblack"><?PHP echo $row['MotherTongue']?><br></td>
<td class="mediumblack"><br></td>
</tr>
<tr align="left">
<td class="mediumblack"><br></td>
<td valign="top" class="mediumblack">Family Values</td>
<td valign="top" class="mediumblack">:</td>
<td valign="top" class="mediumblack"><?PHP echo $row['FamilyValues']?></td>
<td class="mediumblack"><br></td>
</tr>

<tr>
<td colspan="5" bgcolor="#8fa7bf" height="1"><spacer type="block" height="1" width="1"></td>
</tr>
<tr>
<td colspan="5" bgcolor="#ffffff" height="8"><spacer type="block" height="8" width="1"></td>
</tr>
<tr align="left">
<td height="16" colspan="5" valign="middle" bgcolor="#ffffff" class="mediumblackbold">&nbsp;&nbsp;My Cultural Background</td>
</tr>
<tr align="left">
<td height="1" colspan="5" bgcolor="#8fa7bf"><spacer type="block" height="1" width="1"></td>
</tr>

<tr align="left">
<td class="mediumblack"><br></td>
<td valign="top" class="mediumblack">Country of Birth</td>
<td valign="top" class="mediumblack">:</td>
<td valign="top" class="mediumblack"><?PHP
$sql2 = "SELECT Country FROM user_profile, countries WHERE user_profile.CountryOfBirth=countries.CountryID";
$result2 = mysql_query($sql2,$conn);
$row2 = @mysql_fetch_array($result2);
echo $row2['Country']?></td>
<td class="mediumblack"><br></td>
</tr>
<tr align="left">
<td class="mediumblack"><br></td>
<td valign="top" class="mediumblack">Grew up in</td>
<td valign="top" class="mediumblack">:</td>
<td valign="top" class="mediumblack">
<?PHP
$grewupin1 = explode("|",$row['GrewUpIn']);
$a=0;
for($x=0; $x < count($grewupin1); $x++)
{
	if($grewupin1[$x]!="")
	{
		$sqlCountry = "SELECT * FROM countries where CountryID=".$grewupin1[$x];
		$resultCountry = mysql_query($sqlCountry, $conn);
		$rowCountry = @mysql_fetch_array($resultCountry);
		if($a==0)
		{
			echo $rowCountry['Country'];
			$a=1;
		}
		else
		{
			echo ", ".$rowCountry['Country'];
		}
	}
}
?></td>
<td class="mediumblack"><br></td>
</tr>
<tr align="left">
<td class="mediumblack"><br></td>
<td valign="top" class="mediumblack">Personal Values</td>
<td valign="top" class="mediumblack">:</td>
<td valign="top" class="mediumblack"><?PHP echo $row['PersonalValues']?></td>
<td class="mediumblack"><br></td>
</tr>
<tr align="left">
<td class="mediumblack"><br></td>
<td valign="top" class="mediumblack">Can speak</td>
<td valign="top" class="mediumblack">:</td>
<td valign="top" class="mediumblack"><?PHP echo str_replace("|",", ",$row['SpokenLanguages'])?></td>
<td class="mediumblack"><br></td>
</tr>
<tr>
<td colspan="5" bgcolor="#8fa7bf" height="1"><spacer type="block" height="1" width="1"></td>
</tr>
<tr>
	<td colspan="5" bgcolor="#ffffff" height="8"><spacer type="block" height="8" width="1"></td>
</tr>

<tr align="left" bgcolor="#ffffff">
	<td height="16" colspan="5" valign="middle" class="mediumblackbold">&nbsp;&nbsp;My Location</td>
</tr>
<tr align="left" bgcolor="#ffffff">
	<td height="1" colspan="5" bgcolor="#8fa7bf"><spacer type="block" height="1" width="1"></td>
</tr>
<tr align="left">
	<td class="mediumblack"><br></td>
	<td valign="top" class="mediumblack">Current Residence</td>
	<td valign="top" class="mediumblack">:</td>
	<td valign="top" class="mediumblack"><?PHP
	$sqlstate = "SELECT * FROM user_profile, users, states WHERE users.UserID=user_profile.UserID and users.LoginID='".mysql_escape_string($_REQUEST['id'])."' and user_profile.StateID=states.StateID and users.Status=1 and users.ApprovalStatus=1";
$resultstate = mysql_query($sqlstate,$conn);
$rowstate = @mysql_fetch_array($resultstate);
if(@mysql_num_rows($resultstate) != 0)
{
 echo $rowstate['State'].", ";
}
	?> <?PHP echo $row['Country']?></td>
	<td class="mediumblack"><br></td>
</tr>
<tr align="left">
	<td class="mediumblack"><br></td>
	<td valign="top" class="mediumblack">Residency Status</td>
	<td valign="top" class="mediumblack">:</td>
	<td valign="top" class="mediumblack"><?PHP echo $row['ResidencyStatus']?></td>
	<td class="mediumblack"><br></td>
</tr>
<tr bgcolor="#ffffff">
	<td colspan="5" bgcolor="#8fa7bf" height="1"><spacer type="block" height="1" width="1"></td>
</tr>
<tr>
<td colspan="5" bgcolor="#ffffff" height="8"><spacer type="block" height="8" width="1"></td>
</tr>
<tr align="left" bgcolor="#ffffff">
	<td height="16" colspan="5" valign="middle" class="mediumblackbold">&nbsp;&nbsp;My Lifestyle</td>
</tr>
<tr align="left" bgcolor="#ffffff">
	<td height="1" colspan="5" bgcolor="#8fa7bf"><spacer type="block" height="1" width="1"></td>
</tr>
<tr align="left">
<td class="mediumblack"><br></td>
<td valign="top" class="mediumblack">Diet &nbsp;</td>
<td valign="top" class="mediumblack">:</td>
<td valign="top" class="mediumblack"><?PHP echo $row['Diet']?></td>
<td class="mediumblack"><br></td>
</tr>
<tr align="left">
<td class="mediumblack"><br></td>
<td valign="top" class="mediumblack">Drink</td>
<td valign="top" class="mediumblack">:</td>
<td valign="top" class="mediumblack"><?PHP echo $row['Drink']?></td>
<td class="mediumblack"><br></td>
</tr>
<tr align="left">
<td class="mediumblack"><br></td>
<td valign="top" class="mediumblack">Smoke</td>
<td valign="top" class="mediumblack">:</td>
<td valign="top" class="mediumblack"><?PHP echo $row['Smoke']?></td>
<td class="mediumblack"><br></td>
</tr>
<tr bgcolor="#ffffff">
<td colspan="5" bgcolor="#8fa7bf" height="1"><spacer type="block" height="1" width="1"></td>
</tr>

<!-- FAMILY BLOCK ST -->
<tr>
	<td colspan="5" bgcolor="#ffffff" height="8"><spacer type="block" height="8" width="1"></td>
</tr>
<tr align="left" bgcolor="#ffffff">
	<td height="16" colspan="5" valign="middle" class="mediumblackbold">&nbsp;&nbsp;My Family</td>
</tr>
<tr align="left" bgcolor="#ffffff">
	<td height="1" colspan="5" bgcolor="#8fa7bf"><spacer type="block" height="1" width="1"></td>
</tr>
<tr align="left">
<td class="mediumblack"><br></td>
<td valign="top" class="mediumblack">Father</td>
<td valign="top" class="mediumblack">:</td>
<td valign="top" class="mediumblack"><?PHP echo $row['Father']?></td>
<td class="mediumblack"><br></td>
</tr>
<tr align="left">
<td class="mediumblack"><br></td>
<td valign="top" class="mediumblack">Mother</td>
<td valign="top" class="mediumblack">:</td>
<td valign="top" class="mediumblack"><?PHP echo $row['Mother']?></td>
<td class="mediumblack"><br></td>
</tr>
<tr align="left">
<td class="mediumblack"><br></td>
<td valign="top" class="mediumblack">Brother(s)</td>
<td valign="top" class="mediumblack">:</td>
<td valign="top" class="mediumblack"><?PHP echo $row['Brothers']?></td>
<td class="mediumblack"><br></td>
</tr>
<tr align="left">
<td class="mediumblack"><br></td>
<td valign="top" class="mediumblack">&nbsp;&nbsp;&nbsp;&nbsp;of which married</td>
<td valign="top" class="mediumblack">:</td>
<td valign="top" class="mediumblack"><?PHP echo $row['MarriedBrothers']?></td>
<td class="mediumblack"><br></td>
</tr>
<tr align="left">
<td class="mediumblack"><br></td>
<td valign="top" class="mediumblack">Sister(s)</td>
<td valign="top" class="mediumblack">:</td>
<td valign="top" class="mediumblack"><?PHP echo $row['Sisters']?></td>
<td class="mediumblack"><br></td>
</tr>
<tr align="left">
<td class="mediumblack"><br></td>
<td valign="top" class="mediumblack">&nbsp;&nbsp;&nbsp;&nbsp;of which married</td>
<td valign="top" class="mediumblack">:</td>
<td valign="top" class="mediumblack"><?PHP echo $row['MarriedSisters']?></td>
<td class="mediumblack"><br></td>
</tr>
<tr bgcolor="#ffffff">
<td colspan="5" bgcolor="#8fa7bf" height="1"><spacer type="block" height="1" width="1"></td>
</tr>

<!-- FAMILY BLOCK END -->
<!-- location -->
</tbody></table>

</td>
</tr>
</tbody></table>
<br>
<!-- The 2nd center content table end's here -->

<!-- Hobbies table newly added-->

<table border="0" cellpadding="2" cellspacing="0" width="100%">
<tbody><tr align="left" valign="top">
<td height="16" colspan="5" class="mediumblackbold">&nbsp;&nbsp;Hobbies, Interests &amp; more</td>
</tr>
<tr align="left" valign="top">
<td height="1" colspan="5" bgcolor="#8fa7bf"><spacer type="block" height="1" width="1"></td>
</tr>
<tr align="left" valign="top" bgcolor="#FFF7FF">
<td width="8" height="8"><spacer type="block" height="8" width="8"></td>
<td width="153" class="mediumblack">My Hobbies</td>
<td width="30" class="mediumblack">:</td>
<td width="364" class="mediumblack"><?PHP echo str_replace("|",", ",$row['Hobbies'])?></td>
<td width="8" height="8"><spacer type="block" height="8" width="8"></td>
</tr>
<tr align="left" valign="top" bgcolor="#FFF7FF">
<td><br></td>
<td class="mediumblack">My Interests</td>
<td class="mediumblack">:</td>
<td class="mediumblack"><?PHP echo str_replace("|",", ",$row['Interests'])?></td>
<td><br></td>
</tr>
<tr align="left" valign="top" bgcolor="#FFF7FF">
<td><br></td>
<td class="mediumblack">My Favorite Music</td>
<td class="mediumblack">:</td>
<td class="mediumblack"><?PHP echo str_replace("|",", ",$row['FavoriteMusic'])?></td>
<td><br></td>
</tr>
<tr align="left" valign="top" bgcolor="#FFF7FF">
<td><br></td>
<td class="mediumblack">My Favorite Reads</td>
<td class="mediumblack">:</td>
<td class="mediumblack"><?PHP echo str_replace("|",", ",$row['FavoriteReads'])?></td>
<td><br></td>
</tr>
<tr align="left" valign="top" bgcolor="#FFF7FF">
<td><br></td>
<td class="mediumblack">My Preferred Movies</td>
<td class="mediumblack">:</td>
<td class="mediumblack"><?PHP echo str_replace("|",", ",$row['PreferredMovies'])?></td>
<td><br></td>
</tr>
<tr align="left" valign="top" bgcolor="#FFF7FF">
<td><br></td>
<td nowrap="nowrap" class="mediumblack">My Sports / Fitness Activities</td>
<td class="mediumblack">:</td>
<td class="mediumblack"><?PHP echo str_replace("|",", ",$row['Sports'])?></td>
<td><br></td>
</tr>
<tr align="left" valign="top" bgcolor="#FFF7FF">
<td><br></td>
<td class="mediumblack">My Favorite Cuisine</td>
<td class="mediumblack">:</td>
<td class="mediumblack"><?PHP echo str_replace("|",", ",$row['FavoriteCuisine'])?></td>
<td><br></td>
</tr>
<tr align="left" valign="top" bgcolor="#FFF7FF">
<td><br></td>
<td class="mediumblack">My Preferred Dress Style</td>
<td class="mediumblack">:</td>
<td class="mediumblack"><?PHP echo str_replace("|",", ",$row['PreferredDress'])?></td>
<td><br></td>
</tr>

<tr>
<td colspan="5" bgcolor="#8fa7bf" height="1"><spacer type="block" height="1" width="1"></td>
</tr>
</tbody></table><br>

<!-- Hobbies table newly added-->


<!-- The 3rd center content table start's here -->
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody><tr align="left">
<td height="22" colspan="3"  style="background-color:#600;padding:3px" class="largewhitebold">&nbsp;<a name="more"></a>
More About Myself</td>
</tr>
<tr>
<td height="8" width="8"><spacer type="block" height="8" width="8"></td>
<td height="8" width="554"><spacer type="block" height="8" width="554"></td>
<td height="8" width="8"><spacer type="block" height="8" width="8"></td>
</tr>
<tr align="left">
<td height="16" colspan="3" valign="middle" class="mediumblackbold">&nbsp;&nbsp;My Personality, Long-Term Goals, Partner Expectations, etc</td>
</tr>
<tr>
<td colspan="3" bgcolor="#8fa7bf" height="1"><spacer type="block" height="1" width="1"></td>
</tr>

<tr bgcolor="#FFF7FF">
<td height="1" width="8"><spacer type="block" height="1" width="8"></td>
<td align="left" valign="top" class="mediumblack">
<?PHP
echo stripslashes(str_replace("\n","<br>", $row['AboutYourself']));
?>
</td>
<td height="1" width="8"><spacer type="block" height="1" width="8"></td>
</tr>

<tr>
<td colspan="3" bgcolor="#8fa7bf" height="1"><spacer type="block" height="1" width="1"></td>
</tr>
<tr>
<td colspan="3" height="8"><spacer type="block" height="8" width="1"></td>
</tr>
<tr align="left">
<td height="16" colspan="3" valign="middle" class="mediumblackbold">&nbsp;&nbsp;My Family</td>
</tr>
<tr>
<td colspan="3" bgcolor="#8fa7bf" height="1"><spacer type="block" height="1" width="1"></td>
</tr>

<tr bgcolor="#FFF7FF">
<td height="1" width="8"><spacer type="block" height="1" width="8"></td>
<td align="left" valign="top" class="mediumblack">
<?PHP
echo stripslashes(str_replace("\n","<br>", $row['AboutFamily']));
?></td>
<td height="1" width="8"><spacer type="block" height="1" width="8"></td>
</tr>
<tr>
<td colspan="3" bgcolor="#8fa7bf" height="1"><spacer type="block" height="1" width="1"></td>
</tr>
</tbody></table><br>
<!-- The 3rd center content table end's here -->







<!-- The 4th center content table start's here -->

<a name="partner"></a>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody><tr align="left">
<td height="22" colspan="3"  style="background-color:#600;padding:3px" class="largewhitebold">&nbsp;
My Preferred Partner</td>
</tr>


<tr>
<td colspan="3" height="8"><spacer type="block" height="8" width="1"></td>
</tr>
<tr>
<td valign="top">

<table bgcolor="#FFF7FF" border="0" cellpadding="0" cellspacing="0" width="280">
<tbody><tr align="left" bgcolor="#ffffff">
<td height="16" colspan="5" valign="middle" class="mediumblackbold">&nbsp;&nbsp;
<?PHP
if($row['Gender']=="Male")
{
$gender = "Her";
}
else
{
$gender = "His";
}
echo $gender;
?>
 Basics</td>
</tr>
<tr align="left" bgcolor="#ffffff">
<td width="8" height="1" bgcolor="#8fa7bf"><spacer type="block" height="1" width="8"></td>
<td width="106" height="1" bgcolor="#8fa7bf"><spacer type="block" height="1" width="106"></td>
<td width="8" height="1" bgcolor="#8fa7bf"><spacer type="block" height="1" width="8"></td>
<td width="150" height="1" bgcolor="#8fa7bf"><spacer type="block" height="1" width="150"></td>
<td width="8" height="1" bgcolor="#8fa7bf"><spacer type="block" height="1" width="8"></td>
</tr>

<tr align="left">
<td class="mediumblack"><br></td>
<td valign="top" class="mediumblack">Age</td>
<td valign="top" class="mediumblack">:</td>
<td valign="top" class="mediumblack"><?PHP echo $rowp['AgeFrom']?> to <?PHP echo $rowp['AgeTo']?></td>
<td class="mediumblack"><br></td>
</tr>
<tr align="left">
<td class="mediumblack"><br></td>
<td valign="top" class="mediumblack">Marital Status</td>
<td valign="top" class="mediumblack">:</td>
<td valign="top" class="mediumblack"><?PHP echo str_replace("|",", ",$rowp['MaritalStatus'])?></td>
<td class="mediumblack"><br></td>
</tr>
<tr align="left">
<td class="mediumblack"><br></td>
<td valign="top" class="mediumblack">Children</td>
<td valign="top" class="mediumblack">:</td>
<td valign="top" class="mediumblack"><?PHP echo str_replace("|",", ",$rowp['HaveChildren'])?></td>
<td class="mediumblack"><br></td>
</tr>
<tr align="left">
<td class="mediumblack"><br></td>
<td valign="top" class="mediumblack">Height</td>
<td valign="top" class="mediumblack">:</td>
<td valign="top" class="mediumblack"><?PHP echo $rowp['HeightFrom']?> to <?PHP echo $rowp['HeightTo']?></td>
<td class="mediumblack"><br></td>
</tr>
<tr align="left">
<td class="mediumblack"><br></td>
<td valign="top" class="mediumblack">Complexion</td>
<td valign="top" class="mediumblack">:</td>
<td valign="top" class="mediumblack"><?PHP echo str_replace("|",", ",$rowp['Complexion'])?></td>
<td class="mediumblack"><br></td>
</tr>
<tr align="left">
<td class="mediumblack"><br></td>
<td valign="top" class="mediumblack">Body Type</td>
<td valign="top" class="mediumblack">:</td>
<td valign="top" class="mediumblack"><?PHP echo str_replace("|",", ",$rowp['BodyType'])?></td>
<td class="mediumblack"><br></td>
</tr>
<tr bgcolor="#ffffff">
<td colspan="5" bgcolor="#8fa7bf" height="1"><spacer type="block" height="1" width="1"></td>
</tr>
<tr bgcolor="#ffffff">
<td colspan="5" height="8"><spacer type="block" height="8" width="1"></td>
</tr>
<tr align="left" bgcolor="#ffffff">
<td height="16" colspan="5" valign="middle" class="mediumblackbold">&nbsp;&nbsp;<?PHP echo $gender?> Lifestyle</td>
</tr>
<tr align="left" bgcolor="#ffffff">
<td height="1" colspan="5" bgcolor="#8fa7bf"><spacer type="block" height="1" width="1"></td>
</tr>

<tr align="left">
<td class="mediumblack"><br></td>
<td valign="top" class="mediumblack">Diet </td>
<td valign="top" class="mediumblack">:</td>
<td valign="top" class="mediumblack"><?PHP echo str_replace("|",", ",$rowp['Diet'])?></td>
<td class="mediumblack"><br></td>
</tr>
<tr align="left">
<td class="mediumblack"><br></td>
<td valign="top" class="mediumblack">Drink</td>
<td valign="top" class="mediumblack">:</td>
<td valign="top" class="mediumblack"><?PHP echo str_replace("|",", ",$rowp['Drink'])?></td>
<td class="mediumblack"><br></td>
</tr>
<tr align="left">
<td class="mediumblack"><br></td>
<td valign="top" class="mediumblack">Smoke</td>
<td valign="top" class="mediumblack">:</td>
<td valign="top" class="mediumblack"><?PHP echo str_replace("|",", ",$rowp['Smoke'])?></td>
<td class="mediumblack"><br></td>
</tr>

<tr bgcolor="#ffffff">
<td colspan="5" bgcolor="#8fa7bf" height="1"><spacer type="block" height="1" width="1"></td>
</tr>
</tbody></table>


</td>
<td height="1" width="10"><spacer type="block" height="1" width="10"></td>
<td valign="top">



<table bgcolor="#FFF7FF" border="0" cellpadding="0" cellspacing="0" width="280">
<tbody><tr align="left" bgcolor="#ffffff">
<td height="16" colspan="5" valign="middle" class="mediumblackbold">&nbsp;&nbsp;<?PHP echo $gender?> Religious &amp; Social Background</td>
</tr>
<tr align="left" bgcolor="#ffffff">
<td width="8" height="1" bgcolor="#8fa7bf"><spacer type="block" height="1" width="8"></td>
<td width="106" height="1" bgcolor="#8fa7bf"><spacer type="block" height="1" width="106"></td>
<td width="8" height="1" bgcolor="#8fa7bf"><spacer type="block" height="1" width="8"></td>
<td width="150" height="1" bgcolor="#8fa7bf"><spacer type="block" height="1" width="150"></td>
<td width="8" height="1" bgcolor="#8fa7bf"><spacer type="block" height="1" width="8"></td>
</tr>

<tr>
</tr><tr align="left">
<td class="mediumblack"><br></td>
<td valign="top" class="mediumblack">Mother Tongue</td>
<td valign="top" class="mediumblack">:</td>
<td valign="top" class="mediumblack"><?PHP echo str_replace("|",", ",$rowp['MotherTongue'])?></td>
<td class="mediumblack"><br></td>
</tr>
<tr align="left">
<td class="mediumblack"><br></td>
<td valign="top" class="mediumblack">Family Values</td>
<td valign="top" class="mediumblack">:</td>
<td valign="top" class="mediumblack"><?PHP echo str_replace("|",", ",$rowp['FamilyValues'])?></td>
<td class="mediumblack"><br></td>
</tr>

<tr bgcolor="#ffffff">
<td colspan="5" bgcolor="#8fa7bf" height="1"><spacer type="block" height="1" width="1"></td>
</tr>
<tr bgcolor="#ffffff">
<td colspan="5" height="8"><spacer type="block" height="8" width="1"></td>
</tr>
<tr align="left" bgcolor="#ffffff">
<td height="16" colspan="5" valign="middle" class="mediumblackbold">&nbsp;&nbsp;<?PHP echo $gender?> Education &amp; Career</td>
</tr>
<tr align="left" bgcolor="#ffffff">
<td height="1" colspan="5" bgcolor="#8fa7bf"><spacer type="block" height="1" width="1"></td>
</tr>
<tr align="left">
<td class="mediumblack"><br></td>
<td valign="top" class="mediumblack">Education</td>
<td valign="top" class="mediumblack">:</td>
<td valign="top" class="mediumblack"><?PHP echo str_replace("|",", ",$rowp['EducationLevel'])?> - <?PHP echo str_replace("|",", ",$rowp['EducationArea'])?></td>
<td class="mediumblack"><br></td>
</tr>
<tr align="left">
<td class="mediumblack"><br></td>
<td valign="top" class="mediumblack">Profession</td>
<td valign="top" class="mediumblack">:</td>
<td valign="top" class="mediumblack"><?PHP echo str_replace("|",", ",$rowp['Profession'])?></td>
<td class="mediumblack"><br></td>
</tr>

<tr bgcolor="#ffffff">
<td colspan="5" bgcolor="#8fa7bf" height="1"><spacer type="block" height="1" width="1"></td>
</tr>
<tr bgcolor="#ffffff">
<td colspan="5" height="8"><spacer type="block" height="8" width="1"></td>
</tr>
<tr align="left" bgcolor="#ffffff">
<td height="16" colspan="5" valign="middle" class="mediumblackbold">&nbsp;&nbsp;<?PHP echo $gender ?> Location</td>
</tr>
<tr align="left" bgcolor="#ffffff">
<td height="1" colspan="5" bgcolor="#8fa7bf"><spacer type="block" height="1" width="1"></td>
</tr>
<?PHP
$arrRel = explode("|",$rowp['CountryOfResidence']);
for($x=0; $x < count($arrRel); $x++)
{
$sql = "SELECT Country FROM countries WHERE CountryID=".$arrRel[$x];
$resultrel = mysql_query($sql,$conn);
$rowrel = @mysql_fetch_array($resultrel);
if($x==0)
{
$religion = $rowrel['Country'];
}
else
{
$religion .= ", ".$rowrel['Country'];
}
}
if($religion=="")
{
$religion = "Doesn't Matter";
}
?>
<tr align="left">
<td class="mediumblack"><br></td>
<td valign="top" class="mediumblack">Country of Residence</td>
<td valign="top" class="mediumblack">:</td>
<td valign="top" class="mediumblack"><?PHP echo $religion?></td>
<td class="mediumblack"><br></td>
</tr>
<?PHP
$arrRel = explode("|",$rowp['StateOfResidence']);
for($x=0; $x < count($arrRel); $x++)
{
$sql = "SELECT State FROM states WHERE StateID=".$arrRel[$x];
$resultrel = mysql_query($sql,$conn);
$rowrel = @mysql_fetch_array($resultrel);
if($x==0)
{
$religion = $rowrel['State'];
}
else
{
$religion .= ", ".$rowrel['State'];
}
}
if($religion=="")
{
$religion = "Doesn't Matter";
}
?>
<tr align="left">
<td class="mediumblack"><br></td>
<td valign="top" class="mediumblack">State of Residence</td>
<td valign="top" class="mediumblack">:</td>
<td valign="top" class="mediumblack"><?PHP echo $religion?></td>
<td class="mediumblack"><br></td>
</tr>
<tr align="left">
<td class="mediumblack"><br></td>
<td valign="top" class="mediumblack">Residency Status</td>
<td valign="top" class="mediumblack">:</td>
<td valign="top" class="mediumblack"><?PHP echo str_replace("|",", ",$rowp['ResidencyStatus'])?></td>
<td class="mediumblack"><br></td>
</tr>

<tr bgcolor="#ffffff">
<td colspan="5" bgcolor="#8fa7bf" height="1"><spacer type="block" height="1" width="1"></td>
</tr>
</tbody></table>


</td>
</tr>


</tbody></table>
<!-- The 4th center content table end's here -->


<br>
<div class="largewhitebold bluepatch" style="background-color:#600;padding:3px">Express Interest</div>

<?PHP
$m = "";
if($_SESSION['UserID']=="")
{
	$m = "You need to login first to express your interests.";
	$disabled = "disabled";
}
?>
<a name="interest"></a>
<form method="post" action="profile.php?id=<?PHP echo $_REQUEST['id']?>">
<strong>Express your interest here. Click the Below "Express Interest" button to express an interest in this member. It is Free..!</strong><br>
<input type="hidden" name="interest" value="true">
<input type="hidden" name="ToEmailAddress" value="<?PHP echo $row['EmailAddress'] ?>">
<input src="images/button-express-interest.gif" align="center" border="0" hspace="1" type="image" vspace="8" <?PHP echo $disabled?>>
<br>
<?PHP
if($m!="")
{
?>
<span class="mediumblackbold"><?PHP echo $m?> <a href="login.php" class="mediumblueboldlink">Click here</a> to Login.
</span>
<?PHP
}
?>
</form>
<br>


<a name="contact"></a>

<br>

<div class="largewhitebold bluepatch" style="background-color:#600;padding:3px">My Contact Details</div>

<div class="main">
<?PHP
if($_SESSION['GoldMember']==1)
{
?>
<div style="padding: 4px 0pt 2px 6px;"><b>My Contact Number</b></div>

<div class="container" style="background-color:#FFF7FF;">
<?PHP
if($row['PhoneStatus']=="telephone" && $row['DisplayContactStatus']=="Show")
{
?>
<div class="div1">Telephone</div>
	<div class="div2">:</div>
	<div class="div3"><?PHP echo stripslashes($row['CountryCode'])?> <?PHP echo stripslashes($row['AreaStdCode'])?> <?PHP echo stripslashes($row['PhoneNumber'])?></div>
	<br clear="all">
<?PHP
}
else if($row['PhoneStatus']!="telephone" && $row['DisplayContactStatus']=="Show")
{
?>

	<div class="div1">Mobile</div>
	<div class="div2">:</div>
	<div class="div3"><?PHP echo stripslashes($row['CountryCode'])?> <?PHP echo stripslashes($row['PhoneNumber'])?></div>
	<br clear="all">
<?PHP
}
?>
	<div class="div1">Contact Person</div>
	<div class="div2">:</div>
	<div class="div3"><?PHP echo stripslashes($row['ContactPersonName'])?></div>
	<br clear="all">

	<div class="div1">Relationship with the member</div>
	<div class="div2">:</div>
	<div class="div3"><?PHP echo stripslashes($row['ContactPersonRelashionShip'])?></div>
	<br clear="all">

	<div class="div1">Convenient Time to Call</div>
	<div class="div2">:</div>
	<div class="div3"><?PHP echo stripslashes($row['ConvenientCallTime'])?></div>
	<br clear="all">
			<div class="div1" style="float: left; width: 133px;">Display Option</div>
		<div class="div2" style="float: left; width: 4px;">:</div>
		<div style="width: 413px; float: right;">
		<?PHP
		if (stripslashes($row['DisplayContactStatus'])=="Show")
		{
		?>
		You have chosen to display your contact details to other members. To change your display option
		<?PHP
		}
		else
		{
		?>
			You have chosen not to display your contact details to other members. To change your display option
		<?PHP
		}
		?>
		</div>

        <?PHP
}
else if($_SESSION['GoldMember']!=1 && $_SESSION['UserID']!="")
{
?>
<div style="padding:10px">
<a href="membership.php" class="largeblueboldlink"><strong>Update to Gold Member to send Unlimited Messages to Members. Click here to Update Your Membership Level Now...!!!!</strong></a>
</div>
<?PHP
}
else
{
?>
<strong>You need to login first to write messages to members. <a href="login.php" class="mediumblueboldlink">Click here</a> to Login. If you are not a member yet, <a href="register.php" class="mediumblueboldlink">Register Now...</a></strong>
<p>&nbsp;</p>
<?PHP
}
?>

		<br clear="all">

</div>
</div>


<!-- The 5th center content table start's here -->
<div class="largewhitebold bluepatch" style="background-color:#600;padding:3px">Send Message Directly To Your Partner</div>
<br>
<a name="message"></a>
<?PHP
if($_SESSION['GoldMember']==1)
{
?>
<form method="post" action="profile.php?id=<?PHP echo $_REQUEST['id']?>">
<strong>Write Your Message Here;</strong><br>
<textarea cols="50" rows="10" name="Message"></textarea>
<input type="hidden" name="writemsg" value="true">
<input type="hidden" name="ToEmailAddress" value="<?PHP echo $row['EmailAddress'] ?>">
<input type="submit" value="Send Message">
</form>
<?PHP
}
else if($_SESSION['GoldMember']!=1 && $_SESSION['UserID']!="")
{
?>
<a href="membership.php" class="largeblueboldlink"><strong>Update to Gold Member to send Unlimited Messages to Members. Click here to Update Your Membership Level Now...!!!!</strong></a>
<p>&nbsp;</p>
<?PHP
}
else
{
?>
<strong>You need to login first to write messages to members. <a href="login.php" class="mediumblueboldlink">Click here</a> to Login. If you are not a member yet, <a href="register.php" class="mediumblueboldlink">Register Now...</a></strong>
<p>&nbsp;</p>
<?PHP
}
?>

<?PHP
}//end of if profile found
else
{
echo'		<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tbody><tr>
		<td height="7" width="350"><spacer type="block" height="7" width="350"></td>
		<td width="220"><spacer type="block" width="220"></td>
		</tr>

			<tr>
			<td align="left"><h2>Sorry, Profile not found..</h2></td>
			<td align="right">&nbsp;		</td>
			</tr>
		<tr><td colspan="2" bgcolor="#8fa7bf" height="1" width="1"><spacer type="block" height="1" width="1"></td></tr>
		<tr><td colspan="2" height="8" width="1"><spacer type="block" height="8" width="1"></td></tr>
		</tbody></table>';
}
?>


<!-- CENTER STARTS HERE --></td>
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