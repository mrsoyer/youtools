<?php



$id		 = $_REQUEST['id'.$cat];
$button 		= $_REQUEST['button'];

//

//appel variable


	$nom 				= $_REQUEST['nom_'.$cat];
	$telbureau			= $_REQUEST['telbureau_'.$cat];
	$telmobile			= $_REQUEST['telmobile_'.$cat];
	$teldiv				= $_REQUEST['teldiv_'.$cat];
	$fax				= $_REQUEST['fax_'.$cat];
	$secondmail		= $_REQUEST['secondmail_'.$cat];
	$origine			= $_REQUEST['origine_'.$cat];
	$assigne			= $_REQUEST['assigne_'.$cat];
	$adresse			= $_REQUEST['adresse_'.$cat];
	$ville				= $_REQUEST['ville_'.$cat];
	$codepostal		= $_REQUEST['codepostal_'.$cat];
	$pays				= $_REQUEST['pays_'.$cat];
	$site				= $_REQUEST['site_'.$cat];
	$description		= $_REQUEST['description_'.$cat];
	$photo				= $_REQUEST['photo_'.$cat];
	$codecompta		= $_REQUEST['codecompta_'.$cat];
	$contactlie		= $_REQUEST['contactlie_'.$cat];
	$datecrea			= $_REQUEST['datecrea_'.$cat];
	$datemodif			= $_REQUEST['datemodif_'.$cat];
	$usermodif			= $_REQUEST['usermodif_'.$cat];
	$lastphoto			= $_REQUEST['lastphoto_'.$cat];
	$thefile = $lastphoto	;


//fin variable

//constant



$useronline = $_COOKIE["useronline"];





if ($id == "new"){
	$type = 1;
	$id = "";
	
}else{
	$type = 2;
	
	
}

if ($_FILES['photo_'.$cat]['tmp_name']){
	
	
	$uploaddir = "/Applications/MAMP/htdocs/crmtourisme/module-".$cat."/uploads/";
	
	if(isset($lastphoto) && $lastphoto != ""){
		unlink("/Applications/MAMP/htdocs/crmtourisme/module-".$cat."/uploads/".$lastphoto); 
	}
	
	$thefile = time()."-".basename($_FILES['photo_'.$cat]['name']);
	$uploadfile = $uploaddir.$thefile ;
	
	
	move_uploaded_file($_FILES['photo_'.$cat]['tmp_name'], $uploadfile);

}

$sql = "INSERT INTO `crmtourisme`.`".$cat."` (
				`id` ,
				`nom` ,
				`telbureau` ,
				`telmobile` ,
				`teldiv` ,
				`fax` ,
				`secondmail` ,
				`origine` ,
				`assigne` ,
				`adresse` ,
				`ville` ,
				`codepostal` ,
				`pays` ,
				`description` ,
				`photo` ,
				`codecompta` ,
				`contactlie` ,
				`datecrea` ,
				`datemodif` ,
				`usermodif`
				)
				VALUES (
				'$id', '$nom', '$telbureau', '$telmobile', '$teldiv', '$fax', '$secondmail', '$origine', '$assigne', '$adresse', '$ville', '$codepostal', '$pays', '$description', '$thefile', '$codecompta', '$contactlie', CURRENT_TIMESTAMP,
				CURRENT_TIMESTAMP , '$useronline'
				)
				
				
				ON DUPLICATE KEY UPDATE
				
				`nom` = '$nom',
				`telbureau` = '$telbureau',
				`telmobile` = '$telmobile',
				`teldiv` = '$teldiv',
				`fax` = '$fax',
				`secondmail` = '$secondmail',
				`origine` = '$origine',
				`assigne` = '$assigne',
				`adresse` = '$adresse',
				`ville` = '$ville',
				`codepostal` = '$codepostal',
				`pays` = '$pays',
				`description` = '$description',
				`photo` = '$thefile',
				`codecompta` = '$codecompta',
				`contactlie` = '$contactlie',
				`datemodif` = CURRENT_TIMESTAMP,
				`usermodif` = '$useronline'
				
				;";



			
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


$sql = "INSERT INTO `crmtourisme`.`historique` (`id`, `typehistorique`, `assigne`, `relatifa`, `idrelation`, `datecrea`) VALUES (NULL, '$type', '$useronline', '$cat', '$id', CURRENT_TIMESTAMP);";

//echo $sql;

$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

//echo $urlretour;

header("Location: $urlretour");  

?>