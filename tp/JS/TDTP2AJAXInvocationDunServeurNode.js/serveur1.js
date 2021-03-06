var express = require("express");
var app = express();
app.listen(8888);

//to load local file ////////
//https://www.codegrepper.com/code-examples/javascript/express+get+local+json+file+best+practices
const fs = require('fs');
const path = require('path');

let rawdata = fs.readFileSync(path.resolve(__dirname, 'cocktails.json'));
let cock = JSON.parse(rawdata);
/***************************/

app.get('/', function(request, response) {
    console.log("envoie html");
    response.sendFile('CV_James_AJAX.html', {root: __dirname});
});

// Renvoi des cocktails d'un james bond
app.get('/cocktails/:JB', function(request, response) {
    console.log("renvoi des cocktails de "+request.params.JB); console.log(request.params);
    let cocktails = [];

    cock.forEach(function(item) {
        if (item.amateurs.includes(request.params.JB)) {
            cocktails.push(item.nom);
        }
    });

    console.log(cocktails);
    

    response.setHeader("Content-type", "application/json");    
    response.end(JSON.stringify(cocktails)); 
});

// Renvoi des autres ressources
app.get('/fichier/:fichier', function(request, response) {
    console.log('/fichier/'+request.params.fichier);
    response.sendFile(request.params.fichier, {root: __dirname});
});

//test
app.get('/cocktails/:JB/:test', function(request, response) {
    console.log("ici");
    console.log(request.params);
    console.log(request.params.JB);

    response.setHeader("Content-type", "application/json");    
    response.end(JSON.stringify(request.params.JB)); 
});
