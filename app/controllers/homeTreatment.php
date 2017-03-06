<?php

include "../mdl_cdr2401dv/database.php";

Class homeTreatment {

    private $datas;
    private $form;
    private $file;
    private $text_exp = "/^[0-9A-Za-z ,.;:_?!*()éèùuûàçîï%€$&@'-+$]/";
    public static $errors;

    public function __construct($datas, $file) {
        $this->datas = $datas;
        $this->file = $file;
        $this->form = array(
            ':slf' => 'lien_facebook',
            ':sli' => 'lien_instagram',
            ':mentions' => 'mentions',
            ':addSocial' => 'add_social'
        );
        $this->textCatcher();
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
        $extensions = array('.png', '.gif', '.jpg', '.jpeg', '.svg', '.mp4', '.mov');
        $extension = strrchr($_FILES[$files]['name'], '.');
        if (!empty($tmpName)) {
            if(!in_array($extension, $extensions)) {
                $error = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, svg...';
            }
            if($size > $maxSize) {
                $error = 'Le fichier est trop volumineux..';
            }
            if(!isset($error)) {
                $file = strtr($file, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
                $file = preg_replace('/([^.a-z0-9]+)/i', '-', $file);
                $fileName = uniqid() . $file;
                $path = $folder . $fileName;
                if(move_uploaded_file($tmpName, $path)) {
                    echo $msg = 'Upload effectué avec succès !';
                    $this->saveFiles($files, $path, $fileName);
                    header('location: ../viewsAdmin/admin.php');
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

    private function saveFiles($files, $pathFile, $fileName) {
        $pathFile = str_replace("../", "", $pathFile);
        $datas = array(
            ':name' => $fileName,
            ':path' => $pathFile,
            ':type' => $this->file[$files]["type"],
            ':size' => $this->file[$files]["size"]
        );

        $pdo = new database();
        $sql = "INSERT INTO medias (name, path, type, size) VALUES (:name, :path, :type, :size)";
        $pdo->request_db($sql, $datas, false);
        $this->saveData($pdo);
    }

    private function saveData($pdo) {
        $sql = $pdo->build_request(1, $this->datas, 'accueil', $this->form);
        $pdo->request_db($sql, $this->datas);
    }
}



?>