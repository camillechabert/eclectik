<?php
include "../mdl_cdr2401dv/database.php";

    class adminTreatment {
        private $post;
        private $form;

        public function __construct($post) {
            $this->post = $post;
            $this->form = array(
                ':nom' => 'name',
                ':prenom' => 'surname',
                ':email' => 'email',
                'username' => 'username',
                ':mot_de_passe' => 'mdp2',
            );
            $this->checkPassword();
            $pdo = new database();
            $sql = $pdo->build_request(1, $this->post, 'admin', $this->form);
            database::saveData($sql, $this->post);
        }

        private function checkPassword() {
            
        }

        private function cryptPassword() {

        }


    }
?>