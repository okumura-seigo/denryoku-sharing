<?php

  // ライブラリ読み込み
  require_once WEB_APP."user.php";
  require_once WEB_APP."mypage.php";

  $my_page = new MyPage();
  $my_page_datas = $my_page->getMyPageData();
  $_POST['page_no'] ? $page_no = $_POST['page_no'] : $page_no = 1;
  $messages_conut = $my_page->getMessageCount();
  $message_datas = $my_page->getMessageListData($page_no);

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
  <link href="../../css/style.css" rel="stylesheet" media="all">
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
            <a href="<?php echo h(HOME_URL) ?>mypage/">マイページ TOP</a>
          </li>
          <li class="l-breadcrumbs__item">
            <span>受信ボックス</span>
          </li>
        </ol>
      </div>
      <section class="l-contents__section">
        <div class="l-contents__inner">
          <h2 class="c-title__page">受信ボックス</h2>
          <table class="c-table">
<?php foreach ($message_datas as $key => $val) { ?>
                <tr class="border">
                  <td>
                    <p>
                      <span class="pr-3" style="padding-right:15px;"><?php echo h($val['insert_datetime']) ?></span>
                      <a href="detail?id=<?php echo h($val['message_id']) ?>"><?php echo h($val['title']) ?></a>
                    </p>
                  </td>
                  <td>
                    <button class="btn-primary" onClick="location.href='detail?id=<?php echo h($val['message_id']) ?>'">詳細</button>
                  </td>
                </tr>
<?php }?>
          </table>
          <div class="c-pagination__wrap">
            <ul class="c-pagination">
             <!--  <li><span>1</span></li>
              <li><a href="#">2</a></li> -->
              <?php
                $max_count = ceil((int)$messages_conut['count'] / 5);
                for($i=1; $max_count>=$i; $i++) {
              ?> 
                  <form name="pager<?php echo $i ?>" action="" method="post">
                    <input type="hidden" name="page_no" value="'<?php $i ?>">
                  </form>
              <?php  } ?>
              <?php
                for($i=1; $max_count>=$i; $i++) {
                  if($i >= 2) {
                    echo ' | ';
                  }
                  if($i == $page_no) {
              ?>
                    <span><?php echo $i ?></span>
                <?php
                  } else {
                ?>
                    <a href="" onClick="document.pager<?php echo $i ?>.submit();return false;"><?php echo $i ?></a>
              <?php
                  }
                } ?>
            </ul>
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
  <script src="../../../js/common.js"></script>
</body>

</html>