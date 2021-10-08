

function readTextFile(file, callback) {
    var rawFile = new XMLHttpRequest();
    rawFile.overrideMimeType("agences.json");
    rawFile.open("GET", file, true);
    rawFile.onreadystatechange = function() {
        if (rawFile.readyState === 4 && rawFile.status == "200") {
            callback(rawFile.responseText);
        }
    }
    rawFile.send(null);
}

//usage:
readTextFile("/Users/lucas/Desktop/Devs/Git/TP-Gestion-de-Comptes-Bancaires/Imag/agences.json", function(text){
    var data = JSON.parse(text);
    console.log(data);
});