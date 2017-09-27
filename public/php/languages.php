<?php 
require 'dbconnection.php';
include 'header.php'; 
?>

<div>
    <table>
    	<tr>
    		<th>
    			<?php
				if (isset($_GET["code"]))
				{
					$stmt = $db->prepare("SELECT country.Name AS Country 
										  FROM countrylanguage, country 
										  WHERE countrylanguage.CountryCode = country.Code AND country.Code = :code");
					$code = strtolower(htmlspecialchars($_GET["code"]));
					$stmt->bindParam(":code", $code);
					$stmt->execute();
					if ($row = $stmt->fetch(PDO::FETCH_ASSOC))
    					echo $row["Country"];
				}
				else
					echo "Alla språk";
    			?>
    		</th>
    	</tr>
    	
        <?php 
        if (isset($_GET["code"]))
        {
            $stmt = $db->prepare('SELECT countrylanguage.Language AS Language, country.Name AS Name 
    							  FROM countrylanguage, country 
    							  WHERE countrylanguage.CountryCode = :code AND countrylanguage.CountryCode = country.Code');
            $code = strtolower(htmlspecialchars($_GET["code"]));
            $stmt->bindParam(':code', $code);
            $stmt->execute();
        }
        else 
        {
        	$stmt = $db->query('SELECT DISTINCT Language 
        						FROM countrylanguage');
        }

        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            echo "<tr class='border'>";
            echo "<td class='info'>{$row['Language']}</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <?php if (isset($_GET["code"]) && !empty($_GET["code"])): ?>
    <a class="back-to-countries-a" href ="./countries.php">
    	←
    </a>
	<?php endif; ?>
</div>

<?php include 'footer.php'; ?>