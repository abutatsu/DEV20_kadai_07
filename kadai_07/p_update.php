<?php
// **********************
// プロフィール写真の更新アップロード
// **********************

session_start();
require('sample_php/functions.php');

logincheck();
$pdo = connect_db();
createToken();

//入力チェック
if(
    !isset($_POST["id"]) || $_POST["id"] =="" 
){
    exit('ParamError');
}

//ファイル受信チェック
if(
    !isset($_FILES["u_img"]["name"]) || $_FILES["u_img"]["name"] ==""
){
    exit('ParamError!Files!');
}

//1. POSTデータ取得
//まず前のphpからデーターを受け取る（この受け取ったデータをもとにbindValueと結びつけGET
$u_img = $_FILES["u_img"]["name"];
$id = $_POST["id"];

//1-2.Fileupload処理
// $upload =;//画像アップロードファイルへのパス
//アップロードした画像をimgに移動させる記述
if(move_uploaded_file($_FILES["u_img"]["tmp_name"],"img/".$u_img)){//第一引数に「一時保存のパス」を指定、第二引数に「保存したいディレクトリ名/ファイル名」を指定
    //fileupload:OK
    echo "Successfully uploaded";
}else{
    //fileupload:NG
    echo "Upload failed";
    echo $_FILES['u_img']['error'];
    var_dump($_FILES['u_img']);
}

//2．データ登録SQL作成 //ここにカラム名を入力する
$sql =  "UPDATE arsenal_user_table SET u_img=:u_img WHERE id=:id";
$stmt = $pdo->prepare($sql);


$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':u_img', $u_img, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();//execute→実行しますという関数。全てのデータが$statusに入る

//セッションに更新したデータを代入
if($id !=""){
    $_SESSION["chk_ssid"] = session_id();
    $_SESSION["u_img"] = $u_img;
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
