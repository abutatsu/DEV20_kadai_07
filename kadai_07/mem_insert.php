<?php

session_start();
require('sample_php/functions.php');

logincheck();
$pdo = connect_db();
createToken();

//入力チェック
if(
    !isset($_POST["number"]) || $number = $_POST["number"] =="" ||
    !isset($_POST["name"]) || $name = $_POST["name"] =="" ||
    !isset($_POST["birth"]) || $birth = $_POST["birth"] =="" ||
    !isset($_POST["country"]) || $country = $_POST["country"] =="" ||
    !isset($_POST["position"]) || $position = $_POST["position"] =="" ||
    !isset($_POST["value"]) || $value = $_POST["value"] =="" 
){
    exit('ParamError');
}

//1. POSTデータ取得
//まず前のphpからデーターを受け取る（この受け取ったデータをもとにbindValueと結びつけるため）
$number = $_POST["number"];
$name = $_POST["name"];
$country = $_POST["country"];
$birth = $_POST["birth"];
$position = $_POST["position"];
$value = $_POST["value"];
$comment = $_POST["comment"];
$age = "TIMESTAMPDIFF(YEAR, `birth`, CURDATE())";


//３．データ登録SQL作成 //ここにカラム名を入力する
//xxx_table(テーブル名)はテーブル名を入力します
$sql =  "INSERT INTO arsenal_member_table(id,number, name,  country, birth, age,
position,value,comment )VALUES(NULL,:number, :name, :country, :birth,$age, :position, :value, :comment)";

$stmt = $pdo->prepare($sql);

$stmt->bindValue(':number', $number, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':country', $country, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':birth', $birth, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':position', $position, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':value', $value, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
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
