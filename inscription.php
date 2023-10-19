<?php
require_once('requete.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>E-Taxibokko</title>
</head>


    <section>
        <form action="" method="post" name="formulaire1">
            <h2><strong>Inscription</strong></h2>
            <p>Votre chauffeur en un clic !</p>
            <button type="submit" class="up">Continuer avec Facebook</button>
            <hr class="hr1">
            <p class="p2">ou</p>
            <hr class="hr2">
            <label for="Email">EMAIL</label>
            <input type="email" name="email" id="email" placeholder="email" value="<?php echo $email; ?>">
            <label for="Password">Mot de passe</label>
            <input type="password" name="password" id="password" placeholder="Mot de passe" value="<?php echo $password; ?>">

            <div class="foot">
                <p class="P2"><strong><a href="connexion.php">J'ai déjà un compte</a></strong></p>
                <button type="submit" class="down" name="suivant">Suivant ➜</button>
            </div>
        </form>
        <form action="" method="post" name="formulaire2">
            <h2><strong>Inscription</strong></h2>
            <p>Finalisez votre inscription en renseignant les informations manquantes</p>
            <div class="name-fields">

                <div class="form-group">
                    <label for="Prenom">PRENOM</label>
                    <input type="text" name="prenom" id="prenom" placeholder="Prénom" value="<?php echo $prenom; ?>">
                </div>
                <div class="form-group">
                    <label for="Nom">NOM</label>
                    <input type="text" name="nom" id="nom" placeholder="Nom" value="<?php echo $nom; ?> ">
                </div>
            </div>
            <div id="tel-container">
                <div id="tel-text">+221</div>
                <div id="tel-input">
                    <label for="tel">TELEPHONE</label>
                    <input type="tel" name="tel" id="tel" placeholder="Téléphone" value="<?php echo $tel; ?> ">
                </div>
            </div>
            <label for="Email">EMAIL</label>
            <input type="email" name="email" id="email12" placeholder="email" value="<?php echo $email; ?>" readonly>
            <button type="submit" class="left" name="inscription">S'inscrire ➜</button>
        </form>


    </section>
</body>

</html>