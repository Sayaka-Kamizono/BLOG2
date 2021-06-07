<?php

require_once('blog.php');

$blog = new Blog();
$result = $blog->getById($_GET['id']);

$id = (int)$result['id'];
$title = $result['title'];
$text = $result['text'];
$category = (int)$result['category'];
$private_key = (int)$result['private_key'];

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>編集フォーム</title>
</head>

<style>

  html {
    background-image: url(足跡.png);
   /* background-repeat: no-repeat;
   background-position: center;
  } */}


  body {
    width: 400px;
    height: 600px;
    margin: auto;
   
  }

  form{
    width: 300px;
    height: 410px;
    margin: 200px auto;
    padding-top: 50px;
    padding-bottom: 50px;
    text-align: center;
    background: rgba(180, 180, 180, 0.8);
    
  }
</style>

<body>
    
    <form action="blog_update.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <p>タイトル<input type="text" name="title" value="<?php echo $title ?>"></p>
        
        <p>本文</p>
        <textarea name="text" id="text" cols="30" rows="10"><?php echo $text ?></textarea>
        <br>
        <p>カテゴリー<select name="category">
          <option value="1" <?php if($category === 1) echo "selected" ?>>活動報告</option>
          <option value="2" <?php if($category === 2) echo "selected" ?>>寄付状況</option>
      </select></p>
        
        <!-- <br> -->
        <input type="radio" name="private_key" value="1" <?php if($private_key === 1) echo "checked"?>>公開
        <input type="radio" name="private_key" value="2" <?php if($private_key === 2) echo "checked"?>>非公開
        <br>
        <br>
        <input type="submit" value="更新する">
    </form>


    
</body>
</html>