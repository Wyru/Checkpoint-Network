<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="_bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="_css/header_default.css">
        <!--Não adicione nada antes disso-->
        
        <title></title>
    </head>
    <body>
        <header class="row">   
            <nav class="navbar navbar- navbar-fixed-top" role="navigation" id="header">
                <div  class="pull-left"id="profilePic">
                    <img id="config" src="_imagens/_icones/config.png"/>
                    <img id="exit" src="_imagens/_icones/exit.png"/>
                    <a href="my_profile.php"><img class="resposive" id="pic" src="http://tedxnashville.com/wp-content/uploads/2015/11/profile.png"/></a>
                    <p id="userName"><?php echo $_SESSION["name"]; ?></p>
                 </div>
                <div class="pull-right">
                    <form class="navbar-form navbar-left" role="search" >
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Pesquisar" id="search">
                        </div>
                    </form>
                    <ul class="nav navbar-nav" id="navBarLinks">
                        <li><a href="my_home.php"><img src="_imagens/_icones/home.png">Página Inicial</a></li>
                        <li><a href="my_profile.php"><img src="_imagens/_icones/profile.png"> Meu Perfil</a></li>
                        <li><a href="my_screenshots.php"><img src="_imagens/_icones/screenshots.png"> Screenshots</a></li>
                        <li><a href="my_gameplays.php"><img src="_imagens/_icones/gamePlay.png"> Gameplays</a></li>
                        <li><a href="my_games.php"><img src="_imagens/_icones/games.png"> Games</a></li>
                        <li><a href="my_friends.php"><img src="_imagens/_icones/guilds.png"> Amigos</a></li>
                        <li><a href="my_guilds.php"><img src="_imagens/_icones/friends.png"> Guildas</a></li>
                        <li><a href="my_messages.php"><img src="_imagens/_icones/chat.png"> Mensagens</a></li>
                    </ul>
                    
                </div>
            </nav>
        </header>
        
    <!--Não coloque  nada abaixo disso-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>  
    </body>
</html>
