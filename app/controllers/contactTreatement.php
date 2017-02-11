<?php

include "../mdl_cdr2401dv/connexion_db.php";

Class contactTreatment {

    private $image;
    private $linkedin;
    private $adress;



    public function __construct($datas) {
        $this->datas = $datas;

    }

    private function saveData() {
        $pdo = new database();
        $sql = "INSERT INTO formulaire (destinataire, email, message) VALUES (:name, :email, :message)";
        $pdo->request_db($sql, $this->datas);
    }
}
?>