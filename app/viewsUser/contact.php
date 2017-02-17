<?php

include '../helpers/contactFromPost.php'; ?>

<html>
    <head>
        <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
        <!-- inject:css -->
        <link rel="stylesheet" href="/app/assets/css/front/global.css">
        <!-- endinject -->
    </head>
    <body>
    <?php include 'header.php'; ?>
    <section>
        <?php include "nav.php"; ?>
        <div class="main_content">
            <div class="contact">
                <form name="contact_form" action="" method="post">
                    <label for="name">Nom</label>
                    <p><input type="text" name="name"/></p>
                    <label for="email">Email</label>
                    <p><input type="text" name="email"/></p>
                    <label for="message">Message</label>
                    <p><textarea name="message" cols="30" rows="10"></textarea></p>
                    <p><input type="submit" value="envoyer"></p>
                </form>
            </div>
        </div>
        <?php include 'social.php'; ?>
    </section>
    <?php include 'footer.php'; ?>
    <!-- inject:js -->
    <script src="/app/assets/js/global.js"></script>
    <script src="/app/assets/js/materialize.min.js"></script>
    <!-- endinject -->
    </body>
</html>
