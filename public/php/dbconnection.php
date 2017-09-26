<?php
	/*
	$file = fopen("credentials.txt", "r") or die("Unable to find credentials!");
	$username = fgets($file);
	$password = fgets($file);
	fclose($file);

    $db = new PDO('mysql:host=localhost;dbname=world;charset=utf8', $username, $password);
    */

    $db = new PDO('mysql:host=localhost;dbname=world;charset=utf8', 'root', '');
?>