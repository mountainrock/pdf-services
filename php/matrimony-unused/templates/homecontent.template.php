<script type="text/javascript">
	function toggleRegistration(){
		hideAndShow(["registerForm","mainRegisterText"]);
	}

	function validateRegistration(){
		if(this.value==''){
			txt_empty('txtEmail','emailError','Enter your EmailId');
		}else{
			email_validation('txtEmail','emailError','Enter your valid EmailId','EmailId','tm_profile');
		}
	}
</script>

<div style="float: left;margin:0px;width:100%;height:100%;" class="mainBox">
	<div style="float: left;border-right:1px solid #f8ca9e;">
		<img src="images/banner.jpg" >
	</div>

	<div id="mainRegisterText" style="float: left;height:250px;border:0px solid;padding-left:20px">
	  <br/><br/><br/><br/>
	  	<div>
	  		An exclusive Matrimony<br>Service For The <h1>Banjara Community</h1>
		 	<b>Not a member?</b><br/>
			 <a class="regbutton txtc" href="register.php">Register FREE</a>
	      </div>
	      <div style="padding-top:10px">
		      <div style="padding-left:10px;">
		       <div style="margin-left:190px;margin-top:-20px;position:absolute;"><img src="images/special-offer.gif"/></div>
			<a href="paidmembership.php" class="anchor-text">Upgrade</a> from just <b>Rs.500</b> only
		      </div>
	      </div>
	      <br/>

	</div>


	<!-- search -->
		  <div style="width:99%; float:left;height:40px;padding:5px " class="search-box">

		            <form name="homepage" action="search.php?type=gs" method="post">
		                      <table align="center" style="padding-left:120px;">
			                      <tr>
			                      	<td>
			                      	<font size="3"><b>Quick Search :</b></font>
			                      	 <input name="gender" type="radio" value="F" id="fgender" checked="checked" onclick="gen('fgender','txtagefrm','txtageto','18','40');"> <label for="fgender">Female</label> <input name="gender" type="radio" value="M" id="mgender" onclick=
			                          "gen('mgender','txtagefrm','txtageto','21','40');"> <label for="mgender">Male</label>
			                           &nbsp; aged
			                      	   <input type="text" name="txtagefrm" id="txtagefrm" value="18" maxlength="2" style="width: 20px;" onkeyup="return char_val(this,'0123456789');"/>
			                      	   To <input type="text" name="txtageto" id="txtageto" maxlength="2" value="40" style="width: 20px;" onkeyup="return char_val(this,'0123456789');"/>
			                            <input type="hidden" name="ddlReligion" id="ddlReligion" value=""/>
			                        	<input type="hidden" name="ddlCommunity" value=""/>

			                          &nbsp;&nbsp;<input type="checkbox" name="chkphoto" value="Photo" id="chkphoto"/>Photo
			                      	  <input type="hidden" name="searchindex" id="searchindex" value="generalsrc">
			                          &nbsp;&nbsp;<input type="submit" value="Search" name="submit"  onclick="return SELECTreligion('ddlReligion','ddlCommunity')" class="button"/>
			                      	</td>
			                      </tr>
		                      </table>


		             </form>
		  </div>

	<!-- Main content text -->
         <div style="float:left;padding-left:5px;width:99%;margin-top:0px " class="box-border">
               <p>We Banjara are basically from the Indian state of Rajasthan, North-West Gujarat, and Western Madhya Pradesh and Eastern Sindh province.</p>

                  <p>Our history goes back to some 2000 years and is as colourful as the costumes our women wear.</p>

                  <p>There are so many doctors,engineers, lecturers, dentists and other professionals in our banjara community. But there are very few affordable lambani community matrimonial on the internet. Most are charging ridiculously high prices for our community members.</p>

                  <p>This is a platform for those searching for their lambani life partners and is dedicated for all lambani /banjara community people who are looking for soul mates</p>

                  <p>We aim to provide service at a very affordable price <strong>(starting at Rs.500 only)</strong>. We would be glad to hear from you!</p>
                  <br>

          </div>
</div>

          <br/>

    <!--table width="800" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
      <tr>
        <td>

          <br>
           <div style="width:785px; margin:auto; background-color:#FFFFFF; height:120px; padding:0px 0px 5px 0;">
          <div style=" height:inherit; float:left; padding:5px; margin-left:2px;">
          <table width="275" style=" border:1px #CACACA  solid" >
          <tr><td rowspan="5" height="110px"><img src="./images/model.jpg" /></td>
          <td class="search"><span style="color:#578BA4"><b>Latest Profile</b></span></td>
          </tr>
          <tr><td ><span style="color:#A0A0A4">Uma</span></td></tr>
          <tr><td><span  style="color:#FF7F00">Age:</span> 25</td></tr>
          <tr><td><span  style="color:#FF7F00">Profile Created</span>:4th apr 2009</td></tr>
          <tr><td align="right"><img src="./images/more.gif" /></td></tr>
          </table>
          </div>
          <div style=" height:inherit; float:left; padding:5px; margin-left:2px;">
          <table width="250" height="111"  style=" border:1px #CACACA solid" >
          <tr><td width="32" rowspan="2"><img  src="./images/astro.jpg"/></td>
          <td width="206" height="34" colspan="2" align="left" valign="top"  class="search"><span style="color:#578BA4"><b>Astrology</b></span></td>
          </tr>
          <tr>
          <td height="34" align="center" valign="top"  class="search"><b>comming soon...</b></td>
          </tr>
          <tr>
          <td align="right" colspan="2" valign="bottom"><img src="./images/more.gif" /></td>
          </tr>
          </table>
          </div>

          <div style="height:118px; float:left; margin-left:2px; border:1px #CACACA solid; margin:5px;">
          <table width="220" height="111">
          <tr>
          <td rowspan="0" height="100" align="center" valign="top" >
                  <div class="leftFloatingDiv">
                  <div class="imageSlideshowHolder" id="imageSlideshowHolder2">
                      <img src="images/image8.jpg" width="200" height="100">
                      <img src="images/image7.jpg" width="200" height="100">
                      <img src="images/image6.jpg" width="200" height="100">
                      <img src="images/image5.jpg" width="200" height="100">
                      <img src="images/image4.jpg" width="200" height="100">
                      <img src="images/image1.jpg" width="200" height="100">
                      <img src="images/image3.jpg" width="200" height="100">
                  </div>
                  </div>
          </td>
          </tr>
          </table>
          </div>
          </div>

          <div style="width:800px; height: inherit;">
           <table width="97%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td colspan="2" align="left" valign="bottom"><img src="images/homepg_m_profiles.gif" width="185" height="45" /></td>
              <td width="577" align="left" valign="bottom" class="m_profile_top"> </td>
              <td width="14" align="left" valign="bottom"><img src="images/home_pg_top_right.gif" width="14" height="45" /></td>
            </tr>
            <tr>
              <td height="34" class="m_profile_left"></td>
              <td height="50" align="center" valign="top"><img src="images/homepg_religion_btn.gif" width="126" height="21" /></td>
              <td align="left" valign="top"><a href="?rel=Hindu" style="text-decoration:none; color:black;"> Hindu </a>|<a href="?rel=Chrisitian" style="text-decoration:none; color:black;"> Chrisitian </a>|<a href="?rel=Muslim" style="text-decoration:none; color:black;"> Muslim </a>|<a href="?rel=Jain" style="text-decoration:none; color:black;"> Jain </a>|<a href="?rel=Buddhist" style="text-decoration:none; color:black;">
          Buddhist </a>|<a href="?rel=Bahais" style="text-decoration:none; color:black;"> Baha'is </a>|<a href="?rel=Chinese Folks" style="text-decoration:none; color:black;"> Chinese Folks </a>|<a href="?rel=Confucianist" style="text-decoration:none; color:black;"> Confucianist </a>|<a href="?rel=Ethnoreligionist" style="text-decoration:none; color:black;"> Ethnoreligionist </a>|<a href="?rel=Jewish" style="text-decoration:none; color:black;"> Jewish </a>|<a href="?rel=Neoreligionist" style="text-decoration:none; color:black;"> Neoreligionist </a>|<a href="?rel=Shintoist" style="text-decoration:none; color:black;"> Shintoist </a>|<a href="?rel=Sikh" style="text-decoration:none; color:black;"> Sikh </a>|<a href="?rel=Spiritist" style="text-decoration:none; color:black;"> Spiritist </a>|<a href="?rel=Taoist" style="text-decoration:none; color:black;"> Taoist </a>|<a href="?rel=Zorastrian" style="text-decoration:none; color:black;"> Zorastrian </a> <!- -| <a href="?searchindex=home&rel=Inter-Religion" style="text-decoration:none; color:black;"> Inter-Religion </a>|<a href="" style="text-decoration:none; color:black;"> More <img src="images/site_arrow.gif" style="border:0px" /> </a>- -></td>
              <td class="m_profile_right"></td>
            </tr>
            <tr>
              <td width="11" height="36" class="m_profile_left"> </td>
              <td width="174" height="50" align="center" valign="top"><img src="images/homepg_caste_btn.gif" width="126" height="21" /></td>
              <td align="left" valign="top"><a href="?rel=Adi Dravida" style="text-decoration:none; color:black;"> Adi Dravida </a>|<a href="?rel=Agarwal" style="text-decoration:none; color:black;"> Agarwal </a>|<a href="?rel=Ansari" style="text-decoration:none; color:black;"> Ansari </a>|<a href="?rel=Brahmin - Barendra" style="text-decoration:none; color:black;"> Brahmin - Barendra </a>|<a href="?rel=Bengali" style="text-decoration:none; color:black;"> Bengali </a>|<a href="?rel=Chettiar" style="text-decoration:none; color:black;"> Chettiar </a>|<a href="?rel=Dheevara" style="text-decoration:none; color:black;"> Dheevara </a>|<a href="?rel=Gounder" style="text-decoration:none; color:black;"> Gounder </a>|<a href="?rel=Gulf Muslims" style="text-decoration:none; color:black;"> Gulf Muslims </a>|<a href="?rel=Gujarati" style="text-decoration:none; color:black;"> Gujarati </a>|<a href="?rel=Iyengar" style="text-decoration:none; color:black;"> Iyengar </a>|<a href="?rel=Iyer" style="text-decoration:none; color:black;"> Iyer </a>|<a href="?rel=Kalar" style="text-decoration:none; color:black;"> Kalar </a>|<a href="?rel=Kesadhari" style="text-decoration:none; color:black;"> Kesadhari </a>|<a href="?rel=Kongu Vellala Gounder" style="text-decoration:none; color:black;"> Kongu Vellala Gounder </a>|<a href="?rel=Labbai" style="text-decoration:none; color:black;"> Labbai </a>|<a href="?rel=Maharashtrian" style="text-decoration:none; color:black;"> Maharashtrian </a>|<a href="?rel=Mudaliyar" style="text-decoration:none; color:black;"> Mudaliyar </a>|<a href="?rel=Nair - Vilakkithala" style="text-decoration:none; color:black;"> Nair - Vilakkithala </a>|<a href="?rel=Nadar" style="text-decoration:none; color:black;"> Nadar </a>|<a href="?rel=Naidu" style="text-decoration:none; color:black;"> Naidu </a>|<a href="?rel=Naicker" style="text-decoration:none; color:black;"> Naicker </a>|<a href="?rel=Pillai" style="text-decoration:none; color:black;"> Pillai </a>|<a href="?rel=Punjabi" style="text-decoration:none; color:black;"> Punjabi </a>|<a href="?rel=Reddy" style="text-decoration:none; color:black;"> Reddy </a>|<a href="?rel=Shia" style="text-decoration:none; color:black;"> Shia </a>|<a href="?rel=Sunni Muslim" style="text-decoration:none; color:black;"> Sunni Muslim </a>|<a href="?rel=Thevar" style="text-decoration:none; color:black;"> Thevar </a>|<a href="?rel=Udayar" style="text-decoration:none; color:black;"> Udayar </a>|<a href="?rel=Vanniyar" style="text-decoration:none; color:black;"> Vanniyar </a>|<a href="?rel=Vysya" style="text-decoration:none; color:black;"> Vysya </a>|<a href="?rel=Yadav/Konar" style="text-decoration:none; color:black;"> Yadav/Konar </a></td>
              <td width="14" class="m_profile_right"> </td>
            </tr>
            <tr>
              <td height="13" align="right" valign="top"><img src="images/homepg_m_bleft.gif" width="10" height="10" /></td>
              <td class="m_profile_bottom"> </td>
              <td class="m_profile_bottom"> </td>
              <td width="14" align="right" valign="top"><img src="images/homepg_m_bright.gif" width="14" height="10" /></td>
            </tr>
          </table>

          </div>
        </td>
      </tr>
    </table -->
