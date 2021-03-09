<?php
$host = 'localhost:3306';
$db   = 'task_db';
$user = 'root';
$pass = 'root';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$con = new PDO($dsn, $user, $pass);
$result = $con -> query('SELECT name, number FROM contact') -> fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result, JSON_UNESCAPED_UNICODE);

?>