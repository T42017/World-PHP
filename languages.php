<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
</head>

<body>

    <h1><a href="languages.php">Languages</a></h1>


<table>
<tr><th>Language</th><th>Country</th></tr>
<?php

    
foreach($_GET as $key => $value)
    $continent = $key;
    
    
$db = new PDO('mysql:host=localhost;dbname=world;charset=utf8mb4', 'root', '');

if(isset($continent))
{
    $continent = str_replace('_', ' ', $continent);
    echo $continent;
    $stmt = $db->prepare('SELECT * FROM countrylanguage WHERE CountryCode=:CountryCode');
    $stmt->bindParam(':CountryCode', $continent);
    $stmt->execute();
}
else
{
    $stmt = $db->query('SELECT * FROM countrylanguage GROUP BY Language');
}
        
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo '<tr>';
    echo '<td>'.$row['Language'].'</td>';
	echo "<td><a href='?{$row['CountryCode']}'>{$row['CountryCode']}</a></td>"; 
	echo '</tr>';
 }
    

?>

</table>

</body>
</html>