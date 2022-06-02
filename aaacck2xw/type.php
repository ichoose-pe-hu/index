<?php

function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

$type = (string)filter_input(INPUT_POST, 'type'); // $_POST['type']
$as = (string)filter_input(INPUT_POST, 'as'); // $_POST['as']
$jp = (string)filter_input(INPUT_POST, 'jp'); // $_POST['jp']
$en = (string)filter_input(INPUT_POST, 'en'); // $_POST['en']
$link = (string)filter_input(INPUT_POST, 'link'); // $_POST['link']
$message = (string)filter_input(INPUT_POST, 'message'); // $_POST['message']
$message_jp = (string)filter_input(INPUT_POST, 'message_jp'); // $_POST['message_jp']

$fp = fopen('type.csv', 'a+b');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    flock($fp, LOCK_EX);
    fputcsv($fp, [$type, $as, $jp, $en, $link, $message, $message_jp,]);
    rewind($fp);
}

flock($fp, LOCK_SH);
while ($row = fgetcsv($fp)) {
    $rows[] = $row;
}
flock($fp, LOCK_UN);
fclose($fp);

?>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
</head>
<body>

<div id="last">
<span id="left">あなたの</span>
<span id="right">タイプは</span>
<h2>Your Type is</h2>

<?php if (!empty($rows)): ?>
<?php foreach ($rows as $row): ?>
<div id="<?=h($row[0])?>" class="type">
<p class="is"><?=h($row[0])?></p>
<p class="name"><u><?=h($row[1])?></u>
<br><?=h($row[2])?>
<br><?=h($row[3])?></p>
<a href="<?=h($row[4])?>"></a>
<div class="message">
<h2><?=h($row[5])?></h2>
<?=h($row[6])?>
</div>
</div>
<?php endforeach; ?>
<?php else: ?>

<div id="<?=h($row[0])?>" class="type">
<p class="is"><?=h($row[0])?>_</p>
<p class="name"><u><?=h($row[1])?>as</u>
<br><?=h($row[2])?>名前
<br><?=h($row[3])?>Name</p>
<a href="<?=h($row[4])?>"></a>
<div class="message">
<h2><?=h($row[5])?>Message</h2>
<?=h($row[6])?>メッセージ
</div>
</div>
<?php endif; ?>

</div>
</body>
</html>