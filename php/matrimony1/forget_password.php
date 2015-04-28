<?PHP
session_start();
include("connection.php");

$sqlsettings = "SELECT * from admin";
$resultsettings = mysql_query($sqlsettings);
$rowsettings = mysql_fetch_array($resultsettings);

if($_POST['continue']=="true")
{
$sql = "SELECT * FROM users WHERE EmailAddress='".mysql_escape_string($_POST['login'])."'";
$result = mysql_query($sql,$conn);


		if (@mysql_num_rows($result)!=0){

			$row = @mysql_fetch_array($result);			
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
	$mail->AddAddress($row['EmailAddress']);


	$mail->WordWrap = 50;                                 // set word wrap to 50 characters
	$mail->IsHTML(true);                                  // set email format to HTML

	$mail->Subject = "Your login Password";

	$email_layout = "<br><table border='0' width='100%'><tr><Td colspan='2' background='".$rowsettings['url']."/images/footer_seprator.gif' height='2'></Td></tr></table><br><br><br>Dear ". $row['Name'] . ",<br><br>Below is your login details to ".$rowsettings['ScriptName']."<br><br>Email Address: ". $row['EmailAddress'] . "<br>Password: ".$row['Password']."<br><br>please login to ".$rowsettings['url']." to check your message.";

	$mail->Body = $email_layout;
	$mail->Send();
	}
	else
	{
	$to=$row['EmailAddress'];
	$subject="Your login Password";
	$email_layout = "<br><table border='0' width='100%'><tr><Td colspan='2' background='".$rowsettings['url']."/images/footer_seprator.gif' height='2'></Td></tr></table><br><br><br>Dear ". $row['Name'] . ",<br><br>Below is your login details to ".$rowsettings['ScriptName']."<br><br>Email Address: ". $row['EmailAddress'] . "<br>Password: ".$row['Password']."<br><br>please login to ".$rowsettings['url']." to check your message.";
	$description=$email_layout;
	$headers  = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	$headers .= "From: ".$rowsettings['ScriptName']." <".$rowsettings['AdminEmail'].">\r\n";

	$res=@mail($to,$subject,$description,$headers);

	}

			header('LOCATION: login.php?msg=Your password has been emailed to you..');
			exit();

			}


		else{
			$msg = "<font style='font-family:Verdana; font-size:12px; font-weight:bold; color:#FF0000;'>* Invalid E-Mail Address or Password</font><br><br>";
		}
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Marry Banjara - Forget Password</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/login.css">
</head>

<body topmargin="2" leftmargin="0" oncontextmenu="return false" onselectstart="return false" ondragstart="return false" marginheight="2" marginwidth="0" background="images/background.jpg">


<script language="javascript" src="js/matrimonials-v10.js"></script>
			<center>

				<!-- The top link table starts here -->
				<div style="width: 762px;" align="right">
					<?PHP
					include("topheader.php");
					?>
				</div>
				<!-- The top link table ends here -->

			<!-- The topbanner table start's here -->
			<div style="width: 762px; background-color: rgb(255, 255, 255);">
			<div style="border-top: 1px solid rgb(143, 167, 191); border-left: 1px solid rgb(143, 167, 191); border-right: 1px solid rgb(143, 167, 191);">




					<br style="line-height: 1px;" clear="all">

							<!-- midlinks + services space end's here -->


			</div>
			</div>
			<!-- The topbanner table ends here -->
			</center>
<center>
<div style="width: 762px;">
	<div class="mediumblack" style="border-style: solid; border-color: rgb(143, 167, 191); border-width: 0px 1px 1px; background: rgb(255, 255, 255) none repeat scroll 0%; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial;">
		<div style="width: 760px;">
			<div style="width: 30px; float: left;"><br></div>
 			<div style="margin: 0pt 0pt 10px 0px; width: 700px; float: left;">
				<br>
				<?PHP
											if ($msg!=''){
												echo $msg;
											}
										$user = $HTTP_COOKIE_VARS["user"];

										?>
<div style="float:left;">
<img src="images/registration-stoppage-model.jpg" alt="" border="0"><br>
<img src="images/registration-stoppage-get.gif" alt="" border="0" height="112" width="294"><br>
</div>
		<div class="smallblack" style="width: 294px; float: right; text-align: right; padding-bottom: 2px;">

						<div style="padding-left: 0px;">
							<div style="width: 294px;">

								<!-- LOGIN LOGIN FORM ST -->




<!-- login box Starts -->

<!-- BOX CODE EN -->
<form name="f" method="post" action="forget_password.php" autocomplete="off" style="margin: 0px;">

<div id="box">


<div style=" padding: 0pt 10px;">

<div style="font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px; line-height: normal; font-size-adjust: none; font-stretch: normal;">
<br/>
<b>Forgot Password</b></div><br>

<table border="0" cellpadding="2" cellspacing="0">
<tbody><tr valign="top">
<td  width="70"><label for="login">Email</label></td>
<td  width="250"><input tabindex="15" name="login" class="forminput" id="login" value="<?PHP echo $user?>" size="40" type="text"><br><input type="hidden" name="continue" value="true">
<span class="mediumred">e.g. abc@rediffmail.com</span></td>
</tr>
</tbody></table>

<div style="border: 0px solid rgb(0, 0, 0); width: 272px;">



<div style="margin-left: 70px;">
<input tabindex="19" src="images/submit.gif" align="center" border="0" height="22" hspace="2" type="image" width="76">
<input name="go" value="" type="hidden">
<input name="timeout" value="" type="hidden">
<input name="stop" value="" type="hidden">
<input name="view_seal" value="" type="hidden">
</div>
</div>

</div>

<br/>
</div>

</form>
<!-- BOX CODE EN -->

<!-- login box end -->


<script>
<!--
document.f.login.focus();
// -->
</script>								<!-- BOX CODE EN -->


							</div><br clear="all">
						</div>
				</div>



		<!-- FORM TABLE ST -->
		<script src="js/common.js" type="text/javascript" language="javascript1.2"></script>
		<script src="js/registration.js" type="text/javascript" language="javascript1.2"></script>
		<script src="js/common_002.js"></script>


			</div><br><br>



		</div><br clear="all">
	</div>
</div>

</center>



			<!-- BTM BANNER download / registration STARTS-->
			<center>
				<?PHP
				include("footer.php");
				?>
			</center>
</body></html>