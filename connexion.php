
<?php
session_start();
require_once('bd.php');

$email = "";
$password = "";
$erreur = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["connexion"])) {
    $email = $_POST["email"];
    $password = md5($_POST["password"]);

    $sql = "SELECT * FROM utilisateurs WHERE email = ? AND password = ?";
    $stmt = $db->prepare($sql);


    $stmt->execute([$email, $password]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_nom'] = $user['nom'];
        $_SESSION['user_prenom'] = $user['prenom'];
        header('Location: profil.php');
    } else {
        $erreur = "Adresse e-mail ou mot de passe incorrect.";
        // header('Location: inscription.php');

    }
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>E-Taxibokko</title>
</head>
<body>
    
<form action="" method="post">
            <h2><strong>Connexion</strong></h2>
            <p>Votre chauffeur en un clic !</p>
            <label for="Email">EMAIL</label>
            <input type="email" name="email" id="email" placeholder="email" value="<?php echo $email; ?>">
            <label for="Password">Mot de passe</label>
            <input type="password" name="password" id="password" placeholder="Mot de passe" value="<?php echo $password; ?>">

            <button type="submit" class="down" name="connexion">Se connecter</button>
            <?php
                if (isset($erreur)) {
                    echo "<p style='color: red;'>$erreur</p>";
                }
            ?>
        </form>
</body>
</html>
