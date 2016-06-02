<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="_bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="_css/header_default.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <!--Não adicione nada antes disso-->
        
        <title></title>

    </head>
    <body>
        
        <header class="row">   
            <nav class="navbar navbar-fixed-top" role="navigation" id="header">
                <div  class=" pull-left"id="profilePic">
                    <a href="edit_profile.php" title="Configurações"><i class="fa fa-cog fa-2x" id="config"></i></a>
                    <a title="Sair" href="login.html"><i class="fa fa-power-off fa-2x" id="exit"></i></a>
                    <a href="my_profile.php"><img class="resposive" id="pic" src="http://tedxnashville.com/wp-content/uploads/2015/11/profile.png"/></a>
                    <p id="userName"><?php echo $var_name; ?></p>
                 </div>
                
                
                <div class=" pull-right">
                    
                    <form class="navbar-form navbar-left" role="search" action="search_profile.php" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Pesquisar" id="search" name="value">
                        </div>
                    </form>
                    <ul class="nav navbar-nav" id="navBarLinks">
                        <li><a href="home.php"><i class="fa fa-home fa-lg" aria-hidden="true"></i>Página Inicial</a></li>
                        <li><a href="show_profile.php?user_id=<?php echo $_SESSION["id"]; ?>"><i class="fa fa-user fa-lg" aria-hidden="true"></i>Meu Perfil</a></li>
                        <li><a href="screenshots.php"><i class="fa fa-picture-o fa-lg" aria-hidden="true"></i>Screenshots</a></li>
                        <li><a href="gameplays.php"><i class="fa fa-film fa-lg" aria-hidden="true"></i> Gameplays</a></li>
                        <li><a href="games.php"><i class="fa fa-gamepad fa-lg" aria-hidden="true"></i> Games</a></li>
                        <li><a href="friends.php"><i class="fa fa-users fa-lg" aria-hidden="true"></i> Amigos</a></li>
                        <li><a href="guilds.php"><i class="fa fa-home fa-lg" aria-hidden="true"></i> Guildas</a></li>
                        <li><a href="messages.php"><i class="fa fa-envelope fa-lg" aria-hidden="true"></i>Mensagens</a></li>
                    </ul>
                    
                </div>
            </nav>
        </header>
       
        
        <!--Não coloque  nada abaixo disso-->
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="_bootstrap/js/bootstrap.min.js"></script> 
    </body>
</html>
