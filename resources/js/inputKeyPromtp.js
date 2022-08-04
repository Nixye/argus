var key = ">";
var lastCommand = "";

var inputPromptKey = document.getElementById("command");
inputPromptKey.addEventListener("keydown", function (e) {
    if (e.key === "Enter") {
        lastCommand = document.getElementById("command").value;
        inputKeyPrompt();
        document.getElementById("command").value = "";
    } else if (e.key == "Up"){
		document.getElementById("command").value = lastCommand;
	}
});

function inputKeyPrompt() {
    var inputPromptKey = document.getElementById("command").value;
    var url = urlBase + "promptCommands/inputKey";
    $.ajax({
        type: "POST",
        url: url,
        data: { "input": inputPromptKey },
        success: function(response) {
            var retorno = JSON.parse(response);
            if (retorno.type == 1) {
                if (retorno.status == 0) {
                    addLineP(retorno.message);
                } else {
                    addLineF(retorno.message);
                }
            }
            document.getElementById("command").focus();
        }
    });
}

function validateHasLogin() {
    var hasLoginUser = getCookie("passLoginUser");
    var hasLoginPassword = getCookie("passLoginUser");
    if (hasLoginUser == 1 && hasLoginPassword == 1){
        document.getElementById("lastCommand").remove();
    }
}


function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }


function addLineP(nextText) {
	var com = document.getElementById("command");
	com.disabled = true;
	com.value = "";
	var lastDiv = document.getElementById("lastCommands");
	var p = document.createElement("p");
	p.setAttribute("id","lastCommand");
	p.innerHTML = "<b id='greenSetNoAnimation'>" + key + " </b>" + lastCommand;
	lastDiv.appendChild(p);
	var np = document.createElement("p");
	np.setAttribute("id","awaiter");
	np.innerHTML = "<b id='greenSetA'>"+key+" </b>";
	lastDiv.appendChild(np);
	np = null;
	setTimeout(function() {
		lastDiv.removeChild(document.getElementById("awaiter"));
		np = document.createElement("p");
		np.setAttribute("id","lastCommand");
		np.innerHTML = "<b id='greenSetNoAnimation'>"+key+" </b>" + nextText;
		lastDiv.appendChild(np);
		com.disabled = false;
		//init();
	},4000);
	inCommand = false;
}

function addLineF(nextText) {
	var com = document.getElementById("command");
	com.disabled = true;
	com.value = "";
	var lastDiv = document.getElementById("lastCommands");
	var p = document.createElement("p");
	p.setAttribute("id","lastCommand");
	p.innerHTML = "<b id='greenSetNoAnimation'>"+key+" </b>" + lastCommand;
	lastDiv.appendChild(p);
	var np = document.createElement("p");
	np.setAttribute("id","awaiter");
	np.innerHTML = "<b id='greenSetA'>"+key+" </b>";
	lastDiv.appendChild(np);
	np = null;
	setTimeout(function() {
		lastDiv.removeChild(document.getElementById("awaiter"));
		np = document.createElement("p");
		np.setAttribute("id","lastCommand");
		np.innerHTML = "<b id='greenSetNoAnimationF'>"+key+" </b>" + nextText;
		lastDiv.appendChild(np);
		com.disabled = false;
		//init();
	},4000);
	inCommand = false;
}