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

<center>

        <br style="line-height: 0px;" clear="all">

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
<td valign="top" align="left"> <p><strong>About Us</strong></p>
  <p>We are leading Banjara matrimonial website.We are a small team working on making the best matrimonial website for our community. We would be glad to here from you. Please contact us from the <a href="contactus.php">link here</a>
<br/><br/><br/><br/>
  </p>

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