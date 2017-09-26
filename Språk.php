<?php include "header.php"; ?>
<table>
	<h1>
		Språk
	</h1>
	<tr>
		<th>Språk</th>
	</tr>
		<?php 
			$db = new PDO('mysql:host=localhost;dbname=world;charset=utf8mb4', 'root', '');
			if (isset($_GET["code"]) && !empty ($_GET["code"]))
			{
				$stmt = $db->prepare('SELECT countrylanguage.Language AS Language, country.Name AS Country FROM countrylanguage, country WHERE countrylanguage.CountryCode = :code AND countrylanguage.CountryCode = country.Code');
				$code = strtolower(htmlspecialchars($_GET["code"]));
				$stmt->bindParam(':code', $code);
				$stmt->execute();
			}
			else
			{
				$stmt = $db->query('SELECT DISTINCT countrylanguage.Language AS Language FROM countrylanguage, country WHERE countrylanguage.CountryCode = country.Code');
			}

			while($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
			{
				echo "<tr>";
		   		echo "<td>{$row['Language']}</td>";
				echo "</tr>";
			}
		?>
	</table>
	<?php if (isset($_GET["code"]) && !empty($_GET["code"])): ?>
	    <a class="back-to-countries-a" href ="./Länder.php">
	    	Tillbaka till länder!
	    </a>
	<?php endif; ?>
<?php include "footer.php"; ?>