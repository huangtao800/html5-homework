window.onload=init;

function init(){
	var submitButton=document.getElementById("submitButton");
	submitButton.onclick=checkPassword;
}

function checkPassword(){
	var p1=document.getElementById("password").value;
	var p2=document.getElementById("confirmPassword").value;
	
	if(p1!=p2){
		alert(p1+p2);
		var appendDiv=document.getElementById("appendPassword");
		
		var wrongPasswordLabel=document.createElement("label");
		wrongPasswordLabel.setAttribute("class","tipStyle");
		wrongPasswordLabel.innerHTML="您输入的密码不匹配！";
		appendDiv.appendChild(wrongPasswordLabel);
		return false;
	}
	return true;
}


