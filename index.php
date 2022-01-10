<?php
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-16');
}
$image = (string)filter_input(INPUT_POST, 'image'); // $_POST['image']

$fp = fopen('image.csv', 'a+b');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    flock($fp, LOCK_EX);
    fputcsv($fp, [$image]);
    rewind($fp);
}

flock($fp, LOCK_SH);
while ($row = fgetcsv($fp)) {
    $rows[] = $row;
}
flock($fp, LOCK_UN);
fclose($fp);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-Z9EL97V4GV"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-Z9EL97V4GV');
</script>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="ichooseは、創造的チャレンジへの積極性を養い、従来の価値観／方法にとらわれない開かれた考え方を養うことを目的とする創造的娯楽ゲームです。">
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
$("#introduction").load("/about/");
$("#faqs").load("/collection/faqs.html");
$("#howto_q").load("/50q/howto.html");
})
</script>
<title>ichoose | The Answers are always inside of you</title>
<link rel="stylesheet" type="text/css" href="/10q/list.css" />
<link rel="icon" href="/imagine/logo.png">

<style type="text/css">
html,body {
  font-family: "Times New Roman", "Times", serif;
  margin:0; padding:0;
}

h1 {
  font-size: 2.5vw;
  text-align:center;
  font-weight: 500;
  letter-spacing: 0.01rem;
}
h1 b {
  font-size: 120%;
  font-weight: normal;
  font-family:"MS Mincho";
}
h2 {
  font-size: 2.5vw;
  font-weight: 500;
  padding:0;
  text-shadow: 0.2vw 0.2vw 0 #fff;
}
h3 {
  font-size: 3.5vw;
  font-weight: 500;
}
a {
  color:#000;
  text-decoration:none;
}
a:hover {color:red;}
u {
  font-size: 120%;
  font-weight: normal;
}
#page_cover {
  position:relative;
  width:100%;
  height:100vh;
  top:0; left:0;
  margin:0; padding:0;
}

#menu {position:fixed;}
#headline,
#inside,
#qr
{position:absolute;}

#menu,
#headline,
#inside,
#qr {
  margin:0; padding:0;
  -webkit-transform:translate(-50%,-50%);
  transform:translate(-50%,-50%);
}
#headline {top: 25%; left: 50%; z-index:5; width:75%;}
#menu, #inside {top: 50%; left: 50%; z-index:25;}
#qr {top: 60%; left: 50%; z-index:25;}

.top,
.today {
  position:fixed;
  top:0;
  z-index:50;
}
.top {left:5vw;}
.today {right:5vw;}
.top:hover,
.today:hover {
  cursor:pointer;
  font-style:italic;
}

#menu {
  z-index:100;
  display:none;
}
#menu span {
  font-size: 4.5vw;
  display:block;
}
#menu a {
  display:block;
  padding: 1vw;
  background-color: #fff;
  border: solid 0.25vw #000;
}
#menu a:hover {
  color: #fff;
  background-color: #000;
}
#you {
  position:absolute;
  z-index:10;
  bottom:0; left:0;
  width:100%;
}

#today {
  position:fixed;
  z-index:10;
  top:0; left:0;
  width:100%;
  height:100vh;
  display:none;
}

#ichoose {
  position:fixed;
  z-index:-1;
  top:0; left:0;
  margin:0; padding:0;
  width:100%; height:100vh;
}
#ichoose img {
  position: absolute;
  min-width:100%;
  top: 50%; left: 50%;
  -webkit-transform : translate(-50%,-50%);
  transform : translate(-50%,-50%);
}
#ichoose span:not(:first-of-type),
#qr {display:none;}
#qr {width:55vw;}

#introduction,
#faqs,
#howto_q {
  background-color: #fff;
  min-height:100vh;
}

.print {
  position: absolute;
  width:100%;
  font-size:3.5vw;
  display:none;
}

@media print{
.print, #qr {display: block;}
.top, .today {display: none;}
#ichoose img {height:100vh;}
}

@media screen and (max-width: 1000px){
}

@media screen and (max-width: 500px){
}
</style>
</head>
<body>

<h2 class="top">
<a onclick="obj=document.getElementById('menu').style; obj.display=(obj.display=='block')?'none':'block';">
<u>How to</u>
</a>
</h2>
<h2 class="today"><u><a onclick="obj=document.getElementById('today').style; obj.display=(obj.display=='block')?'none':'block';">31Q</a></u>
</h2>
<div id="page_cover">
<h1 class="print">The Answers are always inside of you</h1>
<a href="http://ichoose.pe.hu/"><h1 id="headline">ichoose.pe.hu</h1></a>
<h1 id="qr"><img src="/imagine/qr.png" width="100%"></h1>
<div id="you">
<h1>by creative, community space <b class="pehu"><a href="http://vg.pe.hu/jp/">∧°┐</a></b></h1>
</div>
</div>

<div id="introduction"></div>
<div id="faqs"></div>
<div id="howto_q"></div>

<div id="menu">
<span><a href="#introduction">Introduction</a></span>
<span><a href="http://ichoose.pe.hu/10q/">Create 10 Questions</a></span>
<span><a href="http://ichoose.pe.hu/50q/">Answer 50 Questions</a></span>
</div>

<div id="ichoose">
<?php if (!empty($rows)): ?>
<?php foreach ($rows as $row): ?>
<span><img src="<?=h($row[0])?>"></span>
<?php endforeach; ?>
<?php else: ?>
<?php endif; ?>
</div>


<div id="today">
<div id="inside">
<iframe src="http://vg.pe.hu/publication/31q/" frameborder="0">読み込んでいます…</iframe>
</div>
</div>

<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script type="text/javascript" src="http://ichoose.pe.hu/js/main.js"></script>
<script type="text/javascript" src="http://ichoose.pe.hu/js/jquery.arctext.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- jQuery.jsの読み込み -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>

<script type="text/javascript">
$(function() {
    var arr = [];
    $("#ichoose span").each(function() {
        arr.push($(this).html());
    });
    arr.sort(function() {
        return Math.random() - Math.random();
    });
    $("#ichoose").empty();
    for(i=0; i < arr.length; i++) {
        $("#ichoose").append('<span>' + arr[i] + '</span>');
    }
});
</script>

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
