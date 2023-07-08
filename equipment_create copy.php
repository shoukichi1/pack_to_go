<?php
include('functions.php');
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

foreach ($gearsByKind as $kind => $gears) {
    echo "<select class='gear-select' data-kind='{$kind}'>";
    foreach ($gears as $gear) {
        echo "<option value='{$gear['gear_gram']}' data-image='{$gear['gear_image']}'>{$gear['gear_name']}</option>";
    }
    echo "</select>";
}

// $output = "";
// foreach ($result as $record) {
//     // gear_kindがhead_gearの場合だけ処理を行う
//     if ($record['gear_kind'] === 'head_gear') {
//         // 画像ファイルのパスを指定
//         $file_path = "./gear_images/{$record['gear_image']}";

//         // HTMLに出力
//         $output .= "
//         <tr>
//             <td>{$record['gear_name']}</td>
//             <td><img src='{$file_path}' alt='Gear Image' class='gear_image'></td>
//             <td>{$record['gear_kind']}</td>
//             <td>{$record['gear_gram']}</td>
//             <td>{$record['gear_text']}</td>
//         </tr>";
//     }
// }

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pack to go（装備作成）</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style2.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <header>
        <h1>equipment create（装備作成）</h1>
    </header>
    <table>
        <tbody>
            <!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
            <?= $output ?>
        </tbody>
    </table>

    <script>
        $('.gear-select').each(function() {
            $(this).change(function() {
                let selectedOption = $(this).find('option:selected');
                let image = selectedOption.data('image');
                let gram = $(this).val();

                // ここで image と gram を表示します
                // 例えば、以下のようにします：
                $('#selected-image').attr('src', image);
                $('#selected-gram').text(gram);

                // また、全ての gear の gram 合計を計算します
                let totalGram = 0;
                $('.gear-select').each(function() {
                    totalGram += parseInt($(this).val());
                });

                // そして、合計を表示します
                $('#total-gram').text(totalGram);
            });
        });
    </script>
</body>

</html>