<?PHP
session_start();
if($_SESSION['UserID']=="")
{
	header("location: login.php");
}
include("connection.php");

$sqlsettings = "SELECT * from admin";
$resultsettings = mysql_query($sqlsettings);
$rowsettings = mysql_fetch_array($resultsettings);

if($_POST['continue']=="true")
{
			$insert = "update user_profile set CreatedBy='".mysql_escape_string($_POST['relationship'])."', MaritalStatus='".mysql_escape_string($_POST['maritalstatus'])."', HaveChildren='".mysql_escape_string($_POST['havechildren'])."', Height='".mysql_escape_string($_POST['height'])."', BodyType='".mysql_escape_string($_POST['bodytype'])."', Complexion='".mysql_escape_string($_POST['complexion'])."', SpecialCases='".$_POST['specialcases']."', MotherTongue='".$_POST['mothertongue']."', caste='".$_POST['caste']."', Manglik='".$_POST['manglik']."', FamilyValues='".$_POST['familyvalues']."', Education='".$_POST['educationlevel']."', EducationIn='".$_POST['educationarea']."', Profession='".$_POST['occupation']."', Diet='".$_POST['diet']."', Smoke='".$_POST['smoke']."', Drink='".$_POST['drink']."', StateID=".$_POST['stateofresidence'].", CityID=".$_POST['nearest_city'].", ResidencyStatus='".$_POST['residencystatus']."', PhoneStatus='".$_POST['type']."', CountryCode='".$_POST['c_country_code']."', CountryCode2='".$_POST['country_code']."', AreaStdCode='".$_POST['std_code']."', PhoneNumber='".$_POST['contact_number']."', DisplayContactStatus='".$_POST['contact_details_dislay_status']."', AboutYourself='".$_POST['aboutyourself']."' where UserID=".$_SESSION['UserID'];



			$resultt = mysql_query($insert);
			
			if ($resultt == false) {
			  die("Failed to save".$insert);
			}
$age = GetAge(mysql_escape_string($_POST['year']), mysql_escape_string($_POST['month']), mysql_escape_string($_POST['day']));

if($_REQUEST['dobstatus']=="true")
{
	$dobstatus = 1;
}
else
{
	$dobstatus = 0;
}

$insert = "update users set BirthDate='".mysql_escape_string($_POST['day'])."', BirthMonth='".mysql_escape_string($_POST['month'])."', BirthYear='".mysql_escape_string($_POST['year'])."',  CountryID=".$_REQUEST['country'].", dobstatus=".$dobstatus." where UserID=".$_SESSION['UserID'];

$resultt = mysql_query($insert);

			if ($resultt == false) {
			  die("Failed to save DOB".$insert);
			}

	header("Location: my_profile.php");
	exit();
}
$sql = "SELECT * FROM users, countries, user_profile WHERE users.UserID=user_profile.UserID and users.CountryID=countries.CountryID  and users.UserID=".$_SESSION['UserID'];
$result = mysql_query($sql,$conn);
$row = @mysql_fetch_array($result);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Marry Banjara - Edit Your Personal Profile</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/editpersonalprofile.css">
<script language="javascript" src="js/ajax-v2-inc-mod.js"></script>
<script language="JavaScript">
<!--
	window.onload = function ()
	{
		document.onmousedown = function()
		{
			if(document.getElementById('special-case-div') != null)
			document.getElementById('special-case-div').style.display = "none";
			if(document.getElementById('special-case-iframe') != null)
			document.getElementById('special-case-iframe').style.display = "none";
			if(document.getElementById('manglik-case-div') != null)
			document.getElementById('manglik-case-div').style.display = "none";
			if(document.getElementById('manglik-case-iframe') != null)
			document.getElementById('manglik-case-iframe').style.display = "none";
		}
	}
//-->
</script>
<script language="javascript" src="js/tool-tip.js"></script>
<script language="javascript" src="js/common_002.js"></script>
<script language="javascript" src="js/editpersonalprofile.js"></script>
<link rel="stylesheet" href="css/main.css">
</head>

<body topmargin="2" leftmargin="0" marginheight="2" marginwidth="0" background="images/background.jpg">
<script language="javascript" src="js/matrimonials-v10.js"></script>
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
<td valign="top">
<center>
<div>
	<div style="background: rgb(255, 255, 255) none repeat scroll 0%; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial;">
		<div class="mediumblack">



	<div style="border: 0px solid rgb(0, 0, 0); margin: 0pt 30px; text-align: left;">



			<div style="border-bottom: 1px solid rgb(143, 167, 191); padding: 12px 0px 7px; margin-bottom: 10px;">
				<h2><span style="color: rgb(213, 86, 1);">Edit Personal  Profile</span></h2>
			</div>


		<!-- PAGE STYLE ST -->
		<script src="js/common.js" type="text/javascript" language="javascript1.2"></script>
		<script src="js/registration2-1.js" type="text/javascript" language="javascript1.2"></script>


		<!-- PAGE STYLE EN -->


		<!-- MESSAGE & ERROR ST // Needs to be decided by Product & Design -->
				<!-- MESSAGE & ERROR EN -->



	<table style="border-bottom: 1px solid rgb(229, 229, 229);" border="0" cellpadding="0" cellspacing="0">
		<tbody>
	<tr>
		<td style="padding-bottom: 5px;" height="50" valign="bottom"><span class="boldgreen" style="color:#990000; "><b>Your Basic Info</b></span> <span style="background-color: rgb(255, 255, 224); font-family: tahoma; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127); margin-left: 55px;">* All fields are compulsory. </span></td>
	</tr>
</tbody></table>



	<div id="loading_state"></div>
					<form method="post" action="edit_personal_profile.php" name="profile" id="profile" style="margin: 0px;" onSubmit="return validateform(this);">

	<!-- PROFILE CONTENTS ST -->

			<!-- BASIC INFO ST -->
			<a name="basics"></a>

			<table class="tbl1" border="0" cellpadding="5" cellspacing="0" width="450">

			<tbody><tr>
				<td class="td1" valign="top" width="127"><em>*</em><b><label for="gender1">Gender</label></b></td>
				<td class="td2 smallblack" valign="top" width="285">
				<?PHP
				echo $row['Gender'];
				?>
</td>
				</tr>
			<tr valign="top">
				<td class="td1" style="cursor: pointer;" onclick="focus_field('day');" valign="top"><em>*</em><b>Date of Birth</b></td>
				<td class="smallblack" valign="top">
				<select name="day" id="day" class="field_filled1" style="width: 44px;">
				<option selected="selected" value="">Day</option>
				<?php			
				for ($x = 1; $x <= 31; $x++) {
				 if($row['BirthDate'] ==sprintf('%02d', $x)){
					 echo "<option value='".sprintf('%02d', $x)."' selected='selected'>".sprintf('%02d', $x)."</option>";
				 } else{
				        echo "<option value='".sprintf('%02d', $x)."'>".sprintf('%02d', $x)."</option>";
				 }
				 
				} 
				?>
				</select>&nbsp; <select name="month" class="field_filled1" style="width: 50px;">
				<option selected="selected" value="">Month</option>
			<?php
			$months= array("January","February","March","April","May","June","July","August","September","October","November","December");
			for($x = 0; $x <= count($months); $x++) {
				if($row['BirthMonth'] ==sprintf('%02d', $x)){
			   		 echo "<option value='".sprintf('%02d', $x)."' selected='selected'>".$months[$x]."</option>" ;
				}else{
			  		  echo "<option value='".sprintf('%02d', $x)."'>".$months[$x]."</option>" ;
			  	}
			}	
			?>
				</select>&nbsp; 
				<select name="year" class="field_filled1" style="width: 50px;">
				<option selected="selected" value="">Year</option>
					<?php
					$thisYear = date("Y"); 
					for ($x = $thisYear-65; $x <= $thisYear-18; $x++) {
					 if($row['BirthYear'] ==$x){
						echo "<option value='".$x."' selected='selected'>".$x."</option>";
					 } else{
					        echo "<option value='".$x."' >".$x."</option>";
					 }
					  
					} 
					?>
				</select>
<br>
<input type="checkbox" name="dobstatus" value="true"
<?PHP
if($row['dobstatus']==1)
{echo " checked";}
?>> Check this box to display your date of birth in profile.
		<!-- HINT STARTS HERE -->
		<span class="hint_dob" id="hint_dateofbirth">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please select date of birth of the<br>person looking to get married.<br>(Visible only to you)</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->

				</td>
			</tr>

			<tr>
				<td class="td1" style="cursor: pointer;" onclick="focus_field('relationship');" valign="top" width="139"><em>*</em><b>Profile created by</b></td>
				<td class="td2 smallblack" valign="top"><select name="relationship" id="relationship" class="field" onfocus="toggleHint('show', 'relationship')" onblur="validate_relationship(this.name);">
				<?PHP
				$createdby = '<option value="">Select</option><option value="Self">Self</option><option value="Parent / Guardian">Parent / Guardian</option><option value="Sibling">Sibling</option><option value="Friend">Friend</option><option value="Other">Other</option>';
				$createdby = str_replace('<option value="'.$row['CreatedBy'].'">','<option value="'.$row['CreatedBy'].'" selected>', $createdby);
				echo $createdby;
				?>
				</select>
		<!-- HINT STARTS HERE -->
		<span class="hint" id="hint_relationship">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please select your relationship with the person looking to get married.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
	<br>
				<span id="errmsg_relationship" class="error"></span></td>

			</tr>

			<tr>
				<td class="td1" style="cursor: pointer;" onclick="focus_field('maritalstatus');" valign="top"><em>*</em><b>Marital Status</b></td>
				<td class="smallblack" valign="top"><select name="maritalstatus" id="maritalstatus" class="field" onchange="check_maritalstatus();" onfocus="toggleHint('show', 'maritalstatus')" onblur="validate_maritalstatus(this.name);">
				<?PHP
				$maritalstatus = '<option value="">Select</option><option value="Never Married">Never Married</option><option value="Divorced">Divorced</option><option value="Widowed">Widowed</option><option value="Separated">Separated</option><option value="Annulled">Annulled</option>';
				$maritalstatus = str_replace('<option value="'.$row['MaritalStatus'].'">', '<option value="'.$row['MaritalStatus'].'" selected>', $maritalstatus);
				echo $maritalstatus;
				?>
				</select>
		<!-- HINT STARTS HERE -->
		<span class="hint" id="hint_maritalstatus">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please select marital status of the <br>person looking to get married.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
	<br>
				<span id="errmsg_maritalstatus" class="error"></span>
				</td>
			</tr>

			<tr>
				<td class="td1" style="cursor: pointer;" onclick="focus_field('havechildren');" valign="top"><em>*</em><b>Have Children</b></td>
				<td class="smallblack" valign="top"><select name="havechildren" id="havechildren" onfocus="toggleHint('show', 'havechildren')" onblur="validate_havechildren(this.name);" class="field">
				<?PHP
				$havechildren = '<option value="">Select</option><option value="No">No</option><option value="Yes. Living together">Yes. Living together</option><option value="Yes. Not living together">Yes. Not living together</option>';
				$havechildren = str_replace('<option value="'.$row['HaveChildren'].'">', '<option value="'.$row['HaveChildren'].'" selected>', $havechildren);
				echo $havechildren;
				?>
				</select>
		<!-- HINT STARTS HERE -->
		<span class="hint" id="hint_havechildren">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please select if the person looking to get married has children.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
	<br>
				<span id="errmsg_havechildren" class="error"></span>
				</td>
			</tr>

			<tr valign="top">
				<td class="td1" style="cursor: pointer;" onclick="focus_field('height');" valign="top"><em>*</em><b>Height</b></td>
				<td class="smallblack" valign="top">
				<select name="height" id="height" class="field" onfocus="toggleHint('show', 'height')" onblur="validate_height(this.name);">
				<?PHP
				$height = '<option value="">Select</option><option value="53">4ft 5in - 134cm</option><option value="54">4ft 6in - 137cm</option><option value="55">4ft 7in - 139cm</option><option value="56">4ft 8in - 142cm</option><option value="57">4ft 9in - 144cm</option><option value="58">4ft 10in - 147cm</option><option value="59">4ft 11in - 149cm</option><option value="60">5ft - 152cm</option><option value="61">5ft 1in - 154cm</option><option value="62">5ft 2in - 157cm</option><option value="63">5ft 3in - 160cm</option><option value="64">5ft 4in - 162cm</option><option value="65">5ft 5in - 165cm</option><option value="66">5ft 6in - 167cm</option><option value="67">5ft 7in - 170cm</option><option value="68">5ft 8in - 172cm</option><option value="69">5ft 9in - 175cm</option><option value="70">5ft 10in - 177cm</option><option value="71">5ft 11in - 180cm</option><option value="72">6ft - 182cm</option><option value="73">6ft 1in - 185cm</option><option value="74">6ft 2in - 187cm</option><option value="75">6ft 3in - 190cm</option><option value="76">6ft 4in - 193cm</option><option value="77">6ft 5in - 195cm</option><option value="78">6ft 6in - 198cm</option><option value="79">6ft 7in - 200cm</option><option value="80">6ft 8in - 203cm</option><option value="81">6ft 9in - 205cm</option><option value="82">6ft 10in - 208cm</option><option value="83">6ft 11in - 210cm</option><option value="84">7ft - 213cm</option>';
				$height = str_replace('<option value="'.$row['Height'].'">', '<option value="'.$row['Height'].'" selected>', $height);
				echo $height;
				?>

				</select>
		<!-- HINT STARTS HERE -->
		<span class="hint" id="hint_height">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please select Height of the person <br>looking to get married.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
	<br>
					<span id="errmsg_height" class="error"></span>
				</td>
			</tr>

			<tr>
				<td class="td1" style="cursor: pointer;" onclick="focus_field('bodytype');" valign="top"><em>*</em><b>Body Type</b></td>
				<td class="smallblack" valign="top"><select name="bodytype" id="bodytype" class="field" onfocus="toggleHint('show', 'bodytype')" onblur="validate_bodytype(this.name);">
				<?PHP
				$bodytype = '<option value="">Select</option><option value="Slim">Slim</option><option value="Average">Average</option><option value="Athletic">Athletic</option><option value="Heavy">Heavy</option>';
				$bodytype = str_replace('<option value="'.$row['BodyType'].'">', '<option value="'.$row['BodyType'].'" selected>', $bodytype);
				echo $bodytype;
				?>
				</select>
		<!-- HINT STARTS HERE -->
		<span class="hint" id="hint_bodytype">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please select body type of the person looking to get married.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
	<br>
				<span id="errmsg_bodytype" class="error"></span>
				</td>
			</tr>

			<tr>
				<td class="td1" style="cursor: pointer;" onclick="focus_field('complexion');" valign="top"><em>*</em><b>Complexion</b></td>
				<td class="smallblack" valign="top"><select name="complexion" id="complexion" class="field" onfocus="toggleHint('show', 'complexion')" onblur="validate_complexion(this.name);">
				<?PHP
				$complexion = '<option value="">Select</option><option value="Very Fair">Very Fair</option><option value="Fair">Fair</option><option value="Wheatish">Wheatish</option><option value="Wheatish Medium">Wheatish Medium</option><option value="Wheatish Brown">Wheatish Brown</option><option value="Dark">Dark</option>';
				$complexion = str_replace('<option value="'.$row['Complexion'].'">', '<option value="'.$row['Complexion'].'" selected>', $complexion);
				echo $complexion;
				?>
				</select>
		<!-- HINT STARTS HERE -->
		<span class="hint" id="hint_complexion">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please select complexion of the person looking to get married.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
	<br>
				<span id="errmsg_complexion" class="error"></span>
				</td>
			</tr>



			</tbody></table>
			<!-- BASIC INFO EN -->

<br>

			<!-- RELIGIOUS & SOCIAL BACKGROUND ST -->
			<a name="releigon"></a>
			<div class="boldgreen" style="margin-top: 10px;color:#990000;"><b>Religious &amp; Social Background</b></div>


			<!-- Gender form element at registration page is radio button so to pass its value we need to do this.. -->
			

			<table class="tbl1" border="0" cellpadding="5" cellspacing="0">
			<tbody>

			<tr id="show_hide_mothertongue">
				<td class="td1" style="cursor: pointer;" onclick="focus_field('mothertongue');" valign="top"><em>*</em><b>Mother Tongue</b></td>
				<td valign="top">
				<select id="mothertongue" name="mothertongue" class="field" onfocus="toggleHint('show', 'mothertongue')" onblur="validate_mothertongue(this.name);">
				<?PHP
				$mothertongue = '<option value="">----Select Mother Tongue----</option><option value="Aka">Aka</option><option value="Arabic">Arabic</option><option value="Arunachali">Arunachali</option><option value="Assamese">Assamese</option><option value="Awadhi">Awadhi</option><option value="Baluchi">Baluchi</option><option value="Bengali">Bengali</option><option value="Bhojpuri">Bhojpuri</option><option value="Bhutia">Bhutia</option><option value="Brahui">Brahui</option><option value="Brij">Brij</option><option value="Burmese">Burmese</option><option value="Chattisgarhi">Chattisgarhi</option><option value="Chinese">Chinese</option><option value="Coorgi">Coorgi</option><option value="Dogri">Dogri</option><option value="English">English</option><option value="French">French</option><option value="Garhwali">Garhwali</option><option value="Garo">Garo</option><option value="Gujarati">Gujarati</option><option value="Haryanavi">Haryanavi</option><option value="Himachali/Pahari">Himachali/Pahari</option><option value="Hindi">Hindi</option><option value="Hindko">Hindko</option><option value="Kakbarak">Kakbarak</option><option value="Kanauji">Kanauji</option><option value="Kannada">Kannada</option><option value="Kashmiri">Kashmiri</option><option value="Khandesi">Khandesi</option><option value="Khasi">Khasi</option><option value="Konkani">Konkani</option><option value="Koshali">Koshali</option><option value="Kumaoni">Kumaoni</option><option value="Kutchi">Kutchi</option><option value="Ladakhi">Ladakhi</option><option value="Lepcha">Lepcha</option><option value="Magahi">Magahi</option><option value="Maithili">Maithili</option><option value="Malay">Malay</option><option value="Malayalam">Malayalam</option><option value="Manipuri">Manipuri</option><option value="Marathi">Marathi</option><option value="Marwari">Marwari</option><option value="Miji">Miji</option><option value="Mizo">Mizo</option><option value="Monpa">Monpa</option><option value="Nepali">Nepali</option><option value="Oriya">Oriya</option><option value="Pashto">Pashto</option><option value="Persian">Persian</option><option value="Punjabi">Punjabi</option><option value="Rajasthani">Rajasthani</option><option value="Russian">Russian</option><option value="Sanskrit">Sanskrit</option><option value="Santhali">Santhali</option><option value="Seraiki">Seraiki</option><option value="Sindhi">Sindhi</option><option value="Sinhala">Sinhala</option><option value="Spanish">Spanish</option><option value="Swedish">Swedish</option><option value="Tagalog">Tagalog</option><option value="Tamil">Tamil</option><option value="Telugu">Telugu</option><option value="Tulu">Tulu</option><option value="Urdu">Urdu</option><option value="Other">Other</option>';
				$mothertongue = str_replace('<option value="'.$row['MotherTongue'].'">', '<option value="'.$row['MotherTongue'].'"  selected>', $mothertongue);
				echo $mothertongue;
				?>
				</select>
		<!-- HINT STARTS HERE -->
		<span class="hint" id="hint_mothertongue">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please select mother tongue of the person looking to get married.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
	<br>
				<span id="errmsg_mothertongue" class="error"></span>
				</td>
			</tr>
<tr>
					<td class="td1" valign="top"><em>&nbsp;</em><label for="subcaste" style="padding-left: 3px;"><b>Sub caste / sect</b></label></td>
					<td>
					<?php include("sections/subcastes.php"); ?>
					<br>
					<span id="errmsg_caste" class="error"></span></td>
		</tr>
			

			

			<tr>
				<td class="td1" style="cursor: pointer;" onclick="focus_field('familyvalues');" valign="top"><em>*</em><b>Family Values</b></td>
				<td class="td2 smallblack" valign="top"><select name="familyvalues" id="familyvalues" class="field" onfocus="toggleHint('show', 'familyvalues')" onblur="validate_select_box(this, 'field_filled', 'field_err');">
				<?PHP
				$familyvalues = '<option value="">Select</option><option value="Traditional">Traditional</option><option value="Moderate">Moderate</option><option value="Liberal">Liberal</option>';
				$familyvalues = str_replace('<option value="'.$row['FamilyValues'].'">', '<option value="'.$row['FamilyValues'].'" selected>', $familyvalues);
				echo $familyvalues;
				?>
				</select>
		<!-- HINT STARTS HERE -->
		<span class="hint" id="hint_familyvalues">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please select family values of the <br>person looking to get married.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
	<br>
				<span id="errmsg_familyvalues" class="error"></span>
				</td>
			</tr>
			</tbody></table>

			<noscript>
				<style type="text/css">
				<!-- #show_hide_caste	{display: none;} -->
				</style>
			</noscript>
			<!-- RELIGIOUS & SOCIAL BACKGROUND EN -->

<br>

			<!-- EDUCATION & CAREER ST -->
			<a name="education"></a>
			<div class="boldgreen" style="color:#990000; "><b>Education &amp; Career</b></div>

			<table class="tbl1" border="0" cellpadding="5" cellspacing="0">
			<tbody><tr>
				<td class="td1" style="cursor: pointer;" onclick="focus_field('educationlevel');" valign="top" width="139"><em>*</em><b>Education</b></td>
				<td class="td2 smallblack" valign="top">
				<select name="educationlevel" id="educationlevel" class="field" onfocus="toggleHint('show', 'educationlevel')" onblur="validate_educationlevel(this.name);">
				<?PHP
				$educationlevel = '<option value="">Select</option><option value="Bachelors">Bachelors</option><option value="Masters">Masters</option><option value="Doctorate">Doctorate</option><option value="Diploma">Diploma</option><option value="Undergraduate">Undergraduate</option><option value="Associates degree">Associates degree</option><option value="Honours degree">Honours degree</option><option value="Trade school">Trade school</option><option value="High school">High school</option><option value="Less than high school">Less than high school</option><option value="Bachelors">Graduate</option>';
				$educationlevel = str_replace('<option value="'.$row['Education'].'">', '<option value="'.$row['Education'].'" selected>', $educationlevel);
				echo $educationlevel;
				?>

				</select>&nbsp; in &nbsp;
				<select name="educationarea" class="field" onfocus="toggleHint('show', 'educationarea')" onblur="toggleHint('hide', 'educationarea'); checkStyleSelect(this, 'field', 'field_filled');" style="width: 159px;">
				<?PHP
				$educationarea = '<option value="">Select</option><option value="Advertising/ Marketing">Advertising/ Marketing</option><option value="Administrative services">Administrative services</option><option value="Architecture">Architecture</option><option value="Armed Forces">Armed Forces</option><option value="Arts">Arts</option><option value="Commerce">Commerce</option><option value="Computers/ IT">Computers/ IT</option><option value="Education">Education</option><option value="Engineering/ Technology">Engineering/ Technology</option><option value="Fashion">Fashion</option><option value="Finance">Finance</option><option value="Fine Arts">Fine Arts</option><option value="Home Science">Home Science</option><option value="Law">Law</option><option value="Management">Management</option><option value="Medicine">Medicine</option><option value="Nursing/ Health Sciences">Nursing/ Health Sciences</option><option value="Office administration">Office administration</option><option value="Science">Science</option><option value="Shipping">Shipping</option><option value="Travel &amp; Tourism">Travel &amp; Tourism</option>';
				$educationarea = str_replace('<option value="'.$row['EducationIn'].'">', '<option value="'.$row['EducationIn'].'" selected>', $educationarea);
				echo $educationarea;
				?>

				</select>
		<!-- HINT STARTS HERE -->
		<span class="hint_educationlevel" id="hint_educationlevel">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please select educational level of the person looking to get married.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->

		<!-- HINT STARTS HERE -->
		<span class="hint_educationlevel" id="hint_educationarea">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please select educational area of the person looking to get married.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
	<br>
				<span id="errmsg_educationlevel" class="error"></span><span id="errmsg_educationarea" class="error"></span>
				</td>
			</tr>

			<tr>
				<td class="td1" style="cursor: pointer;" onclick="focus_field('occupation');" valign="top"><em>*</em><b>Profession</b></td>
				<td valign="top">
				<select name="occupation" id="occupation" class="field" onfocus="toggleHint('show', 'occupation')" onblur="validate_occupation(this.name);">
				<?PHP
				$profession = '<option value="">Select</option><option value="Not working">Not working</option><option value="Non-mainstream professional">Non-mainstream professional</option><option value="Accountant">Accountant</option><option value="Acting Professional">Acting Professional</option><option value="Actor">Actor</option><option value="Administration Professional">Administration Professional</option><option value="Advertising Professional">Advertising Professional</option><option value="Air Hostess">Air Hostess</option><option value="Architect">Architect</option><option value="Artisan">Artisan</option><option value="Audiologist">Audiologist</option><option value="Banker">Banker</option><option value="Beautician">Beautician</option><option value="Biologist / Botanist">Biologist / Botanist</option><option value="Business Person">Business Person</option><option value="Chartered Accountant">Chartered Accountant</option><option value="Civil Engineer">Civil Engineer</option><option value="Clerical Official">Clerical Official</option><option value="Commercial Pilot">Commercial Pilot</option><option value="Company Secretary">Company Secretary</option><option value="Computer Professional">Computer Professional</option><option value="Consultant">Consultant</option><option value="Contractor">Contractor</option><option value="Cost Accountant">Cost Accountant</option><option value="Creative Person">Creative Person</option><option value="Customer Support Professional">Customer Support Professional</option><option value="Defense Employee">Defense Employee</option><option value="Dentist">Dentist</option><option value="Designer">Designer</option><option value="Doctor">Doctor</option><option value="Economist">Economist</option><option value="Engineer">Engineer</option><option value="Engineer (Mechanical)">Engineer (Mechanical)</option><option value="Engineer (Project)">Engineer (Project)</option><option value="Entertainment Professional">Entertainment Professional</option><option value="Event Manager">Event Manager</option><option value="Executive">Executive</option><option value="Factory worker">Factory worker</option><option value="Farmer">Farmer</option><option value="Fashion Designer">Fashion Designer</option><option value="Finance Professional">Finance Professional</option><option value="Flight Attendant">Flight Attendant</option><option value="Government Employee">Government Employee</option><option value="Health Care Professional">Health Care Professional</option><option value="Home Maker">Home Maker</option><option value="Hotel &amp; Restaurant Professional">Hotel &amp; Restaurant Professional</option><option value="Human Resources Professional">Human Resources Professional</option><option value="Interior Designer">Interior Designer</option><option value="Investment Professional">Investment Professional</option><option value="IT / Telecom Professional">IT / Telecom Professional</option><option value="Journalist">Journalist</option><option value="Lawyer">Lawyer</option><option value="Lecturer">Lecturer</option><option value="Legal Professional">Legal Professional</option><option value="Manager">Manager</option><option value="Marketing Professional">Marketing Professional</option><option value="Media Professional">Media Professional</option><option value="Media Professional">Medical Professional</option><option value="Medical Transcriptionist">Medical Transcriptionist</option><option value="Merchant Naval Officer">Merchant Naval Officer</option><option value="Nurse">Nurse</option><option value="Occupational Therapist">Occupational Therapist</option><option value="Optician">Optician</option><option value="Pharmacist">Pharmacist</option><option value="Physician Assistant">Physician Assistant</option><option value="Physicist">Physicist</option><option value="Physiotherapist">Physiotherapist</option><option value="Pilot">Pilot</option><option value="Politician">Politician</option><option value="Production professional">Production professional</option><option value="Professor">Professor</option><option value="Psychologist">Psychologist</option><option value="Public Relations Professional">Public Relations Professional</option><option value="Real Estate Professional">Real Estate Professional</option><option value="Research Scholar">Research Scholar</option><option value="Retired Person">Retired Person</option><option value="Retired Person">Retail Professional</option><option value="Sales Professional">Sales Professional</option><option value="Scientist">Scientist</option><option value="Self-employed Person">Self-employed Person</option><option value="Social Worker">Social Worker</option><option value="Software Consultant">Software Consultant</option><option value="Sportsman">Sportsman</option><option value="Student">Student</option><option value="Teacher">Teacher</option><option value="Technician">Technician</option><option value="Training Professional">Training Professional</option><option value="Transportation Professional">Transportation Professional</option><option value="Veterinary Doctor">Veterinary Doctor</option><option value="Volunteer">Volunteer</option><option value="Writer">Writer</option><option value="Zoologist">Zoologist</option>';
				$profession = str_replace('<option value="'.$row['Profession'].'">', '<option value="'.$row['Profession'].'" selected>', $profession);
				echo $profession;
				?>
				</select>
		<!-- HINT STARTS HERE -->
		<span class="hint" id="hint_occupation">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please select profession of the person looking to get married.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
	<br>
				<span id="errmsg_occupation" class="error"></span>
				</td>
			</tr>

			</tbody></table>
			<!-- EDUCATION & CAREER EN -->

<br>

			<!-- LIFESTYLE ST -->
			<a name="lifestyle"></a>
			<div class="boldgreen" style="color:#990000; "><b>Lifestyle</b></div>

			<table class="tbl1" border="0" cellpadding="5" cellspacing="0">
			<tbody><tr>
				<td class="td1" style="cursor: pointer;" onclick="focus_field('diet');" valign="top" width="139"><em>*</em><b>Diet</b></td>
				<td class="td2 smallblack" valign="top"><select name="diet" id="diet" class="field" onfocus="toggleHint('show', 'diet')" onblur="validate_select_box(this, 'field_filled', 'field_err');">
				<?PHP
				$diet = '<option value="">Select</option><option value="Veg">Veg</option><option value="Eggetarian">Eggetarian</option><option value="Occasionally Non-Veg">Occasionally Non-Veg</option><option value="Non-Veg">Non-Veg</option><option value="Jain">Jain</option><option value="Vegan">Vegan</option>';
				$diet = str_replace('<option value="'.$row['Diet'].'">', '<option value="'.$row['Diet'].'" selected>', $diet);
				echo $diet;
				?>

				</select>
		<!-- HINT STARTS HERE -->
		<span class="hint" id="hint_diet">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please select dietary habits of the <br>person looking to get married.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
	<br>
				<span id="errmsg_diet" class="error"></span>
				</td>
			</tr>
			<tr>
				<td class="td1" style="cursor: pointer;" onclick="focus_field('smoke');" valign="top"><em>*</em><b>Smoke</b></td>
				<td class="smallblack" valign="top"><select name="smoke" id="smoke" class="field" onfocus="toggleHint('show', 'smoke')" onblur="validate_select_box(this, 'field_filled', 'field_err');">
				<?PHP
				$smoke = '<option value="">Select</option><option value="Yes">Yes</option><option value="No">No</option><option value="Occasionally">Occasionally</option>';
				$smoke = str_replace('<option value="'.$row['Smoke'].'">', '<option value="'.$row['Smoke'].'" selected>', $smoke);
				echo $smoke;
				?>
				</select>
		<!-- HINT STARTS HERE -->
		<span class="hint" id="hint_smoke">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please select smoking habits of the person looking to get married.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
	<br>
				<span id="errmsg_smoke" class="error"></span>
				</td>
			</tr>
			<tr>
				<td class="td1" style="cursor: pointer;" onclick="focus_field('drink');" valign="top"><em>*</em><b>Drink</b></td>
				<td class="smallblack" valign="top"><select name="drink" id="drink" class="field" onfocus="toggleHint('show', 'drink')" onblur="validate_select_box(this, 'field_filled', 'field_err');">
				<?PHP
				$drink = '<option value="">Select</option><option value="Yes">Yes</option><option value="No">No</option><option value="Occasionally">Occasionally</option>';
				$drink = str_replace('<option value="'.$row['Drink'].'">', '<option value="'.$row['Drink'].'" selected>', $drink);
				echo $drink;
				?>
				</select>
		<!-- HINT STARTS HERE -->
		<span class="hint" id="hint_drink">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please select drinking habits of the person looking to get married.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
	<br>
				<span id="errmsg_drink" class="error"></span>
				</td>
			</tr>
			</tbody></table>
			<!-- LIFESTYLE EN -->

<br>

			<!-- LOCATION ST -->
			<a name="location"></a>


			<div class="boldgreen" style="color:#990000; "><b>Location</b></div>

	<spacer type="block" height="1">

			<table class="tbl1" border="0" cellpadding="5" cellspacing="0">

				<tbody><tr valign="top">
					<td class="td1" valign="top" width="139"><em>&nbsp;</em><b>Country of Residence</b></td>
					<td colspan="2" class="td2 smallblack" style="line-height: 16px;" valign="top">
					<select id="country" name="country" class="field_filled" onChange="loadXMLDoc('get_cities2.php')">
				<?PHP
				$sqlCountry = "SELECT * FROM countries order by CountryID";
				$resultCountry = mysql_query($sqlCountry, $conn);
				if (@mysql_num_rows($resultCountry)!=0){
					while($rowCountry = mysql_fetch_array($resultCountry))
					{
						?>
						<option value="<?PHP echo $rowCountry['CountryID']?>"
						<?PHP
						if($row['CountryID'] == $rowCountry['CountryID'])
							echo "selected";
						?>
						><?PHP echo $rowCountry['Country']?></option>
						<?
					}
				}
				?>
				</select>
<br>
					<span class="smallgrey"></span></td>
				</tr>

					<tr height="33">
						<td class="td1" style="cursor: pointer;" onclick="focus_field('stateofresidence');" valign="top"><em>*</em><b>State</b></td>
						<td colspan="2" class="formselect" id="show_hide_state" valign="top">
						<span id="statespan">
						<select name="stateofresidence" id="stateofresidence" class="field" onfocus="toggleHint('show', 'stateofresidence')" onblur="validate_stateofresidence(this.name);">
						<option value="-1">Select state</option>
						<?PHP
						$stateofresidence = "";
				$sqlCountry = "SELECT * FROM states where CountryID=".$row['CountryID']." order by StateID";
				$resultCountry = mysql_query($sqlCountry, $conn);
				if (@mysql_num_rows($resultCountry)!=0){
					while($rowCountry = mysql_fetch_array($resultCountry))
					{
						$stateofresidence.='<option value="'.$rowCountry['StateID'].'">'.$rowCountry['State'].'</option>';
					}
				}
				$stateofresidence.='<option value="-">Other</option>';
				$stateofresidence = str_replace('<option value="'.$row['StateID'].'">', '<option value="'.$row['StateID'].'" selected>', $stateofresidence);
				echo $stateofresidence;
				?>



						</select></span>
		<!-- HINT STARTS HERE -->
		<span class="hint" id="hint_stateofresidence">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please select state of current residence of the person looking to get married.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
	<br>
					<span id="errmsg_stateofresidence" class="error"></span>
						</td>
						</tr>

			<tr>
				<td class="td1" style="cursor: pointer;" onclick="focus_field('nearest_city');" valign="top"><b>&nbsp;&nbsp;&nbsp;City of Residence</b></td>
				<td class="td1" id="show_hide_city" valign="top" width="200">
					<span id="cityspan">
					<select id="nearest_city" name="nearest_city" class="field" onfocus="toggleHint('show', 'nearest_city')" onblur="toggleHint('hide', 'nearest_city'); checkStyleSelect(this, 'field', 'field_filled');"><option value="-1">Select a city</option>
					<?PHP
					$cityofresidence = "";
				$sqlCountry = "SELECT * FROM cities where CountryID=".$row['CountryID']." order by CityID";
				$resultCountry = mysql_query($sqlCountry, $conn);
				if (@mysql_num_rows($resultCountry)!=0){
					while($rowCountry = mysql_fetch_array($resultCountry))
					{
						$cityofresidence .= '<option value="'.$rowCountry['CityID'].'">'.$rowCountry['City'].'</option>';
					}
				}
				$cityofresidence .= '<option value="-">Other</option>';
				$cityofresidence = str_replace('<option value="'.$row['CityID'].'">', '<option value="'.$row['CityID'].'" selected>', $cityofresidence);
				echo $cityofresidence;
				?>
					</select></span>
		<!-- HINT STARTS HERE -->
		<span class="hint" id="hint_nearest_city">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please select city of residence of the person looking to get married.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
						</td>


			</tr>

			<tr>
				<td class="td1" style="cursor: pointer;" onclick="focus_field('residencystatus');" valign="top"><em>*</em><b>Residency Status</b></td>
				<td colspan="2" class="smallblack" valign="top"><select name="residencystatus" id="residencystatus" class="field" onfocus="toggleHint('show', 'residencystatus')" onblur="validate_select_box(this, 'field_filled', 'field_err');">
				<?PHP
				$residencystatus = '<option value="">Select</option><option value="Citizen">Citizen</option><option value="Permanent Resident">Permanent Resident</option><option value="Student Visa">Student Visa</option><option value="Student Visa">Student Visa</option><option value="Temporary Visa">Temporary Visa</option><option value="Work Permit">Work Permit</option>';
				$residencystatus = str_replace('<option value="'.$row['ResidencyStatus'].'">', '<option value="'.$row['ResidencyStatus'].'" selected>', $residencystatus);
				echo $residencystatus;
				?>

				</select>
		<!-- HINT STARTS HERE -->
		<span class="hint" id="hint_residencystatus">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please select residency status of the person looking to get married.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
	<br>
				<span id="errmsg_residencystatus" class="error"></span>
				</td>
			</tr>
			</tbody></table>
			<!-- LOCATION EN -->

			<br>

			<!-- CONTACT DETAILS ST -->

			<a name="contact"></a>
			<div class="boldgreen" style="color:#990000; "><b>Contact Details</b></div>

			<table class="tbl1" border="0" cellpadding="5" cellspacing="0">
			<tbody><tr valign="top">
				<td valign="top">


			<table class="tbl1" border="0" cellpadding="3" cellspacing="0">
			<tbody><tr valign="top">
				<td class="td1" valign="top" width="139"><em>*</em><b><label for="no_type1">Contact Number</label></b></td>
				<td valign="top">

				<span class="smallblack" style="line-height: 14px; text-align: left;">Enter your Telephone or Mobile number and select display option</span><br><br style="line-height: 5px;">
									<table class="nopading" border="0" cellpadding="3" cellspacing="0">
					<tbody><tr>
						<td class="input" align="left" valign="top">
		<!-- HINT STARTS HERE -->
		<span class="hint" id="hint_type">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please select type of phone number of the person who will handle your matrimonial enquiries.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
	<input name="type" id="no_type1" value="telephone" onclick="disable_field('profile', 'std_code', 'telephone');document.getElementById('errmsg_type').innerHTML=''" onfocus="toggleHint('show', this.name)" onblur="validate_type();contact_number_radio(this)" type="radio"
	<?PHP
								if($row['PhoneStatus']=="telephone")
								{
									echo " checked";
								}
								?>>

						<label id="lbl_telephone" for="no_type1" class="smallgrey swidthtext"><b>Telephone</b></label>
						&nbsp;&nbsp;
						<input name="type" id="no_type2" value="mobile" onclick="disable_field('profile', 'std_code', 'mobile');document.getElementById('errmsg_std_code').innerHTML='';document.getElementById('errmsg_type').innerHTML=''; document.forms['profile'].std_code.className='field_filled';" onfocus="toggleHint('show', this.name)" onblur="validate_type();contact_number_radio(this)" type="radio"
						<?PHP
								if($row['PhoneStatus']=="mobile")
								{
									echo " checked";
								}
								?>>

						<label id="lbl_mobile" for="no_type2" class="smallgrey swidthtext"><b>Mobile</b></label><br><span id="errmsg_type" class="error"></span></td>
					</tr>
					</tbody></table>
<br style="line-height: 7px;">
					<table border="0" cellpadding="0" cellspacing="0">
					<tbody><tr>
						<td valign="top" width="250">
						<select name="country_code" class="field" onchange="changecountrycode(this.value,document.getElementById('c_country_code'));" onfocus="toggleHint('show', 'country_code')" onblur="validate_country_select_box(this, 'field_filled', 'field_err');">
						<?PHP
						$countrycode = '<option value="">Select</option><option value="+91|India">India</option><option value="+1|USA">USA</option><option value="+44|United Kingdom">United Kingdom</option><option value="+971|United Arab Emirates">United Arab Emirates</option><option value="+1|Canada">Canada</option><option value="+61|Australia">Australia</option><option value="+92|Pakistan">Pakistan</option><option value="+966|Saudi Arabia">Saudi Arabia</option><option value="+965|Kuwait">Kuwait</option><option value="+27|South Africa">South Africa</option><option value="+93|Afghanistan">Afghanistan</option><option value="+355|Albania">Albania</option><option value="+213|Algeria">Algeria</option><option value="+684|American Samoa">American Samoa</option><option value="+376|Andorra">Andorra</option><option value="+244|Angola">Angola</option><option value="+1|Anguilla">Anguilla</option><option value="+1|Antigua &amp; Barbuda">Antigua &amp; Barbuda</option><option value="+54|Argentina">Argentina</option><option value="+374|Armenia">Armenia</option><option value="+61|Australia">Australia</option><option value="+43|Austria">Austria</option><option value="+994|Azerbaijan">Azerbaijan</option><option value="+1|Bahamas">Bahamas</option><option value="+973|Bahrain">Bahrain</option><option value="+880|Bangladesh">Bangladesh</option><option value="+1|Barbados">Barbados</option><option value="+375|Belarus">Belarus</option><option value="+32|Belgium">Belgium</option><option value="+501|Belize">Belize</option><option value="+1|Bermuda">Bermuda</option><option value="+975|Bhutan">Bhutan</option><option value="+591|Bolivia">Bolivia</option><option value="+387|Bosnia and Herzegovina">Bosnia and Herzegovina</option><option value="+267|Botswana">Botswana</option><option value="+55|Brazil">Brazil</option><option value="+1|Virgin Islands (British)">Virgin Islands (British)</option><option value="+673|Brunei">Brunei</option><option value="+359|Bulgaria">Bulgaria</option><option value="+226|Burkina Faso">Burkina Faso</option><option value="+257|Burundi">Burundi</option><option value="+855|Cambodia">Cambodia</option><option value="+237|Cameroon">Cameroon</option><option value="+1|Canada">Canada</option><option value="+238|Cape Verde">Cape Verde</option><option value="+1|Cayman Islands">Cayman Islands</option><option value="+236|Central African Republic">Central African Republic</option><option value="+235|Chad">Chad</option><option value="+56|Chile">Chile</option><option value="+86|China">China</option><option value="+57|Colombia">Colombia</option><option value="+269|Comoros">Comoros</option><option value="+242|Congo">Congo</option><option value="+682|Cook Islands">Cook Islands</option><option value="+506|Costa Rica">Costa Rica</option><option value="+385|Croatia (Hrvatska)">Croatia (Hrvatska)</option><option value="+53|Cuba">Cuba</option><option value="+357|Cyprus">Cyprus</option><option value="+420|Czech Republic">Czech Republic</option><option value="+850|North Korea">North Korea</option><option value="+243|Congo (DRC)">Congo (DRC)</option><option value="+45|Denmark">Denmark</option><option value="+253|Djibouti">Djibouti</option><option value="+1|Dominica">Dominica</option><option value="+1|Dominican Republic">Dominican Republic</option><option value="+670|East Timor">East Timor</option><option value="+593|Ecuador">Ecuador</option><option value="+20|Egypt">Egypt</option><option value="+503|El Salvador">El Salvador</option><option value="+240|Equatorial Guinea">Equatorial Guinea</option><option value="+291|Eritrea">Eritrea</option><option value="+372|Estonia">Estonia</option><option value="+251|Ethiopia">Ethiopia</option><option value="+500|Falkland Islands">Falkland Islands</option><option value="+298|Faroe Islands">Faroe Islands</option><option value="+679|Fiji Islands">Fiji Islands</option><option value="+358|Finland">Finland</option><option value="+33|France">France</option><option value="+594|French Guiana">French Guiana</option><option value="+689|French Polynesia">French Polynesia</option><option value="+241|Gabon">Gabon</option><option value="+220|Gambia">Gambia</option><option value="+995|Georgia">Georgia</option><option value="+49|Germany">Germany</option><option value="+233|Ghana">Ghana</option><option value="+350|Gibraltar">Gibraltar</option><option value="+30|Greece">Greece</option><option value="+299|Greenland">Greenland</option><option value="+1|Grenada">Grenada</option><option value="+590|Guadeloupe">Guadeloupe</option><option value="+1|Guam">Guam</option><option value="+502|Guatemala">Guatemala</option><option value="+224|Guinea">Guinea</option><option value="+245|Guinea-Bissau">Guinea-Bissau</option><option value="+592|Guyana">Guyana</option><option value="+509|Haiti">Haiti</option><option value="+504|Honduras">Honduras</option><option value="+852|Hong Kong SAR">Hong Kong SAR</option><option value="+36|Hungary">Hungary</option><option value="+354|Iceland">Iceland</option><option value="+91|India">India</option><option value="+62|Indonesia">Indonesia</option><option value="+98|Iran">Iran</option><option value="+964|Iraq">Iraq</option><option value="+353|Ireland">Ireland</option><option value="+972|Israel">Israel</option><option value="+39|Italy">Italy</option><option value="+1|Jamaica">Jamaica</option><option value="+81|Japan">Japan</option><option value="+962|Jordan">Jordan</option><option value="+7|Kazakhstan">Kazakhstan</option><option value="+254|Kenya">Kenya</option><option value="+686|Kiribati">Kiribati</option><option value="+82|Korea">Korea</option><option value="+965|Kuwait">Kuwait</option><option value="+996|Kyrgyzstan">Kyrgyzstan</option><option value="+856|Laos">Laos</option><option value="+371|Latvia">Latvia</option><option value="+961|Lebanon">Lebanon</option><option value="+266|Lesotho">Lesotho</option><option value="+231|Liberia">Liberia</option><option value="+218|Libya">Libya</option><option value="+423|Liechtenstein">Liechtenstein</option><option value="+370|Lithuania">Lithuania</option><option value="+352|Luxembourg">Luxembourg</option><option value="+853|Macao SAR">Macao SAR</option><option value="+261|Madagascar">Madagascar</option><option value="+265|Malawi">Malawi</option><option value="+60|Malaysia">Malaysia</option><option value="+960|Maldives">Maldives</option><option value="+223|Mali">Mali</option><option value="+356|Malta">Malta</option><option value="+596|Martinique">Martinique</option><option value="+222|Mauritania">Mauritania</option><option value="+230|Mauritius">Mauritius</option><option value="+269|Mayotte">Mayotte</option><option value="+52|Mexico">Mexico</option><option value="+691|Micronesia">Micronesia</option><option value="+373|Moldova">Moldova</option><option value="+377|Monaco">Monaco</option><option value="+976|Mongolia">Mongolia</option><option value="+1|Montserrat">Montserrat</option><option value="+212|Morocco">Morocco</option><option value="+258|Mozambique">Mozambique</option><option value="+95|Myanmar">Myanmar</option><option value="+264|Namibia">Namibia</option><option value="+674|Nauru">Nauru</option><option value="+977|Nepal">Nepal</option><option value="+31|Netherlands">Netherlands</option><option value="+599|Netherlands Antilles">Netherlands Antilles</option><option value="+687|New Caledonia">New Caledonia</option><option value="+64|New Zealand">New Zealand</option><option value="+505|Nicaragua">Nicaragua</option><option value="+227|Niger">Niger</option><option value="+234|Nigeria">Nigeria</option><option value="+683|Niue">Niue</option><option value="+672|Norfolk Island">Norfolk Island</option><option value="+47|Norway">Norway</option><option value="+968|Oman">Oman</option><option value="+92|Pakistan">Pakistan</option><option value="+507|Panama">Panama</option><option value="+675|Papua New Guinea">Papua New Guinea</option><option value="+595|Paraguay">Paraguay</option><option value="+51|Peru">Peru</option><option value="+63|Philippines">Philippines</option><option value="+672|Pitcairn Islands">Pitcairn Islands</option><option value="+48|Poland">Poland</option><option value="+351|Portugal">Portugal</option><option value="+1|Puerto Rico">Puerto Rico</option><option value="+974|Qatar">Qatar</option><option value="+262|Reunion">Reunion</option><option value="+40|Romania">Romania</option><option value="+7|Russia">Russia</option><option value="+250|Rwanda">Rwanda</option><option value="+290|St. Helena">St. Helena</option><option value="+1|St. Kitts and Nevis">St. Kitts and Nevis</option><option value="+1|St. Lucia">St. Lucia</option><option value="+508|St. Pierre and Miquelon">St. Pierre and Miquelon</option><option value="+1|St. Vincent &amp; Grenadines">St. Vincent &amp; Grenadines</option><option value="+685|Samoa">Samoa</option><option value="+378|San Marino">San Marino</option><option value="+239|Sao Tome and Principe">Sao Tome and Principe</option><option value="+966|Saudi Arabia">Saudi Arabia</option><option value="+221|Senegal">Senegal</option><option value="+381|Serbia and Montenegro">Serbia and Montenegro</option><option value="+248|Seychelles">Seychelles</option><option value="+232|Sierra Leone">Sierra Leone</option><option value="+65|Singapore">Singapore</option><option value="+421|Slovakia">Slovakia</option><option value="+386|Slovenia">Slovenia</option><option value="+677|Solomon Islands">Solomon Islands</option><option value="+252|Somalia">Somalia</option><option value="+27|South Africa">South Africa</option><option value="+34|Spain">Spain</option><option value="+94|Sri Lanka">Sri Lanka</option><option value="+249|Sudan">Sudan</option><option value="+597|Suriname">Suriname</option><option value="+268|Swaziland">Swaziland</option><option value="+46|Sweden">Sweden</option><option value="+41|Switzerland">Switzerland</option><option value="+963|Syria">Syria</option><option value="+886|Taiwan">Taiwan</option><option value="+992|Tajikistan">Tajikistan</option><option value="+255|Tanzania">Tanzania</option><option value="+66|Thailand">Thailand</option><option value="+389|Macedonia">Macedonia</option><option value="+228|Togo">Togo</option><option value="+690|Tokelau">Tokelau</option><option value="+676|Tonga">Tonga</option><option value="+1|Trinidad and Tobago">Trinidad and Tobago</option><option value="+216|Tunisia">Tunisia</option><option value="+90|Turkey">Turkey</option><option value="+993|Turkmenistan">Turkmenistan</option><option value="+1|Turks and Caicos Islands">Turks and Caicos Islands</option><option value="+688|Tuvalu">Tuvalu</option><option value="+256|Uganda">Uganda</option><option value="+380|Ukraine">Ukraine</option><option value="+971|United Arab Emirates">United Arab Emirates</option><option value="+44|United Kingdom">United Kingdom</option><option value="+1|Virgin Islands">Virgin Islands</option><option value="+598|Uruguay">Uruguay</option><option value="+1|USA">USA</option><option value="+998|Uzbekistan">Uzbekistan</option><option value="+678|Vanuatu">Vanuatu</option><option value="+58|Venezuela">Venezuela</option><option value="+84|Vietnam">Vietnam</option><option value="+681|Wallis and Futuna">Wallis and Futuna</option><option value="+967|Yemen">Yemen</option><option value="+381|Yugoslavia">Yugoslavia</option><option value="+260|Zambia">Zambia</option><option value="+263|Zimbabwe">Zimbabwe</option>';
	$countrycode = str_replace('<option value="'.$row['CountryCode2'].'">', '<option value="'.$row['CountryCode2'].'" selected>', $countrycode);
				echo $countrycode;
						?>
						</select>
		<!-- HINT STARTS HERE -->
		<span class="hint" id="hint_country_code">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please enter country code for phone number of the person who will handle your matrimonial enquiries.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
	<br>
						<span id="errmsg_country_code" class="error"></span><br style="line-height: 5px;">
						<input class="field" name="c_country_code" id="c_country_code" value="<?PHP echo stripslashes($row['CountryCode'])?>" size="2" title="Country code"  style="width: 62px;" type="text" readonly> &nbsp;&nbsp;
						<input class="field" name="std_code" id="std_code" value="<?PHP echo stripslashes($row['AreaStdCode'])?>" size="2" title="Area code" style="width: 62px;" maxlength="6" onkeydown="this.className='field'" onfocus="toggleHint('show', this.name)" onblur="validate_std_code(this, 'field_filled', 'field_err');" type="text"> &nbsp;&nbsp;
						<input class="field" name="contact_number" value="<?PHP echo stripslashes($row['PhoneNumber'])?>" size="13" title="Phone number" style="width: 88px;" maxlength="15" onkeydown="this.className='field'" onfocus="toggleHint('show', this.name)" onblur="validate_contact_number(this, 'field_filled', 'field_err');" type="text"><br>
						<span class="smallgrey">Country code &nbsp;Area/STD code &nbsp;Phone number</span>
		<!-- HINT STARTS HERE -->
		<span class="hint_contact_number" id="hint_std_code">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please specify area code of the phone number of the person who will handle your matrimonial enquiries.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->

		<!-- HINT STARTS HERE -->
		<span class="hint_contact_number" id="hint_contact_number">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please specify phone number of the person who will handle your <br>matrimonial enquiries.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
	<span id="errmsg_std_code" class="error"></span><span id="errmsg_contact_number" class="error"></span>
						</td>
					</tr>
					</tbody></table>
				</td>
			</tr>

			</tbody></table>
			</td>

			</tr>
			<tr>
				<td colspan="2" valign="top">
					<table class="tbl1" border="0" cellpadding="3" cellspacing="0" width="100%">
					<tbody><tr>
				<td class="td1" valign="top" width="139"><em>*</em><b><label for="contact_details_dislay_status_show_all">Display Options</label></b></td>
				<td class="smallblack" valign="top">
								<input name="contact_details_dislay_status" id="contact_details_dislay_status_show_all" value="Show" style="margin-left: 0px;" onfocus="toggleHint('show', this.name)" onblur="validate_contact_details_dislay_status();contact_number_display_radio(this)" onclick="document.getElementById('errmsg_contact_details_dislay_status').innerHTML=''" type="radio"
								<?PHP
								if($row['DisplayContactStatus']=="Show")
								{
									echo " checked";
								}
								?>
								>
		<!-- HINT STARTS HERE -->
		<span class="hint_display_options" id="hint_contact_details_dislay_status">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please select if you wish to display your contact details.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
	<label id="lbl_cnt_display_yes" for="contact_details_dislay_status_show_all" class="swidthtext"><b>Yes</b>, I wish to display the contact details.</label> <img src="images/profile-show.gif" align="middle" border="0" height="23" width="19">

				<span style="line-height: 2px;"><br></span>

				<input name="contact_details_dislay_status" id="contact_details_dislay_status_none" value="None" style="margin-left: 0px;" onfocus="toggleHint('show', this.name)" onblur="validate_contact_details_dislay_status();contact_number_display_radio(this)" onclick="document.getElementById('errmsg_contact_details_dislay_status').innerHTML=''" type="radio"
				<?PHP
								if($row['DisplayContactStatus']!="Show")
								{
									echo " checked";
								}
								?>><label id="lbl_cnt_display_no" for="contact_details_dislay_status_none" class="swidthtext"> <b>No</b>, I do not wish to display the contact details.</label> <img src="images/profile-hide.gif" align="middle" border="0" height="23" width="19"><br><span id="errmsg_contact_details_dislay_status" class="error"></span>


				</td>

			</tr>
			<tr>
				<td colspan="2" valign="top">
				<span class="smallgrey"><b> Note :</b></span>


				<ul style="list-style-type: disc; list-style-position: outside; margin-top: 0px;">
				<li class="smallgrey">Your contact details are not shared with any third party.</li></ul>


				</td>
			</tr>
					</tbody></table>
				</td>
			</tr>
			</tbody></table>

						<!-- CONTACT DETAILS EN -->

			<!-- MORE ABOUT YOURSELF ST -->
			<a name="moreprofile1"></a>
			<div class="boldgreen" style="color:#990000; "><b>More About Yourself</b></div>

			<table class="tbl1" style="margin-left: 1px;" border="0" cellpadding="5" cellspacing="0">
			<tbody><tr valign="top">
				<td colspan="2" class="mediumblack" valign="top">This section will help you make a strong impression on your potential partner. So, express yourself.</td>
			</tr>

			<tr valign="top">
					<td class="td1" valign="top"><b style="float: left;"><em>*</em><label for="aboutyourself">Describe yourself, your likes &amp; dislikes, the kind of person you are looking for, etc.</label></b>


				<textarea name="aboutyourself" id="aboutyourself" rows="6" cols="90" onkeyup="calcCharLen('profile', 'aboutyourself', 'counter1', 4000)" onblur="toggleHint('hide', this.name); validate_describe_yourself(this, 'field_filled', 'field_err'); calcCharLen('profile', 'aboutyourself', 'counter1', 4000);" wrap="virtual" class="field" style="width: 500px;" onkeydown="this.className='field'" onfocus="toggleHint('show', this.name)"><?PHP echo stripslashes($row['AboutYourself'])?></textarea>
		<!-- HINT STARTS HERE -->
		<span class="hint_describe_yourself" id="hint_aboutyourself">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please enter more details about the person looking to get married.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
					<div style="background: rgb(231, 231, 231) none repeat scroll 0%; width: 500px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial;" class="smallblack"><img src="images/gry-arrow.gif" style="margin: 4px 4px 6px 8px;" align="middle" hspace="1">&nbsp;No. of characters:  <input name="counter1" id="counter1" value="0" class="formselect" size="2" readonly="readonly" style="border: medium none ; background: rgb(231, 231, 231) none repeat scroll 0%; width: 30px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; color: #FC9E86;" type="text">(min. 100 characters; max. 4000)</div><span id="errmsg_aboutyourself" class="error"></span>
				<a name="moreprofile2"></a>
				</td>
			</tr>

			</tbody></table>
			<!-- MORE ABOUT YOURSELF EN -->
<br>
<input type="hidden" name="continue" value="true">
			<script language="Javascript">	document.profile.elements['counter1'].value=document.profile.elements['aboutyourself'].value.length;	</script>

			<!-- PROFILE CONTENTS EN -->



		<table class="tbl1 end" style="margin-left: 11px;" border="0" cellpadding="0" cellspacing="0">
		<tbody><tr >
			<td class="td2">
			<input src="images/submit.gif" style="width: 76px; height: 22px;" border="0" type="image" vspace="10">


			</td>
		</tr>

		</tbody></table>


	</form></div>





		</div><br clear="all">
	</div>
</div>
</center>
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