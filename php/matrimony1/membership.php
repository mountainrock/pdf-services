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
<title>Marry Banjara - Update To Gold Member</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/aboutus.css">
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
<td height="1" width="10"><spacer type="block" height="1" width="10"></td>
<td valign="top" align="left"> <p class="largeblueboldlink"><strong>Update To Gold Member Now...</strong></p>

<p class="keywords" align="left"><u>Advantages for Gold Member:</u></p>
		  <div align="left">
		  <ul>
		  	<li>Display Your Profile.</li>
		  	<li>Show Interest to Members.</li>
			<li>Write Unlimited Personal Messages to Members.</li>
			<li>View Contact Details of Other Members and Display Your Contact Details.</li>
			<li>Send and Reply Email Messages</li>
			<li>Post Photo, Horoscope, etc...</li>
		  </ul>
		  </div>
		  <p>To update your account to gold member, please <a href="contactus.php" class="edit">Contact Us</a>
or to update your account to Gold Member by yourself, please select your preferable payment method and Update to Gold Member Now;

<br>
<br>
Please Make sure that you are <a href="login.php">Logged in</a> Already...

<br>
<br>
<strong>Please Note:</strong> You do not need a paypal account to pay. You can pay by credit/debit card.
<br>
<br>
<a href="gold_update.php?payment=paypal"><img src="images/paypal.gif" border="0"></a>
  <!-- <a href="gold_update.php?payment=nochex"><img src="images/nochex.gif" border="0"></a>
  <a href="gold_update.php?payment=2co"><img src="images/twoco.gif" border="0"></a>
  -->
</p>
<p>&nbsp;</p>
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