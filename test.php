<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
</head>

<body>

<h1>Users </h1>


<table>
<tr><th>Id</th><th>Namn</th><th>Email</th><th>Telefon</th></tr>
<?php

$db = new PDO('mysql:host=localhost;dbname=temp;charset=utf8mb4', 'root', '');
$stmt = $db->query('SELECT * FROM users');

while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
	echo '<tr>';
    echo "<td>{$row['id']}</td>";
    echo '<td>'.$row['name'].'</td>';
	echo '<td>'.$row['email'].'</td>'; 
	echo '<td>'.$row['phone'].'</td>'; 
	echo '</tr>';
}

?>

</table>

<form action="test.php" method="POST" >
	<input id="text" name="text" type="text" value="" />
	<input type="submit" value="Hmmm" />
</form>


</body>
</html>