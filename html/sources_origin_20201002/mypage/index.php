<?php

// ライブラリ読み込み
require_once WEB_APP."user.php";
require_once WEB_APP."mypage.php";

$my_page = new MyPage();
$my_page_datas = $my_page->getMyPageData();

?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>電力シェアリング</title>
  <meta name="description" content="">
  <meta property="og:type" content="website">
  <meta property="og:url" content="">
  <meta property="og:title" content="">
  <meta property="og:description" content="">
  <meta property="og:site_name" content="">
  <meta property="og:image" content="">
  <link rel="icon" href="./favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" href="apple-touch-icon.png">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css"
    integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
  <link href="../css/style.css" rel="stylesheet" media="all">
</head>

<body>
  <header class="l-header">
    <?php require_once TEMPLATE_DIR.'mypage_header.php' ?>
  </header>
  <div class="l-contents__wrap">
    <main class="l-contents">
      <div class="l-breadcrumbs">
        <ol class="l-breadcrumbs__inner">
          <li class="l-breadcrumbs__item">
            <a href="<?php echo h(HOME_URL) ?>">電力シェアリング TOP</a>
          </li>
          <li class="l-breadcrumbs__item">
            <span>マイページ</span>
          </li>
        </ol>
      </div>
      <section class="l-contents__section">
        <div class="l-contents__inner">
          <h2 class="c-title__page">マイページ</h2>
          <div class="p-mypage__wrap">
            <div class="p-mypage__prof">
              <div class="p-mypage__prof-img">
                <img src="/images/noimage.jpg" alt="">
              </div>
              <h3 class="p-mypage__point-title">現在の所有ポイント</h3>
              <div class="p-mypage__point">
                <span><?php echo h($infoLoginUser['point']) ?></span>ポイント
              </div>
              <ul class="p-mypage__nav">
                <li><a href="<?php echo h(HOME_URL) ?>mypage/project/">
                    <i class="fas fa-angle-right"></i>
                    プロジェクト参加履歴
                  </a></li>
                <li><a href="<?php echo h(HOME_URL) ?>mypage/mail/">
                    <i class="fas fa-angle-right"></i>
                    受信ボックス
                  </a></li>
                <li><a href="<?php echo h(HOME_URL) ?>mypage/point/">
                    <i class="fas fa-angle-right"></i>
                    ポイント履歴
                  </a></li>
                <li><a href="<?php echo h(HOME_URL) ?>mypage/profile/">
                    <i class="fas fa-angle-right"></i>
                    会員情報の変更
                  </a></li>
                <li><a href="<?php echo h(HOME_URL) ?>mypage/profile/password">
                    <i class="fas fa-angle-right"></i>
                    パスワードの変更
                  </a></li>
              </ul>
            </div>
            <div class="p-mypage__info">
              <h3 class="c-title__m">受信ボックス</h3>
              <dl class="c-list">
<?php foreach ($my_page_datas['disp_messages'] as $key => $val) { ?>
                <dt><?php echo h($val['insert_datetime']) ?></dt>
                <dd><a href="<?php echo h(HOME_URL) ?>mypage/mail/detail?id=<?php echo h($val['message_id']) ?>"><?php if ($val['read_flg'] == "0") { ?>[未読] <?php } ?><?php echo h($val['title']) ?></a></dd>
<?php } ?>
              </dl>
              <div class="u-right u-mt1em">
                <a href="<?php echo h(HOME_URL) ?>mypage/mail/">
                  <i class="fas fa-angle-right"></i>
                  すべての受信メールを見る
                </a>
              </div>
              <h3 class="c-title__m">プロジェクト参加履歴</h3>
              <dl class="c-list">
<?php foreach ($my_page_datas['disp_project'] as $key => $val) { ?>
                <dt><?php echo h($val['project_start_day']) ?></dt>
                <dd><a href="<?php echo h(HOME_URL) ?>mypage/project/detail?id=<?php echo h($val['project_history_id']) ?>"><?php echo h($val['project_name']) ?></a></dd>
<?php } ?>
              </dl>
              <div class="u-right u-mt1em">
                <a href="<?php echo h(HOME_URL) ?>mypage/project/">
                  <i class="fas fa-angle-right"></i>
                  すべてのプロジェクト参加履歴を見る
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    <footer class="l-footer">
      <?php require_once TEMPLATE_DIR.'footer.php' ?>
    </footer>
  </div>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="../../js/common.js"></script>
</body>

</html>