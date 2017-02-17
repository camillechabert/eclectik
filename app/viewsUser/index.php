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
                <div class="video_content">
                    <div class="video">
                        <div>
                            <video id="video" onloadstart="this.volume=0" controls preload="auto" autoplay="true" loop>
                                <source src="../assets/videos/video.mp4" type="video/mp4">
                            </video>
                        </div>
                    </div>
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
