<header>
    <!-- Module de connexion / déconnexion -->
    <ul class="nav nav-pills">
        <li> 
            <div id="user"><p class="invite">Invité</p> </div>
        </li>
    </ul>
    <!-- Logo -->
    <li class="center-block hidden-xs">
        <a href="../php/index.php" id="title"><img id="logothot" src="../pictures/logothot.png" alt="" />Thot</a>
    </li>
    <!-- MENU -->
    <div class="navbar-wrapper" id="menu">
        <nav class="navbar navbar-default">    
            <a class="navbar-brand" href="#"></a>
            <ul  class="nav navbar-nav navbar-brand text-center">
                <li ><a href="../php/index.php" class="text-center glyphicon glyphicon-home"> Home</a></li> 
                <li><a  href="#" class="text-center" data-toggle="modal" data-target="#message">Mon Profil</a></li>                        
                <li><a  href="#" class="text-center" data-toggle="modal" data-target="#message">Mes Documents</a></li>                     
                <li><a  href="#" class="text-center" data-toggle="modal" data-target="#message">Mes Equipes</a></li>                       
            </ul> 
            <ul class=" navbar-nav pull-center">    
                <li>
                    <form class="navbar-form " role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Rechercher">
                        </div>
                        <button type="submit" class="btn btn-default">Lancer</button>
                    </form>      
                </li>
            </ul>   
        </nav>
        <div class="modal fade" id="message" tabindex="-1" role="dialog" aria-labelledby="message" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <p>Veuille vous connectez pour continuer</p>
                </div>
            </div>
        </div>
    

    </div>
</header>