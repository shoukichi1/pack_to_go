<?php
session_start();
include('functions.php');
check_session_id();

// DB接続
$pdo = connect_to_db();

// headgearをセレクトボックス内にデータ入れる
// SQL作成&実行
$sql = 'SELECT * FROM gear_table WHERE deleted_at IS NULL ORDER BY created_at DESC';

$stmt = $pdo->prepare($sql);


// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

// SQL実行の処理
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>';
// var_dump($result);
// echo '</pre>';


// それぞれのgear_kindごとにセレクトボックスを作成
$gearsByKind = [];
foreach ($result as $record) {
    $gearsByKind[$record['gear_kind']][] = $record;
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipment Create</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style2.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <header>
        <h1>equipment create（装備作成）</h1>
    </header>
    <div class="gear_list_link registration_area">
        <a href="packtogo_read.php">一覧画面</a>
    </div>
    <?php foreach ($gearsByKind as $kind => $gears) : ?>
        <div class="gear_kind registration_area">
            <select class='gear-select' data-kind='<?= $kind ?>'>
                <option value='' data-image=''>選択してください</option>
                <?php foreach ($gears as $gear) : ?>
                    <option value='<?= $gear['gear_gram'] ?>' data-image='./gear_images/<?= $gear['gear_image'] ?>'><?= $gear['gear_name'] ?></option>
                <?php endforeach; ?>
            </select>
            <div class="gear-info">
                <img src="" alt="Gear Image" class="gear_image">
                <div class="gear_gram"></div>
            </div>
        </div>
    <?php endforeach; ?>
    <div class="total-gram registration_area">Total gram: 0g</div>
    <script>
        $(document).ready(function() {
            $('.gear-select').change(function() {
                let selectedOption = $(this).find('option:selected');
                let gearImage = selectedOption.data('image');
                let gearGram = selectedOption.val();
                $(this).siblings('.gear-info').find('.gear_image').attr('src', gearImage);
                $(this).siblings('.gear-info').find('.gear_gram').text(gearGram + 'g');
                let totalGram = 0;
                $('.gear-select').each(function() {
                    let gram = $(this).find('option:selected').val();
                    if (gram) {
                        totalGram += parseInt(gram);
                    }
                });
                $('.total-gram').text('Total gram: ' + totalGram + 'g');
            });
        });
    </script>
</body>


</html>