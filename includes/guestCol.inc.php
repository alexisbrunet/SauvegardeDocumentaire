<div >
  <div id="block-profil" class="row profil-noco">
    <div id="brief" class="brief-noco">
      <!-- Connexion -->
      <?php
      if(isset($_GET['erreur'])) {
        if($_GET['erreur'] == 1) {
          echo'<p class="bg-danger">Veuillez vous connecter pour accéder a cette page</p>';
        }
        if($_GET['erreur'] == 2) {
          echo'<p class="bg-danger">Mot de passe incorrect</p>';
        }
        if($_GET['erreur'] == 3) {
          echo'<p class="bg-danger">Cet e-mail n\'existe pas</p>';
        }
        if($_GET['erreur'] == 4) {
          echo'<p class="bg-danger">Formulaire incomplet</p>';
        }
        if($_GET['erreur'] == 5) {
          echo'<p class="bg-danger">Format de l\'adresse mail incorrect</p>';
        }
      }
      if(isset($_GET['continue'])){
        if($_GET['continue'] == 1)
          echo'<p class="bg-success">Vous pouvez maintenant vous connecter</p>';
      }
      ?>
      <div id="connexion">
          <a href="#" data-toggle="modal" data-target="#connectModal" class="btn btn-primary" type="submit" >Se connecter</a>
      </div>
      <div id="signup">
        <!-- S'inscrire --> 
        <!-- <button name="button" class="btn btn-primary" data-toggle="modal" data-target="#signupModal">S'inscrire</button> -->
        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#signupModal">S'inscrire</a>
      </div>
    </div>

    <!-- FORMULAIRE DE CONNEXION MODAL-->
    <div class="modal fade" id="connectModal" tabindex="-1" role="dialog" aria-labelledby="connectModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="connectModalTitle">Connexion</h4>
                </div>
                <div class="modal-body">
                    <form action="../php/index.php" method="post" role="form">
                      <div class="form-group">
                        <label for="Connect">Adresse mail ou Pseudo</label><br>
                        <input type="text" id="Connect" class="form-control" name="info" <?php if(isset($_GET['mail'])) echo "value='", $_GET['mail'], "'"; ?> placeholder="Ex: toto@gmail.com"/><br>
                        </div>
                        <div class="form-group">
                            <label for="passe">Mot de passe</label><br>
                            <input type="password" name="motDePasse2" id="passe" class="form-control" placeholder="Mot de passe"/><br><br>
                        </div>
                        <button name="Connecter" type="submit" class="btn btn-primary btn-form">Se connecter</button>
                        <button type="button" class="btn btn-default btn-form" data-dismiss="modal">Annuler</button>
            

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- FORMULAIRE D'INSCRIPTION MODAL -->
    <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
        
        
                    <form action="../php/index.php" id="form_fields" method="post" role="form">
                        <div class="form-group">
                            <label for="prenom">Prénom (Requis)</label>
                            <input type="text" name="prenom" placeholder="Prénom" class="form-control" id="prenom"/>
                        </div>
                        <div class="form-group">
                            <label for="nom">Nom (Requis)</label>
                            <input type="text" name="nom" placeholder="Nom" class="form-control" id="nom"/>
                        </div>
                        <div class="form-group">
                            <label for="nom">Pseudo (Requis)</label>
                            <input type="text" name="pseudo" placeholder="Nom" class="form-control" id="pseudo"/>
                        </div>
                        <div class="form-group">
                            <label for="mail" id="emailLabel">Adresse email (Requis)</label>
                            <input type="email" name="mail" placeholder="Email" class="form-control" id="mail"/>
                        </div>
                        <div class="form-group">
                            <label for="motDePasse">Mot de passe (Requis)</label>
                            <input type="password" name="motDePasse" placeholder="**********" class="form-control" id="motDePasse"/>
                        </div>

                        <button name="Rejoindre" type="submit" class="btn btn-primary btn-form"/>Nous rejoindre</button>
                        <button type="button" class="btn btn-default btn-form" data-dismiss="modal">Annuler</button>
            
            

                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>