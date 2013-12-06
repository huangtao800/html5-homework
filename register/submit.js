window.onload=init;

function init(){
	var submitButton=document.getElementById("submitButton");
	submitButton.onclick=checkPassword;
}

function checkPassword(){
	var p1=document.getElementById("password").value;
	var p2=document.getElementById("confirmPassword").value;
	
	if(p1!=p2){
		var wrongPasswordLabel=document.getElementById("wrongPasswordLabel");
		if(!wrongPasswordLabel){
			var appendDiv=document.getElementById("appendPassword");
			
			wrongPasswordLabel=document.createElement("label");
			wrongPasswordLabel.setAttribute("id","wrongPasswordLabel");
			wrongPasswordLabel.setAttribute("class","tipStyle");
			wrongPasswordLabel.innerHTML="您输入的密码不匹配！";
			appendDiv.appendChild(wrongPasswordLabel);			
		}

		return false;
	}
	return true;
}


