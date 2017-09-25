<!DOCTYPE html>
<html>
    <head>
        
        <meta charset = "utf-8">
        
        <title>World</title>   
        
    </head>
    
    <body>
    
        <h1> Info about all the countries in the world </h1>
        <form action="cities.php" method="GET">
            <input id="Code" name="Code" type="text" value="" />
	        <input type="submit" value="Sort by country code" />
            </form>
        <table>
            
            <tr> <th>Name</th> <th>District</th> <th>Population</th> </tr>
            
            
            <?php
            
            $input = htmlspecialchars($_GET["Code"]);
            
            
            $db = new PDO('mysql:host=localhost;dbname=world;charset=utf8mb4','root', '');
            
            $stmt = $db->query('SELECT * FROM city ORDER BY Population DESC');            
            
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                if($row['CountryCode'] == $input || $input == null){
                    echo"<tr>";
                    echo"<td>{$row['Name']}</td>";
                    echo"<td>{$row['District']}</td>";
                    echo"<td>{$row['Population']}</td>";
                    echo "</tr>";
                }
                
            }
            
            ?>
            
        </table>
        
        
        
        
    </body>   
</html>