<?php

require_once('function.php');
require_once('dbconnect.php');

$product = '';
if (isset($_GET['product'])) {
    $product = $_GET['product'];
}

$stmt =$dbh->prepare('SELECT * FROM account WHERE product like ?');
$stmt->execute(["%$product%"]);
$results = $stmt->fetchAll();

// var_dump($results);

?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>検索</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c&display=swap" rel="stylesheet">
</head>
<body>

<form action="" method="get">
    <p>検索したい品名を入力してください。</p>
    <input type="text" name="product">
    <input type="submit" value="検索">
</form>

<?php foreach ($results as $result): ?>
        <p><?php echo h($result['id']); ?></p>
        <p><?php echo h($result['product']); ?></p>
        <p><?php echo h($result['reason']); ?></p>
        <p><?php echo h($result['buyer']); ?></p>
        <p><?php echo h($result['price']); ?></p>
        <p><?php echo h($result['content']); ?></p>
        <p><?php echo h($result['timing']); ?></p>
<?php endforeach; ?>

</body>
</html>