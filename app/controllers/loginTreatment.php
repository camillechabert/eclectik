
<?php

include "../mdl_cdr2401dv/database.php";

session_start();
    if (isset($_SESSION['connecte'])) {
        header("Location: ../viewsAdmin/admin.php");
    } else {
if (empty($_POST['username']) && empty($_POST['password'])) {
    echo "veuillez saisir votre identifiant et mot de passe pour vous connecter";
} else {

    $params = array(
                ':username' => $_POST['username'],
                ':password' => $_POST['password'],
            );

            $pdo = new database();
            $sql = "SELECT username, mot_de_passe FROM admin WHERE username = :username AND mot_de_passe = :password";
            $stt = $pdo->request_db($sql, $params);
            if (isset($stt['username']) && !empty($stt['username'])) {
                echo "llllllllllloool";
                $_SESSION['connecte'] = true;
                $_SESSION['username'] = $stt['username'];
                header("location: ../viewsAdmin/admin.php");
            } else {
                session_destroy();
                header('Location: ../viewsAdmin/login.php');
                $error = "Username or Password is invalid";
            }
        }
    }
