<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gear_registration（入力画面）</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style2.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <header>
        <h1>registration（ギア登録）</h1>
    </header>

    <div class="registration_area">
        <form action="packtogo_create.php" method="POST" enctype="multipart/form-data">

            <div class="gear_list_link">
                <a href="packtogo_read.php">gear_list（ギアリスト）</a>
            </div>
            <div class="gear_name_form">
                <p>ギアの名称</p>
                <input type="text" id="gear_name" name="gear_name">
            </div>
            <div class="gear_image_form">
                <p>ギア画像</p>
                <input type="file" id="imageUpload" accept="image/*" name="gear_image">
            </div>

            <div class="gear_gram">
                <p>ギアの重さ</p>

                <input type="number" id="gram" name="gear_gram">
            </div>
            <div class="gear_kind">
                <p>ギアの種類</p>
                <select name="gear_kind" id="gear_kind" class="gear_kind">
                    <option value="head_gear">head gear</option>
                    <option value="base_layer">base layer</option>
                    <option value="middle_layer">middle layer</option>
                    <option value="outer">outer</option>
                    <option value="bottoms">bottoms</option>
                    <option value="shoes">shoes</option>
                    <option value="backpack">backpack</option>
                    <option value="other">other</option>
                </select>
            </div>
            <div class="gear_text">
                <p>ギアの説明</p>
                <textarea id="text_area" name="gear_text"></textarea>
            </div>
            <div class="registration_button">
                <button>登録</button>
            </div>


        </form>
    </div>



</body>

</html>