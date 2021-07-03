<?php
// **********************
// データの更新アップロード
// **********************

session_start();
require('sample_php/functions.php');

logincheck();
$pdo = connect_db();
// createToken();

//入力チェック
if(
    !isset($_POST["id"]) || $_POST["id"] =="" ||
    !isset($_POST["u_name"]) || $_POST["u_name"] =="" ||
    !isset($_POST["u_age"]) || $_POST["u_age"] =="" ||
    !isset($_POST["u_player"]) || $_POST["u_player"] =="" ||
    !isset($_POST["u_comment"]) || $_POST["u_comment"] =="" 
){
    exit('ParamError');
}

//1. POSTデータ取得
//まず前のphpからデーターを受け取る（この受け取ったデータをもとにbindValueと結びつけGET
$id = $_POST["id"];
$u_name = $_POST["u_name"];
$u_age = $_POST["u_age"];
$u_player = $_POST["u_player"];
$u_comment = $_POST["u_comment"];

//2．データ登録SQL作成 //ここにカラム名を入力する
$sql =  "UPDATE arsenal_user_table SET u_name=:u_name,  u_age=:u_age, u_player=:u_player,
u_comment=:u_comment WHERE id=:id";
$stmt = $pdo->prepare($sql);


$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':u_name', $u_name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':u_age', $u_age, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':u_player', $u_player, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':u_comment', $u_comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();//execute→実行しますという関数。全てのデータが$statusに入る

//セッションに更新したデータを代入
if($id !=""){
    $_SESSION["chk_ssid"] = session_id();
    $_SESSION["u_name"] = $u_name;
    $_SESSION["u_age"] = $u_age;
}

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
<meta http-equiv="refresh" content=" 1; url=index.php">
<link rel="shortcut icon" type="image/png" href="img/arsenal_logo.png">
<title>ページリダイレクト</title>
</head>
<body>

</body>
</html>
