<div class="container">
    <div class="row">
        <h4>Univers</h4>
        <h5>Informations de contact :</h5>
        <form class="col s12" method="post" action="../helpers/adminFromPost.php" enctype="multipart/form-data">
            <div class="row">
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
                    <label for="username">Adresse</label>
                </div>
                <div class="input-field col s12">
                    <input name="username" id="username" type="text" class="validate">
                    <label for="username">Lien Linkedin</label>
                </div>
            </div>
            <button class="btn waves-effect waves-light right" type="submit">
                <i class="material-icons left">save</i>
                Enregistrer
            </button>
        </form>
    </div>
</div>