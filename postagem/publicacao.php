<?php
session_start();
require_once __DIR__."/../db.php";
$sql = "SELECT id, titulo, texto FROM postagens";
$result = $db->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    
</body>
</html>