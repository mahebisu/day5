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
        <p>会員データ</p>
        </header>

    <body>
        <section>

            <table id="table">
                <tr>
                    <th>姓</th>
                    <th>名</th>
                    <th>メール（前）</th>
                    <th>メール（後）</th>
                    <th>都道府県</th>
                    <th>市区町村</th>
                    <th>丁目番地</th>
                    <th>マンション</th>
                    <th>電話番号</th>
                    <th>電話番号（-）</th>
                </tr>

                <?php

                    // ファイルを開く
                    $openFile = fopen('data/data.txt', 'r');

                    // ファイル内容を1行ずつ読み込んで出力
                    while ($str = fgets($openFile)) {

                        // 行末の\nを削除
                        $str = str_replace('\n', '', $str);

                        // ,ごとに配列に保管
                        $profile_read = explode(",", $str );

                        $p0 = $profile_read[0];
                        $p1 = $profile_read[1];
                        $p2 = $profile_read[2];
                        $p3 = $profile_read[3];
                        $p4 = $profile_read[4];
                        $p5 = $profile_read[5];
                        $p6 = $profile_read[6];
                        $p7 = $profile_read[7];
                        $p8 = $profile_read[8];
                        $p9 = $profile_read[9];

                        $row = <<<EOM
                            <tr>
                                <td>$p0</td>
                                <td>$p1</td>
                                <td>$p2</td>
                                <td>$p3</td>
                                <td>$p4</td>
                                <td>$p5</td>
                                <td>$p6</td>
                                <td>$p7</td>
                                <td>$p8</td>
                                <td>$p9</td>
                            </tr>
                        EOM;

                        echo $row;

                    }

                    // ファイルを閉じる
                    fclose($openFile);

                    ?>

            </table>

        </section>

        <ul>
            <li><p><a href="index.php">TOPに戻る</a></p></li>
            <li><p><a href="post.php">会員登録データの登録</a></p></li>
        </ul>

    </body>

</html>



<!-- CSS -->
    <style type="text/css">

        html{
            margin:20px 20px 20px 20px;
        }

        section{

            margin:0 0 20px 0;
        }

        tr{
            width:100%;
        }

        td,th{
            align-items:center;
            border:1px solid;
            width:10%;
            height:20px;
            padding:10px 0 0 0;
            
        }
        
        


    </style>

