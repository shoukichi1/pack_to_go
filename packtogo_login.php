<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ログイン画面</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style2.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
  <header>
    <h1>pack to go login</h1>
  </header>
  <div class="background">
  </div>
  <div class="registration_area">
    <form action="packtogo_login_act.php" method="POST">

      <div class="gear_name_form">
        username: <input type="text" name="username">
      </div>
      <div class="gear_name_form">
        password: <input type="text" name="password">
      </div>
      <div class="registration_button">
        <button>Login</button>
      </div>
    </form>
  </div>

</body>

</html>