<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>todoリストユーザ登録画面</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style2.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
  <header>
    <h1>アカウント登録</h1>
  </header>
  <div class="registration_area">
    <form action="packtogo_register_act.php" method="POST">

      <div class="gear_name_form">
        username: <input type="text" name="username">
      </div>
      <div class="gear_name_form">
        password: <input type="text" name="password">
      </div>
      <div class="gear_name_form">
        身長: <input type="text" name="height">
      </div>
      <div class="gear_name_form">
        体重: <input type="text" name="weight">
      </div>
      <div class="gear_kind">
        <p>権限</p>
        <select name="is_admin" class="gear_kind">
          <option value="1">管理</option>
          <option value="0">一般</option>
        </select>
      </div>
      <div class="registration_button">
        <button>登録</button>
      </div>
      <div class="registration_button">
        <a href="packtogo_login.php">ログイン画面に戻る</a>
      </div>
    </form>
  </div>
</body>

</html>