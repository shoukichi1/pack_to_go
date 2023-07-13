<?php
session_start();
include('functions.php');
check_session_id();

// DB接続
$pdo = connect_to_db();

// var_dump($_FILES);
// exit();
// POSTデータ確認
if (
    // データが入っていない場合
    !isset($_POST["gear_name"]) || $_POST["gear_name"] === "" ||
    !isset($_FILES["gear_image"]['name']) || $_FILES["gear_image"]['name'] === "" ||
    !isset($_POST["gear_kind"]) || $_POST["gear_kind"] === "" ||
    !isset($_POST["gear_gram"]) || $_POST["gear_gram"] === "" ||
    !isset($_POST["gear_text"]) || $_POST["gear_text"] === ""
) {
    exit('ParamError');
}

// POSTデータ取得
$gear_name = $_POST["gear_name"];
// ファイル名の被りを防ぐためにユニークIDを生成
$gear_image = uniqid() . '_' . $_FILES['gear_image']['name'];
$gear_kind = $_POST["gear_kind"];
$gear_gram = $_POST["gear_gram"];
$gear_text = $_POST["gear_text"];

//FileUpload処理
$upload = './gear_images/'; //画像アップロードフォルダへのパス

//アップロードした画像を../img/へ移動させる記述↓
if (move_uploaded_file($_FILES['gear_image']['tmp_name'], $upload . $gear_image)) {
    // file upload:OK
} else {
    // file upload:NG
    echo 'ファイルアップロードエラー';
    echo $_FILES['gear_image']['error'];
}



// SQL作成&実行
$sql = 'INSERT INTO gear_table (id, gear_name, gear_image, gear_kind, gear_gram, gear_text, created_at, updated_at) VALUES (NULL, :gear_name, :gear_image, :gear_kind, :gear_gram, :gear_text, now(), now())';

$stmt = $pdo->prepare($sql);

// バインド変数を設定
$stmt->bindValue(':gear_name', $gear_name, PDO::PARAM_STR);
$stmt->bindValue(':gear_image', $gear_image, PDO::PARAM_STR);
$stmt->bindValue(':gear_kind', $gear_kind, PDO::PARAM_STR);
$stmt->bindValue(':gear_gram', $gear_gram, PDO::PARAM_STR);
$stmt->bindValue(':gear_text', $gear_text, PDO::PARAM_STR);

// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

// todo_inputに戻る
header('Location:packtogo_input.php');
exit();
