var express = require("express");
var fs = require('fs');
var app = express();

let pis = {}
let PI = JSON.parse(fs.readFileSync('OSM_Metropole_restauration_bar.json','utf8'));
// >>>>>> CODE A COMPLETER <<<<<<
//construction des clés de pis
/*
for (f of PI.features) {
    //console.log(f.properties.amenity);
    if(!pis.hasOwnProperty(f.properties.amenity)) {
        pis[f.properties.amenity] = new Array();
    }
}
//remplissage des valeurs pour chaque clé de pis
for (cle in pis) {
    for (f of PI.features) {
        if (cle === f.properties.amenity) {
            pis[cle].push(f.properties.name);
        }
    }
}*/
for (let pi of PI.features) {
    let type = pi.properties.amenity;
    if (!pis.hasOwnProperty(type)) {
        pis[type] = [{
            'nom' : pi.properties.name,
            'long' : pi.geometry.coordinates[0],
            'lat' : pi.geometry.coordinates[1]
        }];
    } else {
        pis[type].push({
            'nom' : pi.properties.name,
            'long' : pi.geometry.coordinates[0],
            'lat' : pi.geometry.coordinates[1]
        });
    }
}
//console.dir(pis)

app.listen(8888);

// Renvoi de la page HTML
app.get('/', function(request, response) {
    console.log('/');
    response.sendFile('OL_OSM.html', {root: __dirname});
});

// Renvoi des différents types d'établissements
app.get('/types', function(request, response) {
    console.log('/types');
    let types = [];
    for (let type in pis) types.push(type);
    response.setHeader("Content-type", "application/json");    
    response.end(JSON.stringify(types));
});

// Renvoi des établissements d'un type donné
app.get('/type/:type', function(request, response) {
    console.log("/type/"+request.params.type);
    response.setHeader("Content-type", "application/json");    
    response.end(JSON.stringify(pis[request.params.type]));
});

// Renvoi des autres ressources
app.get('/fichier/:fichier', function(request, response) {
    console.log('/fichier/'+request.params.fichier);
    response.sendFile(request.params.fichier, {root: __dirname});
});

