<?php

function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

$no = (string)filter_input(INPUT_POST, 'no'); // $_POST['no']
$en = (string)filter_input(INPUT_POST, 'en'); // $_POST['en']
$jp = (string)filter_input(INPUT_POST, 'jp'); // $_POST['jp']
$a_l_en = (string)filter_input(INPUT_POST, 'a_l_en'); // $_POST['a_l_en']
$a_l_jp = (string)filter_input(INPUT_POST, 'a_l_jp'); // $_POST['a_l_jp']
$a_r_en = (string)filter_input(INPUT_POST, 'a_r_en'); // $_POST['a_r_en']
$a_r_jp = (string)filter_input(INPUT_POST, 'a_r_jp'); // $_POST['a_r_jp']
$a_l = (string)filter_input(INPUT_POST, 'a_l'); // $_POST['a_l']
$a_r = (string)filter_input(INPUT_POST, 'a_r'); // $_POST['a_r']
$imagine = (string)filter_input(INPUT_POST, 'imagine'); // $_POST['imagine']

$fp = fopen('play.csv', 'a+b');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    flock($fp, LOCK_EX);
    fputcsv($fp, [$no, $en, $jp, $a_l_en, $a_l_jp, $a_r_en, $a_r_jp, $a_l, $a_r, $imagine,]);
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
<link rel="stylesheet" type="text/css" href="styles.css" />
<link rel="stylesheet" type="text/css" href="../50q.css" />
<title>Answer 50 Questions | by creative, community space ∧°┐</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
$("#your").load("type.php");
$("#inside").load("https://creative-community.space/50q/tips.html");
})
</script>

<style type="text/css">
@media print{
.imagine {display: none;}
}
</style>
</head>
<body>
<a class="no_print" href="http://ichoose.pe.hu/"><h1 id="headline">ichoose.pe.hu</h1></a>

<div id="main">
<div id="ichoose">
<h3><u>These 50 questions were created by</u></h3>
これは、 <b>A+ A- AA CC K2 X W</b>
<p>が考えた 50の質問 です。</p>
<p><u>These questions have Two Answers.</u><br>
質問の答えは全て二択です。</p>
<h3>You click The Answer, It takes you to next question.</h3>
<p>どちらかの答えをクリックすると、次の質問へ進みます。</p>
<hr/>
<h3>As you answer questions and move on,</h3>
<h3>質問に答えて進むと、<span style="float:right;">You will reach either of</span></h3>
<h2 class="five">
<span>A+</span>
<span>A-</span>
<span>AA</span>
<span>CC</span>
<span>K2</span>
<span>X</span>
<span>W</span>
</h2>
<h3 class="five" style="line-height:200%;">
のうちのいずれかにたどり着きます。<br/>
Let's see what type you might be.<br/>
さて、あなたは何タイプでしょうか？
</h3>
</div>

<?php if (!empty($rows)): ?>
<?php foreach ($rows as $row): ?>
<div id="<?=h($row[0])?>" class="question">
<h2><b><?=h($row[0])?></b></h2>
<div id="answer">
<h2><?=h($row[1])?></h2>
<p><?=h($row[2])?></p>
<span class="left">
<a href="#<?=h($row[7])?>">
<p><u><?=h($row[3])?></u></p>
<p><?=h($row[4])?></p></a>
</span>
<span class="or"><p><i>or</i></p></span>
<span class="right">
<a href="#<?=h($row[8])?>">
<p><u><?=h($row[5])?></u></p>
<p><?=h($row[6])?></p></a>
</span>
</div>
<span class="imagine" style="display:<?=h($row[9])?>;"><img src="<?=h($row[9])?>" width="100%"></span>
</div>
<?php endforeach; ?>
<?php else: ?>
<div id="0" class="question">
<h2><b>0</b></h2>
<div id="answer">
<h2>Question</h2>
<p>質問</p>
<span class="left">
<a href="#0">
<p><u><?=h($row[3])?>left</u></p>
<p><?=h($row[4])?>左</p></a>
</span>
<span class="or"><i>or</i></span>
<span class="right">
<a href="#0">
<p><u><?=h($row[5])?>right</u></p>
<p><?=h($row[6])?>右</p></a>
</span>
</div>
<span class="imagine" style="display:<?=h($row[9])?>;"><img src="<?=h($row[9])?>" width="100%"></span>
</div>
<?php endif; ?>
</div>
<div id="your"></div>
<p id="re"><a href="#1">Re-Start</a></p>
<p id="tips"><a onclick="obj=document.getElementById('today').style; obj.display=(obj.display=='block')?'none':'block';">Tips</a></p>

<div id="back">
<h3>We create a collection of<br/><i><a href="https://creative-community.space/50q/">50 Questions</a></i></h3>
<h1>This 50 Questions Curated by creative, community space <a class="pehu" href="https://creative-community.space/pehu/">∧°┐</a></h1>
</div>
<img src="greeting.jpg" width="100%">
<video controls playsinline src="1080p.mov" width="100%"></video>
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script type="text/javascript" src="http://ichoose.pe.hu/js/main.js"></script>
<script type="text/javascript" src="http://ichoose.pe.hu/js/jquery.arctext.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- jQuery.jsの読み込み -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>

<!-- スムーズスクロール部分の記述 -->
<script>
$(function(){
   // #で始まるアンカーをクリックした場合に処理
   $('a[href^=#]').click(function() {
      // スクロールの速度
      var speed = 1000; // ミリ秒
      // アンカーの値取得
      var href= $(this).attr("href");
      // 移動先を取得
      var target = $(href == "#" || href == "" ? 'html' : href);
      // 移動先を数値で取得
      var position = target.offset().top;
      // スムーススクロール
      $('body,html').animate({scrollTop:position}, speed, 'swing');
      return false;
   });
});
</script>
</body>
</html>
