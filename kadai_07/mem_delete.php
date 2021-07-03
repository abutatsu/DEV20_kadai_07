<?php

session_start();
require('sample_php/functions.php');

logincheck();
$pdo = connect_db();
createToken();

$id = $_GET["id"];

//３．データ登録SQL作成 //ここにカラム名を入力する
//xxx_table(テーブル名)はテーブル名を入力します
$sql =  "DELETE FROM arsenal_member_table WHERE id=:id";

$stmt = $pdo->prepare($sql);

$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();//execute→実行しますという関数。全てのデータが$statusに入る

//４．データ登録処理後
if ($status==false) {
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
} else {
    //５．index.phpへリダイレクト 書くときにLocation: in この:　のあとは半角スペースがいるので注意！！
    header("Location: index.php");
    exit;
}

