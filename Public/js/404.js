var flx = $("#eye-left").position().left;
var fly = $("#eye-left").position().top;
var slx = $("#eye-right").position().left;
var sly = $("#eye-right").position().top;
$(document).mousemove(function(e){
	var x = e.pageX;
	var y = e.pageY;
	var firstx =  x - 605;
	var secondx = x - 741;
	var dy = 268 - y;
	var firstrad = Math.atan(dy/firstx);
	if(firstx < 0){
		firstrad += Math.PI;
	}
	var secondrad = Math.atan(dy/secondx);
	if(secondx < 0){
		secondrad += Math.PI;
	}
	var firstleft = Math.cos(firstrad)*7;
	var firstbottom = Math.sin(firstrad)*7;
	var secondleft = Math.cos(secondrad)*7;
	var secondbottom = Math.sin(secondrad)*7
	firstbottom = parseFloat(firstbottom) * -1;
	secondbottom = parseFloat(secondbottom) * -1;
	$("#eye-left").css({
		"left" : firstleft + flx + "px",
		"top": firstbottom + fly + "px"
	});
	$("#eye-right").css({
		"left" : secondleft + slx + "px",
		"top": secondbottom + sly + "px"
	});
});