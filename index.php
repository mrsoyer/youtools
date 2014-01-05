<?php
setcookie("useronline", 1, time()+31104000, "/");
include ("config/config.php");
include ("class/classaccueil.php");

$wintype = "index";
$addtype = "normal";

$page = $_REQUEST['page'];
$cat = $_REQUEST['cat'];
$relatifa = $_REQUEST['relatifa'];
$idrelation = $_REQUEST['idrelation'];
$action = $_REQUEST['action'];
$useronline = $_REQUEST['useronline'];

$vpb = 0;
$vpbup = 0;

$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; 
$urlencode = urlencode($url);
setcookie("url", $urlencode, time()+31104000);

$login = useronline($useronline);


$newbredcrumps = bredcrumps($page,$cat,$url,"bredcrumps");


$thehistorybredcrumps = thehistorybredcrumps($newbredcrumps);

if(isset($_REQUEST['page']) && isset($_REQUEST['cat'])){

	setcookie("bredcrumps", $newbredcrumps, time()+31104000, "/");

}else{
	
	header("location :".redirect($newbredcrumps));

}


$messageaction = messageaction($useronline);



include ("header.php");

include "module/".$cat."/".$page."-".$cat.".php";

include ("footer.php");

?>