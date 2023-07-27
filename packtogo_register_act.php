<?php
// var_dump($_POST);
// exit();

session_start();
include("functions.php");

// データ受け取り
$username = $_POST['username'];
$password = $_POST['password'];
$is_admin = $_POST['is_admin'];
$height = $_POST['height'];
$weight = $_POST['weight'];

// DB接続
$pdo = connect_to_db();

if (
    // データが入っていない場合
    !isset($_POST["username"]) || $_POST["username"] === "" ||
    !isset($_POST["password"]) || $_POST["password"] === "" ||
    !isset($_POST["is_admin"]) || $_POST["is_admin"] === "" ||
    !isset($_POST["height"]) || $_POST["height"] === "" ||
    !isset($_POST["weight"]) || $_POST["weight"] === ""
) {
    exit('ParamError');
}

// username，password，deleted_atの3項目全ての条件満たすデータを抽出する．
$sql = 'INSERT INTO users_table (id, username, password, is_admin, height, weight, created_at, updated_at) VALUES (NULL, :username, :password, :is_admin, :height, :weight, now(), now())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$stmt->bindValue(':is_admin', $is_admin, PDO::PARAM_STR);
$stmt->bindValue(':height', $height, PDO::PARAM_STR);
$stmt->bindValue(':weight', $weight, PDO::PARAM_STR);


try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}


// todo_inputに戻る
header('Location:packtogo_login.php');
exit();
