<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
</head>

<body>

<h1>Cities</h1>


<table>
<tr><th>City</th><th>Country</th><th>Population</th></tr>
<?php


$db = new PDO('mysql:host=localhost;dbname=world;charset=utf8mb4', 'root', '');


$stmt = $db->query('SELECT city.Name, country.Name, city.Population 
FROM city 
LEFT JOIN country ON city.CountryCode = country.Code
ORDER BY city.Population DESC');


while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
	echo '<tr>';
    echo '<td>'.$row['Name'].'</td>';
	echo '<td>'.$row['Population'].'</td>';
	echo '</tr>';
}

?>

</table>


</body>
</html>