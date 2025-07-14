<?php
$search=trim($_GET['searchfood']);

$sql = "SELECT DISTINCT food_name FROM foodlist WHERE food_name LIKE '$search%' ORDER BY food_name LIMIT 0, 10";

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
echo "<option>".htmlspecialchars($value["food_name"])."</option>\n";