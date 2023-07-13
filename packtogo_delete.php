<?php
session_start();
include('functions.php');
check_session_id();

// DB接続
$pdo = connect_to_db();

// データ受け取り
// var_dump($_GET);
// exit();

$id = $_GET["id"];


// SQL実行
// $sql = 'DELETE FROM todo_table WHERE id=:id';
$sql = 'UPDATE gear_table SET deleted_at=now() WHERE id=:id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);

try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

header("Location:packtogo_read.php");
exit();
