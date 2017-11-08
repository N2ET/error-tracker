<?php 

require('./log.php');
require_once('./db.php');
require_once('./cros.php');

try {
	if($_POST) {
		$data = json_decode($_POST['data'], true);
	}
} catch (Exception $e) {
	die(json_encode([
		"success" => 0,
		"message" => $e->getMessage()
	]));
}

try {
	$db = new PDO(DB_FULL_DSN, DB_USER, DB_PWD);	
} catch (PDOException $e) {
	die($e->getMessage());
}

$result = $db->query('use '.DB_NAME);

$keys = array(
	'tag',
	'version',
	'code_version',
	'ua',
	'href',
	'type',
	'des',
	'detail',
	'idx'
);

$map_params = function($key) {
	return ':'.$key;
};
$params = array_map($map_params, $keys);
$sql = 'insert into '.DB_TABLE_NAME.
	'(' .join(',', $keys). ') '.
	'values('.join(',', $params).')';

debug_print("execute sql: $sql<br />");

$stmt = $db->prepare($sql);

foreach($data as $item_key=>$item_value) {
	$item_value['ua'] = $_SERVER['HTTP_USER_AGENT'];

	foreach($keys as $index=>$value) {
		debug_print("$index: $value<br />");
		
		//if(array_key_exists($value, $item_value)) {
			//$stmt->bindParam(':'.$value, $item_value[$value]);
			//debug_print("bind param: $value->$item_value[$value]");
		//}
		if(!array_key_exists($value, $item_value)) {
			$item_value[$value] = '';
		}
		$stmt->bindParam(':'.$value, $item_value[$value]);
		debug_print("bind param: $value->$item_value[$value]");
		
		
		debug_print('<br />');
	}

	$count = $stmt->execute();
	if(!$count or $count < 0) {
		debug_print('insert error:<br />');
		debug_print_r($stmt->errorInfo());
		debug_print('<br />');
		die();
	}
}

print(json_encode([
	"success" => 1,
	"data" => $data
]));
