<?php
$file = fopen("../../private/credentials.txt", "r") or die("Unable to find credentials!");
if ($file)
{
	$username = fgets($file);
	$password = fgets($file);
    $db = new PDO('mysql:host=localhost;dbname=world;charset=utf8', $username, $password) or die("Could not connect to database.");
	fclose($file);
}
?>