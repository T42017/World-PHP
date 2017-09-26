<?php include 'header.php'; ?>

<div>
    <table>
        <tr>
            <th>
                Land
            </th>
            
            <th>
                Kontinent
            </th>

            <th>
                Språk
            </th>
            
            <th>
                Befolkningsmängd
            </th>
        </tr>
        
        <?php 
            include 'dbconnection.php';
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
                $languageLink = "languages.php?code={$row['Code']}";
                echo "<tr class='border'>";
                echo "<td class='info'>{$row['Name']}</td>";
                echo "<td class='info'>{$row['Continent']}</td>";
                echo "<td class='info'><a class='country-language' href=$languageLink>Språk</a></td>";
                echo "<td class='info'>{$row['Population']}</td>";
                echo "</tr>";
            }
        ?>
    </table>
</div>

<?php include 'footer.php'; ?>