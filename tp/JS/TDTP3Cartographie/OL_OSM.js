/*$().ready(function(){
    console.log("debut");
    $.getJSON("http://localhost:8888/types")
    .then(function(data) {
        $.when(
            data.forEach(typeEtablissement => {
                i = 0;
                //console.log(typeEtablissement);
                html = "";
                $.getJSON("http://localhost:8888/type/"+typeEtablissement)
                .then(function(data) {
                    console.log(data);
                    html="";
                    data.forEach(etablissement => {
                        //console.log(etablissement.nom);
                        html += "<input type='checkbox' name='"+i+"'>"+etablissement.nom+" ";
                        i++;
                    });
                    $('#points_interet').append("<h3>" + typeEtablissement + "</h3><div id='"+typeEtablissement+"'>" + html+"</div>");
                });
            })
        ).then(function() {
            console.log("fin");
        });
    });
});*/

/*
$().ready(function(){
    console.log("debut");
    $.getJSON("http://localhost:8888/types")
    .then(function(data) {
        data.forEach(typeEtablissement => {
            i = 0;
            //console.log(typeEtablissement);
            html = "";
            $.when(
                $.getJSON("http://localhost:8888/type/"+typeEtablissement)
                    .then(function(data) {
                        console.log(data);
                        html="";
                        data.forEach(etablissement => {
                            //console.log(etablissement.nom);
                            html += "<input type='checkbox' name='"+i+"'>"+etablissement.nom+" ";
                            i++;
                        });
                        $('#points_interet').append("<h3>" + typeEtablissement + "</h3><div id='"+typeEtablissement+"'>" + html+"</div>");
                    })
            ).then(function() {
                $('#points_interet').accordion({collapsible: true, heightStyle: 'content'});
            });
        });
    });
});
*/

$().ready(function(){
    console.log("debut");
    $.getJSON("http://localhost:8888/types")
    .then(function(data) {
        var promesses = [];
        var unePromesse;
        data.forEach(typeEtablissement => {
            i = 0;
            //console.log(typeEtablissement);
            html = "";
            promesses.push($.getJSON("http://localhost:8888/type/"+typeEtablissement)
                .then(function(data) {
                    console.log(data);
                    html="";
                    data.forEach(etablissement => {
                        //console.log(etablissement.nom);
                        html += "<input type='checkbox' name='"+i+"'>"+etablissement.nom+" ";
                        i++;
                    });
                    $('#points_interet').append("<h3>" + typeEtablissement + "</h3><div id='"+typeEtablissement+"'>" + html+"</div>");
                }));
        });
        $.when.apply($, promesses).done(function() {
            console.log("fin");
            $("#points_interet").accordion({collapsible: true, heightStyle: "content"});
        });
    });
});






/*
var map = new ol.Map({
    target: 'map',
    layers: [new ol.layer.Tile({source: new ol.source.OSM()})],
    view: new ol.View({
    center: ol.proj.fromLonLat([3.876716,43.61]),
    zoom: 14
    })
});

let image = $("#markerProto").clone();
//image.prop("display", "block");
console.log();

let aOverlay = new ol.Overlay({position: ol.proj.fromLonLat([3.876716,43.61]),
    positioning: 'center-center',
    element: document.getElementById("markerProto")}); // element fait référence à l’image


map.addOverlay(aOverlay);
aOverlay.getElement().style.display='block';
*/