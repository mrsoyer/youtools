<?php

include "config/config.php";

$page = $_REQUEST['page'];
$cat = $_REQUEST['cat'];
$wintype = "index";

$action = $_REQUEST['action'];
$useronline = $_REQUEST['useronline'];

if($_COOKIE["bredcrumps"] != ""){
		$newbredcrumps = explode(";;;",$_COOKIE["bredcrumps"]);
		
		
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



include "module/".$cat."/".$page."-".$cat.".php";


//include "class/".$page.".php";




?>