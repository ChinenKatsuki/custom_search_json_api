<?php

//APIキー
$api_key = "AIzaSyCnIeRoKi3iHqIYhMk0Ixv23Yd3VPrFJPk";

//検索エンジンID
$engine_id = "f349026f6502246f6";

//URL
$url = "https://www.googleapis.com/customsearch/v1?";

//入力されたキーワード
$query = htmlspecialchars($_GET['keyword'], ENT_QUOTES, 'UTF-8');

$void_flag = false;
if (empty($query)) {
    $result = '検索キーワードを入力してください';
} else {
    // APIリクエストURL
    $url = "https://www.googleapis.com/customsearch/v1?key={$api_key}&cx={$engine_id}&q={$query}";

    // APIリクエスト送信
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    curl_close($ch);

    // APIレスポンスをJSON形式に変換
    $results = json_decode($response);
    $void_flag = true;
}

// 検索結果の表示
foreach ($results->items as $result) {
    echo $result->title . "<br>";
    echo $result->link . "<br>";
    echo $result->snippet . "<br>";
    echo "<br>";
}

?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
</head>
<body>
<?php if ($void_flag): ?>
<?php echo $result; ?>
<a href="login.php">ログイン画面に戻る</a>
<?php else: ?>
<?php echo $result; ?>
<a href="register.php">前の画面に戻る</a>
<?php endif; ?>
</body>
</html>