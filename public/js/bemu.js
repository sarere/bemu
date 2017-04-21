var slidePosition = 1;
var tampPosition = 0;
var firstSlider = 1;
var maxPosisition = 6;
var indexDropdownMenu = 0;
var sectionOffsetTop = [];
var element = "";
var originalY = "";
var isDropdownToggle = false;
var isSubSection = false;
var sectionCount= 6;

$(document).ready(function(){
	jumperAnimation();
	initial();
	floatSubNav();	
});

function jumperAnimation(){
	$(".jumper").on("click", function( e ) {
		e.preventDefault();
		$("body, html").animate({ 
		    scrollTop: $( $(this).attr('href') ).offset().top 
		}, 600);
	});	
}

function initial(){
	slideShow();
	globalVariable();
	posisitionFloatSubNav();
}

function globalVariable(){
	element = $(".sub-nav");
	originalY = element.offset().top;
	isDropdownToggle = false;
	for(i=0 ; i<sectionCount ; i++){sectionOffsetTop[i] = $("#section-"+i);}
}

function slideShow(){
	$('#slide-1').show();
	tampPosition = slidePosition;
	slidePosition += 1;
	setTimeout(slider,5000);
}

function floatSubNav(){
	$(window).on('scroll', function(event) {
		posisitionFloatSubNav();
	});
}

function posisitionFloatSubNav(){
	var scrollTop = $(window).scrollTop();
	
	for(i=0 ; i<sectionCount ; i++){	
		if(scrollTop >= sectionOffsetTop[i].offset().top - 1) {
			$("#btn-"+(i-1)).removeClass("sub-nav-btn-active");
			$("#btn-"+i).addClass("sub-nav-btn-active");
			$("#btn-"+(i+1)).removeClass("sub-nav-btn-active");
			isSubSection = $("#section-"+i).hasClass('sub-section')
			isDropdownToggle = $("#btn-"+(i)).hasClass('dropdown-toggle');
			if(isDropdownToggle){
				indexDropdownMenu = i;
			}
		}
	}
	if(isDropdownToggle || isSubSection){
		$("#btn-"+indexDropdownMenu).addClass("sub-nav-btn-active");
		$("#costum-dropdown-menu-"+indexDropdownMenu).slideDown("fast");	
	} else {
		$("#costum-dropdown-menu-"+indexDropdownMenu).slideUp("fast");	
	}

	if(scrollTop > originalY){
		element.addClass("sub-nav-fixed");
	} else {
		element.removeClass("sub-nav-fixed");
	}
}

function slider(){
	if(slidePosition == maxPosisition){
		slideLeft(firstSlider, slidePosition - 1);
		slidePosition = firstSlider + 1;
		tampPosition = firstSlider;
	} else if(slidePosition > tampPosition){
		slideLeft(slidePosition,tampPosition);
		tampPosition = slidePosition;
		slidePosition += 1;
	}
}

function slideLeft(x, y){
	$('#slide-'+x).show('slide', {direction: 'right'}, 1000);
	$('#slide-'+y).hide('slide', {direction: 'left'}, 1000);
	setTimeout(slider, 6000) 
}

function slideRight(x, y){
	$('#slide-'+x).show('slide', {direction: 'left'}, 1000);
	$('#slide-'+y).hide('slide', {direction: 'right'}, 1000);
	setTimeout(slider, 6000) 
}
