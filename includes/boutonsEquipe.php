<?php //include '../includes/equipe.class.php'; ?>
<div>
  <div class="inline">
    <a href="#" data-toggle="modal" data-target="#ajouterModal" class="glyphicon glyphicon-plus"></a>
  </div>
  <div class="inline">
    <a href="#" class="glyphicon glyphicon-minus" data-toggle="modal" data-target="#retirerModal"></a>
  </div>
</div>

<!-- FORMULAIRE AJOUTER MEMBRE MODAL-->
<div class="modal fade" id="ajouterModal" tabindex="-1" role="dialog" aria-labelledby="ajouterModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="connectModalTitle">Ajouter un membre</h4>
      </div>
      <div class="modal-body">
        <form action="ajouter.php" id="formAjouter" method="post" role="form">
          <div class="form-group">
            <label for="Connect">Adresse mail ou Pseudo</label><br>
            <input type="text" id="pseudoAjouter" class="form-control" name="info" placeholder="Ex: toto@gmail.com"/><br>
          </div>
          <button name="Ajouter" type="submit" id="ajouter" class="btn btn-primary btn-form">Ajouter</button>
          <button type="button" class="btn btn-default btn-form" data-dismiss="modal">Annuler</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- FORMULAIRE SUPPRIMER MEMBRE MODAL-->
<div class="modal fade" id="retirerModal" tabindex="-1" role="dialog" aria-labelledby="retirerModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="connectModalTitle">Retirer un membre</h4>
      </div>
      <div class="modal-body">
        <form action="../php/index.php" method="post" role="form">
          <div class="form-group">
            <label for="Connect">Adresse mail ou Pseudo</label><br>
            <input type="text" id="Connect" class="form-control" name="info" <?php if(isset($_GET['mail'])) echo "value='", $_GET['mail'], "'"; ?> placeholder="Ex: toto@gmail.com"/><br>
          </div>
          <button name="Connecter" type="submit" class="btn btn-primary btn-form">Retirer</button>
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
            <input type="text" name="pseudo" placeholder="Pseudo" class="form-control" id="pseudo"/>
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