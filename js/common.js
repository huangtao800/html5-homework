
function askQuestion(){
	var cookie=document.cookie;
	var arrcookie=cookie.split(";");
	var userid;
	for(var i=0;i<arrcookie.length;i++){
		var arr=arrcookie[i].split["="];
		if(arr=="id"){
			userid=arr[1];
			break;
		}
	}

	
	if(userid){
		window.open("../askQ/ask.html");
	}else{
		window.open("../login/login.php");
	}
	
}

document.getElementById("askButton").onclick=askQuestion;

