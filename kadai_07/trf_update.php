<?php
// **********************
// データの更新アップロード
// **********************

session_start();
require('sample_php/functions.php');

logincheck();
$pdo = connect_db();
createToken();

//1. POSTデータ取得
//まず前のphpからデーターを受け取る（この受け取ったデータをもとにbindValueと結びつけGET
$id = $_POST["id"];
$name = $_POST["name"];
$country = $_POST["country"];
$birth = $_POST["birth"];
$position = $_POST["position"];
$value = $_POST["value"];
$comment = $_POST["comment"];
$age = "TIMESTAMPDIFF(YEAR, `birth`, CURDATE())";


//2．データ登録SQL作成 //ここにカラム名を入力する
$sql =  "UPDATE arsenal_transfer_table SET indate=sysdate(), name=:name,  country=:country, birth=:birth, age=$age,
position=:position,value=:value,comment=:comment WHERE id=:id";
$stmt = $pdo->prepare($sql);


$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':country', $country, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':birth', $birth, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':position', $position, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':value', $value, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();//execute→実行しますという関数。全てのデータが$statusに入る

//３．データ表示
if ($status==false) {
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
} else {
    //５．index.phpへリダイレクト 書くときにLocation: in この:　のあとは半角スペースがいるので注意！！
    // header("Location: index.php");
    echo "データ修正完了！";
    // exit;
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="uft-8">
<meta http-equiv="refresh" content=" 1; url=transfer.php">
<link rel="shortcut icon" type="image/png" href="img/arsenal_logo.png">
<title>ページリダイレクト</title>
</head>
<body>

</body>
</html>
