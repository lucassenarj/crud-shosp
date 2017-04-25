<?php
$g_database = 'crud-shosp';
$g_host     = 'localhost';
$g_username = 'root';
$g_password = '';

$g_dsn = 'mysql:dbname=' . $g_database . ';host=' . $g_host;

try {
    $pdo = new PDO(
        $g_dsn, $g_username, $g_password
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    $g_erro = 1;
    $g_erromsg = $e->getMessage();
}
?>