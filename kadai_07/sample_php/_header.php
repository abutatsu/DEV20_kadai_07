<?PHP

// if (isset($_SESSION['chk_ssid'])) {//ログインしているとき
//     $P_log = '../kadai_07/l_index.php';
// } else {//ログインしていない時
//     $P_log = '../kadai_07/index.php';
// }

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $page_title ?></title>
    <link href="css/jquery.simpleTicker.css" rel="stylesheet">
    <link rel="stylesheet" href="css/range.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="img/arsenal_logo.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/jquery.simpleTicker.js"></script>


    <style>
        div{padding: 10px;font-size:16px;}
        #fav-table th {
            background-color:#ff9999;
        }
        .sorter-false {
            background-image: none;
        }
    </style>
</head>

<body id="main">
  <!-- Head[Start] -->
  <header>
  
    <div class="main_nav">
            <div class="left_nav">
                <p style="margin:initial;">Come on Arsenal!</p>
                <ul id="nav5" style="margin:initial;">
                    <li><a href="../kadai_07/index.php">PLAYER</a></li>
                    <li><a href="../kadai_07/transfer.php">TRANSFER LIST</a></li>
                </ul>
            </div>
            <div class="userinfo">
                <img src="<?=$pImg?>" alt="">
                <span><?=$msg?></span>
                <?='　'?>
                <div class="login_info">
                    <?=$link?>
                </div>
            </div>
    </div>
        
        <nav class="navbar navbar-default">
            <div id="header_inner">
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
        </div>
        </nav>
    
  </header>
  <!-- Head[End] -->
