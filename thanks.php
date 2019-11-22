<?php

require_once('function.php');
require_once('dbconnect.php');

// 不正な画面遷移を防ぐ
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    header('Location: index.html');
}

    $product = $_POST['product'];
    $reason = $_POST['reason'];
    $buyer = $_POST['buyer'];
    $price = $_POST['price'];
    $content = $_POST['content'];

    date_default_timezone_set('Asia/Manila'); //フィリピン時間にセット
    $timing = date("Y/m/d H:i"); //現在日時を取得
    // echo $timing;


    $stmt =$dbh->prepare('INSERT INTO account(product, reason, buyer, price, content, timing) VALUES (?,?,?,?,?,?)');
    $stmt ->execute([$product, $reason, $buyer, $price, $content, $timing]);
    
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <title>送信完了</title>
    <meta charset="utf-8">

</head>
<body>
    <h1>登録完了！</h1>
    <p><?php echo h($product); ?></p>
    <p><?php echo h($reason); ?></p>
    <p><?php echo h($buyer); ?></p>
    <p><?php echo h($price).'ペソ'; ?></p>
    <p><?php echo h($content); ?></p>
    <p>
        <?php date_default_timezone_set('Asia/Manila'); //フィリピン時間にセット
        echo date("Y/m/d H:i"); //現在日時を取得
        ?>
    </p>
</body>
</html>