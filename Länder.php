<?php include "header.php"; ?>
<table>
	<h1>
		Länder
	</h1>
	<tr>
		<th>Namn</th>
		<th>Kontinent</th>
		<th>Språk</th>
		<th>Population</th>
	</tr>
		<?php 
            $db = new PDO('mysql:host=localhost;dbname=world;charset=utf8', 'root', '');
            if (isset($_GET["continent"]) && !empty($_GET["continent"]))
            {
                $stmt = $db->prepare('SELECT Name, Continent, Population, Code FROM country WHERE Continent = :continent ORDER BY Population DESC');
                $continent = strtolower(htmlspecialchars($_GET["continent"]));
                $stmt->bindParam(':continent', $continent);
                $stmt->execute();
            }
            else 
            {
                $stmt = $db->query('SELECT Name, Continent, Population, Code FROM country ORDER BY Population DESC');
            }
            while($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
            	$language = "Språk.php?code={$row['Code']}";
                echo "<tr class='border'>";
                echo "<td class='info'>{$row['Name']}</td>";
                echo "<td class='info'>{$row['Continent']}</td>";
                echo "<td class='info'><a class='språk' href=$language>Tryck för att se språken!</a></td>";
                echo "<td class='info'>{$row['Population']}</td>";
                echo "</tr>";
            }
        ?>
</table>
<?php include "footer.php"; ?>