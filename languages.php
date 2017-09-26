<!DOCTYPE html>
<html>
<head>

    <meta charset = "utf-8">

    <title>World</title>

</head>

<body>

<h1> Info about all the languages in the world </h1>

<form action="languages.php" method="GET" >
    <input type="submit" value="See all languages" />
</form>

<table>

    <tr> <th>Name</th> </tr>

    <?php

    if(isset($_GET["Country"])){
        $input = $_GET["Country"];
    }
    else {
        $input = null;
    }



    $db = new PDO('mysql:host=localhost;dbname=world;charset=utf8mb4','root', '');

    $stmt = $db->query('SELECT * FROM countrylanguage');

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        if($row['CountryCode'] == $input || $input == null){
            echo"<tr>";
            echo"<td>{$row['Language']}</td>";
            echo "</tr>";
        }

    }

    ?>

</table>
</body>
</html>