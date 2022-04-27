<?php
//$_POST["onamae"]の値が空だったらLocation指定しているファイル(入力画面)に移動させる


if(!(isset($_POST['onamae']))){
header('Location:index.html');/* 行き先を設定する */
exit;
}


$name = htmlspecialchars($_POST["onamae"], ENT_QUOTES);
$email = htmlspecialchars($_POST["email"], ENT_QUOTES);
$gender = $_POST["gender"];
$food = implode("、", $_POST["food"]);
$zip = htmlspecialchars($_POST["zip"], ENT_QUOTES);
$prefecture = htmlspecialchars($_POST["prefecture"], ENT_QUOTES);
$address = htmlspecialchars($_POST["address"], ENT_QUOTES);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>フォームの作成｜確認画面</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>お問い合わせフォーム</h1>
<h2><img src="img/step2.svg" alt=""></h2>
<form id="g-form" action="https://docs.google.com/forms/u/0/d/e/1FAIpQLSe-23Mvjz9EJF-f5aS_z7gwZosAZ-8CEdIgdIvQRJSMbqls-Q/formResponse" method="post">
<dl class="form-list">
<dt>お名前</dt>
<dd><?php echo $name; ?></dd>

<dt>メールアドレス</dt>
<dd><?php echo $email; ?></dd>

<dt>性別</dt>
<dd><?php echo $gender; ?></dd>

<dt>好きな食べ物</dt>
<dd><?php echo $food; ?></dd>

<dt>郵便番号</dt>
<dd><?php echo $zip; ?></dd> 
<dt>住所</dt>
<dd><?php echo $prefecture; ?>
<?php echo $address; ?></dd>
</dl>

<!-- データをgoogleに送信する -->
<input type="hidden" name="entry.366770368" value="<?php echo $name; ?>">
<input type="hidden" name="entry.976659743" value="<?php echo $email; ?>">
<input type="hidden" name="entry.1129707179" value="<?php echo $gender; ?>">
<input type="hidden" name="entry.1675619721" value="<?php echo $food; ?>">
<input type="hidden" name="entry.2013376170" value="<?php echo $zip; ?>">
<input type="hidden" name="entry.1261118604" value="<?php echo $prefecture; ?>">
<input type="hidden" name="entry.1865696443" value="<?php echo $address; ?>">

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
  url: "https://docs.google.com/forms/u/0/d/e/1FAIpQLSe-23Mvjz9EJF-f5aS_z7gwZosAZ-8CEdIgdIvQRJSMbqls-Q/formResponse",
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