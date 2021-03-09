<?php
$host = 'localhost:3306';
$db   = 'task_db';
$user = 'root';
$pass = 'root';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$conn = new PDO($dsn, $user, $pass);
$result = $conn -> query('SELECT name, number FROM contact') -> fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result, JSON_UNESCAPED_UNICODE);


if (isset($_REQUEST['name']) && isset($_REQUEST['number'])) {
	$name = $_REQUEST['name'];
	$number = $_REQUEST['number'];
	
	$conn2 = new PDO($dsn, $user, $pass);
	$sql = "INSERT INTO contact (name, number) VALUES (?,?)";
	$stmt = $conn2 -> prepare($sql);
	$stmt ->execute([$name, $number]);
	$conn2 = null;
}
?>