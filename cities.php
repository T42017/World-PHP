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




if(isset($_GET['code']))
{
	$code = $_GET['code'];
	
	$stmt = $db->prepare('SELECT country.Name AS CountryName, city.Name AS CityName, city.Population, city.CountryCode
FROM city
JOIN country ON city.CountryCode = country.Code
WHERE `CountryCode` =:code
ORDER BY city.Population DESC;');
	
	$stmt->bindParam(':code', $code);
	$stmt->execute();
}
else
{
	$stmt = $db->query('SELECT country.Name AS CountryName, city.Name AS CityName , city.Population, city.CountryCode
FROM city 
LEFT JOIN country ON city.CountryCode = country.Code
ORDER BY city.Population DESC');
}


while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
	echo '<tr>';
    echo '<td>'.$row['CityName'].'</td>';   
    echo "<td><a href='?code={$row['CountryCode']}'>{$row['CountryName']}</a></td>"; 
    echo '<td>'.$row['Population'].'</td>';
	echo '</tr>';
}




?>

</table>


</body>
</html>