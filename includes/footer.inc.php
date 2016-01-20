<!-- DEBUT JAVASCRIPT -->
<!-- Scripts supplémentaires -->
<script src="../js/bootstrap.min.js"></script>
<!-- <script src="../js/classie.js"></script> -->
<!-- <script src="../js/modernizr.custom.js"></script> -->
<!-- <script src="../js/sidemenu.js"></script> -->
<!-- <script src="../js/notify.js"></script> -->
<script src="../js/leanModal.min.js"></script>
<script src="../js/zabuto_calendar.js"></script>
<script src="../js/sidenotif.js"></script>
<script src="../js/bootstrap-growl.min.js"></script>
<script src="../js/jquery.adaptive-modal.js"></script>
<script type="text/javascript">
    // à déplacer dans index.php
    $(function(){
    	$("#home").click(function() {
    		window.location = "index.php";
    		return false;
    	});

        $(".clickableRow").click(function() {
          window.document.location = $(this).attr("href");
        });

    	$("#my-calendar").zabuto_calendar();

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
                }
            );
        }); 
    });

     $.growl(false, {
      type: 'warning',
      placement: {
         from: "top",
         align: "left"
     },
     animate: {
         enter: 'animated fadeInLeft',
         exit: 'animated fadeOutLeft'
     },
     offset: {
         x: 10,
         y: 80
     },
     mouse_over: "pause"
    });

    function getUrlParameter(sParam)
        {
           var sPageURL = window.location.search.substring(1);
           var sURLVariables = sPageURL.split('&');
           for (var i = 0; i < sURLVariables.length; i++) 
           {
              var sParameterName = sURLVariables[i].split('=');
              if (sParameterName[0] == sParam) 
                {
                 return sParameterName[1];
                }
            }
        } 

</script>
<!-- AUTO COMPLETION GOOGLE BY VINCENT 
A DEPLACER DANS L'INDEX ET LA CREATION DE TRAJET 
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
<script src="../js/googleAPI.js"></script>
 FIN JAVASCRIPT -->