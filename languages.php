	if(isset($_GET['countrycode']))
{
	$countrycode = $_GET['countrycode'];
	$stmt = $db->prepare('SELECT * FROM country WHERE Continent=:continent ORDER BY population DESC');
	$stmt->bindParam(':continent', $continent);
	$stmt->execute();
}
else
{
	$stmt = $db->query('SELECT * FROM country ORDER BY population DESC');
}


echo "<td><a href=''>'.$row['CountryName'].'</td>";