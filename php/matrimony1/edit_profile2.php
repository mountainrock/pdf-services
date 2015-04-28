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
$i=0;
$grewupin = "";
while($i < count($_REQUEST['grew_up_inarray']))
{
if($_REQUEST['grew_up_inarray'][$i]!="")
{
if($i==0)
{
$grewupin = $_REQUEST['grew_up_inarray'][$i];
}
else
{
$grewupin .= "|".$_REQUEST['grew_up_inarray'][$i];
}
}
$i=$i+1;
}

if($_POST['countryofbirth']=="")
{
$BirthCountry = 0;
}
else
{
$BirthCountry = $_POST['countryofbirth'];
}
			$insert = "update user_profile set BloodGroup='".mysql_escape_string($_POST['bloodgroup'])."', Gotra='".mysql_escape_string($_POST['gotra'])."', AnnualIncome='".mysql_escape_string($_POST['annualincome'])."', ContactPersonName='".mysql_escape_string($_POST['contact_details_contact_person'])."', ContactPersonRelationShip='".mysql_escape_string($_POST['contact_details_relationship'])."', ConvenientCallTime='".mysql_escape_string($_POST['contact_details_convenient_time'])."', PersonalValues='".$_POST['personal_values']."', CountryOfBirth=".$BirthCountry.", GrewUpIn='".$grewupin."', Father='".$_POST['family_father']."', Mother='".$_POST['family_mother']."', Brothers='".$_POST['num_of_brother']."', MarriedBrothers='".$_POST['num_of_married_brother']."', Sisters='".$_POST['num_of_sister']."', MarriedSisters='".$_POST['num_of_married_sister']."', AboutFamily='".mysql_escape_string($_POST['aboutfamily'])."'  where UserID=".$_SESSION['UserID'];

			$resultt = mysql_query($insert);


	header("Location: my_profile.php");
	exit();
}
$sql = "SELECT * FROM users, user_profile, countries WHERE users.UserID=user_profile.UserID and users.CountryID=countries.CountryID and users.UserID=".$_SESSION['UserID'];
$result = mysql_query($sql,$conn);
$row = @mysql_fetch_array($result);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Marry Banjara - Edit Your Profile</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/editprofile.css">
<script language="javascript" src="js/ajax-v2-inc-mod.js"></script>
<script language="javascript" src="js/tool-tip.js"></script>
<script language="javascript" src="js/common_002.js"></script>
<script language="javascript" src="js/ajax-v2-inc-mod.js"></script>
<script language="javascript" src="js/editprofile2.js"></script>
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
				<!-- The top link table ends here -->

			
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
<div style="width: 552px;">
	<div style="background: rgb(255, 255, 255) none repeat scroll 0%; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial;">
		<div class="mediumblack" style="width: 550px;">



	<div style="border: 0px solid rgb(0, 0, 0); margin: 0pt 30px; text-align: left;">



			<div style="border-bottom: 1px solid rgb(143, 167, 191); padding: 12px 0px 7px; margin-bottom: 10px;">
				<h2><span style="color: rgb(213, 86, 1);">Edit your profile...</span></h2>
			</div>


		<!-- PAGE STYLE ST -->
		<script src="js/common.js" type="text/javascript" language="javascript1.2"></script>
		<script src="js/registration2-1.js" type="text/javascript" language="javascript1.2"></script>


		<!-- PAGE STYLE EN -->





	<form method="post" action="edit_profile2.php" name="profile" id="profile" style="margin: 0px;" onSubmit="return validateform(this);">


	<!-- PROFILE CONTENTS ST -->

		<!-- BASIC INFO ST -->
		<br style="line-height: 10px;">
		<a name="basics"></a>
		<div class="boldgreen" style="color:#990000; "><b>More about yourself</b> <span style="font-family: tahoma; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127); padding-left: 25px;">* Compulsory Fields</span></div>

		<table class="tbl1" style="margin-top: 8px;" border="0" cellpadding="5" cellspacing="0">


		<tbody><tr>
			<td class="td1" style="cursor: pointer;" onclick="focus_field('bloodgroup');" valign="top" width="139"><em>&nbsp; </em><b>Blood Group</b></td>
			<td class="smallblack" valign="top"><input type="hidden" name="continue" value="true">
			<select name="bloodgroup" id="bloodgroup" class="field_filled" onfocus="toggleHint('show', 'bloodgroup')" onblur="toggleHint('hide', 'bloodgroup'); checkStyleSelect(this, 'field', 'field_filled');">
			<?PHP
			$bloodgroup = '<option value="">Select</option><option value="Don\'t Know">Don\'t Know</option><option value="A+">A+</option><option value="A-">A-</option><option value="B+">B+</option><option value="B-">B-</option><option value="AB+">AB+</option><option value="AB-">AB-</option><option value="O+">O+</option><option value="O-">O-</option>';
			$bloodgroup = str_replace('<option value="'.$row['BloodGroup'].'">', '<option value="'.$row['BloodGroup'].'" selected>', $bloodgroup);
			echo $bloodgroup;
			?>
			</select>
		<!-- HINT STARTS HERE -->
		<span style="display: none;" class="hint" id="hint_bloodgroup">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please select blood group of the person looking to get married.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
				</td>
		</tr>
		<tr>
			<td class="td1" style="cursor: pointer;" onclick="focus_field('annualincome');" valign="top"><em>&nbsp; </em><b>Annual Income</b></td>
			<td valign="top">
			<select name="annualincome" id="annualincome" class="field_filled" onfocus="toggleHint('show', 'annualincome')" onblur="toggleHint('hide', 'annualincome'); checkStyleSelect(this, 'field', 'field_filled');">
			<?PHP
			$annualincome = '<option selected="selected" value="">Select</option><option value="Under Rs.50,000">Under Rs.50,000</option><option value="Rs.50,001 - 1,00,000">Rs.50,001 - 1,00,000</option><option value="Rs.1,00,001 - 2,00,000">Rs.1,00,001 - 2,00,000</option><option value="Rs.2,00,001 - 3,00,000">Rs.2,00,001 - 3,00,000</option><option value="Rs.3,00,001 - 4,00,000">Rs.3,00,001 - 4,00,000</option><option value="Rs.4,00,001 - 5,00,000">Rs.4,00,001 - 5,00,000</option><option value="Rs.5,00,001 - 10,00,000">Rs.5,00,001 - 10,00,000</option><option value="Rs.10,00,001 and above">Rs.10,00,001 and above</option><option></option><option value="Under $25,000">Under $25,000</option><option value="$25,001 - 50,000">$25,001 - 50,000</option><option value="$50,001 - 75,000">$50,001 - 75,000</option><option value="$75,001 - 100,000">$75,001 - 100,000</option><option value="$100,001 - 150,000">$100,001 - 150,000</option><option value="$150,001 - 200,000">$150,001 - 200,000</option><option value="$200,001 and above">$200,001 and above</option>';
			$annualincome = str_replace('<option value="'.$row['AnnualIncome'].'">', '<option value="'.$row['AnnualIncome'].'" selected>', $annualincome);
			echo $annualincome;
			?>

			</select>
		<!-- HINT STARTS HERE -->
		<span style="display: none;" class="hint" id="hint_annualincome">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please select annual income of the person looking to get married.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
				</td>
		</tr>
		</tbody></table>
		<!-- BASIC INFO EN -->

		<br>

		<!-- CONTACT DETAILS ST -->

		<a name="contact"></a>
		<div class="boldgreen" style="color:#990000; "><b>Contact Details</b></div>

		<table class="tbl1" border="0" cellpadding="5" cellspacing="0" width="450">
		<tbody><tr valign="top">
			<td valign="top">


		<table class="tbl1" border="0" cellpadding="5" cellspacing="0">
		<tbody><tr valign="top">
			<td class="td1" height="35" valign="top" width="139"><em>*</em><b><label for="no_type1">Contact Number</label></b></td>
			<td class="smallblack" valign="top"><input name="phone_number_display" value="<?PHP echo $row['CountryCode'].' '.$row['AreaStdCode'].' '.$row['PhoneNumber']?>" readonly class="field_filled_disable" type="text"></td>
		</tr>

		<tr height="33">
			<td class="td1" valign="top"><em>*</em><label for="contact_details_contact_person" style="padding-left: 3px; line-height: 16px;"><b>Name of <br>&nbsp;&nbsp;&nbsp;&nbsp;Contact Person</b></label></td>
			<td valign="top">
			<input name="contact_details_contact_person" id="contact_details_contact_person" class="field_filled" value="<?PHP echo $row['ContactPersonName']?>" onkeydown="this.className='field'" onfocus="toggleHint('show', this.name)" onblur="validate_contact_details_contact_person();" type="text">
		<!-- HINT STARTS HERE -->
		<span style="display: none;" class="hint" id="hint_contact_details_contact_person">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please enter name of the person <br>who will handle your matrimonial enquiries.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
	<br><span id="errmsg_contact_details_contact_person" class="error"></span>
			</td>
		</tr>

		<tr height="33">
			<td class="td1" style="cursor: pointer;" onclick="focus_field('contact_details_relationship');" valign="top"><em>*</em><span style="padding-left: 3px; line-height: 16px;"><b>Relationship with<br> &nbsp; &nbsp; &nbsp;the member</b></span></td>
			<td valign="top">
			<select name="contact_details_relationship" id="contact_details_relationship" class="field_filled" onfocus="toggleHint('show', 'contact_details_relationship')" onblur="validate_contact_details_relationship(this.name);">
			<?PHP
			$relationship='<option value="">Select</option><option value="Self">Self</option><option value="Parent">Parent</option><option value="Guardian">Guardian</option><option value="Sibling">Sibling</option><option value="Relative">Relative</option><option value="Friend">Friend</option><option value="Other">Other</option>';
			$relationship = str_replace('<option value="'.$row['ContactPersonRelationShip'].'">', '<option value="'.$row['ContactPersonRelationShip'].'" selected>', $relationship);
			echo $relationship;
			?>
			</select>
		<!-- HINT STARTS HERE -->
		<span style="display: none;" class="hint" id="hint_contact_details_relationship">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please select the contact persons relationship with the person looking to <br>get married.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
	<br>
			<span id="errmsg_contact_details_relationship" class="error"></span>
			</td>
		</tr>

		<tr>
			<td class="td1" valign="top"><em>*</em><b><label for="contact_details_convenient_time" style="padding-left: 3px; line-height: 16px;"><label for="contact_details_convenient_time">Convenient Time</label><br> &nbsp; &nbsp; &nbsp;to Call</label></b></td>
			<td class="smallgrey" valign="top">
			<input class="field_filled" name="contact_details_convenient_time" id="contact_details_convenient_time" value="<?PHP echo $row['ConvenientCallTime']?>" size="13" onkeydown="this.className='field'" onfocus="toggleHint('show', this.name)" onblur="validate_contact_details_convenient_time();" type="text">
		<!-- HINT STARTS HERE -->
		<span style="display: none;" class="hint" id="hint_contact_details_convenient_time">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please enter convenient time to call the contact person.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
	<br>
			For e.g. Between 10:00 am and 6:00 pm<br><span id="errmsg_contact_details_convenient_time" class="error"></span>
			</td>
		</tr>

		</tbody></table>
		</td>
		<td width="170">
</td>
		</tr>
		<tr>
			<td style="padding-left: 20px;" nowrap="nowrap" valign="top">
				<span class="smallgrey"><b> Note :</b></span>
				<ul style="list-style-type: disc; list-style-position: outside; margin-top: 0px;">
				<li class="smallgrey">You can change your contact details preference anytime by visiting 'My Contact Details' section.</li>
				<li class="smallgrey">Your contact details are not shared with any third party.</li></ul>

			</td>
			<td style="padding-top: 20px;" align="right" valign="top">
			</td>
		</tr>
				</tbody></table>




		<!-- CONTACT DETAILS EN -->


		<!-- CULTURAL BACKGROUND ST -->
		<a name="Culturalbackground"></a>
<div class="boldgreen" style="color:#990000; "><b>Cultural background</b></div>

<table class="tbl1" style="margin-top: 8px;" border="0" cellpadding="5" cellspacing="0">
<tbody><tr>
	<td class="td1" style="cursor: pointer;" onclick="focus_field('personal_values');" width="139"><b>Personal values</b></td>
	<td><select name="personal_values" id="personal_values" class="field_filled" onfocus="toggleHint('show', 'personal_values')" onblur="toggleHint('hide', 'personal_values'); checkStyleSelect(this, 'field', 'field_filled');">
	<?PHP
	$personalvalues='<option selected="selected" value="">Select</option><option value="Traditional">Traditional</option><option value="Moderate">Moderate</option><option value="Liberal">Liberal</option>';
	$personalvalues = str_replace('<option value="'.$row['PersonalValues'].'">', '<option value="'.$row['PersonalValues'].'" selected>', $personalvalues);
			echo $personalvalues;
	?>
	</select></td>
</tr>
<tr>
	<td class="td1" style="cursor: pointer;" onclick="focus_field('countryofbirth');"><b>Country of birth</b></td>
	<td>
	<select name="countryofbirth" id="countryofbirth" class="field_filled" onfocus="toggleHint('show', 'countryofbirth')" onblur="toggleHint('hide', 'countryofbirth'); checkStyleSelect(this, 'field', 'field_filled');"><option selected="selected" value="">Select</option>

				<?PHP
				$sqlCountry = "SELECT * FROM countries order by CountryID";
				$resultCountry = mysql_query($sqlCountry, $conn);
				if (@mysql_num_rows($resultCountry)!=0){
					while($rowCountry = mysql_fetch_array($resultCountry))
					{
						?>
						<option value="<?PHP echo $rowCountry['CountryID']?>"
						<?PHP
						if($row['CountryOfBirth'] == $rowCountry['CountryID'])
							echo "selected";
						?>
						><?PHP echo $rowCountry['Country']?></option>
						<?
					}
				}
				?>


	</select></td>
</tr>
<tr>
	<td class="td1" style="cursor: pointer;" onclick="focus_field('grew_up_inarray');" valign="top"><b>Grew up in</b></td>
	<td>
		<select multiple="multiple" size="6" name="grew_up_inarray[]" id="grew_up_inarray" class="field_filled" onfocus="toggleHint('show', 'grew_up_inarray')" onblur="toggleHint('hide', 'grew_up_inarray'); checkStyleSelect(this, 'field', 'field_filled');"><option value="" selected="selected">Select</option>

					<?PHP
					$selectgrewupin="";
				$sqlCountry = "SELECT * FROM countries order by CountryID";
				$resultCountry = mysql_query($sqlCountry, $conn);
				echo @mysql_num_rows($resultCountry);
				if (@mysql_num_rows($resultCountry)!=0){
					while($rowCountry = @mysql_fetch_array($resultCountry))
					{
						$selectgrewupin .= '<option value="'.$rowCountry['CountryID'].'">'.$rowCountry['Country'].'</option>';
					}
				}
				$grewupin1 = explode("|",$row['GrewUpIn']);
				for($x=0; $x < count($grewupin1); $x++)
				{
					$selectgrewupin= str_replace('<option value="'.$grewupin1[$x].'">', '<option value="'.$grewupin1[$x].'" selected>', $selectgrewupin);
				}
				echo $selectgrewupin;
				?>


		</select></td>
</tr>
</tbody></table>

<!-- CULTURAL BACKGROUND EN -->
		<br>

		<!-- FAMILY ST -->
		<a name="family"></a>
		<div class="boldgreen" style="color:#990000; "><b>About your family</b></div>

		<table class="tbl1" style="margin-top: 8px;" border="0" cellpadding="6" cellspacing="0">
		<tbody><tr>
			<td class="td1" style="cursor: pointer;" onclick="focus_field('family_father');" valign="top" width="139"><em>*</em><b>Father</b></td>
			<td valign="top"><select name="family_father" id="family_father" class="field_filled" onfocus="toggleHint('show', 'family_father')" onblur="validate_select_box(this, 'field_filled', 'field_err');">
			<?PHP
			$father='<option value="">Select</option><option value="Employed">Employed</option><option value="Business">Business</option><option value="Professional">Professional</option><option value="Retired">Retired</option><option value="Not Employed">Not Employed</option><option value="Passed Away">Passed Away</option>';
			$father = str_replace('<option value="'.$row['Father'].'">', '<option value="'.$row['Father'].'" selected>', $father);
			echo $father;
			?>

			</select>
		<!-- HINT STARTS HERE -->
		<span style="display: none;" class="hint" id="hint_family_father">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please select relevant information of father.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
	<br>
			<span id="errmsg_family_father" class="error"></span>
			</td>
		</tr>

		<tr>
			<td class="td1" style="cursor: pointer;" onclick="focus_field('family_mother');" valign="top"><em>*</em><b>Mother</b></td>
			<td valign="top">
			<select name="family_mother" id="family_mother" class="field_filled" onfocus="toggleHint('show', 'family_mother')" onblur="validate_select_box(this, 'field_filled', 'field_err');">
			<?PHP
			$mother = '<option value="">Select</option><option value="Homemaker">Homemaker</option><option value="Employed">Employed</option><option value="Business">Business</option><option value="Professional">Professional</option><option value="Retired">Retired</option><option value="Passed Away">Passed Away</option>';
			$mother = str_replace('<option value="'.$row['Mother'].'">', '<option value="'.$row['Mother'].'" selected>', $mother);
			echo $mother;
			?>
			</select>
		<!-- HINT STARTS HERE -->
		<span style="display: none;" class="hint" id="hint_family_mother">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please select relevant information of mother.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
	<br>
			<span id="errmsg_family_mother" class="error"></span>
			</td>
		</tr>

		<tr>
			<td class="td1" style="cursor: pointer;" onclick="focus_field('num_of_brother');" valign="top"><em>*</em><b>Brother(s)</b></td>
			<td class="td2 smallblack" valign="top">
			<select name="num_of_brother" id="num_of_brother" class="field_filled1" onchange="num_of_siblings_validation('brother')" onfocus="toggleHint('show', 'num_of_brother')" onblur="validate_num_of_brother(this.name);">
			<?PHP
			$brothers='<option value="">Select</option><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="2+">2+</option>';
			$brothers = str_replace('<option value="'.$row['Brothers'].'">', '<option value="'.$row['Brothers'].'" selected>', $brothers);
			echo $brothers;
			?>

			</select>&nbsp; <b>of which married </b>&nbsp;
			<select name="num_of_married_brother" class="field_filled1" onchange="num_of_siblings_validation('brother')" onfocus="toggleHint('show', 'num_of_married_brother')" onblur="validate_num_of_married_brother(this.name);">
			<?PHP
			$marriedbrothers='<option value="">Select</option><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="2+">2+</option>';
			$marriedbrothers = str_replace('<option value="'.$row['MarriedBrothers'].'">', '<option value="'.$row['MarriedBrothers'].'" selected>', $marriedbrothers);
			echo $marriedbrothers;
			?>
			</select>
		<!-- HINT STARTS HERE -->
		<span style="display: none;" class="hint_family" id="hint_num_of_brother">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please select total number of brother(s) the person looking to get married has.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->

		<!-- HINT STARTS HERE -->
		<span style="display: none;" class="hint_family" id="hint_num_of_married_brother">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please select number of brother(s) married.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
	<br>
			<span id="errmsg_num_of_brother" class="error"></span><span id="errmsg_num_of_married_brother" class="error"></span>
			</td>
		</tr>

		<tr>
			<td class="td1" style="cursor: pointer;" onclick="focus_field('num_of_sister');" valign="top"><em>*</em><b>Sister(s)</b></td>
			<td class="td2 smallblack" valign="top">
			<select name="num_of_sister" id="num_of_sister" class="field_filled1" onchange="num_of_siblings_validation('sister')" onfocus="toggleHint('show', 'num_of_sister')" onblur="validate_num_of_sister(this.name);">
			<?PHP
			$sisters='<option value="">Select</option><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="2+">2+</option>';
			$sisters = str_replace('<option value="'.$row['Sisters'].'">', '<option value="'.$row['Sisters'].'" selected>', $sisters);
			echo $sisters;
			?>
			</select>&nbsp; <b>of which married </b>&nbsp;
			<select name="num_of_married_sister" class="field_filled1" onchange="num_of_siblings_validation('sister')" onfocus="toggleHint('show', 'num_of_married_sister')" onblur="validate_num_of_married_sister(this.name);">
			<?PHP
			$marriedsisters='<option value="">Select</option><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="2+">2+</option>';
			$marriedsisters = str_replace('<option value="'.$row['MarriedSisters'].'">', '<option value="'.$row['MarriedSisters'].'" selected>', $marriedsisters);
			echo $marriedsisters;
			?>
			</select>
		<!-- HINT STARTS HERE -->
		<span style="display: none;" class="hint_family" id="hint_num_of_sister">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please select total number of sister(s)<br> the person looking to get married has.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->

		<!-- HINT STARTS HERE -->
		<span style="display: none;" class="hint_family" id="hint_num_of_married_sister">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please select number of sister(s) married.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
	<br>
			<span id="errmsg_num_of_sister" class="error"></span><span id="errmsg_num_of_married_sister" class="error"></span>
			</td>
		</tr>

		</tbody></table>
		<table class="tbl1" style="margin-left: 5px;" border="0" cellpadding="5" cellspacing="0" width="400">
		<tbody><tr valign="top">
			<td colspan="2" class="td1" valign="top"><!-- <em>*</em> --><b style="float: left;"><label for="aboutfamily">Describe your family</label></b>

			<textarea name="aboutfamily" id="aboutfamily" rows="6" cols="90" wrap="virtual" maxlength="1000" onkeyup="calcCharLen('profile', 'aboutfamily', 'counter2', 1000)" onblur="toggleHint('hide', this.name); calcCharLen('profile', 'aboutfamily', 'counter2', 1000); checkStyle(this, 'field', 'field_filled');" class="field" style="width: 450px;" onkeydown="this.className='field'" onfocus="toggleHint('show', this.name)"><?PHP echo $row['AboutFamily']?></textarea>
		<!-- HINT STARTS HERE -->
		<span  class="hint_describe_yourself" id="hint_aboutfamily">
		<div>
			<div><img src="images/top-hint.gif" height="10" width="201"></div>
			<div style="padding: 0pt 5px 0pt 8px; background: transparent url(images/bg-hint.gif) no-repeat scroll 0%; width: 201px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; font-family: arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; color: rgb(127, 127, 127);">Please enter family background details about the person looking to get married.</div>
			<div><img src="images/bottom-hint.gif" height="9" width="201"></div>
		</div>
		<div style="position: absolute; top: 25px; left: -20px;"><img src="images/arrow-hint.gif" height="16" width="21"></div>
		</span>
		<!-- HINT ENDS HERE -->
				<div style="background: rgb(231, 231, 231) none repeat scroll 0%; width: 450px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial;" class="smallblack"><img src="images/gry-arrow.gif" style="margin: 4px 4px 6px 8px;" align="middle" hspace="1">&nbsp;No. of characters:  <input name="counter2" id="counter2" value="0" class="formselect" size="2" readonly="readonly" style="border: medium none ; background: rgb(231, 231, 231) none repeat scroll 0%; width: 30px; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; color: rgb(255, 51, 0);" type="text">(max. 1000 characters)</div><span id="errmsg_aboutfamily" class="error"></span>
			</td>
		</tr>
		</tbody></table>
		<!-- FAMILY EN -->

<br>

		<script language="Javascript">	document.profile.elements['counter2'].value=document.profile.elements['aboutfamily'].value.length;
		</script>

		<!-- PROFILE CONTENTS EN -->


		<hr color="#8ea6be" size="1">
		<center><table class="tbl1 end" style="margin-left: 11px;" border="0" cellpadding="0" cellspacing="0">
		<tbody><tr height="60">
			<td class="td2" valign="top">
			<input src="images/submit.gif" border="0" type="image" vspace="10">
			</td>
		</tr>
		</tbody></table></center>


		</form>



	<script laguage="javascript">

	function num_of_siblings_validation(type)
	{
		var num_of_brother = document.profile.num_of_brother.options[document.profile.num_of_brother.selectedIndex].text;
		var num_of_married_brother = document.profile.num_of_married_brother.options[document.profile.num_of_married_brother.selectedIndex].text;
		var num_of_sister = document.profile.num_of_sister.options[document.profile.num_of_sister.selectedIndex].text;
		var num_of_married_sister = document.profile.num_of_married_sister.options[document.profile.num_of_married_sister.selectedIndex].text;


		if(num_of_brother == 0)
		{
			document.profile.num_of_married_brother.options[0].selected = true;
			document.profile.num_of_married_brother.disabled  = true;
		}
		else
		{
			document.profile.num_of_married_brother.disabled  = false;
		}

		if(num_of_sister == 0)
		{
			document.profile.num_of_married_sister.options[0].selected = true;
			document.profile.num_of_married_sister.disabled  = true;
		}
		else
		{
			document.profile.num_of_married_sister.disabled  = false;
		}

		if(type =="brother")
		{
			if(num_of_brother == "Select"
			&& num_of_married_brother != "Select")
			{
				alert("Please specify number of Brother(s) first");
				document.profile.num_of_married_brother.options[0].selected = true;
			}
			else if((num_of_brother != 0)
				 && (num_of_brother < num_of_married_brother)
				 && (num_of_brother != "Select")
				 && (num_of_married_brother != "Select"))
			{
				alert("Number of married Brother(s) cannot be more than the number of Brother(s)");
				document.profile.num_of_married_brother.options[0].selected = true;
			}
		}
		if(type =="sister")
		{
			if(num_of_sister == "Select"
			&& num_of_married_sister != "Select")
			{
				alert("Please specify number of Sister(s) first");
				document.profile.num_of_married_sister.options[0].selected = true;
			}
			else if((num_of_sister != 0)
				 && (num_of_sister < num_of_married_sister)
				 && (num_of_sister!="Select")
				 && (num_of_married_sister!="Select"))
			{
				alert("Number of married Sister(s) cannot be more than number of Sister(s)");
				document.profile.num_of_married_sister.options[0].selected = true;
			}
		}
	} // EO function num_of_siblings_validation()

	function show_vegan_help(diet_type)
	{
		if(diet_type == "Vegan")
		{
			document.getElementById("vegan_help").style.display = "";
		}
		else
		{
			document.getElementById("vegan_help").style.display = "none";
		}

	}// EO function show_vegan_help(diet_type)
	</script>

				<script language="javascript">
				num_of_siblings_validation('common');
				</script>

	</div><br>





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