<?php
try {
    $pdo = new PDO('mysql:dbname=gs_db2;charset=utf8;host=localhost','root','root');
} catch (PDOException $e){
    exit('DbConnectError:' .$e->getMessage());
}

//データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_an_table");
$status = $stmt->execute();

//データ表示
$view="";
if($status==false){
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);

}else{
    //selectでとってくるデータの数だけ、ループする
    //毎回、$rusultに入る
    while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
        $view .= "<p>" .$result["id"]."-".$result["name"]."-".$result["hand"]. "</p>"; //.= 変数の前に入っていたら、上書きしない
        $hand = $result["hand"];
    }
}


$hands = ['グー', 'チョキ', 'パー'];

// PCの手をランダムで選択
$key = array_rand($hands);
$pcHand = $hands[$key];

// 勝敗を判定
if ($hand == $pcHand) {
    $goal ='あいこ';
} elseif ($hand == 'グー' && $pcHand == 'チョキ') {
    $goal = '勝ち';
} elseif ($hand == 'チョキ' && $pcHand == 'パー') {
    $goal = '勝ち';
} elseif ($hand == 'パー' && $pcHand == 'グー') {
    $goal = '勝ち';
} else {
    $goal = '負け';
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>フォームの表示</title>
</head>
<body id="main">
    <header>
        <div class="data">
        <h2 class="data_title">登録されているデータ</h2>
        </div>
    </header>

    <div class="data_list">
        <?=$view?>
    </div>

    <div class="result"><br>
    <h2 class="result_title">じゃんけんの結果</h2>
        <div class="result_myhand">
            あなたの選んだ手は、、、
            <?=$hand?>
        </div>
        <div class="result_myhand">
            相手が選んだ手は、、、
            <?=$pcHand?>
        </div>

        <div class="result_goal">
            じゃんけんの結果は、、、
            <?=$goal?>

        </div>
    </div>
    <div class="footer"><br>
    <a href="index.php" class="navbar-brand">データ登録へ戻る</a>
    </div>
</body>
</html>