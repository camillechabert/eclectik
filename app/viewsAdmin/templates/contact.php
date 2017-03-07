<div class="container">
    <div class="row">
        <h4>Contact</h4>
        <h5>Informations de contact :</h5>
        <form class="col s12" method="post" action="../helpers/contactFromPost.php" enctype="multipart/form-data">
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
                    <input name="adresse" id="adresse" type="text" class="validate">
                    <label for="adresse">Adresse</label>
                </div>
                <div class="input-field col s12">
                    <input name="lien_linkedin" id="lien_linkedin" type="text" class="validate">
                    <label for="lien_linkedin">Lien Linkedin</label>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m2 l2">
                    <h5>photo :</h5>
                </div>
                <div class="col s12 m10 l10">
                    <div class="file-field input-field">
                        <div class="btn">
                            <span>fichier</span>
                            <input type="file" name="photo">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" placeholder="video">
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn waves-effect waves-light right" type="submit">
                <i class="material-icons left">save</i>
                Enregistrer
            </button>
        </form>
    </div>
</div>
