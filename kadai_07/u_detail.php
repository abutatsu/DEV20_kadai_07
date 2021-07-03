<?php
// ***********
// データの更新
// ***********

//------------------------共通[START]------------------------

session_start();

//共通使用関数の読込
require('sample_php/functions.php');

// DB接続
$pdo = connect_db();

//トークンの作成
// createToken();

//トークンの検証
// if ($_SERVER['REQUEST_METHOD'] === 'POST'){
//   validateToken();
// }

//ヘッダーと左カラムにユーザー情報表示
list($msg,$link,$pName,$pAge,$pImg) =logincheckB();

//ページタイトル
$page_title = "ARSENAL USER PROFILE";
//ページサブタイトル
$page_subtitle = "プロフィール更新";
//headerの読込
include('sample_php/_header.php');

//------------------------共通[END]------------------------

logincheck();

//1. GETデータ取得
//まず前のphpからデーターを受け取る（この受け取ったデータをもとにbindValueと結びつけGET
$id = $_SESSION["id"];
 
 //３．データ登録SQL作成 //ここにカラム名を入力する
    //xxx_table(テーブル名)はテーブル名を入力します
    $sql =  "SELECT * FROM arsenal_user_table WHERE id=:id";
    $stmt = $pdo->prepare($sql);//SQL文をセットして実行準備
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
    $status = $stmt->execute();

    if ($status==false) {
        //execute（SQL実行時にエラーがある場合）
        $error = $stmt->errorInfo();
        exit("ErrorQuery:".$error[2]);
    } else {
        //１データのみ抽出の場合はwhileループで取り出さない(一個しかデータが返ってこないので一レコード取得する)
        $row = $stmt->fetch();//()に何も入れない場合はfetchAll(PDO::FETCH_BOTH)と同じ。配列からカラム名と連番を取得。
        
    }

?>

  <!-- Main[Start] $view-->
<div id="main_contents">
  <div class="left_container">
    <div class="iconArea" style="background-image: url('img/icon_back.jpg')">
      <div class="user_icon">
        <img src="<?=$pImg?>" class="">
      </div>
      <p class="pName"><?=$pName."さん"?><br /><?=$pAge."歳"?></p>
      <form method="get" action="profile.php" name="">
        <input type='hidden' name="id" value="<?=$_SESSION['id']?>">
        <input type="submit" value="プロフィール">
      </form>
    </div>
    <div class="linkArea">
      <p>リンク</p>
      <a href="https://www.arsenal.com/">アーセナル公式</a>
      <a href="https://www.goal.com/jp/%E3%83%81%E3%83%BC%E3%83%A0/%E3%82%A2%E3%83%BC%E3%82%BB%E3%83%8A%E3%83%AB/4dsgumo7d4zupm2ugsvm4zm4d">
      Goal.com</a>
    </div>
  </div>
  
  <div class="right_container">
  <div class="main">
  <form method="post" action="u_update.php" enctype="multipart/form-data">
    <div class="form-group">
    <fieldset style="margin:20px">
      <legend>ユーザー情報の修正</legend>
      <label>名　前：<input type="text" class="form-control" name="u_name" value="<?=$row['u_name'] ?>"></label><br>
      <label>年　齢：<input type="text" class="form-control" name="u_age" value="<?=$row['u_age'] ?>"></label><br>
      <label>好きな選手：<input type="text" class="form-control" name="u_player"  value="<?=$row['u_player'] ?>"></label><br>
      <label>コメント：<textArea name="u_comment" class="form-control" rows="4" cols="40"><?=$row['u_comment'] ?></textArea></label><br>
      <input type="submit" value="送信" class="btn btn-primary">
      <!-- <input type="hidden" name="token" value="<?=h($_SESSION['token']); ?>"> -->
      <input type="hidden" name="id" value='<?=$row["id"]?>'>
      </fieldset>
    </div>
  </form>
  </div>
</div>
  <!-- Main[End] -->
  </body>
</html>