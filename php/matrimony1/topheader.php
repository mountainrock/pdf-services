<?PHP include("common/includes_static.php"); ?>
<?PHP include("common/constants.php"); ?>

<link rel="stylesheet" href="css/landing.css" type="text/css">
<link rel="stylesheet" href="css/homepage.css" type="text/css">

<a name="Matrimonials"></a>
<a name="Matrimonial"></a>
<center>

		<div class="width">


		</div>
       <?php include("sections/site-title.php"); ?>


<div class="smallcnt width">

			<div class="left tleft">

			</div>
		<!-- FORM ST -->

		<div class="right tright" style="width: 192px;"><img src="images/transparent.gif" border="0" height="37" width="190"></div><br clear="all">
		<!-- FORM EN-->
</div>

<div class="smallcnt width" style="background-color:#EE1E2C; padding-top:6px;padding-bottom:6px">
			<div class="left tleft" style="width: 33px;">&nbsp;</div>
			<div class="left tleft" style="width: 650px;">

	<?PHP
if($_SESSION['UserID']!="")
{
?>
<br>
<table>
<tr>
	<td><a href="index.php" title="My Account" style="color:#F1F1F1;border-right:1px solid #FFF;"><strong>Home&nbsp;</strong></a> </td>
		<td><a href="gothras.php" title="Gothras" style="color:#F1F1F1;border-right:1px solid #FFF;"><strong>Gothras&nbsp;</strong></a></td>
		<td><a href="contactus.php" title="Log Out" style="color:#F1F1F1;"><strong>Contact Us&nbsp;</strong></a></td>

	<td width="260">&nbsp;</td>
	<td><a href="my_profile.php" title="My Profile" style="color:#F1F1F1;border-right:1px solid #FFF;"><strong>My Profile&nbsp;</strong></a> </td>
	<td ><a href="logout.php" title="Log Out" style="color:#F1F1F1;"><strong>Logout [<?PHP echo $_SESSION['Name']?>]</strong></a></td>
</tr>
</table>

<?PHP
}
else
{
?>




			<form method="post" action="login.php" name="loginpage" autocomplete="off" style="margin: 4px 0pt 0pt 0px;">
	<b><a href="index.php" style="color:#FFFFFF;border-right:1px solid #FFF;padding-right:5px">Home</a>
          <a href="gothras.php" title="Gothras" style="color:#F1F1F1;border-right:1px solid #FFF;"><strong>Gothras&nbsp;</strong></a>
	<a href="aboutus.php" style="color:#FFFFFF;border-right:1px solid #FFF;padding-right:5px">About Us</a>
	<a href="contactus.php" style="color:#FFFFFF;border-right:1px solid #FFF;">Contact Us</a>
	</b> &nbsp;	<b style="color:#FFFFFF;padding-left:20px">Login</b> &nbsp; <input name="login" value="Email ID" onfocus="if(this.value=='Email ID') this.value='';" onblur="if(this.value=='') this.value='Email ID';" size="16" type="text">&nbsp; &nbsp;<input name="password" value="******" onfocus="if(this.value=='******') this.value='';" onblur="if(this.value=='') this.value='******';" size="14" type="password">&nbsp; <input src="images/go.gif" title="Login" align="top" border="0" type="image"><input name="homepage" value="Y" type="hidden"><input name="continue" value="true" type="hidden"> &nbsp; <a href="forget_password.php" class="xsmall" title="Forgot Password?" style="color:#FFFFFF;">Forgot Password?</a>
			</form>
		<?PHP
}
?>
			</div>
		<!-- FORM ST -->

		<div class="right tright" style="width: 18px;">&nbsp;</div><br clear="all">
		<!-- FORM EN-->
	</div>