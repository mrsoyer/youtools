<?php

include "config.php";

$page = $_REQUEST['page'];
$cat = $_REQUEST['cat'];
$relatifa = $_REQUEST['relatifa'];
$idrelation = $_REQUEST['idrelation'];
$action = $_REQUEST['action'];
$useronline = $_REQUEST['useronline'];

include "module-".$cat."/".$page."-".$cat.".php";



?>