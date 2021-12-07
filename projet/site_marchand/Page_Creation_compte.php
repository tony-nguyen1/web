<?php 

session_start();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF8" />

	<title> Création de compte </title>


</head>

<body>


<?php  
    
    $envoi_Formu = true;
        if (!empty($_POST["identifiant"]) && !empty($_POST["mdp"]) && !empty($_POST["mdp_confirm"])){ // On regarde si y a eu "bon" envoi du formulaire
           
            if($_POST["mdp"] == $_POST["mdp_confirm"]){ // faudrait aussi regarder que c'est une bonne adresse mail qui est envoyé

                $dbh = new PDO('mysql:host=localhost;dbname=sitemarchand; charset=UTF8', 'root', 'root');

                $email = $_POST["identifiant"];
                $stmt = $dbh->prepare("SELECT * FROM users WHERE email=?");
                $stmt->execute([$email]); 
                $user = $stmt->fetch();


                if ($user) { //email existe

                    echo "Vous avez déjà une adresse mail associée";
                } 

                else { //email existe pas
                    
                    echo "Un mail a été envoyé à ", $_POST["identifiant"] ,", Veuillez valider votre compte"; //jsp si je garde le fait de l'envoyer sur le mail sah mdr
                    $envoi_Formu = false;
                }


            }
            
            else{
                echo "Mot de passes incohérents";
            }

        }

        if ($envoi_Formu):
?>

    <form action="" method="post">

            <label for="nom"> Rentrez votre nom de famille</label>
            <input type="text" name="nom"> <br> <br>

            <label for="prneom"> Rentrez votre nom</label>
           <input type="text" name="prenom"><br> <br>



           <label for="ville"> Quelle ville habitez vous?</label>
           <input type="text", name="ville"><br> <br>

           <label for="adresse">Rentrez votre adresse</label>
           <input type="text" name="adresse"><br> <br>

           <label for="identifiant"> Rentrez votre adresse mail </label>
           <input type="email" name="identifiant" required> <br><br>

           <label for="mdp"> Rentrez votre mot de passe</label>
           <input type="password" name="mdp" required> <br>

           <label for="mdp_confirm"> confirmer</label>
           <input type="password" name="mdp_confirm" required> <br>



           <input type="submit" value="Valider">


    </form>



    <?php endif; ?>





</body>


</html>