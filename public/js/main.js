$(document).ready(function(){
	function isVisible( row, container ){
	    
	    var elementTop = $(row).offset().top,
	        elementHeight = $(row).height(),
	        containerTop = container.scrollTop(),
	        containerHeight = container.height(),
	        navbarTop = $("#navbar").offset().top,
	        navbarHeight = $("#navbar").height();

	    return ((((elementTop - navbarTop * 0.45 - containerTop) + elementHeight - navbarHeight * 0.45) > 0) && ((elementTop - navbarTop * 0.45 - containerTop) < containerHeight));
	}

	$(window).scroll(function(){
		if( !( isVisible($("#logo-block"), $(window)) ) ){
			$("#navbar-logo").css("display", "block");
			$("#navbar-logo").addClass('w3-animate-zoom');		
		}else {
			$("#navbar-logo").css("display", "none");
		};  
	});
});
