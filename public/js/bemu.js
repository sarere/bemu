var slidePosition = 1;
var tampPosition = 0;
var firstSlider = 1;
var maxPosisition = 6;

$(document).ready(function(){
	$(".jumper").on("click", function( e ) {

		e.preventDefault();

		$("body, html").animate({ 
		    scrollTop: $( $(this).attr('href') ).offset().top 
		}, 600);

	});	
	$('#slide-1').show();
	tampPosition = slidePosition;
	slidePosition += 1;
	setTimeout(slider,5000);
});

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
