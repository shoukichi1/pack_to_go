<?php
session_start();
include('functions.php');
check_session_id();

// 接続確認
// var_dump($_GET);
// exit();

// DB接続
$pdo = connect_to_db();

$id = $_GET['id'];

// sqlの指定
$sql = 'SELECT * FROM gear_table WHERE id=:id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);

try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

$record = $stmt->fetch(PDO::FETCH_ASSOC);

// 画像の位置
$file_path = "./gear_images/{$record['gear_image']}";


// var_dump($record);
// exit();

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pack to go（編集画面）</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style2.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<header>
    <h1>registration（編集画面）</h1>
</header>

<body>
    <div class="registration_area">
        <form action="packtogo_update.php" method="POST" enctype="multipart/form-data">

            <div class="gear_list_link">
                <a href="packtogo_read.php">一覧画面</a>
            </div>
            <div class="gear_name_form">
                <p>ギアの名称</p>
                <input type="text" id="gear_name" name="gear_name" value="<?= $record['gear_name'] ?>">
            </div>
            <div class="gear_image_form">
                <p>ギア画像</p>
                <!-- 既存の画像ファイル名 -->
                <!-- <p><?= $record['gear_image'] ?></p> -->
                <!-- 既存の画像表示 -->
                <img src='<?= $file_path ?>' alt='Gear Image' class='gear_image'>
                <input type="file" id="imageUpload" accept="image/*" name="gear_image">
            </div>

            <div class="gear_gram">
                <p>ギアの重さ</p>

                <input type="number" id="gram" name="gear_gram" value="<?= $record['gear_gram'] ?>">
            </div>
            <div class="gear_kind">
                <p>ギアの種類</p>
                <select name="gear_kind" id="gear_kind" class="gear_kind">
                    <option value="head_gear" <?= ($record['gear_kind'] === 'head_gear') ? 'selected' : '' ?>>head gear</option>
                    <option value="base_layer" <?= ($record['gear_kind'] === 'base_layer') ? 'selected' : '' ?>>base layer</option>
                    <option value="middle_layer" <?= ($record['gear_kind'] === 'middle_layer') ? 'selected' : '' ?>>middle layer</option>
                    <option value="outer" <?= ($record['gear_kind'] === 'outer') ? 'selected' : '' ?>>outer</option>
                    <option value="bottoms" <?= ($record['gear_kind'] === 'bottoms') ? 'selected' : '' ?>>bottoms</option>
                    <option value="shoes" <?= ($record['gear_kind'] === 'shoes') ? 'selected' : '' ?>>shoes</option>
                    <option value="backpack" <?= ($record['gear_kind'] === 'backpack') ? 'selected' : '' ?>>backpack</option>
                    <option value="other" <?= ($record['gear_kind'] === 'other') ? 'selected' : '' ?>>other</option>
                </select>
            </div>
            <div class="gear_text">
                <p>ギアの説明</p>
                <textarea id="text_area" name="gear_text"><?= $record['gear_text'] ?></textarea>
            </div>
            <div>
                <input type="hidden" name="id" value="<?= $record['id'] ?>">
                <input type="hidden" name="existing_gear_image" value="<?= $record['gear_image'] ?>">
            </div>
            <div class="registration_button">
                <button>更新</button>
            </div>

        </form>
    </div>
</body>

</html>