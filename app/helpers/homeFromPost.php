<?php

    include '../controllers/homeTreatment.php';

    if (isset($_POST) && count($_POST) > 0) {

        if (empty(trim($_POST['slf'])) || empty(trim($_POST['sli'])) || empty(trim($_POST['mentions'])) || empty(trim($_POST['cgu']))) {
            FormTreatment::$errors['empty'] = 'Un des Champs est vide';
        } else {
            $traitement = new homeTreatment($_POST);
        }
    }

?>