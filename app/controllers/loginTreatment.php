
<?php

    include "../mdl_cdr2401dv/database.php";

    class loginTreatment {
        private $post;
        private $username;
        private $password;
        private $params;
        private $error;

        public function __construct($post) {
            $this->post = $post;
            $this->username = $post['username'];
            $this->password = $post['password'];
            $this->error;
            $this->params = array(
                ':username' => $this->username,
                ':password' => $this->password,
            );
            $this->login();
        }

        private function login() {
            $sql = "SELECT username, mot_de_passe FROM admin WHERE username = :username AND mot_de_passe = :password";
            $request = database::saveData($sql, $this->params);

            if($request) {
                $_SESSION['connecte'] = true;
                header("location: ../viewsAdmin/admin.php");
            } else {
                $this->error = "nom ou mot de passe invalide";
                echo $this->error;
            }
        }
    }
?>