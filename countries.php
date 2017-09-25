<!DOCTYPE html>
<html>
    <head>
        
        <meta charset = "utf-8">
        
        <title>World</title>   
        
    </head>
    
    <body>
    
        <h1> Info about all the countries in the world </h1>
        
        <table>
            
            <tr> <th>Name</th> <th> Continent</th> <th>Population</th> </tr>
            
            <?php
            
            $input = htmlspecialchars($_GET["Continent"]);
            
            
            $db = new PDO('mysql:host=localhost;dbname=world;charset=utf8mb4','root', '');
            
            $stmt = $db->query('SELECT * FROM country ORDER BY Population DESC');            
            
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                if($row['Continent'] == $input || $input == null){
                    echo"<tr>";
                    echo"<td><a tag=" .$row['Name']."></a></td>";
                    echo"<td>{$row['Continent']}</td>";
                    echo"<td>{$row['Population']}</td>";
                    echo "</tr>";
                }
                
            }
            
            ?>
            
        </table>
        
        <form action="countries.php" method="GET" >
	       <input id="Continent" name="Continent" type="text" value="" />
	       <input type="submit" value="Sort by continent" />
        </form>
        
        
    </body>   
</html>