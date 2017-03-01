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
                ':addSocial' => 'add_social'
            );
            $this->textCatcher();
            $this->saveData();
            $this->uploadFiles('logo', '../assets/images/');
            $this->uploadFiles('video', '../assets/videos/');
            $this->uploadFiles('icon', '../assets/images/');
        }

        private function createError($el) {
            return $el . " contient des caractères non valident";
        }

        private function textCatcher() {
            if(isset($this->datas['mentions']) && !preg_match($this->text_exp, $this->datas['mentions'])) {
                self::$errors['mentions'] = $this->createError('Mentions légales');
            }
        }

        private function uploadFiles ($files, $dest) {
            $folder = $dest;
            $file = basename($_FILES[$files]['name']);
            $maxSize = 100000000;
            $tmpName = $_FILES[$files]['tmp_name'];
            $size = filesize($tmpName);
            $extensions = array('.png', '.gif', '.jpg', '.jpeg', '.svg', '.mp4');
            $extension = strrchr($_FILES[$files]['name'], '.');
            if (!empty($tmpName)) {
                if(!in_array($extension, $extensions)) {
                    $error = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, svg...';
                }
                if($size > $maxSize) {
                    $error = 'Le fichier est trop voluminnameeux...';
                }
                if(!isset($error)) {
                    $file = strtr($file, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
                    $file = preg_replace('/([^.a-z0-9]+)/i', '-', $file);
                    $fileName = uniqid() . $file;
                    $path = $folder . $fileName;
                    var_dump($path);
                    if(move_uploaded_file($tmpName, $path)) {
                        echo 'Upload effectué avec succès !';
                        $this->saveFiles($files, $path, $fileName);

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

        private function saveFiles($files, $pathFile, $fname) {
            $fileName = $fname;
            $fileSize = $_FILES[$files]['size'];
            $fileType = $_FILES[$files]['type'];
            $filePath = $pathFile;
            $pdo = new database();
            $sql = "INSERT INTO images (name, size, type, path) VALUES ('$fileName', '$fileSize', '$fileType', '$filePath')";
            $pdo->request_db($sql, $this->datas);
            echo "<br>File $fileName uploaded<br>";
        }

        private function saveData() {
            $pdo = new database();
            $sql = $pdo->build_request(1, $this->datas, 'accueil', $this->home) ;
            $pdo->request_db($sql, $this->datas);
        }
    }

?>