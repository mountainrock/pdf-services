<tr>
									<td valign="middle" colspan="3" align="left">
									<br/>
										<span class="redText" style="font-size:18px;">Quick Search</span>
										<hr/>
									</td>
								</tr>

								<tr>

								<td align="left">

<div class="left" style="">

											<!-- SEARCH FORM ST-->
											<?php
											/*echo $_SESSION['search_param_ageFrom'];
											echo $_SESSION['search_param_ageTo'];
											echo $_SESSION['search_param_gender'];
											echo $_SESSION['search_param_caste'];
											*/
											?>
											<form method="get" action="searchresults.php" name="quicksearch" style="margin: 0px;">
												<div style="padding: 7px 0pt 3px 0px;">
												<table>
												<tr>
												<td>Search </td>
												<td>
												   <select name="gender" style="width: 65px;">

													<?php
													if($_SESSION['Gender']=="Female"){
														echo "<option value='Male' selected='selected'>Groom</option>";
													}else if($_SESSION['Gender']=="Male")
													{
														echo "<option value='Female' selected='selected'>Bride</option>";
													}
													else{
													    $selectFemale = $_SESSION['search_param_gender'] == 'Female' ? "selected='selected'":"";
													    $selectMale = $_SESSION['search_param_gender'] == 'Male' ? "selected='selected'":"";
														echo "<option value='Female' ".$selectFemale.">Bride</option>";
														echo "<option value='Male' ".$selectMale.">Groom</option>";
													}
													?>


													</select>
												</td>
												</tr>

												<tr>
													<td>Age </td>
													<td>
														<select name="agefrom" style="width: 44px;">
														<?php
														   for ($i = 18; $i <= 70; $i++) {
														     $ageFromSelect = $_SESSION['search_param_ageFrom'] == $i ? " selected='selected' ": "";
														     echo "<option value='".$i."' ".$ageFromSelect.">".$i."</option>";
														   }
														?>
														</select>
														to <select name="ageto" style="width: 44px;">
														<?php
														   for ($i = 18; $i <= 70; $i++) {
															 $ageToSelect = $_SESSION['search_param_ageTo'] == $i ? " selected='selected' ": "";
															 echo "<option value='".$i."' ".$ageToSelect.">".$i."</option>";
														   }
														?>
														</select>
													</td>
													<td>yrs
													</td>
												</tr>
													<!-- &nbsp; with photo <input name="photograph" value="Yes" type="checkbox" style="vertical-align: bottom;"> -->


											  <tr>
											    <td>Caste</td>
												<td>
													<?php include("sections/subcastes.php"); ?>
												</td>

											   <td>

									<input  style="border:none;padding:1px" src="images/go.gif" title="Search" align="top" border="0" type="image"/>
												</td>
											 </tr>
								</table>
								</div>

											</form>
											<!-- SEARCH FORM EN-->
										</div>
							</td>