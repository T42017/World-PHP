<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Städer</title>
</head>

<body>

<h1>Städer</h1>

<table>
<tr><th>Namn</th><th>Landsnamn</th><th>Population</th></tr>

<?php
    $db = new PDO('mysql:host=localhost;dbname=world;charset=utf8mb4', 'root', '');

    if(isset($_GET['code'])) {
        $code = $_GET['code'];
        $stmt = $db->prepare('SELECT * FROM city WHERE CountryCode=:code ORDER BY population DESC');
        $stmt->bindParam(':code', $code);
        $stmt->execute();
    } else {
        $stmt = $db->query('SELECT * FROM city ORDER BY population DESC');
    }

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        echo "<td>{$row['Name']}</td>";
        echo "<td><a href='?code={$row['CountryCode']}'>{$row['CountryCode']}</a></td>";
        echo '<td>'.$row['Population'].'</td>';
        echo '</tr>';
    }
?>

</table>

</body>

</html>