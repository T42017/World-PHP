<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Språk</title>
</head>

<body>

<h1>Språk</h1>

<table>
<tr><th>Språk</th><th>procent</th></tr>

<?php
    $db = new PDO('mysql:host=localhost;dbname=world;charset=utf8mb4', 'root', '');

    if(isset($_GET['code'])) {
        $code = $_GET['code'];
        $stmt = $db->prepare('SELECT * FROM countrylanguage WHERE CountryCode=:code GROUP BY Language ORDER BY Language DESC');
        $stmt->bindParam(':code', $code);
        $stmt->execute();
    } else {
        $stmt = $db->query('SELECT * FROM countrylanguage GROUP BY Language ORDER BY Language DESC');
    }
    
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        echo "<td>{$row['Language']}</td>";
        echo "<td>{$row['Percentage']}%</td>";
        echo '</tr>';
    }
?>

</table>

</body>

</html>