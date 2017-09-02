var slidePosition = 1;
var tampPosition = 0;
var firstSlider = 1;
var maxPosisition = 3;
var indexDropdownMenu = 0;
var sectionOffsetTop = [];
var element = "";
var originalY = "";
var isDropdownToggle = false;
var isSubSection = false;
var isSubNavBtnInner = false;
var isBtnBeforeBtnInner = false;
var isBtnAfterBtnInner = false;
var btnBefore = "";
var btnAfter = "";
var sectionCount= 12;
var dropDownBefore = 0;
var dropDownNow = 0;

$(document).ready(function(){
	action()
	jumperAnimation();
	initial();
	floatSubNav();
	posisitionFloatSubNav();
});

function ellipsis(){
	for(i=0 ; i<sectionCount ; i++){
		$('#thumb-header-'+i).addClass('height-px-small').removeClass('height-px');
		if ($('#thumb-header-'+i)[0].scrollHeight >  43) {
			$('#thumb-header-'+i).removeClass('height-px-small').addClass('ellipsis').addClass('height-px');
		} else if ($('#thumb-header-'+i)[0].scrollHeight >  23) {
			$('#thumb-header-'+i).removeClass('height-px-small').addClass('height-px').removeClass('ellipsis');
		} else {
			$('#thumb-header-'+i).removeClass('ellipsis')
		}
	}
};

function action(){
	
}

function jumperAnimation(){
	$(".jumper").on("click", function( e ) {
		e.preventDefault();
		$("body, html").stop().animate({ 
		    scrollTop: $( $(this).attr('href') ).offset().top 
		}, 1000);
	});	
}

function initial(){
	slideShow();
	globalVariable();
}

function globalVariable(){
	sectionCount = $('#count-section').text();
	element = $(".sub-nav");
	originalY = element.offset().top;
	for(i=0 ; i<sectionCount ; i++){sectionOffsetTop[i] = $("#section-"+i);}
}

function slideShow(){
	$('#slide-1').show();
	tampPosition = slidePosition;
	slidePosition += 1;
	setTimeout(slider,5000);
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
	$('#slide-'+x).stop().show('slide', {direction: 'right'}, 1000);
	$('#slide-'+y).stop().hide('slide', {direction: 'left'}, 1000);
	setTimeout(slider, 6000) 
}

function slideRight(x, y){
	$('#slide-'+x).stop().show('slide', {direction: 'left'}, 1000);
	$('#slide-'+y).stop().hide('slide', {direction: 'right'}, 1000);
	setTimeout(slider, 6000) 
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

			btnNow = $("#btn-"+i);
			btnBefore = $("#btn-"+(i-1));
			btnAfter = $("#btn-"+(i+1));

			isBtnBeforeBtnInner = $("#btn-"+(i-1)).hasClass('sub-nav-btn-inner');
			isBtnAfterBtnInner = $("#btn-"+(i+1)).hasClass('sub-nav-btn-inner');
			isSubNavBtnInner = $("#btn-"+i).hasClass('btn-inner');
			isSubSection = $("#section-"+i).hasClass('sub-section')
			isDropdownToggle = $("#btn-"+(i)).hasClass('dropdown-toggle');

			if(isDropdownToggle){indexDropdownMenu = i;}
			if(btnNow.hasClass('btn-inner')){$("#btn-"+i).removeClass("btn-inner");}
			if(btnBefore.hasClass('sub-nav-btn-inner')){$("#btn-"+(i-1)).addClass("btn-inner");}
			if(btnAfter.hasClass('sub-nav-btn-inner')){$("#btn-"+(i+1)).addClass("btn-inner");}
			if(btnNow.hasClass('btn-outer')){$("#btn-"+i).removeClass("btn-outer");}
			if(btnBefore.hasClass('sub-nav-btn')){$("#btn-"+(i-1)).addClass("btn-outer");}
			if(btnAfter.hasClass('sub-nav-btn')){$("#btn-"+(i+1)).addClass("btn-outer");}
		} else{
			$("#btn-"+i).removeClass("sub-nav-btn-active");
			
			if($("#btn-"+i).hasClass('sub-nav-btn-inner')){$("#btn-"+i).addClass("btn-inner");}
			else{$("#btn-"+i).addClass("btn-outer");}
		}
		var bottom = $(window).height() - screen.height;

		// if(scrollTop == bottom){
		// 	console.log(i);
		// }
	}


	if(isDropdownToggle || isSubSection){
		$("#btn-"+indexDropdownMenu).addClass("sub-nav-btn-active");
		$("#btn-"+indexDropdownMenu).removeClass("btn-outer");
		$("#costum-dropdown-menu-"+indexDropdownMenu).slideDown(0);	
		for(i=0 ; i<sectionCount ; i++){
			if(indexDropdownMenu != i){
				$("#costum-dropdown-menu-"+i).slideUp(0);	
			}

			if(scrollTop < sectionOffsetTop[indexDropdownMenu].offset().top - 1){
				$("#btn-"+indexDropdownMenu).removeClass("sub-nav-btn-active");
				$("#costum-dropdown-menu-"+indexDropdownMenu).slideUp(0);	
			}
		}
	} else {
		$("#costum-dropdown-menu-"+indexDropdownMenu).slideUp(0);	
	}

	if(scrollTop > originalY){
		element.addClass("sub-nav-fixed");
	} else {
		element.removeClass("sub-nav-fixed");
	}
}

