var requirejs = require('requirejs');
var lineReader = require('line-reader');

var lastCommand = "";
var user = "";
var password = "";
var iterationsPassedCount = 1;
var folder = 0;
var logged = false;
var key = ">";
var inCommand = false;
var commandEncounter = false;

function init() {
	var commandIn = document.getElementById("command");
	commandIn.focus();
}

function checkInput() {
    var event = window.event || event.which;
    if (event.keyCode == 13) {
		commandEncounter = false;
        event.preventDefault();
		lastCommand = document.getElementById("command").value;
        verifyCommandChoise();
    }else if (event.keyCode == 38){
		document.getElementById("command").value = lastCommand;
	}
}

function verifyCommandChoise(){
	if (!inCommand) {
		inCommand = true;
		if (logged == false) {
			if(iterationsPassedCount == 0) {
				if (lastCommand == "Homero") {
					iterationsPassedCount++;
					addLineP("Sucesso, agora por favor, insira a <b>Senha</b> de acesso.");
				} else {
					addLineF("Usuario Incorreto, dica de usuario: Ilíada");
				}
			} else if (iterationsPassedCount == 1) {
				if (lastCommand == "Agamenon") {
					logged = true;
					addLineP("Sucesso! Direitos ás pastas concedido, para navegar entre elas utilize os comandos, ls (listar) cd (acessar) por exemplo cd documents/pictures");
				} else {
					addLineF('Usuario Incorreto, lembrete da senha de usuario: "Homero, Ilíada 11. 36 ff"');
				}
			}
		} else {
			if (lastCommand == "ls" && folder == 0){
				addNewLine("- documents");
				addNewNoRepeatCommandLine("- projects");
				commandEncounter = true;
			}
			folderDocuments();
			folderPictures();
			if (!commandEncounter){
				addNewLine("Comando não identificado!");
			}
		}
	}
}

function folderDocuments(){
	if (lastCommand == "ls" && folder == 1){
		commandEncounter = true;
		addNewLine("- pictures");
		addNewNoRepeatCommandLine("- notes");
	}
	if (lastCommand == "cd.." && folder == 1){
		commandEncounter = true;
		addNewNoRepeatCommandLine(lastCommand);
		folder = 0;
		key = "> "; 
		document.getElementById("greenSet").innerHTML = key;
	}
	if (lastCommand == "ls documents" && folder < 1){
		commandEncounter = true;
		addNewLine("- pictures");
		addNewNoRepeatCommandLine("- notes");
	}
	if (lastCommand == "cd documents" && folder < 1){ 
		commandEncounter = true;
		addNewNoRepeatCommandLine(lastCommand);
		key = ">#documents "; 
		folder = 1;
		document.getElementById("greenSet").innerHTML = key;
	}
}

function folderPictures(){
	if (lastCommand == "ls" && folder == 2){
		commandEncounter = true;
		addNewLine("- Relic.encrypt.png");
		addNewNoRepeatCommandLine("- Constructo.png");
		addNewNoRepeatCommandLine("- Subject33.encrypt.png");
	}
	if (lastCommand == "cd.." && folder == 2){
		commandEncounter = true;
		addNewNoRepeatCommandLine(lastCommand);
		folder = 1;
		key = ">#documents "; 
		document.getElementById("greenSet").innerHTML = key;
	}
	if (lastCommand == "cd...." && folder == 2){
		commandEncounter = true;
		addNewNoRepeatCommandLine(lastCommand);
		folder = 0;
		key = "> "; 
		document.getElementById("greenSet").innerHTML = key;
	}
	if ((lastCommand == "cd pictures" && folder == 1) || (lastCommand == "cd documents/pictures" && folder < 2)){
		commandEncounter = true;
		folder = 2;
		addNewNoRepeatCommandLine(lastCommand);
		key = ">#documents/pictures "; 
		document.getElementById("greenSet").innerHTML = key;
	}
	if ((lastCommand == "cd Relic.encrypt.png" && folder == 2) || (lastCommand == "cd pictures/Relic.encrypt.png" && folder == 1) || (lastCommand == "cd documents/pictures/Relic.encrypt.png" && folder <= 2)){
		commandEncounter = true;
		folder = 2;
		addNewNoRepeatCommandLine(lastCommand);
		key = ">#documents/pictures ";

		var teste = fileLinesToArray('imgs/a1941.txt');
		console.log(teste);
		/*
		lineReader.eachLine('imgs/a1941.txt', function(line) {
			console.log(line);
		});
		*/

		/*
		Swal.fire({
			title: 'Relic.encrypt.png',
			type: 'info',
			html: '<img src="imgs/relic.png" height="300" width="450"></img>',
			confirmButtonText: 'Fechar'
		});
		*/
		document.getElementById("greenSet").innerHTML = key;
	}
}

/*
- documents 1
	- pictures 2
		- Relic.encrypt.png 21
		- Construct.png 22
		- Subject33.encrypt.png 23
	- notes 3
		- primeiro contato 31
			- Estrutura.txt 311
			- Acontecimentos.txt 312
			- Relatório de Campo.txt 313



projetos(1)
	argus(1.1)
		notas(1.1.1)
			nota pesquisa 0.txt(1.1.1.1)
			nota pesquisa 1.txt(1.1.1.2)
			nota pesquisa 2.txt(1.1.1.3)
		relatos(1.1.2)
			denuncias.pst(1.1.2.1)
		evidências(1.1.3)
			reliquia.encrypt.png(1.1.3.1)
			construcao.png(1.1.3.2)
			subject01.encrypt.png(1.1.3.3)
		entrevistas(1.1.4)
			entrevista 1(1.1.4.1)
			entrevista ▄¦▄«(1.1.4.2)
	||||(1.2)
	||||(1.3)
log.encrypt.cat(2)



- projects 4
	- ARGUS 5
		- pesquisa 51
			- Resultado #1.txt 511
			- Resultado #2.txt 512
		- relatos de engenheiros 52
			- Relato #1.txt 521
			- Relato #2.txt 522
			- Relato #3.txt 523
			- Relato #4.encrypt 524
	- PROTEUS 6
		- Status.encrypt 61
	- AGAMENON 7
		- Status.encrypt 71
- System 9
	- log.encrypt.cat 91
*/

















function addNewLine(nextText){
	var p = document.createElement("p");
	var np = document.createElement("p");
	var lastDiv = document.getElementById("lastCommands");
	var com = document.getElementById("command");
	com.value = "";

	p.setAttribute("id","lastCommand");
	p.innerHTML = "<b id='greenSetNoAnimation'>" + key + " </b>" + lastCommand;
	np.setAttribute("id","lastCommand");
	np.innerHTML = "<b id='greenSetNoAnimation'>"+key+" </b>" + nextText;

	lastDiv.appendChild(p);
	lastDiv.appendChild(np);

	inCommand = false;
}

function addNewNoRepeatCommandLine(nextText){
	var np = document.createElement("p");
	var lastDiv = document.getElementById("lastCommands");
	var com = document.getElementById("command");
	com.value = "";

	np.setAttribute("id","lastCommand");
	np.innerHTML = "<b id='greenSetNoAnimation'>"+key+" </b>" + nextText;

	lastDiv.appendChild(np);

	inCommand = false;
}



function addLineP(nextText) {
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
	setTimeout(function(){
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
	setTimeout(function(){
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

function addLine(text) {
	var lastDiv = document.getElementById("lastCommands");
	var p = document.createElement("p");
	p.setAttribute("id","lastCommand");
	p.innerHTML = "<b id='greenSetNoAnimation'>"+key+" </b>" + text;
	lastDiv.appendChild(p);
	inCommand = false;
}




function utf8_to_b64(str) {
  return window.btoa(unescape(encodeURIComponent(str)));
}

function b64_to_utf8(str) {
  return decodeURIComponent(escape(window.atob(str)));
}