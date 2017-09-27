<?php 
require 'dbconnection.php';
include 'header.php'; 
?>

<div>
    <table>
        <tr>
            <th>
                Stad
            </th>
            
            <th>
                Land
            </th>
            
            <th>
                Befolkningsmängd
            </th>
        </tr>
        
        <?php 
        if (isset($_GET["code"]))
        {
            $stmt = $db->prepare('SELECT country.Name AS countryName, city.Name AS cityName, city.Population AS cityPopulation 
                                  FROM country, city 
                                  WHERE city.CountryCode = :code AND city.CountryCode = country.Code 
                                  ORDER BY city.Population DESC');
            $code = strtolower(htmlspecialchars($_GET["code"]));
            $stmt->bindParam(':code', $code);
            $stmt->execute();
        }
        else
        {
            $stmt = $db->query('SELECT country.Name AS countryName, city.Name AS cityName, city.Population AS cityPopulation 
                                FROM country, city 
                                WHERE city.CountryCode = country.Code 
                                ORDER BY city.Population DESC');
        }

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            echo "<tr class='border'>";
            echo "<td class='info'>{$row['cityName']}</td>";
            echo "<td class='info'>{$row['countryName']}</td>";
            echo "<td class='info'>{$row['cityPopulation']}</td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>

<?php include 'footer.php'; ?>