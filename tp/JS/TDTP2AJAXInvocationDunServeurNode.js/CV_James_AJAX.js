var largeurImage;
var hauteurImage;

var currentBond;
var bonds = ["Connery", "Lazenby", "Moore", "Dalton", "Brosnan", "Craig"];

function zoom(image) {
    largeurImage = image.style.width;
    hauteurImage = image.style.height;
    image.style.width = "auto";
    image.style.height = "auto";
}

function dezoom(image) {
    image.style.width = largeurImage;
    image.style.height = hauteurImage;
}//image.setAttribute("src", ...) 

function changeImage() {
    var oldBond = $("#photo").attr("src");
    oldBond = oldBond.replace(/\.[^/.]+$/, "");
    oldBond = oldBond.split("/")[4];
    var n = bonds.indexOf(oldBond);
    n = n === bonds.length-1 ? 0 : n+1;

    currentBond = bonds[n];

    let link = "http://localhost:8888/fichier/"+currentBond+".jpg";

    $("#photo").remove();
    $("header").children("p").append($('<img id="photo" src="'+link+'" onmouseover="zoom(this)" onmouseout="dezoom(this)" onclick="changeImage()"/> </img>'));
}

function afficherCocktails() {
    console.log("afficherCocktails");
    $("#listeCocktails").empty();

    currentBond = $("#photo").attr("src");
    currentBond = currentBond.replace(/\.[^/.]+$/, "");
    currentBond = currentBond.split("/")[4];

    console.log(currentBond);

    $.getJSON("http://localhost:8888/cocktails/"+currentBond)
    .then(function(data) {
        console.log(data);
        data.forEach(function(item) {
            $("#listeCocktails").append($('<li>'+item+'</li>'));
        });
    });
}
