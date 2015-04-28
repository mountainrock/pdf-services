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
			$insert = "update users set Password='".mysql_escape_string($_POST['password'])."' where UserID=".$_SESSION['UserID'];

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
<title>Marry Banjara - Change Password</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="css/style.css">
<script language="javascript" src="js/ajax-v2-inc-mod.js"></script>
<script language="javascript" src="js/tool-tip.js"></script>
<script language="javascript" src="js/common_002.js"></script>
<script language="javascript" src="js/ajax-v2-inc-mod.js"></script>
<link rel="stylesheet" href="css/changepassword.css">
<script language="javascript" src="js/changepassword.js"></script>
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
				<h2>Edit your Password </h2>
			</div>








	<form method="post" name="frmastro" action="change_password.php" style="margin: 0px;" onSubmit="return validateform(this);">
<input type="hidden" name="continue" value="true">
	<div class="largewhitebold bluepatch" style="color:#990000; "><b>My Login Password </b></div>

	<table  border="0" cellpadding="6" cellspacing="0">
	<tbody><tr>
		<td >Password</td>
		<td class="mediumred"><input type="password" name="password" value="<?PHP echo $row['Password']?>"></td>
	</tr>
	<tr>
		<td >Confirm Password</td>
		<td class="mediumred"><input type="password" name="password2" value="<?PHP echo $row['Password']?>"></td>
	</tr>

	</tbody></table>
	<br>

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