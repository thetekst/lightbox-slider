<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<script src='jquery-1.8.2.min.js'></script>
	<script src='jquery.bxslider/jquery.bxslider.min.js'></script>
	<link href='jquery.bxslider/jquery.bxslider.css' rel='stylesheet' />
	<link href='my-jquery.bxslider.css' rel='stylesheet' />
	<script>
		jQuery(document).ready(function(){
			$('.bxslider').bxSlider({
				// other plugin's options http://bxslider.com/options
				auto: true, 		// слайдшоу
				autoControls: false, // кнопки пауза/показывать для слайдшоу
				controls: true, 	// кнопки перелистывания по бокам
				autoHover: true, 	// при наведении курсора - пауза
				//maxSlides: 2, 	// макс число слайдов
				randomStart: true,
				//speed: 500, 		// скорость прокрутки
				pause: 5000,
				mode: 'fade', // тип перелистывания options: 'horizontal', 'vertical', 'fade'
				buildPager: function(slideIndex){
					switch(slideIndex){
						case 0:
							return '<img src="./img/thumbs/hill_trees.jpg">';
						case 1:
							return '<img src="./img/thumbs/me_trees.jpg">';
						case 2:
							return '<img src="./img/thumbs/houses.jpg">';
					}
				}
			});
		});
	</script>

</head>
<body>

<div id="parent-post-slider">
	<div id="lightbox">
		<div id="lightbox-child">
			<img src="" />
			<a class="close" title="Close">X</a>
		</div>
	</div>
	
	<ul class="bxslider">
	  <li><img src="./img/730_200/hill_trees.jpg" /><p>Описание 1</p></li>
	  <li><img src="./img/730_200/me_trees.jpg" /><p>Описание 2</p></li>
	  <li><img src="./img/730_200/houses.jpg" /><p>Описание 3</p></li>
	</ul>
</div>

<script>
	jQuery(document).ready(function(){
		jQuery(".bxslider li img").click(function(event){
			event.preventDefault(); // does not redirect on page
			var srcImg = jQuery(this).attr("src");
			
			//	show lightbox
			jQuery("#lightbox").css({'display':'block'}).show();
			
			// set attr (width and height) to img
			jQuery("#lightbox-child img").attr({
			  src: srcImg,
			  width: function(){
				return jQuery('#lightbox-child img').width()
			  },
			  height: function(){
				return jQuery('#lightbox-child img').height()
			  }
			});
			
			// align lightbox img
			jQuery("#lightbox-child").css({
				'margin-left': function(){
					var w = (jQuery(window).width() - jQuery('#lightbox-child img').width())/2;
					return w;
				},
				'margin-top': function(){
					var h = (jQuery(window).height() - jQuery('#lightbox-child img').height())/2;
					return h;
				}
			});
		});
		jQuery(".close").click(function(){
			jQuery("#lightbox").css({'display':'none'}).hide();
		});
	});
</script>
</body>
</html>