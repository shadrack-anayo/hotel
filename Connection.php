<?php

//Connection constants
    $hostname = "localhost";
	$hostuser = "root";
	$hostpass = "";
	$dbname = "travelers";
	
	//create the connection
	$rug = new mysqli($hostname, $hostuser, $hostpass, $dbname);
	
	//check connection
	if($rug->connect_error){
		die("Connection failed" . $rug->error);
	}else{
        //print "Connection Successful";
    }		
?>