<?php
// ***********
// 移籍データの更新
// ***********

//------------------------共通[START]------------------------

session_start();

//共通使用関数の読込
require('sample_php/functions.php');

// DB接続
$pdo = connect_db();

//トークンの作成
createToken();

//トークンの検証
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
  validateToken();
}

//ヘッダーと左カラムにユーザー情報表示
list($msg,$link,$pName,$pAge,$pImg) =logincheckB();

//ページタイトル
$page_title = "ARSENAL MEMBER LIST";
//ページサブタイトル
$page_subtitle = "在籍メンバー更新";
//headerの読込
include('sample_php/_header.php');

//------------------------共通[END]------------------------

logincheck();

//1. GETデータ取得
//まず前のphpからデーターを受け取る（この受け取ったデータをもとにbindValueと結びつけGET
$id = $_GET["id"];

 //３．データ登録SQL作成 //ここにカラム名を入力する
    //xxx_table(テーブル名)はテーブル名を入力します
    $sql =  "SELECT * FROM arsenal_transfer_table WHERE id=:id";
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
  <div class="main">
    <p class="detail_text">
      <?="『".$row['name']."』のデータ修正中..."?>
    </p>
  </div>

  <div class="left-navi">
  <form method="post" action="trf_update.php">
    <div class="form-group">
    <fieldset style="margin:20px">
      <legend>登録情報の修正</legend>
      <label>名　前：<input type="text" class="form-control" name="name" value="<?=$row['name'] ?>"></label><br>
      <label>国　籍：<input type="text" class="form-control" name="country" value="<?=$row['country'] ?>"></label><br>
      <label>誕生日：<input type="date" class="form-control" name="birth"  value="<?=$row['birth'] ?>"></label><br>
      <label>交渉価格(万€)：<input type="text" class="form-control" name="value" value="<?=$row['value'] ?>"></label><br>
      <label>ポジション：
        <select name= "position">
          <option value = "FW">FW</option>
          <option value = "MF">MF</option>
          <option value = "DF">DF</option>
          <option value = "GK">GK</option>
        </select>
      </label><br>
      <label>コメント：<textArea name="comment" class="form-control" rows="4" cols="40"></textArea></label><br>
      <input type="submit" value="送信" class="btn btn-primary">
      <!-- <input type="hidden" name="token" value="<?=h($_SESSION['token']); ?>"> -->
      <input type="hidden" name="id" value='<?=$row["id"]?>'>
      </fieldset>
    </div>
  </form>
  </div>

  <!-- Main[End] -->

  </body>
</html>