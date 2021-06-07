<?php

require_once('blog.php');

$blog = new Blog();
// 取得したデータを表示
// index.phpから移動してきた
$blogData = $blog->getAll();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>一覧表示</title>
  
<style>

html {
  background: black;
  background-image: url(ライオン.jpg);
  background-position: right bottom;
  background-repeat:  no-repeat;
  background-size:1300px auto;
  color: #eee;
}  

body {
  width: 800px;
  padding-left: 10px;
  background-image: url(タイトル.png);
  align-items: left;
  
}

a {
  text-decoration:none;
}

a.newtext {
  margin-top: 500px;
  height: fit-content;
}

.newtext {
  margin-left: 700px;
  font-weight: bold;
  background: skyblue;
  color:white;
  padding:5px 10px;
  border-radius: 12px;
  font-family: 'Avenir','Arial';
}

.newtext:hover {
  background: silver;
  text-decoration: none;
}

.newtext:visited {
  color: gray;
}


.button {
  display: inline-block;
  padding: 7px 7px;
  margin: 0px 5px 0px 5px;
  border-radius: 12px;
  text-decoration: none;
  color: #FFF;
  background-color: rgba(255, 255, 255, 0.3);
  transition: .4s;
}

.button:hover {
  background-image: linear-gradient(45deg, #000066 0%, #0099FF 100%);
}

table{
  margin-top: 100px;
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
}

table tr{
  border-bottom: solid 1px #eee;
  cursor: pointer;
  height: 70px;
}

table tr:hover{
  background-color: rgba(255, 255, 255, 0.3);
  color: black;
}

table th,table td{
  text-align: center;
  width: 25%;
  padding: 15px 0;
}

.earth {
  position: relative;
  overflow: hidden;
  width: 200px;
  height: 200px;
  background-color: #ccc;
  border-radius: 50%;
  box-shadow: -20px 0 3px rgba(0, 0, 0, 0.3) inset;
}

.earth:before {
  content: "";
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-repeat: repeat-x;
  background-image: url(https://drive.google.com/uc?export=view&id=11chGBx0vAj79X4ph_fUXDQIYdRy9uqBV);
  background-position: 0 0;
  background-size: auto 100%;
  transform: rotate(23.4deg);
  animation: rotation 16s linear infinite;
}

@keyframes rotation {
  0% {
    background-position: 0 0;
  }
  100% {
    background-position: -200% 0;
  }
}
  </style>
</head>

<body>
<br>

<div class="earth"></div>  

  <!-- <h1>投稿一覧表示</h1> -->
  <br>
  <a class="newtext" href ="form.html">記事作成</a>

  <table>
      <tr>
      <th>No</th>
      <th>投稿日時</th>
      <th>タイトル</th>
      <th>カテゴリー</th>
      <th> </th>
      <th> </th>
      <th> </th>      
    </tr>
    

<!-- ↑で定義した変数$blogDataの中身をカラムにして回す(foreach) -->
<?php foreach ($blogData as $column): ?>

    <tr>
      <td><?php echo $column['id'] ?></td>
      <td><?php echo $column['created_at'] ?></td>
      <td><?php echo $column['title'] ?></td>
      <td><?php echo $blog->setCategoryName($column['category']) ?></td>
      

      <td><a class="button" href ="create.php?id=<?php echo $column['id'] ?>>">詳細</a></td>
      <td><a class="button" href ="update_form.php?id=<?php echo $column['id'] ?>>">編集</a></td>
      <td><a class="button" href ="blog_delete.php?id=<?php echo $column['id'] ?>">削除</a></td>
      </tr>

<?php endforeach; ?>

  </table>




  
</body>
</html>


