<?php


$debutdate = date('d/m/Y');
$findate = date('d/m/Y');

$listeenplus[0] = "taches";
$listeenplus[1] = "devis";
			
if(isset($_REQUEST['id'.$cat]) && $_REQUEST['id'.$cat]!= ""){
	
	$id = $_REQUEST['id'.$cat];
	
	$sql = "SELECT * FROM `".$cat."` WHERE `id` = $id  ";
	
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($data = mysql_fetch_assoc($req)) {
		
		
		
		
		$nom 				= $data['nom'];
		$type 				= $data['type'];
		$debutdate 		= $data['debutsejour'];
		$findate 			= $data['finsejour'];
		$origine 			= $data['origine'];
		$societe 			= $data['societe'];
		$numero				= $data['numero'];
		$idclient 			= $data['client'];
		$idfournisseur 	= $data['fournisseur'];
		$pax				= $data['pax'];
		$nompax				= $data['nompax'];
		$echeance			= $data['echeance'];
		$phasedevente		= $data['phasedevente'];
		$assigne			= $data['assigne'];
		$description		= $data['description'];
		$devis		= $data['devis'];
		
		$relatifa 					= $data['relatifa'];
		$idrelation 				= $data['idrelation'];

			
		$debutdate = explode("-", $debutdate);
		$debutdate = $debutdate[2]."/".$debutdate[1]."/".$debutdate[0];
		
		$findate = explode("-", $findate);
		$findate = $findate[2]."/".$findate[1]."/".$findate[0];
		
		$echeance = explode("-", $echeance);
		$echeance = $echeance[2]."/".$echeance[1]."/".$echeance[0];
			
			
		if ($devis != 0 && $devis != ""){
			
			$ongletsup = 1;
			
			$titreongletsup = "Devis";
			
			$linksup = $chemin."share".$wintype.".php?page=insert&cat=devis&iddevis=".$devis;
			
		}
		

		
		
		
		
		
		
	}
		
}else{
	
	$id = "new";
}



//select $type 
$sql = "SELECT * FROM `type` ";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
$typeselect = "";
while($data = mysql_fetch_assoc($req)) {
	
	if($data['id'] == $type){
	
		$typeselect .= "<option selected='selected' value=\"".$data['id']."\">".$data['type']."</option>";
	
	}else{
		
		$typeselect .= "<option value=\"".$data['id']."\">".$data['type']."</option>";
		
	}
	
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

$sql = "SELECT * FROM `societe` ";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
$societeselect = "";
while($data = mysql_fetch_assoc($req)) {
	
	if($data['id'] == $societe){
	
		$societeselect .= "<option selected='selected' value=\"".$data['id']."\">".$data['societe']."</option>";
	
	}else{
		
		$societeselect .= "<option value=\"".$data['id']."\">".$data['societe']."</option>";
		
	}
	
}

$sql = "SELECT * FROM `phasedevente` ";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
$phasedeventeselect = "";
while($data = mysql_fetch_assoc($req)) {
	
	if($data['id'] == $phasedevente){
	
		$phasedeventeselect .= "<option selected='selected' value=\"".$data['id']."\">".$data['phasedevente']."</option>";
	
	}else{
		
		$phasedeventeselect .= "<option value=\"".$data['id']."\">".$data['phasedevente']."</option>";
		
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

	if(isset($idclient)){
	$sql = "SELECT * FROM `client` WHERE id = $idclient ";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	
	$iclient = 0;
	while($data = mysql_fetch_assoc($req)) {
		
		
		
			$nomclient = "<input type=\"text\" disabled=\"disabled\"  value=\"".$data['nom']."\" tabindex=\"\" name=\"nomclient_".$cat."\" >
			<a><img border=\"0\" src=\"themes/softed/images/settingsBox.png\" alt=\"Rechercher dans Affaires...\" title=\"Rechercher dans clienr...\" id=\"nomclient_".$cat."\" onclick='editformclient()'></a>
			
			
			

			
			
			";
		
		$iclient++;
		
	}
	}
	if($iclient == 0){
		
		$nomclient = "<input type=\"text\" disabled=\"disabled\"   tabindex=\"\" name=\"nomclient_".$cat."\" >";
		
		
	}
	

include("classmodule/insertheader.php"); 	
include("module/".$cat."/insert-baseform-".$cat.".php"); 
include("classmodule/insertfooter.php"); 	
include("module/".$cat."/insert-".$cat."-js.php"); 

?>

<!-- included to handle the edit fields based on ui types -->

<!-- This is added to display the existing comments -->






