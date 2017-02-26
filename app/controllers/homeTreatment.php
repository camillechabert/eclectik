<?php

include "../mdl_cdr2401dv/connexion_db.php";

Class homeTreatment {

    private $datas;
    private $video;
    private $slf;
    private $sli;
    private $addSocial;
    private $logo;
    private $mentions;
    private $cgu;
    private $text_exp = "/^[0-9A-Za-z ,.;:_?!*()éèùuûàçîï%€$&@'-+$]/";
    public static $errors;

    public function __construct($datas) {
        var_dump($datas);
        $this->datas = $datas;
        //$this->video = $datas['video'];
        $this->slf = $datas['slf'];
        $this->sli = $datas['sli'];
        //$this->logo = $datas['logo'];
        $this->addSocial = $datas['addSocial'];
        $this->mentions = $datas['mentions'];
        $this->cgu = $datas['cgu'];

        $this->textCatcher();
        $this->saveData();
    }

    private function createError($el) {
        return "Votre " . $el . " contient des caractères non valident";
    }

    public function textCatcher() {
        if(!preg_match($this->text_exp, $this->mentions)) {
            self::$errors['mentions'] = $this->createError("mentions légales");
        }
        if(!preg_match($this->text_exp, $this->cgu)) {
            self::$errors['cgu'] = $this->createError("cgu");
        }
    }

    public function treatmentFile () {

    }

    private function saveData() {
        $pdo = new database();
        $sql = "INSERT INTO accueil (lien_facebook, lien_instagram, mentions, cgu, add_social) VALUES (:slf, :sli, :mentions, :cgu, :addSocial)";
        $pdo->request_db($sql, $this->datas);
        var_dump($this->datas);
    }

    public function getPosted() {
        return $this->datas;
    }
}

?>