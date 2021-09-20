<!-- XSS対策用functionを定義 -->
    <?php
        function h($value) {
            return htmlspecialchars($value,ENT_QUOTES);
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
        <p>会員登録</p>
    </header>

    <body>

        <!-- write.phpに送信する -->
        <form method="post" action="write.php">

            <ul>
                <li class="komoku">
                    <!-- 名前フォーム -->
                    <dl class="cf">
                        <dt class="title">
                            <ul>
                                <li>名前<span class="need">＊</span></li>
                                <li><span class="caution">フルネームを全角でご記入ください</span></li>
                            </ul>
                        </dt>
                        <dd class="data name">
                            <ul class="cf">
                                <li>姓<input class="input" maxlength="32" name="fname" type="text" placeholder="姓" style="margin-right: 10px; " required/></li>
                                <li>名<input class="input" maxlength="32" name="lname" type="text" placeholder="名" required /></li>
                            </ul>
                        </dd>
                    </dl>
                </li>

                <li class="komoku">
                    <!-- メールアドレスフォーム -->
                        <dl class="cf">
                            <dt class="title">
                                <ul>
                                    <li>メール<span class="need">＊</span></li>
                                    <li><span class="caution">メールアドレスを半角でご記入ください</span></li>
                                </ul>
                            </dt>
                            <dd class="data name">
                                <ul class="cf">
                                    <li><input class="input" maxlength="32" name="mail1" type="text" placeholder="@の前"  style="margin-right: 20px; " required/></li>
                                    <li><span>@</span></li>
                                    <li><input class="input" maxlength="32" name="mail2" type="text" placeholder="@の後" required/></li>
                                </ul>
                            </dd>
                        </dl>
                </li>

                <li class="komoku">
                    <!-- 住所フォーム -->
                        <dl class="cf">
                            <dt class="title">
                                <ul>
                                    <li>住所<span class="need">＊</span></li>
                                    <li><span class="caution">住所を全角でご記入ください</span></li>
                                </ul>
                            </dt>
                            <dd class="data">
                                <ul class="cf2">
                                    <li>都道府県<select name="address1" class="input" id = "todofuken" value="都道府県を選択してください"></select></li>
                                    <li>市区町村<input class="input" maxlength="32" name="address2" type="text" placeholder="市区町村" required/></li>
                                    <li>丁目・番・号<input class="input" maxlength="32" name="address3" type="text" placeholder="〇丁目〇番〇号" required /></li>
                                    <li>マンション名<input class="input_mansion" maxlength="64" name="address4" type="text" placeholder="マンションの場合は部屋番号も" /></li>
                                </ul>
                            </dd>
                        </dl>
                </li>

                <li class="komoku">
                    <!-- メールアドレスフォーム -->
                        <dl class="cf">
                            <dt class="title">
                                <ul>
                                    <li>電話番号<span class="need">＊</span></li>
                                    <li><span class="caution">電話番号を半角でご記入ください</span></li>
                                </ul>
                            </dt>
                            <dd class="data name">
                                <ul class="cf">
                                    <li>
                                        <input type="tel" name="phone" placeholder="電話番号を入力してください" pattern="\d{2,4}-?\d{2,4}-?\d{3,4}" maxlength="11" required />
                                    </li>
                                </ul>
                            </dd>
                        </dl>
                </li>

                <li class="komoku">
                    <!-- 送信ボタン -->
                        <p><input type="submit" value="登録"></p>
                </li>

            </ul>

        </form>

        <ul>
            <li><p><a href="index.php">TOPに戻る</a></p></li>
            <li><p><a href="read.php">会員登録データの閲覧</a></p></li>
        </ul>
    </body>

</html>

<!-- 都道府県のセレクトボックスをforで作成 -->
    <script type="text/javascript">
        const array_todofuken = ['北海道','青森県','岩手県','宮城県','秋田県','山形県','福島県','茨城県','栃木県','群馬県','埼玉県','千葉県','東京都','神奈川県','新潟県','富山県','石川県','福井県','山梨県','長野県','岐阜県','静岡県','愛知県','三重県','滋賀県','京都府','大阪府','兵庫県','奈良県','和歌山県','鳥取県','島根県','岡山県','広島県','山口県','徳島県','香川県','愛媛県','高知県','福岡県','佐賀県','長崎県','熊本県','大分県','宮崎県','鹿児島県','沖縄県']

        for (let i = 0; i < array_todofuken.length; i++) {
            let add_option = `<option value="${array_todofuken[i]}">${array_todofuken[i]}</option>`;
            $("#todofuken").append(add_option);
        }

    </script>


<!-- CSS -->
    <style type="text/css">

        .komoku{
            margin: 20px auto 40px auto ;
        }

        .title{
            width: 300px;
        }

        .name ul li {

            width: auto;
            margin: 0 3px 0 0;
            padding: 0;
            height: 35px;
            line-height: 35px;

        }

        .name ul, .cf{

            display: flex;
        }

        .name, .data{
            margin: 0 0 0 20px;
        }

        .cf2 li{
            margin: 0 0 20px 0;
        }


        input,select{

            width: 250px; /*--幅--*/
            padding: 10px; /*--余白--*/
            font-size: 16px; /*--文字サイズ--*/
            border: solid 2px #cccccc; /*--ボーダー線--*/
            border-radius: 5px; /*--角丸--*/

        }

        .input_mansion{
            width:400px;
        }

        .title ul>li{
            font-size: larger;
            font-weight: bold;
        }

        .caution{
            font-size: small;
            font-weight: lighter;
        }

        /*--focus--*/
        input:focus {

            background-color: #febe3e; /*--背景色--*/

        }

        input,select{
            margin: 0 0 0 20px;
        }

        body{
            margin: 20px 0 20px 20px;
        }


    </style>