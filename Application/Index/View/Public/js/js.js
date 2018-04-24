//首页轮播图
$(function(){
	var c = 0;
	function run(){
		c++;
		if(c==5){
			$('.lunbo').css('left','0');
			c=1;
		}
		if(c==4){
			$('.carousel ul li').eq(0).css({'background':'#fff','border':'2px solid #2AAD6F'});
			$('.carousel ul li').eq(3).css({'background':'#7B7B7B','border':'2px solid #7B7B7B'});
		}
		var left = c*-1349;
		$('.lunbo').animate({'left':left+'px'},500);
		$('.carousel ul li').eq(c).stop().css({'background':'#fff','border':'2px solid #2AAD6F'}).siblings('li').css({'background':'#7B7B7B','border':'2px solid #7B7B7B'});
	}
	//设置定时器
	var timer = setInterval(run,2000)
	
	//鼠标移入大轮播范围状态
	$('.lunbo').hover(function(){
		$('.left').css({'display':'block'});
		$('.right').css({'display':'block'});
		clearInterval(timer);
	},function(){
		timer = setInterval(run,2000);
		$('.left').css({'display':'none'});
		$('.right').css({'display':'none'});
	})
	//鼠标移入li事件
	$('.carousel ul li').hover(function(){
		clearInterval(timer);
		c = $(this).index();
		var left = c*-1349;
		$('.lunbo').stop().animate({'left':left+'px'},300);
		$('.carousel ul li').eq(c).stop().css({'background':'#fff','border':'2px solid #2AAD6F'}).siblings('li').css({'background':'#7B7B7B','border':'2px solid #7B7B7B'});
	},function(){
		timer = setInterval(run,2000);
	})

	//左键单击事件
	$('.left').hover(function(){
		clearInterval(timer);
		$('.left').css({'display':'block'});
		$('.right').css({'display':'block'});
	})
	//轮播图左键单击事件
	$('.left').click(function(){
		c--;
		if(c==-1){
			$('.lunbo').css('left', '-5396px');
			c=3;
		}
		var left = c*-1349;
		$('.lunbo').stop().animate({'left':left+'px'}, 300);
		$('.carousel ul li').eq(c).stop().css({'background':'#fff','border':'2px solid #2AAD6F'}).siblings('li').css({'background':'#7B7B7B','border':'2px solid #7B7B7B'});
	})
	//移入停止定时器
	$('.right').hover(function(){
		clearInterval(timer);
		$('.left').css({'display':'block'});
		$('.right').css({'display':'block'});
	})
	//轮播图右键单击事件
	$('.right').click(function(){
		c++;
		if(c==4){
			$('.carousel ul li').eq(0).css({'background':'#fff','border':'2px solid #2AAD6F'});
			$('.carousel ul li').eq(3).css({'background':'#7B7B7B','border':'2px solid #7B7B7B'});
		}
		if(c==5){
			$('.lunbo').css('left', '0');
			c=1;
		}
		var left = c*-1349;
		$('.lunbo').stop().animate({'left':left+'px'}, 300);
		$('.carousel ul li').eq(c).stop().css({'background':'#fff','border':'2px solid #2AAD6F'}).siblings('li').css({'background':'#7B7B7B','border':'2px solid #7B7B7B'});
	})	
})


//商品页
$(function(){
	//商品页商品图
	$('.shangpin_box ul li').first().addClass('lv');
	$('.shangpin_box ul a').click(function(){
		var c = $(this).index();
		var left = c*-588;
		$('.imgbox').animate({'left':left+'px'},300);
		$('.shangpin_box ul li').removeClass('lv');
		$('.shangpin_box ul li').eq(c).addClass('lv');
	})
	
	
	
	//商品数量选择
	$('.jia').click(function(){
		var s = $('.shuliang').val();
		s = ++s;
		$('.shuliang').val(s);
	})
	
	$('.jian').click(function(){
		var s = $('.shuliang').val();
		if(s>1){
			s = --s;
		}
		$('.shuliang').val(s);
	})
	
	

	
	
})
