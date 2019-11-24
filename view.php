<?php

require_once('function.php');
require_once('dbconnect.php');

$stmt = $dbh->prepare('SELECT * FROM account ORDER BY id ASC'); //DESCは降順、ASCは照準
$stmt ->execute();
$results = $stmt->fetchAll();

// var_dump($results);

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>支出一覧</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c&display=swap" rel="stylesheet">
</head>
<body>

<div class="container">
    <h1>買ったもの一覧</h1>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">買ったもの</th>
      <th scope="col">内容</th>
      <th scope="col">買った人</th>
      <th scope="col">金額</th>
      <th scope="col">コメント</th>
      <th scope="col">日時</th>
    </tr>
  </thead>
  <tbody>

    <tr>
    <?php foreach ($results as $result): ?>
      <th scope="row">
        <p><?php echo h($result['id']); ?></p>
      </th>
      
      <td><p><?php echo h($result['product']); ?></p></td>
      <td><p><?php echo h($result['reason']); ?></p></td>
      <td><p><?php echo h($result['buyer']); ?></p></td>
      <td><p><?php echo h($result['price']); ?></p></td>
      <td><p><?php echo h($result['content']); ?></p></td>
      <td><p><?php echo h($result['timing'] ). '<br>'; ?></p></td>
      
    
    <?php endforeach; ?>
    </tr>

  </tbody>
</table>

    <!-- <?php foreach ($results as $result): ?>
    
        <p><?php echo h($result['id']); ?></p>
        <p><?php echo h($result['product']); ?></p>
        <p><?php echo h($result['reason']); ?></p>
        <p><?php echo h($result['buyer']); ?></p>
        <p><?php echo h($result['price']); ?></p>
        <p><?php echo h($result['content']); ?></p>
        <p><?php echo h($result['timing']); ?></p>


    <?php endforeach; ?> -->





</body>
</html>