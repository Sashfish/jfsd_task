<?php
$host = 'localhost:3306';
$db   = 'task_db';
$user = 'root';
$pass = 'root';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

if(isset($_POST['name']) && isset($_POST['number'])) {
	if ($_POST['action'] == 'create') {
	$name = $_POST['name'];
	$number = $_POST['number'];
	$conn2 = new PDO($dsn, $user, $pass);
	$stmt = $conn2 -> prepare('INSERT INTO contact (name, number) VALUES (?, ?)');
	$stmt ->execute([$name, $number]);
	$conn2 = null;
	}
	elseif ($_POST['action'] == 'delete') {
		$name = $_POST['name'];
		$number = $_POST['number'];
		$conn2 = new PDO($dsn, $user, $pass);
		$stmt = $conn2 -> prepare('DELETE FROM contact WHERE name = ? AND number = ?');
		$stmt ->execute([$name, $number]);
		$conn2 = null;
	}
}

$conn = new PDO($dsn, $user, $pass);
$result = $conn -> query('SELECT name, number FROM contact') -> fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result, JSON_UNESCAPED_UNICODE);
?>