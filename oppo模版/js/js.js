$(function(){
	var c = 0;
	function run(){
		c++;
		if(c==5){
			$('.lunbo').css('left','0');
			c=1;
		}
		var left = c*-1349;
		$('.lunbo').animate({'left':left+'px'},500);
		$('.carousel ul li').eq(c).css({'background':'#fff'}).siblings('li').css({'background':'#208455'});
	}
	
	var timer = setInterval(run,3000)
	
	
	
	
	$('.carousel ul li').click(function(){
		alert(1);
	})
	
})
