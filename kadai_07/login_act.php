<?php
session_start();
require('sample_php/functions.php');


$pdo = connect_db();

$l_id = $_POST['l_id'];
$l_pw = $_POST['l_pw'];

$stmt = $pdo->prepare("SELECT * FROM arsenal_user_table WHERE u_id = :l_id AND u_pw = :l_pw" );
$status = $stmt->execute();

$stmt->bindValue(':l_id', $l_id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':l_pw', $l_pw, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();//execute→実行しますという関数。全てのデータが$statusに入る

//データ登録処理後
if ($status==false) {
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
}

//抽出データ数を取得
$val = $stmt->fetch();//1レコードだけ取得

//該当レコードがあればSESSIONに値を代入
if($val["id"] !=""){
    $_SESSION["chk_ssid"] = session_id();
    $_SESSION["u_name"] = $val['u_name'];
    $_SESSION["id"] = $val['id'];
    $_SESSION["u_age"] = $val['u_age'];
    $_SESSION["u_img"] = $val['u_img'];
    header("Location: index.php");
    exit();
}else{
    header("Location: login.php");
}

exit();



?>

