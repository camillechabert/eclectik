<html>
    <head>
        <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
        <!-- inject:css -->
        <link rel="stylesheet" href="/app/assets/css/front/*.css">
        <link rel="stylesheet" href="/app/assets/css/front/global.css">
        <!-- endinject -->
    </head>
    <body>
        <?php include 'header.php' ?>
        <section class="main-content">
            <div class="video">
                <video id="video" onloadstart="this.volume=0" controls preload="auto" autoplay="true" loop>
                    <source src="../assets/videos/video.mp4" type="video/mp4">
                </video>
            </div>
        </section>
        <!-- inject:js -->
        <script src="/app/assets/js/global.js"></script>
        <!-- endinject -->
        <?php include 'footer.php' ?>
    </body>
</html>