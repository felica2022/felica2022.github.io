$(function(){
//ハンバーガー
$('#ham-btn').on('click',function(){
$(this).toggleClass('click');


//ナビゲーション
//$('#g-nav').fadeToggle();
//$('#g-nav').slideToggle(200);
$('#g-nav').toggleClass('slide');/* 3つのパターンを覚える */
$('#nav-wrapper').fadeToggle(200);
});

//黒い半透明の要素
$('#nav-wrapper').on('click',function(){
$('#g-nav').removeClass('slide');
$(this).fadeOut(200);
$('#ham-btn').removeClass('click');
});

//西暦の取得
var today = new Date();
fullYear = today.getFullYear();//varは2行目以降省略可
console.log(fullYear);
document.getElementById('this-year').innerHTML = fullYear;

//外部データの取得
$.ajax({
url:'/my-portfolio-2022/img/portfolio-logo.svg',//呼び出したいデータのパスを挿入
// 1つめは通信成功時の処理
})//ここはajax関数なので,(カンマ)不要
.then(
function(data){
  var svg = $(data).find('svg');
  $('#svg-box').append(svg);
},//2つ続くので,を忘れない
// 2つめは通信失敗時の処理
function(){
  alert('読み込み失敗');
}
);

//cookieの指定

if($.cookie('access')){
//既にアクセス済みの場合はカーテンを非表示
//$('#svg-wrapper').css({'display':'none'});
$('#svg-wrapper').hide();//display: none;でもhideでもいい
}else{
//初アクセスの場合はカーテンをfadeOutさせる
$('#svg-wrapper').delay(4000).fadeOut(400);
}

if($.cookie('access')){
//2回目以降の処理
$('#curtain').hide();
}else{
//1回目の処理ローディングアニメーション
$('#curtain').delay(4000).fadeOut(1500);
}

//ファイルがロードされたら
$(window).on('load',function(){
$.cookie('access',$('body').addClass('access'),{
expires: 1//指定しない場合は現在のセッションのみ保持される(ブラウザを閉じると消える)。
});
});

});//$の閉じ