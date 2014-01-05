<?php




$useronline = $_COOKIE["useronline"];

if($_REQUEST['submit'] == "Filtrer"){
	

$recherche =  json_decode(str_replace('\"','"',urldecode($_POST['recherche'])));

	
	$listtype = $_REQUEST['cat'];
	
	foreach($recherche as $key => $value){
		
		
					$value = (array) $value;
										
					
		//   ---- shclassic ----- ***** recherche classique ****
		if("shclassic" == $value['type']){
				
				setcookie("sh_".$value['nom']."_".$listtype, $_POST["sh_".$value['nom']."_".$listtype], time()+31104000, "/");


		}

		//   ---- shpopidnom ----- ***** recherche via popup ou recherche classique ****
		
		
		if("shpopidnom" == $value['type']){
			
				setcookie('sh_radio_'.$value['nom'].'_'.$listtype, $_POST['sh_radio_'.$value['nom'].'_'.$listtype], time()+31104000, "/");
				
				setcookie('sh_'.$value['nom'].'_'.$listtype, $_POST['sh_'.$value['nom'].'_'.$listtype], time()+31104000, "/");
			

		}
		
		//   ---- shdatedea ----- ***** recherche par date ****
		
		
		if("shdatedea" == $value['type']){
				setcookie('sh_'.$value['nom'].'_de_'.$listtype, $_POST['sh_'.$value['nom'].'_de_'.$listtype], time()+31104000, "/");
				setcookie('sh_radio_'.$value['nom'].'_'.$listtype, $_POST['sh_radio_'.$value['nom'].'_'.$listtype], time()+31104000, "/");
				setcookie('sh_'.$value['nom'].'_a_'.$listtype, $_POST['sh_'.$value['nom'].'_a_'.$listtype], time()+31104000, "/");
				
		}
		
		//   ---- shselectbox ----- ***** recherche par checkbox ****
		
		
		if("shselectbox" == $value['type']){
			
			  $sql = "SELECT * FROM `".$value['where'][1]."` ";
			  $req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
				while($data = mysql_fetch_assoc($req)) {
					
					
					if($_POST['sh_'.$value['nom'].''.$data['id'].'_'.$listtype] == "1"){
						
						setcookie('sh_'.$value['nom'].''.$data['id'].'_'.$listtype, "1", time()+31104000, "/");
						
			
			
					}else{
						
						setcookie('sh_'.$value['nom'].''.$data['id'].'_'.$listtype, "0", time()+31104000, "/");
						
					}
				}
			
			 
			
				
			
		
		}

	}
	
	




}else if($_REQUEST['submit'] == "Vider"){
	
	
$recherche =  json_decode(str_replace('\"','"',urldecode($_POST['recherche'])));

	
	$listtype = $_REQUEST['cat'];
	
	foreach($recherche as $key => $value){
		
		
					$value = (array) $value;
										
					
		//   ---- shclassic ----- ***** recherche classique ****
		if("shclassic" == $value['type']){
				
				setcookie("sh_".$value['nom']."_".$listtype, "", time()+31104000, "/");


		}

		//   ---- shpopidnom ----- ***** recherche via popup ou recherche classique ****
		
		
		if("shpopidnom" == $value['type']){
			
				setcookie('sh_radio_'.$value['nom'].'_'.$listtype, "", time()+31104000, "/");
				
				setcookie('sh_'.$value['nom'].'_'.$listtype, "", time()+31104000, "/");
			

		}
		
		//   ---- shdatedea ----- ***** recherche par date ****
		
		
		if("shdatedea" == $value['type']){
				setcookie('sh_'.$value['nom'].'_de_'.$listtype, "", time()+31104000, "/");
				setcookie('sh_radio_'.$value['nom'].'_'.$listtype, "", time()+31104000, "/");
				setcookie('sh_'.$value['nom'].'_a_'.$listtype, "", time()+31104000, "/");
				
		}
		
		//   ---- shselectbox ----- ***** recherche par checkbox ****
		
		
		if("shselectbox" == $value['type']){
			
			  $sql = "SELECT * FROM `".$value['where'][1]."` ";
			  $req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
				while($data = mysql_fetch_assoc($req)) {
					
					
					
						
						setcookie('sh_'.$value['nom'].''.$data['id'].'_'.$listtype, "0", time()+31104000, "/");
						
					
				}
			
			 
			
				
			
		
		}

	}
		
	
	
	
}else if($_REQUEST['submit'] == "Supprimer"){
	
	$listtype = $_REQUEST['cat'];
	
	$idac = $_REQUEST['id'.$listtype.'ac'];
	$p = 0;
	
	foreach ($idac as $key => $value){
		
		$explodevalue = explode("---",$value);
	
	
		$id = $explodevalue[0];
		$nom = $explodevalue[1];
		
		
		
		
		$sql = "DELETE FROM `crmtourisme`.`".$listtype."` WHERE `".$listtype."`.`id` = $id";
					
		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
		
		
		$sql = "INSERT INTO `crmtourisme`.`historique` (`id`, `typehistorique`, `assigne`, `relatifa`, `idrelation`, `datecrea` , `comm`) VALUES (NULL, 3, '$useronline', '".$listtype."', '$id', CURRENT_TIMESTAMP, '$nom');";
		
		
		
		//echo $sql;
		
		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
		$p++;
	}
	
	$sql = "INSERT INTO `crmtourisme`.`historique` (`id`, `typehistorique`, `assigne`, `relatifa`, `idrelation`, `datecrea` , `comm`) VALUES (NULL, 3, '$useronline', '".$listtype."', '', DATE_ADD(CURRENT_TIMESTAMP(),INTERVAL 1 MINUTE), '$p');";
		
		//echo $sql;
		
		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	
}
$urlretour = urldecode($urlcurrent);
//echo $urlretour;
	header("Location: $urlretour");






?>