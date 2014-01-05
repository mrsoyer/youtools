<?php

include ("config.php");
include('class/pagination.php');
include('class/filtre.php');

$page = $_REQUEST['page'];
$cat = $_REQUEST['cat'];
$relatifa = $_REQUEST['relatifa'];
$idrelation = $_REQUEST['idrelation'];
$action = $_REQUEST['action'];
$useronline = $_REQUEST['useronline'];


$wintype = "popup";
$addtype = "shared";
$vpb = $_REQUEST['vpb'];

$vpbup = $vpb+1;

$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; 
$urlencode = urlencode($url);

if(isset($_REQUEST['url'])){
	
$lasturl = $_REQUEST['url'];
$lasturldecode = urldecode($lasturl);

}else{
	
	$lasturl = $urlencode ;
	$lasturldecode = $url;
}

setcookie("url", $urlencode, time()+31104000);
if($useronline == ""){
	
	$useronline = 0;
}

if($useronline > 0){
	
	$cachlogin = "style=\"display:none;\"";
}else{
	
	$cachlogin = "style=\"display:block;\"";
}
//bredcrumps genere










//fin genere bredcrups




	
	$sql = "SELECT *
FROM `historique` h
INNER JOIN typehistorique t ON h.typehistorique = t.id
WHERE 
h.assigne = $useronline
AND datecrea > DATE_SUB(CURRENT_TIMESTAMP(),INTERVAL 2 MINUTE)
ORDER BY datecrea DESC LIMIT 1";


$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	$shstat=0;
	while($data = mysql_fetch_assoc($req)) {
		
		if($data['typehistorique'] == "delete"){
			
			$messageaction = $data['relatifa']." : ".$data['comm']." à été ".$data['typehistorique'];
			
		}else{
		
					$sql2 = "SELECT *
							FROM `".$data['relatifa']."` 
							
							WHERE 
							id = ".$data['idrelation']."
							";
							
							$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
								$shstat=0;
								while($data2 = mysql_fetch_assoc($req2)) {
									
									$messageaction = $data['relatifa']." : ".$data2['nom']." à été ".$data['typehistorique'];
									
								}
					
			}
		
	}

	
	


//include ("header.php");

//dev

include "module-".$cat."/".$page."-".$cat.".php";

//findev

//include ("footer.php");

?>