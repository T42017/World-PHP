<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Länder</title>
</head>

<body>
<h1>Countries</h1>

<table>
<tr><th>Id</th><th>Namn</th><th>Kontinent</th><th>Population</th></tr>

<?php        
    $db = new PDO('mysql:host=localhost;dbname=world;charset=utf8mb4', 'root', '');

    if(isset($_GET['continent'])) {
        $continent = $_GET['continent'];
        $stmt = $db->prepare('SELECT * FROM country WHERE Continent=:continent ORDER BY population DESC');
        $stmt->bindParam(':continent', $continent);
        $stmt->execute();
    } else {
        $stmt = $db->query('SELECT * FROM country ORDER BY population DESC');
    }

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        echo "<td>{$row['Code']}</td>";
        echo "<td>{$row['Name']}</td>";
        echo "<td><a href='?continent={$row['Continent']}'>{$row['Continent']}</a></td>"; 
        echo "<td>{$row['Population']}</td>";
        echo "<td><a href='sprak.php?code={$row['Code']}'>Språk</a>";
        echo '</tr>';
    }
?>

</table>
</body>

</html>