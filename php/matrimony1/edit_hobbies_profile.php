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
$hobbies = "";
while($i < count($_REQUEST['hobbiesarray']))
{
if($i==0)
{
$hobbies = $_REQUEST['hobbiesarray'][$i];
}
else
{
$hobbies .= "|".$_REQUEST['hobbiesarray'][$i];
}
$i=$i+1;
}

if($_REQUEST['hobbies_choose']!="")
{
$hobbies = $_REQUEST['hobbies_choose'];
}

$i=0;
$interestsarray = "";
while($i < count($_REQUEST['interestsarray']))
{
if($i==0)
{
$interestsarray = $_REQUEST['interestsarray'][$i];
}
else
{
$interestsarray .= "|".$_REQUEST['interestsarray'][$i];
}
$i=$i+1;
}

if($_REQUEST['interests_choose']!="")
{
$interestsarray = $_REQUEST['interests_choose'];
}

$i=0;
$favourite_musicarray = "";
while($i < count($_REQUEST['favourite_musicarray']))
{
if($i==0)
{
$favourite_musicarray = $_REQUEST['favourite_musicarray'][$i];
}
else
{
$favourite_musicarray .= "|".$_REQUEST['favourite_musicarray'][$i];
}
$i=$i+1;
}

if($_REQUEST['favourite_music_choose']!="")
{
$favourite_musicarray = $_REQUEST['favourite_music_choose'];
}

$i=0;
$favourite_readsarray = "";
while($i < count($_REQUEST['favourite_readsarray']))
{
if($i==0)
{
$favourite_readsarray = $_REQUEST['favourite_readsarray'][$i];
}
else
{
$favourite_readsarray .= "|".$_REQUEST['favourite_readsarray'][$i];
}
$i=$i+1;
}

if($_REQUEST['favourite_reads_choose']!="")
{
$favourite_readsarray = $_REQUEST['favourite_reads_choose'];
}

$i=0;
$preferred_moviesarray = "";
while($i < count($_REQUEST['preferred_moviesarray']))
{
if($i==0)
{
$preferred_moviesarray = $_REQUEST['preferred_moviesarray'][$i];
}
else
{
$preferred_moviesarray .= "|".$_REQUEST['preferred_moviesarray'][$i];
}
$i=$i+1;
}

if($_REQUEST['preferred_movies_choose']!="")
{
$preferred_moviesarray = $_REQUEST['preferred_movies_choose'];
}

$i=0;
$sports_fitness_activitiesarray = "";
while($i < count($_REQUEST['sports_fitness_activitiesarray']))
{
if($i==0)
{
$sports_fitness_activitiesarray = $_REQUEST['sports_fitness_activitiesarray'][$i];
}
else
{
$sports_fitness_activitiesarray .= "|".$_REQUEST['sports_fitness_activitiesarray'][$i];
}
$i=$i+1;
}

if($_REQUEST['sports_fitness_activities_choose']!="")
{
$sports_fitness_activitiesarray = $_REQUEST['sports_fitness_activities_choose'];
}

$i=0;
$favourite_cuisinearray = "";
while($i < count($_REQUEST['favourite_cuisinearray']))
{
if($i==0)
{
$favourite_cuisinearray = $_REQUEST['favourite_cuisinearray'][$i];
}
else
{
$favourite_cuisinearray .= "|".$_REQUEST['favourite_cuisinearray'][$i];
}
$i=$i+1;
}

if($_REQUEST['favourite_cuisine_choose']!="")
{
$favourite_cuisinearray = $_REQUEST['favourite_cuisine_choose'];
}

$i=0;
$preferred_dress_stylearray = "";
while($i < count($_REQUEST['preferred_dress_stylearray']))
{
if($i==0)
{
$preferred_dress_stylearray = $_REQUEST['preferred_dress_stylearray'][$i];
}
else
{
$preferred_dress_stylearray .= "|".$_REQUEST['preferred_dress_stylearray'][$i];
}
$i=$i+1;
}

if($_REQUEST['preferred_dress_style_choose']!="")
{
$preferred_dress_stylearray = $_REQUEST['preferred_dress_style_choose'];
}

$i=0;
$spoken_languagesarray = "";
while($i < count($_REQUEST['spoken_languagesarray']))
{
if($i==0)
{
$spoken_languagesarray = $_REQUEST['spoken_languagesarray'][$i];
}
else
{
$spoken_languagesarray .= "|".$_REQUEST['spoken_languagesarray'][$i];
}
$i=$i+1;
}

if($_REQUEST['spoken_languages_choose']!="")
{
$spoken_languagesarray = $_REQUEST['spoken_languages_choose'];
}

$insert = "update user_profile set Hobbies='".mysql_escape_string($hobbies)."', Interests='".mysql_escape_string($interestsarray)."', FavoriteMusic='".mysql_escape_string($favourite_musicarray)."', FavoriteReads='".mysql_escape_string($favourite_readsarray)."', PreferredMovies='".mysql_escape_string($preferred_moviesarray)."', Sports='".mysql_escape_string($sports_fitness_activitiesarray)."', FavoriteCuisine='".mysql_escape_string($favourite_cuisinearray)."', PreferredDress='".mysql_escape_string($preferred_dress_stylearray)."', SpokenLanguages='".mysql_escape_string($spoken_languagesarray)."' where UserID=".$_SESSION['UserID'];

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
<title>Marry Banjara - Edit Hobbies Profile</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/styles.css">
<script language="javascript" src="js/ajax-v2-inc-mod.js"></script>
<script language="javascript" src="js/tool-tip.js"></script>
<script language="javascript" src="js/common_002.js"></script>
<script language="javascript" src="js/ajax-v2.js"></script>
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

			<!-- The topbanner table start's here -->
			<div style="width: 762px; background-color: rgb(255, 255, 255);">
			<div style="border-top: 1px solid rgb(143, 167, 191); border-left: 1px solid rgb(143, 167, 191); border-right: 1px solid rgb(143, 167, 191);">




				<!-- midlinks + services space -->
					<br style="line-height: 1px;" clear="all">
				<div>
					<div style="border-top: 2px solid #990000; border-bottom: 12px solid #990000; background-color: #990000; text-align: left;">

					</div>
				</div>
				<!-- The topbanner table end's here -->

				<!-- The tab table start's here -->
				<div style="margin: 0px; width: 100%;">
					<div style="width: 180px; background-color: rgb(255, 255, 255); float: left;">
						<div style="border-top: 2px solid rgb(0, 0, 0);">
						<div style="padding: 6px 0pt 0pt 0px; width: 170px; " class="smallblack"><div><a href="logout.php" class="smallbluelink"><b>Logout</b></a> [<a href="my_profile.php" class="smallblackbold" title="<?PHP echo $_SESSION['LoginID']?>"><?PHP echo $_SESSION['LoginID']?></a>]<br>
						<span style="line-height: 2px;"><br></span>
</div>

				</div>
				</div>
				</div>

				<div style="width: 580px; background-color: rgb(255, 255, 255); float: right; text-align: left;">
					<div style="border-top: 2px solid rgb(0, 0, 0); width: 7px; float: left;"></div>
					<div style="width: 130px; float: left;border-top: 2px solid rgb(0, 0, 0);">					<br clear="all">
				  </div>
					<div style="width: 130px; float: left;border-top: 2px solid rgb(0, 0, 0);">					<br clear="all">
				  </div>
					<div style="width: 130px; float: left;border-top: 2px solid rgb(0, 0, 0);">					<br clear="all">
				  </div>
					<div style="border-top: 2px solid rgb(0, 0, 0); width: 30px; float: left;"></div>
					<div style="width: 141px; float: left;border-top: 2px solid rgb(0, 0, 0);">
					</div>
					<div style="border-top: 2px solid rgb(0, 0, 0); width: 12px; float: right;"></div>
				</div>
				<br clear="all">
				</div>

			</div>
			</div>
			<!-- The topbanner table ends here -->
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
<td height="1" width="5"><spacer type="block" height="1" width="10"></td>
<td valign="top">
<div style="width: 552px;">
	<div style="background: rgb(255, 255, 255) none repeat scroll 0%; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial;">
		<div class="mediumblack" style="width: 500px;">



	<div style="border: 0px solid rgb(0, 0, 0); margin: 0pt 30px; text-align: left;">


			<div style="border-bottom: 1px solid rgb(143, 167, 191); padding: 12px 0px 7px; margin-bottom: 10px;width:500px;">
				<h2>Edit Hobbies, Interests, and more...</h2>
			</div>
<script language="JavaScript">
<!--



function radio_check(obj,check_box_name)
{
	 if(obj.checked)
	{
		for(var i=0;i<document.frm_main.elements[check_box_name].length;i++)
		{
			if(document.frm_main.elements[check_box_name][i].checked)
			{
				document.frm_main.elements[check_box_name][i].checked = false;
			}
		}
	}
}


function radio_uncheck(obj)
{
	if(document.frm_main.elements[obj].length > 1)
	{
		for(var i=0;i<document.frm_main.elements[obj].length;i++)
		{
			if(document.frm_main.elements[obj][i].checked)
			{
				document.frm_main.elements[obj][i].checked = false;
			}
		}
	}
	else
	{
		document.frm_main.elements[obj].checked = false;
	}
}
//-->
</script>

<form method="post" name="frm_main" action="edit_hobbies_profile.php">
<input type="hidden" name="continue" value="true">


	<a name="Hobbies"></a>
	<div class="largewhitebold bluepatch" style="width:500px; color:#990000;"><b>Hobbies</b></div>
<?PHP
$hobbies = explode("|",$row['Hobbies']);
$x = 0;
for($x=0; $x < count($hobbies); $x++)
{
	if ($hobbies[$x]=="Acting")
	{
		$acting=" checked";
	}
	else if($hobbies[$x]=="Animal breeding")
	{
		$animal=" checked";
	}
	else if($hobbies[$x]=="Art / Handicraft")
	{
		$art=" checked";
	}
	else if($hobbies[$x]=="Astrology / Palmistry / Numerology")
	{
		$astrology=" checked";
	}
	else if($hobbies[$x]=="Astronomy")
	{
		$astronomy=" checked";
	}
	else if($hobbies[$x]=="Bird watching")
	{
		$bird=" checked";
	}
	else if($hobbies[$x]=="Collectibles")
	{
		$collectibles=" checked";
	}
	else if($hobbies[$x]=="Cooking")
	{
		$cooking=" checked";
	}
	else if($hobbies[$x]=="Dancing")
	{
		$dancing=" checked";
	}
	else if($hobbies[$x]=="DIY(do it yourself) projects")
	{
		$diy=" checked";
	}
	else if($hobbies[$x]=="Film-making")
	{
		$filmmaking=" checked";
	}
	else if($hobbies[$x]=="Fishing")
	{
		$fishing=" checked";
	}
	else if($hobbies[$x]=="Gardening / Landscaping")
	{
		$gardening=" checked";
	}
	else if($hobbies[$x]=="Graphology")
	{
		$graphology=" checked";
	}
	else if($hobbies[$x]=="Ham radio")
	{
		$ham=" checked";
	}
	else if($hobbies[$x]=="Home / Interior decoration")
	{
		$home=" checked";
	}
	else if($hobbies[$x]=="Hunting")
	{
		$hunting=" checked";
	}
	else if($hobbies[$x]=="Model building")
	{
		$model=" checked";
	}
	else if($hobbies[$x]=="Painting / Drawing")
	{
		$painting=" checked";
	}
	else if($hobbies[$x]=="Photography")
	{
		$photography=" checked";
	}
	else if($hobbies[$x]=="Playing musical instruments")
	{
		$playing=" checked";
	}
	else if($hobbies[$x]=="Singing")
	{
		$singing=" checked";
	}
	else if($hobbies[$x]=="Solving Crosswords, Puzzles")
	{
		$solving=" checked";
	}
	else if($hobbies[$x]=="Will tell you later")
	{
		$hobbieschoose=" checked";
	}
}
?>
	<table class="tbl1" border="0" cellpadding="0" cellspacing="0" style="width:500px;">
	<tbody><tr height="21" valign="top">
		<td class="smallblack">
<input name="hobbiesarray[]" value="Acting" id="testhobbiesarray[]0" onclick="radio_uncheck('hobbies_choose');" type="checkbox" <?PHP echo $acting?>><label for="testhobbiesarray[]0">Acting</label><br>
<input name="hobbiesarray[]" value="Animal breeding" id="testhobbiesarray[]1" onclick="radio_uncheck('hobbies_choose');" type="checkbox" <?PHP echo $animal?>><label for="testhobbiesarray[]1">Animal breeding</label><br>
<input name="hobbiesarray[]" value="Art / Handicraft" id="testhobbiesarray[]2" onclick="radio_uncheck('hobbies_choose');" type="checkbox" <?PHP echo $art?>><label for="testhobbiesarray[]2">Art / Handicraft</label><br>
<input name="hobbiesarray[]" value="Astrology / Palmistry / Numerology" id="testhobbiesarray[]3" onclick="radio_uncheck('hobbies_choose');" type="checkbox" <?PHP echo $astrology?>><label for="testhobbiesarray[]3">Astrology / Palmistry / Numerology</label><br>
<input name="hobbiesarray[]" value="Astronomy" id="testhobbiesarray[]4" onclick="radio_uncheck('hobbies_choose');" type="checkbox" <?PHP echo $astronomy?>><label for="testhobbiesarray[]4">Astronomy</label><br>
<input name="hobbiesarray[]" value="Bird watching" id="testhobbiesarray[]5" onclick="radio_uncheck('hobbies_choose');" type="checkbox" <?PHP echo $bird?>><label for="testhobbiesarray[]5">Bird watching</label><br>
<input name="hobbiesarray[]" value="Collectibles" id="testhobbiesarray[]6" onclick="radio_uncheck('hobbies_choose');" type="checkbox" <?PHP echo $collectibles?>><label for="testhobbiesarray[]6">Collectibles</label><br>
<input name="hobbiesarray[]" value="Cooking" id="testhobbiesarray[]7" onclick="radio_uncheck('hobbies_choose');" type="checkbox" <?PHP echo $cooking?>><label for="testhobbiesarray[]7">Cooking</label><br>
 </td>
 <td class="smallblack">
<input name="hobbiesarray[]" value="Dancing" id="testhobbiesarray[]8" onclick="radio_uncheck('hobbies_choose');" type="checkbox" <?PHP echo $dancing?>><label for="testhobbiesarray[]8">Dancing</label><br>
<input name="hobbiesarray[]" value="DIY(do it yourself) projects" id="testhobbiesarray[]9" onclick="radio_uncheck('hobbies_choose');" type="checkbox" <?PHP echo $diy?>><label for="testhobbiesarray[]9">DIY(do it yourself) projects</label><br>
<input name="hobbiesarray[]" value="Film-making" id="testhobbiesarray[]10" onclick="radio_uncheck('hobbies_choose');" type="checkbox" <?PHP echo $filmmaking?>><label for="testhobbiesarray[]10">Film-making</label><br>
<input name="hobbiesarray[]" value="Fishing" id="testhobbiesarray[]11" onclick="radio_uncheck('hobbies_choose');" type="checkbox" <?PHP echo $fishing?>><label for="testhobbiesarray[]11">Fishing</label><br>
<input name="hobbiesarray[]" value="Gardening / Landscaping" id="testhobbiesarray[]12" onclick="radio_uncheck('hobbies_choose');" type="checkbox" <?PHP echo $gardening?>><label for="testhobbiesarray[]12">Gardening / Landscaping</label><br>
<input name="hobbiesarray[]" value="Graphology" id="testhobbiesarray[]13" onclick="radio_uncheck('hobbies_choose');" type="checkbox" <?PHP echo $graphology?>><label for="testhobbiesarray[]13">Graphology</label><br>
<input name="hobbiesarray[]" value="Ham radio" id="testhobbiesarray[]14" onclick="radio_uncheck('hobbies_choose');" type="checkbox" <?PHP echo $ham?>><label for="testhobbiesarray[]14">Ham radio</label><br>
<input name="hobbiesarray[]" value="Home / Interior decoration" id="testhobbiesarray[]15" onclick="radio_uncheck('hobbies_choose');" type="checkbox" <?PHP echo $home?>><label for="testhobbiesarray[]15">Home / Interior decoration</label><br>
 </td>
 <td class="smallblack">
<input name="hobbiesarray[]" value="Hunting" id="testhobbiesarray[]16" onclick="radio_uncheck('hobbies_choose');" type="checkbox" <?PHP echo $hunting?>><label for="testhobbiesarray[]16">Hunting</label><br>
<input name="hobbiesarray[]" value="Model building" id="testhobbiesarray[]17" onclick="radio_uncheck('hobbies_choose');" type="checkbox" <?PHP echo $model?>><label for="testhobbiesarray[]17">Model building</label><br>
<input name="hobbiesarray[]" value="Painting / Drawing" id="testhobbiesarray[]18" onclick="radio_uncheck('hobbies_choose');" type="checkbox" <?PHP echo $painting?>><label for="testhobbiesarray[]18">Painting / Drawing</label><br>
<input name="hobbiesarray[]" value="Photography" id="testhobbiesarray[]19" onclick="radio_uncheck('hobbies_choose');" type="checkbox" <?PHP echo $photography?>><label for="testhobbiesarray[]19">Photography</label><br>
<input name="hobbiesarray[]" value="Playing musical instruments" id="testhobbiesarray[]20" onclick="radio_uncheck('hobbies_choose');" type="checkbox" <?PHP echo $playing?>><label for="testhobbiesarray[]20">Playing musical instruments</label><br>
<input name="hobbiesarray[]" value="Singing" id="testhobbiesarray[]21" onclick="radio_uncheck('hobbies_choose');" type="checkbox" <?PHP echo $singing?>><label for="testhobbiesarray[]21">Singing</label><br>
<input name="hobbiesarray[]" value="Solving Crosswords, Puzzles" id="testhobbiesarray[]22" onclick="radio_uncheck('hobbies_choose');" type="checkbox" <?PHP echo $solving?>><label for="testhobbiesarray[]22">Solving Crosswords, Puzzles</label><br>
			</td>
		</tr>

 <tr height="21">
  <td class="smallblack"><input name="hobbies_choose" id="hobbies_choose0" value="Will tell you later" onclick="radio_check(this,'hobbiesarray[]');" type="radio" <?PHP echo $hobbieschoose?>><label for="hobbies_choose0">Will tell you later</label></td>
<td colspan="2">&nbsp;</td>
 </tr></tbody></table>
<?PHP
$hobbies = explode("|",$row['Interests']);
$x = 0;
$willtellyoulater = "";
for($x=0; $x < count($hobbies); $x++)
{
	if ($hobbies[$x]=="Alternative healing")
	{
		$alternative=" checked";
	}
	else if($hobbies[$x]=="Bikes / Cars")
	{
		$bikes=" checked";
	}
	else if($hobbies[$x]=="Blogging")
	{
		$blogging=" checked";
	}
	else if($hobbies[$x]=="Clubbing")
	{
		$clubbing=" checked";
	}
	else if($hobbies[$x]=="Driving")
	{
		$driving=" checked";
	}
	else if($hobbies[$x]=="Eating out")
	{
		$eating=" checked";
	}
	else if($hobbies[$x]=="Health &amp; Fitness")
	{
		$health=" checked";
	}
	else if($hobbies[$x]=="Hiking / Camping")
	{
		$hiking=" checked";
	}
	else if($hobbies[$x]=="Learning new languages")
	{
		$learning=" checked";
	}
	else if($hobbies[$x]=="Listening to music")
	{
		$listening=" checked";
	}
	else if($hobbies[$x]=="Mehendi Designing")
	{
		$mehendi=" checked";
	}
	else if($hobbies[$x]=="Movies")
	{
		$movies=" checked";
	}
	else if($hobbies[$x]=="Museums / Galleries / Exhibitions")
	{
		$museums=" checked";
	}
	else if($hobbies[$x]=="Nature")
	{
		$nature=" checked";
	}
	else if($hobbies[$x]=="Net surfing")
	{
		$net=" checked";
	}
	else if($hobbies[$x]=="Pets")
	{
		$pets=" checked";
	}
	else if($hobbies[$x]=="Politics")
	{
		$politics=" checked";
	}
	else if($hobbies[$x]=="Reading / Book clubs")
	{
		$reading=" checked";
	}
	else if($hobbies[$x]=="Religion")
	{
		$religion=" checked";
	}
	else if($hobbies[$x]=="Shopping")
	{
		$shopping=" checked";
	}
	else if($hobbies[$x]=="Sports - Indoor")
	{
		$sportsindoor=" checked";
	}
	else if($hobbies[$x]=="Sports - Outdoor")
	{
		$singingoutdoor=" checked";
	}
	else if($hobbies[$x]=="Stitching")
	{
		$stitching=" checked";
	}
	else if($hobbies[$x]=="Technology")
	{
		$technology=" checked";
	}
	else if($hobbies[$x]=="Theatre")
	{
		$theatre=" checked";
	}
	else if($hobbies[$x]=="Travel / Sightseeing")
	{
		$travel=" checked";
	}
	else if($hobbies[$x]=="Trekking / Adventure sports")
	{
		$trekking=" checked";
	}
	else if($hobbies[$x]=="Video / Computer games")
	{
		$video=" checked";
	}
	else if($hobbies[$x]=="Volunteering / Social Service")
	{
		$volunteering=" checked";
	}
	else if($hobbies[$x]=="Watching television")
	{
		$watching=" checked";
	}
	else if($hobbies[$x]=="Wine tasting")
	{
		$wine=" checked";
	}
	else if($hobbies[$x]=="Writing")
	{
		$writing=" checked";
	}
	else if($hobbies[$x]=="Yoga / Meditation")
	{
		$yoga=" checked";
	}
	else if($hobbies[$x]=="Will tell you later")
	{
		$interestschoose=" checked";
	}
}
?>
	<a name="Interests"></a>
	<div class="largewhitebold bluepatch" style="width:500px; color:#990000;"><b>Interests</b></div>

	<table class="tbl1" border="0" cellpadding="0" cellspacing="0" style="width:500px;">
	<!-- <tr height="2"><td class="td1"></td><td class="td2"></td><td class="td3"></td></tr> -->
	<tbody><tr height="21" valign="top">
		<td class="smallblack">
<input name="interestsarray[]" value="Alternative healing" id="testinterestsarray[]0" onclick="radio_uncheck('interests_choose');" type="checkbox" <?PHP echo $alternative?>><label for="testinterestsarray[]0">Alternative healing</label><br>
<input name="interestsarray[]" value="Bikes / Cars" id="testinterestsarray[]1" onclick="radio_uncheck('interests_choose');" type="checkbox" <?PHP echo $bikes?>><label for="testinterestsarray[]1">Bikes / Cars</label><br>
<input name="interestsarray[]" value="Blogging" id="testinterestsarray[]2" onclick="radio_uncheck('interests_choose');" type="checkbox" <?PHP echo $blogging?>><label for="testinterestsarray[]2">Blogging</label><br>
<input name="interestsarray[]" value="Clubbing" id="testinterestsarray[]3" onclick="radio_uncheck('interests_choose');" type="checkbox"  <?PHP echo $clubbing?>><label for="testinterestsarray[]3">Clubbing</label><br>
<input name="interestsarray[]" value="Driving" id="testinterestsarray[]4" onclick="radio_uncheck('interests_choose');" type="checkbox"  <?PHP echo $clubbing?>><label for="testinterestsarray[]4">Driving</label><br>
<input name="interestsarray[]" value="Eating out" id="testinterestsarray[]5" onclick="radio_uncheck('interests_choose');" type="checkbox" <?PHP echo $eating?>><label for="testinterestsarray[]5">Eating out</label><br>
<input name="interestsarray[]" value="Health &amp; Fitness" id="testinterestsarray[]6" onclick="radio_uncheck('interests_choose');" type="checkbox" <?PHP echo $health?>><label for="testinterestsarray[]6">Health &amp; Fitness</label><br>
<input name="interestsarray[]" value="Hiking / Camping" id="testinterestsarray[]7" onclick="radio_uncheck('interests_choose');" type="checkbox" <?PHP echo $hiking?>><label for="testinterestsarray[]7">Hiking / Camping</label><br>
<input name="interestsarray[]" value="Learning new languages" id="testinterestsarray[]8" onclick="radio_uncheck('interests_choose');" type="checkbox" <?PHP echo $learning?>><label for="testinterestsarray[]8">Learning new languages</label><br>
<input name="interestsarray[]" value="Listening to music" id="testinterestsarray[]9" onclick="radio_uncheck('interests_choose');" type="checkbox" <?PHP echo $listening?>><label for="testinterestsarray[]9">Listening to music</label><br>
<input name="interestsarray[]" value="Mehendi Designing" id="testinterestsarray[]10" onclick="radio_uncheck('interests_choose');" type="checkbox" <?PHP echo $mehendi?>><label for="testinterestsarray[]10">Mehendi Designing</label><br>
 </td>
 <td class="smallblack">
<input name="interestsarray[]" value="Movies" id="testinterestsarray[]11" onclick="radio_uncheck('interests_choose');" type="checkbox" <?PHP echo $movies?>><label for="testinterestsarray[]11">Movies</label><br>
<input name="interestsarray[]" value="Museums / Galleries / Exhibitions" id="testinterestsarray[]12" onclick="radio_uncheck('interests_choose');" type="checkbox" <?PHP echo $museums?>><label for="testinterestsarray[]12">Museums / Galleries / Exhibitions</label><br>
<input name="interestsarray[]" value="Nature" id="testinterestsarray[]13" onclick="radio_uncheck('interests_choose');" type="checkbox" <?PHP echo $nature?>><label for="testinterestsarray[]13">Nature</label><br>
<input name="interestsarray[]" value="Net surfing" id="testinterestsarray[]14" onclick="radio_uncheck('interests_choose');" type="checkbox" <?PHP echo $net?>><label for="testinterestsarray[]14">Net surfing</label><br>
<input name="interestsarray[]" value="Pets" id="testinterestsarray[]15" onclick="radio_uncheck('interests_choose');" type="checkbox" <?PHP echo $pets?>><label for="testinterestsarray[]15">Pets</label><br>
<input name="interestsarray[]" value="Politics" id="testinterestsarray[]16" onclick="radio_uncheck('interests_choose');" type="checkbox" <?PHP echo $politics?>><label for="testinterestsarray[]16">Politics</label><br>
<input name="interestsarray[]" value="Reading / Book clubs" id="testinterestsarray[]17" onclick="radio_uncheck('interests_choose');" type="checkbox" <?PHP echo $reading?>><label for="testinterestsarray[]17">Reading / Book clubs</label><br>
<input name="interestsarray[]" value="Religion" id="testinterestsarray[]18" onclick="radio_uncheck('interests_choose');" type="checkbox" <?PHP echo $religion?>><label for="testinterestsarray[]18">Religion</label><br>
<input name="interestsarray[]" value="Shopping" id="testinterestsarray[]19" onclick="radio_uncheck('interests_choose');" type="checkbox" <?PHP echo $shopping?>><label for="testinterestsarray[]19">Shopping</label><br>
<input name="interestsarray[]" value="Sports - Indoor" id="testinterestsarray[]20" onclick="radio_uncheck('interests_choose');" type="checkbox" <?PHP echo $sportsindoor?>><label for="testinterestsarray[]20">Sports - Indoor</label><br>
<input name="interestsarray[]" value="Sports - Outdoor" id="testinterestsarray[]21" onclick="radio_uncheck('interests_choose');" type="checkbox" <?PHP echo $sportsoutdoor?>><label for="testinterestsarray[]21">Sports - Outdoor</label><br>
 </td>
 <td class="smallblack">
<input name="interestsarray[]" value="Stitching" id="testinterestsarray[]22" onclick="radio_uncheck('interests_choose');" type="checkbox" <?PHP echo $stitching?>><label for="testinterestsarray[]22">Stitching</label><br>
<input name="interestsarray[]" value="Technology" id="testinterestsarray[]23" onclick="radio_uncheck('interests_choose');" type="checkbox" <?PHP echo $technology?>><label for="testinterestsarray[]23">Technology</label><br>
<input name="interestsarray[]" value="Theatre" id="testinterestsarray[]24" onclick="radio_uncheck('interests_choose');" type="checkbox" <?PHP echo $theatre?>><label for="testinterestsarray[]24">Theatre</label><br>
<input name="interestsarray[]" value="Travel / Sightseeing" id="testinterestsarray[]25" onclick="radio_uncheck('interests_choose');" type="checkbox" <?PHP echo $travel?>><label for="testinterestsarray[]25">Travel / Sightseeing</label><br>
<input name="interestsarray[]" value="Trekking / Adventure sports" id="testinterestsarray[]26" onclick="radio_uncheck('interests_choose');" type="checkbox" <?PHP echo $trekking?>><label for="testinterestsarray[]26">Trekking / Adventure sports</label><br>
<input name="interestsarray[]" value="Video / Computer games" id="testinterestsarray[]27" onclick="radio_uncheck('interests_choose');" type="checkbox" <?PHP echo $video?>><label for="testinterestsarray[]27">Video / Computer games</label><br>
<input name="interestsarray[]" value="Volunteering / Social Service" id="testinterestsarray[]28" onclick="radio_uncheck('interests_choose');" type="checkbox" <?PHP echo $volunteering?>><label for="testinterestsarray[]28">Volunteering / Social Service</label><br>
<input name="interestsarray[]" value="Watching television" id="testinterestsarray[]29" onclick="radio_uncheck('interests_choose');" type="checkbox" <?PHP echo $watching?>><label for="testinterestsarray[]29">Watching television</label><br>
<input name="interestsarray[]" value="Wine tasting" id="testinterestsarray[]30" onclick="radio_uncheck('interests_choose');" type="checkbox" <?PHP echo $wine?>><label for="testinterestsarray[]30">Wine tasting</label><br>
<input name="interestsarray[]" value="Writing" id="testinterestsarray[]31" onclick="radio_uncheck('interests_choose');" type="checkbox" <?PHP echo $writing?>><label for="testinterestsarray[]31">Writing</label><br>
<input name="interestsarray[]" value="Yoga / Meditation" id="testinterestsarray[]32" onclick="radio_uncheck('interests_choose');" type="checkbox" <?PHP echo $yoga?>><label for="testinterestsarray[]32">Yoga / Meditation</label><br>
			</td>
		</tr>

 <tr height="21">
  <td class="smallblack"><input name="interests_choose" id="interests_choose0" value="Will tell you later" onclick="radio_check(this,'interestsarray[]');"  type="radio" <?PHP echo $interestschoose?>><label for="interests_choose0">Will tell you later</label></td>
<td colspan="2">&nbsp;</td>
 </tr></tbody></table>
<?PHP
$hobbies = explode("|",$row['FavoriteMusic']);
$x = 0;
$willtellyoulater = "";
for($x=0; $x < count($hobbies); $x++)
{
	if ($hobbies[$x]=="Acid Rock / Hard Rock")
	{
		$acidrock=" checked";
	}
	else if($hobbies[$x]=="Alternative Music")
	{
		$alternativemusic=" checked";
	}
	else if($hobbies[$x]=="Bhajans / Devotional")
	{
		$bhajans=" checked";
	}
	else if($hobbies[$x]=="Bhangra")
	{
		$bhangra=" checked";
	}
	else if($hobbies[$x]=="Blues")
	{
		$blues=" checked";
	}
	else if($hobbies[$x]=="Christian / Gospel / Blue Grass")
	{
		$christian=" checked";
	}
	else if($hobbies[$x]=="Classical - Carnatic")
	{
		$classicalcarnatic=" checked";
	}
	else if($hobbies[$x]=="Classical - Hindustani")
	{
		$classicalhindustani=" checked";
	}
	else if($hobbies[$x]=="Classical &#8211; Opera")
	{
		$classicalopera=" checked";
	}
	else if($hobbies[$x]=="Classical - Western")
	{
		$classicalwestern=" checked";
	}
	else if($hobbies[$x]=="Mehendi Designing")
	{
		$mehendi=" checked";
	}
	else if($hobbies[$x]=="Country Music")
	{
		$countrymusic=" checked";
	}
	else if($hobbies[$x]=="Disco")
	{
		$disco=" checked";
	}
	else if($hobbies[$x]=="Folk")
	{
		$folk=" checked";
	}
	else if($hobbies[$x]=="Ghazals")
	{
		$ghazals=" checked";
	}
	else if($hobbies[$x]=="Heavy Metal")
	{
		$heavymetal=" checked";
	}
	else if($hobbies[$x]=="Hip-Hop")
	{
		$hiphop=" checked";
	}
	else if($hobbies[$x]=="House Music")
	{
		$housemusic=" checked";
	}
	else if($hobbies[$x]=="Indipop")
	{
		$indipop=" checked";
	}
	else if($hobbies[$x]=="Instrumental - Indian")
	{
		$instrumentalindian=" checked";
	}
	else if($hobbies[$x]=="Instrumental - Western")
	{
		$instrumentalwestern=" checked";
	}
	else if($hobbies[$x]=="Jazz")
	{
		$jazz=" checked";
	}
	else if($hobbies[$x]=="Latest film songs")
	{
		$latestfilmsongs=" checked";
	}
	else if($hobbies[$x]=="Latin Music")
	{
		$latinmusic=" checked";
	}
	else if($hobbies[$x]=="New Age Music")
	{
		$newagemusic=" checked";
	}
	else if($hobbies[$x]=="Old film songs")
	{
		$oldfilmsongs=" checked";
	}
	else if($hobbies[$x]=="Pop")
	{
		$pop=" checked";
	}
	else if($hobbies[$x]=="Qawalis")
	{
		$qawalis=" checked";
	}
	else if($hobbies[$x]=="R&amp;B / Soul")
	{
		$soul=" checked";
	}
	else if($hobbies[$x]=="Rap")
	{
		$rap=" checked";
	}
	else if($hobbies[$x]=="Reggae")
	{
		$reggae=" checked";
	}
	else if($hobbies[$x]=="Remixes")
	{
		$remixes=" checked";
	}
	else if($hobbies[$x]=="Soft Rock")
	{
		$softrock=" checked";
	}
	else if($hobbies[$x]=="Sufi music")
	{
		$sufimusic=" checked";
	}
	else if($hobbies[$x]=="Techno / Trance")
	{
		$techno=" checked";
	}
	else if($hobbies[$x]=="Western Country Music")
	{
		$westernmusic=" checked";
	}
	else if($hobbies[$x]=="World Music")
	{
		$worldmusic=" checked";
	}
	else if($hobbies[$x]=="Enjoy most forms of music")
	{
		$enjoymostforms=" checked";
	}
	else if($hobbies[$x]=="Not too keen on music")
	{
		$nottookeen=" checked";
	}
	else if($hobbies[$x]=="Will tell you later")
	{
		$willtellyoulater=" checked";
	}
}
?>
	<a name="Favoritemusic"></a>
	<div class="largewhitebold bluepatch" style="width:500px; color:#990000;"><b>Favorite music</b></div>
	<table class="tbl1" border="0" cellpadding="0" cellspacing="0" style="width:500px;">
	<!-- <tr height="2"><td class="td1"></td><td class="td2"></td><td class="td3"></td></tr> -->
	<tbody><tr height="21" valign="top">
		<td class="smallblack">
<input name="favourite_musicarray[]" value="Acid Rock / Hard Rock" id="testfavourite_musicarray[]0" onclick="radio_uncheck('favourite_music_choose');" type="checkbox" <?PHP echo $acidrock?>><label for="testfavourite_musicarray[]0">Acid Rock / Hard Rock</label><br>
<input name="favourite_musicarray[]" value="Alternative Music" id="testfavourite_musicarray[]1" onclick="radio_uncheck('favourite_music_choose');" type="checkbox" <?PHP echo $alternativemusic?>><label for="testfavourite_musicarray[]1">Alternative Music</label><br>
<input name="favourite_musicarray[]" value="Bhajans / Devotional" id="testfavourite_musicarray[]2" onclick="radio_uncheck('favourite_music_choose');" type="checkbox" <?PHP echo $bhajans?>><label for="testfavourite_musicarray[]2">Bhajans / Devotional</label><br>
<input name="favourite_musicarray[]" value="Bhangra" id="testfavourite_musicarray[]3" onclick="radio_uncheck('favourite_music_choose');" type="checkbox" <?PHP echo $bhangra?>><label for="testfavourite_musicarray[]3">Bhangra</label><br>
<input name="favourite_musicarray[]" value="Blues" id="testfavourite_musicarray[]4" onclick="radio_uncheck('favourite_music_choose');" type="checkbox" <?PHP echo $blues?>><label for="testfavourite_musicarray[]4">Blues</label><br>
<input name="favourite_musicarray[]" value="Christian / Gospel / Blue Grass" id="testfavourite_musicarray[]5" onclick="radio_uncheck('favourite_music_choose');" type="checkbox" <?PHP echo $christian?>><label for="testfavourite_musicarray[]5">Christian / Gospel / Blue Grass</label><br>
<input name="favourite_musicarray[]" value="Classical - Carnatic" id="testfavourite_musicarray[]6" onclick="radio_uncheck('favourite_music_choose');" type="checkbox" <?PHP echo $classicalcarnatic?>><label for="testfavourite_musicarray[]6">Classical - Carnatic</label><br>
<input name="favourite_musicarray[]" value="Classical - Hindustani" id="testfavourite_musicarray[]7" onclick="radio_uncheck('favourite_music_choose');" type="checkbox" <?PHP echo $classicalhindustani?>><label for="testfavourite_musicarray[]7">Classical - Hindustani</label><br>
<input name="favourite_musicarray[]" value="Classical &#8211; Opera" id="testfavourite_musicarray[]8" onclick="radio_uncheck('favourite_music_choose');" type="checkbox" <?PHP echo $classicalopera?>><label for="testfavourite_musicarray[]8">Classical &#8211; Opera</label><br>
<input name="favourite_musicarray[]" value="Classical - Western" id="testfavourite_musicarray[]9" onclick="radio_uncheck('favourite_music_choose');" type="checkbox" <?PHP echo $classicalwestern?>><label for="testfavourite_musicarray[]9">Classical - Western</label><br>
<input name="favourite_musicarray[]" value="Country Music" id="testfavourite_musicarray[]10" onclick="radio_uncheck('favourite_music_choose');" type="checkbox" <?PHP echo $countrymusic?>><label for="testfavourite_musicarray[]10">Country Music</label><br>
<input name="favourite_musicarray[]" value="Disco" id="testfavourite_musicarray[]11" onclick="radio_uncheck('favourite_music_choose');" type="checkbox" <?PHP echo $disco?>><label for="testfavourite_musicarray[]11">Disco</label><br>
 </td>
 <td class="smallblack">
<input name="favourite_musicarray[]" value="Folk" id="testfavourite_musicarray[]12" onclick="radio_uncheck('favourite_music_choose');" type="checkbox" <?PHP echo $folk?>><label for="testfavourite_musicarray[]12">Folk</label><br>
<input name="favourite_musicarray[]" value="Ghazals" id="testfavourite_musicarray[]13" onclick="radio_uncheck('favourite_music_choose');" type="checkbox" <?PHP echo $ghazals?>><label for="testfavourite_musicarray[]13">Ghazals</label><br>
<input name="favourite_musicarray[]" value="Heavy Metal" id="testfavourite_musicarray[]14" onclick="radio_uncheck('favourite_music_choose');" type="checkbox" <?PHP echo $heavymetal?>><label for="testfavourite_musicarray[]14">Heavy Metal</label><br>
<input name="favourite_musicarray[]" value="Hip-Hop" id="testfavourite_musicarray[]15" onclick="radio_uncheck('favourite_music_choose');" type="checkbox" <?PHP echo $hiphop?>><label for="testfavourite_musicarray[]15">Hip-Hop</label><br>
<input name="favourite_musicarray[]" value="House Music" id="testfavourite_musicarray[]16" onclick="radio_uncheck('favourite_music_choose');" type="checkbox" <?PHP echo $housemusic?>><label for="testfavourite_musicarray[]16">House Music</label><br>
<input name="favourite_musicarray[]" value="Indipop" id="testfavourite_musicarray[]17" onclick="radio_uncheck('favourite_music_choose');" type="checkbox" <?PHP echo $indipop?>><label for="testfavourite_musicarray[]17">Indipop</label><br>
<input name="favourite_musicarray[]" value="Instrumental - Indian" id="testfavourite_musicarray[]18" onclick="radio_uncheck('favourite_music_choose');" type="checkbox" <?PHP echo $instrumentalindian?>><label for="testfavourite_musicarray[]18">Instrumental - Indian</label><br>
<input name="favourite_musicarray[]" value="Instrumental - Western" id="testfavourite_musicarray[]19" onclick="radio_uncheck('favourite_music_choose');" type="checkbox" <?PHP echo $instrumentalwestern?>><label for="testfavourite_musicarray[]19">Instrumental - Western</label><br>
<input name="favourite_musicarray[]" value="Jazz" id="testfavourite_musicarray[]20" onclick="radio_uncheck('favourite_music_choose');" type="checkbox" <?PHP echo $jazz?>><label for="testfavourite_musicarray[]20">Jazz</label><br>
<input name="favourite_musicarray[]" value="Latest film songs" id="testfavourite_musicarray[]21" onclick="radio_uncheck('favourite_music_choose');" type="checkbox" <?PHP echo $latestfilmsongs?>><label for="testfavourite_musicarray[]21">Latest film songs</label><br>
<input name="favourite_musicarray[]" value="Latin Music" id="testfavourite_musicarray[]22" onclick="radio_uncheck('favourite_music_choose');" type="checkbox" <?PHP echo $latinmusic?>><label for="testfavourite_musicarray[]22">Latin Music</label><br>
<input name="favourite_musicarray[]" value="New Age Music" id="testfavourite_musicarray[]23" onclick="radio_uncheck('favourite_music_choose');" type="checkbox" <?PHP echo $newagemusic?>><label for="testfavourite_musicarray[]23">New Age Music</label><br>
 </td>
 <td class="smallblack">
<input name="favourite_musicarray[]" value="Old film songs" id="testfavourite_musicarray[]24" onclick="radio_uncheck('favourite_music_choose');" type="checkbox" <?PHP echo $oldfilmsongs?>><label for="testfavourite_musicarray[]24">Old film songs</label><br>
<input name="favourite_musicarray[]" value="Pop" id="testfavourite_musicarray[]25" onclick="radio_uncheck('favourite_music_choose');" type="checkbox" <?PHP echo $pop?>><label for="testfavourite_musicarray[]25">Pop</label><br>
<input name="favourite_musicarray[]" value="Qawalis" id="testfavourite_musicarray[]26" onclick="radio_uncheck('favourite_music_choose');" type="checkbox" <?PHP echo $qawalis?>><label for="testfavourite_musicarray[]26">Qawalis</label><br>
<input name="favourite_musicarray[]" value="R&amp;B / Soul" id="testfavourite_musicarray[]27" onclick="radio_uncheck('favourite_music_choose');" type="checkbox" <?PHP echo $soul?>><label for="testfavourite_musicarray[]27">R&amp;B / Soul</label><br>
<input name="favourite_musicarray[]" value="Rap" id="testfavourite_musicarray[]28" onclick="radio_uncheck('favourite_music_choose');" type="checkbox" <?PHP echo $rap?>><label for="testfavourite_musicarray[]28">Rap</label><br>
<input name="favourite_musicarray[]" value="Reggae" id="testfavourite_musicarray[]29" onclick="radio_uncheck('favourite_music_choose');" type="checkbox" <?PHP echo $reggae?>><label for="testfavourite_musicarray[]29">Reggae</label><br>
<input name="favourite_musicarray[]" value="Remixes" id="testfavourite_musicarray[]30" onclick="radio_uncheck('favourite_music_choose');" type="checkbox" <?PHP echo $remixes?>><label for="testfavourite_musicarray[]30">Remixes</label><br>
<input name="favourite_musicarray[]" value="Soft Rock" id="testfavourite_musicarray[]31" onclick="radio_uncheck('favourite_music_choose');" type="checkbox" <?PHP echo $softrock?>><label for="testfavourite_musicarray[]31">Soft Rock</label><br>
<input name="favourite_musicarray[]" value="Sufi music" id="testfavourite_musicarray[]32" onclick="radio_uncheck('favourite_music_choose');" type="checkbox" <?PHP echo $sufimusic?>><label for="testfavourite_musicarray[]32">Sufi music</label><br>
<input name="favourite_musicarray[]" value="Techno / Trance" id="testfavourite_musicarray[]33" onclick="radio_uncheck('favourite_music_choose');" type="checkbox" <?PHP echo $techno?>><label for="testfavourite_musicarray[]33">Techno / Trance</label><br>
<input name="favourite_musicarray[]" value="Western Country Music" id="testfavourite_musicarray[]34" onclick="radio_uncheck('favourite_music_choose');" type="checkbox" <?PHP echo $westernmusic?>><label for="testfavourite_musicarray[]34">Western Country Music</label><br>
<input name="favourite_musicarray[]" value="World Music" id="testfavourite_musicarray[]35" onclick="radio_uncheck('favourite_music_choose');" type="checkbox" <?PHP echo $worldmusic?>><label for="testfavourite_musicarray[]35">World Music</label><br>
			</td>
		</tr>

 <tr height="21">
  <td class="smallblack"><input name="favourite_music_choose" id="favourite_music_choose0" value="Enjoy most forms of music" onclick="radio_check(this,'favourite_musicarray[]');" type="radio" <?PHP echo $enjoymostforms?>><label for="favourite_music_choose0">Enjoy most forms of music</label></td>
  <td class="smallblack"><input name="favourite_music_choose" id="favourite_music_choose1" value="Not too keen on music" onclick="radio_check(this,'favourite_musicarray[]');" type="radio" <?PHP echo $nottookeen?>><label for="favourite_music_choose1">Not too keen on music</label></td>
  <td class="smallblack"><input name="favourite_music_choose" id="favourite_music_choose2" value="Will tell you later" onclick="radio_check(this,'favourite_musicarray[]');"  type="radio" <?PHP echo $willtellyoulater?>><label for="favourite_music_choose2">Will tell you later</label></td>
 </tr></tbody></table>

	<a name="Favoritereads"></a>
	<div class="largewhitebold bluepatch" style="width:500px; color:#990000;"><b>Favorite reads</b></div>
<?PHP
$hobbies = explode("|",$row['FavoriteReads']);
$x = 0;
$willtellyoulater = "";
for($x=0; $x < count($hobbies); $x++)
{
	if ($hobbies[$x]=="Biographies")
	{
		$biographies=" checked";
	}
	else if($hobbies[$x]=="Business / Occupational")
	{
		$businessoccupational=" checked";
	}
	else if($hobbies[$x]=="Classic literature")
	{
		$classicliterature=" checked";
	}
	else if($hobbies[$x]=="Comics")
	{
		$comics=" checked";
	}
	else if($hobbies[$x]=="Fantasy")
	{
		$fantasy=" checked";
	}
	else if($hobbies[$x]=="History")
	{
		$history=" checked";
	}
	else if($hobbies[$x]=="Humour")
	{
		$humour=" checked";
	}
	else if($hobbies[$x]=="Magazines &amp; Newspapers")
	{
		$magazines=" checked";
	}
	else if($hobbies[$x]=="Philosophy / Spiritual")
	{
		$philosophy=" checked";
	}
	else if($hobbies[$x]=="Poetry")
	{
		$poetry=" checked";
	}
	else if($hobbies[$x]=="Romance")
	{
		$romance=" checked";
	}
	else if($hobbies[$x]=="Science Fiction")
	{
		$sciencefiction=" checked";
	}
	else if($hobbies[$x]=="Self-help")
	{
		$selfhelp=" checked";
	}
	else if($hobbies[$x]=="Short stories")
	{
		$shortstories=" checked";
	}
	else if($hobbies[$x]=="Thriller / Suspense")
	{
		$thriller=" checked";
	}
	else if($hobbies[$x]=="Love reading almost anything")
	{
		$lovereading=" checked";
	}
	else if($hobbies[$x]=="Not much of a reader")
	{
		$notmuch=" checked";
	}
	else if($hobbies[$x]=="Will tell you later")
	{
		$willtellyoulater=" checked";
	}
}
?>
	<table class="tbl1" border="0" cellpadding="0" cellspacing="0" style="width:500px;">
	<tbody><tr height="21" valign="top">
		<td class="smallblack">
<input name="favourite_readsarray[]" value="Biographies" id="testfavourite_readsarray[]0" onclick="radio_uncheck('favourite_reads_choose');" type="checkbox" <?PHP echo $biographies?>><label for="testfavourite_readsarray[]0">Biographies</label><br>
<input name="favourite_readsarray[]" value="Business / Occupational" id="testfavourite_readsarray[]1" onclick="radio_uncheck('favourite_reads_choose');" type="checkbox" <?PHP echo $businessoccupational?>><label for="testfavourite_readsarray[]1">Business / Occupational</label><br>
<input name="favourite_readsarray[]" value="Classic literature" id="testfavourite_readsarray[]2" onclick="radio_uncheck('favourite_reads_choose');" type="checkbox" <?PHP echo $classicliterature?>><label for="testfavourite_readsarray[]2">Classic literature</label><br>
<input name="favourite_readsarray[]" value="Comics" id="testfavourite_readsarray[]3" onclick="radio_uncheck('favourite_reads_choose');" type="checkbox" <?PHP echo $comics?>><label for="testfavourite_readsarray[]3">Comics</label><br>
<input name="favourite_readsarray[]" value="Fantasy" id="testfavourite_readsarray[]4" onclick="radio_uncheck('favourite_reads_choose');" type="checkbox" <?PHP echo $fantasy?>><label for="testfavourite_readsarray[]4">Fantasy</label><br>
 </td>
 <td class="smallblack">
<input name="favourite_readsarray[]" value="History" id="testfavourite_readsarray[]5" onclick="radio_uncheck('favourite_reads_choose');" type="checkbox" <?PHP echo $history?>><label for="testfavourite_readsarray[]5">History</label><br>
<input name="favourite_readsarray[]" value="Humour" id="testfavourite_readsarray[]6" onclick="radio_uncheck('favourite_reads_choose');" type="checkbox" <?PHP echo $humour?>><label for="testfavourite_readsarray[]6">Humour</label><br>
<input name="favourite_readsarray[]" value="Magazines &amp; Newspapers" id="testfavourite_readsarray[]7" onclick="radio_uncheck('favourite_reads_choose');" type="checkbox" <?PHP echo $magazines?>><label for="testfavourite_readsarray[]7">Magazines &amp; Newspapers</label><br>
<input name="favourite_readsarray[]" value="Philosophy / Spiritual" id="testfavourite_readsarray[]8" onclick="radio_uncheck('favourite_reads_choose');" type="checkbox" <?PHP echo $philosophy?>><label for="testfavourite_readsarray[]8">Philosophy / Spiritual</label><br>
<input name="favourite_readsarray[]" value="Poetry" id="testfavourite_readsarray[]9" onclick="radio_uncheck('favourite_reads_choose');" type="checkbox" <?PHP echo $poetry?>><label for="testfavourite_readsarray[]9">Poetry</label><br>
 </td>
 <td class="smallblack">
<input name="favourite_readsarray[]" value="Romance" id="testfavourite_readsarray[]10" onclick="radio_uncheck('favourite_reads_choose');" type="checkbox" <?PHP echo $romance?>><label for="testfavourite_readsarray[]10">Romance</label><br>
<input name="favourite_readsarray[]" value="Science Fiction" id="testfavourite_readsarray[]11" onclick="radio_uncheck('favourite_reads_choose');" type="checkbox" <?PHP echo $sciencefiction?>><label for="testfavourite_readsarray[]11">Science Fiction</label><br>
<input name="favourite_readsarray[]" value="Self-help" id="testfavourite_readsarray[]12" onclick="radio_uncheck('favourite_reads_choose');" type="checkbox" <?PHP echo $selfhelp?>><label for="testfavourite_readsarray[]12">Self-help</label><br>
<input name="favourite_readsarray[]" value="Short stories" id="testfavourite_readsarray[]13" onclick="radio_uncheck('favourite_reads_choose');" type="checkbox" <?PHP echo $shortstories?>><label for="testfavourite_readsarray[]13">Short stories</label><br>
<input name="favourite_readsarray[]" value="Thriller / Suspense" id="testfavourite_readsarray[]14" onclick="radio_uncheck('favourite_reads_choose');" type="checkbox" <?PHP echo $thriller?>><label for="testfavourite_readsarray[]14">Thriller / Suspense</label><br>
			</td>
		</tr>

 <tr height="21">
  <td class="smallblack"><input name="favourite_reads_choose" id="favourite_reads_choose0" value="Love reading almost anything" onclick="radio_check(this,'favourite_readsarray[]');" type="radio" <?PHP echo $lovereading?>><label for="favourite_reads_choose0">Love reading almost anything</label></td>
  <td class="smallblack"><input name="favourite_reads_choose" id="favourite_reads_choose1" value="Not much of a reader" onclick="radio_check(this,'favourite_readsarray[]');" type="radio" <?PHP echo $notmuch?>><label for="favourite_reads_choose1">Not much of a reader</label></td>
  <td class="smallblack"><input name="favourite_reads_choose" id="favourite_reads_choose2" value="Will tell you later" onclick="radio_check(this,'favourite_readsarray[]');"  type="radio" <?PHP echo $willtellyoulater?>><label for="favourite_reads_choose2">Will tell you later</label></td>
 </tr></tbody></table>

	<a name="PreferredMovies"></a>
	<div class="largewhitebold bluepatch" style="width:500px; color:#990000;"><b>Preferred Movies</b></div>

	<table class="tbl1" border="0" cellpadding="0" cellspacing="0" style="width:500px;">
<?PHP
$hobbies = explode("|",$row['PreferredMovies']);
$x = 0;
$willtellyoulater = "";
for($x=0; $x < count($hobbies); $x++)
{
	if ($hobbies[$x]=="Action / Suspense")
	{
		$auctionsuspense=" checked";
	}
	else if($hobbies[$x]=="Classics")
	{
		$classics=" checked";
	}
	else if($hobbies[$x]=="Comedy")
	{
		$comedy=" checked";
	}
	else if($hobbies[$x]=="Documentaries")
	{
		$documentaries=" checked";
	}
	else if($hobbies[$x]=="Drama")
	{
		$drama=" checked";
	}
	else if($hobbies[$x]=="Epics")
	{
		$epics=" checked";
	}
	else if($hobbies[$x]=="Horror")
	{
		$horror=" checked";
	}
	else if($hobbies[$x]=="Non-commercial / Art")
	{
		$noncommercialart=" checked";
	}
	else if($hobbies[$x]=="Romantic")
	{
		$romantic=" checked";
	}
	else if($hobbies[$x]=="Sci-Fi &amp; Fantasy")
	{
		$scififantasy=" checked";
	}
	else if($hobbies[$x]=="Short films")
	{
		$shortfilms=" checked";
	}
	else if($hobbies[$x]=="World cinema")
	{
		$worldcinema=" checked";
	}
	else if($hobbies[$x]=="Love all kinds of movies")
	{
		$loveallkindsofmovies=" checked";
	}
	else if($hobbies[$x]=="Not a movie buff")
	{
		$notamoviebuff=" checked";
	}
	else if($hobbies[$x]=="Will tell you later")
	{
		$willtellyoulater=" checked";
	}
}
?>
	<tbody><tr height="21" valign="top">
		<td class="smallblack">
<input name="preferred_moviesarray[]" value="Action / Suspense" id="testpreferred_moviesarray[]0" onclick="radio_uncheck('preferred_movies_choose');" type="checkbox" <?PHP echo $actionsuspense?>><label for="testpreferred_moviesarray[]0">Action / Suspense</label><br>
<input name="preferred_moviesarray[]" value="Classics" id="testpreferred_moviesarray[]1" onclick="radio_uncheck('preferred_movies_choose');" type="checkbox" <?PHP echo $classics?>><label for="testpreferred_moviesarray[]1">Classics</label><br>
<input name="preferred_moviesarray[]" value="Comedy" id="testpreferred_moviesarray[]2" onclick="radio_uncheck('preferred_movies_choose');" type="checkbox" <?PHP echo $comedy?>><label for="testpreferred_moviesarray[]2">Comedy</label><br>
<input name="preferred_moviesarray[]" value="Documentaries" id="testpreferred_moviesarray[]3" onclick="radio_uncheck('preferred_movies_choose');" type="checkbox" <?PHP echo $documentaries?>><label for="testpreferred_moviesarray[]3">Documentaries</label><br>
 </td>
 <td class="smallblack">
<input name="preferred_moviesarray[]" value="Drama" id="testpreferred_moviesarray[]4" onclick="radio_uncheck('preferred_movies_choose');" type="checkbox" <?PHP echo $drama?>><label for="testpreferred_moviesarray[]4">Drama</label><br>
<input name="preferred_moviesarray[]" value="Epics" id="testpreferred_moviesarray[]5" onclick="radio_uncheck('preferred_movies_choose');" type="checkbox" <?PHP echo $epics?>><label for="testpreferred_moviesarray[]5">Epics</label><br>
<input name="preferred_moviesarray[]" value="Horror" id="testpreferred_moviesarray[]6" onclick="radio_uncheck('preferred_movies_choose');" type="checkbox" <?PHP echo $horror?>><label for="testpreferred_moviesarray[]6">Horror</label><br>
<input name="preferred_moviesarray[]" value="Non-commercial / Art" id="testpreferred_moviesarray[]7" onclick="radio_uncheck('preferred_movies_choose');" type="checkbox" <?PHP echo $noncommercialart?>><label for="testpreferred_moviesarray[]7">Non-commercial / Art</label><br>
 </td>
 <td class="smallblack">
<input name="preferred_moviesarray[]" value="Romantic" id="testpreferred_moviesarray[]8" onclick="radio_uncheck('preferred_movies_choose');" type="checkbox" <?PHP echo $romantic?>><label for="testpreferred_moviesarray[]8">Romantic</label><br>
<input name="preferred_moviesarray[]" value="Sci-Fi &amp; Fantasy" id="testpreferred_moviesarray[]9" onclick="radio_uncheck('preferred_movies_choose');" type="checkbox" <?PHP echo $scififantasy?>><label for="testpreferred_moviesarray[]9">Sci-Fi &amp; Fantasy</label><br>
<input name="preferred_moviesarray[]" value="Short films" id="testpreferred_moviesarray[]10" onclick="radio_uncheck('preferred_movies_choose');" type="checkbox" <?PHP echo $shortfilms?>><label for="testpreferred_moviesarray[]10">Short films</label><br>
<input name="preferred_moviesarray[]" value="World cinema" id="testpreferred_moviesarray[]11" onclick="radio_uncheck('preferred_movies_choose');" type="checkbox" <?PHP echo $worldcinema?>><label for="testpreferred_moviesarray[]11">World cinema</label><br>
			</td>
		</tr>

 <tr height="21">
  <td class="smallblack"><input name="preferred_movies_choose" id="preferred_movies_choose0" value="Love all kinds of movies" onclick="radio_check(this,'preferred_moviesarray[]');" type="radio" <?PHP echo $loveallkindsofmovies?>><label for="preferred_movies_choose0">Love all kinds of movies</label></td>
  <td class="smallblack"><input name="preferred_movies_choose" id="preferred_movies_choose1" value="Not a movie buff" onclick="radio_check(this,'preferred_moviesarray[]');" type="radio" <?PHP echo $notamoviebuff?>><label for="preferred_movies_choose1">Not a movie buff</label></td>
  <td class="smallblack"><input name="preferred_movies_choose" id="preferred_movies_choose2" value="Will tell you later" onclick="radio_check(this,'preferred_moviesarray[]');"  type="radio" <?PHP echo $willtellyoulater?>><label for="preferred_movies_choose2">Will tell you later</label></td>
 </tr></tbody></table>

	<a name="Sportsfitnessactivities"></a>
	<div class="largewhitebold bluepatch" style="width:500px; color:#990000;"><b>Sports / fitness activities</b></div>

	<table class="tbl1" border="0" cellpadding="0" cellspacing="0" style="width:500px;">
<?PHP
$hobbies = explode("|",$row['Sports']);
$x = 0;
$willtellyoulater = "";
for($x=0; $x < count($hobbies); $x++)
{
	if ($hobbies[$x]=="Aerobics")
	{
		$aerobics=" checked";
	}
	else if($hobbies[$x]=="Athletics")
	{
		$athletics=" checked";
	}
	else if($hobbies[$x]=="Badminton")
	{
		$badminton=" checked";
	}
	else if($hobbies[$x]=="Baseball")
	{
		$baseball=" checked";
	}
	else if($hobbies[$x]=="Basketball")
	{
		$basketball=" checked";
	}
	else if($hobbies[$x]=="Billiards / Snooker / Pool")
	{
		$billiardssnookerpool=" checked";
	}
	else if($hobbies[$x]=="Bowling")
	{
		$bowling=" checked";
	}
	else if($hobbies[$x]=="Boxing / Wrestling")
	{
		$boxingwrestling=" checked";
	}
	else if($hobbies[$x]=="Card games")
	{
		$cardgames=" checked";
	}
	else if($hobbies[$x]=="Carrom")
	{
		$carrom=" checked";
	}
	else if($hobbies[$x]=="Chess")
	{
		$chess=" checked";
	}
	else if($hobbies[$x]=="Cricket")
	{
		$cricket=" checked";
	}
	else if($hobbies[$x]=="Cycling")
	{
		$cycling=" checked";
	}
	else if($hobbies[$x]=="Football / Soccer")
	{
		$footballsoccer=" checked";
	}
	else if($hobbies[$x]=="Golf")
	{
		$golf=" checked";
	}
	else if($hobbies[$x]=="Gym workouts / Weight training")
	{
		$gymworkoutsweighttraining=" checked";
	}
	else if($hobbies[$x]=="Hockey")
	{
		$hockey=" checked";
	}
	else if($hobbies[$x]=="Horseback Riding")
	{
		$horsebackriding=" checked";
	}
	else if($hobbies[$x]=="Jogging / Walking / Running")
	{
		$joggingwalkingrunning=" checked";
	}
	else if($hobbies[$x]=="Martial Arts")
	{
		$martialarts=" checked";
	}
	else if($hobbies[$x]=="Motor Racing")
	{
		$motorracing=" checked";
	}
	else if($hobbies[$x]=="Polo")
	{
		$polo=" checked";
	}
	else if($hobbies[$x]=="Rugby")
	{
		$rugby=" checked";
	}
	else if($hobbies[$x]=="Sailing / Boating / Rowing")
	{
		$sailingboatingrowing=" checked";
	}
	else if($hobbies[$x]=="Scrabble")
	{
		$scrabble=" checked";
	}
	else if($hobbies[$x]=="Scuba Diving")
	{
		$scubadiving=" checked";
	}
	else if($hobbies[$x]=="Shooting")
	{
		$shooting=" checked";
	}
	else if($hobbies[$x]=="Skating / Snowboarding / Skiing")
	{
		$skatingsnowboardingskiing=" checked";
	}
	else if($hobbies[$x]=="Squash")
	{
		$squash=" checked";
	}
	else if($hobbies[$x]=="Swimming / Water sports")
	{
		$swimmingwatersports=" checked";
	}
	else if($hobbies[$x]=="Table-tennis")
	{
		$tabletennis=" checked";
	}
	else if($hobbies[$x]=="Tennis")
	{
		$tennis=" checked";
	}
	else if($hobbies[$x]=="Trekking / Adventure sports")
	{
		$trekkingadventuresports=" checked";
	}
	else if($hobbies[$x]=="Volleyball")
	{
		$volleyball=" checked";
	}
	else if($hobbies[$x]=="Weight training")
	{
		$weighttraining=" checked";
	}
	else if($hobbies[$x]=="Winter / Rink sports")
	{
		$winterrinksports=" checked";
	}
	else if($hobbies[$x]=="Yoga / Meditation")
	{
		$yogameditation=" checked";
	}
	else if($hobbies[$x]=="Not a sportsperson")
	{
		$notasportsperson=" checked";
	}
	else if($hobbies[$x]=="Will tell you later")
	{
		$willtellyoulater=" checked";
	}
}
?>
	<tbody><tr height="21" valign="top">
		<td class="smallblack">
<input name="sports_fitness_activitiesarray[]" value="Aerobics" id="testsports_fitness_activitiesarray[]0" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox" <?PHP echo $aerobics?>><label for="testsports_fitness_activitiesarray[]0">Aerobics</label><br>
<input name="sports_fitness_activitiesarray[]" value="Athletics" id="testsports_fitness_activitiesarray[]1" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox" <?PHP echo $athletics?>><label for="testsports_fitness_activitiesarray[]1">Athletics</label><br>
<input name="sports_fitness_activitiesarray[]" value="Badminton" id="testsports_fitness_activitiesarray[]2" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox" <?PHP echo $badminton?>><label for="testsports_fitness_activitiesarray[]2">Badminton</label><br>
<input name="sports_fitness_activitiesarray[]" value="Baseball" id="testsports_fitness_activitiesarray[]3" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox" <?PHP echo $baseball?>><label for="testsports_fitness_activitiesarray[]3">Baseball</label><br>
<input name="sports_fitness_activitiesarray[]" value="Basketball" id="testsports_fitness_activitiesarray[]4" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox" <?PHP echo $basketball?>><label for="testsports_fitness_activitiesarray[]4">Basketball</label><br>
<input name="sports_fitness_activitiesarray[]" value="Billiards / Snooker / Pool" id="testsports_fitness_activitiesarray[]5" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox" <?PHP echo $billiardssnookerpool?>><label for="testsports_fitness_activitiesarray[]5">Billiards / Snooker / Pool</label><br>
<input name="sports_fitness_activitiesarray[]" value="Bowling" id="testsports_fitness_activitiesarray[]6" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox" <?PHP echo $bowling?>><label for="testsports_fitness_activitiesarray[]6">Bowling</label><br>
<input name="sports_fitness_activitiesarray[]" value="Boxing / Wrestling" id="testsports_fitness_activitiesarray[]7" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox" <?PHP echo $boxingwrestling?>><label for="testsports_fitness_activitiesarray[]7">Boxing / Wrestling</label><br>
<input name="sports_fitness_activitiesarray[]" value="Card games" id="testsports_fitness_activitiesarray[]8" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox" <?PHP echo $cardgames?>><label for="testsports_fitness_activitiesarray[]8">Card games</label><br>
<input name="sports_fitness_activitiesarray[]" value="Carrom" id="testsports_fitness_activitiesarray[]9" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox" <?PHP echo $carrom?>><label for="testsports_fitness_activitiesarray[]9">Carrom</label><br>
<input name="sports_fitness_activitiesarray[]" value="Chess" id="testsports_fitness_activitiesarray[]10" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox" <?PHP echo $chess?>><label for="testsports_fitness_activitiesarray[]10">Chess</label><br>
<input name="sports_fitness_activitiesarray[]" value="Cricket" id="testsports_fitness_activitiesarray[]11" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox" <?PHP echo $cricket?>><label for="testsports_fitness_activitiesarray[]11">Cricket</label><br>
<input name="sports_fitness_activitiesarray[]" value="Cycling" id="testsports_fitness_activitiesarray[]12" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox" <?PHP echo $cycling?>><label for="testsports_fitness_activitiesarray[]12">Cycling</label><br>
 </td>
 <td class="smallblack">
<input name="sports_fitness_activitiesarray[]" value="Football / Soccer" id="testsports_fitness_activitiesarray[]13" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox" <?PHP echo $footballsoccer?>><label for="testsports_fitness_activitiesarray[]13">Football / Soccer</label><br>
<input name="sports_fitness_activitiesarray[]" value="Golf" id="testsports_fitness_activitiesarray[]14" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox" <?PHP echo $golf?>><label for="testsports_fitness_activitiesarray[]14">Golf</label><br>
<input name="sports_fitness_activitiesarray[]" value="Gym workouts / Weight training" id="testsports_fitness_activitiesarray[]15" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox" <?PHP echo $gymworkoutsweighttraining?>><label for="testsports_fitness_activitiesarray[]15">Gym workouts / Weight training</label><br>
<input name="sports_fitness_activitiesarray[]" value="Hockey" id="testsports_fitness_activitiesarray[]16" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox" <?PHP echo $hockey?>><label for="testsports_fitness_activitiesarray[]16">Hockey</label><br>
<input name="sports_fitness_activitiesarray[]" value="Horseback Riding" id="testsports_fitness_activitiesarray[]17" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox" <?PHP echo $horsebackriding?>><label for="testsports_fitness_activitiesarray[]17">Horseback Riding</label><br>
<input name="sports_fitness_activitiesarray[]" value="Jogging / Walking / Running" id="testsports_fitness_activitiesarray[]18" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox" <?PHP echo $joggingwalkingrunning?>><label for="testsports_fitness_activitiesarray[]18">Jogging / Walking / Running</label><br>
<input name="sports_fitness_activitiesarray[]" value="Martial Arts" id="testsports_fitness_activitiesarray[]19" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox" <?PHP echo $martialarts?>><label for="testsports_fitness_activitiesarray[]19">Martial Arts</label><br>
<input name="sports_fitness_activitiesarray[]" value="Motor Racing" id="testsports_fitness_activitiesarray[]20" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox" <?PHP echo $motorracing?>><label for="testsports_fitness_activitiesarray[]20">Motor Racing</label><br>
<input name="sports_fitness_activitiesarray[]" value="Polo" id="testsports_fitness_activitiesarray[]21" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox" <?PHP echo $polo?>><label for="testsports_fitness_activitiesarray[]21">Polo</label><br>
<input name="sports_fitness_activitiesarray[]" value="Rugby" id="testsports_fitness_activitiesarray[]22" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox" <?PHP echo $rugby?>><label for="testsports_fitness_activitiesarray[]22">Rugby</label><br>
<input name="sports_fitness_activitiesarray[]" value="Sailing / Boating / Rowing" id="testsports_fitness_activitiesarray[]23" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox" <?PHP echo $sailingboatingrowing?>><label for="testsports_fitness_activitiesarray[]23">Sailing / Boating / Rowing</label><br>
<input name="sports_fitness_activitiesarray[]" value="Scrabble" id="testsports_fitness_activitiesarray[]24" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox" <?PHP echo $scrabble?>><label for="testsports_fitness_activitiesarray[]24">Scrabble</label><br>
<input name="sports_fitness_activitiesarray[]" value="Scuba Diving" id="testsports_fitness_activitiesarray[]25" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox" <?PHP echo $scubadiving?>><label for="testsports_fitness_activitiesarray[]25">Scuba Diving</label><br>
 </td>
 <td class="smallblack">
<input name="sports_fitness_activitiesarray[]" value="Shooting" id="testsports_fitness_activitiesarray[]26" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox" <?PHP echo $shooting?>><label for="testsports_fitness_activitiesarray[]26">Shooting</label><br>
<input name="sports_fitness_activitiesarray[]" value="Skating / Snowboarding / Skiing" id="testsports_fitness_activitiesarray[]27" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox" <?PHP echo $skatingsnowboardingskiing?>><label for="testsports_fitness_activitiesarray[]27">Skating / Snowboarding / Skiing</label><br>
<input name="sports_fitness_activitiesarray[]" value="Squash" id="testsports_fitness_activitiesarray[]28" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox" <?PHP echo $squash?>><label for="testsports_fitness_activitiesarray[]28">Squash</label><br>
<input name="sports_fitness_activitiesarray[]" value="Swimming / Water sports" id="testsports_fitness_activitiesarray[]29" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox" <?PHP echo $swimmingwatersports?>><label for="testsports_fitness_activitiesarray[]29">Swimming / Water sports</label><br>
<input name="sports_fitness_activitiesarray[]" value="Table-tennis" id="testsports_fitness_activitiesarray[]30" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox" <?PHP echo $tabletennis?>><label for="testsports_fitness_activitiesarray[]30">Table-tennis</label><br>
<input name="sports_fitness_activitiesarray[]" value="Tennis" id="testsports_fitness_activitiesarray[]31" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox" <?PHP echo $tennis?>><label for="testsports_fitness_activitiesarray[]31">Tennis</label><br>
<input name="sports_fitness_activitiesarray[]" value="Trekking / Adventure sports" id="testsports_fitness_activitiesarray[]32" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox" <?PHP echo $trekkingadventure?>><label for="testsports_fitness_activitiesarray[]32">Trekking / Adventure sports</label><br>
<input name="sports_fitness_activitiesarray[]" value="Volleyball" id="testsports_fitness_activitiesarray[]33" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox" <?PHP echo $volleyball?>><label for="testsports_fitness_activitiesarray[]33">Volleyball</label><br>
<input name="sports_fitness_activitiesarray[]" value="Weight training" id="testsports_fitness_activitiesarray[]34" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox" <?PHP echo $weighttraining?>><label for="testsports_fitness_activitiesarray[]34">Weight training</label><br>
<input name="sports_fitness_activitiesarray[]" value="Winter / Rink sports" id="testsports_fitness_activitiesarray[]35" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox" <?PHP echo $winterrinksports?>><label for="testsports_fitness_activitiesarray[]35">Winter / Rink sports</label><br>
<input name="sports_fitness_activitiesarray[]" value="Yoga / Meditation" id="testsports_fitness_activitiesarray[]36" onclick="radio_uncheck('sports_fitness_activities_choose');" type="checkbox" <?PHP echo $yogameditation?>><label for="testsports_fitness_activitiesarray[]36">Yoga / Meditation</label><br>
			</td>
		</tr>

 <tr height="21">
  <td class="smallblack"><input name="sports_fitness_activities_choose" id="sports_fitness_activities_choose0" value="Not a sportsperson" onclick="radio_check(this,'sports_fitness_activitiesarray[]');" type="radio" <?PHP echo $notasportsperson?>><label for="sports_fitness_activities_choose0">Not a sportsperson</label></td>
  <td class="smallblack"><input name="sports_fitness_activities_choose" id="sports_fitness_activities_choose1" value="Will tell you later" onclick="radio_check(this,'sports_fitness_activitiesarray[]');"  type="radio" <?PHP echo $willtellyoulater?>><label for="sports_fitness_activities_choose1">Will tell you later</label></td>
<td colspan="1">&nbsp;</td>
 </tr></tbody></table>

	<a name="Favoritecuisine"></a>
	<div class="largewhitebold bluepatch" style="width:500px; color:#990000;"><b>Favorite cuisine</b></div>
<?PHP
$hobbies = explode("|",$row['FavoriteCuisine']);
$x = 0;
$willtellyoulater = "";
for($x=0; $x < count($hobbies); $x++)
{
	if ($hobbies[$x]=="American")
	{
		$american=" checked";
	}
	else if($hobbies[$x]=="Arabic")
	{
		$arabic=" checked";
	}
	else if($hobbies[$x]=="Bengali")
	{
		$bengali=" checked";
	}
	else if($hobbies[$x]=="Chinese")
	{
		$chinese=" checked";
	}
	else if($hobbies[$x]=="Continental")
	{
		$continental=" checked";
	}
	else if($hobbies[$x]=="Fast food")
	{
		$fastfood=" checked";
	}
	else if($hobbies[$x]=="Gujarati")
	{
		$gujrati=" checked";
	}
	else if($hobbies[$x]=="Italian")
	{
		$italian=" checked";
	}
	else if($hobbies[$x]=="Japanese")
	{
		$japanese=" checked";
	}
	else if($hobbies[$x]=="Konkan")
	{
		$konkan=" checked";
	}
	else if($hobbies[$x]=="Lebanese")
	{
		$lebanese=" checked";
	}
	else if($hobbies[$x]=="Mexican")
	{
		$mexican=" checked";
	}
	else if($hobbies[$x]=="Moghlai")
	{
		$moghlai=" checked";
	}
	else if($hobbies[$x]=="North Indian")
	{
		$northindian=" checked";
	}
	else if($hobbies[$x]=="Persian")
	{
		$persian=" checked";
	}
	else if($hobbies[$x]=="Punjabi")
	{
		$punjabi=" checked";
	}
	else if($hobbies[$x]=="Rajasthani")
	{
		$rajasthani=" checked";
	}
	else if($hobbies[$x]=="Seafood")
	{
		$seafood=" checked";
	}
	else if($hobbies[$x]=="Sindhi")
	{
		$sindhi=" checked";
	}
	else if($hobbies[$x]=="Soul Food")
	{
		$soulfood=" checked";
	}
	else if($hobbies[$x]=="South Indian")
	{
		$southindian=" checked";
	}
	else if($hobbies[$x]=="Spanish")
	{
		$spanish=" checked";
	}
	else if($hobbies[$x]=="Thai")
	{
		$thai=" checked";
	}
	else if($hobbies[$x]=="Anything edible is great!")
	{
		$anythingedibleisgreat=" checked";
	}
	else if($hobbies[$x]=="Not much of a food-lover")
	{
		$notmuchofafoodlover=" checked";
	}
	else if($hobbies[$x]=="Will tell you later")
	{
		$willtellyoulater=" checked";
	}
}
?>
	<table class="tbl1" border="0" cellpadding="0" cellspacing="0" style="width:500px;">
	<tbody><tr height="21" valign="top">
		<td class="smallblack">
<input name="favourite_cuisinearray[]" value="American" id="testfavourite_cuisinearray[]0" onclick="radio_uncheck('favourite_cuisine_choose');" type="checkbox" <?PHP echo $american?>><label for="testfavourite_cuisinearray[]0">American</label><br>
<input name="favourite_cuisinearray[]" value="Arabic" id="testfavourite_cuisinearray[]1" onclick="radio_uncheck('favourite_cuisine_choose');" type="checkbox" <?PHP echo $arabic?>><label for="testfavourite_cuisinearray[]1">Arabic</label><br>
<input name="favourite_cuisinearray[]" value="Bengali" id="testfavourite_cuisinearray[]2" onclick="radio_uncheck('favourite_cuisine_choose');" type="checkbox" <?PHP echo $bengali?>><label for="testfavourite_cuisinearray[]2">Bengali</label><br>
<input name="favourite_cuisinearray[]" value="Chinese" id="testfavourite_cuisinearray[]3" onclick="radio_uncheck('favourite_cuisine_choose');" type="checkbox" <?PHP echo $chinese?>><label for="testfavourite_cuisinearray[]3">Chinese</label><br>
<input name="favourite_cuisinearray[]" value="Continental" id="testfavourite_cuisinearray[]4" onclick="radio_uncheck('favourite_cuisine_choose');" type="checkbox" <?PHP echo $continental?>><label for="testfavourite_cuisinearray[]4">Continental</label><br>
<input name="favourite_cuisinearray[]" value="Fast food" id="testfavourite_cuisinearray[]5" onclick="radio_uncheck('favourite_cuisine_choose');" type="checkbox" <?PHP echo $fastfood?>><label for="testfavourite_cuisinearray[]5">Fast food</label><br>
<input name="favourite_cuisinearray[]" value="Gujarati" id="testfavourite_cuisinearray[]6" onclick="radio_uncheck('favourite_cuisine_choose');" type="checkbox" <?PHP echo $gujrati?>><label for="testfavourite_cuisinearray[]6">Gujarati</label><br>
<input name="favourite_cuisinearray[]" value="Italian" id="testfavourite_cuisinearray[]7" onclick="radio_uncheck('favourite_cuisine_choose');" type="checkbox" <?PHP echo $italian?>><label for="testfavourite_cuisinearray[]7">Italian</label><br>
 </td>
 <td class="smallblack">
<input name="favourite_cuisinearray[]" value="Japanese" id="testfavourite_cuisinearray[]8" onclick="radio_uncheck('favourite_cuisine_choose');" type="checkbox" <?PHP echo $japanese?>><label for="testfavourite_cuisinearray[]8">Japanese</label><br>
<input name="favourite_cuisinearray[]" value="Konkan" id="testfavourite_cuisinearray[]9" onclick="radio_uncheck('favourite_cuisine_choose');" type="checkbox" <?PHP echo $konkan?>><label for="testfavourite_cuisinearray[]9">Konkan</label><br>
<input name="favourite_cuisinearray[]" value="Lebanese" id="testfavourite_cuisinearray[]10" onclick="radio_uncheck('favourite_cuisine_choose');" type="checkbox" <?PHP echo $lebanese?>><label for="testfavourite_cuisinearray[]10">Lebanese</label><br>
<input name="favourite_cuisinearray[]" value="Mexican" id="testfavourite_cuisinearray[]11" onclick="radio_uncheck('favourite_cuisine_choose');" type="checkbox" <?PHP echo $mexican?>><label for="testfavourite_cuisinearray[]11">Mexican</label><br>
<input name="favourite_cuisinearray[]" value="Moghlai" id="testfavourite_cuisinearray[]12" onclick="radio_uncheck('favourite_cuisine_choose');" type="checkbox" <?PHP echo $moghlai?>><label for="testfavourite_cuisinearray[]12">Moghlai</label><br>
<input name="favourite_cuisinearray[]" value="North Indian" id="testfavourite_cuisinearray[]13" onclick="radio_uncheck('favourite_cuisine_choose');" type="checkbox" <?PHP echo $northindian?>><label for="testfavourite_cuisinearray[]13">North Indian</label><br>
<input name="favourite_cuisinearray[]" value="Persian" id="testfavourite_cuisinearray[]14" onclick="radio_uncheck('favourite_cuisine_choose');" type="checkbox" <?PHP echo $persian?>><label for="testfavourite_cuisinearray[]14">Persian</label><br>
<input name="favourite_cuisinearray[]" value="Punjabi" id="testfavourite_cuisinearray[]15" onclick="radio_uncheck('favourite_cuisine_choose');" type="checkbox" <?PHP echo $punjabi?>><label for="testfavourite_cuisinearray[]15">Punjabi</label><br>
 </td>
 <td class="smallblack">
<input name="favourite_cuisinearray[]" value="Rajasthani" id="testfavourite_cuisinearray[]16" onclick="radio_uncheck('favourite_cuisine_choose');" type="checkbox" <?PHP echo $rajasthani?>><label for="testfavourite_cuisinearray[]16">Rajasthani</label><br>
<input name="favourite_cuisinearray[]" value="Seafood" id="testfavourite_cuisinearray[]17" onclick="radio_uncheck('favourite_cuisine_choose');" type="checkbox" <?PHP echo $seafood?>><label for="testfavourite_cuisinearray[]17">Seafood</label><br>
<input name="favourite_cuisinearray[]" value="Sindhi" id="testfavourite_cuisinearray[]18" onclick="radio_uncheck('favourite_cuisine_choose');" type="checkbox" <?PHP echo $sindhi?>><label for="testfavourite_cuisinearray[]18">Sindhi</label><br>
<input name="favourite_cuisinearray[]" value="Soul Food" id="testfavourite_cuisinearray[]19" onclick="radio_uncheck('favourite_cuisine_choose');" type="checkbox" <?PHP echo $soulfood?>><label for="testfavourite_cuisinearray[]19">Soul Food</label><br>
<input name="favourite_cuisinearray[]" value="South Indian" id="testfavourite_cuisinearray[]20" onclick="radio_uncheck('favourite_cuisine_choose');" type="checkbox" <?PHP echo $southindian?>><label for="testfavourite_cuisinearray[]20">South Indian</label><br>
<input name="favourite_cuisinearray[]" value="Spanish" id="testfavourite_cuisinearray[]21" onclick="radio_uncheck('favourite_cuisine_choose');" type="checkbox" <?PHP echo $spanish?>><label for="testfavourite_cuisinearray[]21">Spanish</label><br>
<input name="favourite_cuisinearray[]" value="Thai" id="testfavourite_cuisinearray[]22" onclick="radio_uncheck('favourite_cuisine_choose');" type="checkbox" <?PHP echo $thai?>><label for="testfavourite_cuisinearray[]22">Thai</label><br>
			</td>
		</tr>

 <tr height="21">
  <td class="smallblack"><input name="favourite_cuisine_choose" id="favourite_cuisine_choose0" value="Anything edible is great!" onclick="radio_check(this,'favourite_cuisinearray[]');" type="radio" <?PHP echo $anythingedibleisgreat?>><label for="favourite_cuisine_choose0">Anything edible is great!</label></td>
  <td class="smallblack"><input name="favourite_cuisine_choose" id="favourite_cuisine_choose1" value="Not much of a food-lover" onclick="radio_check(this,'favourite_cuisinearray[]');" type="radio" <?PHP echo $notmuchofafoodlover?>><label for="favourite_cuisine_choose1">Not much of a food-lover</label></td>
  <td class="smallblack"><input name="favourite_cuisine_choose" id="favourite_cuisine_choose2" value="Will tell you later" onclick="radio_check(this,'favourite_cuisinearray[]');"  type="radio" <?PHP echo $willtellyoulater?>><label for="favourite_cuisine_choose2">Will tell you later</label></td>
 </tr></tbody></table>

	<a name="Preferreddressstyle"></a>
	<div class="largewhitebold bluepatch" style="width:500px; color:#990000;"><b>Preferred dress style</b></div>
<?PHP
$hobbies = explode("|",$row['PreferredDress']);
$x = 0;
$willtellyoulater = "";
for($x=0; $x < count($hobbies); $x++)
{
	if ($hobbies[$x]=="Business casual - semi-formal office wear")
	{
		$businesscasual=" checked";
	}
	else if($hobbies[$x]=="Casual - usually in jeans and T-shirts")
	{
		$casual=" checked";
	}
	else if($hobbies[$x]=="Designer - only leading brands will do")
	{
		$designer=" checked";
	}
	else if($hobbies[$x]=="Classic Indian - typically Indian formal wear")
	{
		$classicindian=" checked";
	}
	else if($hobbies[$x]=="Classic Western - typically western formal wear")
	{
		$classicwestern=" checked";
	}
	else if($hobbies[$x]=="Trendy - in line with the latest fashion")
	{
		$trendy=" checked";
	}
	else if($hobbies[$x]=="Will tell you later")
	{
		$willtellyoulater=" checked";
	}
}
?>
	<table class="tbl1" border="0" cellpadding="0" cellspacing="0" style="width:500px;">
	<tbody><tr height="21" valign="top">
		<td class="smallblack">
<input name="preferred_dress_stylearray[]" value="Business casual - semi-formal office wear" id="testpreferred_dress_stylearray[]0" onclick="radio_uncheck('preferred_dress_style_choose');" type="checkbox" <?PHP echo $businesscasual?>><label for="testpreferred_dress_stylearray[]0">Business casual - semi-formal office wear</label><br>
<input name="preferred_dress_stylearray[]" value="Casual - usually in jeans and T-shirts" id="testpreferred_dress_stylearray[]1" onclick="radio_uncheck('preferred_dress_style_choose');" type="checkbox" <?PHP echo $casual?>><label for="testpreferred_dress_stylearray[]1">Casual - usually in jeans and T-shirts</label><br>
<input name="preferred_dress_stylearray[]" value="Designer - only leading brands will do" id="testpreferred_dress_stylearray[]4" onclick="radio_uncheck('preferred_dress_style_choose');" type="checkbox" <?PHP echo $designer?>><label for="testpreferred_dress_stylearray[]4">Designer - only leading brands will do</label><br>
 </td>
 <td class="smallblack">
<input name="preferred_dress_stylearray[]" value="Classic Indian - typically Indian formal wear" id="testpreferred_dress_stylearray[]2" onclick="radio_uncheck('preferred_dress_style_choose');" type="checkbox" <?PHP echo $classicindian?>><label for="testpreferred_dress_stylearray[]2">Classic Indian - typically Indian formal wear</label><br>
<input name="preferred_dress_stylearray[]" value="Classic Western - typically western formal wear" id="testpreferred_dress_stylearray[]3" onclick="radio_uncheck('preferred_dress_style_choose');" type="checkbox" <?PHP echo $classicwestern?>><label for="testpreferred_dress_stylearray[]3">Classic Western - typically western formal wear</label><br>
<input name="preferred_dress_stylearray[]" value="Trendy - in line with the latest fashion" id="testpreferred_dress_stylearray[]5" onclick="radio_uncheck('preferred_dress_style_choose');" type="checkbox" <?PHP echo $trendy?>><label for="testpreferred_dress_stylearray[]5">Trendy - in line with the latest fashion</label><br>

 </td>
		</tr>

 <tr height="21">
  <td class="smallblack"><input name="preferred_dress_style_choose" id="preferred_dress_style_choose0" value="Will tell you later" onclick="radio_check(this,'preferred_dress_stylearray[]');"  type="radio" <?PHP echo $willtellyoulater?>><label for="preferred_dress_style_choose0">Will tell you later</label></td>
<td colspan="2">&nbsp;</td>
 </tr></tbody></table>



	<a name="SpokenLanguages"></a>
	<div class="largewhitebold bluepatch" style="width:500px; color:#990000;"><b>Spoken Languages</b></div>
<?PHP
$hobbies = explode("|",$row['SpokenLanguages']);
$x = 0;
$willtellyoulater = "";
for($x=0; $x < count($hobbies); $x++)
{
	if ($hobbies[$x]=="Afrikaans")
	{
		$Afrikaans=" checked";
	}
	else if($hobbies[$x]=="Arabic")
	{
		$Arabic=" checked";
	}
	else if($hobbies[$x]=="Assamese")
	{
		$Assamese=" checked";
	}
	else if($hobbies[$x]=="Bengali")
	{
		$Bengali=" checked";
	}
	else if($hobbies[$x]=="Bulgarian")
	{
		$Bulgarian=" checked";
	}
	else if($hobbies[$x]=="Burmese")
	{
		$Burmese=" checked";
	}
	else if($hobbies[$x]=="Cantonese")
	{
		$Cantonese=" checked";
	}
	else if($hobbies[$x]=="Croatian")
	{
		$Croatian=" checked";
	}
	else if($hobbies[$x]=="Danish")
	{
		$Danish=" checked";
	}
	else if($hobbies[$x]=="Dutch")
	{
		$Dutch=" checked";
	}
	else if($hobbies[$x]=="English")
	{
		$English=" checked";
	}
	else if($hobbies[$x]=="Finnish")
	{
		$Finnish=" checked";
	}
	else if($hobbies[$x]=="French")
	{
		$French=" checked";
	}
	else if($hobbies[$x]=="German")
	{
		$German=" checked";
	}
	else if($hobbies[$x]=="Greek")
	{
		$Greek=" checked";
	}
	else if($hobbies[$x]=="Gujarati")
	{
		$Gujarati=" checked";
	}
	else if($hobbies[$x]=="Hebrew")
	{
		$Hebrew=" checked";
	}
	else if($hobbies[$x]=="Hindi")
	{
		$Hindi=" checked";
	}
	else if($hobbies[$x]=="Indonesian")
	{
		$Indonesian=" checked";
	}
	else if($hobbies[$x]=="Italian")
	{
		$Italian=" checked";
	}
	else if($hobbies[$x]=="Japanese")
	{
		$Japanese=" checked";
	}
	else if($hobbies[$x]=="Kannada")
	{
		$Kannada=" checked";
	}
	else if($hobbies[$x]=="Kashmiri")
	{
		$Kashmiri=" checked";
	}
	else if($hobbies[$x]=="Konkani")
	{
		$Konkani=" checked";
	}
	else if($hobbies[$x]=="Korean")
	{
		$Korean=" checked";
	}
	else if($hobbies[$x]=="Kutchi")
	{
		$Kutchi=" checked";
	}
	else if($hobbies[$x]=="Malay")
	{
		$Malay=" checked";
	}
	else if($hobbies[$x]=="Malayalam")
	{
		$Malayalam=" checked";
	}
	else if($hobbies[$x]=="Mandarin")
	{
		$Mandarin=" checked";
	}
	else if($hobbies[$x]=="Manipuri")
	{
		$Manipuri=" checked";
	}
	else if($hobbies[$x]=="Marathi")
	{
		$Marathi=" checked";
	}
	else if($hobbies[$x]=="Marwadi")
	{
		$Marwadi=" checked";
	}
	else if($hobbies[$x]=="Mizo")
	{
		$Mizo=" checked";
	}
	else if($hobbies[$x]=="Nepalese")
	{
		$Nepalese=" checked";
	}
	else if($hobbies[$x]=="Norwegian")
	{
		$Norwegian=" checked";
	}
	else if($hobbies[$x]=="Oriya")
	{
		$Oriya=" checked";
	}
	else if($hobbies[$x]=="Persian")
	{
		$Persian=" checked";
	}
	else if($hobbies[$x]=="Polish")
	{
		$Polish=" checked";
	}
	else if($hobbies[$x]=="Portuguese")
	{
		$Portuguese=" checked";
	}
	else if($hobbies[$x]=="Punjabi")
	{
		$Punjabi=" checked";
	}
	else if($hobbies[$x]=="Pushto")
	{
		$Pushto=" checked";
	}
	else if($hobbies[$x]=="Russian")
	{
		$Russian=" checked";
	}
	else if($hobbies[$x]=="Sindhi")
	{
		$Sindhi=" checked";
	}
	else if($hobbies[$x]=="Spanish")
	{
		$Spanish=" checked";
	}
	else if($hobbies[$x]=="Swahili")
	{
		$Swahili=" checked";
	}
	else if($hobbies[$x]=="Swedish")
	{
		$Swedish=" checked";
	}
	else if($hobbies[$x]=="Tagalog")
	{
		$Tagalog=" checked";
	}
	else if($hobbies[$x]=="Tamil")
	{
		$Tamil=" checked";
	}
	else if($hobbies[$x]=="Telugu")
	{
		$Telugu=" checked";
	}
	else if($hobbies[$x]=="Thai")
	{
		$Thai=" checked";
	}
	else if($hobbies[$x]=="Tulu")
	{
		$Tulu=" checked";
	}
	else if($hobbies[$x]=="Turkish")
	{
		$Turkish=" checked";
	}
	else if($hobbies[$x]=="Urdu")
	{
		$Urdu=" checked";
	}
	else if($hobbies[$x]=="Will tell you later")
	{
		$willtellyoulater=" checked";
	}
}
?>
	<table class="tbl1" border="0" cellpadding="0" cellspacing="0" style="width:500px;">
	<tbody><tr height="21" valign="top">
		<td class="smallblack">
<input name="spoken_languagesarray[]" value="Afrikaans" id="testspoken_languagesarray[]0" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox" <?PHP echo $Afrikaans?>><label for="testspoken_languagesarray[]0">Afrikaans</label><br>
<input name="spoken_languagesarray[]" value="Arabic" id="testspoken_languagesarray[]1" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox" <?PHP echo $Arabic?>><label for="testspoken_languagesarray[]1">Arabic</label><br>
<input name="spoken_languagesarray[]" value="Assamese" id="testspoken_languagesarray[]2" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox" <?PHP echo $Assamese?>><label for="testspoken_languagesarray[]2">Assamese</label><br>
<input name="spoken_languagesarray[]" value="Bengali" id="testspoken_languagesarray[]3" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox" <?PHP echo $Bengali?>><label for="testspoken_languagesarray[]3">Bengali</label><br>
<input name="spoken_languagesarray[]" value="Bulgarian" id="testspoken_languagesarray[]4" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox" <?PHP echo $Bulgarian?>><label for="testspoken_languagesarray[]4">Bulgarian</label><br>
<input name="spoken_languagesarray[]" value="Burmese" id="testspoken_languagesarray[]5" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox" <?PHP echo $Burmese?>><label for="testspoken_languagesarray[]5">Burmese</label><br>
<input name="spoken_languagesarray[]" value="Cantonese" id="testspoken_languagesarray[]6" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox" <?PHP echo $Cantonese?>><label for="testspoken_languagesarray[]6">Cantonese</label><br>
<input name="spoken_languagesarray[]" value="Croatian" id="testspoken_languagesarray[]7" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox" <?PHP echo $Croatian?>><label for="testspoken_languagesarray[]7">Croatian</label><br>
<input name="spoken_languagesarray[]" value="Danish" id="testspoken_languagesarray[]8" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox" <?PHP echo $Danish?>><label for="testspoken_languagesarray[]8">Danish</label><br>
<input name="spoken_languagesarray[]" value="Dutch" id="testspoken_languagesarray[]9" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox" <?PHP echo $Dutch?>><label for="testspoken_languagesarray[]9">Dutch</label><br>
<input name="spoken_languagesarray[]" value="English" id="testspoken_languagesarray[]10" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox" <?PHP echo $English?>><label for="testspoken_languagesarray[]10">English</label><br>
<input name="spoken_languagesarray[]" value="Finnish" id="testspoken_languagesarray[]11" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox" <?PHP echo $Finnish?>><label for="testspoken_languagesarray[]11">Finnish</label><br>
<input name="spoken_languagesarray[]" value="French" id="testspoken_languagesarray[]12" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox" <?PHP echo $French?>><label for="testspoken_languagesarray[]12">French</label><br>
<input name="spoken_languagesarray[]" value="German" id="testspoken_languagesarray[]13" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox" <?PHP echo $German?>><label for="testspoken_languagesarray[]13">German</label><br>
<input name="spoken_languagesarray[]" value="Greek" id="testspoken_languagesarray[]14" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox" <?PHP echo $Greek?>><label for="testspoken_languagesarray[]14">Greek</label><br>
<input name="spoken_languagesarray[]" value="Gujarati" id="testspoken_languagesarray[]15" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox" <?PHP echo $Gujrati?>><label for="testspoken_languagesarray[]15">Gujarati</label><br>
<input name="spoken_languagesarray[]" value="Hebrew" id="testspoken_languagesarray[]16" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox" <?PHP echo $Hebrew?>><label for="testspoken_languagesarray[]16">Hebrew</label><br>
<input name="spoken_languagesarray[]" value="Hindi" id="testspoken_languagesarray[]17" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox" <?PHP echo $Hindi?>><label for="testspoken_languagesarray[]17">Hindi</label><br>
 </td>
 <td class="smallblack">
<input name="spoken_languagesarray[]" value="Indonesian" id="testspoken_languagesarray[]18" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox" <?PHP echo $Indonesian?>><label for="testspoken_languagesarray[]18">Indonesian</label><br>
<input name="spoken_languagesarray[]" value="Italian" id="testspoken_languagesarray[]19" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox" <?PHP echo $Italian?>><label for="testspoken_languagesarray[]19">Italian</label><br>
<input name="spoken_languagesarray[]" value="Japanese" id="testspoken_languagesarray[]20" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox" <?PHP echo $Japanese?>><label for="testspoken_languagesarray[]20">Japanese</label><br>
<input name="spoken_languagesarray[]" value="Kannada" id="testspoken_languagesarray[]21" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox" <?PHP echo $Kannada?>><label for="testspoken_languagesarray[]21">Kannada</label><br>
<input name="spoken_languagesarray[]" value="Kashmiri" id="testspoken_languagesarray[]22" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox" <?PHP echo $Kashmiri?>><label for="testspoken_languagesarray[]22">Kashmiri</label><br>
<input name="spoken_languagesarray[]" value="Konkani" id="testspoken_languagesarray[]23" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox" <?PHP echo $Konkani?>><label for="testspoken_languagesarray[]23">Konkani</label><br>
<input name="spoken_languagesarray[]" value="Korean" id="testspoken_languagesarray[]24" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox" <?PHP echo $Korean?>><label for="testspoken_languagesarray[]24">Korean</label><br>
<input name="spoken_languagesarray[]" value="Kutchi" id="testspoken_languagesarray[]25" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox" <?PHP echo $Kutchi?>><label for="testspoken_languagesarray[]25">Kutchi</label><br>
<input name="spoken_languagesarray[]" value="Malay" id="testspoken_languagesarray[]26" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox" <?PHP echo $Malay?>><label for="testspoken_languagesarray[]26">Malay</label><br>
<input name="spoken_languagesarray[]" value="Malayalam" id="testspoken_languagesarray[]27" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox" <?PHP echo $Malayalam?>><label for="testspoken_languagesarray[]27">Malayalam</label><br>
<input name="spoken_languagesarray[]" value="Mandarin" id="testspoken_languagesarray[]28" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox" <?PHP echo $Mandarin?>><label for="testspoken_languagesarray[]28">Mandarin</label><br>
<input name="spoken_languagesarray[]" value="Manipuri" id="testspoken_languagesarray[]29" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox" <?PHP echo $Manipuri?>><label for="testspoken_languagesarray[]29">Manipuri</label><br>
<input name="spoken_languagesarray[]" value="Marathi" id="testspoken_languagesarray[]30" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox" <?PHP echo $Marathi?>><label for="testspoken_languagesarray[]30">Marathi</label><br>
<input name="spoken_languagesarray[]" value="Marwadi" id="testspoken_languagesarray[]31" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox" <?PHP echo $Marwadi?>><label for="testspoken_languagesarray[]31">Marwadi</label><br>
<input name="spoken_languagesarray[]" value="Mizo" id="testspoken_languagesarray[]32" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox" <?PHP echo $Mizo?>><label for="testspoken_languagesarray[]32">Mizo</label><br>
<input name="spoken_languagesarray[]" value="Nepalese" id="testspoken_languagesarray[]33" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox" <?PHP echo $Nepalese?>><label for="testspoken_languagesarray[]33">Nepalese</label><br>
<input name="spoken_languagesarray[]" value="Norwegian" id="testspoken_languagesarray[]34" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox" <?PHP echo $Norwegian?>><label for="testspoken_languagesarray[]34">Norwegian</label><br>
<input name="spoken_languagesarray[]" value="Oriya" id="testspoken_languagesarray[]35" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox" <?PHP echo $Oriya?>><label for="testspoken_languagesarray[]35">Oriya</label><br>
 </td>
 <td class="smallblack">
<input name="spoken_languagesarray[]" value="Persian" id="testspoken_languagesarray[]36" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox" <?PHP echo $Persian?>><label for="testspoken_languagesarray[]36">Persian</label><br>
<input name="spoken_languagesarray[]" value="Polish" id="testspoken_languagesarray[]37" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox" <?PHP echo $Polish?>><label for="testspoken_languagesarray[]37">Polish</label><br>
<input name="spoken_languagesarray[]" value="Portuguese" id="testspoken_languagesarray[]38" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox" <?PHP echo $Portuguese?>><label for="testspoken_languagesarray[]38">Portuguese</label><br>
<input name="spoken_languagesarray[]" value="Punjabi" id="testspoken_languagesarray[]39" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox" <?PHP echo $Punjabi?>><label for="testspoken_languagesarray[]39">Punjabi</label><br>
<input name="spoken_languagesarray[]" value="Pushto" id="testspoken_languagesarray[]40" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox" <?PHP echo $Pushto?>><label for="testspoken_languagesarray[]40">Pushto</label><br>
<input name="spoken_languagesarray[]" value="Russian" id="testspoken_languagesarray[]41" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox" <?PHP echo $Russian?>><label for="testspoken_languagesarray[]41">Russian</label><br>
<input name="spoken_languagesarray[]" value="Sindhi" id="testspoken_languagesarray[]42" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox" <?PHP echo $Sindhi?>><label for="testspoken_languagesarray[]42">Sindhi</label><br>
<input name="spoken_languagesarray[]" value="Spanish" id="testspoken_languagesarray[]43" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox" <?PHP echo $Spanish?>><label for="testspoken_languagesarray[]43">Spanish</label><br>
<input name="spoken_languagesarray[]" value="Swahili" id="testspoken_languagesarray[]44" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox" <?PHP echo $Swahili?>><label for="testspoken_languagesarray[]44">Swahili</label><br>
<input name="spoken_languagesarray[]" value="Swedish" id="testspoken_languagesarray[]45" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox" <?PHP echo $Swedish?>><label for="testspoken_languagesarray[]45">Swedish</label><br>
<input name="spoken_languagesarray[]" value="Tagalog" id="testspoken_languagesarray[]46" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox" <?PHP echo $Tagalog?>><label for="testspoken_languagesarray[]46">Tagalog</label><br>
<input name="spoken_languagesarray[]" value="Tamil" id="testspoken_languagesarray[]47" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox" <?PHP echo $Tamil?>><label for="testspoken_languagesarray[]47">Tamil</label><br>
<input name="spoken_languagesarray[]" value="Telugu" id="testspoken_languagesarray[]48" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox" <?PHP echo $Telugu?>><label for="testspoken_languagesarray[]48">Telugu</label><br>
<input name="spoken_languagesarray[]" value="Thai" id="testspoken_languagesarray[]49" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox" <?PHP echo $Thai?>><label for="testspoken_languagesarray[]49">Thai</label><br>
<input name="spoken_languagesarray[]" value="Tulu" id="testspoken_languagesarray[]50" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox" <?PHP echo $Tulu?>><label for="testspoken_languagesarray[]50">Tulu</label><br>
<input name="spoken_languagesarray[]" value="Turkish" id="testspoken_languagesarray[]51" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox" <?PHP echo $Turkish?>><label for="testspoken_languagesarray[]51">Turkish</label><br>
<input name="spoken_languagesarray[]" value="Urdu" id="testspoken_languagesarray[]52" onclick="radio_uncheck('spoken_languages_choose');" type="checkbox" <?PHP echo $Urdu?>><label for="testspoken_languagesarray[]52">Urdu</label><br>
			</td>
		</tr>

 <tr height="21">
  <td class="smallblack"><input name="spoken_languages_choose" id="spoken_languages_choose0" value="Will tell you later" onclick="radio_check(this,'spoken_languagesarray[]');"  type="radio" <?PHP echo $willtellyoulater?>><label for="spoken_languages_choose0">Will tell you later</label></td>
<td colspan="2">&nbsp;</td>
 </tr></tbody></table><br>

	<table class="tbl1 end" border="0" cellpadding="6" cellspacing="0" style="width:500px;">
	<tbody><tr height="60">
		<td ><br></td>
		<td >
		<input src="images/submit.gif" style="width: 76px; height: 22px;" border="0" type="image" vspace="20"></td>
		<td ><br></td>
	</tr>
	</tbody></table>

</form>

	</div><br>





		</div><br clear="all">
	</div>
</div>
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