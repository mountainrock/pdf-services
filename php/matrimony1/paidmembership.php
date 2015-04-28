<?PHP
session_start();
include("connection.php");

$sqlsettings = "SELECT * from admin";
$resultsettings = mysql_query($sqlsettings);
$rowsettings = mysql_fetch_array($resultsettings);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Marry Banjara - World's No. 1 Matrimonial Website</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="css/landing.css" type="text/css">
<link rel="stylesheet" href="css/homepage.css" type="text/css">
<script language="Javascript" src="js/matrimonials-v10.js" type="text/javascript"></script>
<script language="Javascript" src="js/matrimonials-landing1.js"></script>
<script language="Javascript" src="js/mouseovereffect.js"></script>
<script language="Javascript" src="js/home-pg.js" type="text/javascript"></script>
</head>

<body style="margin: 0px;">
<a name="Matrimonials"></a>
<a name="Matrimonial"></a>
<center>

		<div class="width">


		</div><br style="line-height: 0px;" clear="all">






		<div class="smallcnt width">
			<div class="left tleft"><img src="images/logo1.gif" border="0"><br>
           <div class="left tleft" style="padding-left:30px"> <span style="color: rgb(170, 170, 170);">The No.1 </span><a href="" style="color: rgb(170, 170, 170);">Matrimonial Website</a> <span style="color: rgb(170, 170, 170);">Site</span></span><br><br></div>
            </div>
	</div>




		<div class="smallcnt width">

			<div class="left tleft">

			</div>
		<!-- FORM ST -->

		<div class="right tright" style="width: 192px;"></div><br clear="all">
		<!-- FORM EN-->
	</div>

		<div class="smallcnt width" style=" background-image:url(images/topbg.gif); -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial;">
			<div class="left tleft" style="width: 33px;"><img src="images/top-lft-cnl.gif" border="0" height="33" width="14"><br></div>
			<div class="left tleft" style="width: 650px;">

	<?PHP
if($_SESSION['UserID']!="")
{
?>
<br>
<a href="index.php" title="My Account" style="color:#FFFFFF;"><strong>Home</strong></a> <strong style="color:#FFFFFF;">|</strong> <a href="aboutus.php" title="My Profile" style="color:#FFFFFF;"><strong>About Us</strong></a> <strong style="color:#FFFFFF;">|</strong> <a href="contactus.php" title="Log Out" style="color:#FFFFFF;"><strong>Contact Us</strong></a><strong style="color:#FFFFFF;">|</strong>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="myaccount.php" title="My Account" style="color:#FFFFFF;"><strong>My Account</strong></a> <strong style="color:#FFFFFF;">|</strong> <a href="my_profile.php" title="My Profile" style="color:#FFFFFF;"><strong>My Profile</strong></a> <strong style="color:#FFFFFF;">|</strong> <a href="logout.php" title="Log Out" style="color:#FFFFFF;"><strong>Log Out</strong></a>
<?PHP
}
else
{
?>




			<form method="post" action="login.php" name="loginpage" autocomplete="off" style="margin: 4px 0pt 0pt 0px;">
	<b><a href="index.php" style="color:#FFFFFF;border-right:1px solid #FFF;padding-right:5px">Home</a> | <a href="aboutus.php" style="color:#FFFFFF;border-right:1px solid #FFF;padding-right:5px">About Us</a> | <a href="contactus.php" style="color:#FFFFFF;border-right:1px solid #FFF;padding-right:5px">Contact Us</a>	</b> &nbsp;	<b style="color:#FFFFFF;padding-left:20px">Member Login</b> &nbsp; <input name="login" value="Email ID" onfocus="if(this.value=='Email ID') this.value='';" onblur="if(this.value=='') this.value='Email ID';" size="16" type="text">&nbsp; &nbsp;<input name="password" value="******" onfocus="if(this.value=='******') this.value='';" onblur="if(this.value=='') this.value='******';" size="14" type="password">&nbsp; <input src="images/go.gif" title="Login" align="top" border="0" type="image"><input name="homepage" value="Y" type="hidden"><input name="continue" value="true" type="hidden"> &nbsp; <a href="forget_password.php" class="xsmall" title="Forgot Password?" style="color:#FFFFFF;">Forgot Password?</a>
			</form>
		<?PHP
}
?>
			</div>
		<!-- FORM ST -->

		<div class="right tright" style="width: 18px;"><img src="images/top-rgt-cnl.gif" border="0" height="33" width="18"></div><br clear="all">
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

<div class="width smallcnt" style="background-image:url(images/background.jpg)">
<div class="left graytxt" style="width: 760px;background-image:url(images/background.jpg); height:5px;"></div>
	<div class="left graytxt" style="width: 760px">

	<table class="left tleft smallcnt graytxt" border="0" cellpadding="0" cellspacing="0" style="width: 760px;border:3px solid #F93;background-color:#FFC">
    <tr>
    <td>



   <table width="744" border="0">
  <tr>

    <td width="309"> <div class="paidMember" style=" font-size:12px;margin-left:30px">
    <!--header-->

            <div class="">

<h2 style="text-decoration:underline"> Paid Membership</h2>

<table width="297" border="1" style="font-family:Verdana, Geneva, sans-serif;padding:10px;font-size:12px;border:1px dashed #F93">
  <tr>
    <td width="287" height="23" align="center" style="background-color:#FBDB91"><strong>Why Paid Membership ?</strong></td>
  </tr>
  <tr>
    <td height="28">
   					<ul style="line-height:20px;list-style-type:square">
						<li>Top Ranking Display</li>
                        <li>See Contact Information</li>
                        <li>Highlighted Display</li>
                        <li>Send Personalized Messages</li>
                        <li>Advanced search and save</li>
                    </ul>
 </td>
  </tr>
</table>

</td>


    <td width="425"><table width="395" border="0" style="font-family:Verdana;font-size:12px;border:1px solid #600" align="right">
  <tr align="center">
    <td height="29" colspan="4" bgcolor="#FBDB91"><h4 style="color:#333">Membership options and price are as below:</h4></td>
  </tr>

  <tr>
    <td width="76" height="45" style="background-color:#FB5858;color:#FFF;text-align:center">Duration</td>
    <td width="109" style="background-color:#FB5858;color:#FFF;text-align:center">3 months</td>
    <td width="109" style="background-color:#FB5858;color:#FFF;text-align:center">&nbsp;</td>
  </tr>
  <tr align="center">
    <td height="45" style="background-color:#FB5858;color:#FFF;text-align:center">Price</td>
    <td style="text-align:center"><strong>Rs. 500 <br/>($10)</strong></td>
	<td colspan="3">
	  					<a href="<?PHP if($_SESSION['UserID']!=""){ echo "membership.php"; } else { echo "login.php"; }?>"><img src="images/buyNowbtn.png" border="0" height="30px"/></a>
      </td>
  </tr>
	<tr><td>&nbsp;</td>
	</tr>
   <tr>
   <td>&nbsp;</td>
        <td colspan="2">
  	  	<a href="register.php"><img src="images/register.png" border="0" height="30px"/></a>

        </td>
  </tr>
  <tr>

          <td colspan="3">
    	  	<span style="color:grey;font-size:9px">(Please login/register for FREE if not registered by clicking above)</span>

          </td>
  </tr>
</table></td>


  </tr>
</table>




</td>
    </tr>
    </table>


	</div>
</div><br clear="all">
<span class="brseven"><br>


<!-- Footer starts -->
	<?PHP
	include("footer.php");
	?>
<!-- Footer ends -->
</span></center>
</body></html>