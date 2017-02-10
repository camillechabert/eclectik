<?php

include '../controllers/FormTreatment.php';

if (isset($_POST) && count($_POST) > 0) {

    if (empty(trim($_POST['name'])) || empty(trim($_POST['email'])) || empty(trim($_POST['message']))) {
        FormTreatment::$errors['empty'] = 'Un des Champs est vide';
    } else {
        $traitement = new FormTreatment($_POST);
    }
}

?>