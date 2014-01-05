<?php

function useronline($useronline){
	
	if($useronline == ""){
	
	$useronline = 0;
	}
	
	if($useronline > 0){
		
		return "log";
	}else{
		
		return  "notlog";
	}
	
	
}

function bredcrumps($page,$cat,$url,$winbred){
	
	
	$ajoutbredcrumps[0]= $page."_".$cat;
	$ajoutbredcrumps[1] = $url;
	
	$bredcrumps = $_REQUEST[$winbred];
	$bredcrumps = explode(";;;",$bredcrumps);
	
	$newbredcrumps= $ajoutbredcrumps[0]."---".$ajoutbredcrumps[1];
	
	$i = 0;
	foreach($bredcrumps as $key => $value){
		$thebredcrumps = explode("---",$value);
		$bredcrumps[$i]= $thebredcrumps[1];
		
		
		
			if($thebredcrumps[0]!=""){
				if($thebredcrumps[0]!=$ajoutbredcrumps[0]){
					
					$newbredcrumps .= ";;;".$thebredcrumps[0]."---".$thebredcrumps[1];
					
					$i++;
					
				}
			}
			
		
		
		
		
		
	}	
return $newbredcrumps;
}

function redirect($bredcrumps){
	
	$poscat = strpos($bredcrumps[0], "cat=");
	$pospage = strpos($bredcrumps[0], "page=");
	
	// Notez notre utilisation de ===.  == ne fonctionnerait pas comme attendu
	// car la position de 'a' est la 0-ième (premier) caractère.
	if ($poscat === false && $poscat === false) {
		
		
		return $chemin."index.php/?cat=accueil&page=accueil";
	} else {
		return $bredcrumps[0];
	}
		
}

function messageaction($useronline){
	
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
			
			return $data['relatifa']." : ".$data['comm']." à été ".$data['typehistorique'];
			
		}else{
		
					$sql2 = "SELECT *
							FROM `".$data['relatifa']."` 
							
							WHERE 
							id = ".$data['idrelation']."
							";
							
							$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());
								$shstat=0;
								while($data2 = mysql_fetch_assoc($req2)) {
									
									return $data['relatifa']." : ".$data2['nom']." à été ".$data['typehistorique'];
									
								}
					
			}
		
	}

	
	
}

function thehistorybredcrumps($newbredcrumps){
	
	if($newbredcrumps != ""){
	$thehistorybredcrumps = array();
	$newbredcrumps = explode(";;;",$newbredcrumps);
									
									
				$or = 0;
				foreach ($newbredcrumps as $key2 => $value2){
					
					
					$thetacheorder = explode("---",$value2);
					
					$thehistorybredcrumps[$key2]['page'] = $thetacheorder[0];
					$thehistorybredcrumps[$key2]['url'] = $thetacheorder[1];
					
					
					
					$or++;
				}
				
		}
		
	return $thehistorybredcrumps;
	
}

?>