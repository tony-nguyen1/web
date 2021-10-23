<?php
include_once './Mastermind.php';
session_start();
if (isset($_SESSION['mastermind'])) {
    echo "tout va bien, user en train de jouer";
} else {
    echo "nouvelle session, création d'une instance de jeu";
    $_SESSION['mastermind'] = new Mastermind();
}

if(isset($_GET['a']) && isset($_GET['b']) && isset($_GET['c']) && isset($_GET['d'])) {
    $_SESSION['mastermind']->jouerCoup($_GET['a'], $_GET['b'], $_GET['c'], $_GET['d']);
    if ($_SESSION['mastermind']->verification($_GET['a'], $_GET['b'], $_GET['c'], $_GET['d'])) {
        echo "<h1>Victoire</h1>";
    }
}
?>

<!doctype php>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Mastermind</title>
</head>

<body> 
    <form method="GET">
        <label for="a">n°1 ?</label>
        <input type="number" name="a" min="0" max="9" value=0 placeholder="Type here" oninput="(validity.valid)||(value='');">
        <br>
        
        <label for="b">n°2 ?</label>
        <input type="number" name="b" min="0" max="9" value=0 placeholder="Type here" oninput="(validity.valid)||(value='');">
        <br>

        <label for="c">n°3 ?</label>
        <input type="number" name="c" min="0" max="9" value=0 placeholder="Type here" oninput="(validity.valid)||(value='');">
        <br>

        <label for="d">n°4 ?</label>
        <input type="number" name="d" min="0" max="9" value=0 placeholder="Type here" oninput="(validity.valid)||(value='');">
        <br>

        <button type="submit" name="envoyer" class="btn btn-primary">send</button>
        <br>
    </form>

    
</body>
</html>