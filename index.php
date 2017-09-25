<?php
	if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$uri = 'https://';
	} else {
		$uri = 'http://';
	}
	$uri .= $_SERVER['HTTP_HOST'];
	echo "<h1><b>Index</b></h1>"; 
    echo "<a href='länder.php'> Länder </a>";
    echo " <br><br> <a href='städer.php'> Städer </a>";
    echo " <br><br> <a href='språk.php'> Språk </a>";
	exit;
?>
Something is wrong with the XAMPP installation :-(
