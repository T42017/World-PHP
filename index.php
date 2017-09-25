<!DOCTPE html>
<html>
    <head>
    <meta charset="UTF-8">
    </head>
    
    <body>
        <h1>test </h1>
            
<table>
<tr><th>Landets namn</th><th>Kod</th><th>Befolkning</th>
<?php

$db = new PDO('mysql:host=localhost;dbname=world;charset=utf8mb4', 'root', '');
$stmt = $db->query('SELECT * FROM country');

while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
	echo '<tr>';
    echo "<td>{$row['Name']}</td>";
    echo '<td>'.$row['Code'].'</td>';
	echo '<td>'.$row['Population'].'</td>'; 
	echo '</tr>';
}

?>

</table>
       <a href="Cities.php">
           Städer
        </a> 
        
        <a href="Countrylanguage.php">
            Språk
        </a>
    </body>
</html>