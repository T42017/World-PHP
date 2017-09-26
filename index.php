<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
</head>

<body>

<h1>Index </h1>


<table>
<tr><th><a href="https://localhost/world/country.php">Länder</a></th>
    <th><a href="https://localhost/world/cities.php">städer</a></th>
    <th><a href="https://localhost/world/languages.php">språk</a></th>
    </tr>
    
<?php

$db = new PDO('mysql:host=localhost;dbname=world;charset=utf8mb4', 'root', '');
$stmt = $db->query('SELECT * FROM users');

?>

</table>


</body>
</html>