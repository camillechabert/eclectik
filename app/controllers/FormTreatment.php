<?php

    include "../mdl_cdr2401dv/connexion_db.php";

    Class FormTreatment {

        private $datas;
        private $email;
        private $name;
        private $message;
        private $email_exp = '/^[A-Za-z0-9._-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
        private $text_exp = "/^[A-Za-z ,.'-]+$/";
        public static $errors;

        public function __construct($datas) {
            $this->datas = $datas;
            var_dump($this->datas);
            $this->name = $datas['name'];
            $this->email = $datas['email'];
            $this->message = $datas['message'];
            $this->textCheck();
            $this->mailCatcher();
            $this->saveData();
        }

        public function textCheck() {
            if(!preg_match($this->text_exp, $this->name)) {
                self::$errors['name'] = $this->createError("nom");
            }
            if(!preg_match($this->text_exp, $this->message)) {
                self::$errors['message'] = $this->createError("message");
            }
        }

        private function createError($el) {
            return "Votre " . $el . " contient des caractères non valident";
        }

        private function mailCatcher() {
            if(!preg_match($this->email_exp, $this->email)) {
                $error = "l'adresse mail saisie n'est pas valide, vérifiez le format.";
                self::$errors['mail'] = $error;
            }
        }

        private function saveData() {
            $pdo = new database();
            $sql = "INSERT INTO formulaire (destinataire, email, message) VALUES (?, ?, ?)";
            $pdo->request_db($sql, $this->datas);
        }

        public function getPosted() {
            return $this->datas;
        }
    }
?>


