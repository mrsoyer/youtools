<?php
	$db = mysql_connect('localhost:8888', 'root', 'root');                                   
   	mysql_select_db('crmtourisme',$db);
	mysql_query("SET NAMES UTF8"); 
	$chemin = "http://localhost:8888/youtools/";
	$theme = "origine";
?>