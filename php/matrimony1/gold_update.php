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
<title>- Update To Gold Member Now</title>
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
				<!-- The top link table ends here -->
			
			<!-- The topbanner table start's here -->
			<div style="width: 762px; background-color: rgb(255, 255, 255);">
			<div style="border-top: 1px solid rgb(143, 167, 191); border-left: 1px solid rgb(143, 167, 191); border-right: 1px solid rgb(143, 167, 191);">


				<!-- logo + banner space -->
				<div style="padding: 2px 0pt 4px 0px;">
					<div style="padding: 4px 0pt 4px 16px; width: 215px; float: left; text-align: left;">
					<a href="index.php"><img src="images/matrimonial-logo-sm.gif" border="0"></a>
					</div>
				<br clear="all">
			
			</div>
			<!-- logo + banner space -->
		
				<!-- midlinks + services space -->
					<br style="line-height: 1px;" clear="all">
				<div>
					<div style="border-top: 2px solid #990000; border-bottom: 12px solid #990000; background-color:#990000; text-align: left;">
						
					</div>
				</div>
				<!-- The topbanner table end's here -->

				<!-- The tab table start's here -->
				<div style="margin: 0px; width: 100%;">
					<div style="width: 180px; background-color: rgb(255, 255, 255); float: left;">
						<div style="border-top: 2px solid rgb(0, 0, 0);">
						<div style="padding: 6px 0pt 0pt 0px; width: 170px; background-color: rgb(238, 238, 238);" class="smallblack"><div>
						<?PHP
						if($_SESSION['UserID']!="")
						{
						?>
						<a href="logout.php" class="smallbluelink"><b>Logout</b></a> [<a href="my_profile.php" class="smallblackbold" title="<?PHP echo $_SESSION['LoginID']?>"><?PHP echo $_SESSION['LoginID']?></a>]
						<?PHP
						}
						else
						{
						?>
						<a href="login.php" class="smallbluelink"><b>Click here to login</b></a>
						<?PHP
						}
						?>
						<br>
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
<td align="center" bgcolor="#eeeeee" valign="top" width="170"><span style="line-height: 5px;"><br></span>
<!-- LEFT BANNER STARTS HERE -->
<?PHP
 include "myleftbar.php";
?>
<!-- LEFT BANNER ENDS HERE -->
</td>
<td height="1" width="10"><spacer type="block" height="1" width="10"></td>
<td valign="top" align="left">  <p class="largeblueboldlink"><strong>Update To Gold Member Now...</strong></p>

<?PHP
			if ($_REQUEST['payment']=="nochex")
				{						
					echo '<form action="https://www.nochex.com/nochex.dll/checkout" name="form1" id="frm1" method="post">';
					echo '<input type="hidden" name="email" value="'.$rowsettings['nochex'].'">';
					echo '<input type="hidden" name="amount" value="'.$rowsettings['goldmemberfee'].'">';
					echo '<input type="hidden" name="ordernumber" value="'.$_SESSION['UserID'].'">';
					echo '<input type="hidden" name="description" value="Gold Member Update for '.$_SESSION['LoginID'].'">';						
					echo "<input type='hidden' name='returnurl' value='".$rowsettings['url']."/goldmember.php?ncid=".$_SESSION['UserID']."'>";
					echo "<input type='hidden' name='cancelurl' value='".$rowsettings['url']."/fail.php'>";
					echo ".";
				}
				elseif ($_REQUEST['payment']=="paypal")
				{
					echo '<form action="https://www.paypal.com/cgi-bin/webscr" name="form1" id="frm1" method="post">';
					echo '<input type="hidden" name="cmd" value="_xclick">';
					echo '<input type="hidden" name="business" value="'.$rowsettings['paypal'].'">';						
					echo '<input type="hidden" name="item_name" value="Gold Member Update for '.$_SESSION['LoginID'].'">';				
					echo "<input type='hidden' name='item_number' value='".$_SESSION['UserID']."'>";						
					echo "<input type='hidden' name='amount' value='".$rowsettings['goldmemberfee']."'>";
					echo '<input type="hidden" name="currency_code" value="USD">';
					echo "<input type='hidden' name='custom' value='".$_SESSION['UserID']."'>";
					echo "<input type='hidden' name='invoice' value='".$_SESSION['UserID']."'>";											
					echo "<input type='hidden' name='return' value='".$rowsettings['url']."/goldmember.php?pid=".$_SESSION['UserID']."'>";
					echo "<input type='hidden' name='rm' value='2'>";
					echo "<input type='hidden' name='cbt' value='Click here to Continue'>";
					echo "<input type='hidden' name='cancel_return' value='".$rowsettings['url']."/fail.php'>";
					echo ".";						
				}
				elseif ($_REQUEST['payment']=="2co")
				{
					
					?><form name="frm1" id="frm1" action="https://www.2checkout.com/2co/buyer/purchase" method="post" >
					.
					<?PHP
					echo ".";
					echo '<input type="hidden" name="sid" value="'.$rowsettings['twoco'].'">';
					echo "<input type='hidden' name='total' value='".$rowsettings['goldmemberfee']."'>";
					echo "<input type='hidden' name='cart_order_id' value='".$_SESSION['UserID']."'>";
					echo "<input type='hidden' name='return_url' value='".$rowsettings['url']."/goldmember.php?coid=".$_SESSION['UserID']."'>";
					echo "<input type='hidden' name='cancel_return' value='".$rowsettings['url']."/fail.php'>";
					echo "<input type='hidden' name='cancel' value='".$rowsettings['url']."/fail.php'>";
					echo "<input type='hidden' name='cancel_url' value='".$rowsettings['url']."/fail.php'>";
					echo "<input type='hidden' name='cancelurl' value='".$rowsettings['url']."/fail.php'>";
					echo '<input type="hidden" name="tco_currency" value="USD">';
					echo "<input type='hidden' name='fixed' value='Y'>";


				}	
		
		?>

</form>

<?PHP
	echo "<script language='javascript' type='text/javascript'>document.getElementById('frm1').submit();</script>";
?>
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