<?php

    include '../../../vendor/autoload.php';
    include 'generator.php';

    if(isset($_POST['template'])){
        echo $twig->render($_POST["template"].".php");
    }

?>