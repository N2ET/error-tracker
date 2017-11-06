<?php

require_once('./log.php');
require_once('./db.php');
require_once('./cros.php');

$start = 0;
$limit = 50;

if(isset($_GET['start'])) {
    $start = $_GET['start'];
}

if(isset($_GET['limit'])) {
    $limit = $_GET['limit'];
}

$db = db_init_pdo();
$db->query('use '.DB_NAME);
$sql = 'select * from '.DB_TABLE_NAME.' limit :start,:limit';
$sql = 'select * from '.DB_TABLE_NAME;
//debug_print("execute sql: $sql<br />");
$stmt = $db->prepare($sql);
// $stmt->bindParam(':start', $start);
// $stmt->bindParam(':limit', $limit);
//debug_print("start: $start, limit: $limit<br />");
$result = $stmt->execute([
    ':start' => $start,
    ':limit' => $limit
]);

//debug_print('<br />');
$all =$stmt->fetchAll();
//debug_print_r($all);
print(json_encode([
	"success" => 1,
	"data" => $all
]));




