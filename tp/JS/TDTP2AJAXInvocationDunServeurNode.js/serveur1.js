var express = require("express");
var app = express();
app.listen(8888);

let cock = [{"nom":"VM","amateurs":["Connery", "Lazenby", "Moore", "Dalton", "Brosnan", "Craig"]},
 {"nom":"Vesper","amateurs":["Craig"]},
 {"nom":"Collins","amateurs":["Connery"]},   
 {"nom":"Mint J.","amateurs":["Connery"]},
 {"nom":"The Macallan", "amateurs":["Craig"]}
];

app.get('/', function(request, response) {
    console.log("envoie html");
    response.sendFile('CV_James_AJAX.html', {root: __dirname});
});

// Renvoi des cocktails d'un james bond
app.get('/cocktails/:JB', function(request, response) {
    console.log("renvoi des cocktails de "+request.params.JB);
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
