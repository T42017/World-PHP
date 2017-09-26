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
    <tr><th>Name</th><th>Continent</th><th>Population</th></tr>
    
    <?php
        
        $db = new PDO('mysql:host=localhost;dbname=world;charset=utf8mb4', 'root', '');
        
        if(isset($_GET['continent'])){
            $continent = $_GET['continent'];
            $stmt = $db->prepare('SELECT * FROM country WHERE Continent=:continent ORDER BY population DESC');
            $stmt->bindParam(':continent', $continent);
            $stmt->execute();
        }
        else{
            $stmt = $db->query('SELECT * FROM country ORDER BY population DESC');
        }
        
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            echo '<td>'.$row['Name'].'</td>';
            echo "<td><a href='?continent={$row['Continent']}'>{$row['Continent']}</a></td>"; 
            echo "<td><a href='languages.php?IsoCode={$row['Code']}'>{$row['Code']}</a></td>"; 
            echo '<td>'.$row['Population'].'</td>'; 
            echo '</tr>';
        }
    ?>
    </table>
    
</body>

</html> 