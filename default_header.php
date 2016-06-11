<!Doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="_bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="_css/default_header.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        
        <?php echo"<scrip type='text/javascript' src='_js/menuBehavior.js'> </script>";?>
        
    </head>
    <body>
    <div id ="Menu" >
        <form class="col-lg-12" role="search" action="search_profile.php" method="POST">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Pesquisar" id="search" name="value">
                <!--<span class="input-group-btn"><button class="btn btn-primary"><i class="fa fa-search"></i></button></span>-->
            </div>
        </form>
        <ul id="configAndExit" class="list-unstyled">
            <a href="edit_profile.php" title="Configurações"><li><i class="fa fa-cog fa-lg" aria-hidden="true"></i></li></a>
            <a title="Sair" href = './_method/logout.php'><li><i class="fa fa-power-off fa-lg" aria-hidden="true"></i></li></a>
        </ul>
        <a <?php echo "href = 'show_profile.php?user_id=".$_SESSION["id"]."'";?>>
            <img class="resposive" id="pic" 
            <?php
            if($_SESSION["profile_pic"])
                    echo "src = '".$_SESSION["profile_pic"]."'";
            else    
                echo "src = 'http://tedxnashville.com/wp-content/uploads/2015/11/profile.png'";
        ?>>
        <p id="userName"><?php echo $_SESSION["name"]; ?></p>
        </a>
        <ul id="menuOption"class="list-unstyled pull-right">
            <a href="home.php"><li><i class="fa fa-home fa-lg" aria-hidden="true"></i>Inicio</li></a>
            <a href="show_profile.php?user_id=<?php echo $_SESSION["id"]; ?>"><li><i class="fa fa-user fa-lg" aria-hidden="true"></i>Meu Perfil</li></a>
            <a href="screenshots.php"><li><i class="fa fa-picture-o fa-lg" aria-hidden="true"></i>Screenshots</li></a>
            <a href="gameplays.php"><li><i class="fa fa-film fa-lg" aria-hidden="true"></i> Gameplays</li></a>
            <a href="games.php"><li><i class="fa fa-gamepad fa-lg" aria-hidden="true"></i> Games</li></a>
            <a href="friends.php"><li><i class="fa fa-users fa-lg" aria-hidden="true"></i> Amigos</li></a>
            <a href="guilds.php"><li><i class="fa fa-home fa-lg" aria-hidden="true"></i> Guildas</li></a>
            <a href="messages.php"><li><i class="fa fa-envelope fa-lg" aria-hidden="true"></i>Mensagens</li></a>
        </ul>  
    </div>

    <!-- jQuery -->   
    <script src="_jquery//jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="_bootstrap/js/bootstrap.min.js"></script>
    
    </body>
    
    
</html>

