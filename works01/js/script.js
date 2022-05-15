$(function(){
//#tab(子孫の)aをon.clickしたら
$('#tab a').on('click',function(){
$(this).parent('li').addClass('current').siblings('li').removeClass('current');
/* ここでは.(ドット)を入れない! */

//thisのhref属性(attribute)を取得し変数に代入
var x = $(this).attr('href');
console.log(x);
$(x).addClass('current').siblings('.panel').removeClass('current');
return false;//a要素をクリックする時は必ず入れる
});
});