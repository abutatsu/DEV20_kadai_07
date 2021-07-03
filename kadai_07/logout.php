<?php
//必ずsession_startは最初に記載
session_start();

//SESSIONを初期化(空っぽにする)
$_SESSION = array();

//Cookieに保存してある”SessionIDの保存期間を過去にして破棄
if (isset($_COOKIE[session_name()])){ //session_name()はセッションID名を返す関数
    setcookie(session_name(),'',time()-4200,'/');
}

//サーバ側でのセッションIDの破棄
session_destroy();

//処理後リダイレクト
header("Location: index.php");
exit();


?>