<!DOCTPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
    
<body>

<h1>Languages </h1>     


<table>
<tr>
    <th>Language</th>
<?php

$db = new PDO('mysql:host=localhost;dbname=world;charset=utf8mb4', 'root', ''); 

if (isset($_GET['language']))
{    
    $language = $_GET['language'];
    $stmt = $db->prepare('SELECT * FROM countrylanguage WHERE Language=:language');
    $stmt-> bindParam(':language', $language);
    $stmt->execute();
    echo "<th>Country Code</th>";
    echo "<th>Percentage</th>";
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo '<tr>';
        echo "<td><a href='?language={$row['Language']}'>{$row['Language']}</a>
    </td>";
    echo "<td>{$row['CountryCode']}</td>";
    echo '<td>'.$row['Percentage'].'</td>';
    echo '</tr>';
}
}

else
{
    $stmt = $db->query('SELECT * FROM countrylanguage GROUP BY language');
    
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo '<tr>';
    echo "<td><a href='?language={$row['Language']}'>{$row['Language']}</a>
    </td>";
    echo '</tr>';
}
}

?>

</table>
</body>
</html>