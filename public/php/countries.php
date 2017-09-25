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
                Befolkningsmängd
            </th>
        </tr>
        
        <?php 
            include 'dbconnection.php';
            if (isset($_GET["continent"]) && !empty($_GET["continent"]))
            {
                $stmt = $db->prepare('SELECT Name, Continent, Population FROM country WHERE Continent = :continent ORDER BY Population DESC');
                $continent = strtolower(htmlspecialchars($_GET["continent"]));
                $stmt->bindParam(':continent', $continent);
            }
            else 
            {
                $stmt = $db->prepare('SELECT Name, Continent, Population FROM country ORDER BY Population DESC');
            }
            $stmt->execute();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                echo "<tr class='border'>";
                echo "<td class='info'>{$row['Name']}</td>";
                echo "<td class='info'>{$row['Continent']}</td>";
                echo "<td class='info'>{$row['Population']}</td>";
                echo "</tr>";
            }
        ?>
    </table>
</div>

<?php include 'footer.php'; ?>