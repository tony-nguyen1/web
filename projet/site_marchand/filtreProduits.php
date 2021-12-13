<!DOCCategorie html>
<html lang="fr">
<head>
	<meta charset="UTF8" />
</head>

<body>
    
<form method='post'>

<select multiple name="Categorie[]">
   <option value="Shonen">Shonen</option>
   <option value="Seinen">Seinen</option>
   <option value="Shojo">Shojo</option>
   <option value="Josei">Josei</option>
   <!-- je vais pas mettre yaoi hein -->
</select>



<select multiple name="Marque[]">
   <option value="Shueisha">Shueisha</option>
   <option value="Glenat">Glénat</option>
   <option value="PikeEdition">Pike Edition</option>
   <option value="Etc">jsp</option>
   <!-- faudra rajouter selon ce qu'on a en bdd -->
</select>

<input type="number" name="prixmin" min= "0" max="1000" placeholder="0" value="0">


<!-- je sais pas si on fait une requete sql pour selectionner le plus grand prix et l'afficher dans le placeholder et le max -->

<input type="number" name="prixmax" min= "0" max="1000" placeholder="1000" value= "1000">



<select name="ordreDaffichage" > 

<option value="">--Ordre d'affichage--</option>
<option value="A-Z"> A-Z </option>
<option value="Z-A"> Z-A </option>
<option value="-cher"> -cher </optgroupeion>
<option value="+cher"> +cher </option>
 <!-- je sais pas quoi mettre d'autre  -->
</select>




<input type="submit" name='pitie' value='ok'/>

</form>





<?php 

    $requete_finale = "SELECT * FROM Tablejsp";

    $YADejaUnWhere = false; // vu qu'il faut que un seul where dans une requete on a besoin d'une variable pour voir 
                            // s'il faut mettre un WHERE ou un AND



    // On regarde si le mec a filtré selon un Categorie de manga (seinen, shonen etc)
    if(!empty($_POST["Categorie"])){
        
        $YADejaUnWhere = true; // si c'est le cas, on a déjà un where et donc on met la variable à false
        $requete_Categorie = " WHERE  (Categorie = '" . $_POST["Categorie"][0] . "'";

        // on met une parenthèse prck les OR sont moins prioritaires que les AND pour les autres requetes en dessous

        for($i = 1; $i < count($_POST["Categorie"]); $i++ ){

            $requete_Categorie .= " OR  Categorie = '" . $_POST["Categorie"][$i] . "'";

        }

        $requete_finale .= $requete_Categorie.')';       
        
    }
  

    

    if(!empty($_POST["Marque"])){

        if ($YADejaUnWhere){   // si le mec a déjà trié par Categorie, c'ets que le where existe déjà, et donc on a besoin d'un AND
            $requete_Marque = " AND (";
        }

        else{
            $requete_Marque = " WHERE (";
        }

        
        for($i = 0; $i < count($_POST["Marque"]); $i++ ){

            if($i!=0){ // si y a plusieurs catégories, entre chaque "Marque = 'blabla'" faut des OR après le premier
                $requete_Marque .= " OR";
            }

            $requete_Marque .= " Marque = '" . $_POST["Marque"][$i] . "'";
        }


        $requete_finale .= $requete_Marque .= ")";
        
    }


  
    

    if(  !empty($_POST["prixmin"])  ||  !empty($_POST["prixmax"])  ){
        if ( $_POST["prixmin"] <= $_POST["prixmax"]){

            if ($YADejaUnWhere){
                $requete_finale .= " AND (";  
             }
             else{
                 $requete_finale .= " WHERE (";
             }

             $requete_finale .= " prix BETWEEN " . $_POST["prixmin"] . " AND " . $_POST["prixmax"] . ")";
        } // si le mec touche à rien ça le met quand même, en vrai ça marche pareil mais je suis pas sûr que ça soit opti

    }
    
    
    
    if(!empty($_POST["ordreDaffichage"])){
        $requete_finale .= " ORDER BY"; 

        switch ($_POST["ordreDaffichage"]){
            case "A-Z":
                $requete_finale .= " NomProduit";
                break;
            case "Z-A":
                $requete_finale .= " NomProduit DESC";
                break;
            case "-cher":
                $requete_finale .= " Prix";
                break;
            case "+cher":
                $requete_finale .= " Prix DESC";
                break;

        }

    }

    echo $requete_finale;

?>



</body>
</html>


