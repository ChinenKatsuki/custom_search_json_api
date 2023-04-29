<!DOCTYPE html>
<html>
<head>
    <title>検索結果</title>
</head>
<body>
    <h1>検索結果</h1>
    <?php if (!empty($result)): ?>
        <p><?php echo $result; ?></p>
    <?php else: ?>
        <?php if (empty($results)): ?>
            <p>検索結果はありませんでした。</p>
        <?php else: ?>
            <ul>
                <?php foreach ($results->items as $result): ?>
                    <li>
                        <h2><a href="<?php echo $result->link ?>"><?php echo $result->title ?></a></h2>
                        <p><?php echo $result->snippet ?></p>
                    </li>
                <?php endforeach ?>
            </ul>
        <?php endif ?>
    <?php endif ?>
    <a href="../CustomSearchJsonAPI/views/Search.php">検索ページに戻る</a>
</body>
</html>