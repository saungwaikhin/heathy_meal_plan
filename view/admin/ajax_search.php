<?php
$search=trim($_GET['search']);
$sql = "SELECT DISTINCT name FROM user WHERE name LIKE '$search%' ORDER BY name LIMIT 0, 10";
$dsn = "mysql:host=localhost;dbname=hmp";
try {
	$pdo = new PDO($dsn, "root", ""); // Constructor
} catch (PDOException $e) {
	echo "Connection error: ".$e->getMessage(); exit;
}
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result=$stmt->fetchAll();
foreach($result as $key=>$value)
echo "<option>".htmlspecialchars($value["name"])."</option>\n";