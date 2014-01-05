<tr>
                    <td class="detailedViewHeader" colspan="4"><b>Détail</b></td>
                  </tr>
                  
                  <!-- Handle the ui types display --> 
                  
                  <!-- Added this file to display the fields in Create Entity page based on ui types  -->
                  <tr style="height:25px">
                    <td width="20%" align="right" class="dvtCellLabel"><font color="red">*</font>Nom <?php echo $cat; ?></td>
                    <td width="30%" align="left" class="dvtCellInfo"><input type="text"  class="detailedViewTextBox" value="<?php echo $nom; ?>" tabindex="" name="nom_<?php echo $cat; ?>"></td>
                    
                    
                    
                    <!-- Non Editable field, only configured value will be loaded -->
                    <td width="20%" align="right" class="dvtCellLabel"><font color="red"></font>Nom affaire </td>
                    <td width="30%" align="left" class="dvtCellInfo"><?php echo $nomaffaire; ?><input type="hidden"  class="detailedViewTextBox" value="<?php echo $idaffaire; ?>" tabindex="" name="idaffaire_<?php echo $cat; ?>"></td>
                  </tr>
                  <tr style="height:25px"> 
                    <td width="20%" align="right" class="dvtCellLabel">Numero devis</td>
                    <td width="30%" align="left" class="dvtCellInfo">
					<input type="text"  class="detailedViewTextBox" value="<?php echo $extsociete."d".$numerodevis; ?>" tabindex="" name="numerodevis_<?php echo $cat; ?>">
					</td>
                    <td width="20%" align="right" class="dvtCellLabel"><font color="red"></font>Nom Client </td>
                    <td width="30%" align="left" class="dvtCellInfo"><?php echo $nomclientaffaire; ?></td>
                  </tr>
                  <tr style="height:25px">
                    <td width="20%" align="right" class="dvtCellLabel"><font color="red"></font> Début sejour </td>
                    <td width="30%" align="left" class="dvtCellInfo"><input type="text" value="<?php echo $debut;?>"  style="width: 90px;" class="textbox" id="debut_<?php echo $cat; ?>" name="debut_<?php echo $cat; ?>"></td>
                    <td width="20%" align="right" class="dvtCellLabel"><font color="red">*</font> Pax Calcul</td>
                    <td width="30%" align="left" class="dvtCellInfo"><input type="text"  class="detailedViewTextBox" id = "pax_<?php echo $cat; ?>" value="<?php echo $paxcalcul; ?>" tabindex="" name="paxcalcul_<?php echo $cat; ?>"></td>
                  </tr>
                  <tr style="height:25px">
                    <td width="20%" align="right" class="dvtCellLabel"><font color="red"></font> Fin séjour </td>
                    <td width="30%" align="left" class="dvtCellInfo"><input type="text" value="<?php echo $fin;?>"  style="width: 90px;" class="textbox" id="fin_<?php echo $cat; ?>" name="fin_<?php echo $cat; ?>"></td>
                    <td width="20%" align="right" class="dvtCellLabel"><font color="red"></font>Echéance </td>
                    <td width="30%" align="left" class="dvtCellInfo"><input type="text" value="<?php echo $dateecheance;?>"  style="width: 90px;" class="textbox" id="dateecheance_<?php echo $cat; ?>" name="dateecheance_<?php echo $cat; ?>"></td>
                  </tr>
                  <tr style="height:25px">
                    <td width="20%" align="right" class="dvtCellLabel"><font color="red"></font>Phase </td>
                    <td width="30%" align="left" class="dvtCellInfo"><select class="small" tabindex="" name="phasedevis_<?php echo $cat; ?>">
                        <?php echo $phasedevisselect; ?>
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
                    <td width="20%" align="right" class="dvtCellLabel"><font color="red"></font> commentaire </td>
                    <td colspan="3"><textarea rows="8" cols="90" name="commentaire_<?php echo $cat; ?>" id="commentaire_<?php echo $cat; ?>"  class="detailedViewTextBox"><?php echo $commentaire; ?></textarea></td>
                  </tr>
                  <tr>
                    <td class="detailedViewHeader" colspan="4"><b>CGV</b></td>
                  </tr>
                  
                  <!-- Handle the ui types display --> 
                  
                  <!-- Added this file to display the fields in Create Entity page based on ui types  -->
                  <tr style="height:25px"> 
                    
                    <!-- In Add Comment are we should not display anything -->
                    <td width="20%" align="right" class="dvtCellLabel"><font color="red"></font> CGV </td>
                    <td colspan="3"><textarea rows="8" cols="90" name="cgv_<?php echo $cat; ?>" id="cgv_<?php echo $cat; ?>"  class="detailedViewTextBox"><?php echo $cgv; ?></textarea></td>
                    <input type="hidden" name = "page" value="traitement" >
                    <input type="hidden" name = "idsociete" value="<?php echo $idsociete; ?>" >
                    <input type="hidden" name = "extsociete" value="<?php echo  $extsociete; ?>" >
                   
          <input type="hidden" name = "cat" value="<?php echo $cat; ?>" >
          <input type="hidden" name = "relatifa" value="<?php echo $relatifa;?>" >
          <input type="hidden" name = "idrelation" value="<?php echo $idrelation;?>" >
          <input type="hidden" name = "id<?php echo $cat; ?>" value="<?php echo $id;?>" >
          <input type="hidden" name = "vpb" value="<?php echo $vpb; ?>" >
                    
                  </tr>
                  