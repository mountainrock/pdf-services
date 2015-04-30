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
<title>Marry Banjara - Register</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/register.css">
<script language="javascript" src="js/register.js"></script>
</head>

<body topmargin="2" leftmargin="0" oncontextmenu="return false" onselectstart="return false" ondragstart="return false" marginheight="2" marginwidth="0" background="images/background.jpg">


<script language="javascript" src="js/matrimonials-v10.js"></script>
			<!-- The top link table start's here -->
			<center>

				<!-- The top link table starts here -->
				<div style="width: 762px;" align="right">
					<?php
					include("topheader.php");
					?>
				</div>
				<!-- The top link table ends here -->

			<!-- The topbanner table start's here -->
			<div style="width: 762px; background-color: rgb(255, 255, 255);">
			<div style="border-top: 1px solid rgb(143, 167, 191); border-left: 1px solid rgb(143, 167, 191); border-right: 1px solid rgb(143, 167, 191);">




				<!-- midlinks + services space end's here -->


			</div>
			</div>
			<!-- The topbanner table ends here -->
			</center>
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