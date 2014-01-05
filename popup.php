<?php

include ("config/config.php");
include ("class/classaccueil.php");

$wintype = "popup";
$addtype = "normal";

$page = $_REQUEST['page'];
$cat = $_REQUEST['cat'];
$relatifa = $_REQUEST['relatifa'];
$idrelation = $_REQUEST['idrelation'];
$action = $_REQUEST['action'];
$useronline = $_REQUEST['useronline'];

$vpb = $_REQUEST['vpb'];
$vpbup = $vpb+1;



$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; 
$urlencode = urlencode($url);


setcookie("url", $urlencode, time()+31104000);
$login = useronline($useronline);

$newbredcrumps = bredcrumps($page,$cat,$url,'bredcrumpspopup'.$vpb);
$thehistorybredcrumps = thehistorybredcrumps($newbredcrumps);

if(isset($_REQUEST['page']) && isset($_REQUEST['cat'])){

	setcookie("bredcrumpspopup".$vpb, $newbredcrumps, time()+31104000, "/");

}else{
	
	header("location :".redirect($newbredcrumps));

}


include ("header.php");

include "module/".$cat."/".$page."-".$cat.".php";

include ("footer.php");

?>