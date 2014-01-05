<?php

include ("config/config.php");
include ("class/classaccueil.php");

$page = $_REQUEST['page'];
$cat = $_REQUEST['cat'];
$relatifa = $_REQUEST['relatifa'];
$idrelation = $_REQUEST['idrelation'];
$action = $_REQUEST['action'];
$useronline = $_REQUEST['useronline'];


$wintype = "index";
$addtype = "shared";
$vpb = 0;

$vpbup = 0;


$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; 
$urlencode = urlencode($url);
setcookie("url", $urlencode, time()+31104000);

$login = useronline($useronline);


$newbredcrumps = bredcrumps($page,$cat,$url,"bredcrumps");


$thehistorybredcrumps = thehistorybredcrumps($newbredcrumps);



include "module/".$cat."/".$page."-".$cat.".php";



?>