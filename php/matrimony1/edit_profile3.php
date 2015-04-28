<?PHP
session_start();
if($_SESSION['UserID']=="")
{
	header("location: login.php");
	exit();
}
include("connection.php");

$sqlsettings = "SELECT * from admin";
$resultsettings = mysql_query($sqlsettings);
$rowsettings = mysql_fetch_array($resultsettings);

if($_POST['continue']=="true")
{
if($_POST['countryofbirth']=="")
{
$BirthCountry = 0;
}
else
{
$BirthCountry = $_POST['countryofbirth'];
}

$file1 = "";
if (trim($_FILES['myfiles']['name'][0])!="")
{

if(trim($_POST['photo1'])!="")
{
	unlink(trim($_POST['photo1']));
}
$file_dir = "memberphotos/";
$file1 = $file_dir."astrochart".$_SESSION['UserID'].$_FILES['myfiles']['name'][0];
move_uploaded_file($_FILES['myfiles']['tmp_name'][0], $file1);
}


			$insert = "update user_profile set BirthHour='".mysql_escape_string($_POST['timeofbirth_hour'])."', BirthMin='".mysql_escape_string($_POST['timeofbirth_min'])."', BirthSec='".mysql_escape_string($_POST['timeofbirth_sec'])."', Rasi='".mysql_escape_string($_POST['Rasi'])."', Nakshatra='".mysql_escape_string($_POST['Nakshatra'])."', Astroprofile='".$file1."', CountryOfBirth=".$BirthCountry.", BirthCity=".$_POST['cityofbirth']." where UserID=".$_SESSION['UserID'];


			$resultt = mysql_query($insert);
$age = GetAge(mysql_escape_string($_POST['year']), mysql_escape_string($_POST['month']), mysql_escape_string($_POST['day']));

$insert = "update users set BirthDate='".mysql_escape_string($_POST['day'])."', BirthMonth='".mysql_escape_string($_POST['month'])."', BirthYear='".mysql_escape_string($_POST['year'])."', Age='".$age."' where UserID=".$_SESSION['UserID'];

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
<title>Marry Banjara - Edit Astro Profile</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/editprofile3.css">
<script language="javascript" src="js/ajax-v2-inc-mod.js"></script>
<script language="javascript" src="js/tool-tip.js"></script>
<script language="javascript" src="js/common_002.js"></script>
<script language="javascript" src="js/ajax-v2-inc-mod.js"></script>
<script language="javascript" src="js/editprofile3.js"></script>
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
				<h2>Edit your astro details</h2>
			</div>








	<form method="post" name="frmastro" action="edit_profile3.php" enctype="multipart/form-data" style="margin: 0px;">
<input type="hidden" name="continue" value="true">
	<div class="largewhitebold bluepatch" style="color:#990000; "><b>My Astro Data</b></div>

	<table  border="0" cellpadding="6" cellspacing="0">
	<tbody><tr>
		<td ><br></td>
		<td class="mediumred">&nbsp;</td>
	</tr>
	<tr>
		<td><em>&nbsp; </em><b>Date of Birth</b></td>
		<td>&nbsp; <select name="day" id="day" class="field_filled1">
				<?PHP
				$day='<option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option>';
				$day = str_replace('<option value="'.$row['BirthDate'].'"','<option value="'.$row['BirthDate'].'" selected', $day);
				echo $day;
				?>
				</select>&nbsp; <select name="month" class="field_filled1">
				<?PHP
				$month='<option value="01">Jan</option><option value="02">Feb</option><option value="03">Mar</option><option value="04">Apr</option><option value="05">May</option><option value="06">Jun</option><option value="07">Jul</option><option value="08">Aug</option><option value="09">Sep</option><option value="10">Oct</option><option value="11">Nov</option><option value="12">Dec</option>';
				$month = str_replace('<option value="'.$row['BirthMonth'].'"','<option value="'.$row['BirthMonth'].'" selected', $month);
				echo $month;
				?>
				</select>&nbsp; <select name="year" class="field_filled1">
				<?PHP
				$year='<option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option>';
				$year = str_replace('<option value="'.$row['BirthYear'].'"','<option value="'.$row['BirthYear'].'" selected', $year);
				echo $year;
				?>
				</select></td>
	</tr>
	<tr>
		<td><em>&nbsp;&nbsp;</em><b>Time of Birth</b></td>
		<td><select name="timeofbirth_hour" class="formselect">
		<?PHP
		$BirthHour='<option value="">Hour</option><option value="00">00</option><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option>';
		$BirthHour = str_replace('<option value="'.$row['BirthHour'].'"','<option value="'.$row['BirthHour'].'" selected', $BirthHour);
				echo $BirthHour;
		?>
		</select>
			: 	<select name="timeofbirth_min" class="formselect">
			<?PHP
			$BirthMin='<option value="">Min</option><option value="00">00</option><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option>';
			$BirthMin = str_replace('<option value="'.$row['BirthMin'].'"','<option value="'.$row['BirthMin'].'" selected', $BirthMin);
				echo $BirthMin;
			?>

			</select> :
				<select name="timeofbirth_sec" class="formselect">
				<?PHP
				$BirthSec='<option value="">Sec</option><option value="00">00</option><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option>';
				$BirthSec = str_replace('<option value="'.$row['BirthSec'].'"','<option value="'.$row['BirthSec'].'" selected', $BirthSec);
				echo $BirthSec;
				?></select>
		</td>
	</tr>

	<tr>
		<td><em>&nbsp;&nbsp;</em><b>Country of Birth</b></td>
		<td><select class="formselect" name="countryofbirth" onChange="loadXMLDoc('get_cities.php')">
		<option value="0">Select</option>



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




		</select>
		</td>
	</tr>
	<tr valign="top">
		<td><em>&nbsp;&nbsp;</em><b>City of Birth</b></td>
		<td>

		<span id="cityspan">
<select name="cityofbirth" class="forminput">
				<option value="0">Select City</option>
				<?
				$sql12 = "SELECT * FROM cities where CountryID = ".$row['CountryOfBirth']." order by CityID";
				$result12 = mysql_query($sql12, $conn);
				if (@mysql_num_rows($result12)!=0){
					while($row12 = mysql_fetch_array($result12))
					{
						?>
						<option value="<?=$row12['CityID']?>"
						<?PHP
						if($row['BirthCity'] == $row12['CityID'])
							echo " selected";
						?>
						><?=$row12['City']?></option>
						<?
					}
				}
				?>
				</select>
</span>
		<br>
		</td>
	</tr>

	<tr valign="top">
		<td width="110"><em>&nbsp;&nbsp;</em><b>Rasi (moon sign)</b></td>
		<td>
		<input type="text" name="Rasi" value="<?PHP echo stripslashes($row['Rasi'])?>">
		</td>
	</tr>

		<tr valign="top">
		<td><em>&nbsp;&nbsp;</em><b>Nakshatra</b></td>
		<td>
		<input type="text" name="Nakshatra" value="<?PHP echo stripslashes($row['Nakshatra'])?>">
		</td>
	</tr>

	<tr valign="top">
		<td><em>&nbsp;&nbsp;</em><b>Astroprofile</b></td>
		<td>
		<input type="file" name="myfiles[]"> (you can upload an scanned image of your astro chart)
		<br>
<?PHP
if ($row['Astroprofile']!="")
{
?>
	<a href="<?PHP echo $row['Astroprofile']?>" target="_blank">Click here to see Astroprofile you uploaded</a>
<?PHP
}
?>
<input type="hidden" name="photo1" value="<?PHP echo stripslashes($row['Astroprofile'])?>">
		</td>
	</tr>


	</tbody></table><br>

	<div style="padding-left: 127px; text-align: left;" class="mediumblack"></div>


	<table border="0" cellpadding="6" cellspacing="0">
	<tbody><tr height="60">
 		<td ><br></td>
		<td >
			<input src="images/submit.gif" style="width: 76px; height: 22px;" border="0" type="image">
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