<?php
	
	$DBhost = "localhost";
	$DBuser = "root";
	$DBpass = "";
	$DBname = "progress_bisnis";
	
	$koneksi = mysqli_connect($DBhost, $DBuser, $DBpass, $DBname);

	// Check connection
	if($koneksi === false){
	    die("ERROR: Could not connect. " . mysqli_connect_error());
    	exit();
	}