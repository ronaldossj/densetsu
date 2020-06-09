<?php

CONST HOST = "127.0.0.1";
CONST USERNAME = "root";
CONST PASSWORD = "root";
CONST PORT = "3306";
CONST DATABASE = "densetsu";

$db = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);

if($db->connect_errno){
    echo "Erro";
    die;
};