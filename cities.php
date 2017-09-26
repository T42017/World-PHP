 <!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="countries.php">
    <link rel="stylesheet" type="text/css" href="cities.php">
    <link rel="stylesheet" type="text/css" href="languages.php">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <meta charset="UTF-8">
<title>Title of the document</title>
</head>

<body>
    
    <table>
    <tr><th>Name</th><th>ISO Code</th><th>Population</th></tr>
    
    <?php
        $input = htmlspecialchars($_GET["CountryCode"]);
        $db = new PDO('mysql:host=localhost;dbname=world;charset=utf8mb4','root', '');
        $stmt = $db->query('SELECT * FROM city ORDER BY Population DESC');
        
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            if($row['CountryCode'] == $input || $input == null){
                echo"<tr>";
                echo"<td>{$row['Name']}</td>";
                echo"<td><a href='?CountryCode={$row['CountryCode']}'>{$row['CountryCode']}</a></td>";
                echo"<td>{$row['Population']}</td>";
                echo "</tr>";
            }
        }
    ?>
    </table>
</body>

</html> 