<?php



$idcontact		 = $_REQUEST['idcontact'];
$button 		= $_REQUEST['button'];

//

//appel variable


	$nom_contact 				= $_REQUEST['nom_contact'];
	$telbureau_contact			= $_REQUEST['telbureau_contact'];
	$telmobile_contact			= $_REQUEST['telmobile_contact'];
	$teldiv_contact				= $_REQUEST['teldiv_contact'];
	$fax_contact				= $_REQUEST['fax_contact'];
	$secondmail_contact		= $_REQUEST['secondmail_contact'];
	$origine_contact			= $_REQUEST['origine_contact'];
	$assigne_contact			= $_REQUEST['assigne_contact'];
	$adresse_contact			= $_REQUEST['adresse_contact'];
	$ville_contact				= $_REQUEST['ville_contact'];
	$codepostal_contact		= $_REQUEST['codepostal_contact'];
	$pays_contact				= $_REQUEST['pays_contact'];
	$description_contact		= $_REQUEST['description_contact'];
	$photo_contact				= $_REQUEST['photo_contact'];
	$lastphoto_contact			= $_REQUEST['lastphoto_contact'];
	
	$prenom_contact			= $_REQUEST['prenom_contact'];
	$civilite_contact			= $_REQUEST['civilite_contact'];
	$fonction_contact			= $_REQUEST['fonction_contact'];
	$email_contact			= $_REQUEST['email_contact'];
	
	$thefile = $lastphoto_contact	;


//fin variable

//constant



$useronline = $_COOKIE["useronline"];





if ($idcontact == "new"){
	$type = 1;
	$idcontact = "";
	
}else{
	$type = 2;
	
	
}

if ($_FILES['photo_contact']['tmp_name']){
	
	
	$uploaddir = "/Applications/MAMP/htdocs/crmtourisme/module-contact/uploads/";
	
	if(isset($lastphoto_contact) && $lastphoto_contact != ""){
		unlink("/Applications/MAMP/htdocs/crmtourisme/module-contact/uploads/".$lastphoto_contact); 
	}
	
	$thefile = time()."-".basename($_FILES['photo_contact']['name']);
	$uploadfile = $uploaddir.$thefile ;
	
	
	move_uploaded_file($_FILES['photo_contact']['tmp_name'], $uploadfile);

}

$sql = "INSERT INTO `crmtourisme`.`contact` (
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
				`prenom` ,
				`civilite` ,
				`fonction` ,
				`email` ,
				`datecrea` ,
				`datemodif` ,
				`usermodif`
				)
				VALUES (
				'$idcontact', '$nom_contact', '$telbureau_contact', '$telmobile_contact', '$teldiv_contact', '$fax_contact', '$secondmail_contact', '$origine_contact', '$assigne_contact', '$adresse_contact', '$ville_contact', '$codepostal_contact', '$pays_contact', '$description_contact', '$thefile', '$prenom_contact', '$civilite_contact', '$fonction_contact', '$email_contact',  CURRENT_TIMESTAMP,
				CURRENT_TIMESTAMP , '$useronline'
				)
				
				
				ON DUPLICATE KEY UPDATE
				
				`nom` = '$nom_contact',
				`telbureau` = '$telbureau_contact',
				`telmobile` = '$telmobile_contact',
				`teldiv` = '$teldiv_contact',
				`fax` = '$fax_contact',
				`secondmail` = '$secondmail_contact',
				`origine` = '$origine_contact',
				`assigne` = '$assigne_contact',
				`adresse` = '$adresse_contact',
				`ville` = '$ville_contact',
				`codepostal` = '$codepostal_contact',
				`pays` = '$pays_contact',
				`description` = '$description_contact',
				`photo` = '$thefile',
				`prenom` = '$prenom_contact',
				`civilite` = '$civilite_contact',
				`fonction` = '$fonction_contact',
				`email` = '$email_contact',
				`datemodif` = CURRENT_TIMESTAMP,
				`usermodif` = '$useronline'
				
				;";



			
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());



if($idcontact == 0){
$idcontact=mysql_insert_id();
}


if($button == "Sauver"){
	if($type == 1){
	$urlretour = urldecode($urlcurrent)."&idcontact=".$idcontact;
	
	}else{
		$urlretour = urldecode($urlcurrent);
		
	}
}else if($button == "SaveQuit"){
	
	$urlretour = urldecode($urlprev);
}else if($button == "Annuler"){
	
	$urlretour = urldecode($urlprev);
	header("Location: $urlretour");
}


$sql = "INSERT INTO `crmtourisme`.`historique` (`id`, `typehistorique`, `assigne`, `relatifa`, `idrelation`, `datecrea`) VALUES (NULL, '$type', '$useronline', 'contact', '$idcontact', CURRENT_TIMESTAMP);";

//echo $sql;

$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

//echo $urlretour;

header("Location: $urlretour");  

?>