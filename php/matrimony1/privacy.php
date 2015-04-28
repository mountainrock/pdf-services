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
	
</div>
<!-- REGISTER/UPGRADE CONTENT ST-->

<div class="width smallcnt" style="background-image:url(images/background.jpg)">
<div class="left graytxt" style="width: 760px;background-image:url(images/background.jpg); height:5px;"></div>
	<div class="left graytxt" style="width: 760px">
		
	<table class="left tleft smallcnt graytxt" border="0" cellpadding="0" cellspacing="0" style="padding:10px;border:3px solid #F93;background-color:#FFC">
    <tr>
    <td>
<div align="justify">
<h2 style="text-decoration:underline"> Privacy Policy</h2>
    <p><b>gorbanjara.net</b> is an online matrimonial portal endeavoring constantly to provide you with premium matrimonial services. This privacy statement is common to all the matrimonial sites operated under gorbanjara.net. Since we are strongly committed to your right to privacy, we have drawn out a privacy statement with regard to the information we collect from you.
      <br/>   
      </p>
	  <p><b></b> We use a secure server for credit card transactions to protect the credit card information of our clients and Cookies are used to store the login information.
      <br/>
	  </p>
	  <p><b>What information you need to give in to use this site?</b><br />We gather information from members and guests who apply for the various services our site offers. It includes, but may not be limited to, email address, first name, last name, a user-specified password, mailing address, zip code and telephone number or fax number.
      <br/>      
      </p>

	  <p><b></b> If you establish a credit account with us to pay the fees we charge, we collect some additional information, including a billing address, a credit card number and a credit card expiration date and tracking information from checks or money orders.
      <br/>
	  <p><b>How the site uses the information it collects/tracks?</b><br />GorBanjara collects information from our clients primarily to ensure that we are able to fulfill your requirements and to deliver Personalised experience.
      <br/>      
      </p>
	  <p><b>With whom the site shares the information it collects/tracks?</b><br />The information collected from any of our clients is not shared with any individual or organization without the former's approval. MarryBanjara.com does not sell, rent, or loan any identifiable information at the individual level regarding its customers to any third party. Any information you give us is held with the utmost care and security. We are also bound to cooperate fully should a situation arise where we are required by law or legal process to provide information about a customer.
      <br/>      
      </p>
	  <p><b>Do all visitors have to pay?</b><br />NO, All visitors to our site may browse the site, search the ads and view any articles or features our site has to offer without entering any personal information or paying money.
      <br/>      
      </p>

	  <p><b>Can users contact any number of profiles in a single day?</b><br />As a paid member of this site, you have the privilege to contact hundreds of profiles in a single day. However, there is a specified limit to 150 contacts for security reasons per day . If you want to contact more profiles than the specified limit in a single day, he/she can do so after the completion of 12 hours of their login time.
      <br/>      
      </p>
	   <p><b>Notice</b><br />We may change this Privacy Policy from time to time based on your comments or as a result of a change of policy in our company. 
      <br/>      
      </p>
	  <p>If you have any questions regarding our Privacy Statement, please write in to <b>support [AT]@gorbanjara.net</b>

      <br/>      
      </p>

    </div>
</td>
    </tr>
    </table>	

		
	</div>
</div><br clear="all">
	</div><span class="brseven"><br>


<!-- Footer starts -->
	<?PHP
	include("footer.php");
	?>
<!-- Footer ends -->
</span></center>
</body></html>