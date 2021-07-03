<?php
// session_start();

//ページタイトル
$page_title = "ログインページ";
//ページサブタイトル
$page_subtitle = "ログイン";

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $page_title ?></title>
    <link href="css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="css/range.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="img/arsenal_logo.png">

    <style>
        div{padding: 10px;font-size:16px;}
    </style>
</head>

<body id="main">
  <!-- Head[Start] -->
  <header>
    <nav class="navbar navbar-default">
        <style type="text/css">
            .navbar-default{
            background-image: url("img/arsenal_image.jpg");
            /* background-size: cover; */
            background-position: center 55%;
            border-color:initial;
            }
        </style>
        
        <div class="container-fluid">
            <div class="navbar-header">
                <div class="navbar-brand"><span><?= $page_subtitle ?></sapn></div>
            </div>
        </div>
    </nav>
  </header>
  <!-- Head[End] -->

<div class="l_container">
  <form method="post" action="login_act.php" name="" onsubmit="return Check()">
    <div class="form-group">
    <fieldset style="margin:20px">
      <legend>ログイン</legend>
      <label>ID：<input type="text" class="form-control" name="l_id" placeholder=""></label><br>
      <label>PW：<input type="text" class="form-control" name="l_pw" placeholder=""></label><br>
      <input type="submit" value="ログイン" class="btn btn-primary">
      <!-- <input type="hidden" name="token" value="<?=h($_SESSION['token']); ?>"> -->
      </fieldset>
    </div>
  </form>
</div>