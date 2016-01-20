$(function(){
	//$('#signupButton').click(function(){
		
		//$('#connexion').remove();
		//$('#signup').remove();
		//$('#brief').empty().html('<h1>Inscription</h1>Cela prend quelques secondes!');
		//$('#brief').after('<div id="form"></div>');
		//$('#form').html('<form action="create.php" id="form_fields" method="post" role="form">           <div class="form-group">             <label for="prenom">Prénom (Requis)</label>             <input required="true" type="text" name="prenom" placeholder="Prénom" class="form-control" id="prenom"/>           </div>           <div class="form-group">             <label for="nom">Nom (Requis)</label>             <input required="true" type="text" name="nom" placeholder="Nom" class="form-control" id="nom"/>           </div>           <div class="form-group">             <label id="emailLabel" for="mail">Adresse email (Requis)</label>             <input required="true" type="email" name="mail" placeholder="Email" class="form-control" id="mail"/>           </div>           <div class="form-group">             <label for="motDePasse">Mot de passe (Requis)</label>             <input required="true" type="password" name="motDePasse" placeholder="**********" class="form-control" id="motDePasse"/>           </div>            <input value="Nous rejoindre" id="submitButton" type="submit" class="btn btn-default"/>           <!-- TODO : Passer les infos à inscription2.php -->          </form>');
		
		$('#mail').keyup(function(){
			var mail = $('#mail').val();
			$('#emailLabel').html('Vérification de la disponibilité de l\'adresse <img width="25px" height="25px" alt="load" src="http://www.rast.hr/Content/slike/loading.gif">')
			$.post("../includes/checkAdress.php", {mail:mail},
				function(result){
					if (result){
						$('#emailLabel').html('Un compte avec cette adresse mail existe déjà');
						$('#emailLabel').parent().addClass('has-error').removeClass('has-success');
					}
					else{
						$('#emailLabel').html('Adresse mail disponible');
						$('#emailLabel').parent().addClass('has-success').removeClass('has-error');
					}
				});
		});
	//});
});