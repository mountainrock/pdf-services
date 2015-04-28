<?php
session_start();
include("connection.php");
$sqlsettings = "SELECT * from admin";
$resultsettings = mysql_query($sqlsettings);
$rowsettings = mysql_fetch_array($resultsettings);


$emailMsg = "";
if($_POST['continue']=="true")
{
$sql = "SELECT * FROM users WHERE EmailAddress='".mysql_escape_string($_POST['email'])."'";
$result = mysql_query($sql,$conn);

if($_REQUEST['dobstatus']=="true"){
	$dobstatus = 1;
}
else{
	$dobstatus = 0;
}

$age = GetAge(mysql_escape_string($_POST['year']), mysql_escape_string($_POST['month']), mysql_escape_string($_POST['day']));
		if($_SESSION['registration_form_security_code']!= $_POST['captcha']){
			$emailMsg = "<font color='#FF0000'><strong>* Invalid verification text </strong></font>";
		}
		else if (@mysql_num_rows($result)!=0){
			$emailMsg = "<font color='#FF0000'><strong>* This E-Mail Address is ALREADY REGISTRED </strong></font>";
		}
		else if($age < 18 || $age > 60){
			$emailMsg = "<font color='#FF0000'><strong>You cannot be register with us, if your age is less than 18 or greater than 60</strong></font>";
		}

		else{
			//get IP
			if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
				$ip = $_SERVER['HTTP_CLIENT_IP'];
			} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
				$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			} else {
				$ip = $_SERVER['REMOTE_ADDR'];
			}
			$insert = "insert into users(Name, EmailAddress, Password, Gender, BirthDate, BirthMonth, BirthYear, Caste, CountryID, ConfirmationCode, AddedDate, dobstatus,ipAddress)
			VALUES (
				
				'".mysql_escape_string($_POST['name'])."',
				'".mysql_escape_string($_POST['email'])."',
				'".mysql_escape_string($_POST['password1'])."',
				'".mysql_escape_string($_POST['gender'])."',
				'".mysql_escape_string($_POST['day'])."',
				'".mysql_escape_string($_POST['month'])."',
				'".mysql_escape_string($_POST['year'])."',
				'".$_POST['caste']."',
				".$_POST['countryofresidence'].",
				'".md5(mysql_escape_string($_POST['email']))."',
				NOW(),
				'".$dobstatus."',
				'".$ip."'
			)";


			$resultt = mysql_query($insert);
			
			if ($resultt == false) {
			  die("Failed to save");
			}
			//email
			if($rowsettings['smtpstatus'] == 1)
			{

				$email_layout = "<table border='0' width='100%'><tr><Td colspan='2' background='".$rowsettings['url']."/images/footer_seprator.gif' height='2'></Td></tr></table><br><br><br>Dear Member,<br><br>Your Registration with ".$rowsettings['ScriptName']." has been successfully completed, but you need to confirm your registration first by clicking the below link. If you cannot access the confirmation page by clicking at this link, then kindly copy paste this link into your browser's address bar and press enter. After you will confirm your registration, You will be able to create your profile.<br><br><br>click below to confirm your registration:<br><br><a href='".$rowsettings['url']."/registration_confirmation.php?confirm=".md5(mysql_escape_string($_POST['email']))."'>".$rowsettings['url']."/registration_confirmation.php?confirm=".md5(mysql_escape_string($_POST['email']))."</a>";


				require("phpmailer/class.phpmailer.php");

				$mail = new phpMailer();

				$mail->IsSMTP();
				$mail->Host = $rowsettings['smtp'];
				$mail->Port = $rowsettings['port'];
				$mail->SMTPAuth = true;
				$mail->Username = $rowsettings['AdminEmail'];
				$mail->Password = $rowsettings['AdminEmailPassword'];

				$mail->From = $rowsettings['AdminEmail'];
				$mail->FromName = $rowsettings['ScriptName'];
				$mail->AddAddress($_POST['email']);


				$mail->WordWrap = 50;                                 // set word wrap to 50 characters
				$mail->IsHTML(true);                                  // set email format to HTML

				$mail->Subject = "Action Required to Confirm Registration";
				$mail->Body = $email_layout;
				$mail->Send();

				}
				else
				{
				$to=$_POST['email'];
			        $email_layout= '<font style="font-size:26pt;"><span style="color:#FF9D3D">GorBanjara </span><span style="color:#FC9E93">Matrimonial</span></font>';
				$email_layout .= "<br><table border='0' width='100%'><tr><Td colspan='2' background='".$rowsettings['url']."/images/footer_seprator.gif' height='2'></Td></tr></table><br><br><br>Dear Member,<br><br>Your Registration with ".$rowsettings['ScriptName']." has been successfully completed, but you need to confirm your registration first by clicking the below link. If you cannot access the confirmation page by clicking at this link, then kindly copy paste this link into your browser's address bar and press enter. After you will confirm your registration, You will be able to create your profile.<br><br><br>click below to confirm your registration:<br><br><a href='".$rowsettings['url']."/registration_confirmation.php?confirm=".md5(mysql_escape_string($_POST['email']))."'>".$rowsettings['url']."/registration_confirmation.php?confirm=".md5(mysql_escape_string($_POST['email']))."</a>";
				$subject="Action Required to Confirm Registration";
				$description=$email_layout;
				$emailheaders  = "MIME-Version: 1.0\r\n";
				$emailheaders  .= "Content-type: text/html; charset=iso-8859-1\r\n";
				$emailheaders  .= "From: ".$rowsettings['ScriptName']." <".$rowsettings['AdminEmail'].">\r\n";				

				$res =@mail($to,$subject,$description,$emailheaders);
				if($res == false){
 				   echo "Failed to send email to ".$to;
				}

	
      			}

				header("Location: register2.php?email=".mysql_escape_string($_POST['email']));
			}
		}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Marry Banjara - Register</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/register.css">
<script language="javascript" src="js/register.js"></script>
</head>

<body topmargin="2" leftmargin="0" oncontextmenu="return false" onselectstart="return false" ondragstart="return false" marginheight="2" marginwidth="0" background="images/background.jpg">


<script language="javascript" src="js/matrimonials-v10.js"></script>
			<!-- The top link table start's here -->
			<center>

				<!-- The top link table starts here -->
				<div style="width: 762px;" align="right">
					<?php
					include("topheader.php");
					?>
				</div>
				<!-- The top link table ends here -->

			<!-- The topbanner table start's here -->
			<div style="width: 762px; background-color: rgb(255, 255, 255);">
			<div style="border-top: 1px solid rgb(143, 167, 191); border-left: 1px solid rgb(143, 167, 191); border-right: 1px solid rgb(143, 167, 191);">




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
				<?php
				if($emailMsg != "")
				{
					echo $emailMsg;
				}
				?>

				<div style="float: top; text-align: left;color:#FFA558;font-size:1.2em">
				<span>To View unlimited profiles, express Interest in members or to get contacted directly</span>

				</div>


				<div style="border-bottom: 1px solid rgb(143, 167, 191); padding: 15px 0pt 5px 0px; width: 430px; float: left; text-align: left;">
				<img src="images/enter-details.gif" alt="Enter your details to register for FREE!" height="20" width="354"></div>
				<div class="smallgrey" style="border-bottom: 1px solid rgb(143, 167, 191); padding: 2px 0pt 5px 0px; width: 270px; float: left; text-align: right;"><span style="font-family: Arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 16px; font-size-adjust: none; font-stretch: normal; line-height: 18px;">
				<br></span>Already Registered? <a href="login.php" class="smallbluelink"><b>Login</b></a>&nbsp;</div><br clear="all">
			</div>



			<!-- YAHOO CODE -->
							<!-- YAHOO CODE-->




			<form method="post" action="register.php" name="frm_registration" id="frm_registration" autocomplete="off" onSubmit="return validateform(this);">
			<input name="continue" value="true" type="hidden">
			<div id="regform" style="padding-left:20px">



				<div style="">


					<div class="div1">
					<table border="0" cellpadding="0" cellspacing="0" width="100%">
					<tbody><tr>
						<td>


		<!-- FORM TABLE ST -->
		<script src="js/common.js" type="text/javascript" language="javascript1.2"></script>
		<script src="js/registration.js" type="text/javascript" language="javascript1.2"></script>
		<script src="js/common_002.js"></script>


		<table class="tblreg" border="0" cellpadding="5" cellspacing="4" width="400">
		<tbody>
		<tr style="display:none">
			<td nowrap="nowrap" width="150"><label for="profileid">Profile Id</label></td>
			<td class="smallgrey"><input tabindex="1" class="field" name="login" id="profileid" value="<?php echo $_REQUEST['login']?>" onkeydown="this.className='field'" onfocus="toggleHint('show', this.name)" onblur="validate_login();" type="text">
			<br/>eg: sandy1
		<!-- HINT STARTS HERE -->
		<span class="hint" id="hint_login">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);"><b>Your nickname on </b><br>Minimum 4 characters. Your Profile ID<br>can only contain letters or numbers.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
	<br>
			<span id="errmsg_login" class="error"></span></td>
		</tr>

        <tr>
			<td nowrap="nowrap" width="150"><label for="name">Full Name</label></td>
			<td class="smallgrey"><input tabindex="1" class="field" name="name" id="name" value="<?php echo $_REQUEST['name']?>" onkeydown="this.className='field'" onfocus="toggleHint('show', this.name)" onblur="validate_name();" type="text">
		<!-- HINT STARTS HERE -->
		<span class="hint" id="hint_name">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);"><b>Enter Your Name</b><br>Please Enter Your Name In this Field</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
	<br>
			<span id="errmsg_name" class="error"></span></td>
		</tr>




		<tr>
			<td><label for="email">Email</label></td>
			<td class="smallgrey"><input tabindex="3" class="field" name="email" id="email" value="<?php echo $_REQUEST['email']?>" onkeydown="this.className='field'" onfocus="toggleHint('show', this.name)" onblur="validate_email();" type="text">
		<!-- HINT STARTS HERE -->
		<span class="hint" id="hint_email">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);"><b>Type your email address</b><br>We will use this Email Address to send you profiles that match your requirements.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
	<br>
			<span id="errmsg_email" class="error"></span></td>
		</tr>

		<tr>
					<td style="cursor: pointer;" onclick="focus_field('caste');"><label for="email">Subcaste</label></td>
					<td>
					<?php include("sections/subcastes.php"); ?>
					<br>
					<span id="errmsg_caste" class="error"></span></td>
		</tr>
		<tr class="spacer">
			<td colspan="2"><br></td>
		</tr>
		<tr>
			<td><label for="password1">Password</label></td>
			<td class="smallgrey"><input tabindex="5" class="field" name="password1" id="password1" value="<?php echo $_REQUEST['password1']?>" onkeydown="this.className='field'" onfocus="toggleHint('show', this.name)" onblur="validate_password1();" type="password">
		<!-- HINT STARTS HERE -->
		<span class="hint" id="hint_password1">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);"><b>Type your password</b><br>Minimum 4 characters. Your password cannot contain spaces.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
	<br>
			<span id="errmsg_password1" class="error"></span></td>
		</tr>

		<tr>
			<td><label for="male">Gender</label></td>
			<td><input tabindex="7" name="gender" id="male" value="Male" onfocus="toggleHint('show', this.name)" onblur="validate_gender()" onclick="document.getElementById('errmsg_gender').innerHTML=''" type="radio" <?php if($_REQUEST['gender'] =='Male') echo "checked='checked'";?> >
		<!-- HINT STARTS HERE -->
		<span class="hint" id="hint_gender">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please select the gender.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
	 <label class="smallblack l2" for="male">Male &nbsp;</label>
			<input tabindex="7" name="gender" id="female" value="Female" onfocus="toggleHint('show', this.name)" onblur="validate_gender()" onclick="document.getElementById('errmsg_gender').innerHTML=''" type="radio"> <label class="smallblack l2" for="female" <?php if($_REQUEST['gender'] =='Female') echo "checked='checked'";?>>Female</label><br>
			<span id="errmsg_gender" class="error"></span></td>
		</tr>

		<tr>
			<td style="cursor: pointer;" onclick="focus_field('day');"><label>Date of Birth</label></td>
			<td class="smallgrey">
			<select tabindex="8" id="day" name="day" class="field_dob" onfocus="toggleHint('show', 'dateofbirth')" onblur="validate_dateofbirth(this.name);">			
				<option selected="selected" value="">Day</option>
				<?php			
				for ($x = 1; $x <= 31; $x++) {
				 if($_REQUEST['day'] ==sprintf('%02d', $x)){
					 echo "<option value='".sprintf('%02d', $x)."' selected='selected'>".sprintf('%02d', $x)."</option>";
				 } else{
				        echo "<option value='".sprintf('%02d', $x)."'>".sprintf('%02d', $x)."</option>";
				 }
				 
				} 
				?>						
			</select>&nbsp; 
			
			<select tabindex="9" name="month" class="field_dob" onfocus="toggleHint('show', 'dateofbirth')" onblur="validate_dateofbirth(this.name);">
			
			<option selected="selected" value="">Month</option>
			<?php
			$months= array("January","February","March","April","May","June","July","August","September","October","November","December");
			for($x = 0; $x <= count($months); $x++) {
				if($_REQUEST['month'] ==sprintf('%02d', $x)){
			   		 echo "<option value='".sprintf('%02d', $x)."' selected='selected'>".$months[$x]."</option>" ;
				}else{
			  		  echo "<option value='".sprintf('%02d', $x)."'>".$months[$x]."</option>" ;
			  	}
			}	
			?>	
			</select>&nbsp; 
		
		<select tabindex="10" name="year" class="field_dob" onfocus="toggleHint('show', 'dateofbirth')" onblur="validate_dateofbirth(this.name);">
			<option selected="selected" value="">Year</option>
			<?php
			$thisYear = date("Y"); 
			for ($x = $thisYear-65; $x <= $thisYear-18; $x++) {
			 if($_REQUEST['year'] ==$x){
				echo "<option value='".$x."' selected='selected'>".$x."</option>";
			 } else{
			        echo "<option value='".$x."' >".$x."</option>";
			 }
			  
			} 
			?>
		</select>
		<!-- HINT STARTS HERE -->
		<span class="hint" id="hint_dateofbirth">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please select date of birth (Visible only to you)</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
<br>
<input type="checkbox" name="dobstatus" value="true"  style="vertical-align: top;"> <span class="mediumred" style="font-size:9px">Display in profile.</span>
			<span id="errmsg_dateofbirth" class="error"></span></td>
		</tr>

		<tr>
			<td style="cursor: pointer;" onclick="focus_field('countryofresidence');">Country of Residence</td>
			<td><select tabindex="12" name="countryofresidence" id="countryofresidence"  onblur="validate_countryofresidence();"><option value="">Select</option>
			<?php
				$sqlCountry = "SELECT * FROM countries order by CountryID";
				$resultCountry = mysql_query($sqlCountry, $conn);
				if (@mysql_num_rows($resultCountry)!=0){
					while($rowCountry = mysql_fetch_array($resultCountry))
					{
						?>
						<option value="<?php echo $rowCountry['CountryID']?>"
						<?php
						if($_REQUEST['countryofresidence'] == $rowCountry['CountryID'])
							echo "selected";
						?>
						><?php echo $rowCountry['Country']?></option>
						<?
					}
				}
				?>
				<option value="Other">Other</option>
			</select><br>
			<span id="errmsg_countryofresidence" class="error"></span></td>
		</tr>

		<tr>
					<td ><label>Verification </label></td>
					<td>
					<div>
					<input name="captcha" id="captcha" size="5" type="text"/>
					<img src="captcha/security-image.php" style="position:absolute"/>
					</div>
					<span class="mediumred" style="font-size:10px">Enter text in image for human verification</span</td>
		</tr>
		</tbody></table>
		<!-- FORM TABLE EN -->

						</td>
						<td valign="top"><!-- MODEL IMAGE ST -->
					<br>
					<img src="images/bride.jpg" border="0">

                    </td>
					</tr>
					</tbody></table>
					</div><br clear="all">
				</div>

			</div>


			<!-- BTM EN -->

			<div style="border-top: 1px solid rgb(143, 167, 191); margin: 0pt 5px; width: 91%;">

				<!-- POLICY + SUBMIT ST -->
				<div class="smallblack" style="padding: 12px 0pt 0pt 25px; text-align: left;">

					<span class="input"><input tabindex="12" id="affirm" name="confirm_policy" type="checkbox"></span> <b><label for="affirm" style="cursor: pointer; font-family: arial; font-style: normal; font-variant: normal; font-weight: bold; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal;">I affirm that I have read and agree to the <a href="privacy.php" class="smallbluelink" target="_blank"><b>Privacy Policy</b></a> and <a href="terms.php" class="smallbluelink" target="_blank"><b>Terms and Conditions</b></a>.<br>

					<br>

										<input src="images/submit.gif" border="0" hspace="0" type="image" >
									</div>
				<!-- POLICY + SUBMIT EN -->

			</div>
			<!-- BTM EN -->
			</form>

			</div><br><br>



		</div>
	</div>


</center>




			<center>
				<div class="smalldgray" style="width: 760px; text-align: left; font-family: Tahoma; font-style: normal; font-variant: normal; font-weight: normal; font-size: 10px; line-height: normal; font-size-adjust: none; font-stretch: normal;">
					<div style="margin: 0px;">
						<div style="width: 100%; text-align: center;">

		<br>
		<div style="width: 100%; text-align: center; margin-bottom: 5px;">
			<div style="padding: 0pt 0pt 0pt 0px; width: 100%;">
				<?php
				include("footer.php");
				?>
						</div>
					</div>
				</div>


</body></html>