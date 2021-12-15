	// Product page circles animation
	if($('.fixed-product-img--circles').length > 0 || $(".key-ingredients__clip").length > 0)
	{
		var paddingCircle1 = parseInt($("#circle-1").css('height'));
		var paddingCircle2 = parseInt($("#circle-2").css('height'));
		var paddingCircle3 = parseInt($("#circle-3").css('height'));
		var changepadding = 200;
		var newpaddingCircle1 = paddingCircle1-changepadding;
		var newpaddingCircle2 = paddingCircle2-changepadding;
		var newpaddingCircle3 = paddingCircle3-changepadding;

		var rippleeffect = setInterval(function(){

			$("#circle-3").animate({
				'height' : newpaddingCircle3,
				'width' : newpaddingCircle3,
				'opacity' : '0',
			}, 3500, 'linear');


			$("#circle-2").animate({
				'height' : newpaddingCircle2,
				'width' : newpaddingCircle2,
			}, 3500, 'linear');

			$("#circle-1").animate({
				'height' : newpaddingCircle1,
				'width' : newpaddingCircle1,
				'opacity' : '1',
			}, 3500, 'linear');

			$("#circle-3").animate({
				'height' : paddingCircle3,
				'width' : paddingCircle3,
				'opacity' : ['1', "swing"],
			}, 0);

			$("#circle-2").animate({
				'height' : paddingCircle2,
				'width' : paddingCircle2,
			}, 0);

			$("#circle-1").animate({
				'height' : paddingCircle1,
				'width' : paddingCircle1,
				'opacity' : '0',
			}, 0);
		},0);
	}
//product page product slide down and up
if ($(window).width() > 800) {
	// slideWrapperOffset = $('.product-slide-wrapper').offset().top + $('.product-slide-wrapper').height();
	// fixedImg = $('.fixed-product-img').offset().top + $('.fixed-product-img').height();
	// $(window).scroll(function(){
	// 	if(){

	// 	}
	// })

	if ($('.fixed-product-img').length) {

		$(window).scroll(function(){
			wrapperHeight = $('.product-slide-wrapper').height();
			wrapperOffset = $('.product-slide-wrapper').offset().top;
			wrapperOffsetBottom = wrapperHeight + wrapperOffset;
			windowScroll = $(window).scrollTop();
			windowHeight = $(window).height();
			imgHeight = $('.fixed-product-img:not(.fixed-product-img--circles)').height();
			imgOffset = $('.fixed-product-img:not(.fixed-product-img--circles)').offset().top;
			imgOffsetBottom = imgHeight + imgOffset;
			flexibleTop = parseInt($('.fixed-product-img').css("top"));
			if(flexibleTop > 150){
				flexibleTop = 150;
			}
			if (windowScroll > wrapperOffset){
				if( windowScroll < ((wrapperOffsetBottom - windowHeight + (windowHeight - imgHeight - flexibleTop)-150))){

					$('.fixed-product-img').addClass('fixed');
					$('.fixed-product-img').removeClass('stuck');
				}

				else{
					$('.fixed-product-img').removeClass('fixed');
					$('.fixed-product-img').addClass('stuck');

				}
			}
			else{
				$('.fixed-product-img').removeClass('fixed');
				$('.fixed-product-img').removeClass('stuck');
			}

		});

		// $('.fixed-product-img').addClass('not-bottom');
		// $('.fixed-product-img:not(.fixed-product-img--circles)').stick_in_parent({
		// 	parent: '.product-slide-wrapper',
		// 	offset_top: 150
		// })  .on("sticky_kit:bottom", function(e) {

		// 	$('.fixed-product-img').removeClass('not-bottom');
		// })
		// .on("sticky_kit:unbottom", function(e) {

		// 	$('.fixed-product-img').addClass('not-bottom');
		// })
		// $('.fixed-product-img--circles').stick_in_parent({
		// 	parent: '.product-slide-wrapper',
		// 	offset_top: 150
		// });

		$heading1 = $('.fixed-product-img__heading-1');
		$heading2 = $('.fixed-product-img__heading-2');
		$heading3 = $('.fixed-product-img__heading-3');
		// $heading1and3 = $('.fixed-product-img__heading-1, .fixed-product-img__heading-3');
		$heading1MomentElement = $('.heading1MomentElement');
		$heading2MomentElement = $('.heading2MomentElement');
		$heading3MomentElement = $('.heading3MomentElement');

		$heading2.hide();
		$heading3.hide();
		moment1 = false;
		moment2 = false;
		moment3 = false;

		$(window).scroll(function(){
			windowScrollTop = $(window).scrollTop() + 350;

			if ($heading1MomentElement.offset().top < windowScrollTop &&
				$heading2MomentElement.offset().top < windowScrollTop &&
				$heading3MomentElement.offset().top < windowScrollTop ){
				$heading2.fadeOut('300', function() {
					$heading1.fadeOut();
					$heading3.fadeIn();
				});
		}

		else if($heading1MomentElement.offset().top < windowScrollTop &&
			$heading2MomentElement.offset().top < windowScrollTop){
			$('#circle-1, #circle-2, #circle-3').addClass('color');
		$heading1.fadeOut('300', function() {
			$heading3.fadeOut();
			$heading2.fadeIn();
		});


	}

	else if($heading1MomentElement.offset().top < windowScrollTop){
		$('#circle-1, #circle-2, #circle-3').removeClass('color');
		$heading2.fadeOut('300', function() {
			$heading3.fadeOut();
			$heading1.fadeIn();
		});
	}

	if($('.instructions-column-2').offset().top < $(window).scrollTop()){
	}
});

	}
}
