<?php

//button=++Sauver++&nom-taches=&description-taches=&statut-taches=1&priorite-taches=1&assigne-taches=1&debuthr=01&debutmin=55&debutdate=&finhr=01&finmin=55&datefin=&page=insert&cat=taches&relatifa=affaire&idrelation=1&idtaches=new

$id = $_REQUEST['id'];
$nom = $_REQUEST['nom'];
$listtype = $_REQUEST['cat'];
$useronline = $_COOKIE["useronline"];

//



//constant











$sql = "DELETE FROM `crmtourisme`.`".$listtype."` WHERE `".$listtype."`.`id` = $id";
			
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());





	
	


$sql = "INSERT INTO `crmtourisme`.`historique` (`id`, `typehistorique`, `assigne`, `relatifa`, `idrelation`, `datecrea` , `comm`) VALUES (NULL, 3, '$useronline', '$listtype', '$id', CURRENT_TIMESTAMP, '$nom');";

//echo $sql;

$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

$urlretour = urldecode($urlcurrent);

header("Location: $urlretour");  

?>