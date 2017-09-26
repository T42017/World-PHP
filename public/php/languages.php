<?php include 'header.php'; ?>

<div>
    <table>
        <tr>
            <th>
                Språk
            </th>
            
            <th>
                Land
            </th>
        </tr>
        
        <?php 
            include 'dbconnection.php';
            if (isset($_GET["code"]) && !empty($_GET["code"]))
            {
                $stmt = $db->prepare('SELECT countrylanguage.Language AS Language, country.Name AS Country FROM countrylanguage, country WHERE countrylanguage.CountryCode = :code AND countrylanguage.CountryCode = country.Code');
                $code = strtolower(htmlspecialchars($_GET["code"]));
                $stmt->bindParam(':code', $code);
                $stmt->execute();
            }
            else 
            {
                $stmt = $db->query('SELECT countrylanguage.Language as Language, country.Name as Country FROM countrylanguage, country WHERE countrylanguage.CountryCode = country.Code');
            }
            while($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                echo "<tr class='border'>";
                echo "<td class='info'>{$row['Language']}</td>";
                echo "<td class='info'>{$row['Country']}</td>";
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