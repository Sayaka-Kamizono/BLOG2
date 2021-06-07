<?php

require_once('blog.php');
$blogs = $_POST;



$blog = new Blog();
$blog->blogValidate($blogs);
$blog->blogCreate($blogs);

?>
<p><a href ="index.php">一覧へ戻る</a></p>