<?php 

require_once('log.php');
require_once('db.php');
require_once('cros.php');

try {
	$db = new PDO(DB_DSN, DB_USER, DB_PWD);	
} catch (PDOException $e) {
	die($e->getMessage());
}

$count = $db->exec('create database '.DB_NAME.' character set "utf8" collate "utf8_general_ci"');
if($count < 1) {
	print('create db fail!');
	print('<br />');
}

// use database error!!!! renew pdo

$db = new PDO(DB_DSN.';dbname='.DB_NAME, DB_USER, DB_PWD);	

//$db->exec('use database '.DB_NAME);

//echo 'use database '.DB_NAME;

//print_r($db->errorInfo());

// $ret = $db->query('show tables');

// print_r($ret);
// print_r($ret->fetchAll());

// tag
// version
// code_version

// href
// type
// desc
// detail(stack)
// index

// ua
// time
// id

$sql_create = 'CREATE TABLE `'.DB_TABLE_NAME.'` (
	`tag` varchar(128) DEFAULT NULL,
	`version` varchar(256) DEFAULT NULL,
	`code_version` varchar(64) DEFAULT NULL,
	`ua` varchar(4096) DEFAULT NULL,
	`time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`id` bigint(20) NOT NULL AUTO_INCREMENT,
	`href` varchar(4096) DEFAULT NULL,
	`type` varchar(64) DEFAULT NULL,
	`des` varchar(4096) DEFAULT NULL,
	`detail` varchar(4096) DEFAULT NULL,
	`idx` varchar(12) DEFAULT NULL,
	PRIMARY KEY (`id`)
   ) ENGINE=InnoDB DEFAULT CHARSET=utf8';

$count = $db->exec($sql_create);
// return 0!!!
// print_r($count);
// if($count < 1) {
// 	//print_r($db->errorInfo());
// 	die('create table fail!');
// }

// echo 'create table succeeded!';

$db = null;
