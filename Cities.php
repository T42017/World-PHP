<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
</head>

<body>

<h1>City</h1>


<table>
<tr><th>City</th><th>Country</th><th>Population</th></tr>
<?php


$db = new PDO('mysql:host=localhost;dbname=world;charset=utf8mb4', 'root', '');

if(isset($_GET['countryCode']))
{
	$countryCode = $_GET['countryCode'];
	$stmt = $db->prepare('SELECT * FROM city WHERE CountryCode=:countryCode ORDER BY population DESC');
	$stmt->bindParam(':countryCode', $countryCode);
	$stmt->execute();
}
else
{
	$stmt = $db->query('SELECT * FROM city ORDER BY population DESC');
}


while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
	echo '<tr>';
    echo '<td>'.$row['Name'].'</td>';
	echo "<td><a href='?country={$row['CountryCode']}'>{$row['CountryCode']}</a></td>"; 
	echo '<td>'.$row['Population'].'</td>'; 
	echo '</tr>';
}

?>

</table>


</body>
</html>