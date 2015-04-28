<?PHP
	session_start();
	include("connection.php");
	
$sqlsettings = "SELECT * from admin";
$resultsettings = mysql_query($sqlsettings);
$rowsettings = mysql_fetch_array($resultsettings);

	
	$msg = 0;

	if($_REQUEST['confirm']!=""){
		$query = "SELECT * from users WHERE ConfirmationCode='".mysql_escape_string($_REQUEST['confirm'])."' and Status=0";		
		
		$result = mysql_query ($query);
		if(@mysql_num_rows($result) != 0)
		{
			$row = @mysql_fetch_array($result);
			$query5 = "update users set Status=1 where ConfirmationCode='".mysql_escape_string($_REQUEST['confirm'])."'";
			
			$result5 = mysql_query($query5);
			$msg = 1;

			$_SESSION['UserID_reg']=$row['UserID'];
			$_SESSION['LoginID_reg']=$row['LoginID'];
			$_SESSION['EmailAddress_reg']=$row['EmailAddress'];
			$insert = "insert into user_profile(UserID) VALUES(".$row['UserID'].")";
			
			$resultt = mysql_query($insert);
			
			$insert = "insert into partner_profile(UserID) VALUES(".$row['UserID'].")";			
			
			$resultt = mysql_query($insert);

		}
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Marry Banjara - Registration Confirmation</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/registrationconfirmation.css">

</head>

<body topmargin="2" leftmargin="0" oncontextmenu="return false" onselectstart="return false" ondragstart="return false" marginheight="2" marginwidth="0" background="images/background.jpg">


<script language="javascript" src="js/matrimonials-v10.js"></script>
			<!-- The top link table start's here -->
			<center>
		
				<!-- The top link table starts here -->
				<div style="width: 762px;" align="right">
					<?PHP
					include("topheader.php");
					?>
				</div>
				<!-- The top link table ends here -->
			
			
			</center>

<center>
<div style="width: 762px;">
	<div class="mediumblack" style="border-style: solid; border-color: rgb(143, 167, 191); border-width: 0px 1px 1px; background: rgb(255, 255, 255) none repeat scroll 0%; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial;">
		<div style="width: 760px;">
			<div style="width: 30px; float: left;"><br></div>
 			<div style="margin: 0pt 0pt 10px 0px; width: 700px; float: left;"><div style="float: left; text-align: left; padding-top: 10px;">
			
			<?PHP
		if($msg == 1){
		?>
		<strong>Congratulations!</strong> Your Registration has been successfully Completed...
		<br>
		<br>
		You can now login and update your profile! Your profile will be listed in website after the approval from website administration..
		<?PHP
		}
		else{
		?>
		Oooops! Your Registration has not been successfully Completed... Please follow the Registration Confirmation Link propely to complete your registration..
		<?PHP
		}
		?>

				</div>

				<br clear="all"><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
				<br clear="all">
		  </div>



			<!-- YAHOO CODE -->
							<!-- YAHOO CODE-->



			
			
			<div id="regform">



				<div style="background: transparent url(images/registration-bg.jpg) repeat-x scroll center bottom; width: 90%; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial;">


					<br clear="all">
			  </div>

			</div>

			<!-- BTM EN -->

			<div style="border-top: 1px solid rgb(143, 167, 191); margin: 0pt 5px; width: 91%;">

				<!-- POLICY + SUBMIT ST -->
				<div class="smallblack" style="padding: 12px 0pt 0pt 25px; text-align: left;">				    <b>
					 <label for="affirm" style="cursor: pointer; font-family: arial; font-style: normal; font-variant: normal; font-weight: bold; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal;"></label></b></div>
				<!-- POLICY + SUBMIT EN -->

			</div>
			<!-- BTM EN -->
			

	  </div><br><br>



		</div>
	</div>


</center>




			<center>
				<div class="smalldgray" style="width: 760px; text-align: left; font-family: Tahoma; font-style: normal; font-variant: normal; font-weight: normal; font-size: 10px; line-height: normal; font-size-adjust: none; font-stretch: normal;">
					<div style="margin: 0px;">
						<div style="width: 100%; text-align: center;">
						
		<br>
		<div style="width: 100%; text-align: center; margin-bottom: 5px;">
			<div style="padding: 0pt 0pt 0pt 14px; width: 100%;">
				<?PHP
				include("footer.php");
				?>
						</div>
					</div>
				</div>
			</center>

</body></html>