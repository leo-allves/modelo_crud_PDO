<?php
// 1º - para conectar preciso usar um [usuario e senha]
$db_name = 'modelo-crud-PDO';
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';

$pdo = new PDO("mysql:dbname=".$db_name.";host=".$db_host, $db_user, $db_pass);


# ou insiro direto assim
// $conexao = new PDO("mysql:dbname=crudb7;host=localhost", "root", "");