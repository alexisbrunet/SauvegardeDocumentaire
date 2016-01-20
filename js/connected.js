 //ce code est inclu uniquement sur l'index lorsque l'utilisateur est connecté
 $(function(){
 	$("#block-create-path").click(function() {
 		window.location = $(this).find("a").attr("href");
 		return false;
 	});
 	$("#brief").click(function() {
 		window.location = 'profil.php'; //creer la page profil
 		return false;
 	});
 });