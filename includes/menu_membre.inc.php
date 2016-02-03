<?php require_once 'user.class.php';?>
<header>
    <ul id="headerBar" class="list-inline">
        <!-- Module de connexion / déconnexion -->
        <li class="pull-left">
            <?php if(isset($user)): ?>
            Bienvenue à vous, <?=$user->getNom()?> !
            <?php endif; ?> 
            <ul class="navig">
                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                       
                    </a>
                    <ul class="dropdown-menu">
                        <li class="divider"></li>
                        <li><a href="../php/deconnect.php">Déconnexion</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <!-- Logo -->
        <li class="center-block hidden-xs">
            <a href="../php/index.php" id="title"><img id="logothot" src="../pictures/logothot.png" alt="" />Thot</a>
        </li>
    </ul>

    <!-- MENU -->
    <div class="navbar-wrapper" id="menu">
        <nav class="navbar navbar-default">    
            <a class="navbar-brand" href="#"></a>
            <ul  class="nav navbar-nav navbar-brand text-center">
                <li ><a href="#" class="text-center glyphicon glyphicon-home">Home</a></li> 
                <li><a  href="../php/account.php" class="text-center">Mon Profil</a></li>                        <!-- creer le fichier profil.php -->
                <li><a  href="#" class="text-center">Mes Documents</a></li>                     <!-- creer le fichier document.php -->
                <li><a  href="../php/mesEquipes.php" class="text-center">Mes Equipes</a></li>                       <!-- creer le fichier equipe.php -->
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
    </div>
</header>