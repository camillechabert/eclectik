<?php
include "../mdl_cdr2401dv/database.php";

class contactTreatment {
    private $post;
    private $form;
    public static $errors;

    public function __construct($post) {
        $this->post = $post;
        $this->form = array(
            ':nom' => 'nom',
            ':prenom' => 'prenom',
            ':email' => 'email',
            ':adresse' => 'adresse',
            ':lien_linkedin' => 'lien_linkedin',
        );

        $this->mailCatcher();
        $pdo = new database();
        $sql = $pdo->build_request(1, $this->post, 'contact', $this->form);
        database::saveData($sql, $this->post, false);
    }

    private function mailCatcher() {
        if(!preg_match($this->email_exp, $_POST['email'])) {
            $error = "l'adresse mail saisie n'est pas valide, vérifiez le format.";
            self::$errors['mail'] = $error;
        }
    }
}
?>