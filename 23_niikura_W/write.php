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
        <p>以下で会員登録をしました</p>
    </header>

    <body>

        <?php

            //POSTの受け取りは$_POST["input名"];
            $fname = $_POST["fname"];
            $lname = $_POST["lname"];

            $mail1 = $_POST["mail1"];
            $mail2 = $_POST["mail2"];

            $address1 = $_POST["address1"];
            $address2 = $_POST["address2"];
            $address3 = $_POST["address3"];
            $address4 = $_POST["address4"];

            $phone = $_POST["phone"];
            // 電話番号にハイフンを挿入する
            $phone_hyoji = mb_substr($phone, 0, 3).'-'.mb_substr($phone, 3, -4).'-'.mb_substr($phone, 7, 9);

            // 取得したプロフィールを配列に保存する
            $profile = [$fname, $lname, $mail1, $mail2,$address1, $address2, $address3, $address4, $phone,$phone_hyoji];

            // 書き込み用のCSVデータの作成
                for ($i = 0; $i < count($profile); $i++) {
                    $str = $str.','.$profile[$i];
                }
                $str = mb_substr($str,1)."\n";


        ?>

        <ul>
            <li>
                <dl>
                    <dt class="dt_2">名前:</dt>
                    <dd><p><?=h($profile[0].' '.$profile[1])?></p></dt>
                </dl>                
            </li>
            <li>
                <dl>
                    <dt class="dt_2">メール:</dt>
                    <dd><p><?=h($profile[2].'@'.$profile[3])?></p></dt>
                </dl>
            </li>
            <li>
                <dl>
                    <dt class="dt_1">住所：</dt>
                    <dd>
                        <ul>
                            <li>
                                <dl>
                                    <dt class="dt_1">都道府県:</dt>
                                    <dd><p><?=h($profile[4].' '.$profile[5])?></p></dt>
                                </dl>
                            </li>
                            <li>
                                <dl>
                                    <dt class="dt_1">丁目:</dt>
                                    <dd><p><?=h($profile[6])?></p></dt>
                                </dl>
                            </li>
                            <li>
                                <dl>
                                    <dt class="dt_1">マンション:</dt>
                                    <dd><p><?=h($profile[7])?></p></dt>
                                </dl>
                            </li>
                        </ul>
                    </dd>
                </dl>
            </li>
            <li>
                <dl>
                    <dt class="dt_2">電話番号:</dt>
                    <dd><p><?=h($profile[9])?></p></dt>
                </dl>                
            </li>
        </ul>

        <ul>
            <li><p><a href="index.php">TOPに戻る</a></p></li>
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