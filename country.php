<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
</head>

<body>

    <h1><a href="country.php">Countries</a></h1>


<table>
<tr><th>Name</th><th>Continent</th><th>Population</th></tr>
<?php

    
foreach($_GET as $key => $value)
    $continent = $key;
    
    
$db = new PDO('mysql:host=localhost;dbname=world;charset=utf8mb4', 'root', '');

if(isset($continent))
{
    $continent = str_replace('_', ' ', $continent);
    echo $continent;
    $stmt = $db->prepare('SELECT * FROM country WHERE Continent=:Continent ORDER BY population DESC');
    $stmt->bindParam(':Continent', $continent);
    $stmt->execute();
}
else
{
    $stmt = $db->query('SELECT * FROM country ORDER BY population DESC');
}
        
    
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    
    echo '<tr>';
    echo '<td>'.$row['Name'].'</td>';
	echo "<td><a href='?{$row['Continent']}'>{$row['Continent']}</a></td>"; 
	echo '<td>'.$row['Population'].'</td>'; 
	echo '</tr>';
 }
    

?>

</table>

</body>
</html>