<?php
include "../mdl_cdr2401dv/database.php";

class contactTreatment {
    private $post;
    private $form;
    private $file;
    public static $errors;
    private $email_exp = '/^[A-Za-z0-9._-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    public function __construct($post, $file) {
        $this->post = $post;
        $this->file = $file;
        $this->form = array(
            ':nom' => 'nom',
            ':prenom' => 'prenom',
            ':email' => 'email',
            ':adresse' => 'adresse',
            ':lien_linkedin' => 'lien_linkedin',
        );

        $this->mailCatcher();
        $this->uploadFiles('photo', '../assets/images/');
    }

    private function mailCatcher() {
        if(!preg_match($this->email_exp, $_POST['email'])) {
            $error = "l'adresse mail saisie n'est pas valide, vérifiez le format.";
            self::$errors['mail'] = $error;
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
                    header('location:../viewsAdmin/admin.php?template=contact');
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
        $sql = $pdo->build_request(1, $this->post,'contact', $this->form);
        $pdo->request_db($sql, $this->post, false);
    }
}
?>