var key = ">";
var lastCommand = '';
var lastRandomD = 1;
var afo = "0";
var tup = 200;

var inputPromptKey = document.getElementById("command");

inputPromptKey.addEventListener("keydown", function (e) {
    if (e.key === "Enter") {
		lCommand = '';
		command = document.getElementById("command").value;
		for(var i = 0, l = command.length; i < l; i++) {
			if(i == 0 && command[i] != '\n') {
				lCommand += command[i];
			} else { lCommand += command[i]; }
		}
		lCommand = lCommand.replace('\n', '');
		lastCommand = lCommand;
		if(lastCommand == "clear" || lastCommand == "cls"){ clearObsoleteCommands(); } 
		else inputKeyPrompt(lCommand);
        document.getElementById("command").value = '';
    } else if (e.key == "ArrowUp"){
		e.preventDefault();
		inputPrompt = document.getElementById("command");
		inputPrompt.value = lastCommand;
		inputPrompt = document.getElementById("command");
		inputPrompt.focus();
		inputPrompt.setSelectionRange(inputPrompt.value.length,inputPrompt.value.length);
	}
});

function inputKeyPrompt(command) {
    var inputPromptKey = command;
    var url = urlBase + "promptCommands/inputKey";
    $.ajax({
        type: "POST",
        url: url,
        data: { 
			"input": inputPromptKey,
			"afo" : afo
		},
        success: function(response) {
            var retorno = JSON.parse(response);
            if (retorno.type == 1) {
                if (retorno.status == 0) {
                    addLineP(retorno.message);
                } else {
                    addLineF(retorno.message);
                }
            }
			if (retorno.action == 2){
				var fs = retorno.message.split(";");
				addLineNormal(inputPromptKey);
				for (i = 0; i < fs.length; i++) {
					addLineNormal(fs[i]);
				}
			}
			if (retorno.action == 3) {
				addLineNormal(inputPromptKey);
				key = retorno.result;
				afo = retorno.fde;
				document.getElementById("greenSet").innerHTML = key;
			}
			if (retorno.action == 4) {
				addLineNormal(inputPromptKey);
				key = retorno.result;
				afo = retorno.fde;
				document.getElementById("greenSet").innerHTML = key;
			}
			if (retorno.action == 5) {
				addLineNormal(inputPromptKey);
				addDelayNormalLine(retorno.result, true);
			}
			if (retorno.action == 6){
				afo = retorno.fde;
				key = retorno.result;
				addLineNormal("");
				document.getElementById("greenSet").innerHTML = key;
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
	}, tup);
	inCommand = false;
}

function addLineNormal(nextText) {
	var com = document.getElementById("command");
	com.disabled = true;
	com.value = "";
	var lastDiv = document.getElementById("lastCommands");
	np = document.createElement("p");
	np.setAttribute("id","lastCommand");
	np.innerHTML = "<b id='greenSetNoAnimation'>"+key+" </b>" + nextText;
	lastDiv.appendChild(np);
	com.disabled = false;
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
	}, tup);
	inCommand = false;
}


async function addDelayNormalLine(textLines, existDelay) {
	addLineNormal("");
	document.getElementById("prpCF").style.visibility = "hidden";
    for (let i = 0; i < textLines.length; i++) {
		var lastDiv = document.getElementById("lastCommands");
		var com = document.getElementById("command");
		com.disabled = true;
		com.value = "";
		np = document.createElement("p");
		np.setAttribute("id","lastCommand");
		np.innerHTML = textLines[i];
		lastDiv.appendChild(np);
		com.disabled = false;
		inCommand = false;
		if (existDelay){
			var randomD = Math.floor(Math.random() * 1000);
			await sleep(randomD + lastRandomD);
			lastRandomD = randomD;
		}
    }
	document.getElementById("prpCF").style.visibility = "visible";
}

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

function clearObsoleteCommands() {
	const obsoleteCommands = document.getElementById("lastCommands");
	while (obsoleteCommands.firstChild) {
		obsoleteCommands.removeChild(obsoleteCommands.lastChild);
	}
}