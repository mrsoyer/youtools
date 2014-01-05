<?php

function where($listtype, $listfiltre) {
	
	$where = "";

	$shstatactif=0;
	
	foreach($listfiltre as $key => $value){
		
		
					
					
					
		//   ---- shclassic ----- ***** recherche classique ****
		if("shclassic" == $value['type']){
			
				if($_REQUEST['sh_'.$value['nom'].'_'.$listtype] != "" && isset($_REQUEST['sh_'.$value['nom'].'_'.$listtype])){
					
					if($shstatactif==0){
						
						$where .= " WHERE ";
					}else{
						
						$where .= " AND ";
					}
								
					
				  
					$where .= " ".$value['where'][0]." LIKE '".$_REQUEST['sh_'.$value['nom'].'_'.$listtype]."'";
							
							
						
					
					$shstatactif++;	
				}

		}
		
		
		
		
		
		//   ---- shpopidnom ----- ***** recherche via popup ou recherche classique ****
		
		
		if("shpopidnom" == $value['type']){
			
				if(isset($_REQUEST['sh_url_'.$value['nom'].'_'.$listtype])){
	
					if($shstatactif==0){
							
							$where .= " WHERE ";
						}else{
							
							$where .= " AND ";
						}
						
						
					  
							$where .= " ".$value['where'][0]." LIKE '".$_REQUEST['sh_url_'.$value['nom'].'_'.$listtype]."'";
						
						
							
						
					$shstatactif++;
				}else{
			
					if($_REQUEST['sh_'.$value['nom'].'_'.$listtype] != "" && isset($_REQUEST['sh_'.$value['nom'].'_'.$listtype])){
				
						if($shstatactif==0){
							
							$where .= " WHERE ";
						}else{
							
							$where .= " AND ";
						}					
						if($_REQUEST['sh_radio_'.$value['nom'].'_'.$listtype] == "id"){
					  
							$where .= " ".$value['where'][0]." LIKE '".$_REQUEST['sh_'.$value['nom'].'_'.$listtype]."'";
						
						}else{
								
							$where .= " ".$value['where'][1]." LIKE '".$_REQUEST['sh_'.$value['nom'].'_'.$listtype]."'";
							
						}
							
						
					$shstatactif++;	
					}
				}
		
		}
		
		//   ---- shdatedea ----- ***** recherche par date ****
		
		
		if("shdatedea" == $value['type']){
			
			if($_REQUEST['sh_'.$value['nom'].'_de_'.$listtype] != "" && isset($_REQUEST['sh_'.$value['nom'].'_de_'.$listtype])){
	
					if($shstatactif==0){
						
						$where .= " WHERE ";
					}else{
						
						$where .= " AND ";
					}
					
					$debut =  explode("/", $_REQUEST['sh_'.$value['nom'].'_de_'.$listtype]);
					$fin =  explode("/", $_REQUEST['sh_'.$value['nom'].'_a_'.$listtype]);
					
					if($_REQUEST['sh_radio_'.$value['nom'].'_'.$listtype] == "jour"){
				  
						
						
						
						//$datesql = "debut =  MONTH('".$debut[2]."-".$debut[1]."-".$debut['0']."') ";
						$where .= " YEAR(".$value['where'][0].")=YEAR('".$debut[2]."-".$debut[1]."-".$debut[0]." 00:00:00') AND MONTH(".$value['where'][0].")=MONTH('".$debut[2]."-".$debut[1]."-".$debut[0]." 00:00:00') AND DAY(".$value['where'][0].")=DAY('".$debut[2]."-".$debut[1]."-".$debut[0]." 00:00:00') ";
					
					}else if($_REQUEST['sh_radio_'.$value['nom'].'_'.$listtype] == "mois"){
							
						$where .= " YEAR(".$value['where'][0].")=YEAR('".$debut[2]."-".$debut[1]."-".$debut[0]." 00:00:00') AND MONTH(".$value['where'][0].")=MONTH('".$debut[2]."-".$debut[1]."-".$debut[0]." 00:00:00') ";
						
					}else if($_REQUEST['sh_radio_'.$value['nom'].'_'.$listtype] == "a"){
							
						$where .= " ".$value['where'][0]." >= '".$debut[2]."-".$debut[1]."-".$debut[0]." 00:00:00' AND  ".$value['where'][0]." <= '".$fin[2]."-".$fin[1]."-".$fin[0]." 23:59:59' ";
						
					}
						
					
				$shstatactif++;	
				}
			
				
			
		
		}
		
		//   ---- shselectbox ----- ***** recherche par checkbox ****
		
		
		if("shselectbox" == $value['type']){
			
			
			$sql = "SELECT * FROM `".$value['where'][1]."` ";
			  $req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
				$shstat=0;
				while($data = mysql_fetch_assoc($req)) {
					
					
					if($_COOKIE['sh_'.$value['nom'].''.$data['id'].'_'.$listtype] == "1"){
						if($shstat == 0){
							if($shstatactif==0){
					
								$where .= " WHERE ";
							}else{
								
								$where .= " AND ";
							}
						$where .= " ( ".$value['where'][0]." = ".$data['id'];
						
						}else{
							
							$where .= " OR ".$value['where'][0]." = ".$data['id'];
						}
						
						$shstat++;
						$shstatactif++;
			
					}
					
				}
			if($shstat > 0){
						
						$where .= ")";
			}
				
			
		
		}

	}
	
	
	
    return ($where);
}

function filtre($listtype, $listfiltre,$vpbup) {
	
	$filtre = "";

	
	
	foreach($listfiltre as $key => $value){
		
		
					
					
					
		//   ---- shclassic ----- ***** recherche classique ****
		if("shclassic" == $value['type']){
			
				$filtre .= "
				
				 <td class=\"lvtColData\">
                                      
                 <input type=\"text\" name=\"sh_".$value['nom']."_".$listtype."\" id=\"sh_".$value['nom']."_".$listtype."\" value=\"".$_REQUEST['sh_'.$value['nom'].'_'.$listtype]."\" >
                                      
                </td>
				";
			
				

		}
		
		
		
		
		
		//   ---- shpopidnom ----- ***** recherche via popup ou recherche classique ****
		
		
		if("shpopidnom" == $value['type']){
			
				if(isset($_REQUEST['sh_url_'.$value['nom'].'_'.$listtype])){
					$filtre .= "<td class=\"lvtColData\"></td>";
					
				}else{
					
						$filtre .= "<td class=\"lvtColData\">";
						 
						 if($_REQUEST['sh_radio_'.$value['nom'].'_'.$listtype] == "nom"){
  
							$filtre .= "<input  name=\"sh_radio_".$value['nom']."_".$listtype."\" type=\"radio\" value=\"id\" id=\"sh_radio_".$value['nom']."_".$listtype."_id\">id <input checked=\"checked\" name=\"sh_radio_".$value['nom']."_".$listtype."\" type=\"radio\" value=\"nom\" id=\"sh_radio_".$value['nom']."_".$listtype."_nom\">nom<br/><br/>";
						
						}else{
							
							$filtre .= "<input checked=\"checked\" name=\"sh_radio_".$value['nom']."_".$listtype."\" type=\"radio\" value=\"id\" id=\"sh_radio_".$value['nom']."_".$listtype."_id\">id <input name=\"sh_radio_".$value['nom']."_".$listtype."\" type=\"radio\" value=\"nom\" id=\"sh_radio_".$value['nom']."_".$listtype."_nom\">nom<br/><br/>";
								
							
							
						}
						
						$filtre .= "
						<script>
						function valideopenerform_".$value['nom']."_".$listtype."(){ var popy= window.open('popup.php?page=list&cat=".$value['nom']."&vpb=".$vpbup."&js=list-".$value['nom']."-valideopenerform_".$value['nom']."_".$listtype."','popup_form".$vpbup."','menubar=no,status=no,top=50%,left=50%,height=700,width=900,scrollbars=1') } 
						</script>
						
						<input type=\"text\" name=\"sh_".$value['nom']."_".$listtype."\" id=\"sh_".$value['nom']."_".$listtype."\" value=\"".$_REQUEST['sh_'.$value['nom'].'_'.$listtype]."\" >
                         <a><img border=\"0\" src=\"themes/softed/images/btnL3Search.gif\" alt=\"Rechercher dans ".$value['nom']."...\" title=\"Rechercher dans ".$value['nom']."...\" id=\"popupsh_".$value['nom']."_".$listtype."\" onclick='valideopenerform_".$value['nom']."_".$listtype."()'></a>
						 </td>"; 
					
				}
			
				
			
				
		
		}
		
		//   ---- shdatedea ----- ***** recherche par date ****
		
		
		if("shdatedea" == $value['type']){
			
			 			$filtre .= "<td class=\"lvtColData\">
                         De : <input type=\"text\" name=\"sh_".$value['nom']."_de_".$listtype."\" id=\"sh_".$value['nom']."_de_".$listtype."\" value=\"".$_REQUEST['sh_'.$value['nom'].'_de_'.$listtype]."\" >
							<br/><br/>";
                            
                             
						 
						 if($_REQUEST['sh_radio_'.$value['nom'].'_'.$listtype] == "jour"){
  
							$filtre .= " <input checked=\"checked\" name=\"sh_radio_".$value['nom']."_".$listtype."\" type=\"radio\" value=\"jour\">jour <input name=\"sh_radio_".$value['nom']."_".$listtype."\" type=\"radio\" value=\"mois\">mois<input name=\"sh_radio_".$value['nom']."_".$listtype."\" type=\"radio\" value=\"a\">à
                         ";
						
						}else if($_REQUEST['sh_radio_'.$value['nom'].'_'.$listtype] == "mois"){
								
							$filtre .= " <input name=\"sh_radio_".$value['nom']."_".$listtype."\" type=\"radio\" value=\"jour\">jour <input checked=\"checked\" name=\"sh_radio_".$value['nom']."_".$listtype."\" type=\"radio\" value=\"mois\">mois<input name=\"sh_radio_".$value['nom']."_".$listtype."\" type=\"radio\" value=\"a\">à
                         ";
							
						}else if($_REQUEST['sh_radio_'.$value['nom'].'_'.$listtype] == "a"){
								
							$filtre .= " <input name=\"sh_radio_".$value['nom']."_".$listtype."\" type=\"radio\" value=\"jour\">jour <input name=\"sh_radio_".$value['nom']."_".$listtype."\" type=\"radio\" value=\"mois\">mois<input checked=\"checked\" name=\"sh_radio_".$value['nom']."_".$listtype."\" type=\"radio\" value=\"a\">à
                         ";
							
						}else{
							
							$filtre .= " <input name=\"sh_radio_".$value['nom']."_".$listtype."\" type=\"radio\" value=\"jour\">jour <input checked=\"checked\" name=\"sh_radio_".$value['nom']."_".$listtype."\" type=\"radio\" value=\"mois\">mois<input name=\"sh_radio_".$value['nom']."_".$listtype."\" type=\"radio\" value=\"a\">à";
							
						}
						 	
                        
                         
                         
                        $filtre .= " <br/><br/>
                         à :<input type=\"text\" name=\"sh_".$value['nom']."_a_".$listtype."\" id=\"sh_".$value['nom']."_a_".$listtype."\" value=\"".$_REQUEST['sh_'.$value['nom'].'_a_'.$listtype]."\" >
                         </td>";
						 
						 $filtre .="
						 
						 <script>
						 $(function() {
							$( '#sh_".$value['nom']."_de_".$listtype."' ).datepicker({ dateFormat:'dd/mm/yy'});
							});
							$(function() {
							$( '#sh_".$value['nom']."_a_".$listtype."' ).datepicker({ dateFormat:'dd/mm/yy'});
							});
						 </script>
						 
						 ";
			
			
			
				
			
		
		}
		
		//   ---- shselectbox ----- ***** recherche par checkbox ****
		
		
		if("shselectbox" == $value['type']){
			
			  $filtre .= "<td class=\"lvtColData\">";
                         

$sql = "SELECT * FROM `".$value['where'][1]."` ";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($data = mysql_fetch_assoc($req)) {
		
		if($_COOKIE['sh_'.$value['nom'].''.$data['id'].'_'.$listtype] == "1"){
		$filtre .= "<input checked=\"checked\" type=\"checkbox\" name=\"sh_".$value['nom']."".$data['id'].'_'.$listtype."\"  value=\"1\" > ".$data[$value['nom']]." </br>";
		
		}else{
		$filtre .= "<input type=\"checkbox\" name=\"sh_".$value['nom']."".$data['id'].'_'.$listtype."\"  value=\"1\" > ".$data[$value['where'][2]]." </br>";	
		}
	}


                         
                        
                       $filtre .=  "</td>";
			
				
			
		
		}

	}
	
	 $filtre .=  "<td class=\"lvtColData\"><input type=\"submit\" value=\"Filtrer\"  class=\"crmbutton small create\" name=\"submit\"></br><input type=\"submit\" value=\"Vider\"  class=\"crmbutton small create\" name=\"submit\">
</td>";
	
    return ($filtre);
}

function ordre($listtype, $listfiltre) {
	
	$order = $_REQUEST[$listtype.'order'];

	if($order != ""){
			$order = explode(";",$order);
			
			$ordre = "";
			$or = 0;
			foreach ($order as $key2 => $value2){
				
				$ordre .= $value2." > ";
				
			}
			
	}else{
	
		$ordre = " ";
	}

	
	
	
	
    return ($ordre);
}

function order($listtype, $listfiltre) {
	
	$order = $_REQUEST[$listtype.'order'];

	if($order != ""){
			$order = explode(";",$order);
			
			
			$or = 0;
			foreach ($order as $key2 => $value2){
				$theorder = explode("-",$value2);
				if($or== 0){
				
					$orderby= " ORDER BY ";
				}else{
					
					$orderby .= " , ";
				}
				
				foreach($listfiltre as $key => $value){
					
					if($theorder[0]==$value['nom']){
					
						$orderby .= " ".$value['orderby']." ".$theorder[1];
						$or++;
						
					}
				}
				
			}
			
	}else{
	
		$orderby = " ";
	}

	
	
	
	
    return ($orderby);
}

function lefiltre($listtype, $listfiltre,$chemin,$wintype,$vpb) {
	
			$order = $_REQUEST[$listtype.'order'];

	
			$order = explode(";",$order);
			
			
			
			foreach ($order as $key2 => $value2){
				$theorder[$key2] = explode("-",$value2);
				
				
				
				
			}
			
			
			foreach($listfiltre as $key => $value){
					$statpos = 0;
					foreach ($theorder as $key2 => $value2){
				
						if($value['nom']== $value2[0]){
							if($value2[1]=="ASC"){
								
								$filtre .= "<td class=\"lvtCol\"><a href=\"".$chemin."traitement".$wintype.".php?cat=".$listtype."&page=list-order&ajout".$listtype."order=".$value['nom']."-DESC&vpb=".$vpb."\" >".$value['nom']."<img border=\"0\" src=\"themes/images/arrow_down.gif\"></a></td>";
								$statpos = 1;
								
							}else{
								
								$filtre .= "<td class=\"lvtCol\"><a href=\"".$chemin."traitement".$wintype.".php?cat=".$listtype."&page=list-order&ajout".$listtype."order=".$value['nom']."-ASC&vpb=".$vpb."\" >".$value['nom']."<img border=\"0\" src=\"themes/images/arrow_up.gif\"></a></td>";
								
								
								$statpos = 1;
							}
							
							
						}
								
				
				
					}
					
					if($statpos == 0){
						$filtre .= "<td class=\"lvtCol\"><a href=\"".$chemin."traitement".$wintype.".php?cat=".$listtype."&page=list-order&ajout".$listtype."order=".$value['nom']."-ASC&vpb=".$vpb."\" >".$value['nom']."</a></td>";
						
					}
				}

	
	
	
	
    return ($filtre);
}





?>