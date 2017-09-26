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
    
    
    <?php
        $db = new PDO('mysql:host=localhost;dbname=world;charset=utf8mb4', 'root', '');
        
        if(isset($_GET['IsoCode'])){
            $IsoCode = $_GET['IsoCode'];
            $stmt = $db->prepare('SELECT * FROM countrylanguage WHERE CountryCode=:CountryCode');
            $stmt->bindParam(':CountryCode', $IsoCode);
            $stmt->execute();
        }
        else{
            $stmt = $db->query('SELECT * FROM countrylanguage');
        }
        
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr style=>';
            echo "<td><a href='?Language={$row['Language']}'>{$row['Language']}</a></td>";
            echo '</tr>';
        }
    ?>
    </table>
    
    
</body>

</html>