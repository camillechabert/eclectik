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
  <body class="cyan darken-4 loaded">
      <div id="login-page" class="row">
       <div class="col s12 z-depth-4 card-panel">
         <form class="login-form" method="post" action="../controllers/loginTreatment.php">
           <div class="row">
             <div class="input-field col s12 center">
               <img src="../assets/images/logo_eclectik.png" class="logo-form responsive-img valign profile-image-login">
             </div>
           </div>
           <div class="input-field col s12">
             <input id="username" name="username" type="text">
             <label for="username" class="center-left">Identifiant</label>
           </div>
           <div class="input-field col s12">
             <input id="password" name="password" type="password">
             <label for="password">Mot de passe</label>
           </div>
           <div class="row">
             <button class="btn waves-effect waves-light right" type="submit">
               connexion
             </button>
           </div>
           <div class="row">
             <div class="input-field ol s12 m12 l12">
                 <p class="margin right-align medium-small"><a href="#" class="grey-text">Mot de passe oublié ?</a></p>
             </div>
           </div>
         </form>
       </div>
     </div>
      <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
      <script src="../assets/js/materialize.min.js"></script>
  </body>
</html>
