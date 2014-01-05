<?php




			

			
if(isset($_REQUEST['idcontact']) && $_REQUEST['idcontact']!= ""){
	
	$idcontact = $_REQUEST['idcontact'];
	
	$sql = "SELECT * FROM `contact` WHERE `id` = $idcontact  ";
	
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($data = mysql_fetch_assoc($req)) {
		
		
		
		
		$nom_contact 					= $data['nom'];
		$prenom_contact 				= $data['prenom'];
		$telbureau_contact			= $data['telbureau'];
		$telmobile_contact			= $data['telmobile'];
		$teldiv_contact				= $data['teldiv'];
		$fax_contact					= $data['fax'];
		$email_contact					= $data['email'];
		$secondmail_contact			= $data['secondmail'];
		$origine_contact				= $data['origine'];
		$assigne_contact				= $data['assigne'];
		$adresse_contact				= $data['adresse'];
		$ville_contact					= $data['ville'];
		$codepostal_contact			= $data['codepostal'];
		$pays_contact					= $data['pays'];
		$fonction_contact				= $data['fonction'];
		$description_contact			= $data['description'];
		$photo_contact					= $data['photo'];
		$civilite_contact				= $data['civilite'];
		$datecrea_contact				= $data['datecrea'];
		$datemodif_contact			= $data['datemodif'];
		$usermodif_contact			= $data['usermodif'];

			
		
			
			
		
		
$tabs = $_REQUEST[$cat.$idcontact];

if 	($tabs == ""){
	
	$tabs = 0;
	
}
		
		
		
		
		
		
	}
		
}else{
	
	$idcontact = "new";
}
?>
<script>
$(window).load(function() {
 
    $("#formulairecontact_contact").validity(function() {
		
		$("#nom_contact").require("Veuillez saisir un nom de tache");
 
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






</script>
<div id="tabs">
<ul>
<li><a href="#tabs-1" class="tabs-1">Contact information</a></li>
<?php
if($idcontact != "new"){
	
	echo "<li><a href=\"#tabs-2\" class=\"tabs-2\">Information supplementaire</a></li>";
}
?>


</ul>
<div id="tabs-1">

      
      <table width="100%" cellspacing="0" cellpadding="3" border="0" class="dvtContentSpace" style="border-bottom:0;">
          <tbody>
            <tr valign="top">
            
            <td>
            
            
            

<form enctype="multipart/form-data" id="formulairecontact_contact" action="<?php echo $chemin."traitement".$wintype."form.php"; ?>" method="post">
  <table width="100%" cellspacing="0" cellpadding="5" border="0">
    <tbody>
      <tr>
        <td class="lvtHeaderText" style="border-bottom:1px dotted #cccccc"><table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
            <tbody>
              <tr>
                <td><span class="lvtHeaderText">Gestion des Contacts</span> <br></td>
              </tr>
            </tbody>
          </table></td>
      </tr>
      <tr>
        <td>
        
   <!--le formulaire -->
   
<table width="100%" cellspacing="0" cellpadding="0" border="0" class="small">
									   <tbody><tr>
										<td colspan="4" style="padding:5px"><div align="center">
                                          <input type="submit" style="width:70px" value="Sauver" name="button"  class="crmbutton small save" accesskey="S" title="Enregistrer [Alt+S]">
                                          <input type="submit" style="width:70px" value="SaveQuit" name="button"  class="crmbutton small save" accesskey="S" title="Enregistrer [Alt+S]">
                                          <input type="button" title="Annuler [Alt+X]" accesskey="X" class="crmbutton small cancel" onclick="window.history.back()" name="button" value="Annuler" style="width:70px">
                                        </div></td>
									   </tr>

									   <!-- included to handle the edit fields based on ui types -->
									   


							<!-- This is added to display the existing comments -->
							


									      <tr>
																				<td colspan="4" class="detailedViewHeader">
											<b>Détail</b>
																				</td>
									      </tr>

										<!-- Handle the ui types display -->
										

<!-- Added this file to display the fields in Create Entity page based on ui types  -->
			<tr style="height:25px">
																								 
	 	
							
										
							<td width="20%" align="right" class="dvtCellLabel">
				<font color="red">*</font>Nom 			</td>
			<td width="30%" align="left" class="dvtCellInfo">
				<input type="text"  class="detailedViewTextBox" value="<?php echo $nom_contact; ?>" tabindex="" id="nom_contact" name="nom_contact">
			</td>
																									 
	 	
							
										
				<!-- Non Editable field, only configured value will be loaded -->
				<td width="20%" align="right" class="dvtCellLabel"><font color="red"></font>Email</td>
                                <td width="30%" align="left" class="dvtCellInfo"><input type="text"  class="detailedViewTextBox" value="<?php echo $email_contact; ?>" tabindex="" id="email_contact" name="email_contact"></td>
			   </tr>
               <tr style="height:25px">
																								 
	 	
							
										
							<td width="20%" align="right" class="dvtCellLabel">
				<font color="red">*</font>Prenom 			</td>
			<td width="30%" align="left" class="dvtCellInfo">
				<input type="text"  class="detailedViewTextBox" value="<?php echo $prenom_contact; ?>" tabindex="" id="prenom_contact" name="prenom_contact">
			</td>
																									 
	 	
							
										
				<!-- Non Editable field, only configured value will be loaded -->
				<td width="20%" align="right" class="dvtCellLabel"><font color="red"></font>Tel bureaux</td>
                                <td width="30%" align="left" class="dvtCellInfo"><input type="text"  class="detailedViewTextBox" value="<?php echo $telbureau_contact; ?>" tabindex="" id="telbureau_contact" name="telbureau_contact"></td>
			   </tr>
			<tr style="height:25px">
																								 
	 	
							
										
							<td width="20%" align="right" class="dvtCellLabel">
			<font color="red">*</font>
			Origine 

			</td>
			<td width="30%" align="left" class="dvtCellInfo">
            
            <select class="small" tabindex="" name="origine_contact">
			   		<?php
						$sql = "SELECT * FROM `origine` ";
						$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
						while($data = mysql_fetch_assoc($req)) {
							
							if($data['id'] == $origine_contact){
							
								echo "<option selected='selected' value=\"".$data['id']."\">".$data['origine']."</option>";
							
							}else{
								
								echo "<option value=\"".$data['id']."\">".$data['origine']."</option>";
								
							}
							
						}
						
						?>													
												   </select>
				
			</td>
																											 
	 	
							
										
							<td width="20%" align="right" class="dvtCellLabel"><font color="red">&nbsp;</font>Tel mobile</td>
			<td width="30%" align="left" class="dvtCellInfo">				
									<input type="text"  class="detailedViewTextBox" value="<?php echo $telmobile_contact; ?>" tabindex="" id="telmobile_contact" name="telmobile_contact">
                                    
							</td>

			   </tr>
			<tr style="height:25px">
																								 
	 	
							
										
							<td width="20%" align="right" class="dvtCellLabel">
				<font color="red"></font>Assigné à</td>
			<td width="30%" align="left" class="dvtCellInfo">
							   		<select class="small" tabindex="" name="assigne_contact">
			   		<?php
						$sql = "SELECT * FROM `user` ";
						$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
						while($data = mysql_fetch_assoc($req)) {
							
							if($data['id'] == $assigne_contact){
							
								echo "<option selected='selected' value=\"".$data['id']."\">".$data['pseudo']."</option>";
							
							}else{
								
								echo "<option value=\"".$data['id']."\">".$data['pseudo']."</option>";
								
							}
							
						}
						
						?>													
												   </select>	
			</td>
																									 
	 	
							
										
							<td width="20%" align="right" class="dvtCellLabel">
				<font color="red">*</font><font color="red">&nbsp;</font>Tel div</td>
			<td width="30%" align="left" class="dvtCellInfo">
																		
				<input type="text"  class="detailedViewTextBox" value="<?php echo $teldiv_contact; ?>" tabindex="" id="teldiv_contact" name="teldiv_contact">

			</td>

			   </tr>
               
			<tr style="height:25px">
																								 
	 	
							
										
							<td width="20%" align="right" class="dvtCellLabel">Civilité</td>
			<td width="30%" align="left" class="dvtCellInfo">
            
            
							   		<select class="small" tabindex="" name="civilite_contact">
			   		<?php
						
							
							if(1 == $civilite_contact){
							
								echo "<option selected='selected' value=\"1\">M</option>
								<option  value=\"2\">Mme</option>
								<option  value=\"3\">Mlle</option>";
							
							
							
						}else if(2 == $civilite_contact){
							
								echo "<option s value=\"1\">M</option>
								<option selected='selected' value=\"2\">Mme</option>
								<option  value=\"3\">Mlle</option>";
							
							
							
						}else if(3 == $civilite_contact){
							
								echo "<option  value=\"1\">M</option>
								<option  value=\"2\">Mme</option>
								<option selected='selected' value=\"3\">Mlle</option>";
							
							
							
						}else {
							
								echo "<option selected='selected' value=\"1\">M</option>
								<option  value=\"2\">Mme</option>
								<option  value=\"3\">Mlle</option>";
							
							
							
						}
						
						?>													
												   </select>
			
            
            </td>
																									 
	 	
							
										
							<td width="20%" align="right" class="dvtCellLabel"><font color="red"></font><font color="red">&nbsp;</font>Fax</td>

							<td width="30%" align="left" class="dvtCellInfo"><input type="text"  class="detailedViewTextBox" value="<?php echo $fax_contact; ?>" tabindex="" id="fax_contact" name="fax_contact"></td>
						   </tr>
			<tr style="height:25px">
																								 
	 	
							
										
							<td width="20%" align="right" class="dvtCellLabel">
				<font color="red">*</font>Fonction 			</td>
			<td width="30%" align="left" class="dvtCellInfo"><input type="text"  class="detailedViewTextBox" value="<?php echo $fonction_contact; ?>" tabindex="" id="fonction_contact" name="fonction_contact"></td>
																									 
	 	
							
										
							<td width="20%" align="right" class="dvtCellLabel">
				<font color="red">*</font>
				Second email			</td>
			<td width="30%" align="left" class="dvtCellInfo">
							   		<input type="text"  class="detailedViewTextBox" value="<?php echo $secondmail_contact; ?>" tabindex="" name="secondmail_contact" id="secondmail_contact">
			</td>
			   </tr>
			

									   


							<!-- This is added to display the existing comments -->
							


									      <tr>
																				<td colspan="4" class="detailedViewHeader">
											<b>Adresse</b>
																				</td>
									      </tr>

										<!-- Handle the ui types display -->
										

<!-- Added this file to display the fields in Create Entity page based on ui types  -->
			<tr style="height:25px">
																								 
	 	
							
										
							<!-- In Add Comment are we should not display anything -->
						<td width="20%" align="right" class="dvtCellLabel">
					<font color="red"></font> 
				Adresse  			</td>
			<td colspan="1">
				<textarea rows="8" cols="8" name="adresse_contact" id="adresse_contact"  class="detailedViewTextBox"><?php echo $adresse_contact; ?></textarea>
							</td>
                            <td colspan="2">
                            <table width="100%" cellspacing="0" cellpadding="0" border="0" class="small">
									   <tbody><tr style="height:25px">
                                       <td width="20%" align="right" class="dvtCellLabel">
				<font color="red">*</font>
				Ville			</td>
			<td width="30%" align="left" class="dvtCellInfo">
							   		<input type="text"  class="detailedViewTextBox" value="<?php echo $ville_contact; ?>" tabindex="" name="ville_contact" id="ville_contact">
			</td>
            
                                       </tr>
                                       <tr style="height:25px">
                                       <td width="20%" align="right" class="dvtCellLabel">
				<font color="red">*</font>
				Code	Postal		</td>
			<td width="30%" align="left" class="dvtCellInfo">
							   		<input type="text"  class="detailedViewTextBox" value="<?php echo $codepostal_contact; ?>" tabindex="" name="codepostal_contact" id="codepostal_contact">
			</td>
            
                                       </tr>
                                       <tr style="height:25px">
                                       <td width="20%" align="right" class="dvtCellLabel">
				<font color="red">*</font>
				Pay			</td>
			<td width="30%" align="left" class="dvtCellInfo">
							   		<input type="text"  class="detailedViewTextBox" value="<?php echo $pays_contact; ?>" tabindex="" name="pays_contact" id="pays_contact">
			</td>
            
                                       </tr>
                                       </tbody>
                                       </table>
                            
                            
                            </td>
			   </tr>
                <tr>
																				<td colspan="4" class="detailedViewHeader">
											<b>Information</b>
																				</td>
									      </tr>

										<!-- Handle the ui types display -->
										

<!-- Added this file to display the fields in Create Entity page based on ui types  -->
			<tr style="height:25px">
																								 
	 	
							
										
							<!-- In Add Comment are we should not display anything -->
						<td width="20%" align="right" class="dvtCellLabel">
					<font color="red"></font> 
				Description  			</td>
			<td colspan="3">
				<textarea rows="8" cols="90" name="description_contact" id="description_contact"  class="detailedViewTextBox"><?php echo $description_contact; ?></textarea>
							</td>
			   </tr>
               
              <tr>
																				<td colspan="4" class="detailedViewHeader">
											<b>Fichier Lié</b>
																				</td>
									      </tr>

										<!-- Handle the ui types display -->
										

<!-- Added this file to display the fields in Create Entity page based on ui types  -->
			<tr style="height:25px">
																								 
	 	
							
										
							<!-- In Add Comment are we should not display anything -->
						<td width="20%" align="right" class="dvtCellLabel">
					<font color="red"></font> 
				Parcourir  			</td>
			<td colspan="3">
            <?php echo "<a href=\"".$chemin."module-contact/uploads/".$photo_contact."\">".$photo_contact."</a><br/>";?>
            <input type="hidden" name="lastphoto_contact" value="<?php echo $photo_contact; ?>" />
              <input type="hidden" name="MAX_FILE_SIZE" value="30000000000" />
				<input type="file" name="photo_contact" id="photo_contact">
							</td>
			   </tr>

									   

									   <!-- Added to display the Product Details in Inventory-->
									   
									   <tr>
										<td colspan="4" style="padding:5px"><div align="center">
                                          <input type="submit" style="width:70px" value="Sauver" name="button"  class="crmbutton small save" accesskey="S" title="Enregistrer [Alt+S]">
                                          <input type="submit" style="width:70px" value="SaveQuit" name="button"  class="crmbutton small save" accesskey="S" title="Enregistrer [Alt+S]">
                                          <input type="button" title="Annuler [Alt+X]" accesskey="X" class="crmbutton small cancel" onclick="window.history.back()" name="button" value="Annuler" style="width:70px">
                                        </div></td>
									   </tr>
									</tbody></table>
                                    
                                    
<script>
var editor = new TINY.editor.edit('editor', {
	id: 'description_contact',
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

   
   
   
   
   
        
        
        
        
      <!--fin formulaire -->     
        
        </td>
      </tr>
    </tbody>
  </table>
 <input type="hidden" name = "page" value="traitement" >
<input type="hidden" name = "cat" value="contact" >
  
  <input type="hidden" name = "idcontact" value="<?php echo $idcontact;?>" >
  <input type="hidden" name = "vpb" value="<?php echo $vpb; ?>" >
</form>






</td>
             </tr>
          </tbody>
        </table>
        
        


</div>

<?php


//---------------------------deuxieme onglet ----------------------------------



?>

<?php
if($idcontact != "new"){
	
	echo "<div id=\"tabs-2\">";
}else{
	
	echo "<div id=\"tabs-2\" display='none'>";
}
?>

<div id="tabs-2">

            
            
            
            
            
            
            
            
            
            
           
            
            
            
            
            
            
         <table width="100%" cellspacing="0" cellpadding="0" border="0" class="small lvt">
	<tbody><tr>
		<td class="dvInnerHeader">
			<div id="butontaches">
				&nbsp;Contact&nbsp;
                </div>
				
		</td>
	</tr>
	<tr>
		<td class="lvtColData">
			<div id="tbl_Potentials_Activities" class="tiroir" style="display: none;">
            
            
            
            
            
            
            </div>
            
            <script>
			

		$( ".tabs-1" ).click(function () {
	
	$.cookie('<?php echo $cat.$idcontact; ?>', '0', {
    expire : 1,
    path : '/'
	});
	
});

$( ".tabs-2" ).click(function () {
	$.cookie('<?php echo $cat.$idcontact; ?>', '1', {
    expire : 1,
    path : '/'
	});
	
});	
		
			
			
			</script>
		</td>
	</tr>
</tbody></table>   
            
            
            
            
            
            
</div>