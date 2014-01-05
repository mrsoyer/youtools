<?php


$listtype = $_REQUEST['cat'];

$ajoutorder= $_REQUEST['ajout'.$listtype.'order'];
$ajoutorder = explode("-",$ajoutorder);

$order = $_REQUEST[$listtype.'order'];
$order = explode(";",$order);

$neworder= $ajoutorder[0]."-".$ajoutorder[1];

$i = 0;
foreach($order as $key => $value){
	$theorder = explode("-",$value);
	
	if($i < 5){
		if($theorder[0]!=""){
			if($theorder[0]!=$ajoutorder[0]){
				
				$neworder .= ";".$theorder[0]."-".$theorder[1];
				
				$i++;
				
			}
		}
		
	}
	
	
	
	
}

setcookie($listtype.'order', $neworder, time()+31104000, "/");

$urlretour = urldecode($urlcurrent);
	header("Location: $urlretour");






?>