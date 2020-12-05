<!doctype html>
<html lang="ja">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/style.css">

<title>PHP</title>
</head>
<body>
<header>
<h1 class="font-weight-normal">PHP</h1>    
</header>

<main>
<h2>Practice</h2>
<pre>
<?php
try{
  $db = new PDO('mysql:dbname=mydb;host=localhost;charset=utf8','root','root');
} catch(PDOException $e){
    echo 'DB接続エラー:' . $e ->getMessage();
}
// try catchでエラー文を変更

$memos = $db->query('SELECT * FROM memos ORDER BY id DESC');
?>

<article>
  <?php while ($memo = $memos->fetch()): ?>
    <p><a href="memo.php?id=<?php print($memo['id']);?> "><?php print(mb_substr($memo['memo'], 0 ,50)); ?></a></p> 
    <time><?php print($memo['created_at']); ?></time>
    <hr>
  <?php endwhile; ?>
</article>

<!-- mb_substr(表示する値,開始位置,表示する文字数) -->
</main>
</body>    
</html>