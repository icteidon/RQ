/*
Supersized - Fullscreen Slideshow jQuery Plugin
By Sam Dunn (www.buildinternet.com // www.onemightyroar.com)
Version: supersized.2.0.js // Relase Date: 5/7/09
Website: www.buildinternet.com/project/supersized
Thanks to Aen for preloading, fade effect, & vertical centering
*/

var $j = jQuery.noConflict();

(function($j){

	//Resize image on ready or resize
	$j.fn.supersized = function() {
		$j.inAnimation = false;
		$j.paused = false;
		var options = $j.extend($j.fn.supersized.defaults, $j.fn.supersized.options);
		
		$j(window).bind("load", function(){
			$j('#loading').hide();
			$j('#supersize').fadeIn('fast');
			$j('#content').show();
			if ($j('#slideshow .activeslide').length == 0) $j('#supersize a:first').addClass('activeslide');
			if (options.slide_captions == 1) $j('#slidecaption').html($j('#supersize .activeslide').find('img').attr('title'));
			if (options.navigation == 0) $j('#navigation').hide();
			//Slideshow
			if (options.slideshow == 1){
				if (options.slide_counter == 1){ //Initiate slide counter if active
					$j('#slidecounter .slidenumber').html(1);
	    			$j('#slidecounter .totalslides').html($j("#supersize > *").size());
	    		}
				slideshow_interval = setInterval("nextslide()", options.slide_interval);
				if (options.navigation == 1){ //Skip if no navigation
					$j('#navigation a').click(function(){  
   						$j(this).blur();  
   						return false;  
   					}); 	
					//Slide Navigation
				    $j('#nextslide').click(function() {
				    	if($j.paused) return false; if($j.inAnimation) return false;
					    clearInterval(slideshow_interval);
					    nextslide();
					    slideshow_interval = setInterval(nextslide, options.slide_interval);
					    return false;
				    });
				    $j('#prevslide').click(function() {
				    	if($j.paused) return false; if($j.inAnimation) return false;
				        clearInterval(slideshow_interval);
				        prevslide();
				        slideshow_interval = setInterval(nextslide, options.slide_interval);
				        return false;
				    });
					$j('#nextslide img').hover(function() {
						if($j.paused == true) return false;
					   	$j(this).attr("src", "images/forward.gif");
					}, function(){
						if($j.paused == true) return false;
					    $j(this).attr("src", "images/forward_dull.gif");
					});
					$j('#prevslide img').hover(function() {
						if($j.paused == true) return false; 
					    $j(this).attr("src", "images/back.gif");
					}, function(){
						if($j.paused == true) return false;
					    $j(this).attr("src", "images/back_dull.gif");
					});
					
				    //Play/Pause Button
				    $j('#pauseplay').click(function() {
				    	if($j.inAnimation) return false;
				    	var src = ($j(this).find('img').attr("src") === "images/play.gif") ? "images/pause.gif" : "images/play.gif";
      					if (src == "images/pause.gif"){
      						$j(this).find('img').attr("src", "images/play.gif");
      						$j.paused = false;
					        slideshow_interval = setInterval(nextslide, options.slide_interval);  
				        }else{
				        	$j(this).find('img').attr("src", "images/pause.gif");
				        	clearInterval(slideshow_interval);
				        	$j.paused = true;
				        }
      					$j(this).find('img').attr("src", src);
					    return false;
				    });
				    $j('#pauseplay').mouseover(function() {
				    	var imagecheck = ($j(this).find('img').attr("src") === "images/play_dull.gif");
				    	if (imagecheck){
      						$j(this).find('img').attr("src", "images/play.gif"); 
				        }else{
				        	$j(this).find('img').attr("src", "images/pause.gif");
				        }
				    });
				    
				    $j('#pauseplay').mouseout(function() {
				    	var imagecheck = ($j(this).find('img').attr("src") === "images/play.gif");
				    	if (imagecheck){
      						$j(this).find('img').attr("src", "images/play_dull.gif"); 
				        }else{
				        	$j(this).find('img').attr("src", "images/pause_dull.gif");
				        }
				        return false;
				    });
				}
			}
		});
				
		$j(document).ready(function() {
			$j('#supersize').resizenow(); 
		});
		
		//Pause when hover on image
		$j('#supersize > *').hover(function() {
	   		if (options.slideshow == 1 && options.pause_hover == 1){
	   			if(!($j.paused) && options.navigation == 1){
	   				$j('#pauseplay > img').attr("src", "images/pause.gif"); 
	   				clearInterval(slideshow_interval);
	   			}
	   		}
	   		original_title = $j(this).find('img').attr("title");
	   		if($j.inAnimation) return false; else $j(this).find('img').attr("title","");
	   	}, function() {
			if (options.slideshow == 1 && options.pause_hover == 1){
				if(!($j.paused) && options.navigation == 1){
					$j('#pauseplay > img').attr("src", "images/pause_dull.gif");
					slideshow_interval = setInterval(nextslide, options.slide_interval);
				} 
			}
			$j(this).find('img').attr("title", original_title);	
	   	});
		
		$j(window).bind("resize", function(){
    		$j('#supersize').resizenow(); 
		});
		
		$j('#supersize').hide();
		$j('#content').hide();
	};
	
	//Adjust image size
	$j.fn.resizenow = function() {
		var options = $j.extend($j.fn.supersized.defaults, $j.fn.supersized.options);
	  	return this.each(function() {
	  		
			//Define image ratio
			var ratio = options.startheight/options.startwidth;
			
			//Gather browser and current image size
			var imagewidth = $j(this).width();
			var imageheight = $j(this).height();
			var browserwidth = $j(window).width();
			var browserheight = $j(window).height();
			var offset;

			//Resize image to proper ratio
			if ((browserheight/browserwidth) > ratio){
			    $j(this).height(browserheight);
			    $j(this).width(browserheight / ratio);
			    $j(this).children().height(browserheight);
			    $j(this).children().width(browserheight / ratio);
			} else {
			    $j(this).width(browserwidth);
			    $j(this).height(browserwidth * ratio);
			    $j(this).children().width(browserwidth);
			    $j(this).children().height(browserwidth * ratio);
			}
			if (options.vertical_center == 1){
				$j(this).children().css('left', (browserwidth - $j(this).width())/2);
				$j(this).children().css('top', (browserheight - $j(this).height())/2);
			}
			return false;
		});
	};
	
	$j.fn.supersized.defaults = { 
			startwidth: 4,  
			startheight: 3,
			vertical_center: 1,
			slideshow: 1,
			navigation:1,
			transition: 1, //0-None, 1-Fade, 2-slide top, 3-slide right, 4-slide bottom, 5-slide left
			pause_hover: 0,
			slide_counter: 1,
			slide_captions: 1,
			slide_interval: 5000
	};
	
})(jQuery);

	//Slideshow Next Slide
	function nextslide() {
		if($j.inAnimation) return false;
		else $j.inAnimation = true;
	    var options = $j.extend($j.fn.supersized.defaults, $j.fn.supersized.options);
	    var currentslide = $j('#supersize .activeslide');
	    currentslide.removeClass('activeslide');
		
	    if ( currentslide.length == 0 ) currentslide = $j('#supersize a:last');
			
	    var nextslide =  currentslide.next().length ? currentslide.next() : $j('#supersize a:first');
	    var prevslide =  nextslide.prev().length ? nextslide.prev() : $j('#supersize a:last');
		
		
		//Display slide counter
		if (options.slide_counter == 1){
			var slidecount = $j('#slidecounter .slidenumber').html();
			currentslide.next().length ? slidecount++ : slidecount = 1;
		    $j('#slidecounter .slidenumber').html(slidecount);
		}
		
		$j('.prevslide').removeClass('prevslide');
		prevslide.addClass('prevslide');
		
		//Captions require img in <a>
	    if (options.slide_captions == 1) $j('#slidecaption').html($j(nextslide).find('img').attr('title'));
		
	    nextslide.hide().addClass('activeslide')
	    	if (options.transition == 0){
	    		nextslide.show(); $j.inAnimation = false;
	    	}
	    	if (options.transition == 1){
	    		nextslide.fadeIn(1000, function(){$j.inAnimation = false;});
	    	}
	    	if (options.transition == 2){
	    		nextslide.show("slide", { direction: "up" }, 'slow', function(){$j.inAnimation = false;});
	    	}
	    	if (options.transition == 3){
	    		nextslide.show("slide", { direction: "right" }, 'slow', function(){$j.inAnimation = false;});
	    	}
	    	if (options.transition == 4){
	    		nextslide.show("slide", { direction: "down" }, 'slow', function(){$j.inAnimation = false;});
	    	}
	    	if (options.transition == 5){
	    		nextslide.show("slide", { direction: "left" }, 'slow', function(){$j.inAnimation = false;});
	    	}
	    	
	    $j('#supersize').resizenow();//Fix for resize mid-transition
	    
	}
	
	//Slideshow Previous Slide
	function prevslide() {
		if($j.inAnimation) return false;
		else $j.inAnimation = true;
	    var options = $j.extend($j.fn.supersized.defaults, $j.fn.supersized.options);
	    var currentslide = $j('#supersize .activeslide');
	    currentslide.removeClass('activeslide');
		
	    if ( currentslide.length == 0 ) currentslide = $j('#supersize a:first');
			
	    var nextslide =  currentslide.prev().length ? currentslide.prev() : $j('#supersize a:last');
	    var prevslide =  nextslide.next().length ? nextslide.next() : $j('#supersize a:first');
		
		//Display slide counter
		if (options.slide_counter == 1){
			var slidecount = $j('#slidecounter .slidenumber').html();
			currentslide.prev().length ? slidecount-- : slidecount = $j("#supersize > *").size();
		    $j('#slidecounter .slidenumber').html(slidecount);
		}
		
		$j('.prevslide').removeClass('prevslide');
		prevslide.addClass('prevslide');
		
		//Captions require img in <a>
	    if (options.slide_captions == 1) $j('#slidecaption').html($j(nextslide).find('img').attr('title'));
		
	    nextslide.hide().addClass('activeslide')
	    	if (options.transition == 0){
	    		nextslide.show(); $j.inAnimation = false;
	    	}
	    	if (options.transition == 1){
	    		nextslide.fadeIn(1000, function(){$j.inAnimation = false;});
	    	}
	    	if (options.transition == 2){
	    		nextslide.show("slide", { direction: "down" }, 'slow', function(){$j.inAnimation = false;});
	    	}
	    	if (options.transition == 3){
	    		nextslide.show("slide", { direction: "left" }, 'slow', function(){$j.inAnimation = false;});
	    	}
	    	if (options.transition == 4){
	    		nextslide.show("slide", { direction: "up" }, 'slow', function(){$j.inAnimation = false;});
	    	}
	    	if (options.transition == 5){
	    		nextslide.show("slide", { direction: "right" }, 'slow', function(){$j.inAnimation = false;});
	    	}
	    	
	    	$j('#supersize').resizenow();//Fix for resize mid-transition
	}