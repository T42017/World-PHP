	if(isset($_GET['countrycode']))
{
	$countrycode = $_GET['countrycode'];
	$stmt = $db->prepare('SELECT * FROM country WHERE Continent=:continent ORDER BY population DESC');
	$stmt->bindParam(':continent', $continent);
	$stmt->execute();
}
else
{
	$stmt = $db->query('SELECT * FROM city ORDER BY population DESC');
}