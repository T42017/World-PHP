<!DOCTYPE html>
<html>
    <head>
        
        <meta charset = "utf-8">
        
        <title>World</title>   

    </head>

    <body>

        <h1> Info about all the countries in the world </h1>

        <form action="countries.php" method="GET" >
            <input type="submit" value="See all countries" />
        </form>

        <table>

            <tr> <th>Name</th> <th> Continent</th> <th>Population</th> </tr>

            <?php

            if(isset($_GET["Continent"])){
                $input = $_GET["Continent"];
            }
            else {
                $input = null;
            }



            $db = new PDO('mysql:host=localhost;dbname=world;charset=utf8mb4','root', '');

            $stmt = $db->query('SELECT * FROM country ORDER BY Population DESC');

            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                if($row['Continent'] == $input || $input == null){
                    echo"<tr>";
                    echo"<td><a href='/world/languages.php?Country={$row['Code']}'>{$row['Name']}</a></td>";
                    echo"<td><a href='?Continent={$row['Continent']}'>{$row['Continent']}</a></td>";
                    echo"<td>{$row['Population']}</td>";
                    echo "</tr>";
                }

            }

            ?>

        </table>
    </body>
</html>