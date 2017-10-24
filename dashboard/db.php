<?php

const DB_DSN = 'mysql:host=localhost';
const DB_FULL_DSN = 'mysql:host=localhost;dbname=error_track';
const DB_USER = 'root';
const DB_PWD = '';
const DB_NAME = 'zsb';
const DB_TABLE_NAME = 'error_track';

function db_init_pdo() {
    try {
        $db = new PDO(DB_FULL_DSN, DB_USER, DB_PWD);	
    } catch (PDOException $e) {
        die($e->getMessage());
    }
    return $db;
}