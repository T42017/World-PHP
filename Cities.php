<!DOCTPE html>
<html>
    <head>
    <meta charset="UTF-8">
    </head>
      
    <table>
<tr><th>City name</th><th>Country code</th><th>Population</th>
<?php
   $db = new PDO('mysql:host=localhost;dbname=world;charset=utf8mb4', 'root', ''); 
$stmt = $db->query('SELECT * FROM City');

while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
	echo '<tr>';
    echo "<td>{$row['Name']}</td>";
    echo '<td>'.$row['CountryCode'].'</td>';
	echo '<td>'.$row['Population'].'</td>'; 
	echo '</tr>';
}
    ?>
    </table>