<?php

    include '../controllers/formTreatment.php';

    if (isset($_POST) && count($_POST) > 0) {
        if (empty(trim($_POST['name'])) || empty(trim($_POST['email'])) || empty(trim($_POST['message']))) {
            formTreatment::$errors['empty'] = 'Un des Champs est vide';
        } else {
            $treatment = new formTreatment($_POST);
        }
    }
?>