<?php

include "config/config.php";

$page = $_REQUEST['page'];
$cat = $_REQUEST['cat'];

$action = $_REQUEST['action'];
$useronline = $_REQUEST['useronline'];
$wintype = "popup";
$vpb = $_REQUEST['vpb'];

$vpbup = $vpb+1;

if($_COOKIE["bredcrumpspopup".$vpb] != ""){
		$newbredcrumps = explode(";;;",$_COOKIE["bredcrumpspopup".$vpb]);
		
		
		$or = 0;
		foreach ($newbredcrumps as $key2 => $value2){
			
			
			$thetacheorder = explode("---",$value2);
			
			$bredcrumps[$or]= $thetacheorder[1];
			
			//echo "<a href=\"".$thetacheorder[1]."\" >".$thetacheorder[0]."</a> > ";
			
			$or++;
		}
		
}
$urlcurrent = $bredcrumps[0];
$urlprev = $bredcrumps[1];



include "class/".$page.".php";





?>