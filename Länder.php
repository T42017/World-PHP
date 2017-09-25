<?php include "header.php"; ?>
<table>
	<tr><th>Namn</th><th>Kontinent</th><th>Population</th></tr>
<?php 
	$db = new PDO('mysql:host=localhost;dbname=world;charset=utf8mb4', 'root', '');
	$stmt = $db->query('SELECT * FROM country ORDER BY Population DESC');

	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
	echo '<tr>';
    echo '<td>'.$row['Name'].'</td>';
	echo '<td>'.$row['Continent'].'</td>'; 
	echo '<td>'.$row['Population'].'</td>';  
	echo '</tr>';
}
?>
</table>
<?php include "footer.php"; ?>