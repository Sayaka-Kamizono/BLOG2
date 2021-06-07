<?php 


require_once('blog.php');

$blog = new Blog();

$result = $blog->getById($_GET['id']);

?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>詳細画面</title>
</head>
<style>

  html {
    background-color: darkgray;
   background-image: url(犬と猫.png);
   background-position: right bottom;
   background-repeat:  no-repeat;
   background-size:600px auto;
   height: 950px;
  }

  /* body {
    background: darkgray;
  } */

  .nakami {
    width: 350px;
    height: 400px;
    margin: 200px auto 0 auto;
    text-align: center;
    color: darkgray;
    background: white;
    padding-top: 50px;
    padding-left: 50px;
    padding-right: 50px;
  }

  a {
    text-decoration: none;
  }
  
</style>

<body>
  
 <div class ="nakami">
  <h2>タイトル:<?php echo $result['title'] ?></h2>
  <p>投稿日時:<?php echo $result['created_at'] ?></p>
  <p>カテゴリー:<?php echo $blog->setCategoryName($result['category']) ?></p>
  <hr>
  <p><?php echo $result['text'] ?></p>

  <a href ="index.html">一覧へ戻る</a>
</div>
</body>
</html>