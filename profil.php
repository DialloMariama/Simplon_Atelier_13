
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
</head>
<body>
    <?php
    require_once('requete.php');
    $nom = "";
    $prenom = "";


    if (isset($_SESSION['user_nom']) || isset($_SESSION['user_prenom'])) {
        $nom = $_SESSION['user_nom'];
        $prenom = $_SESSION['user_prenom'];
        
    
        echo "<p>Bonjour $prenom $nom, vous avez réussi à vous connecter.</p>";
        
    }

    
    ?>
</body>
</html>
