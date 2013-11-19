
function askQuestion(){
	window.open("../include/gotoAsk.php")
	// var cookie=document.cookie;
	// var arrcookie=cookie.split(";");
	// var userid=-1;
	// for(var i=0;i<arrcookie.length;i++){
	// 	var arr=arrcookie[i].split["="];
	// 	if(arr=="id"){
	// 		userid=arr[11];
	// 		break;
	// 	}
	// }

	
	// if(userid!=-1){
	// 	window.open("../askQ/ask.html");
	// }else{
	// 	window.open("../login/login.php");
	// }
	
}

document.getElementById("askButton").onclick=askQuestion;

function check(){
	var keywords=document.getElementById("keywords").value;
	if(!keywords){
		document.getElementById("tip").style.display="inline";
		return false;
	}
	return true;
}

