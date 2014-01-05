<?php
$debutdate = date('d/m/Y');
$findate = date('d/m/Y');

$idaffaire = $_REQUEST['idaffaire'];
if(isset($_REQUEST['id'.$cat]) && $_REQUEST['id'.$cat]!= ""){
	
	$id = $_REQUEST['id'.$cat];
	
	$sql = "SELECT * FROM `".$cat."` WHERE `id` = $id  ";
	
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($data = mysql_fetch_assoc($req)) {
		
		
		
		$nom 				= $data['nom'];
		$numerodevis 				= $data['numerodevis'];
		$pax 				= $data['pax'];
		$paxcalcul 		= $data['paxcalcul'];
		$debut 			= $data['debut'];
		$fin 			= $data['fin'];
		$dateecheance 			= $data['dateecheance'];
		$idaffaire				= $data['idaffaire'];
		$phasedevis 			= $data['phasedevis'];
		$cgv 	= $data['cgv'];
		$commentaire				= $data['commentaire'];
		
		$debutligne = $debut;
		
		$debut = explode("-", $debut);
		$debut = $debut[2]."/".$debut[1]."/".$debut[0];
		
		
		$fin = explode("-", $fin);
		$fin = $fin[2]."/".$fin[1]."/".$fin[0];
		
		$dateecheance = explode("-", $dateecheance);
		$dateecheance = $dateecheance[2]."/".$dateecheance[1]."/".$dateecheance[0];
		
		$margegratuite = $data['margegratuite']; 
		
		
			
			
		
		
$tabs = $_REQUEST[$cat.$id];

if 	($tabs == ""){
	
	$tabs = 0;
	
}
		
		
		
		
		
		
	}
		
}else{
	
	$id = "new";
	$tabs = 0;
}
$tabs = 0;






//select $type 
$sql = "SELECT * FROM `affaire` WHERE id = '$idaffaire' LIMIT 1	 ";

$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

while($data = mysql_fetch_assoc($req)) {
	
	
	
		$nomaffaire = "<a onclick='editformnomaffaire()'>".$data['nom']."</a>";
		
		$idclient = $data['client'];
		$idsociete = $data['societe'];
		
		
		
	
	
	
}

$sql = "SELECT * FROM `societe` WHERE id = '$idsociete' LIMIT 1	 ";

$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

while($data = mysql_fetch_assoc($req)) {
	
	
	
		$extsociete = $data['ext'];
		
		
		
	
	
	
}



if(isset($idclient)){
	$sql = "SELECT * FROM `client` WHERE id = $idclient ";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	
	
	while($data = mysql_fetch_assoc($req)) {
		
		
		
			$nomclientaffaire = "
			<a onclick='editformclient()'>".$data['nom']."</a>
			
			
			

			
			
			";
		
		
		
	}
	}
//echo ;







$sql = "SELECT * FROM `phasedevis` ";

$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
$phasedevisselect = "";
while($data = mysql_fetch_assoc($req)) {
	
	if($data['id'] == $phasedevis){
	
		$phasedevisselect .= "<option selected='selected' value=\"".$data['id']."\">".$data['phasedevis']."</option>";
	
	}else{
		
		$phasedevisselect .= "<option value=\"".$data['id']."\">".$data['phasedevis']."</option>";
		
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

if ($addtype == "shared"){
	include("classmodule/insertheadershared.php"); 	
	
}else{
include("classmodule/insertheader.php"); 	

}
include("module/".$cat."/insert-baseform-".$cat.".php"); 
include("module/".$cat."/insert-ligne-".$cat.".php");

if ($addtype == "shared"){
	
	include("classmodule/insertfootershared.php"); 
	
}else{
include("classmodule/insertfooter.php"); 		

}

include("module/".$cat."/insert-".$cat."-js.php"); 

?>
