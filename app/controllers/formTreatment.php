<?php

include "../mdl_cdr2401dv/database.php";
session_start();

Class formTreatment {

    private $datas;
    private $email;
    private $name;
    private $message;
    private $email_exp = '/^[A-Za-z0-9._-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
    private $text_exp = "/^[0-9A-Za-z ,.;:_?!*()éèùuûàçîï%€$&@'-+$]/";
    public static $errors;

    public function __construct($datas) {
        $this->datas = $datas;
        $this->name = $datas['name'];
        $this->email = $datas['email'];
        $this->message = $datas['message'];
        $this->mailCatcher();
        $this->textCatcher();
        database::saveData("INSERT INTO mails (destinataire, email, message) VALUES (:name, :email, :message)", $this->datas, false);
        $this->mailRedirection($this->message, $this->name, $this->email);
    }

    private function mailCatcher() {
        if(!preg_match($this->email_exp, $this->email)) {
            $error = "l'adresse mail saisie n'est pas valide, vérifiez le format.";
            self::$errors['mail'] = $error;
        }
    }

    private function createError($el) {
        return "Votre " . $el . " contient des caractères non valident";
    }

    private function textCatcher() {
        if(!preg_match($this->text_exp, $this->name)) {
            self::$errors['name'] = $this->createError("nom");
        }
        if(!preg_match($this->text_exp, $this->message)) {
            self::$errors['message'] = $this->createError("message");
        }
    }

    private function mailRedirection($msg, $name, $email) {
        $to      = 'chabert_camillz@yahoo.fr';
        $subject = 'Contact via site internet';
        $message = $msg;
        $headers = $name . "\r\n" . 'Reply-To:' . $email . "\r\n" . 'X-Mailer: PHP/' . phpversion();
        mail($to, $subject, $message, $headers);
    }
}
?>


