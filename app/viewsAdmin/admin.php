<?php

include '../../vendor/autoload.php';
include 'templatesManager/generator.php';

session_start();
if (isset($_SESSION['connecte']) && $_SESSION['connecte'] == true) { ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Eclectik Back Office</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="../assets/css/admin/materialize.css">
    <link rel="stylesheet" href="../assets/css/admin/global.css">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  </head>
  <body>
    <div class="no-padding ">
      <nav class="cyan darken-4">
        <div class="nav-wrapper">
          <ul>
            <li>
              <img src="../assets/images/logo_eclectik.png">
            </li>
            <li>
              <a href="../viewsUser/index.php" target="_blank">MON SITE</a>
            </li>
          </ul>
          <ul class="right">
            <li><a data-href="profil" class="pages">Profil</a></li>
            <li><a href="../controllers/logoutTreatment.php" data-href="disconnect">Déconnexion</a></li>
          </ul>
        </div>
      </nav>
    </div>
    <div class="row sidebarPos">
      <div class="col s1 side-nav fixed no-padding absoluteNav">
        <ul class="collapsible collapsible-accordion" data-collapsible="accordion">
          <li>
            <h5 class="sectionNav">Pages</h5>
          </li>
          <li>
            <div class="collapsible-header pages" data-href="accueil">Accueil</div>
          </li>
          <li>
            <div class="collapsible-header">Collections<i class="petite material-icons right">keyboard_arrow_down</i></div>
            <div class="collapsible-body category">
              <ul>
                <li><a class="pages" data-href="addCollection">Ajouter une collection</a></li>
                <li><a class="pages" data-href="collections">Toutes les collections</a></li>
              </ul>
            </div>
          </li>
          <li>
            <div class="collapsible-header pages" data-href="univers">Univers</div>
          </li>
          <li>
            <div class="collapsible-header pages" data-href="contact">Contact</div>
          </li>
          <h5 class="sectionNav">Médias</h5>
          <li>
            <div class="collapsible-header pages" data-href="medias">Photos et vidéos</div>
          </li>
        </ul>
      </div>
      <div id="app" class="col s10 no-padding">
        <?php
          echo $twig->render('accueil.php');
        ?>
      </div>
    </div>
    <script  src="../../bower_components/jquery/dist/jquery.min.js"></script>
    <script src="../assets/js/materialize.min.js"></script>
    <script src="templatesManager/callTemplates.js"></script>
    <script src="../assets/js/global.js"></script>
  </body>
</html>

  <?php

  } else {
   header('location: login.php');
   session_destroy();
  }
?>