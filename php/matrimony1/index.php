<?php session_start(); ?>
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
<a name="Matrimonials"></a>
<a name="Matrimonial"></a>
<center>

       
<?php include("sections/site-title.php"); ?>
		
	</div>




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
		<!-- MAIN CREATIVE ST-->

		<div style="width: 760px; padding-top: 0px;">
		<table border="0" cellpadding="0" cellspacing="0" width="760">


			<tr>

			<td width="291" valign="top">
			<br/>
				<fieldset>

				<table style="padding-left:10px" border="0" cellpadding="0" cellspacing="0" align="left">
						<?php include("sections/searchbox.php"); ?>
					</tr>
				</table>


				<br/>
			</fieldset>
		</td>

		<td ><img src="images/banner.jpg" ></td>

		</tr></table>

	</div>
	<!-- MAIN CREATIVE EN-->
</div>
<!-- REGISTER/UPGRADE CONTENT ST-->
<div class="width smallcnt" style="border-top: 1px solid rgb(255, 255, 255); background: transparent url(images/main-bg.gif) repeat-x scroll left top; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial;">

		<div id="threeStep" class="left tleft">

			<div id="step1" class="left" style="border-right: 1px solid rgb(255, 255, 255); width: 184px; height: 67px;" onmouseover="change_image(1,'rollin','images/');" onmouseout="change_image(1,'rollout','images/')">
				<div style="padding-top: 13px;">
					<a href="register.php"><img id="digit1" src="images/one-off.gif" alt="" align="left" border="0" height="43" hspace="13" width="43"></a> <a href="register.php"><font style="color:#FFF7E0; font-family:Arial, Helvetica, sans-serif; font-size:16px; font-weight:bold;">Register</font></a><br><a href="register.php" style="color:#606060;">
					and create your<br> free profile.</a>
				</div>
			</div>
			<div id="step2" class="left" style="border-right: 1px solid rgb(255, 255, 255); width: 184px; height: 67px;" onmouseover="change_image(2,'rollin','images/');" onmouseout="change_image(2,'rollout','images/');">
				<div style="padding-top: 13px;">
					<a href="search.php" style="color:#606060;"><img id="digit2" src="images/two-off.gif" alt="" align="left" border="0" height="43" hspace="13" width="43"><font style="color:#FFF7E0; font-family:Arial, Helvetica, sans-serif; font-size:16px; font-weight:bold;">Search</font><br>
					for members who<br> meet your criteria.</a>
				</div>
			</div>
			<div id="step3" class="left" style="border-right: 1px solid rgb(255, 255, 255); width: 184px; height: 67px;" onmouseover="change_image(3,'rollin','images/');" onmouseout="change_image(3,'rollout','images/');">
				<div style="padding-top: 13px;">
					<a href="communicate.php" style="color:#606060;"><img id="digit3" src="images/three-off.gif" alt="" align="left" border="0" height="43" hspace="13" width="43">
					<font style="color:#FFF7E0; font-family:Arial, Helvetica, sans-serif; font-size:16px; font-weight:bold;">Contact</font><br>
					members you like via<br>email or phone.</a>
				</div>
			</div>
		</div><!-- three step en -->

		<div class="left" style="padding: 20px 0pt 0pt 36px;">
			<a href="register.php"><img src="images/advSearcButton.png" alt="Register Free!" title="Register Free!" border="0" height="30" vspace="0" width="140"></a>
		</div>

<br clear="all">
</div>
<div class="width smallcnt" style="background-image:url(images/background.jpg)">
<div class="left graytxt" style=""></div>
	<div class="left graytxt" style="width: 760px">

<table cellspacing="0" cellpadding="0" border="0" class="left tleft smallcnt graytxt" style="padding: 10px; border: 1px solid #FFBD7B;">
    <tr>
    <td>
<p style="font-size:12px;color:#A35804;font-weight:normal;text-align:justify;font-family:Sans-Serif,Verdana">

	<?php
if($_SESSION['UserID']!="")
{
 echo "<a href='membership.php'>";
}
else
{
	 echo "<a href='paidmembership.php'>";
}
?>

  <img src="images/offer.gif" style="float:right;padding-left:10px;padding-right:10px;padding-bottom:10px" border="0" /> </a>
    We Banjara are basically from the Indian state of Rajasthan, North-West Gujarat, and Western Madhya Pradesh and Eastern Sindh province.
Our history goes back to some 2000 years and is as colourful as the costumes our women wear.
<br/><br/>
There are so many doctors,engineers, lecturers, dentists and other professionals in our banjara community. But there are very few affordable lambani community matrimonial on the internet.
<br/><br/>
This is a platform for those searching for their lambani life partners and is dedicated for all lambani /banjara community people who are looking for soul mates
<br/><br/>
We aim to provide service at a very affordable price (starting at <b>Rs.500</b> only). We would be glad to hear from you!
</p>
</td>
    </tr>
    </table>


	</div>
</div><br clear="all">
	</div><span class="brseven"><br>


<!-- Footer starts -->
	<?php
	include("footer.php");
	?>
<!-- Footer ends -->
</span></center>
</body></html>