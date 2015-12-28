var username = document.getElementById("username");
var password = document.getElementById("password");
var show = document.getElementById("show");
var input = document.getElementsByTagName("input");
var status = 0;
username.addEventListener("click",function(){
	input[0].focus();
},false);
password.addEventListener("click",function(){
	input[1].focus();
},false);
show.addEventListener("click",function(){
	input[2].click();
},false);
input[2].addEventListener("click",function(){
	if(status % 2){
		input[1].setAttribute("type","password");
	}else{
		input[1].setAttribute("type","text");
	}
	status ++ ;
},false);