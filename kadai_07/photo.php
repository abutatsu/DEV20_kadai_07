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
$page_subtitle = "プロフィール";
//headerの読込
include('sample_php/_header.php');

//------------------------共通[END]------------------------

logincheck();

//1. GETデータ取得
//まず前のphpからデーターを受け取る（この受け取ったデータをもとにbindValueと結びつけGET
$id = $_SESSION["id"];
$u_age = "TIMESTAMPDIFF(YEAR, `u_birth`, CURDATE())";

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
      <form method="get" action="photo.php" name="">
        <input type='hidden' name="id" value="<?=$_SESSION['id']?>">
        <input type="submit" value="画像登録">
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
    <form method="post" action="p_update.php" enctype="multipart/form-data">
    <div class="form-group">
    <fieldset style="margin:20px">
    <legend>プロフィール画像登録</legend>
    <p class="cms-thumb"><img src="<?=$pImg ?>"
      alt="" width="160px" height="160px" style="object-fit:cover"></p>
        <label>画　像：<input type="file" class="cms-item" name="u_img" accept="image/*" value=""></label><br>
        <input type="submit" value="送信" class="btn btn-primary">
      <!-- <input type="hidden" name="token" value="<?=h($_SESSION['token']); ?>"> -->
      <input type="hidden" name="id" value='<?=$row["id"]?>'>
      </fieldset>
    </div>
  </form>
  </div>
    
   
  </div>
</div>

  <!-- Main[End] -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script>
  // -------------------
  // 画像サムネイル表示
  // -------------------
  // アップロードするファイルを選択
  $('input[type=file]').change(function(){
    // 選択したファイルを取得しfile変数に格納
    let file = $(this).prop('files')[0];
    // 画像以外は処理を停止
    if(!file.type.match('image.*')){
      // クリア
      $(this).val('');//選択されてるファイルを空にする
      $('.cms-thumb > img').html('');//画層表示箇所を空にする
      return;
    }
    //画像表示
    let reader = new FileReader();//1
    reader.onload = function(){//2
      $('.cms-thumb > img').attr('src',reader.result);
    }
    reader.readAsDataURL(file);//3
  });
  
  </script>
  </body>
</html>