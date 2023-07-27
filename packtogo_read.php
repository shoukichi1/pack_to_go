<?php
session_start();
include('functions.php');
check_session_id();

// DB接続
$pdo = connect_to_db();

// SQL作成&実行
// $sql = 'SELECT * FROM gear_table WHERE deleted_at IS NULL ORDER BY created_at DESC';
$sql = 'SELECT
  *
FROM
  gear_table
  LEFT OUTER JOIN
    (
      SELECT
        gear_id,
        COUNT(id) AS like_count
      FROM
        like_table
      GROUP BY
        gear_id
    ) AS result_table
  ON  gear_table.id = result_table.gear_id WHERE deleted_at IS NULL ORDER BY created_at DESC';

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

$user_id = $_SESSION['user_id'];

$output = "";
foreach ($result as $record) {
    // 画像ファイルのパスを指定
    $file_path = "./gear_images/{$record['gear_image']}";

    // HTMLに出力
    $output .= "
    <tr>
        <td>{$record['gear_name']}</td>
        <td><img src='{$file_path}' alt='Gear Image' class='gear_image'></td>
        <td>{$record['gear_kind']}</td>
        <td>{$record['gear_gram']}</td>
        <td>{$record['gear_text']}</td>
        <td><a href='like_create.php?user_id={$user_id}&gear_id={$record["id"]}'>like{$record["like_count"]}</a></td>";
    if ($_SESSION['is_admin'] === 1) {
        $output .= "<td><a href='packtogo_edit.php?id={$record["id"]}'>edit</a></td>
      <td><a href='packtogo_delete.php?id={$record["id"]}'>delete</a></td>";
    }
    $output .= "
    </tr>
  ";
}





?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gear_list（一覧画面）</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style2.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>



<body>
    <header>
        <h1>gear_list（リスト）</h1>
    </header>

    <div class="gear_read_area">
        <div class="gear_list_link">
            <p>ようこそ！<?= $_SESSION['username'] ?>さん</p>
            <a href="packtogo_logout.php">ログアウト</a>
        </div>
        <div class="gear_list_link">
            <a href="packtogo_input.php">ギア登録</a>
            <a href="equipment_create.php">装備作成</a>
        </div>

        <table class="gear_read_table">
            <thead>
                <tr>
                    <th>gear_name </th>
                    <th>gear_image </th>
                    <th>gear_kind </th>
                    <th>gear_gram </th>
                    <th>gear_text </th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
                <?= $output ?>
            </tbody>
        </table>

    </div>

    <script>
        const result = <?= json_encode($result) ?>;
        console.log(result);
    </script>
</body>

</html>