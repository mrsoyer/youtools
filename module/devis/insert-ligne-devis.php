
<?php

$tabsdevis = $_REQUEST['tabsdevis'];

if 	($tabsdevis == ""){
	
	$tabsdevis = 0;
	
}


if($id == "new"){
	
	$therow = "
	
	 <tr class=\"item-row\" bgcolor=\"white\"  >
          <td width=\"60px\"><table width=\"100%\">
              <tr>
                <td width=\"10px\">J</td>
                <td><input type=\"text\" value=\"\"  style=\"width: 30px;\" class=\"textbox j\" id=\"j0\" name=\"j0\"></td>
              </tr>
              <tr>
                <td colspan=\"2\">//</td>
              </tr>
              <tr>
                <td>O</td>
                <td><input type=\"text\" value=\"\"  style=\"width: 30px;\" class=\"textbox o\" id=\"o0\" name=\"o0\"></td>
              </tr>
              <tr>
                <td colspan=\"2\"></td>
              <tr>
            </table></td>
          <td><input type=\"text\" value=\"\"  class=\"textbox service\" id=\"sevice0\" name=\"service0\">
            <br>
            <textarea rows=\"1\"  name=\"servicenote0\" id=\"servicenote0\"  class=\"detailedViewTextBox servicenote\"></textarea>
            <br>
            <textarea rows=\"1\"  name=\"comclient0\" id=\"comclient0\"  class=\"detailedViewTextBox comclient\"></textarea></td>
          <td><input type=\"text\" disabled=\"disabled\"   tabindex=\"\" name=\"nomfournisseur0\" >
            <input type=\"hidden\"  class=\"detailedViewTextBox\" value=\"\" tabindex=\"\" name=\"idfournisseur0\">
            <a> <img border=\"0\" src=\"themes/softed/images/btnL3Search.gif\" alt=\"Rechercher dans Affaires...\" title=\"Rechercher dans clienr...\" id=\"popupsh0\" onclick='valideopenerformrowfournisseur(0)'></a> <br>
            <textarea rows=\"1\"  name=\"comfournisseur0\" id=\"comfournisseur0\"  class=\"detailedViewTextBox\"></textarea></td>
          <td width=\"100px\"><table width=\"100%\">
              <tr>
                <td width=\"35px\">Global</td>
                <td><input type=\"text\" value=\"\"  style=\"width: 70px;\" class=\"textbox coutglobal\" id=\"coutglobal0\" name=\"coutglobal0\"></td>
              </tr>
              <tr>
                <td width=\"10px\">Pax</td>
                <td><input type=\"text\" value=\"\"  style=\"width: 70px;\" class=\"textbox coutpax\" id=\"coutpax0\" name=\"coutpax0\"></td>
              </tr>
              <tr>
                <td width=\"10px\">Marge</td>
                <td><input type=\"text\" value=\"\"  style=\"width: 70px;\" class=\"textbox margeC\" id=\"margeC0\" name=\"margeC0\"></td>
              </tr>
            </table></td>
          <td><input type=\"text\" value=\"\"  style=\"width: 70px;\" class=\"textbox pdvcout\" id=\"pdvcout0\" name=\"pdvcout0\"></td>
          <td><table width=\"100%\">
              <tr>
                <td width=\"35px\">SupS.</td>
                <td><input type=\"text\" value=\"\"  style=\"width: 70px;\" class=\"textbox suos\" id=\"suos0\" name=\"suos0\"></td>
              </tr>
              <tr>
                <td width=\"10px\">Marge</td>
                <td><input type=\"text\" value=\"\"  style=\"width: 70px;\" class=\"textbox margeS\" id=\"margeS0\" name=\"margeS0\"></td>
              </tr>
              <tr>
            </table></td>
          <td><input type=\"text\" value=\"\"  style=\"width: 70px;\" class=\"textbox pdvsups\" id=\"pdvsups0\" name=\"pdvsups0\"></td>
          <td><input type=\"text\" value=\"\"  style=\"width: 70px;\" class=\"textbox gratuite\" id=\"gratuite0\" name=\"gratuite0\">
		  <input type=\"hidden\" value=\"0\"  style=\"width: 70px;\" class=\"listrow\" id=\"listrow\" name=\"listrow[]\"></td>
        </tr>
		
		
	
	
	
	
	";
	
}else{
	
//////////////////////////////////////////////////////////////////////////////////////////
///////////////// ---------------   ligne devis --------------------- ////////////////////
//////////////////////////////////////////////////////////////////////////////////////////
	
	$sql = "SELECT l.id id, 	l.iddevis iddevis, 	l.ordre ordre, 	l.journee journee, 	l.service service, 	l.servicenote servicenote, 	l.comclient comclient, 	l.comfournisseur comfournisseur, 	l.idfournisseur idfournisseur, 	l.coutglobal coutglobal, 	l.coutpax coutpax, 	l.marge marge, 	l.supsingle supsingle, 	l.margesupsingle margesupsingle, 	l.gratuite gratuite, 	f.nom nomfournisseur , DATE_ADD( '".$debutligne."' , INTERVAL( l.journee -1 )
DAY ) jjj

 
FROM `lignedevis` l
LEFT JOIN fournisseur f ON l.idfournisseur = f.id
WHERE l.`iddevis` = $id ORDER BY l.journee ASC , l.ordre ASC ";
	
	$therow = "";
	
	$i = 0;
	
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($data = mysql_fetch_assoc($req)) {
		
		$jjj = $data['jjj'];
		$jjj = explode("-", $jjj);
		$jjj = $jjj[2]."/".$jjj[1]."/".$jjj[0];
		if ($i != 0){
			
			$delrow = "<i class=\"deleteRow icon-remove\" id=\"deleteRow".$i."\"></i>";
			
		}
		$therow .= "
	
	<tr class=\"item-row\" bgcolor=\"white\"  >
          <td width=\"60px\"><table width=\"100%\">
              <tr>
                <td width=\"10px\">J</td>
                <td><input type=\"text\" value=\"".$data['journee']."\"  style=\"width: 30px;\" class=\"textbox j\" id=\"j".$i."\" name=\"j".$i."\"></td>
              </tr>
              <tr>
                <td colspan=\"2\">".$jjj."</td>
              </tr>
              <tr>
                <td>O</td>
                <td><input type=\"text\" value=\"".$data['ordre']."\"  style=\"width: 30px;\" class=\"textbox o\" id=\"o".$i."\" name=\"o".$i."\"></td>
              </tr>
              <tr>
                <td colspan=\"2\">".$delrow."</td>
              <tr>
            </table></td>
          <td><input type=\"text\" value=\"".$data['service']."\"  class=\"service textbox\" id=\"service".$i."\" name=\"service".$i."\">
            <br>
            <textarea rows=\"1\"  name=\"servicenote".$i."\" id=\"servicenote".$i."\"  class=\"detailedViewTextBox servicenote\">".$data['servicenote']."</textarea>
            <br>
            <textarea rows=\"1\"  name=\"comclient".$i."\" id=\"comclient".$i."\"  class=\"detailedViewTextBox comclient\">".$data['comclient']."</textarea></td>
          <td><input class='nomfournisseur' type=\"text\" disabled=\"disabled\"  value=\"".$data['nomfournisseur']."\" tabindex=\"\" name=\"nomfournisseur".$i."\" >
            <input type=\"hidden\"  class=\"idfournisseur detailedViewTextBox\" value=\"".$data['idfournisseur']."\" tabindex=\"\" name=\"idfournisseur".$i."\">
            <a> <img border=\"0\" src=\"themes/softed/images/btnL3Search.gif\" alt=\"Rechercher dans Affaires...\" title=\"Rechercher dans clienr...\" id=\"popupsh".$i."\" onclick='valideopenerformrowfournisseur(".$i.")'></a> <br>
            <textarea rows=\"1\"  name=\"comfournisseur".$i."\" id=\"comfournisseur".$i."\"  class=\"comfournisseur detailedViewTextBox\">".$data['comfournisseur']."</textarea></td>
          <td width=\"100px\"><table width=\"100%\">
              <tr>
                <td width=\"35px\">Global</td>
                <td><input type=\"text\" value=\"".$data['coutglobal']."\"  style=\"width: 70px;\" class=\"textbox coutglobal\" id=\"coutglobal".$i."\" name=\"coutglobal".$i."\"></td>
              </tr>
              <tr>
                <td width=\"10px\">Pax</td>
                <td><input type=\"text\" value=\"".$data['coutpax']."\"  style=\"width: 70px;\" class=\"textbox coutpax\" id=\"coutpax".$i."\" name=\"coutpax".$i."\"></td>
              </tr>
              <tr>
                <td width=\"10px\">Marge</td>
                <td><input type=\"text\" value=\"".$data['marge']."\"  style=\"width: 70px;\" class=\"textbox margeC\" id=\"margeC".$i."\" name=\"margeC".$i."\"></td>
              </tr>
            </table></td>
          <td><input type=\"text\" value=\"".$pdvcout."\"  style=\"width: 70px;\" class=\"textbox pdvcout\" id=\"pdvcout".$i."\" name=\"pdvcout".$i."\"></td>
          <td><table width=\"100%\">
              <tr>
                <td width=\"35px\">SupS.</td>
                <td><input type=\"text\" value=\"".$data['supsingle']."\"  style=\"width: 70px;\" class=\"textbox suos\" id=\"suos".$i."\" name=\"suos".$i."\"></td>
              </tr>
              <tr>
                <td width=\"10px\">Marge</td>
                <td><input type=\"text\" value=\"".$data['margesupsingle']."\"  style=\"width: 70px;\" class=\"textbox margeS\" id=\"margeS".$i."\" name=\"margeS".$i."\"></td>
              </tr>
              <tr>
            </table></td>
          <td><input type=\"text\" value=\"".$pdvsups."\"  style=\"width: 70px;\" class=\"textbox pdvsups\" id=\"pdvsups".$i."\" name=\"pdvsups".$i."\"></td>
          <td><input type=\"text\" value=\"".$data['gratuite']."\"  style=\"width: 70px;\" class=\"textbox gratuite\" id=\"gratuite".$i."\" name=\"gratuite".$i."\"><input type=\"hidden\" value=\"".$i."\"  style=\"width: 70px;\" class=\"listrow\" id=\"listrow\" name=\"listrow[]\"></td>
        </tr>
		
		
	
	
	
	
	";
	
	
	$therow .= "
	
	<script>
	
	$(\"#deleteRow".$i."\").on('click', function () {
                
                $(this).parents('.item-row').remove();
                
                updateMessage('.alert', 'Item was removed!', 2000);
                
                if ($(\".item-row\").length < 2) $(\"#deleteRow\").hide();
                
                
            });
	
	$( \"#coutglobal".$i." , #pax_devis\" ).keyup(function() {
		
	var coutpax = $('#coutglobal".$i."').val() / $('#pax_devis').val();
	coutpax = roundNumber(coutpax, 2);
	isNaN(coutpax) ? $('#coutpax".$i."').val(\"N/A\") : $('#coutpax".$i."').val(coutpax);

	
	});
	
	
	$( \"#coutpax".$i." , #pax_devis\" ).keyup(function() {
		
var coutglobal = $('#coutpax".$i."').val() * $('#pax_devis').val();
	coutglobal = roundNumber(coutglobal, 2);
	isNaN(coutglobal) ? $('#coutglobal".$i."').val(\"N/A\") : $('#coutglobal".$i."').val(coutglobal);
	});
	
	


	$( \"#coutpax".$i." , #margeC".$i." , #coutglobal".$i."\" ).keyup(function() {
		
	var pmarge = $('#margeC".$i."').val()/100;
	var pmarge = 1-pmarge;		
	var pdvcout = $('#coutpax".$i."').val() / pmarge;
	
	//$('#coutpax".$i."').val()/(1-($('#margeC".$i."').val()/100))
		pdvcout = roundNumber(pdvcout, 2);
		isNaN(pdvcout) ? $('#pdvcout".$i."').val(\"N/A\") : $('#pdvcout".$i."').val(pdvcout);
		
		
	});
	
	$(function() {
		
	var pmarge = $('#margeC".$i."').val()/100;
	var pmarge = 1-pmarge;		
	var pdvcout = $('#coutpax".$i."').val() / pmarge;
	
	//$('#coutpax".$i."').val()/(1-($('#margeC".$i."').val()/100))
		pdvcout = roundNumber(pdvcout, 2);
		isNaN(pdvcout) ? $('#pdvcout".$i."').val(\"N/A\") : $('#pdvcout".$i."').val(pdvcout);
		
		
	});

	$( \"#suos".$i.", #margeS".$i."\" ).keyup(function() {
		
	var pmarge = $('#margeS".$i."').val()/100;
	var pmarge = 1-pmarge;		
	var pdvsups = $('#suos".$i."').val() / pmarge;
	
	//$('#coutpax".$i."').val()/(1-($('#margeC".$i."').val()/100))
		pdvsups = roundNumber(pdvsups, 2);
		isNaN(pdvsups) ? $('#pdvsups".$i."').val(\"N/A\") : $('#pdvsups".$i."').val(pdvsups);
		
		
	});
	
	$(function() {
		
	var pmarge = $('#margeS".$i."').val()/100;
	var pmarge = 1-pmarge;		
	var pdvsups = $('#suos".$i."').val() / pmarge;
	
	//$('#coutpax".$i."').val()/(1-($('#margeC".$i."').val()/100))
		pdvsups = roundNumber(pdvsups, 2);
		isNaN(pdvsups) ? $('#pdvsups".$i."').val(\"N/A\") : $('#pdvsups".$i."').val(pdvsups);
		
		
	});
	
	</script>
	
	
	";
		$i++;
	}

//////////////////////////////////////////////////////////////////////////////////////////
///////////////// ---------------   ligne fournisseur --------------------- //////////////
//////////////////////////////////////////////////////////////////////////////////////////
	
	$sql = "SELECT  l.id id,  l.dateresa dateresa, 	l.datepba datepba, 	l.dateannul dateannul, 	l.montant montant, 	l.acompte acompte, 	l.reglele reglele, 	 	l.recuele recuele, 	l.fichierfacture fichierfacture, 	l.datefacture datefacture, 	l.compte compte, 	l.numerofacture numerofacture,
	
 l.idfournisseur idfournisseur, f.nom nomfournisseur,
 
 r.id idreglepar, r.reglerpar reglepar,
 
 c.id idcompte, c.compte compte

 
FROM `lignefournisseur` l
LEFT JOIN fournisseur f ON l.idfournisseur = f.id
LEFT JOIN reglerpar r ON l.reglepar = r.id
LEFT JOIN compte c ON l.compte = c.id
WHERE l.`iddevis` = $id";
	
	$therowF = "";
	
	
	
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($data = mysql_fetch_assoc($req)) {
		
		$i = $data['id'];
		
		$data['dateresa'] = explode("-", $data['dateresa']);
		$data['dateresa'] = $data['dateresa'][2]."/".$data['dateresa'][1]."/".$data['dateresa'][0];
		
		$data['datepba'] = explode("-", $data['datepba']);
		$data['datepba'] = $data['datepba'][2]."/".$data['datepba'][1]."/".$data['datepba'][0];
		
		$data['dateannul'] = explode("-", $data['dateannul']);
		$data['dateannul'] = $data['dateannul'][2]."/".$data['dateannul'][1]."/".$data['dateannul'][0];
		
		$data['reglele'] = explode("-", $data['reglele']);
		$data['reglele'] = $data['reglele'][2]."/".$data['reglele'][1]."/".$data['reglele'][0];
		
		$data['recuele'] = explode("-", $data['recuele']);
		$data['recuele'] = $data['recuele'][2]."/".$data['recuele'][1]."/".$data['recuele'][0];
		
				$sql2 = "SELECT * FROM `reglerpar` ";

				$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
				$reglerparselect = "";
				while($data2 = mysql_fetch_assoc($req2)) {
					
					
					
					if($data2['id'] == $data['idreglepar']){
					
						$reglerparselect .= "<option selected='selected' value=\"".$data2['id']."\">".$data2['reglerpar']."</option>";
					
					}else{
						
						$reglerparselect .= "<option value=\"".$data2['id']."\">".$data2['reglerpar']."</option>";
						
					}
					
				}
				
		$sql2 = "SELECT * FROM `compte` ";

				$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
				$compteselect = "";
				while($data2 = mysql_fetch_assoc($req2)) {
					
					if($data2['id'] == $data['idcompte']){
					
						$compteselect .= "<option selected='selected' value=\"".$data2['id']."\">".$data2['compte']."</option>";
					
					}else{
						
						$compteselect .= "<option value=\"".$data2['id']."\">".$data2['compte']."</option>";
						
					}
					
				}
		
		$solde = $data['montant'] - $data['acompte'];
		$therowF .= "
	
	      <tr bgcolor=\"white\"> <td >".$data['nomfournisseur']."<input type=\"hidden\" value=\"".$data['idfournisseur']."\"   class=\"textbox\" id=\"idfournisseur".$i."\" name=\"idfournisseur".$i."\"></td>
          <td ><input type=\"text\" value=\"".$data['dateresa']."\"  style=\"width: 70px;\" class=\"textbox\" id=\"dateresa".$i."\" name=\"dateresa".$i."\"></td>
          <td ><input type=\"text\" value=\"".$data['datepba']."\"  style=\"width: 70px;\" class=\"textbox\" id=\"datepba".$i."\" name=\"datepba".$i."\"></td>
          <td ><input type=\"text\" value=\"".$data['dateannul']."\"  style=\"width: 70px;\" class=\"textbox\" id=\"dateannul".$i."\" name=\"dateannul".$i."\"></td>
          <td ><input type=\"text\" value=\"".$data['montant']."\"  style=\"width: 70px;\" class=\"textbox\" id=\"montant".$i."\" name=\"montant".$i."\"></td>
          <td ><input type=\"text\" value=\"".$data['acompte']."\"  style=\"width: 70px;\" class=\"textbox acompte\" id=\"acompte".$i."\" name=\"acompte".$i."\"></td>
          <td ><input type=\"text\" value=\"".$data['reglele']."\"  style=\"width: 70px;\" class=\"textbox\" id=\"reglerle".$i."\" name=\"reglerle".$i."\"></td>
          <td >
		  <select class=\"small\" tabindex=\"\" name=\"reglerpar".$i."\">".$reglerparselect."
                      </select>
		  
		  </td>
          <td ><input type=\"text\" value=\"".$solde."\"  style=\"width: 70px;\" class=\"textbox solde\" id=\"solde".$i."\" name=\"solde".$i."\"></td>
          <td ><input type=\"text\" value=\"".$data['numerofacture']."\"  style=\"width: 70px;\" class=\"textbox\" id=\"numerofacture".$i."\" name=\"numerofacture".$i."\"></td>
          <td ><input type=\"text\" value=\"".$data['recuele']."\"  style=\"width: 70px;\" class=\"textbox\" id=\"recuele".$i."\" name=\"recuele".$i."\"></td>
          <td >
		  
                            <input type=\"hidden\" name=\"lastfichier".$i."\" value=\"".$data['fichierfacture']."\" />
                            <input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"30000000000\" />
							<span class=\"btn btn-success btn-xs fileinput-button\">
<i class=\"fa fa-plus\"></i>
<span>Add files...</span>
<input type=\"file\"  name=\"fichier".$i."\" id=\"fichier".$i."\">
</span>
 <a class='fa  fa-link' target='_blank' href=\"".$chemin."module/".$cat."/uploads/".$data['fichierfacture']."\"></a>                         
		  
		  </td>
          <td ><select class=\"small\" tabindex=\"\" name=\"compte".$i."\">".$compteselect."
                      </select></td></tr>
		
		
	
	
	
	
	";
	
	
	$therowF .= "
	
	<script>
	
	$(function() {
	$( \"#dateresa".$i."\" ).datepicker({ dateFormat:\"dd/mm/yy\"});
	});
	
	$(function() {
	$( \"#datepba".$i."\" ).datepicker({ dateFormat:\"dd/mm/yy\"});
	});
	
	$(function() {
	$( \"#dateannul".$i."\" ).datepicker({ dateFormat:\"dd/mm/yy\"});
	});
	
	$(function() {
	$( \"#reglerle".$i."\" ).datepicker({ dateFormat:\"dd/mm/yy\"});
	});
	
	$(function() {
	$( \"#recuele".$i."\" ).datepicker({ dateFormat:\"dd/mm/yy\"});
	});
	
	</script>
	
	
	";
		
	}
	
//////////////////////////////////////////////////////////////////////////////////////////
///////////////// ---------------   ligne facture --------------------- //////////////////
//////////////////////////////////////////////////////////////////////////////////////////
	
		$sql = "SELECT  l.id id,  	l.montant montant, 	l.numerofacture numerofacture,  	l.payele payele,
	
 l.typelignefacture idtypelignefacture, t.typelignefacture typelignefacture
 
 

 
FROM `lignefacture` l
LEFT JOIN typelignefacture t ON l.typelignefacture = t.id
WHERE l.`iddevis` = $id";
	
	$therowC = "";
	
	
	
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($data = mysql_fetch_assoc($req)) {
		
		$i = $data['id'];
		
		$data['payele'] = explode("-", $data['payele']);
		$data['payele'] = $data['payele'][2]."/".$data['payele'][1]."/".$data['payele'][0];
		
		
		
				$sql2 = "SELECT * FROM `typelignefacture` ";

				$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
				$typelignefactureselect = "";
				while($data2 = mysql_fetch_assoc($req2)) {
					
					
					
					if($data2['id'] == $data['idtypelignefacture']){
					
						$typelignefactureselect .= "<option selected='selected' value=\"".$data2['id']."\">".$data2['typelignefacture']."</option>";
					
					}else{
						
						$typelignefactureselect .= "<option value=\"".$data2['id']."\">".$data2['typelignefacture']."</option>";
						
					}
					
				}
				
		
		$therowC .= "
	
	      <tr bgcolor=\"white\"> 
          <td ><input type=\"text\" value=\"".$extsociete."f".$data['numerofacture']."\"  style=\"width: 70px;\" class=\"textbox\" id=\"numerofacture".$i."\" name=\"numerofacture".$i."\"></td>
          <td >
		  <select class=\"small\" tabindex=\"\" name=\"typelignefacture".$i."\" id=\"typelignefacture".$i."\">".$typelignefactureselect."
                      </select>
		  
		  </td>
          <td ><input type=\"text\" value=\"".$data['montant']."\"  style=\"width: 70px;\" class=\"textbox montantf\" id=\"montantf".$i."\" name=\"montantf".$i."\"></td>
          <td ><input type=\"text\" value=\"".$data['payele']."\"  style=\"width: 70px;\" class=\"textbox\" id=\"payele".$i."\" name=\"payele".$i."\"></td>
		  <td><a target='_blank ' class='fa fa-file' href=\"".$chemin."/module/devis/facturepdf.php?idfacture=".$i."\"> PDF</a> </td>
          
          
          </tr>
		
		
	
	
	
	
	";
	
	
	$therowC .= "
	
	<script>
	
	$(function() {
	$( \"#payele".$i."\" ).datepicker({ dateFormat:\"dd/mm/yy\"});
	});
	
	
	
	</script>
	
	
	";
		
	}
	
	$sql2 = "SELECT * FROM `typelignefacture` ";

				$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
				$typelignefactureselect = "";
				while($data2 = mysql_fetch_assoc($req2)) {
					
					
					
					
						
						$typelignefactureselect .= "<option value=\"".$data2['id']."\">".$data2['typelignefacture']."</option>";
						
					
					
				}
				

	$therowC .= "
	
	      <tr bgcolor=\"white\"> 
          <td ><input type=\"text\" value=\"\"  style=\"width: 70px;\" class=\"textbox\" id=\"numerofacture0\" name=\"numerofacture0\"></td>
          <td >
		  <select class=\"small\" tabindex=\"\" id=\"typelignefacture0\" name=\"typelignefacture0\">".$typelignefactureselect."
                      </select>
		  
		  </td>
          <td ><input type=\"text\" value=\"".$data['montant']."\"  style=\"width: 70px;\" class=\"textbox montantf\" id=\"montantf0\" name=\"montantf0\"></td>
          <td ><input type=\"text\" value=\"\"  style=\"width: 70px;\" class=\"textbox\" id=\"payele0\" name=\"payele0\"></td>
          
          <td></td>
          </tr>
		
		
	
			<script>
	
	$(function() {
	$( \"#payele0\" ).datepicker({ dateFormat:\"dd/mm/yy\"});
	});
	
	
	
	</script>
	
	
	";
}



////----------------ligne facture -------------------




	
?>
<script>
$(function() {

var tabs = $( "#tabsdevis" ).tabs({
collapsible: true ,
active: <?php echo $tabsdevis; ?>
});



});
</script>
<tr>
  <td class="detailedViewHeader" colspan="4"><b>Lignes</b></td>
</tr>

<!-- Handle the ui types display --> 

<!-- Added this file to display the fields in Create Entity page based on ui types  -->
<tr style="height:25px"> 
  
  <!-- In Add Comment are we should not display anything -->
  
  <td colspan="4">
  
  <div id="tabsdevis">
<ul>
<li><a href="#tabsdevis-1" class="tabsdevis-1">Ligne Devis</a></li>
<li><a href="#tabsdevis-2" class="tabsdevis-2">Ligne fournisseur</a></li>
<li><a href="#tabsdevis-3" class="tabsdevis-3">Ligne facture</a></li>
</ul>
<div id="tabsdevis-1">
  <table width="100%" cellspacing="1" cellpadding="3" border="0" id="itemsTable" class="table table-striped">
      <tbody>
        <tr>
          <td class="lvtCol">Outils</td>
          <td class="lvtCol">Service</td>
          <td class="lvtCol">Fournisseur</td>
          <td class="lvtCol">Coût</td>
          <td class="lvtCol">PDV/Coût</td>
          <td class="lvtCol">Sup Single</td>
          <td class="lvtCol">PDV/SupS.</td>
          <td class="lvtCol">Gratuité</td>
        </tr>
       <?php echo $therow; ?>
      </tbody>
    </table>
    <a href="#" id="addRow" class="btn btn-primary"><i class="icon-plus icon-white"></i> Add Item</a>
    </div>
    
    <div id="tabsdevis-2">
    <table width="100%" cellspacing="1" cellpadding="3" border="0" id="itemsTable" class="table table-striped">
      <tbody>
        <tr>
          <td class="lvtCol">Fournisseur</td>
          <td class="lvtCol">DateResa</td>
          <td class="lvtCol">DateBPA</td>
          <td class="lvtCol">DateAnnul</td>
          <td class="lvtCol">Montant</td>
          <td class="lvtCol">Acompte</td>
          <td class="lvtCol">RégléLe</td>
          <td class="lvtCol">RégléPar</td>
          <td class="lvtCol">Solde</td>
          <td class="lvtCol">Facture</td>
          <td class="lvtCol">Recuele</td>
          <td class="lvtCol">Fichier</td>
          <td class="lvtCol">Compte</td>
          
        </tr>
       <?php echo $therowF; ?>
      </tbody>
    </table>
    </div>
    
    <div id="tabsdevis-3">
    <table width="100%" cellspacing="1" cellpadding="3" border="0" id="itemsTable" class="table table-striped">
      <tbody>
        <tr>
          <td class="lvtCol">Numero</td>
          <td class="lvtCol">Type</td>
          <td class="lvtCol">Montant</td>
          <td class="lvtCol">Payele</td>
          <td class="lvtCol"></td>
          
          
        </tr>
       <?php echo $therowC; ?>
      </tbody>
    </table>
    </div>
    </div>
    </td>
    
    
  
</tr>
<tr>
  <td class="detailedViewHeader" colspan="4"><b>Total</b></td>
</tr>

<!-- Handle the ui types display --> 

<!-- Added this file to display the fields in Create Entity page based on ui types  -->
<tr style="height:25px"> 
  
  <!-- In Add Comment are we should not display anything -->
  
  <td colspan="3" align="right" class="dvtCellLabel">
  Total Gratuité :
  <input type="text"  class="" value="" tabindex="" name="totalgratuite" id="totalgratuite">
   Marge :<input type="text"  class="" value="<?php echo $margegratuite;?>" tabindex="" name="margegratuite" id="margegratuite"> 
  </td>
  <td align="left" class="dvtCellInfo">
   <input type="text"  class="detailedViewTextBox" value="" tabindex="" name="totalpdvgratuite" id="totalpdvgratuite">
 
  </td>
</tr>

<tr style="height:25px"> 
  
  <!-- In Add Comment are we should not display anything -->
  
  <td colspan="3" align="right" class="dvtCellLabel">
  Total Pax
  </td>
  <td align="left" class="dvtCellInfo">
  <input type="text"  class="detailedViewTextBox" value="" tabindex="" name="totalpax" id="totalpax">
  </td>
</tr>
<tr style="height:25px"> 
  
  <!-- In Add Comment are we should not display anything -->
  
  <td colspan="3" align="right" class="dvtCellLabel">
  Total PDV Pac
  </td>
  <td align="left" class="dvtCellInfo">
  <input type="text"  class="detailedViewTextBox" value="" tabindex="" name="totalpdvpax" id="totalpdvpax">
  </td>
</tr>
<tr style="height:25px"> 
  
  <!-- In Add Comment are we should not display anything -->
  
  <td colspan="3" align="right" class="dvtCellLabel">
  Total Sup single
  </td>
  <td align="left" class="dvtCellInfo">
  <input type="text"  class="detailedViewTextBox" value="" tabindex="" name="totalsupsingle" id="totalsupsingle">
  </td>
</tr>
<tr style="height:25px"> 
  
  <!-- In Add Comment are we should not display anything -->
  
  <td colspan="3" align="right" class="dvtCellLabel">
  Total PDV Supsingle
  </td>
  <td align="left" class="dvtCellInfo">
  <input type="text"  class="detailedViewTextBox" value="" tabindex="" name="totalpdvsups" id="totalpdvsups">
  </td>
</tr>

<tr style="height:25px"> 
  
  <!-- In Add Comment are we should not display anything -->
  
  <td colspan="3" align="right" class="dvtCellLabel">
  Total PDV Pax retenu
  </td>
  <td align="left" class="dvtCellInfo">
  <input type="text"  class="detailedViewTextBox" value="" tabindex="" name="totalpdvpaxretenu" id="totalpdvpaxretenu">
  </td>
</tr>
<tr style="height:25px"> 
  
  <!-- In Add Comment are we should not display anything -->
  
  <td colspan="3" align="right" class="dvtCellLabel">
  Total PDV Sup single retenu
  </td>
  <td align="left" class="dvtCellInfo">
  <input type="text"  class="detailedViewTextBox" value="" tabindex="" name="totalpdvsupsingleretenu" id="totalpdvsupsingleretenu">
  </td>
</tr>
<tr style="height:25px"> 
  
  <!-- In Add Comment are we should not display anything -->
  
  <td colspan="3" align="right" class="dvtCellLabel">
  Coût de revien
  </td>
  <td align="left" class="dvtCellInfo">
  <input style="border-width: medium; border-color: red;" type="text"  class="detailedViewTextBox" value="" tabindex="" name="coutderevien" id="coutderevien">
  </td>
</tr>
<tr style="height:25px"> 
  
  <!-- In Add Comment are we should not display anything -->
  
  <td colspan="3" align="right" class="dvtCellLabel">
  Prix de vente
  </td>
  <td align="left" class="dvtCellInfo">
  <input style="border-width: medium; border-color: red;" type="text"  class="detailedViewTextBox" value="" tabindex="" name="prixdevente" id="prixdevente">
  </td>
</tr>
<tr style="height:25px"> 
  
  <!-- In Add Comment are we should not display anything -->
  
  <td colspan="3" align="right" class="dvtCellLabel">
  Marge
  </td>
  <td align="left" class="dvtCellInfo">
  <input type="text"  class="detailedViewTextBox" value="" tabindex="" name="marge" id="marge">
  </td>
</tr>
<tr style="height:25px"> 
  
  <!-- In Add Comment are we should not display anything -->
  
  <td colspan="3" align="right" class="dvtCellLabel">
  Taux
  </td>
  <td align="left" class="dvtCellInfo">
  <input type="text"  class="detailedViewTextBox" value="" tabindex="" name="taux" id="taux">
  </td>
</tr>

<tr style="height:25px"> 
  
  <!-- In Add Comment are we should not display anything -->
  
  <td colspan="3" align="right" class="dvtCellLabel">
  Solde fournisseur
  </td>
  <td align="left" class="dvtCellInfo">
  <input type="text"  class="detailedViewTextBox" value="" tabindex="" name="soldefournisseur" id="soldefournisseur">
  </td>
</tr>

<tr style="height:25px"> 
  
  <!-- In Add Comment are we should not display anything -->
  
  <td colspan="3" align="right" class="dvtCellLabel">
  Total acompte fournisseur
  </td>
  <td align="left" class="dvtCellInfo">
  <input type="text"  class="detailedViewTextBox" value="" tabindex="" name="totalfournisseur" id="totalfournisseur">
  </td>
</tr>

<tr style="height:25px"> 
  
  <!-- In Add Comment are we should not display anything -->
  
  <td colspan="3" align="right" class="dvtCellLabel">
  Solde facture
  </td>
  <td align="left" class="dvtCellInfo">
  <input type="text"  class="detailedViewTextBox" value="" tabindex="" name="soldefacture" id="soldefacture">
  </td>
</tr>

<tr style="height:25px"> 
  
  <!-- In Add Comment are we should not display anything -->
  
  <td colspan="3" align="right" class="dvtCellLabel">
  Total facture
  </td>
  <td align="left" class="dvtCellInfo">
  <input type="text"  class="detailedViewTextBox" value="" tabindex="" name="totalfacture" id="totalfacture">
  </td>
</tr>
<script>
$(function(){
	update_total();
	
	
});

$("#itemsTable input , #margegratuite, #pax_devis").keyup(function() {
	update_total();
});
	
function update_total(){
		
	var pax_devis = Number($('#pax_devis').val());
	var totalgratuite = 0;
	
	 
	 $('input.gratuite').each(function (i) {
        price = $(this).val().replace("$", "");
        if (!isNaN(price)) totalgratuite += Number(price);
    });

    totalgratuite = roundNumber(totalgratuite, 2);
	isNaN(totalgratuite) ? $('#totalgratuite').val("N/A") : $('#totalgratuite').val(totalgratuite);
	
	
	
	var gmarge = $('#margegratuite').val()/100;
	var gmarge = 1-gmarge;		
	var totalpdvgratuite = totalgratuite / gmarge;
	
	totalpdvgratuite = roundNumber(totalpdvgratuite, 2);
	isNaN(totalpdvgratuite) ? $('#totalpdvgratuite').val("N/A") : $('#totalpdvgratuite').val(totalpdvgratuite);
	
		
	
	 var totalpax = 0;
	 
	 $('input.coutpax').each(function (i) {
        price = $(this).val().replace("$", "");
        if (!isNaN(price)) totalpax += Number(price);
    });

	totalpax += (totalgratuite/pax_devis);
	
    totalpax = roundNumber(totalpax, 2);
	isNaN(totalpax) ? $('#totalpax').val("N/A") : $('#totalpax').val(totalpax);
	
	
	var totalpdvpax = 0;
	
	 
	 $('input.pdvcout').each(function (i) {
        price = $(this).val().replace("$", "");
        if (!isNaN(price)) totalpdvpax += Number(price);
    });
    totalpdvpax += (totalpdvgratuite/pax_devis);
    totalpdvpax = roundNumber(totalpdvpax, 2);
	isNaN(totalpdvpax) ? $('#totalpdvpax').val("N/A") : $('#totalpdvpax').val(totalpdvpax);	
		
		
	
	
	var totalsupsingle = 0;
	
	 
	 $('input.suos').each(function (i) {
        price = $(this).val().replace("$", "");
        if (!isNaN(price)) totalsupsingle += Number(price);
    });

    totalsupsingle = roundNumber(totalsupsingle, 2);
	isNaN(totalsupsingle) ? $('#totalsupsingle').val("N/A") : $('#totalsupsingle').val(totalsupsingle);	
	
	
		var totalpdvsups = 0;
	
	 
	 $('input.pdvsups').each(function (i) {
        price = $(this).val().replace("$", "");
        if (!isNaN(price)) totalpdvsups += Number(price);
    });

    totalpdvsups = roundNumber(totalpdvsups, 2);
	isNaN(totalpdvsups) ? $('#totalpdvsups').val("N/A") : $('#totalpdvsups').val(totalpdvsups);	
	
	
	
	var totalsolde = 0;
	
	 
	 $('input.solde').each(function (i) {
        price = $(this).val().replace("$", "");
        if (!isNaN(price)) totalsolde += Number(price);
    });

    totalsolde = roundNumber(totalsolde, 2);
	isNaN(totalsolde) ? $('#soldefournisseur').val("N/A") : $('#soldefournisseur').val(totalsolde);	
	
	
	var totalacompte = 0;
	
	 
	 $('input.acompte').each(function (i) {
        price = $(this).val().replace("$", "");
		
		
        if (!isNaN(price)) totalacompte += Number(price);
    });

    totalacompte = roundNumber(totalacompte, 2);
	isNaN(totalacompte) ? $('#totalfournisseur').val("N/A") : $('#totalfournisseur').val(totalacompte);	
	
	var totalfacture = 0;
	
	 
	 $('input.montantf').each(function (i) {
        price = $(this).val().replace("$", "");
       
		lid =  $(this).attr("name").replace("montantf", "");
		 
		 if($("#typelignefacture"+lid).val() == 1){
			 if (!isNaN(price)) totalfacture += Number(price);
		 }else{
			 if (!isNaN(price)) totalfacture -= Number(price);
		 }
    });

    totalfacture = roundNumber(totalfacture, 2);
	isNaN(totalfacture) ? $('#totalfacture').val("N/A") : $('#totalfacture').val(totalfacture);	
	
	
	
	
	
	
	totalpdvpaxretenu	= arrondiSuperieur(totalpdvpax, 5);
	 totalpdvpaxretenu = roundNumber(totalpdvpaxretenu, 2);
	isNaN(totalpdvpaxretenu) ? $('#totalpdvpaxretenu').val("N/A") : $('#totalpdvpaxretenu').val(totalpdvpaxretenu);
	
	totalpdvsupsingleretenu = arrondiSuperieur(totalpdvsups, 5);
	totalpdvsupsingleretenu = roundNumber(totalpdvsupsingleretenu, 2);
	
	isNaN(totalpdvsupsingleretenu) ? $('#totalpdvsupsingleretenu').val("N/A") : $('#totalpdvsupsingleretenu').val(totalpdvsupsingleretenu);
	
	coutderevien = (totalpax*pax_devis);
	coutderevien = roundNumber(coutderevien, 2);
	
	isNaN(coutderevien) ? $('#coutderevien').val("N/A") : $('#coutderevien').val(coutderevien);
	
	prixdevente = (totalpdvpaxretenu*pax_devis);
	prixdevente = roundNumber(prixdevente, 2);
	
	isNaN(prixdevente) ? $('#prixdevente').val("N/A") : $('#prixdevente').val(prixdevente);
		
	marge = (prixdevente-coutderevien);
	marge = roundNumber(marge, 2);
	isNaN(marge) ? $('#marge').val("N/A") : $('#marge').val(marge);
	
	taux = (marge/prixdevente);
	taux = (taux*100);
	taux = roundNumber(taux, 2);
	isNaN(taux) ? $('#taux').val("N/A") : $('#taux').val(taux);
	
	soldefacture = (prixdevente-totalfacture);
	soldefacture = roundNumber(soldefacture, 2);
	isNaN(soldefacture) ? $('#soldefacture').val("N/A") : $('#soldefacture').val(soldefacture);
	
}
	
	
function arrondiSuperieur($nombre, $arrondi) {
    return Math.ceil($nombre / $arrondi) * $arrondi;
}


function valideopenerformrowfournisseur($row){ var popy= window.open('popup.php?page=list&cat=fournisseur&js=insert-<?php echo $cat; ?>-valideopenerformrowfournisseur&row='+$row,'popup_form<?php echo $vpbup; ?>','menubar=no,status=no,top=50%,left=50%,height=700,width=900,scrollbars=1');

 };




	
	$( ".tabsdevis-1" ).click(function () {
	
	$.cookie('tabsdevis', '0', {
    expire : 1,
    path : '/'
	});
	
});

$( ".tabsdevis-2" ).click(function () {
	$.cookie('tabsdevis', '1', {
    expire : 1,
    path : '/'
	});
	
});	

$( ".tabsdevis-3" ).click(function () {
	$.cookie('tabsdevis', '2', {
    expire : 2,
    path : '/'
	});
	
});		
	
			
			
</script>
 
