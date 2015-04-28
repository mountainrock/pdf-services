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
$j=0;
$maritalstatusarray = "";
while($i < count($_REQUEST['maritalstatusarray']))
{
if($_REQUEST['maritalstatusarray'][$i]!="")
{
if($j==0)
{
$maritalstatusarray = $_REQUEST['maritalstatusarray'][$i];
$j=1;
}
else
{
$maritalstatusarray .= "|".$_REQUEST['maritalstatusarray'][$i];
}
}
$i=$i+1;
}


$i=0;
$j=0;
$childrenarray = "";
while($i < count($_REQUEST['childrenarray']))
{
if($_REQUEST['childrenarray'][$i]!="")
{
if($j==0)
{
$childrenarray = $_REQUEST['childrenarray'][$i];
$j=1;
}
else
{
$childrenarray .= "|".$_REQUEST['childrenarray'][$i];
}
}
$i=$i+1;
}

$i=0;
$j=0;
$bodytypearray = "";
while($i < count($_REQUEST['bodytypearray']))
{
if($_REQUEST['bodytypearray'][$i]!="")
{
if($j==0)
{
$bodytypearray = $_REQUEST['bodytypearray'][$i];
$j=1;
}
else
{
$bodytypearray .= "|".$_REQUEST['bodytypearray'][$i];
}
}
$i=$i+1;
}

$i=0;
$j=0;
$manglikarray = "";
while($i < count($_REQUEST['manglikarray']))
{
if($_REQUEST['manglikarray'][$i]!="")
{
if($j==0)
{
$manglikarray = $_REQUEST['manglikarray'][$i];
$j=1;
}
else
{
$manglikarray .= "|".$_REQUEST['manglikarray'][$i];
}
}
$i=$i+1;
}

$i=0;
$j=0;
$complexionarray = "";
while($i < count($_REQUEST['complexionarray']))
{
if($_REQUEST['complexionarray'][$i]!="")
{
if($j==0)
{
$complexionarray = $_REQUEST['complexionarray'][$i];
$j=1;
}
else
{
$complexionarray .= "|".$_REQUEST['complexionarray'][$i];
}
}
$i=$i+1;
}

$i=0;
$j=0;
$communityarray = "";
while($i < count($_REQUEST['communityarray']))
{
if($_REQUEST['communityarray'][$i]!="")
{
if($j==0)
{
$communityarray = $_REQUEST['communityarray'][$i];
$j=1;
}
else
{
$communityarray .= "|".$_REQUEST['communityarray'][$i];
}
}
$i=$i+1;
}

$i=0;
$j=0;
$mothertonguearray = "";
while($i < count($_REQUEST['mothertonguearray']))
{
if($_REQUEST['mothertonguearray'][$i]!="")
{
if($j==0)
{
$mothertonguearray = $_REQUEST['mothertonguearray'][$i];
$j=1;
}
else
{
$mothertonguearray .= "|".$_REQUEST['mothertonguearray'][$i];
}
}
$i=$i+1;
}

$i=0;
$j=0;
$castearray = "";
while($i < count($_REQUEST['castearray']))
{
if($_REQUEST['castearray'][$i]!="")
{
if($j==0)
{
$castearray = $_REQUEST['castearray'][$i];
$j=1;
}
else
{
$castearray .= "|".$_REQUEST['castearray'][$i];
}
}
$i=$i+1;
}

$i=0;
$j=0;
$familyvaluesarray = "";
while($i < count($_REQUEST['familyvaluesarray']))
{
if($_REQUEST['familyvaluesarray'][$i]!="")
{
if($j==0)
{
$familyvaluesarray = $_REQUEST['familyvaluesarray'][$i];
$j=1;
}
else
{
$familyvaluesarray .= "|".$_REQUEST['familyvaluesarray'][$i];
}
}
$i=$i+1;
}

$i=0;
$j=0;
$education_level_array = "";
while($i < count($_REQUEST['education_level_array']))
{
if($_REQUEST['education_level_array'][$i]!="")
{
if($j==0)
{
$education_level_array = $_REQUEST['education_level_array'][$i];
$j=1;
}
else
{
$education_level_array .= "|".$_REQUEST['education_level_array'][$i];
}
}
$i=$i+1;
}

$i=0;
$j=0;
$education_area_array = "";
while($i < count($_REQUEST['education_area_array']))
{
if($_REQUEST['education_area_array'][$i]!="")
{
if($j==0)
{
$education_area_array = $_REQUEST['education_area_array'][$i];
$j=1;
}
else
{
$education_area_array .= "|".$_REQUEST['education_area_array'][$i];
}
}
$i=$i+1;
}

$i=0;
$j=0;
$occupationarray = "";
while($i < count($_REQUEST['occupationarray']))
{
if($_REQUEST['occupationarray'][$i]!="")
{
if($j==0)
{
$occupationarray = $_REQUEST['occupationarray'][$i];
$j=1;
}
else
{
$occupationarray .= "|".$_REQUEST['occupationarray'][$i];
}
}
$i=$i+1;
}

$i=0;
$j=0;
$dietarray = "";
while($i < count($_REQUEST['dietarray']))
{
if($_REQUEST['dietarray'][$i]!="")
{
if($j==0)
{
$dietarray = $_REQUEST['dietarray'][$i];
$j=1;
}
else
{
$dietarray .= "|".$_REQUEST['dietarray'][$i];
}
}
$i=$i+1;
}

$i=0;
$j=0;
$smokearray = "";
while($i < count($_REQUEST['smokearray']))
{
if($_REQUEST['smokearray'][$i]!="")
{
if($j==0)
{
$smokearray = $_REQUEST['smokearray'][$i];
$j=1;
}
else
{
$smokearray .= "|".$_REQUEST['smokearray'][$i];
}
}
$i=$i+1;
}

$i=0;
$j=0;
$drinkarray = "";
while($i < count($_REQUEST['drinkarray']))
{
if($_REQUEST['drinkarray'][$i]!="")
{
if($j==0)
{
$drinkarray = $_REQUEST['drinkarray'][$i];
$j=1;
}
else
{
$drinkarray .= "|".$_REQUEST['drinkarray'][$i];
}
}
$i=$i+1;
}

$i=0;
$j=0;
$countryofresidencearray = "";
while($i < count($_REQUEST['countryofresidencearray']))
{
if($_REQUEST['countryofresidencearray'][$i]!="")
{
if($j==0)
{
$countryofresidencearray = $_REQUEST['countryofresidencearray'][$i];
$j=1;
}
else
{
$countryofresidencearray .= "|".$_REQUEST['countryofresidencearray'][$i];
}
}
$i=$i+1;
}

$i=0;
$j=0;
$stateofresidencearray = "";
while($i < count($_REQUEST['stateofresidencearray']))
{
if($_REQUEST['stateofresidencearray'][$i]!="")
{
if($j==0)
{
$stateofresidencearray = $_REQUEST['stateofresidencearray'][$i];
$j=1;
}
else
{
$stateofresidencearray .= "|".$_REQUEST['stateofresidencearray'][$i];
}
}
$i=$i+1;
}

$i=0;
$j=0;
$residencystatusarray = "";
while($i < count($_REQUEST['residencystatusarray']))
{
if($_REQUEST['residencystatusarray'][$i]!="")
{
if($j==0)
{
$residencystatusarray = $_REQUEST['residencystatusarray'][$i];
$j=1;
}
else
{
$residencystatusarray .= "|".$_REQUEST['residencystatusarray'][$i];
}
}
$i=$i+1;
}


$insert = "update partner_profile set AgeFrom='".mysql_escape_string($_REQUEST['agefrom'])."', AgeTo='".mysql_escape_string($_REQUEST['ageto'])."', Gender='".mysql_escape_string($_REQUEST['gender'])."', MaritalStatus='".mysql_escape_string($maritalstatusarray)."', HaveChildren='".mysql_escape_string($childrenarray)."', HeightFrom='".mysql_escape_string($_REQUEST['heightfrom'])."', HeightTo='".mysql_escape_string($_REQUEST['heightto'])."', BodyType='".mysql_escape_string($bodytypearray)."', Manglik='".mysql_escape_string($manglikarray)."', Complexion='".mysql_escape_string($complexionarray)."', SpecialCases='".mysql_escape_string($_REQUEST['specialcases'])."', HIV='".mysql_escape_string($_REQUEST['hiv_positive'])."', Religion='".mysql_escape_string($communityarray)."', MotherTongue='".mysql_escape_string($mothertonguearray)."', FamilyValues='".mysql_escape_string($familyvaluesarray)."', EducationLevel='".mysql_escape_string($education_level_array)."', EducationLevel='".mysql_escape_string($education_level_array)."', EducationArea='".mysql_escape_string($education_area_array)."', Profession='".mysql_escape_string($occupationarray)."', Diet='".mysql_escape_string($dietarray)."', Smoke='".mysql_escape_string($smokearray)."', Drink='".mysql_escape_string($drinkarray)."', CountryOfResidence='".mysql_escape_string($countryofresidencearray)."', StateOfResidence='".mysql_escape_string($stateofresidencearray)."', ResidencyStatus='".mysql_escape_string($residencystatusarray)."' where UserID=".$_SESSION['UserID'];

			$resultt = mysql_query($insert);


	header("Location: my_profile.php");
	exit();
}
$sql = "SELECT * FROM users, partner_profile WHERE users.UserID=partner_profile.UserID and users.UserID=".$_SESSION['UserID'];
$result = mysql_query($sql,$conn);
$row = @mysql_fetch_array($result);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Marry Banjara - Edit Partner Profile</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="css/style.css">
<script language="javascript" src="js/ajax-v2-inc-mod.js"></script>
<script language="javascript" src="js/tool-tip.js"></script>
<script language="javascript" src="js/common_002.js"></script>
<script language="javascript" src="js/common.js"></script>
<script language="javascript" src="js/registration.js"></script>
<script language="javascript" src="js/ajax-v2.js"></script>
<link rel="stylesheet" href="css/partnerprofile.css">
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
				<h2>Edit your Partner Profile</h2>
			</div>


		<!-- PAGE STYLE ST -->

		<!-- PAGE STYLE EN -->
Let visitors to your profile know about your expectations from your
partner.<br><br>

		<b>Note:</b>
		<ul class="list">
			<li>All visitors viewing your profile will also be able to view your partner profile</li>
			<li>You can update your partner profile at any time.</li>
		</ul>


<form action="edit_partner_profile.php" method="post" name="frm_main" onsubmit="return select_values();" style="margin: 0px;">


	<noscript>
<span class="smallred">&nbsp;<b>Note:</b> If you have disabled
JavaScript on your browser, please enable it to use all the features on
this page.</span> </noscript>

	<!-- PARTNER - BASIC INFO ST -->
	<a name="basics"></a>
	<div class="largewhitebold bluepatch" style="margin-top: 10px; color:#990000;"><b>Partner - Basic Info</b></div>

	<table  border="0" cellpadding="6" cellspacing="0">
	<tbody>

	<tr valign="top">
		<td><b>Age in years</b></td>
		<td class="smallblack">From
		<select name="agefrom" class="formselect">
		<?PHP
		$agefrom='<option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option><option value="60">60</option><option value="61">61</option><option value="62">62</option><option value="63">63</option><option value="64">64</option><option value="65">65</option><option value="66">66</option><option value="67">67</option><option value="68">68</option><option value="69">69</option><option value="70">70</option><option value="71">71</option><option value="72">72</option><option value="73">73</option><option value="74">74</option><option value="75">75</option><option value="76">76</option><option value="77">77</option><option value="78">78</option><option value="79">79</option><option value="80">80</option><option value="81">81</option><option value="82">82</option><option value="83">83</option><option value="84">84</option><option value="85">85</option><option value="86">86</option><option value="87">87</option><option value="88">88</option><option value="89">89</option><option value="90">90</option><option value="91">91</option><option value="92">92</option><option value="93">93</option><option value="94">94</option><option value="95">95</option><option value="96">96</option><option value="97">97</option><option value="98">98</option><option value="99">99</option>';
		$agefrom = str_replace('<option value="'.$row['AgeFrom'].'">', '<option value="'.$row['AgeFrom'].'" selected>', $agefrom);
			echo $agefrom;
			?>

		</select>
		To
		<select name="ageto" class="formselect">
		<?PHP
		$ageto='<option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option><option value="60">60</option><option value="61">61</option><option value="62">62</option><option value="63">63</option><option value="64">64</option><option value="65">65</option><option value="66">66</option><option value="67">67</option><option value="68">68</option><option value="69">69</option><option value="70">70</option><option value="71">71</option><option value="72">72</option><option value="73">73</option><option value="74">74</option><option value="75">75</option><option value="76">76</option><option value="77">77</option><option value="78">78</option><option value="79">79</option><option value="80">80</option><option value="81">81</option><option value="82">82</option><option value="83">83</option><option value="84">84</option><option value="85">85</option><option value="86">86</option><option value="87">87</option><option value="88">88</option><option value="89">89</option><option value="90">90</option><option value="91">91</option><option value="92">92</option><option value="93">93</option><option value="94">94</option><option value="95">95</option><option value="96">96</option><option value="97">97</option><option value="98">98</option><option value="99">99</option>';
		$ageto = str_replace('<option value="'.$row['AgeTo'].'">', '<option value="'.$row['AgeTo'].'" selected>', $ageto);
			echo $ageto;
		?>
		</select>

		</td>
	</tr>
<?PHP
$maritalstatus = explode("|",$row['MaritalStatus']);
$x = 0;
$doesntmatter="";
for($x=0; $x < count($maritalstatus); $x++)
{
	if ($maritalstatus[$x]=="Never Married")
	{
		$nevermarried=" checked";
	}
	else if($maritalstatus[$x]=="Divorced")
	{
		$divorced=" checked";
	}
	else if($maritalstatus[$x]=="Widowed")
	{
		$widowed=" checked";
	}
	else if($maritalstatus[$x]=="Separated")
	{
		$seperated=" checked";
	}
	else if($maritalstatus[$x]=="Annulled")
	{
		$annulled=" checked";
	}
	else if($maritalstatus[$x]=="")
	{
		$doesntmatter=" checked";
	}
}
?>
	<tr valign="top">
		<td><b>Marital Status</b></td>
		<td class="smallblack">
		<input name="maritalstatusarray[]" id="maritalstatusarray[]" value="" onclick="check_option_dosent_matter(this)" ;="" type="checkbox" <?PHP echo $doesntmatter?>><label for="maritalstatusarray[]">Doesn't Matter</label>
<input name="maritalstatusarray[]" id="maritalstatusarray[]1" value="Never Married" onclick="check_option(this)" ;="" type="checkbox"  <?PHP echo $nevermarried?>><label for="maritalstatusarray[]1">Never Married</label>
<input name="maritalstatusarray[]" id="maritalstatusarray[]2" value="Divorced" onclick="check_option(this)" ;="" type="checkbox"  <?PHP echo $divorced?>><label for="maritalstatusarray[]2">Divorced</label>
<br>
<input name="maritalstatusarray[]" id="maritalstatusarray[]3" value="Widowed" onclick="check_option(this)" ;="" type="checkbox"  <?PHP echo $widowed?>><label for="maritalstatusarray[]3">Widowed</label>

<input name="maritalstatusarray[]" id="maritalstatusarray[]4" value="Separated" onclick="check_option(this)" ;="" type="checkbox"  <?PHP echo $seperated?>><label for="maritalstatusarray[]4">Separated</label>
<input name="maritalstatusarray[]" id="maritalstatusarray[]5" value="Annulled" onclick="check_option(this)" ;="" type="checkbox"  <?PHP echo $annulled?>><label for="maritalstatusarray[]5">Annulled</label>

		</td>
	</tr>
<?PHP
$maritalstatus = explode("|",$row['HaveChildren']);
$x = 0;
$doesntmatter="";
for($x=0; $x < count($maritalstatus); $x++)
{
	if ($maritalstatus[$x]=="No")
	{
		$no=" checked";
	}
	else if($maritalstatus[$x]=="Yes. Living together")
	{
		$yeslivingtogether=" checked";
	}
	else if($maritalstatus[$x]=="Yes. Not living together")
	{
		$yesnotlivingtogether=" checked";
	}
	else if($maritalstatus[$x]=="")
	{
		$doesntmatter=" checked";
	}
}
?>
	<tr valign="top">
		<td><b>Have Children</b></td>
		<td class="smallblack">
		<input name="childrenarray[]" id="children1" value="" onclick="check_option_dosent_matter(this)" ;="" type="checkbox" <?PHP echo $doesntmatter?>><label for="children1">Doesn't Matter</label>
		<input name="childrenarray[]" id="children2" value="No" onclick="check_option(this)" ;="" type="checkbox" <?PHP echo $no?>><label for="children2">No</label>
		<br>
<input name="childrenarray[]" id="children3" value="Yes. Living together" onclick="check_option(this)" ;="" type="checkbox" <?PHP echo $yeslivingtogether?>><label for="children3">Yes. Living together</label>

<input name="childrenarray[]" id="children4" value="Yes. Not living together" onclick="check_option(this)" ;="" type="checkbox" <?PHP echo $yesnotlivingtogether?>><label for="children4">Yes. Not living together</label>
		</td>
	</tr>

	<tr valign="top">
		<td><b>Height</b></td>
		<td class="smallblack">
		From
		<select name="heightfrom" class="formselect">
		<?PHP
		$heightfrom='<option value="4ft 5in - 134cm">4ft 5in - 134cm</option><option value="4ft 6in - 137cm">4ft 6in - 137cm</option><option value="4ft 7in - 139cm">4ft 7in - 139cm</option><option value="4ft 8in - 142cm">4ft 8in - 142cm</option><option value="4ft 9in - 144cm">4ft 9in - 144cm</option><option value="4ft 10in - 147cm">4ft 10in - 147cm</option><option value="4ft 11in - 149cm">4ft 11in - 149cm</option><option value="5ft 0in - 152cm">5ft 0in - 152cm</option><option value="5ft 1in - 154cm">5ft 1in - 154cm</option><option value="5ft 2in - 157cm">5ft 2in - 157cm</option><option value="5ft 3in - 160cm">5ft 3in - 160cm</option><option value="5ft 4in - 162cm">5ft 4in - 162cm</option><option value="5ft 5in - 165cm">5ft 5in - 165cm</option><option value="5ft 6in - 167cm">5ft 6in - 167cm</option><option value="5ft 7in - 170cm">5ft 7in - 170cm</option><option value="5ft 8in - 172cm">5ft 8in - 172cm</option><option value="5ft 9in - 175cm">5ft 9in - 175cm</option><option value="5ft 10in - 177cm">5ft 10in - 177cm</option><option value="5ft 11in - 180cm">5ft 11in - 180cm</option><option value="6ft 0in - 182cm">6ft 0in - 182cm</option><option value="6ft 1in - 185cm">6ft 1in - 185cm</option><option value="6ft 2in - 187cm">6ft 2in - 187cm</option><option value="6ft 3in - 190cm">6ft 3in - 190cm</option><option value="6ft 4in - 193cm">6ft 4in - 193cm</option><option value="6ft 5in - 195cm">6ft 5in - 195cm</option><option value="6ft 6in - 198cm">6ft 6in - 198cm</option><option value="6ft 7in - 200cm">6ft 7in - 200cm</option><option value="6ft 8in - 203cm">6ft 8in - 203cm</option><option value="6ft 9in - 205cm">6ft 9in - 205cm</option><option value="6ft 10in - 208cm">6ft 10in - 208cm</option><option value="6ft 11in - 210cm">6ft 11in - 210cm</option><option value="7ft 0in - 213cm">7ft 0in - 213cm</option>';
		$heightfrom = str_replace('<option value="'.$row['HeightFrom'].'">', '<option value="'.$row['HeightFrom'].'" selected>', $heightfrom);
			echo $heightfrom;
		?>

		</select>

		To
		<select name="heightto" class="formselect">
		<?PHP
		$heightto='<option value="7ft 0in - 213cm">7ft 0in - 213cm</option><option value="6ft 11in - 210cm">6ft 11in - 210cm</option><option value="6ft 10in - 208cm">6ft 10in - 208cm</option><option value="6ft 9in - 205cm">6ft 9in - 205cm</option><option value="6ft 8in - 203cm">6ft 8in - 203cm</option><option value="6ft 7in - 200cm">6ft 7in - 200cm</option><option value="6ft 6in - 198cm">6ft 6in - 198cm</option><option value="6ft 5in - 195cm">6ft 5in - 195cm</option><option value="6ft 4in - 193cm">6ft 4in - 193cm</option><option value="6ft 3in - 190cm">6ft 3in - 190cm</option><option value="6ft 2in - 187cm">6ft 2in - 187cm</option><option value="6ft 1in - 185cm">6ft 1in - 185cm</option><option value="6ft 0in - 182cm">6ft 0in - 182cm</option><option value="5ft 11in - 180cm">5ft 11in - 180cm</option><option value="5ft 10in - 177cm">5ft 10in - 177cm</option><option value="5ft 9in - 175cm">5ft 9in - 175cm</option><option value="5ft 8in - 172cm">5ft 8in - 172cm</option><option value="5ft 7in - 170cm">5ft 7in - 170cm</option><option value="5ft 6in - 167cm">5ft 6in - 167cm</option><option value="5ft 5in - 165cm">5ft 5in - 165cm</option><option value="5ft 4in - 162cm">5ft 4in - 162cm</option><option value="5ft 3in - 160cm">5ft 3in - 160cm</option><option value="5ft 2in - 157cm">5ft 2in - 157cm</option><option value="5ft 1in - 154cm">5ft 1in - 154cm</option><option value="5ft 0in - 152cm">5ft 0in - 152cm</option><option value="4ft 11in - 149cm">4ft 11in - 149cm</option><option value="4ft 10in - 147cm">4ft 10in - 147cm</option><option value="4ft 9in - 144cm">4ft 9in - 144cm</option><option value="4ft 8in - 142cm">4ft 8in - 142cm</option><option value="4ft 7in - 139cm">4ft 7in - 139cm</option><option value="4ft 6in - 137cm">4ft 6in - 137cm</option><option value="4ft 5in - 134cm">4ft 5in - 134cm</option>';
		$heightto = str_replace('<option value="'.$row['HeightTo'].'">', '<option value="'.$row['HeightTo'].'" selected>', $heightto);
		echo $heightto;
		?>
		</select>

		</td>
	</tr>
<?PHP
$maritalstatus = explode("|",$row['BodyType']);
$x = 0;
$doesntmatter="";
for($x=0; $x < count($maritalstatus); $x++)
{
	if ($maritalstatus[$x]=="Slim")
	{
		$slim=" checked";
	}
	else if($maritalstatus[$x]=="Average")
	{
		$average=" checked";
	}
	else if($maritalstatus[$x]=="Athletic")
	{
		$athletic=" checked";
	}
	else if($maritalstatus[$x]=="Heavy")
	{
		$heavy=" checked";
	}
	else if($maritalstatus[$x]=="")
	{
		$doesntmatter=" checked";
	}
}
?>
	<tr valign="top">
		<td><b>Body Type</b></td>
		<td class="smallblack">
		<input name="bodytypearray[]" id="bodytype1" value="" onclick="check_option_dosent_matter(this)" ;=""  type="checkbox" <?PHP echo $doesntmatter?>><label for="bodytype1">Doesn't Matter</label>
		<input name="bodytypearray[]" id="bodytype2" value="Slim" onclick="check_option(this)" ;="" type="checkbox" <?PHP echo $slim?>><label for="bodytype2">Slim</label>
		<input name="bodytypearray[]" id="bodytype3" value="Average" onclick="check_option(this)" ;="" type="checkbox" <?PHP echo $average?>><label for="bodytype3">Average</label>
		<br>
<input name="bodytypearray[]" id="bodytype4" value="Athletic" onclick="check_option(this)" ;="" type="checkbox" <?PHP echo $athletic?>><label for="bodytype4">Athletic</label>
		<input name="bodytypearray[]" id="bodytype5" value="Heavy" onclick="check_option(this)" ;="" type="checkbox" <?PHP echo $heavy?>><label for="bodytype5">Heavy</label>
		</td>
	</tr>

<?PHP
$maritalstatus = explode("|",$row['Complexion']);
$x = 0;
$doesntmatter="";
for($x=0; $x < count($maritalstatus); $x++)
{
	if ($maritalstatus[$x]=="Very Fair")
	{
		$veryfair=" checked";
	}
	else if($maritalstatus[$x]=="Fair")
	{
		$fair=" checked";
	}
	else if($maritalstatus[$x]=="Wheatish")
	{
		$wheatish=" checked";
	}
	else if($maritalstatus[$x]=="Wheatish Medium")
	{
		$wheatishmedium=" checked";
	}
	else if($maritalstatus[$x]=="Wheatish Brown")
	{
		$wheatishbrown=" checked";
	}
	else if($maritalstatus[$x]=="Dark")
	{
		$dark=" checked";
	}

	else if($maritalstatus[$x]=="")
	{
		$doesntmatter=" checked";
	}
}
?>
	<tr valign="top">
		<td><b>Complexion</b></td>
		<td class="smallblack">
		<input name="complexionarray[]" id="complexion1" value="" onclick="check_option_dosent_matter(this)" ;=""  type="checkbox" <?PHP echo $doesntmatter?>><label for="complexion1">Doesn't Matter</label>
		<input name="complexionarray[]" id="complexion2" value="Very Fair" onclick="check_option(this)" ;="" type="checkbox" <?PHP echo $veryfair?>><label for="complexion2">Very Fair</label>
		<input name="complexionarray[]" id="complexion3" value="Fair" onclick="check_option(this)" ;="" type="checkbox" <?PHP echo $fair?>><label for="complexion3">Fair</label>
		<br>
<input name="complexionarray[]" id="complexion4" value="Wheatish" onclick="check_option(this)" ;="" type="checkbox" <?PHP echo $wheatish?>><label for="complexion4">Wheatish</label>

<input name="complexionarray[]" id="complexion5" value="Wheatish Medium" onclick="check_option(this)" ;="" type="checkbox" <?PHP echo $wheatishmedium?>><label for="complexion5">Wheatish Medium</label>
		<input name="complexionarray[]" id="complexion6" value="Wheatish Brown" onclick="check_option(this)" ;="" type="checkbox" <?PHP echo $wheatishbrown?>><label for="complexion6">Wheatish Brown</label>
<br>
		<input name="complexionarray[]" id="complexion7" value="Dark" onclick="check_option(this)" ;="" type="checkbox" <?PHP echo $dark?>><label for="complexion7">Dark</label>
	</td>
	</tr>
	</tbody></table>
	<!-- PARTNER - BASIC INFO EN -->



	<!-- PARTNER - RELIGIOUS & SOCIAL BACKGROUND ST -->
	<a name="religion"></a>
	<div class="largewhitebold bluepatch" style=" color:#990000; "><b>Partner - Religious &amp; Social Background</b></div>

	<table border="0" cellpadding="6" cellspacing="0">
	<tbody><tr valign="top">
		<td><br></td>
		<td><div class="mediumred">To add to list -  Click on item on the left and click <b>'Add'</b><br>
			To remove from list - click on item on the right and click <b>'Remove'</b>.</div>
		</td>
	</tr>
	
	<tr id="show_hide_mothertongue" valign="top">
		<td><b>Mother Tongue</b></td>
		<td>
			<table border="0" cellpadding="0" cellspacing="0">
			<tbody><tr>
				<td>
				<select multiple="multiple" name="mothertongue_fromarray[]" style="width: 175px;" class="formselect" size="5"><option value="">----Select Mother Tongue----</option><option value="Aka">Aka</option><option value="Arabic">Arabic</option><option value="Arunachali">Arunachali</option><option value="Assamese">Assamese</option><option value="Awadhi">Awadhi</option><option value="Baluchi">Baluchi</option><option value="Bengali">Bengali</option><option value="Bhojpuri">Bhojpuri</option><option value="Bhutia">Bhutia</option><option value="Brahui">Brahui</option><option value="Brij">Brij</option><option value="Burmese">Burmese</option><option value="Chattisgarhi">Chattisgarhi</option><option value="Chinese">Chinese</option><option value="Coorgi">Coorgi</option><option value="Dogri">Dogri</option><option value="English">English</option><option value="French">French</option><option value="Garhwali">Garhwali</option><option value="Garo">Garo</option><option value="Gujarati">Gujarati</option><option value="Haryanavi">Haryanavi</option><option value="Himachali/Pahari">Himachali/Pahari</option><option value="Hindi">Hindi</option><option value="Hindko">Hindko</option><option value="Kakbarak">Kakbarak</option><option value="Kanauji">Kanauji</option><option value="Kannada">Kannada</option><option value="Kashmiri">Kashmiri</option><option value="Khandesi">Khandesi</option><option value="Khasi">Khasi</option><option value="Konkani">Konkani</option><option value="Koshali">Koshali</option><option value="Kumaoni">Kumaoni</option><option value="Kutchi">Kutchi</option><option value="Ladakhi">Ladakhi</option><option value="Lepcha">Lepcha</option><option value="Magahi">Magahi</option><option value="Maithili">Maithili</option><option value="Malay">Malay</option><option value="Malayalam">Malayalam</option><option value="Manipuri">Manipuri</option><option value="Marathi">Marathi</option><option value="Marwari">Marwari</option><option value="Miji">Miji</option><option value="Mizo">Mizo</option><option value="Monpa">Monpa</option><option value="Nepali">Nepali</option><option value="Oriya">Oriya</option><option value="Pashto">Pashto</option><option value="Persian">Persian</option><option value="Punjabi">Punjabi</option><option value="Rajasthani">Rajasthani</option><option value="Russian">Russian</option><option value="Sanskrit">Sanskrit</option><option value="Santhali">Santhali</option><option value="Seraiki">Seraiki</option><option value="Sindhi">Sindhi</option><option value="Sinhala">Sinhala</option><option value="Spanish">Spanish</option><option value="Swedish">Swedish</option><option value="Tagalog">Tagalog</option><option value="Tamil">Tamil</option><option value="Telugu">Telugu</option><option value="Tulu">Tulu</option><option value="Urdu">Urdu</option><option value="Other">Other</option></select>
				</td>
				<td align="center">
				<img src="images/add.gif" value="Add" onclick="if(copytolist(document.frm_main.elements['mothertongue_fromarray[]'], document.frm_main.elements['mothertonguearray[]'])){ display_dropdown_caste('smart_search', '', document.frm_main.gender.value); }"><br>
				<img src="images/remove.gif" value="Remove" onclick="if(copytolist(document.frm_main.elements['mothertonguearray[]'], document.frm_main.elements['mothertongue_fromarray[]'])){ display_dropdown_caste('smart_search', '', document.frm_main.gender.value); }"><br>
				</td>
				<td>
					<select multiple="multiple" name="mothertonguearray[]" style="width: 175px;height:45px" class="formselect" size="5">
					<?PHP
				$selectgrewupin="";
				$grewupin1 = explode("|",$row['MotherTongue']);
				for($x=0; $x < count($grewupin1); $x++)
				{
					if($grewupin1[$x]==" ")
					{
					$selectgrewupin .= '<option value="'.$grewupin1[$x].'">Doesn\'t Matter</option>';
					}
					else
					{
					$selectgrewupin .= '<option value="'.$grewupin1[$x].'">'.$grewupin1[$x].'</option>';
					}
				}
				echo $selectgrewupin;
				?>
				</select>
				</td>
			</tr>
			</tbody></table>
		</td>
	</tr>
	<tr style="display: none;" id="show_hide_caste" valign="top">
		<td><b>Caste / Sect</b></td>
		<td>
			<table border="0" cellpadding="0" cellspacing="0">
			<tbody><tr>
				<td><select multiple="multiple" name="caste_fromarray[]" size="5" class="formselect" style="width: 175px;"></select>
				</td>
				<td align="center">
				<img src="images/add.gif" value="Add" onclick="copytolist(document.frm_main.elements['caste_fromarray[]'], document.frm_main.elements['castearray[]']);"><br>
				<img src="images/remove.gif" value="Remove" onclick="copytolist(document.frm_main.elements['castearray[]'], document.frm_main.elements['caste_fromarray[]']);"><br>
				</td>
				<td>
					<select multiple="multiple" name="castearray[]" size="5" class="formselect" style="width: 175px;"></select>
				</td>
			</tr>
			</tbody></table>
		</td>
	</tr>
	</tbody></table>
<?PHP
$maritalstatus = explode("|",$row['FamilyValues']);
$x = 0;
$doesntmatter="";
for($x=0; $x < count($maritalstatus); $x++)
{
	if ($maritalstatus[$x]=="Traditional")
	{
		$traditional=" checked";
	}
	else if($maritalstatus[$x]=="Moderate")
	{
		$moderate=" checked";
	}
	else if($maritalstatus[$x]=="Liberal")
	{
		$liberal=" checked";
	}
	else if($maritalstatus[$x]=="")
	{
		$doesntmatter=" checked";
	}
}
?>
	<table  border="0" cellpadding="6" cellspacing="0">
	<tbody><tr valign="top">
		<td class="td1" style="width:100px; "><b>Family Values</b></td>
		<td class="td2 smallblack">
		<input name="familyvaluesarray[]" id="familyvalues1" value="" onclick="check_option_dosent_matter(this)" ;=""  type="checkbox" <?PHP echo $doesntmatter?>><label for="familyvalues1">Doesn't Matter</label>
		<input name="familyvaluesarray[]" id="familyvalues2" value="Traditional" onclick="check_option(this)" ;="" type="checkbox" <?PHP echo $traditional?>><label for="familyvalues2">Traditional</label>
		<input name="familyvaluesarray[]" id="familyvalues3" value="Moderate" onclick="check_option(this)" ;="" type="checkbox" <?PHP echo $moderate?>><label for="familyvalues3">Moderate</label>
		<input name="familyvaluesarray[]" id="familyvalues4" value="Liberal" onclick="check_option(this)" ;="" type="checkbox" <?PHP echo $liberal?>><label for="familyvalues4">Liberal</label>
		</td>
	</tr>
	</tbody></table>
	<!-- PARTNER - RELIGIOUS & SOCIAL BACKGROUND EN -->



	<!-- PARTNER - EDUCATION & CAREER ST -->
	<a name="education"></a>
	<div class="largewhitebold bluepatch" style=" color:#990000; "><b>Partner - Education &amp; Career</b></div>

	<table classborder="0" cellpadding="6" cellspacing="0">
	<tbody><tr valign="top">
		<td><br></td>
		<td><div class="mediumred">To add to list -  Click on item on the left and click <b>'Add'</b><br>
			To remove from list - click on item on the right and click <b>'Remove'</b>.</div>
		</td>
	</tr>
	<tr valign="top">
		<td class="td1"><b>Education</b></td>
		<td class="td2">
			<table border="0" cellpadding="0" cellspacing="0">
			<tbody><tr valign="top">
				<td>&nbsp;Levels<br>

					<select multiple="multiple" name="education_level_fromarray[]" size="5" class="formselect" style="width: 175px;"><option value="Bachelors">Bachelors</option><option value="Masters">Masters</option><option value="Doctorate">Doctorate</option><option value="Diploma">Diploma</option><option value="Undergraduate">Undergraduate</option><option value="Associates degree">Associates degree</option><option value="Honours degree">Honours degree</option><option value="Trade school">Trade school</option><option value="High school">High school</option><option value="Less than high school">Less than high school</option></select>
				</td>
				<td align="center"><br>
				<img src="images/add.gif" value="Add" onclick="copytolist(document.frm_main.elements['education_level_fromarray[]'],document.frm_main.elements['education_level_array[]']);"><br>
				<img src="images/remove.gif" value="Remove" onclick="copytolist(document.frm_main.elements['education_level_array[]'],document.frm_main.elements['education_level_fromarray[]']);"><br>
				</td>
				<td><br>
					<select multiple="multiple" name="education_level_array[]" size="5" class="formselect" style="width: 175px;height:45px">

					<?PHP
				$selectgrewupin="";
				$grewupin1 = explode("|",$row['EducationLevel']);
				for($x=0; $x < count($grewupin1); $x++)
				{
					if($grewupin1[$x]=="")
					{
					$selectgrewupin .= '<option value="'.$grewupin1[$x].'">Doesn\'t Matter</option>';
					}
					else
					{
					$selectgrewupin .= '<option value="'.$grewupin1[$x].'">'.$grewupin1[$x].'</option>';
					}
				}
				echo $selectgrewupin;
				?>

					</select><br><br>
				</td>
			</tr>
			<tr>
				<td>&nbsp;Area<br>
					<select multiple="multiple" name="education_area_fromarray[]" size="5" class="formselect" style="width: 175px;"><option value="Advertising/ Marketing">Advertising/ Marketing</option><option value="Administrative services">Administrative services</option><option value="Architecture">Architecture</option><option value="Armed Forces">Armed Forces</option><option value="Arts">Arts</option><option value="Commerce">Commerce</option><option value="Computers/ IT">Computers/ IT</option><option value="Education">Education</option><option value="Engineering/ Technology">Engineering/ Technology</option><option value="Fashion">Fashion</option><option value="Finance">Finance</option><option value="Fine Arts">Fine Arts</option><option value="Home Science">Home Science</option><option value="Law">Law</option><option value="Management">Management</option><option value="Medicine">Medicine</option><option value="Nursing/ Health Sciences">Nursing/ Health Sciences</option><option value="Office administration">Office administration</option><option value="Science">Science</option><option value="Shipping">Shipping</option><option value="Travel &amp; Tourism">Travel &amp; Tourism</option></select>
				</td>
				<td align="center"><br>
				<img src="images/add.gif" value="Add" onclick="copytolist(document.frm_main.elements['education_area_fromarray[]'],document.frm_main.elements['education_area_array[]']);"><br>
				<img src="images/remove.gif" value="Remove" onclick="copytolist(document.frm_main.elements['education_area_array[]'],document.frm_main.elements['education_area_fromarray[]']);"><br>
				</td>
				<td><br>
					<select multiple="multiple" name="education_area_array[]" size="5" class="formselect" style="width: 175px;">

					<?PHP
				$selectgrewupin="";
				$grewupin1 = explode("|",$row['EducationArea']);
				for($x=0; $x < count($grewupin1); $x++)
				{
					if($grewupin1[$x]=="")
					{
					$selectgrewupin .= '<option value="'.$grewupin1[$x].'">Doesn\'t Matter</option>';
					}
					else
					{
					$selectgrewupin .= '<option value="'.$grewupin1[$x].'">'.$grewupin1[$x].'</option>';
					}
				}
				echo $selectgrewupin;
				?>

					</select>
				</td>
			</tr>
			</tbody></table>
		</td>
	</tr>
	<tr valign="top">
		<td><b>Profession</b></td>
		<td>
			<table border="0" cellpadding="0" cellspacing="0">
			<tbody><tr>
				<td>
					<select multiple="multiple" name="occupation_fromarray[]" size="5" class="formselect" style="width: 175px;"><option value="Not working">Not working</option><option value="Non-mainstream professional">Non-mainstream professional</option><option value="Accountant">Accountant</option><option value="Acting Professional">Acting Professional</option><option value="Actor">Actor</option><option value="Administration Professional">Administration Professional</option><option value="Advertising Professional">Advertising Professional</option><option value="Air Hostess">Air Hostess</option><option value="Architect">Architect</option><option value="Artisan">Artisan</option><option value="Audiologist">Audiologist</option><option value="Banker">Banker</option><option value="Beautician">Beautician</option><option value="Biologist / Botanist">Biologist / Botanist</option><option value="Business Person">Business Person</option><option value="Chartered Accountant">Chartered Accountant</option><option value="Civil Engineer">Civil Engineer</option><option value="Clerical Official">Clerical Official</option><option value="Commercial Pilot">Commercial Pilot</option><option value="Company Secretary">Company Secretary</option><option value="Computer Professional">Computer Professional</option><option value="Consultant">Consultant</option><option value="Contractor">Contractor</option><option value="Cost Accountant">Cost Accountant</option><option value="Creative Person">Creative Person</option><option value="Customer Support Professional">Customer Support Professional</option><option value="Defense Employee">Defense Employee</option><option value="Dentist">Dentist</option><option value="Designer">Designer</option><option value="Doctor">Doctor</option><option value="Economist">Economist</option><option value="Engineer">Engineer</option><option value="Engineer (Mechanical)">Engineer (Mechanical)</option><option value="Engineer (Project)">Engineer (Project)</option><option value="Entertainment Professional">Entertainment Professional</option><option value="Event Manager">Event Manager</option><option value="Executive">Executive</option><option value="Factory worker">Factory worker</option><option value="Farmer">Farmer</option><option value="Fashion Designer">Fashion Designer</option><option value="Finance Professional">Finance Professional</option><option value="Flight Attendant">Flight Attendant</option><option value="Government Employee">Government Employee</option><option value="Health Care Professional">Health Care Professional</option><option value="Home Maker">Home Maker</option><option value="Hotel &amp; Restaurant Professional">Hotel &amp; Restaurant Professional</option><option value="Human Resources Professional">Human Resources Professional</option><option value="Interior Designer">Interior Designer</option><option value="Investment Professional">Investment Professional</option><option value="IT / Telecom Professional">IT / Telecom Professional</option><option value="Journalist">Journalist</option><option value="Lawyer">Lawyer</option><option value="Lecturer">Lecturer</option><option value="Legal Professional">Legal Professional</option><option value="Manager">Manager</option><option value="Marketing Professional">Marketing Professional</option><option value="Media Professional">Media Professional</option><option value="Medical Professional">Medical Professional</option><option value="Medical Transcriptionist">Medical Transcriptionist</option><option value="Merchant Naval Officer">Merchant Naval Officer</option><option value="Nurse">Nurse</option><option value="Occupational Therapist">Occupational Therapist</option><option value="Optician">Optician</option><option value="Pharmacist">Pharmacist</option><option value="Physician Assistant">Physician Assistant</option><option value="Physicist">Physicist</option><option value="Physiotherapist">Physiotherapist</option><option value="Pilot">Pilot</option><option value="Politician">Politician</option><option value="Production professional">Production professional</option><option value="Professor">Professor</option><option value="Psychologist">Psychologist</option><option value="Public Relations Professional">Public Relations Professional</option><option value="Real Estate Professional">Real Estate Professional</option><option value="Research Scholar">Research Scholar</option><option value="Retired Person">Retired Person</option><option value="Retail Professional">Retail Professional</option><option value="Sales Professional">Sales Professional</option><option value="Scientist">Scientist</option><option value="Self-employed Person">Self-employed Person</option><option value="Social Worker">Social Worker</option><option value="Software Consultant">Software Consultant</option><option value="Sportsman">Sportsman</option><option value="Student">Student</option><option value="Teacher">Teacher</option><option value="Technician">Technician</option><option value="Training Professional">Training Professional</option><option value="Transportation Professional">Transportation Professional</option><option value="Veterinary Doctor">Veterinary Doctor</option><option value="Volunteer">Volunteer</option><option value="Writer">Writer</option><option value="Zoologist">Zoologist</option></select>
				</td>
				<td align="center">
				<img src="images/add.gif" value="Add" onclick="copytolist(document.frm_main.elements['occupation_fromarray[]'],document.frm_main.elements['occupationarray[]']);"><br>
				<img src="images/remove.gif" value="Remove" onclick="copytolist(document.frm_main.elements['occupationarray[]'],document.frm_main.elements['occupation_fromarray[]']);"><br>
				</td>
				<td>
					<select multiple="multiple" name="occupationarray[]" size="5" class="formselect" style="width: 175px;">
					<?PHP
				$selectgrewupin="";
				$grewupin1 = explode("|",$row['Profession']);
				for($x=0; $x < count($grewupin1); $x++)
				{
					if($grewupin1[$x]=="")
					{
					$selectgrewupin .= '<option value="'.$grewupin1[$x].'">Doesn\'t Matter</option>';
					}
					else
					{
					$selectgrewupin .= '<option value="'.$grewupin1[$x].'">'.$grewupin1[$x].'</option>';
					}
				}
				echo $selectgrewupin;
				?>
					</select>
				</td>
			</tr>
			</tbody></table>
		</td>
	</tr>
	</tbody></table>
	<!-- PARTNER - EDUCATION & CAREER EN -->



	<!-- PARTNER - LIFESTYLE ST -->
	<a name="lifestyle"></a>
	<div class="largewhitebold bluepatch" style=" color:#990000; "><b>Partner - Lifestyle</b></div>
	<?PHP
$maritalstatus = explode("|",$row['Diet']);
$x = 0;
$doesntmatter="";
for($x=0; $x < count($maritalstatus); $x++)
{
	if ($maritalstatus[$x]=="Veg")
	{
		$veg=" checked";
	}
	else if($maritalstatus[$x]=="Eggetarian")
	{
		$eggetarian=" checked";
	}
	else if($maritalstatus[$x]=="Occasionally Non-Veg")
	{
		$occasionallynonveg=" checked";
	}
	else if($maritalstatus[$x]=="Non-Veg")
	{
		$nonveg=" checked";
	}
	else if($maritalstatus[$x]=="Jain")
	{
		$jain=" checked";
	}
	else if($maritalstatus[$x]=="Vegan")
	{
		$vegan=" checked";
	}
	else if($maritalstatus[$x]=="")
	{
		$doesntmatter=" checked";
	}
}
?>
	<table  border="0" cellpadding="6" cellspacing="0">
	<tbody><tr valign="top">
		<td class="td1"><b>Diet</b></td>
		<td class="td2 smallblack">
			<input name="dietarray[]" id="diet1" value="" onclick="check_option_dosent_matter(this)" ;=""  type="checkbox" <?PHP echo $doesntmatter?>><label for="diet1">Doesn't Matter</label>
			<input name="dietarray[]" id="diet2" value="Veg" onclick="check_option(this)" ;="" type="checkbox" <?PHP echo $veg?>><label for="diet2">Veg</label>
			<input name="dietarray[]" id="diet3" value="Eggetarian" onclick="check_option(this)" ;="" type="checkbox" <?PHP echo $eggetarian?>><label for="diet3">Eggetarian</label>
			<input name="dietarray[]" id="diet4" value="Occasionally Non-Veg" onclick="check_option(this)" ;="" type="checkbox" <?PHP echo $occasionallynonveg?>><label for="diet4">Occasionally Non-Veg</label><br>
			<input name="dietarray[]" id="diet5" value="Non-Veg" onclick="check_option(this)" ;="" type="checkbox" <?PHP echo $nonveg?>><label for="diet5">Non-Veg</label>
			<input name="dietarray[]" id="diet6" value="Jain" onclick="check_option(this)" ;="" type="checkbox" <?PHP echo $jain?>><label for="diet6">Jain</label>
			<input name="dietarray[]" id="diet7" value="Vegan" onclick="check_option(this)" ;="" type="checkbox" <?PHP echo $vegan?>><label for="diet7">Vegan</label></td>
	</tr>

	<?PHP
$maritalstatus = explode("|",$row['Smoke']);
$x = 0;
$doesntmatter="";
for($x=0; $x < count($maritalstatus); $x++)
{
	if ($maritalstatus[$x]=="Yes")
	{
		$yes=" checked";
	}
	else if($maritalstatus[$x]=="No")
	{
		$no=" checked";
	}
	else if($maritalstatus[$x]=="Occasionally")
	{
		$occasionally=" checked";
	}
	else if($maritalstatus[$x]=="")
	{
		$doesntmatter=" checked";
	}
}
?>
	<tr valign="top">
		<td><b>Smoke</b></td>
		<td class="smallblack">
			<input name="smokearray[]" id="smoke1" value="" onclick="check_option_dosent_matter(this)" ;=""  type="checkbox" <?PHP echo $doesntmatter?>><label for="smoke1">Doesn't Matter</label>
			<input name="smokearray[]" id="smoke2" value="Yes" onclick="check_option(this)" ;="" type="checkbox" <?PHP echo $yes?>><label for="smoke2">Yes</label>
			<input name="smokearray[]" id="smoke3" value="No" onclick="check_option(this)" ;="" type="checkbox" <?PHP echo $no?>><label for="smoke3">No</label>
			<input name="smokearray[]" id="smoke4" value="Occasionally" onclick="check_option(this)" ;="" type="checkbox" <?PHP echo $occasionally?>><label for="smoke4">Occasionally</label>
		</td>
	</tr>

		<?PHP
$maritalstatus = explode("|",$row['Drink']);
$x = 0;
for($x=0; $x < count($maritalstatus); $x++)
{
	if ($maritalstatus[$x]=="Yes")
	{
		$dyes=" checked";
	}
	else if($maritalstatus[$x]=="No")
	{
		$dno=" checked";
	}
	else if($maritalstatus[$x]=="Occasionally")
	{
		$doccasionally=" checked";
	}
	else if($maritalstatus[$x]=="")
	{
		$ddoesntmatter=" checked";
	}
}
?>

	<tr valign="top">
		<td><b>Drink</b></td>
		<td class="smallblack">
			<input name="drinkarray[]" id="drink1" value="" onclick="check_option_dosent_matter(this)" ;=""  type="checkbox" <?PHP echo $ddoesntmatter?>><label for="drink1">Doesn't Matter</label>
			<input name="drinkarray[]" id="drink2" value="Yes" onclick="check_option(this)" ;="" type="checkbox" <?PHP echo $dyes?>><label for="drink2">Yes</label>
			<input name="drinkarray[]" id="drink3" value="No" onclick="check_option(this)" ;="" type="checkbox" <?PHP echo $dno?>><label for="drink3">No</label>
			<input name="drinkarray[]" id="drink4" value="Occasionally" onclick="check_option(this)" ;="" type="checkbox" <?PHP echo $doccasionally?>><label for="drink4">Occasionally</label>
		</td>
	</tr>
	</tbody></table>
	<!-- PARTNER - LIFESTYLE EN -->


	<!-- PARTNER - LOCATION ST -->
	<a name="location"></a>
	<div class="largewhitebold bluepatch" style=" color:#990000; "><b>Partner - Location</b></div>

	<table border="0" cellpadding="6" cellspacing="0">
	<tbody><tr valign="top">
		<td><br></td>
		<td><div class="mediumred">To add to list -  Click on item on the left and click <b>'Add'</b><br>
			To remove from list - click on item on the right and click <b>'Remove'</b>.</div>
		</td>
	</tr>
	<tr valign="top">
		<td class="td1"><b>Country of Residence</b></td>
		<td class="td2">
			<table border="0" cellpadding="0" cellspacing="0">
			<tbody><tr>
				<td>
					<select multiple="multiple" name="countryofresidence_fromarray[]" size="5" class="formselect" style="width: 175px;">

					<?PHP
				$sqlCountry = "SELECT * FROM countries order by CountryID";
				$resultCountry = mysql_query($sqlCountry, $conn);
				if (@mysql_num_rows($resultCountry)!=0){
					while($rowCountry = mysql_fetch_array($resultCountry))
					{
						?>
						<option value="<?PHP echo $rowCountry['CountryID']?>"
						<?PHP
						if($_REQUEST['CountryID'] == $rowCountry['CountryID'])
							echo "selected";
						?>
						><?PHP echo $rowCountry['Country']?></option>
						<?
					}
				}
				?>

					</select>
				</td>
				<td align="center">
				<img src="images/add.gif" value="Add" onclick="if(copytolist(document.frm_main.elements['countryofresidence_fromarray[]'],document.frm_main.elements['countryofresidencearray[]'])) { }; getselectedstates();  "><br>
				<img src="images/remove.gif" value="Remove" onclick="if(copytolist(document.frm_main.elements['countryofresidencearray[]'],document.frm_main.elements['countryofresidence_fromarray[]'])) { }; getselectedstates();  "><br>
				</td>
				<td>
					<select multiple="multiple" name="countryofresidencearray[]" size="5" class="formselect" style="width: 175px;">

					<?PHP
				$selectgrewupin="";
				$grewupin1 = explode("|",$row['CountryOfResidence']);
				for($x=0; $x < count($grewupin1); $x++)
				{
				$sqlCountry = "SELECT * FROM countries where CountryID=".$grewupin1[$x];
				$resultCountry = mysql_query($sqlCountry, $conn);
				if (@mysql_num_rows($resultCountry)!=0){
					$rowCountry=@mysql_fetch_array($resultCountry);
					$selectgrewupin .= '<option value="'.$rowCountry['CountryID'].'">'.$rowCountry['Country'].'</option>';
				}
				}
				if($selectgrewupin=="")
				{
					echo '<option value="">Doesn\'t Matter</option>';
				}
				else
				{
				echo $selectgrewupin;
				}
				?>
					</select>
				</td>
			</tr>
			</tbody></table>
		</td>
	</tr>
<script language="javascript">
					function getselectedstates()
					{
					countries = "";
					for (i=0;i<document.frm_main.elements['countryofresidencearray[]'].options.length;i++)
					{
						if(i==0)
						{
							countries = document.frm_main.elements['countryofresidencearray[]'].options[i].value;
						}
						else
						{
							countries = countries + "|" + document.frm_main.elements['countryofresidencearray[]'].options[i].value;
						}
					}
					getstatesbox(countries);
					//alert(countries);
					}
					</script>

	<tr id="show_hide_state" valign="top">
		<td><b>State of Residence</b></td>
		<td>
			<table border="0" cellpadding="0" cellspacing="0">
			<tbody><tr>
				<td>
					<span id="statesspan2">
					<select multiple="multiple" name="stateofresidence_fromarray[]" size="5" class="formselect" style="width: 175px;">
					<?PHP
				$sqlCountry = "SELECT * FROM states,countries where countries.CountryID=states.CountryID order by states.CountryID";
				$resultCountry = mysql_query($sqlCountry, $conn);
				if (@mysql_num_rows($resultCountry)!=0){
					while($rowCountry = mysql_fetch_array($resultCountry))
					{
						?>
						<option value="<?PHP echo $rowCountry['StateID']?>"
						><?PHP echo $rowCountry['Country'].":".$rowCountry['State']?></option>
						<?
					}
				}
				?>
					</select>
					</span>
				</td>
				<td align="center">
				<img src="images/add.gif" value="Add" onclick="copytolist(document.frm_main.elements['stateofresidence_fromarray[]'],document.frm_main.elements['stateofresidencearray[]']);"><br>
				<img src="images/remove.gif" value="Remove" onclick="copytolist(document.frm_main.elements['stateofresidencearray[]'],document.frm_main.elements['stateofresidence_fromarray[]']);"><br>
				</td>
				<td>
				<select multiple="multiple" name="stateofresidencearray[]" size="5" class="formselect" style="width: 175px;">
				<?PHP
				$selectgrewupin="";
				$grewupin1 = explode("|",$row['StateOfResidence']);
				for($x=0; $x < count($grewupin1); $x++)
				{
				$sqlCountry = "SELECT * FROM states where StateID=".$grewupin1[$x];
				$resultCountry = mysql_query($sqlCountry, $conn);
				if (@mysql_num_rows($resultCountry)!=0){
					$rowCountry=@mysql_fetch_array($resultCountry);
					$selectgrewupin .= '<option value="'.$rowCountry['StateID'].'">'.$rowCountry['State'].'</option>';
				}
				}
				if($selectgrewupin=="")
				{
					echo '<option value="">Doesn\'t Matter</option>';
				}
				else
				{
				echo $selectgrewupin;
				}
				?>
				</select>
				</td>
			</tr>
			</tbody></table>
		</td>
	</tr>


	<tr valign="top">
		<td><b>Residency Status</b></td>
		<td>
			<table border="0" cellpadding="0" cellspacing="0">
			<tbody><tr>
				<td>
					<select multiple="multiple" name="residencystatus_fromarray[]" size="5" class="formselect" style="width: 175px;"><option value="Citizen">Citizen</option><option value="Permanent Resident">Permanent Resident</option><option value="Student Visa">Student Visa</option><option value="Temporary Visa">Temporary Visa</option><option value="Work Permit">Work Permit</option></select>
				</td>
				<td align="center">
				<img src="images/add.gif" value="Add" onclick="copytolist(document.frm_main.elements['residencystatus_fromarray[]'],document.frm_main.elements['residencystatusarray[]']);"><br>
				<img src="images/remove.gif" value="Remove" onclick="copytolist(document.frm_main.elements['residencystatusarray[]'],document.frm_main.elements['residencystatus_fromarray[]']);"><br>
				</td>
				<td>
					<select multiple="multiple" name="residencystatusarray[]" size="5" class="formselect" style="width: 175px;">
					<?PHP
				$selectgrewupin="";
				$grewupin1 = explode("|",$row['ResidencyStatus']);
				for($x=0; $x < count($grewupin1); $x++)
				{
					$selectgrewupin .= '<option value="'.$grewupin1[$x].'">'.$grewupin1[$x].'</option>';
				}
				if($selectgrewupin=="")
				{
					echo '<option value="">Doesn\'t Matter</option>';
				}
				else
				{
				echo $selectgrewupin;
				}
				?>
					</select>
				</td>
			</tr>
			</tbody></table>
		</td>
	</tr>
	</tbody></table><br>
	<!-- PARTNER - LOCATION EN -->


	<table  border="0" cellpadding="6" cellspacing="0" align="center">
	<tbody><tr height="60">
		<td align="center">
			<input src="images/submit.gif" style="width: 76px; height: 22px;" border="0" type="image">
			<input name="continue" value="true" type="hidden">
		</td>
	</tr>
	</tbody></table>

</form>
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