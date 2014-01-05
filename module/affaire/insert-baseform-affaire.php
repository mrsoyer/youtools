<tr>
  <td class="detailedViewHeader" colspan="4"><b>Détail</b></td>
</tr>

<!-- Handle the ui types display --> 

<!-- Added this file to display the fields in Create Entity page based on ui types  -->
<tr style="height:25px">
  <td width="20%" align="right" class="dvtCellLabel"><font color="red">*</font>Nom <?php echo $cat; ?></td>
  <td width="30%" align="left" class="dvtCellInfo"><input type="text"  class="detailedViewTextBox" value="<?php echo $nom; ?>" tabindex="" id="nom_<?php echo $cat; ?>" name="nom_<?php echo $cat; ?>"></td>
  
  <!-- Non Editable field, only configured value will be loaded -->
  <td width="20%" align="right" class="dvtCellLabel"><font color="red"></font>Affaire N° </td>
  <td width="30%" align="left" class="dvtCellInfo"><input type="text"  class="detailedViewTextBox" value="<?php echo $numero; ?>" tabindex="" name="numero_<?php echo $cat; ?>"></td>
</tr>
<tr style="height:25px">
  <td width="20%" align="right" class="dvtCellLabel"><font color="red">*</font> Type </td>
  <td width="30%" align="left" class="dvtCellInfo"><select class="small" tabindex="" name="type_<?php echo $cat; ?>">
      <?php echo $typeselect; ?>
    </select></td>
  <td width="20%" align="right" class="dvtCellLabel">Client</td>
  <td width="30%" align="left" class="dvtCellInfo"><?php echo $nomclient; ?>
    <input type="hidden"  class="detailedViewTextBox" value="<?php echo $idclient; ?>" tabindex="" name="idclient_<?php echo $cat; ?>">
    <a> <img border="0" src="themes/softed/images/btnL3Search.gif" alt="Rechercher dans Affaires..." title="Rechercher dans clienr..." id="popupsh<?php echo $cat; ?>" onclick='valideopenerformclient()'></a></td>
</tr>
<tr style="height:25px">
  <td width="20%" align="right" class="dvtCellLabel"><font color="red"></font> Début sejour </td>
  <td width="30%" align="left" class="dvtCellInfo"><input type="text" value="<?php echo $debutdate;?>"  style="width: 90px;" class="textbox" id="debutdate_<?php echo $cat; ?>" name="debutdate_<?php echo $cat; ?>"></td>
  <td width="20%" align="right" class="dvtCellLabel"><font color="red">*</font>Fournisseur </td>
  <td width="30%" align="left" class="dvtCellInfo"><input type="text"  class="detailedViewTextBox" value="<?php echo $idfournisseur; ?>" tabindex="" name="idfournisseur_<?php echo $cat; ?>">
    <?php echo $fournisseur; ?></td>
</tr>
<tr style="height:25px">
  <td width="20%" align="right" class="dvtCellLabel"><font color="red"></font> Fin séjour </td>
  <td width="30%" align="left" class="dvtCellInfo"><input type="text" value="<?php echo $findate;?>"  style="width: 90px;" class="textbox" id="findate_<?php echo $cat; ?>" name="findate_<?php echo $cat; ?>"></td>
  <td width="20%" align="right" class="dvtCellLabel"><font color="red"></font>Pax </td>
  <td width="30%" align="left" class="dvtCellInfo"><input type="text"  class="detailedViewTextBox" value="<?php echo $pax; ?>" tabindex="" name="pax_<?php echo $cat; ?>"></td>
</tr>
<tr style="height:25px">
  <td width="20%" align="right" class="dvtCellLabel"><font color="red">*</font>Origine </td>
  <td width="30%" align="left" class="dvtCellInfo"><select class="small" tabindex="" name="origine_<?php echo $cat; ?>">
      <?php echo $origineselect; ?>
    </select></td>
  <td width="20%" align="right" class="dvtCellLabel"><font color="red">*</font> Nom Pax </td>
  <td width="30%" align="left" class="dvtCellInfo"><input type="text"  class="detailedViewTextBox" value="<?php echo $nompax; ?>" tabindex="" name="nompax_<?php echo $cat; ?>"></td>
</tr>
<tr style="height:25px">
  <td width="20%" align="right" class="dvtCellLabel"><font color="red"></font>Société </td>
  <td width="30%" align="left" class="dvtCellInfo"><select class="small" tabindex="" name="societe_<?php echo $cat; ?>">
      <?php echo $societeselect; ?>
    </select></td>
  <td width="20%" align="right" class="dvtCellLabel"><font color="red"></font>Echéance </td>
  <td width="30%" align="left" class="dvtCellInfo"><input type="text" value="<?php echo $echeance;?>"  style="width: 90px;" class="textbox" id="echeance_<?php echo $cat; ?>" name="echeance_<?php echo $cat; ?>"></td>
</tr>
<tr style="height:25px">
  <td width="20%" align="right" class="dvtCellLabel"><font color="red"></font>Phase de vente </td>
  <td width="30%" align="left" class="dvtCellInfo"><select class="small" tabindex="" name="phasedevente_<?php echo $cat; ?>">
      <?php echo $phasedeventeselect; ?>
    </select></td>
  <td width="20%" align="right" class="dvtCellLabel"><font color="red"></font>Assigné à </td>
  <td width="30%" align="left" class="dvtCellInfo"><select class="small" tabindex="" name="assigne_<?php echo $cat; ?>">
      <?php echo $assigneselect; ?>
    </select></td>
</tr>

<!-- This is added to display the existing comments -->

<tr>
  <td class="detailedViewHeader" colspan="4"><b>Information</b></td>
</tr>

<!-- Handle the ui types display --> 

<!-- Added this file to display the fields in Create Entity page based on ui types  -->
<tr style="height:25px"> 
  
  <!-- In Add Comment are we should not display anything -->
  <td width="20%" align="right" class="dvtCellLabel"><font color="red"></font> Description </td>
  <td colspan="3"><textarea rows="8" cols="90" name="description_<?php echo $cat; ?>" id="description_<?php echo $cat; ?>"  class="detailedViewTextBox"><?php echo $description; ?></textarea></td>
  <input type="hidden" name = "page" value="traitement" >
  <input type="hidden" name = "cat" value="<?php echo $cat; ?>" >
  <input type="hidden" name = "relatifa" value="<?php echo $relatifa;?>" >
  <input type="hidden" name = "idrelation" value="<?php echo $idrelation;?>" >
  <input type="hidden" name = "id<?php echo $cat; ?>" value="<?php echo $id;?>" >
  <input type="hidden" name = "vpb" value="<?php echo $vpb; ?>" >
  </form>
</tr>