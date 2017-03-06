<?php

    include '../controllers/loginTreatment.php';

    session_start();

    $usernameP = $_POST['username'];
    $passwordP = $_POST['password'];

    if (isset($_SESSION['connecte'])) {
        header("Location: ../viewsAdmin/admin.php");
        session_destroy();
    } else {
        if (empty($usernameP) && empty($passwordP)) {
            echo $error = "veuillez saisir votre identifiant et mot de passe pour vous connecter";
            session_destroy();
            header('Location: ../viewsAdmin/login.php');
        } else {
            new loginTreatment($_POST);
        }
    }
?>