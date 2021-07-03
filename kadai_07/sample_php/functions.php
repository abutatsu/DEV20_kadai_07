<?php
//共通で使うものを別ファイルにしておきましょう。

// DB接続関数
function connect_db(){
  try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');//
  } catch (PDOException $e) {
    exit('データベースに接続できませんでした。'.$e->getMessage());
  }
  
  // try {
  // $pdo = new PDO('mysql:dbname=goldcat587_arsenal_db;charset=utf8;host=mysql1036.db.sakura.ne.jp','goldcat587','ta2ya28_2612');//
  // } catch (PDOException $e) {
  //   exit('データベースに接続できませんでした。'.$e->getMessage());
  // }

  return $pdo;
}

//htmlspecialchars
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES,'UTF-8');
}

//ログインチェック関数
function logincheck(){
  if(
  !isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"] != session_id()
  ){
  echo"LOGIN Error! ログインでご利用出来ます。";
  echo "<br/>";
  echo "<a href='../kadai_07/index.php'>TOPへ戻る</a>";
  exit();
  }else{
    session_regenerate_id(true);//新しいセッションIDを発行
    $_SESSION["chk_ssid"] = session_id();
  }
}


function logincheckB(){
  if (isset($_SESSION['chk_ssid'])) {//ログインしているとき
      $msg = 'Hello！' . h($_SESSION['u_name'], \ENT_QUOTES, 'UTF-8') . 'さん';
      $link = '<button><a href="logout.php">ログアウト</a></button>';
      $pName = h($_SESSION['u_name']);
      $pAge = h($_SESSION['u_age']);
      $pImg = "img/". h($_SESSION['u_img']);
  } else {//ログインしていない時
      $msg = 'ログインしていません';
      $link = '<button><a href="login.php">ログイン</a></button>';
      $pName = 'ゲスト';
      $pAge = '?';
      $pImg = 'http://placehold.jp/a6a6ab/ffffff/160x160.png?text=no%20image';
  }
  return [$msg,$link,$pName,$pAge,$pImg];

}

//CSRF対策

function random($length = 16)
{
    return substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz'), 0, $length);
}

function createToken(){
  if (!isset($_SESSION['token'])){
    $_SESSION['token'] =random();
  }
}

function validateToken() {
    if(
        empty($_SESSION['token']) ||
        $_SESSION['token'] !== filter_input(INPUT_POST,'token')
    ){
        exit('Invalid post request');
    }
}



?>



