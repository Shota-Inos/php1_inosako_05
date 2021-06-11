<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>フォーム</title>
</head>

<body>
    <form method="post" action="insert.php">
        <div class="jumbotron">
            <fieldset>
                <legend> データ登録</legend>
                <label >名前：<input type="text" name="name"></label><br>
                <label >Email：<input type="text" name="email"></label><br>
               <label><textarea name="naiyou"  cols="40" rows="4"></textarea></label><br><br>
               <label>
                    <input type="radio" name="hand" value="グー" checked>グー
                </label>
                <label>
                    <input type="radio" name="hand" value="チョキ" checked>チョキ
                </label>
                <label>
                    <input type="radio"  name="hand" value="パー" checked>パー
                </label><br><br>

               <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
    <a href="select.php" class="navbar-brand">じゃんけん勝負へ</a>

</body>
</html>