<!DOCTPE html>
<html>
    <head>
    <meta charset="UTF-8">
    </head>
       
    <table>

<tr><th>CountryCode</th><th>Language</th><th>Percentage</th>
<?php

$db = new PDO('mysql:host=localhost;dbname=world;charset=utf8mb4', 'root', ''); 
$stmt = $db->query('SELECT * FROM countrylanguage');

while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
	echo '<tr>';
    echo "<td>{$row['CountryCode']}</td>";
    echo '<td>'.$row['Language'].'</td>';
    echo '<td>'.$row['Percentage'].'</td>';
	echo '</tr>';
}
    ?>
    </table>
    