<div class="container" xmlns="http://www.w3.org/1999/html">
    <h4>Page accueil</h4>
    <form method="post" action="../helpers/homeFromPost.php" enctype="multipart/form-data">
        <div id="input-file-input" class="section">
            <div class="row">
                <div class="col s12 m2 l2">
                    <h5>Vidéo:</h5>
                </div>
                <div class="col s12 m10 l10">
                    <div class="file-field input-field">
                        <div class="btn">
                            <span>fichier</span>
                            <input type="file" name="video">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" placeholder="video">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="input-file-input" class="section">
            <h4>Réseaux sociaux</h4>
            <div class="row">
                <div class="col s12 m2 l2">
                    <h5>Facebook:</h5>
                </div>
                <div class="col s12 m10 l10">
                    <div class="input-field col s12">
                        <input id="first_name" type="text" name="slf" placeholder="video">
                        <label for="first_name">Lien Facebook</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m2 l2">
                    <h5>Instagram:</h5>
                </div>
                <div class="col s12 m10 l10">
                    <div class="input-field col s12">
                        <input id="first_name" type="text" name="sli" placeholder="video">
                        <label for="first_name">Lien Instagram</label>
                    </div>
                </div>
            </div>
            <h4>Ajouter un réseau social</h4>
            <div class="row">
                <div class="col s12 m10 l12">
                    <div class="input-field col s12">
                        <input id="first_name" type="text" name="addSocial" placeholder="video">
                        <label for="first_name">Lien</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m10 l12">
                    <div class="file-field input-field">
                        <div class="btn">
                            <span>Icône</span>
                            <input type="file" name="icon">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" placeholder="video">
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="chip">
                    Pinterest
                    <i class="close material-icons">close</i>
                </div>
            </div>
        </div>
        <div id="input-file-input" class="section">
            <h4>Général</h4>
            <div class="row">
                <div class="col s12 m2 l2">
                    <h5>Logo:</h5>
                </div>
                <div class="col s12 m10 l10">
                    <div class="file-field input-field">
                        <div class="btn">
                            <span>fichier</span>
                            <input type="file" name="logo">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" placeholder="video">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m2 l2">
                    <h5>Mentions légales:</h5>
                </div>
                <div class="col s12 m10 l10">
                    <input type="button" class="btn trr" value="G" onclick="commande('bold');">
                    <input type="button" class="btn trr" value="I" onclick="commande('italic');">
                    <input type="button"  class="btn trr" value="S" onclick="commande('underline');">
                    <input type="hidden" value="" name="mentions">
                    <div contenteditable="true" style="height:250px; overflow: auto" class="collection" id="textarea"></div>
                </div>
            </div>
        </div>
        <button class="btn waves-effect waves-light right" type="submit">
            <i class="material-icons left">save</i>
            Enregistrer & publier
        </button>
    </form>
</div>
