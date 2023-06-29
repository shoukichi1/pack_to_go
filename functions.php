<?php

function connect_to_db()
{

    // 各種項目設定
    $dbn = 'mysql:dbname=pack_to_go_ver1;charset=utf8mb4;port=3306;host=localhost';
    $user = 'root';
    $pwd = '';

    // DB接続
    try {
        return new PDO($dbn, $user, $pwd);
    } catch (PDOException $e) {
        echo json_encode(["db error" => "{$e->getMessage()}"]);
        exit();
    }
}
