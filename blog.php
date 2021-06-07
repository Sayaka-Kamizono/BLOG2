<?php

require_once('input.php');

Class Blog extends Dbc{

protected $table_name = 'blog';

// カテゴリー名を取得
// 引き数：数字
// 返り値：カテゴリーの文字列
public function setCategoryName($category){
  if ($category === '1'){
      return "活動報告";
  } else if ($category === '2'){
      return "寄付状況";
  } else {
      return "その他";
  }
}

public function blogCreate($blogs){
  $sql = "INSERT INTO
  $this->table_name(title, text, category, private_key)
        VALUES
          (:title, :text, :category, :private_key)";

$dbh = $this->dbConnect();
// データの整合性を保つトランザクション
$dbh->beginTransaction();


try {
     $stmt = $dbh->prepare($sql);
     $stmt->bindValue(':title',$blogs['title'],PDO::PARAM_STR);
     $stmt->bindValue(':text',$blogs['text'],PDO::PARAM_STR);
     $stmt->bindValue(':category',$blogs['category'],PDO::PARAM_INT);
     $stmt->bindValue(':private_key',$blogs['private_key'],PDO::PARAM_INT);
     $stmt->execute();

    //  大丈夫だったらコミット
     $dbh->commit();
     echo '投稿を完了しました';
    } catch(PDOException $e){
      // エラーだったらロールバック
      $dbh->rollBack();
      exit($e);
}
}

public function blogUpdate($blogs){
  $sql = "UPDATE $this->table_name SET
          title = :title, text = :text, category = :category, private_key = :private_key
        WHERE
          id = :id";

$dbh = $this->dbConnect();
$dbh->beginTransaction();
try {
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':title',$blogs['title'], PDO::PARAM_STR);
$stmt->bindValue(':text',$blogs['text'], PDO::PARAM_STR);
$stmt->bindValue(':category',$blogs['category'], PDO::PARAM_INT);
$stmt->bindValue(':private_key',$blogs['private_key'],PDO::PARAM_INT);
$stmt->bindValue(':id',$blogs['id'], PDO::PARAM_INT);
$stmt->execute();
$dbh->commit();
echo '内容を更新しました';
} catch(PDOException $e){
$dbh->rollBack();
exit($e);
}
}


// バリデーショん
public function blogValidate($blogs){
  if (empty($blogs['title'])){
    exit('タイトルを入力して下さい');
  }
  
  if (mb_strlen($blogs['title']) > 191){
    exit('191文字以下で入力してください');
  }
  
  if (empty($blogs['text'])){
    exit('本文を入力して下さい');
  }
  
  if (empty($blogs['category'])){
    exit('カテゴリーを選択してください');
  }
  
  if (empty($blogs['private_key'])){
    exit('公開状態を設定してください');
  }

}


}

?>