<?php
include "../mdl_cdr2401dv/database.php";

    class adminTreatment {
        private $post;
        private $form;
        private $email_exp = '/^[A-Za-z0-9._-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
        public static $errors;

        public function __construct($post) {
            $this->post = $post;
            $this->form = array(
                ':nom' => 'nom',
                ':prenom' => 'prenom',
                ':email' => 'email',
                ':username' => 'username',
                ':mot_de_passe' => 'mot_de_passe',
            );

            $this->completeForm();
            $this->mailCatcher();
            $pdo = new database();
            $sql = $pdo->build_request(1, $this->post, 'admin', $this->form);
            database::saveData($sql, $this->post, false);
        }

        private function checkPassword() {
            if(!empty($_POST["mot_de_passe"]) && !empty($_POST["mdp_confirmation"]) && $_POST["mot_de_passe"] === $_POST["mdp_confirmation"]){
                return true;
            } else {
                return false;
            }
        }

        private function completeForm() {
            $checkPassword = $this->checkPassword();
            if ($checkPassword == false) {
                unset($this->post["mot_de_passe"]);
            }
            unset($this->post["mdp_confirmation"]);
        }

        private function mailCatcher() {
            if(!preg_match($this->email_exp, $_POST['email'])) {
                $error = "l'adresse mail saisie n'est pas valide, vérifiez le format.";
                self::$errors['mail'] = $error;
            }
        }
    }
?>