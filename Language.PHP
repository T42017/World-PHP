<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
</head>

<body>

<h1>CountryLanguage</h1>


<table>
<tr><th>Namn</th><th></th><th></th><th>Countries</th></tr>
<?php


$db = new PDO('mysql:host=localhost;dbname=world;charset=utf8mb4', 'root', '');

if(isset($_GET['CountryCode']))
{
	$CountryCode = $_GET['CountryCode'];
	$stmt = $db->prepare('SELECT * FROM countrylanguage WHERE CountryCode=:CountryCode GROUP BY Language');
	$stmt->bindParam(':CountryCode', $CountryCode);
	$stmt->execute();
}
else
{
	$stmt = $db->query('SELECT * FROM countrylanguage GROUP BY Language DESC');
}


while($row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
	echo '<tr>';
    echo '<td>'.$row['Language'].'</td>';
    echo '</tr>';
}

?>

</table>


</body>
</html>