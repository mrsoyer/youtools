<?php



$id		 = $_REQUEST['id'.$cat];
$button 		= $_REQUEST['button'];

//

//appel variable

		$nom 				= $_REQUEST['nom_'.$cat];
		$numerodevis 				= $_REQUEST['numerodevis_'.$cat];
		$paxcalcul 		= $_REQUEST['paxcalcul_'.$cat];
		$debut 			= $_REQUEST['debut_'.$cat];
		$fin 			= $_REQUEST['fin_'.$cat];
		$dateecheance 			= $_REQUEST['dateecheance_'.$cat];
		$idaffaire				= $_REQUEST['idaffaire_'.$cat];
		$phasedevis 			= $_REQUEST['phasedevis_'.$cat];
		$cgv 	= $_REQUEST['cgv_'.$cat];
		$commentaire				= $_REQUEST['commentaire_'.$cat];
		$listrow = $_REQUEST['listrow'];
		$margegratuite = $_REQUEST['margegratuite'];
		$coutderevien = $_REQUEST['coutderevien'];
		$prixdevente = $_REQUEST['prixdevente'];
		$assigne = $_REQUEST['assigne'];
		$idsociete = $_REQUEST['idsociete'];
		$extsociete = $_REQUEST['extsociete'];
		
		
		
		
//echo $description;

//fin variable

//constant





$relatifa = $_REQUEST['relatifa'];
$idrelation = $_REQUEST['idrelation'];
$useronline = $_COOKIE["useronline"];

$numerodevis = str_replace($extsociete."d","",$numerodevis);
if($numerodevis == ""){
	
	$sql = "SELECT `numerodevis`
FROM `devis` d
INNER JOIN affaire a ON d.`idaffaire` = a.id
WHERE a.societe = $idsociete
ORDER BY d.`numerodevis` DESC LIMIT 1";

$req2 = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
		
		 $row = mysql_fetch_row($req2);
    	$numerodevis = $row[0]+1;
	
}



if ($id == "new"){
	$type = 1;
	$id = "";
	
}else{
	$type = 2;
	
	
}




$debut = explode("/",$debut);
$debut = $debut[2]."-".$debut[1]."-".$debut[0];


$fin = explode("/",$fin);
$fin = $fin[2]."-".$fin[1]."-".$fin[0];

$dateecheance = explode("/",$dateecheance);
$dateecheance = $dateecheance[2]."-".$dateecheance[1]."-".$dateecheance[0];


$sql = "INSERT INTO `crmtourisme`.`".$cat."` (
							`id` ,
							`numerodevis` ,
							`paxcalcul` ,
							`debut` ,
							`fin` ,
							`dateecheance` ,
							`assigne` ,
							`idaffaire` ,
							`phasedevis` ,
							`cgv` ,
							`commentaire` ,
							`datecrea` ,
							`datemodif` ,
							`usermodif`,
							`margegratuite`,
							`nom`,
							`coutderevien`,
							`prixdevente`
							
							)
							VALUES (
							'$id', '$numerodevis', '$paxcalcul', '$debut', '$fin', '$dateecheance', '$assigne', '$idaffaire', '$phasedevis', '$cgv', '$commentaire', CURRENT_TIMESTAMP( ) , CURRENT_TIMESTAMP , '$useronline','$margegratuite', '$nom' , '$coutderevien', '$prixdevente'
							)
							
							
							ON DUPLICATE KEY UPDATE 
							
							
							`numerodevis` = '$numerodevis',
							`paxcalcul` = '$paxcalcul',
							`debut` = '$debut',
							`fin` = '$fin',
							`dateecheance` = '$dateecheance',
							`assigne` = '$assigne',
							`idaffaire` = '$idaffaire',
							`phasedevis` = '$phasedevis',
							`cgv` = '$cgv',
							`commentaire` = '$commentaire',
							`datemodif` = CURRENT_TIMESTAMP(),
							`usermodif` = '$usermodif',
							`margegratuite` = '$margegratuite',
							`nom`= '$nom',
							`coutderevien` = '$coutderevien',
							`prixdevente` = '$prixdevente'
							





";





			

$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

if($id == 0){
$id=mysql_insert_id();
}



if($phasedevis == 4){
	
	$sql = "UPDATE `crmtourisme`.`affaire` SET `devis` = '$id' WHERE `affaire`.`id` ='$idaffaire';";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	
	$sql = "UPDATE `crmtourisme`.`devis` SET `phasedevis` = '5' WHERE `phasedevis` = '4' AND `devis`.`id` !='$id' AND  `devis`.`idaffaire` ='$idaffaire';";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	
}

$sql = "DELETE FROM `crmtourisme`.`lignedevis` WHERE `lignedevis`.`iddevis` = $id";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
foreach($listrow as $value){
	
	$j = $_REQUEST['j'.$value];
	$o = $_REQUEST['o'.$value];
	$service = $_REQUEST['service'.$value];
	$servicenote = $_REQUEST['servicenote'.$value];
	$comclient = $_REQUEST['comclient'.$value];
	$idfournisseur = $_REQUEST['idfournisseur'.$value];
	$comfournisseur = $_REQUEST['comfournisseur'.$value];
	$coutglobal = $_REQUEST['coutglobal'.$value];
	$coutpax = $_REQUEST['coutpax'.$value];
	$margeC = $_REQUEST['margeC'.$value];
	
	$suos = $_REQUEST['suos'.$value];
	$margeS = $_REQUEST['margeS'.$value];
	$gratuite = $_REQUEST['gratuite'.$value];
	
	
	$sql = "INSERT INTO `crmtourisme`.`lignedevis` (
				`id` ,
				`iddevis` ,
				`ordre` ,
				`journee` ,
				`service` ,
				`servicenote` ,
				`comclient` ,
				`comfournisseur` ,
				`idfournisseur` ,
				`coutglobal` ,
				`coutpax` ,
				`marge` ,
				`supsingle` ,
				`margesupsingle` ,
				`gratuite` ,
				`datecrea` ,
				`datemodif` ,
				`usermodif`
				)
				VALUES (
				NULL , '$id', '$o', '$j', '$service', '$servicenote', '$comclient', '$comfournisseur', '$idfournisseur', '$coutglobal', '$coutpax', '$margeC', '$suos', '$margeS', '$gratuite', CURRENT_TIMESTAMP ,
				CURRENT_TIMESTAMP , '$useronline'
				);
				
				";
				
		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
					
	
}


$sql = "SELECT *
FROM `lignedevis`
WHERE `iddevis` =".$id." GROUP BY `idfournisseur`";

$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($data = mysql_fetch_assoc($req)) {
		
		$sql2 = "
		SELECT COUNT(*)
			FROM `lignefournisseur`
			WHERE `iddevis` =".$id."
			AND `idfournisseur` =".$data['idfournisseur']."";
			
		$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
		
		 $row = mysql_fetch_row($req2);
    	$total = $row[0];
		
		if($row[0] == 0){
			
			$sql3 = "
		
		SELECT SUM( `coutglobal` )
		FROM lignedevis
		WHERE iddevis = '".$id."'
		AND idfournisseur = '".$idfournisseur."'
		GROUP BY `idfournisseur` 
		";
		$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error());
		
		$row = mysql_fetch_row($req3);
    	$montant = $row[0];
		
		
			
			$sql3 = "INSERT INTO `crmtourisme`.`lignefournisseur` (`id`, `iddevis`, `idfournisseur`, `montant`) VALUES (NULL, '".$id."', '".$data['idfournisseur']."','".$montant."');";
			$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error());
			
		}
		
		
	}

$sql = "SELECT *
FROM `lignefournisseur`
WHERE `iddevis` =".$id."";

$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($data = mysql_fetch_assoc($req)) {
		
		 $idfournisseur = $_REQUEST['idfournisseur'.$data['id']];
		 $dateresa = $_REQUEST['dateresa'.$data['id']];//date
        $datepba= $_REQUEST['datepba'.$data['id']];//date
        $dateannul = $_REQUEST['dateannul'.$data['id']];//date
        
        $acompte= $_REQUEST['acompte'.$data['id']];
        $reglerle = $_REQUEST['reglerle'.$data['id']];//date
        $reglerpar = $_REQUEST['reglerpar'.$data['id']];
        $numerofacture = $_REQUEST['numerofacture'.$data['id']];
        $recuele = $_REQUEST['recuele'.$data['id']];//date
        $fichier = $_REQUEST['fichier'.$data['id']];//file
		$lastfichier = $_REQUEST['lastfichier'.$data['id']];//file
        $compte = $_REQUEST['compte'.$data['id']];
		$thefile = $lastfichier	;
		
		$dateresa = explode("/",$dateresa);
		$dateresa = $dateresa[2]."-".$dateresa[1]."-".$dateresa[0];
		
		
		$datepba = explode("/",$datepba);
		$datepba = $datepba[2]."-".$datepba[1]."-".$datepba[0];
		
		$dateannul = explode("/",$dateannul);
		$dateannul = $dateannul[2]."-".$dateannul[1]."-".$dateannul[0];
		
		$reglerle = explode("/",$reglerle);
		$reglerle = $reglerle[2]."-".$reglerle[1]."-".$reglerle[0];
		
		$recuele = explode("/",$recuele);
		$recuele = $recuele[2]."-".$recuele[1]."-".$recuele[0];
		
		$sql2 = "
		
		SELECT SUM( `coutglobal` )
		FROM lignedevis
		WHERE iddevis = '".$id."'
		AND idfournisseur = '".$idfournisseur."'
		GROUP BY `idfournisseur` 
		";
		$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
		
		$row = mysql_fetch_row($req2);
    	$montant = $row[0];
		
		
		
		if ($_FILES['fichier'.$data['id']]['tmp_name']){
	
	
		$uploaddir = "/Applications/MAMP/htdocs/crmtourisme/module/devis/uploads/";
		
		if(isset($lastfichier) && $lastfichier != ""){
			unlink("/Applications/MAMP/htdocs/crmtourisme/module/contact/uploads/".$lastfichier); 
		}
		
		$thefile = time()."-".basename($_FILES['fichier'.$data['id']]['name']);
		$uploadfile = $uploaddir.$thefile ;
		
		
		move_uploaded_file($_FILES['fichier'.$data['id']]['tmp_name'], $uploadfile);
		
		

		}
		
		$sql2="
		UPDATE `crmtourisme`.`lignefournisseur` SET `dateresa` = '$dateresa',
			`datepba` = '$datepba',
			`dateannul` = '$dateannul',
			`montant` = '$montant',
			`acompte` = '$acompte',
			`reglele` = '$reglerle',
			`reglepar` = '$reglerpar',
			`recuele` = '$recuele',
			`datecrea` = CURRENT_TIME( ) ,
			`usermodif` = '$useronline',
			`fichierfacture` = '$thefile',
			`datefacture` = '$datefacture',
			`compte` = '$compte',
			`numerofacture` = '$numerofacture' WHERE `lignefournisseur`.`id` =".$data['id'].";";
		$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
		
		
		
	}

$sql = "SELECT *
FROM `lignefacture`
WHERE `iddevis` =".$id."";

$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($data = mysql_fetch_assoc($req)) {
		
		 $numerofacture = $_REQUEST['numerofacture'.$data['id']];
		 $typelignefacture = $_REQUEST['typelignefacture'.$data['id']];
        $montant= $_REQUEST['montantf'.$data['id']];
        $payele = $_REQUEST['payele'.$data['id']];//date
        
        
		
		$payele = explode("/",$payele);
		$payele = $payele[2]."-".$payele[1]."-".$payele[0];
		
		
		
		$numerofacture = str_replace($extsociete."f","",$numerofacture);
		
		
		$sql2="
		UPDATE `crmtourisme`.`lignefacture` SET 
			
			`numerofacture` = '$numerofacture',
			`typelignefacture` = '$typelignefacture',
			`montant` = '$montant',
			`payele` = '$payele'
			 WHERE `lignefacture`.`id` =".$data['id'].";";
		$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
		
		
		
	}
	
if($_REQUEST['montantf0'] != "" && $type == 2 ){
	
		 $numerofacture = $_REQUEST['numerofacture0'];
		 $typelignefacture = $_REQUEST['typelignefacture0'];
        $montant= $_REQUEST['montantf0'];
        $payele = $_REQUEST['payele0'];//date
        
        
		
		$payele = explode("/",$payele);
		$payele = $payele[2]."-".$payele[1]."-".$payele[0];
		
		
		
		
			
			$sql2 = "SELECT `numerofacture`
		FROM `devis` d
		INNER JOIN affaire a ON d.`idaffaire` = a.id
		INNER JOIN lignefacture f ON d.`id` = f.iddevis
		WHERE a.societe = $idsociete
		ORDER BY f.`numerofacture` DESC LIMIT 1";
		
		$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
				
				 $row = mysql_fetch_row($req2);
				$numerofacture = $row[0]+1;
			
		
		
		
		
		$sql2="
		INSERT INTO `crmtourisme`.`lignefacture` (
						`id` ,
						`typelignefacture` ,
						`montant` ,
						`numerofacture` ,
						`datecrea` ,
						`payele` ,
						`iddevis`
						)
						VALUES (
						NULL , '$typelignefacture', '$montant', '$numerofacture',
						CURRENT_TIMESTAMP , '$payele', '$id'
						);
						";
		$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
	
	
	
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