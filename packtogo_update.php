<?php
// var_dump($_POST);
// exit();

$id = $_POST['id'];

include('functions.php');

// DB接続
$pdo = connect_to_db();

// 入力チェックの記述
if (
    !isset($_POST["gear_name"]) || $_POST["gear_name"] === "" ||
    !isset($_POST["gear_kind"]) || $_POST["gear_kind"] === "" ||
    !isset($_POST["gear_gram"]) || $_POST["gear_gram"] === "" ||
    !isset($_POST["gear_text"]) || $_POST["gear_text"] === ""
) {
    exit('ParamError');
}

$gear_name = $_POST["gear_name"];
$gear_kind = $_POST["gear_kind"];
$gear_gram = $_POST["gear_gram"];
$gear_text = $_POST["gear_text"];

// 画像の入力チェック
if (!isset($_FILES['gear_image']['name']) || $_FILES['gear_image']['name'] === '') {
    // 画像フィールドが空の場合は、既存の画像ファイル名を使用する
    $gear_image = $_POST['existing_gear_image'];
} else {
    // 画像フィールドが選択された場合は、新しい画像を処理する
    $gear_image = uniqid() . '_' . $_FILES['gear_image']['name'];
    $upload = './gear_images/'; //画像アップロードフォルダへのパス
    //アップロードした画像を./gear_images/へ移動させる記述
    if (!move_uploaded_file($_FILES['gear_image']['tmp_name'], $upload . $gear_image)) {
        // file upload:NG
        echo 'ファイルアップロードエラー';
        echo $_FILES['gear_image']['error'];
        exit();
    }
}






// SQL作成&実行
$sql = 'UPDATE gear_table SET gear_name=:gear_name, gear_image=:gear_image, gear_kind=:gear_kind, gear_gram=:gear_gram, gear_text=:gear_text, updated_at=now() WHERE id=:id';

$stmt = $pdo->prepare($sql);

// バインド変数を設定
$stmt->bindValue(':gear_name', $gear_name, PDO::PARAM_STR);
$stmt->bindValue(':gear_image', $gear_image, PDO::PARAM_STR);
$stmt->bindValue(':gear_kind', $gear_kind, PDO::PARAM_STR);
$stmt->bindValue(':gear_gram', $gear_gram, PDO::PARAM_STR);
$stmt->bindValue(':gear_text', $gear_text, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);

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
