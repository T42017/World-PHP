<?php include "header.php"; ?>
<h1>
	Städer
</h1>
<table>
	<tr>
		<th>Namn</th>
		<th>Land</th>
		<th>Population</th>
	</tr>
		<?php 
    		$db = new PDO('mysql:host=localhost;dbname=world;charset=utf8', 'root', '');
            if (isset($_GET["code"]) && !empty($_GET["code"]))
            {
                $stmt = $db->prepare('SELECT country.Name AS countryName, city.Name AS cityName, city.Population AS cityPopulation FROM country, city WHERE city.CountryCode = :code AND city.CountryCode = country.Code ORDER BY city.Population DESC');
                $code = strtolower(htmlspecialchars($_GET["code"]));
                $stmt->bindParam(':code', $code);
                $stmt->execute();
            }
            else 
            {
                $stmt = $db->query('SELECT country.Name AS countryName, city.Name AS cityName, city.Population AS cityPopulation FROM country, city WHERE city.CountryCode = country.Code ORDER BY city.Population DESC');
            }            
            while($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                echo "<tr>";
                echo "<td>{$row['cityName']}</td>";
                echo "<td>{$row['countryName']}</td>";
                echo "<td>{$row['cityPopulation']}</td>";
                echo "</tr>";
            }
        ?>
</table>
<?php include "footer.php"; ?>