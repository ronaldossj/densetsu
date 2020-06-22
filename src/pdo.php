<?php

// Conexao com MySQL via PDO
$db_dsn = 'mysql:host=mysql-local;port=3306;dbname=densetsu';
$db_usuario = 'root';
$db_senha = 'root';
$db_opcoes = array(
    PDO::ATTR_PERSISTENT => false,
    PDO::ATTR_CASE => PDO::CASE_NATURAL,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
);

try {
    $pdo = new PDO($db_dsn, $db_usuario, $db_senha, $db_opcoes);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, 2);
} catch (PDOException $e) {
    trigger_error($e->getMessage());
    die();
}

