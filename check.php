<?php

require_once('function.php');

// 不正な画面遷移を防ぐ
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    header('Location: index.html');
}

$product = $_POST['product'];
// echo $product . '<br>';

$reason = $_POST['reason'];
// echo $reason . '<br>';

$buyer = $_POST['buyer'];
// echo $buyer . '<br>';

$price = $_POST['price'];
// echo $price . '<br>';

$content = $_POST['content'];
// echo $content . '<br>';


if ($product == '') {
    $product_result = '品名が入力されていません。';
} else {
    $product_result = '品名：' . $product;
}

if ($reason == '') {
    $reason_result = '購入理由が選択されていません。';
} else {
    $reason_result = '購入理由：' . $reason;
}

if ($buyer == '') {
    $buyer_result = '購入者が選択されていません。';
} else {
    $buyer_result = '購入者：' . $buyer;
}

if ($price == '') {
    $price_result = '購入金額が入力されていません。';
} else {
    $price_result = '金額：' . $price .'ペソ';
}

if ($content == '') {
    $content_result = '特記事項：とくになし';
} else {
    $content_result = '特記事項：' .$content;
}

?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <title>入力内容確認</title>
    <meta charset="utf-8">
</head>

<body>
    <h1>入力内容確認</h1>
    <p><?php echo h($product_result); ?></p>
    <p><?php echo h($reason_result); ?></p>
    <p><?php echo h($buyer_result); ?></p>
    <p><?php echo h($price_result); ?></p>
    <p><?php echo h($content_result); ?></p>

    <form method="POST" action="thanks.php">
        <input type="hidden" name="product" value="<?php echo h($product); ?>">
        <input type="hidden" name="reason" value="<?php echo h($reason); ?>">
        <input type="hidden" name="buyer" value="<?php echo h($buyer); ?>">
        <input type="hidden" name="price" value="<?php echo h($price); ?>">
        <input type="hidden" name="content" value="<?php echo h($content); ?>">
        
        <!-- 戻るボタン -->
        <button type="button" onclick="history.back()">戻る</button>

        <!-- コメント以外の全ての入力が整っているときのみ、次のページへ進むボタンが表示される -->
        <?php if($product != '' && $reason != '' && $buyer != '' && $price != ''): ?>
        <button>OK</button>
        <?php endif; ?>
    </form>
</body>
</html>