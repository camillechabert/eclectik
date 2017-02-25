<?php

    //need to be changed when switching server
    $loader = new Twig_Loader_Filesystem("/home/camille/public_html/eclectik/app/viewsAdmin/templates");
    $twig = new Twig_Environment($loader, array(
        'cache' => false,
        'charset' => 'UTF-8'
    ));

?>