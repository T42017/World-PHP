<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
</head>

<body>

    <h1><a href="city.php">Cities</a></h1>


<table>
<tr><th>Name</th><th>Country</th><th>Population</th></tr>
<?php

    
foreach($_GET as $key => $value)
    $Country = $key;
    
    
$db = new PDO('mysql:host=localhost;dbname=world;charset=utf8mb4', 'root', '');

if(isset($Country))
{
    $Country = str_replace('_', ' ', $Country);
    echo $Country;
    $stmt = $db->prepare('SELECT * FROM city WHERE CountryCode=:CountryCode ORDER BY population DESC');
    $stmt->bindParam(':CountryCode', $Country);
    $stmt->execute();
}
else
{
    $stmt = $db->query('SELECT * FROM city ORDER BY population DESC');
}
        
    
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    
    echo '<tr>';
    echo '<td>'.$row['Name'].'</td>';
	echo "<td><a href='?{$row['CountryCode']}'>{$row['CountryCode']}</a></td>"; 
	echo '<td>'.$row['Population'].'</td>'; 
	echo '</tr>';
 }
    

?>

</table>

</body>
</html>