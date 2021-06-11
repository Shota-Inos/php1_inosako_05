<?php

if(
    !isset($_POST["name"]) || $_POST["name"]=="" ||
    !isset($_POST["email"]) || $_POST["email"]=="" ||
    !isset($_POST["naiyou"]) || $_POST["naiyou"]=="" ||
    !isset($_POST["hand"]) || $_POST["hand"]=="" 
){
    exit('ParamError');
}

//postデータの取得
$name = $_POST["name"];
$email = $_POST["email"];
$naiyou = $_POST["naiyou"];
$hand = $_POST["hand"];

//DB接続
try {
    $pdo = new PDO('mysql:dbname=gs_db2;charset=utf8;host=localhost','root','root');
} catch (PDOException $e){
    exit('DbConnectError:' .$e->getMessage());
}

//データ登録SQL作成
$sql="INSERT INTO gs_an_table(id, name, email, naiyou, hand, indate )VALUES( NULL, :a1, :a2, :a3, :a4, sysdate())";

$stmt = $pdo->prepare($sql);

$stmt->bindValue(':a1', $name, PDO::PARAM_STR); //数値の場合は、INT
$stmt->bindValue(':a2', $email, PDO::PARAM_STR);
$stmt->bindValue(':a3', $naiyou, PDO::PARAM_STR);
$stmt->bindValue(':a4', $, PDO::PARAM_STR);
$status = $stmt->execute();

//データ登録処理
if($status==false){
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);

}else{
    header("Location: index.php");
    exit;

}
?>

