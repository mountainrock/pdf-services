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


$sql = "SELECT * FROM users, user_profile, countries WHERE users.UserID=user_profile.UserID and users.CountryID=countries.CountryID and users.UserID=".$_SESSION['UserID'];
$result = mysql_query($sql,$conn);
$row = @mysql_fetch_array($result);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Marry Banjara - My Messages</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="css/style.css">
<script language="javascript" src="js/ajax-v2-inc-mod.js"></script>
<script language="javascript" src="js/tool-tip.js"></script>
<script language="javascript" src="js/common_002.js"></script>
<script language="javascript" src="js/ajax-v2-inc-mod.js"></script>
<link rel="stylesheet" href="css/messages.css">
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
				<h2>Interests Expressed</h2>
			</div>



<?PHP
$sqlProduct="select * from interests i, users u where u.UserID=i.RecieverID and i.SenderID='".$_SESSION['UserID']."' order by MessageDate desc";
$resultProduct=mysql_query($sqlProduct);
?>

 <div style="font:'Times New Roman', Times, serif; text-align:center;">
  	<b><? echo $_GET['msg'];?></b>
  </div>


<table width="100%" cellpadding="3" >

<Tr bgcolor="#990000">
<td class='adminvalues' width='30%' style="color:#FFFFFF;"><strong>Interest Expressed To</strong></td>
<td align='Center' width='40%' style="color:#FFFFFF;"><strong>Message Date</strong></td>
<td align='Center' width='40%' style="color:#FFFFFF;"><strong>Action</strong></td>
</tr>
									<!-- Start Catetory Admin -->
									<?
										if (@mysql_num_rows($resultProduct)!=0){
											$color = 0;
											while($row = @mysql_fetch_array($resultProduct))
											{

											if($row['AcceptStatus']==1)
											{
											if ($color==0){
													echo "<Tr bgcolor='#fff7e7'>
														<td class='adminvalues' width='30%'><a class='edit2' href='profile.php?id=".$row['RecieverID']."'><strong>".$row['Name']." [".$row['RecieverID']."]</strong></a></td>
														<td align='Center' width='40%'>".$row['MessageDate']."</td>
														<td align='Center' width='40%'><strong>Accepted</strong></td>
														</tr>";
														$color = 1;
												}
												else{
													echo "<Tr bgcolor='#ffffff'>
														<td class='adminvalues' width='30%'><a class='edit2' href='profile.php?id=".$row['RecieverID']."'><strong>".$row['Name']." [".$row['RecieverID']."]</strong></a></td>
														<td align='Center' width='40%'>".$row['MessageDate']."</td>
														<td align='Center' width='40%'><strong>Accepted</strong></td>
														</tr>";
														$color = 0;
												}
											}
											else if($row['DenyStatus']==1)
											{
												if ($color==0){
													echo "<Tr bgcolor='#fff7e7'>
														<td class='adminvalues' width='30%'><a class='edit2' href='profile.php?id=".$row['RecieverID']."'><strong>".$row['Name']." [".$row['RecieverID']."]</strong></a></td>
														<td align='Center' width='40%'>".$row['MessageDate']."</td>
														<td align='Center' width='40%'><strong>Denied</strong></td>
														</tr>";
														$color = 1;
												}
												else{
													echo "<Tr bgcolor='#ffffff'>
														<td class='adminvalues' width='30%'><a class='edit2' href='profile.php?id=".$row['RecieverID']."'><strong>".$row['Name']." [".$row['RecieverID']."]</strong></a></td>
														<td align='Center' width='40%'>".$row['MessageDate']."</td>
														<td align='Center' width='40%'><strong>Denied</strong></td>
														</tr>";
														$color = 0;
												}
											}

											else if($row['DenyStatus']==0 && $row['AcceptStatus']==0)
											{
												if ($color==0){
													echo "<Tr bgcolor='#fff7e7'>
														<td class='adminvalues' width='30%'><a class='edit2' href='profile.php?id=".$row['RecieverID']."'><strong>".$row['Name']." [".$row['RecieverID']."]</strong></a></td>
														<td align='Center' width='40%'>".$row['MessageDate']."</td>
														<td align='Center' width='40%'><strong>Wating for the Action</strong></td>
														</tr>";
														$color = 1;
												}
												else{
													echo "<Tr bgcolor='#ffffff'>
														<td class='adminvalues' width='30%'><a class='edit2' href='profile.php?id=".$row['RecieverID']."'><strong>".$row['Name']." [".$row['RecieverID']."]</strong></a></td>
														<td align='Center' width='40%'>".$row['MessageDate']."</td>
														<td align='Center' width='40%'><strong>Wating for the Action</strong></td>
														</tr>";
														$color = 0;
												}
											}

											}
													echo "<Tr class='currentData' bgcolor='#cccccc'  height='3'>
														<td> </td>
														<td align='Center'></td>
														<td align='Center'></td>
														</tr>";
														$color = 0;

										}
									?>
								</table>
	<br>

	<div style="padding-left: 127px; text-align: left;" class="mediumblack"></div>





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