<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    // POSTでのアクセスでない場合
    $name = '';
    $email = '';
    $subject = '';
    $message = '';
    $err_msg = '';
    $complete_msg = '';

} else {
    // フォームがサブミットされた場合（POST処理）
    // 入力された値を取得する
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // エラーメッセージ・完了メッセージの用意
    $err_msg = '';
    $complete_msg = '';

    // 空チェック
    if ($name == '' || $email == '' || $subject == '' || $message == '') {
        $err_msg = '全ての項目を入力してください。';
    }

    // エラーなし（全ての項目が入力されている）
    if ($err_msg == '') {
        $to = 'admin@test.com'; // 管理者のメールアドレスなど送信先を指定
        $headers = "From: " . $email . "\r\n";

        // 本文の最後に名前を追加
        $message .= "\r\n\r\n" . $name;

        // メール送信
        mb_send_mail($to, $subject, $message, $headers);

        // 完了メッセージ
        $complete_msg = '送信されました！';

        // 全てクリア
        $name = '';
        $email = '';
        $subject = '';
        $message = '';
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta namer="description" content="LPの練習">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css" />
    <link rel="stylesheet" href="style.css">
    <title>Treble</title>
    <link href="https://fonts.googleapis.com/css?family=Sawarabi+Gothic" rel="stylesheet">


</head>
    <header id="header">
        <h1 class="site-title">
            <a href="#">Treble</a>
        </h1>
    <nav>
        <ul>
            <li><a href="#about">ABOUT</a></li>
            <li><a href="#works">WORKS</a></li>
            <li><a href="#news">News</a></li>
            <li><a href="#contact">Contact</a></li>
            <li>
                <a 
                  href="http://www.Twitter.com"
                  target="_blank"
                  rel="noopener noreferrer"
                  ><img src="./img/twitter.png" alt="Twitter" class="icon" />
                </a>
            </li>
        </ul>
    </nav>
        
    
    </header>
    <body>
        <div id="main">
            <picture>
                <source media="(max-width: 600px)" srcset="./img/main-sp.jpg" />
                <img src="./img/main-pc.jpg" alt="">
            </picture>
        </div>

        <section id="about" class="wrapper">
            <h2 class="sec-title">ABOUT</h2>
            <ul>
                <li>Trebleとは</li>
                <li>WEB制作会社として設立</li>
                <li>WEBサイト、WEBアプリ開発、またタイに特化したコンサルタント業務を承ります</li>
                <li>メールアドレス：info@treble.jp</li>

            </ul>
            <p>WEBサイト、WEBアプリ開発を得意としているが、<br>東南アジアの旅行案内、コンサルタントとしても活動しております。</p>
         </section>

         <section id="works" class="wrapper">
            <h2 class="sec-title">WORKS</h2>
         <ul>
                <li><img src="./img/works1.jpg"/></li>
                <li><img src="./img/works2.jpg"/></li>
                <li><img src="./img/works3.jpg"/></li>
                <li><img src="./img/works4.jpg"/></li>
                <li><img src="./img/works5.jpg"/></li>
                <li><img src="./img/works6.jpg"/></li>
                <li><img src="./img/works1.jpg"/></li>
                <li><img src="./img/works4.jpg"/></li>
                <li><img src="./img/works3.jpg"/></li>
            </ul>
        </section>

        <section id="news" class="wrapper">
            <h2 class="sec-title">News</h2>
           <dl>
            <dt>2023/09/26</dt>
            <dd>本サイトをリリースしました</dd>
            <dt>2023/09/26</dt>
            <dd>プログラミングチュートリアルの運営を開始しました</dd>
            <dt>2023/09/26</dt>
            <dd>TREBLEをよろしくお願いします。</dd>
            <dt>2023/09/26</dt>
            <dd>H就職活動を開始しました。</dd>
           </dl>
        </section>

        <section id="contact" class="wrapper">
            <h2 class="sec-title">CONTACT</h2>
        <p>お問い合わせは以下のフォームから</p>  
        <?php if ($err_msg != ''): ?>
                <div class="alert alert-danger">
                    <?php echo $err_msg; ?>
                </div>
            <?php endif; ?>

            <?php if ($complete_msg != ''): ?>
                <div class="alert alert-success">
                    <?php echo $complete_msg; ?>
                </div>
            <?php endif; ?>


            <form method="post">
                <div class="mb-3">
                    <input type="text" class="form-control" name="name" placeholder="お名前" value="<?php echo $name; ?>">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="email" placeholder="メールアドレス" value="<?php echo $email; ?>">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="subject" placeholder="件名" value="<?php echo $subject; ?>">
                </div>
                <div class="mb-4">
                    <textarea class="form-control" name="message" rows="5" placeholder="本文"><?php echo $message; ?></textarea>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-success">送信</button>
                </div>
            </form>
        </div>
    </div>
</div>


         
</body>
</html>