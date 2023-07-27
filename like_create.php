<?php
session_start();
include('functions.php');
check_session_id();

$user_id = $_GET['user_id'];
$gear_id = $_GET['gear_id'];

$pdo = connect_to_db();

$sql = 'SELECT COUNT(*) FROM like_table WHERE user_id=:user_id AND gear_id=:gear_id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
$stmt->bindValue(':gear_id', $gear_id, PDO::PARAM_STR);

try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

$like_count = $stmt->fetchColumn();
// var_dump($like_count);
// exit();

if ($like_count !== 0) {
    // いいねされている状態
    $sql = 'DELETE FROM like_table WHERE user_id=:user_id AND gear_id=:gear_id';
} else {
    // いいねされていない状態
    $sql = 'INSERT INTO like_table (id, user_id, gear_id, created_at) VALUES (NULL, :user_id, :gear_id, now())';
}

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
$stmt->bindValue(':gear_id', $gear_id, PDO::PARAM_STR);

try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

header("Location:packtogo_read.php");
exit();
