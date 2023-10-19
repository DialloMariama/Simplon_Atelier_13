<?php
session_start();
require_once('bd.php');

$nom = "";
$prenom = "";
$email = "";
$poids = "";
$tel = "";
$password = "";
$erreurs = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["suivant"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];
        if (filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($password) == 8) {
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['password'] = $_POST['password'];
        } else {
            array_push($erreurs, "Entrez un email valide");
            array_push($erreurs, "Entrez un mot de passe valide de 8 caractères.");
        }
        if (!empty($erreurs)) {
            echo "<ul>";
            foreach ($erreurs as $erreur) {
                echo "<li style='color: red;'>$erreur</li>";
            }
            echo "</ul>";
        }
    }
    if (isset($_POST["inscription"])) {
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $tel = $_POST["tel"];
        $email = $_POST["email"];
    
        $regex_nom = "/^[a-zA-Z]{2,}$/";
        $regex_prenom = "/^[a-zA-Z]{3,}$/";
        if (!preg_match($regex_nom, $_POST["nom"])) {
            $erreurs[] = "Le nom est invalide.";
        }
        if (!preg_match($regex_prenom, $_POST["prenom"])) {
            $erreurs[] = "Le prénom est invalide.";
        }
        if (!preg_match("/^(70|75|76|77|78)[0-9]{7}$/", $tel)) {
            array_push($erreurs, "Le numéro de téléphone doit contenir exactement 9 chiffres et respecter les operateurs existant par ex: 70.");
        }

        if (!(filter_var($email, FILTER_VALIDATE_EMAIL))) {
            array_push($erreurs, "Entrez un email valide");
        }
        if (!empty($erreurs)) {
            echo "<ul>";
            foreach ($erreurs as $erreur) {
                echo "<li style='color: red;'>$erreur</li>";
            }
            echo "</ul>";
        } else {
            $email_existe = "SELECT COUNT(*) FROM utilisateurs WHERE email = ?";
            $stmt_email_existe = $db->prepare($email_existe);
            $stmt_email_existe->execute([$email]);
            $count_email_existe = $stmt_email_existe->fetchColumn();

            $tel_existe = "SELECT COUNT(*) FROM utilisateurs WHERE tel = ?";
            $stmt_tel_existe = $db->prepare($tel_existe);
            $stmt_tel_existe->execute([$tel]);
            $count_tel_existe = $stmt_tel_existe->fetchColumn();

            if ($count_email_existe > 0) {
                array_push($erreurs, "Cet e-mail est déjà enregistré.");
            }

            if ($count_tel_existe > 0) {
                array_push($erreurs, "Ce numéro de téléphone est déjà enregistré.");
            }

            if ($count_email_existe === 0 && $count_tel_existe === 0) {
                $password = md5($_SESSION['password']);
                $email = $_POST["email"];

                $sql = "INSERT INTO utilisateurs (nom, prenom, tel, email, password) VALUES (?, ?, ?, ?, ?)";

                $stmt = $db->prepare($sql);
                $stmt->execute([$nom, $prenom, $tel, $email, $password]);
                header('Location: connexion.php');
            }      
        }
    }
}
