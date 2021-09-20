<!-- XSS対策用functionを定義 -->
<?php

function h($value) {
    return htmlspecialchars($value , ENT_QUOTES);
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>post.php</title>

<!-- jqueryを読み込み -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- CSSをリセット -->
<link rel="stylesheet" type="text/css" href="css/reset.css">


</head>

<header>
<p>index</p>
</header>

<body>

    <ul>
        <li><p><a href="post.php">会員登録する</a></p></li>
        <li><p><a href="read.php">会員登録データの閲覧</a></p></li>
    </ul>

</body>

</html>



<!-- CSS -->
<style type="text/css">

header{
    font-size: larger;
    margin: 20px 20px 40px 20px;
}


.dt_1{
    width: 150px;
}


.dt_2{
    width: 320px;
}

dl{
    display: flex;
}


li{
    margin: 20px 20px 20px 20px;
}

body{
    margin: 20px 0 20px 20px;
}


</style>


<?php
// 取得したプロフィールをローカルファイルに保存する
$file = fopen('./data/data.txt', 'a' ); //ファイルOPEN
fwrite( $file, $str ); //書込みです
fclose( $file ); //ファイル閉じる
?>