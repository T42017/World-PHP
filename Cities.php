<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
</head>

<body>

<h1>City</h1>


<table>
<tr><th>Namn</th><th>Land</th><th>Population</th></tr>
<?php


$db = new PDO('mysql:host=localhost;dbname=world;charset=utf8mb4', 'root', '');

if(isset($_GET['CountryCode']))
{
	$CountryCode = $_GET['CountryCode'];
	$stmt = $db->prepare('SELECT * FROM city WHERE CountryCode=:CountryCode ORDER BY population DESC');
	$stmt->bindParam(':CountryCode', $CountryCode);
	$stmt->execute();
}
else
{
	$stmt = $db->query('SELECT * FROM City ORDER BY Population DESC');
}


while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
	echo '<tr>';
    echo '<td>'.$row['Name'].'</td>';
	echo "<td><a href='?CountryCode={$row['CountryCode']}'>{$row['CountryCode']}</a></td>"; 
	echo '<td>'.$row['Population'].'</td>'; 
	echo '</tr>';
}

?>

</table>


</body>
</html>