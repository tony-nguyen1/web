let map = new ol.Map({
    target: 'map',
    layers: [new ol.layer.Tile({source: new ol.source.OSM()})],
    view: new ol.View({
    center: ol.proj.fromLonLat([3.876716,43.61]),
    zoom: 14
    })
});

let listOverlay = [];
let listOverlayDiv = [];



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
                        html += "<input type='checkbox' id='"+i+"'>"+etablissement.nom+" ";
                        i++;
                        foo(etablissement.nom, etablissement.long, etablissement.lat);
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



function foo(nom, lon, lat) {
    let image = $("#markerProto").clone();
    $("body").prepend(image);

    let div = $("#popupProto").clone();
    //div.append(nom);
    div.text(nom);
    $("body").prepend(div);
    
    console.log(nom);
    

    let aOverlay = new ol.Overlay({position: ol.proj.fromLonLat([lon,lat]),
        positioning: 'center-center',
        element: document.getElementById("markerProto")}); // element fait référence à l’image
    
    let bOverlay = new ol.Overlay({
        position: ol.proj.fromLonLat([lon,lat]),
        positioning: 'center-right',
        element: document.getElementById("popupProto")
    }); 


    map.addOverlay(aOverlay);
    //aOverlay.getElement().style.display='block';
    map.addOverlay(bOverlay);
    //bOverlay.getElement().style.display='block';

    //console.log(bOverlay.getElement());

    listOverlay.push(aOverlay);
    listOverlayDiv.push(bOverlay);
}


$('body').on("change", "input[type=checkbox]", function() {
    let valeur = $(this).attr('id');
    console.log("sélection de la case à cocher numéro "+valeur);
    if ($(this).is(':checked')) { 
        listOverlay[valeur].getElement().style.display='block';
        listOverlayDiv[valeur].getElement().style.display='block';
    } else { 
        listOverlay[valeur].getElement().style.display='none';
        listOverlayDiv[valeur].getElement().style.display='none';
    }
});

