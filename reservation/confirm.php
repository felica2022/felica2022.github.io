<?php
//$_POST["onamae"]の値が空だったらLocation指定しているファイル(入力画面)に移動させる


if(!(isset($_POST['onamae']))){
header('Location:index.html');/* 行き先を設定する */
exit;
}


$name = htmlspecialchars($_POST["onamae"], ENT_QUOTES);
$gender = $_POST["gender"];
$email = htmlspecialchars($_POST["email"], ENT_QUOTES);
$date = htmlspecialchars($_POST["date"], ENT_QUOTES);
$pax = htmlspecialchars($_POST["pax"], ENT_QUOTES);
/* $number = htmlspecialchars($_POST["number"], ENT_QUOTES); */
$tour= htmlspecialchars($_POST["tour"], ENT_QUOTES);
$food = implode("、", $_POST["food"]);
$message = htmlspecialchars($_POST["message"], ENT_QUOTES); 
/* $number = $_POST["number"]; */
/* $number = $_POST["tour"]; */
/* $food = implode("、", $_POST["food"]); */
/* $zip = htmlspecialchars($_POST["zip"], ENT_QUOTES); */
/* $prefecture = htmlspecialchars($_POST["prefecture"], ENT_QUOTES); */
/* $address = htmlspecialchars($_POST["address"], ENT_QUOTES); */
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ふぇりかの旅｜確認画面</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>確認画面</h1>
<h2><img src="img/step2.svg" alt=""></h2>
<form id="g-form" action="https://docs.google.com/forms/u/0/d/e/1FAIpQLSeiyA7WycQWFoH6rJPkCt4jmBlin9pervXtIU71FcORS_pbZQ/formResponse" method="post">

<dl class="form-list">
<dt>お名前</dt>
<dd><?php echo $name; ?></dd>

<dt>性別</dt>
<dd><?php echo $gender; ?></dd>

<dt>メールアドレス</dt>
<dd><?php echo $email; ?></dd>

<dt>ご出発日または<br>ご利用日</dt>
<dd><?php echo $date; ?></dd>

<dt>人数</dt>
<dd><?php echo $pax; ?></dd>

<dt>コース番号/コース名</dt>
<dd><?php echo $tour; ?></dd> 

<dt>食事制限、アレルギーなど</dt>
<dd><?php echo $food; ?></dd>

<dt>お問い合わせ欄</dt>
<dd><?php echo $message; ?></dd>
</dl>

<!-- データをgoogleに送信する -->
<input type="hidden" name="entry.449084389" value="<?php echo $name; ?>">
<input type="hidden" name="entry.100246583" value="<?php echo $gender; ?>">
<input type="hidden" name="entry.1039845063" value="<?php echo $email; ?>">
<input type="hidden" name="entry.1106239884" value="<?php echo $date; ?>">
<input type="hidden" name="entry.1353826504" value="<?php echo $pax; ?>">
<input type="hidden" name="entry.842165778" value="<?php echo $tour; ?>">
<input type="hidden" name="entry.1299821695" value="<?php echo $food; ?>">
<input type="hidden" name="entry.1377379526" value="<?php echo $message; ?>">


<div class="btn-wrapper">
<input type="submit" value="送信">
</div>
<input class="back-btn"type="button" value="入力画面に戻る" onclick="history.back()">

</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(function(){
$('#g-form').submit(function (event) {
var formData = $('#g-form').serialize();
$.ajax({
  url: "https://docs.google.com/forms/u/0/d/e/1FAIpQLSeiyA7WycQWFoH6rJPkCt4jmBlin9pervXtIU71FcORS_pbZQ/formResponse",
  data: formData,
  type: "POST",
  dataType: "xml",
  statusCode: {
    0: function(){
      window.location.href = "thanks.html";
      },
    200: function(){
     //失敗したときの処理
      }
    }
  });
//googleformへのページ遷移をキャンセル
event.preventDefault();
});
});
</script>
   
</body>
</html>