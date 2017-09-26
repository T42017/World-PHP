<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Topp språk</title>
</head>

<body>

<h1>Topp språk</h1>

<table>
<tr><th>Topp språk</th></tr>

<?php
    $db = new PDO('mysql:host=localhost;dbname=world;charset=utf8mb4', 'root', '');

    $stmt = $db->query('SELECT Language FROM countrylanguage INNER JOIN country ON countrylanguage.CountryCode = country.Code GROUP BY Language ORDER BY Population DESC LIMIT 20');
    
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        echo "<td>{$row['Language']}</td>";
        echo '</tr>';
    }
?>

</table>

</body>

</html>