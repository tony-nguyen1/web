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

function carrousel() {
    var oldBond = $("#photo").attr("src");
    oldBond = oldBond.replace(/\.[^/.]+$/, "");

    var n = bonds.indexOf(oldBond);
    n = n === bonds.length-1 ? 0 : n+1;

    currentBond = bonds[n];

    $("#photo").remove();
    $("header").children("p").append($('<img id="photo" src="'+currentBond+'.jpg'+'" onmouseover="zoom(this)" onmouseout="dezoom(this)" onclick="carrousel()"/> </img>'));
}

cocktails = [{'nom':'VM','amateurs':['Connery', 'Lazenby', 'Moore', 'Dalton', 'Brosnan', 'Craig']},
 {'nom':'Vesper','amateurs':['Craig']},
 {'nom':'Collins','amateurs':['Connery']},   
 {'nom':'Mint J','amateurs':['Connery']},
 {'nom':'The Mac', 'amateurs':['Craig']}
];


function afficherCocktails() {
    $("#listeCocktails").empty();

    currentBond = $("#photo").attr("src");
    currentBond = currentBond.replace(/\.[^/.]+$/, "");
    
    cocktails.forEach(function(item){
        if (item.amateurs.includes(currentBond)) {
            console.log(item.nom);
            $("#listeCocktails").append($('<li>'+item.nom+'</li>'));

        }
    });
}


/*$(document).ready(function(){
    $('header').click(function(){
        afficherCocktails();
    }); 
  }); */
  //https://www.w3schools.com/jquery/default.asp
