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

function check_session_id()
{
    if (!isset($_SESSION["session_id"]) || $_SESSION["session_id"] !== session_id()) {
        header('Location:packtogo_login.php');
        exit();
    } else {
        session_regenerate_id(true);
        $_SESSION["session_id"] = session_id();
    }
}
