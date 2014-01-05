<?php




			

			
if(isset($_REQUEST['id'.$cat]) && $_REQUEST['id'.$cat]!= ""){
	
	$id = $_REQUEST['id'.$cat];
	
	$sql = "SELECT * FROM `".$cat."` WHERE `id` = $id  ";
	
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($data = mysql_fetch_assoc($req)) {
		
		
		
		
		$nom 				= $data['nom'];
		$telbureau			= $data['telbureau'];
		$telmobile			= $data['telmobile'];
		$teldiv				= $data['teldiv'];
		$fax				= $data['fax'];
		$secondmail		= $data['secondmail'];
		$origine			= $data['origine'];
		$assigne			= $data['assigne'];
		$adresse			= $data['adresse'];
		$ville				= $data['ville'];
		$codepostal		= $data['codepostal'];
		$pays				= $data['pays'];
		$site				= $data['site'];
		$description		= $data['description'];
		$photo				= $data['photo'];
		$codecompta		= $data['codecompta'];
		$contactlie		= $data['contactlie'];
		$datecrea			= $data['datecrea'];
		$datemodif			= $data['datemodif'];
		$usermodif			= $data['usermodif'];

			
		
			
			
		
		
$tabs = $_REQUEST[$cat.$id];

if 	($tabs == ""){
	
	$tabs = 0;
	
}
		
		
		
		
		
		
	}
		
}else{
	
	$id = "new";
}

if(isset($contactlie)){
	$sql = "SELECT * FROM `contact` WHERE id = $contactlie ";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	
	$icontactlie = 0;
	while($data = mysql_fetch_assoc($req)) {
		
		
		
			$nomprenomcontact = "<input type=\"text\" disabled=\"disabled\"  value=\"".$data['prenom']." ".$data['nom']."\" tabindex=\"\" name=\"nomcontact_".$cat."\" >
			<a><img border=\"0\" src=\"themes/softed/images/settingsBox.png\" alt=\"Rechercher dans Affaires...\" title=\"Rechercher dans clienr...\" id=\"nom".$cat."_affaire\" onclick='editformcontact()'></a>
			
			
			

			
			
			";
		
		$icontactlie++;
		
	}
	}
	if($icontactlie == 0){
		
		$nomprenomcontact = "<input type=\"text\" disabled=\"disabled\"   tabindex=\"\" name=\"nomcontact_".$cat."\" >";
		
		
	}
	
	 		if($wintype=="popup" && $id != "new" ){
													
													if(isset($_REQUEST['js'])) {
		
														$getjs = "&js=".$_REQUEST['js'];
													
														$sqlpopupaction = "SELECT  * FROM js WHERE js = '".$_REQUEST['js']."' LIMIT 1 ";
														$req = mysql_query($sqlpopupaction) or die('Erreur SQL !<br>'.$sqlpopupaction.'<br>'.mysql_error());
													
														while($data = mysql_fetch_assoc($req)) {
															
															$js = $data['script'];
															
														}
													
													}
												 /*window.opener.document.formulairecontact.sh_relatif_tache.value=document.formulairecontact_".$cat.".text".$data['id'.$cat].".value;
												
													self.close();*/
													
												  $selectpopup = "
												  
												  <script type='text/javascript'>
													function validepopupform".$id."(){
													
													".str_replace("[id".$cat."]",$id,$js)."
												
													}
													</script>
												  
												  <input type='hidden' value='".$id."' id='text".$id."' name='text".$id."' />
									
												<input  type='hidden' value='".$nom."' id='nomtext".$id."' name='nomtext".$id."' />
									<input class=\"crmbutton small save\" type='button' value='Select & Close' onclick='validepopupform".$id."()' />
									
									";
												 
											 }else{
												 
												 $selectpopup = "";
												 
												 
											 }
											 
$sql = "SELECT * FROM `origine` ";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
$origineselect = "";
while($data = mysql_fetch_assoc($req)) {
	
	if($data['id'] == $origine){
	
		$origineselect .= "<option selected='selected' value=\"".$data['id']."\">".$data['origine']."</option>";
	
	}else{
		
		$origineselect .= "<option value=\"".$data['id']."\">".$data['origine']."</option>";
		
	}
	
}

$sql = "SELECT * FROM `user` ";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
$assigneselect = "";
while($data = mysql_fetch_assoc($req)) {
	
	if($data['id'] == $assigne){
	
		$assigneselect .= "<option selected='selected' value=\"".$data['id']."\">".$data['pseudo']."</option>";
	
	}else{
		
		$assigneselect .= "<option value=\"".$data['id']."\">".$data['pseudo']."</option>";
		
	}
	
}
?>
<script>
$(window).load(function() {
 
    $("#formulairecontact_<?php echo $cat;?>").validity(function() {
		
		$("#nom_<?php echo $cat;?>").require("Veuillez saisir un nom de tache");
 
    });
 
});



$(function() {

var tabs = $( "#tabs" ).tabs({
collapsible: true ,
active: <?php echo $tabs; ?>
});
tabs.find( ".ui-tabs-nav" ).sortable({
axis: "x",
stop: function() {
tabs.tabs( "refresh" );
}
});


});


function valideopenerformcontact(){ var popy= window.open('popup.php?page=list&cat=contact&js=insert-<?php echo $cat;?>-valideopenerformcontact','popup_form','menubar=no,status=no,top=50%,left=50%,height=700,width=900,scrollbars=1') } 


function editformcontact(){ var popy= window.open('popup.php?page=insert&cat=contact&idcontact=<?php echo $idcontact; ?>','popup_form','menubar=no,status=no,top=50%,left=50%,height=700,width=900,scrollbars=1') } 



</script>

<div id="tabs">
<ul>
  <li><a href="#tabs-1" class="tabs-1">Client information</a></li>
  <?php
if($id != "new"){
	
	echo "<li><a href=\"#tabs-2\" class=\"tabs-2\">Information supplementaire</a></li>";
}
?>
</ul>
<div id="tabs-1">
  <table width="100%" cellspacing="0" cellpadding="3" border="0" class="dvtContentSpace" style="border-bottom:0;">
    <tbody>
      <tr valign="top">
        <td><form enctype="multipart/form-data" id="formulairecontact_<?php echo $cat;?>" name="formulairecontact_<?php echo $cat;?>" action="<?php echo $chemin."traitement".$wintype."form.php"; ?>" method="post">
            <table width="100%" cellspacing="0" cellpadding="5" border="0">
              <tbody>
                <tr>
                  <td class="lvtHeaderText" style="border-bottom:1px dotted #cccccc"><table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                      <tbody>
                        <tr>
                          <td><span class="lvtHeaderText">Gestion des Clients</span> <br></td>
                        </tr>
                      </tbody>
                    </table></td>
                </tr>
                <tr>
                  <td><table width="100%" cellspacing="0" cellpadding="0" border="0" class="small">
                      <tbody>
                        <tr>
                          <td colspan="4" style="padding:5px"><div align="center">
                              <input type="submit" style="width:70px" value="Sauver" name="button"  class="crmbutton small save" accesskey="S" title="Enregistrer [Alt+S]">
                              <input type="submit" style="width:70px" value="SaveQuit" name="button"  class="crmbutton small save" accesskey="S" title="Enregistrer [Alt+S]">
                              <input type="button" title="Annuler [Alt+X]" accesskey="X" class="crmbutton small cancel" onclick="window.history.back()" name="button" value="Annuler" style="width:70px">
                              <?php echo $selectpopup; ?> </div></td>
                        </tr>
                        
                        <!-- included to handle the edit fields based on ui types --> 
                        
                        <!-- This is added to display the existing comments -->
                        
                        <tr>
                          <td colspan="4" class="detailedViewHeader"><b>Détail</b></td>
                        </tr>
                        
                        <!-- Handle the ui types display --> 
                        
                        <!-- Added this file to display the fields in Create Entity page based on ui types  -->
                        <tr style="height:25px">
                          <td width="20%" align="right" class="dvtCellLabel"><font color="red">*</font>Nom Client </td>
                          <td width="30%" align="left" class="dvtCellInfo"><input type="text"  class="detailedViewTextBox" value="<?php echo $nom; ?>" tabindex="" id="nom_<?php echo $cat;?>" name="nom_<?php echo $cat;?>"></td>
                          
                          <!-- Non Editable field, only configured value will be loaded -->
                          <td width="20%" align="right" class="dvtCellLabel"><font color="red"></font>Tel bureaux</td>
                          <td width="30%" align="left" class="dvtCellInfo"><input type="text"  class="detailedViewTextBox" value="<?php echo $telbureau; ?>" tabindex="" id="telbureau_<?php echo $cat;?>" name="telbureau_<?php echo $cat;?>"></td>
                        </tr>
                        <tr style="height:25px">
                          <td width="20%" align="right" class="dvtCellLabel"><font color="red">*</font> Origine </td>
                          <td width="30%" align="left" class="dvtCellInfo"><select class="small" tabindex="" name="origine_<?php echo $cat;?>">
                              <?php echo $origineselect; ?>
                            </select></td>
                          <td width="20%" align="right" class="dvtCellLabel"><font color="red">&nbsp;</font>Tel mobile</td>
                          <td width="30%" align="left" class="dvtCellInfo"><input type="text"  class="detailedViewTextBox" value="<?php echo $telmobile; ?>" tabindex="" id="telmobile_<?php echo $cat;?>" name="telmobile_<?php echo $cat;?>"></td>
                        </tr>
                        <tr style="height:25px">
                          <td width="20%" align="right" class="dvtCellLabel"><font color="red"></font>Assigné à</td>
                          <td width="30%" align="left" class="dvtCellInfo"><select class="small" tabindex="" name="assigne_<?php echo $cat;?>">
                              <?php echo $assigneselect; ?>
                            </select></td>
                          <td width="20%" align="right" class="dvtCellLabel"><font color="red">*</font><font color="red">&nbsp;</font>Tel div</td>
                          <td width="30%" align="left" class="dvtCellInfo"><input type="text"  class="detailedViewTextBox" value="<?php echo $teldiv; ?>" tabindex="" id="teldiv_<?php echo $cat;?>" name="teldiv_<?php echo $cat;?>"></td>
                        </tr>
                        <tr style="height:25px">
                          <td width="20%" align="right" class="dvtCellLabel">Code compta</td>
                          <td width="30%" align="left" class="dvtCellInfo"><input type="text"  class="detailedViewTextBox" value="<?php echo $codecompta; ?>" tabindex="" id="codecompta_<?php echo $cat;?>" name="codecompta_<?php echo $cat;?>"></td>
                          <td width="20%" align="right" class="dvtCellLabel"><font color="red"></font><font color="red">&nbsp;</font>Fax</td>
                          <td width="30%" align="left" class="dvtCellInfo"><input type="text"  class="detailedViewTextBox" value="<?php echo $fax; ?>" tabindex="" id="fax_<?php echo $cat;?>" name="fax_<?php echo $cat;?>"></td>
                        </tr>
                        <tr style="height:25px">
                          <td width="20%" align="right" class="dvtCellLabel"><font color="red">*</font>Contact </td>
                          <
                          <td width="30%" align="left" class="dvtCellInfo"><?php echo $nomprenomcontact; ?>
                            <input type="hidden"  class="detailedViewTextBox" value="<?php echo $contactlie; ?>" tabindex="" name="contactlie_<?php echo $cat;?>">
                            <a> <img border="0" src="themes/softed/images/btnL3Search.gif" alt="Rechercher dans Affaires..." title="Rechercher dans clienr..." id="popupsh<?php echo $cat;?>" onclick='valideopenerformcontact()'></a></td>
                          <td width="20%" align="right" class="dvtCellLabel"><font color="red">*</font> email </td>
                          <td width="30%" align="left" class="dvtCellInfo"><input type="text"  class="detailedViewTextBox" value="<?php echo $secondmail; ?>" tabindex="" name="secondmail_<?php echo $cat;?>" id="secondmail_<?php echo $cat;?>"></td>
                        </tr>
                        
                        <!-- This is added to display the existing comments -->
                        
                        <tr>
                          <td colspan="4" class="detailedViewHeader"><b>Adresse</b></td>
                        </tr>
                        
                        <!-- Handle the ui types display --> 
                        
                        <!-- Added this file to display the fields in Create Entity page based on ui types  -->
                        <tr style="height:25px"> 
                          
                          <!-- In Add Comment are we should not display anything -->
                          <td width="20%" align="right" class="dvtCellLabel"><font color="red"></font> Adresse </td>
                          <td colspan="1"><textarea rows="8" cols="8" name="adresse_<?php echo $cat;?>" id="adresse_<?php echo $cat;?>"  class="detailedViewTextBox"><?php echo $adresse; ?></textarea></td>
                          <td colspan="2"><table width="100%" cellspacing="0" cellpadding="0" border="0" class="small">
                              <tbody>
                                <tr style="height:25px">
                                  <td width="20%" align="right" class="dvtCellLabel"><font color="red">*</font> Ville </td>
                                  <td width="30%" align="left" class="dvtCellInfo"><input type="text"  class="detailedViewTextBox" value="<?php echo $ville; ?>" tabindex="" name="ville_<?php echo $cat;?>" id="ville_<?php echo $cat;?>"></td>
                                </tr>
                                <tr style="height:25px">
                                  <td width="20%" align="right" class="dvtCellLabel"><font color="red">*</font> Code	Postal </td>
                                  <td width="30%" align="left" class="dvtCellInfo"><input type="text"  class="detailedViewTextBox" value="<?php echo $codepostal; ?>" tabindex="" name="codepostal_<?php echo $cat;?>" id="codepostal_<?php echo $cat;?>"></td>
                                </tr>
                                <tr style="height:25px">
                                  <td width="20%" align="right" class="dvtCellLabel"><font color="red">*</font> Pay </td>
                                  <td width="30%" align="left" class="dvtCellInfo"><input type="text"  class="detailedViewTextBox" value="<?php echo $pays; ?>" tabindex="" name="pays_<?php echo $cat;?>" id="pays_<?php echo $cat;?>"></td>
                                </tr>
                              </tbody>
                            </table></td>
                        </tr>
                        <tr>
                          <td colspan="4" class="detailedViewHeader"><b>Information</b></td>
                        </tr>
                        
                        <!-- Handle the ui types display --> 
                        
                        <!-- Added this file to display the fields in Create Entity page based on ui types  -->
                        <tr style="height:25px"> 
                          
                          <!-- In Add Comment are we should not display anything -->
                          <td width="20%" align="right" class="dvtCellLabel"><font color="red"></font> Description </td>
                          <td colspan="3"><textarea rows="8" cols="90" name="description_<?php echo $cat;?>" id="description_<?php echo $cat;?>"  class="detailedViewTextBox"><?php echo $description; ?></textarea></td>
                        </tr>
                        <tr>
                          <td colspan="4" class="detailedViewHeader"><b>Fichier Lié</b></td>
                        </tr>
                        
                        <!-- Handle the ui types display --> 
                        
                        <!-- Added this file to display the fields in Create Entity page based on ui types  -->
                        <tr style="height:25px"> 
                          
                          <!-- In Add Comment are we should not display anything -->
                          <td width="20%" align="right" class="dvtCellLabel"><font color="red"></font> Parcourir </td>
                          <td colspan="3"><?php echo "<a href=\"".$chemin."module-".$cat."/uploads/".$photo."\">".$photo."</a><br/>";?>
                            <input type="hidden" name="lastphoto_<?php echo $cat;?>" value="<?php echo $photo; ?>" />
                            <input type="hidden" name="MAX_FILE_SIZE" value="30000000000" />
                            <input type="file" name="photo_<?php echo $cat;?>" id="photo_<?php echo $cat;?>"></td>
                        </tr>
                        
                        <!-- Added to display the Product Details in Inventory-->
                        
                        <tr>
                          <td colspan="4" style="padding:5px"><div align="center">
                              <input type="submit" style="width:70px" value="Sauver" name="button"  class="crmbutton small save" accesskey="S" title="Enregistrer [Alt+S]">
                              <input type="submit" style="width:70px" value="SaveQuit" name="button"  class="crmbutton small save" accesskey="S" title="Enregistrer [Alt+S]">
                              <input type="button" title="Annuler [Alt+X]" accesskey="X" class="crmbutton small cancel" onclick="window.history.back()" name="button" value="Annuler" style="width:70px">
                            </div></td>
                        </tr>
                      </tbody>
                    </table>
                    <script>
var editor = new TINY.editor.edit('editor', {
	id: 'description_<?php echo $cat;?>',
	width: 584,
	height: 175,
	cssclass: 'tinyeditor',
	controlclass: 'tinyeditor-control',
	rowclass: 'tinyeditor-header',
	dividerclass: 'tinyeditor-divider',
	controls: ['bold', 'italic', 'underline', 'strikethrough', '|', 'subscript', 'superscript', '|',
		'orderedlist', 'unorderedlist', '|', 'outdent', 'indent', '|', 'leftalign',
		'centeralign', 'rightalign', 'blockjustify', '|', 'unformat', '|', 'undo', 'redo', 'n',
		'font', 'size', 'style', '|', 'image', 'hr', 'link', 'unlink', '|', 'print'],
	footer: true,
	fonts: ['Verdana','Arial','Georgia','Trebuchet MS'],
	xhtml: true,
	cssfile: 'custom.css',
	bodyid: 'editor',
	footerclass: 'tinyeditor-footer',
	toggle: {text: 'source', activetext: 'wysiwyg', cssclass: 'toggle'},
	resize: {cssclass: 'resize'}
});
</script> 
                    
                    <!--fin formulaire --></td>
                </tr>
              </tbody>
            </table>
            <input type="hidden" name = "page" value="traitement" >
            <input type="hidden" name = "cat" value="<?php echo $cat;?>" >
            <input type="hidden" name = "id<?php echo $cat;?>" value="<?php echo $id;?>" >
            <input type="hidden" name = "vpb" value="<?php echo $vpb; ?>" >
          </form></td>
      </tr>
    </tbody>
  </table>
</div>
<?php


//---------------------------deuxieme onglet ----------------------------------



?>
<?php
if($id != "new"){
	
	echo "<div id=\"tabs-2\">";
}else{
	
	echo "<div id=\"tabs-2\" display='none'>";
}
?>
<div id="tabs-2">
  <table width="100%" cellspacing="0" cellpadding="0" border="0" class="small lvt">
    <tbody>
      <tr>
        <td class="dvInnerHeader"><div id="butontaches"> &nbsp;Contact&nbsp; </div></td>
      </tr>
      <tr>
        <td class="lvtColData"><div id="tbl_Potentials_Activities" class="tiroir" style="display: none;"> </div>
          <script>
			

		$( ".tabs-1" ).click(function () {
	
	$.cookie('<?php echo $cat.$id; ?>', '0', {
    expire : 1,
    path : '/'
	});
	
});

$( ".tabs-2" ).click(function () {
	$.cookie('<?php echo $cat.$id; ?>', '1', {
    expire : 1,
    path : '/'
	});
	
});	
		
			
			
			</script></td>
      </tr>
    </tbody>
  </table>
</div>
