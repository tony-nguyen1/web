<?php 

session_start();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF8" />

	<title> Connexion </title>


</head>

<body>


<?php  

    $envoi_Formu = true;
    if (empty($_POST["identifiant"]) && empty($_POST["mdp"])){ // On regarde si y a eu "bon" envoi du formulaire
        
        echo "Veuillez renseigner un email et un mot de passe valide svp";
    }
        
   else{
        
        $emailSaisi = $_POST["identifiant"];
        $requete = "SELECT * FROM Clients WHERE email='$emailSaisi'";
        $dbh = new PDO('mysql:host=localhost;dbname=sitemarchand; charset=UTF8', 'root', 'root');
        $testExistence =  $dbh->query($requete);

        if ($testExistence->rowCount() == 0) { // si la ligne existe pas (le mec a pas créé de compte)
            echo "Mauvais identifiant/mot de passe <br>Si vous n'avez pas de compte, veuillez en créer un svp<br><br>";
        }

        else {   //c'est bien le mec en question

            $requete = "SELECT MotDePasse FROM Clients WHERE email='$emailSaisi'";
            foreach ($dbh->query($requete) as $row){
                $testBonMdp = $row["MotDePasse"];
    
            }



            if($testBonMdp != $_POST["mdp"]){
                echo "Mauvais identifiant/mot de passe <br>Si vous n'avez pas de compte, veuillez en créer un svp<br><br>";// je remets la même ligne exactement pour pas qu'un random sache si un l'adresse d'un mail est déjà utilisée
                //  (en vrai ça sert à rien pour l'instant prck il peut le savoir en faisant "créer un compte" )
            }

            else{
                $_SESSION["utilisateur"] = $_POST["identifiant"];
                echo "bonjour machin"; //jsp si on met le nom du mec à la place de "machin", faut juste faire une requete sql
                $envoi_Formu = false;
            }
        }
    }

     if ($envoi_Formu):

?>

    <form action="" method="post">

        <input type="email" name="identifiant" required placeholder="Identifiant"> <br>


        <input type="password" name="mdp" required placeholder="Mot de passe"> <br> <br>


        <input type="submit" value="Se connecter">


    </form>

    <?php endif; ?>



</body>


</html>