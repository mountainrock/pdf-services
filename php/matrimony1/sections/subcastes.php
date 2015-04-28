<select id="caste" name="caste" >
<option selected="true" value="">-- Select --</option>
  <?php
  for($i=0;$i< sizeof($subCastesArray); $i++){
    $casteSelected = $_SESSION['search_param_caste'] == $subCastesArray[$i] || $_REQUEST['caste'] == $subCastesArray[$i] ? "selected='selected'": "";
    echo "<option value='".$subCastesArray[$i]."'".$casteSelected.">".$subCastesArray[$i]."</option>";
   }
  ?>
</select>
 