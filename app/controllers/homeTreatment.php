<?php

    include "../mdl_cdr2401dv/database.php";

    Class homeTreatment {

        private $datas;
        private $home;
        private $text_exp = "/^[0-9A-Za-z ,.;:_?!*()éèùuûàçîï%€$&@'-+$]/";
        public static $errors;

        public function __construct($datas, $file) {
            $this->datas = $datas;
            $this->home = array(
                ':slf' => 'lien_facebook',
                ':sli' => 'lien_instagram',
                ':mentions' => 'mentions',
                ':cgu' => 'cgu',
                ':addSocial' => 'add_social',
                ':icon' => 'icon',
                ':video' => 'video',
                ':logo' => 'logo'
            );

            $this->textCatcher();
            $this->saveData();
            $this->uploadFiles('logo', '../assets/images/');
            $this->uploadFiles('video', '../assets/videos/');
            $this->uploadFiles('icon', '../assets/images/');
            print_r($_FILES);
        }

        private function createError($el) {
            return $el . " contient des caractères non valident";
        }

        private function textCatcher() {
            if(isset($this->datas['mentions']) && !preg_match($this->text_exp, $this->datas['mentions'])) {
                self::$errors['mentions'] = $this->createError('Mentions légales');
            }
            if(isset($this->datas['cgu']) && !preg_match($this->text_exp, $this->datas['cgu'])) {
                self::$errors['cgu'] = $this->createError('CGU');
            }
        }

        private function uploadFiles ($files, $dest) {
            $folder = $dest;
            $file = basename($_FILES[$files]['name']);
            $maxSize = 100000000;
            $size = filesize($_FILES[$files]['tmp_name']);
            $extensions = array('.png', '.gif', '.jpg', '.jpeg', '.svg', '.mp4');
            $extension = strrchr($_FILES[$files]['name'], '.');
            if (!empty($_FILES[$files]['tmp_name'])) {
                if(!in_array($extension, $extensions)) {
                    $error = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, svg...';
                }
                if($size > $maxSize) {
                    $error = 'Le fichier est trop voluminnameeux...';
                }
                if(!isset($error)) {
                    $file = strtr($file, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
                    $file = preg_replace('/([^.a-z0-9]+)/i', '-', $file);
                    if(move_uploaded_file($_FILES[$files]['tmp_name'], $folder . uniqid() . $file)) {
                        echo 'Upload effectué avec succès !';
                    }
                    else {
                        echo 'Echec de l\'upload !';
                    }
                }
                else {
                    echo $error;
                }
            }
        }

        private function saveData() {
            $pdo = new database();
            $sql = $pdo->build_request(1, $this->datas, 'accueil', $this->home);
            $pdo->request_db($sql, $this->datas);
        }
    }

?>