<div class="container">
    <div class="row">
        <h4>Profil</h4>
        <h5>Mise à jour des informations</h5>
        <form class="col s12" method="post" action="../helpers/adminFromPost.php" enctype="multipart/form-data">
            <div class="row">
                <h6>INFORMATIONS GENERALES : </h6>
                <div class="input-field col s6">
                    <input name="nom" id="nom" type="text" class="validate">
                    <label for="nom">Nom</label>
                </div>
                <div class="input-field col s6">
                    <input name="prenom" id="prenom" type="text" class="validate">
                    <label for="prenom">Prénom</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input name="email" id="email" type="email" class="validate">
                    <label for="email">E-mail</label>
                </div>
                <div class="input-field col s6">
                    <input name="username" id="username" type="text" class="validate">
                    <label for="username">Identifiant</label>
                </div>
            </div>
            <div class="row">
                <h6>NOUVEAU MOT DE PASSE : </h6>
                <div class="input-field col s6">
                    <input id="mot_de_passe" name="mot_de_passe" type="password" class="validate">
                    <label for="mot_de_passe">Saisie 1</label>
                </div>
                <div class="input-field col s6">
                    <input id="mdp_confirmation" name="mdp_confirmation" type="password" class="validate">
                    <label for="mdp_confirmation">Saisie 2</label>
                </div>
            </div>
            <button class="btn waves-effect waves-light right" type="submit">
                <i class="material-icons left">save</i>
                Enregistrer
            </button>
        </form>
    </div>
</div>