<div class="container">
    <div class="row">
        <h4>Profil</h4>
        <h5>Mise à jour des informations</h5>
        <form class="col s12" method="post" action="" enctype="multipart/form-data">
            <div class="row">
                <h6>INFORMATIONS GENERALES : </h6>
                <div class="input-field col s6">
                    <input name="name" id="name" type="text" class="validate">
                    <label for="name">Nom</label>
                </div>
                <div class="input-field col s6">
                    <input name="surname" id="surname" type="text" class="validate">
                    <label for="surname">Prénom</label>
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
                    <input id="mdp1" name="mdp1" type="password" class="validate">
                    <label for="mdp1">Saisie 1</label>
                </div>
                <div class="input-field col s6">
                    <input id="mdp2" name="mdp2" type="password" class="validate">
                    <label for="mdp2">Saisie 2</label>
                </div>
            </div>
            <button class="btn waves-effect waves-light right" type="submit">
                <i class="material-icons left">save</i>
                Enregistrer
            </button>
        </form>
    </div>
</div>