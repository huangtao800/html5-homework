window.onload=init;

function init(){
	var submitButton=document.getElementById("submitButton");
	submitButton.onclick=register;
}

function register(){
	var p1=document.getElementById("password").innerHTML;
	var p2=document.getElementById("confirmPassword").value;
	
	if(p1!=p2){
		var appendDiv=document.getElementById("appendPassword");
		
		var wrongPasswordLabel=document.createElement("label");
		wrongPasswordLabel.setAttribute("class","tipStyle");
		wrongPasswordLabel.innerHTML="您输入的密码不正确！";
		appendDiv.appendChild(wrongPasswordLabel);
	}
}

