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

//西暦の取得
var today = new Date();
fullYear = today.getFullYear();//varは2行目以降省略可
console.log(fullYear);
document.getElementById('this-year').innerHTML = fullYear;

/* スライダー */
	$(window).on('load',function(){
		//横幅いっぱい2
		var $slide3 = $('.bxslider3');
		var $slide3_ul = $slide3.find('.bxslider > ul');
		$slide3_ul.children('li').each(function(i,elem){
			$(this).attr('data-num',i);
		});
		var m = $slide3.find('.bxslider > ul > li').size();
		$slide3_ul.bxSlider({
				maxSlides: 2,
				easing: 'easeOutExpo',
				speed: 1000,
				onSliderLoad: function(cr){
					$slide3_ul.children('li[data-num="' + cr + '"]').addClass('active');
					$slide3.find('.bx-viewport > ul').css({
						width: m * 100 + 415 + '%'
					});
					$slide3_ul.animate({
						opacity: 1
					},500);
				},
				onSlideBefore: function($slideElement, oldIndex, newIndex){
					$slide3_ul.children('li').removeClass('active').animate({
						opacity: 0.5
					},300);
				},
				onSlideAfter: function($slideElement, oldIndex, newIndex){
					$slide3.find('.bx-viewport > ul > li[data-num="' + newIndex + '"]').addClass('active').animate({
						opacity: 1
					},300);
				}
			}
		);
	});




});//$の閉じ