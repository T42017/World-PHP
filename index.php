<?php
	if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$uri = 'https://';
	} else {
		$uri = 'http://';
	}
	$uri .= $_SERVER['HTTP_HOST'];
	echo "<h1><b>Index</b></h1>"; 
    echo "<a href='countries.php'> Countries </a>";
    echo " <br><br> <a href='cities.php'> Cities </a>";
    echo " <br><br> <a href='languages.php'> Languages </a>";
	exit;
?>
Something is wrong with the XAMPP installation :-(
