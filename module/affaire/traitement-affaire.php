<?php



$id		 = $_REQUEST['id'.$cat];
$button 		= $_REQUEST['button'];

//

//appel variable
$nom 				= $_REQUEST['nom_'.$cat];//text -- classique
$type 				= $_REQUEST['type_'.$cat];//select -- bdd type
$debutdate 		= $_REQUEST['debutdate_'.$cat];//text- date
$findate 			= $_REQUEST['findate_'.$cat];//text- date
$origine 			= $_REQUEST['origine_'.$cat];//select -- bdd type
$societe 			= $_REQUEST['societe_'.$cat];//select -- bdd type
$numero			= $_REQUEST['numero_'.$cat];//text -- avec regle de decompte
$idclient 			= $_REQUEST['idclient_'.$cat];//text+ hiden recherche via popup
$idfournisseur 	= $_REQUEST['idfournisseur_'.$cat];//text+ hiden recherche via popup
$pax				= $_REQUEST['pax_'.$cat];//text -- classique
$nompax			= $_REQUEST['nompax_'.$cat];//text -- classique
$echeance			= $_REQUEST['echeance_'.$cat];//text- date
$phasedevente		= $_REQUEST['phasedevente_'.$cat];//select -- bdd type
$assigne			= $_REQUEST['assigne_'.$cat];//select -- bdd type
$description		= $_REQUEST['description_'.$cat];//bloctext -- tiny
//echo $description;

//fin variable

//constant


$relatifa = $_REQUEST['relatifa'];
$idrelation = $_REQUEST['idrelation'];
$useronline = $_COOKIE["useronline"];





if ($id == "new"){
	$type = 1;
	$id = "";
	
}else{
	$type = 2;
	
	
}


$debutdate = explode("/",$debutdate);
$debutdate = $debutdate[2]."-".$debutdate[1]."-".$debutdate[0];


$findate = explode("/",$findate);
$findate = $findate[2]."-".$findate[1]."-".$findate[0];

$echeance = explode("/",$echeance);
$echeance = $echeance[2]."-".$echeance[1]."-".$echeance[0];
//echo $echeance ;


$sql = "INSERT INTO `crmtourisme`.`".$cat."` (
				`id`, 
				`nom`, 
				`debutsejour`, 
				`finsejour`, 
				`origine`, 
				`societe`, 
				`assigne`, 
				`client`, 
				`fournisseur`, 
				`echeance`, 
				`phasedevente`, 
				`description`, 
				`pax`, 
				`nompax`, 
				`datecrea`, 
				`datemodif`, 
				`usermodif`, 
				`type`, 
				`numero`
				) 
				
				VALUES ('$id', '$nom', '$debutdate', '$findate', '$origine', '$societe', '$assigne', '$idclient', '$idfournisseur', '$echeance', '$phasedevente', '$description', '$pax', '$nompax', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '$useronline', '$type', '$numero')
				
				ON DUPLICATE KEY UPDATE 
				
				`nom` = '$nom', 
				`debutsejour` = '$debutdate', 
				`finsejour` = '$findate', 
				`origine` = '$origine', 
				`societe` = '$societe', 
				`assigne` = '$assigne', 
				`client` = '$idclient', 
				`fournisseur` = '$idfournisseur', 
				`echeance` = '$echeance', 
				`phasedevente` = '$phasedevente', 
				`description` = '$description', 
				`pax` = '$pax', 
				`nompax` = '$nompax', 
				`datemodif` = CURRENT_TIMESTAMP, 
				`usermodif` = '$useronline', 
				`type` = '$type', 
				`numero` = '$numero'
				
				;";



			//echo $sql;
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());



if($id == 0){
$id=mysql_insert_id();
}


if($button == "Sauver"){
	if($type == 1){
	$urlretour = urldecode($urlcurrent)."&id".$cat."=".$id;
	
	}else{
		$urlretour = urldecode($urlcurrent);
		
	}
}else if($button == "SaveQuit"){
	
	$urlretour = urldecode($urlprev);
}else if($button == "Annuler"){
	
	$urlretour = urldecode($urlprev);
	header("Location: $urlretour");
}


$sql = "INSERT INTO `crmtourisme`.`historique` (`id`, `typehistorique`, `assigne`, `relatifa`, `idrelation`, `datecrea`) VALUES (NULL, '$type', '$useronline', '".$cat."', '$id', CURRENT_TIMESTAMP);";

//echo $sql;

$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

//echo $urlretour;

header("Location: $urlretour");  

?>