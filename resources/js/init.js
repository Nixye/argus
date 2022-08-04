var urlBase;
var iterationsPassedCount = 1;
var folder = 0;
var key = ">";
var inCommand = false;
var commandEncounter = false;

function init(urlB) {
	var commandIn = document.getElementById("command");
	commandIn.focus();
    urlBase = urlB;
}