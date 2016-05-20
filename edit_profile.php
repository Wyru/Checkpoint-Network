<?php
/* Autores: Nixon Silva e Will Saymon
 * Data: 19/05/2016
 * Função: Código referente à pagina de edição de perfil
 */

/* TODO: Escrever rotina de redefinição de senha
 * 
 */

// Inicia sessão
session_start ();
// Verifica se a variável de login está ativada
if (!$_SESSION["login_status"])
{
    // Envia para a página de login caso não esteja	
    header ("location:login.html");
    exit;
}
?>

<!DOCTYPE html>
<html>
    <<<<<<< HEAD
    <head>
        <link rel="stylesheet" type="text/css" href="_css/edit_profile.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script>$(function ()
            {
                $("#datepicker").datepicker();
            });
        </script>
        <meta charset="utf-8">
        <title>Editar Perfil</title>
    </head>
    <body>
        <header>
            <div id= "navBar">
                <ul>
                    <li> 
                        <div>
                            <a href="#">Página Inicial</a>
                            <head>
                                <link rel="stylesheet" type="text/css" href="_css/edit_profile.css">
                                <meta charset="utf-8">
                                <title>Editar Perfil</title>
                            </head>
                            <body>
                                <header>
                                    <div id="profilePic">
                                        <img src="http://tedxnashville.com/wp-content/uploads/2015/11/profile.png"/>
                                        <p><?php echo $_SESSION["name"]; ?></p>
                                    </div>

                                    <div id= "navBar">
                                        <form class = "search" action="search_profile.php" method="POST">
                                            <input type="text" name="value" placeholder=" Pesquisar">
                                        </form>
                                        <ul>
                                            <li> 
                                                <div>
                                                    <a href="home.php"><img src="_imagens/_icones/home.png">Página Inicial</a
                                                </div>
                                            </li>
                                            <li> 
                                                <div>
                                                    <a href="#">Meu Perfil</a>
                                                    <a href="my_profile.php"><img src="_imagens/_icones/profile.png">Meu Perfil</a>
                                                </div>
                                            </li>
                                            <li> 
                                                <div>
                                                    <a href="#">Screenshots</a>
                                                    <a href="my_photos.php"><img src="_imagens/_icones/screenshots.png">Screenshots</a>
                                                </div>
                                            </li>
                                            <li> 
                                                <div>
                                                    <a href="#">Gameplays</a>
                                                    <a href="my_videos"><img src="_imagens/_icones/gamePlay.png">Gameplays</a>
                                                </div>
                                            </li>
                                            <li> 
                                                <div>
                                                    <a href="#">Game List</a>
                                                    <a href="my_games"><img src="_imagens/_icones/games.png">Game List</a>
                                                </div>
                                            </li>
                                            <li> 
                                                <div>
                                                    <a href="#">Guildas</a>
                                                    <a href="my_groups"><img src="_imagens/_icones/guilds.png">Guildas</a>
                                                </div>
                                            </li>
                                            <li> 
                                                <div>
                                                    <a href="#">Amigos</a>
                                                    <a href="my_friends"><img src="_imagens/_icones/friends.png">Amigos</a>
                                                </div>
                                            </li>
                                        </ul>			
                                    </div>
                                </header>
                                <section>
                                    <div id = "profile">
                                        <h1>Perfil</h1>
                                        <form method="POST" action="./_method/edit_user.php">
                                            <p>Nome:<input type="text" name="new_name" value="<?php echo $_SESSION["name"] ?>"></p>
                                            <p>Sexo:<select name="sex">
                                                    <option value="male">Masculino</option>
                                                    <option value="female">Feminino</option>
                                                    <option value="other">Outro</option>
                                                </select></p>
                                            <p>Data de Nascimento: <input type="text" id="datepicker" name="new_date" value="<?php echo $_SESSION["birthday"] ?>"></p>
                                            <p>PSN:<input type="text" name="new_psn" value="<?php echo $_SESSION["psn"] ?>"></p>
                                            <p>Steam:<input type="text" name="new_steam" value="<?php echo $_SESSION["steam"] ?>"></p>
                                            <p>Live:<input type="text" name="new_live" value="<?php echo $_SESSION["xbox_live"] ?>"></p>
                                            <p>Nintendo ID:<input type="text" name="new_nintendo" value="<?php echo $_SESSION["nintendo"] ?>"></p>
                                            <p>Biografia:<textarea name="new_biography"><?php echo $_SESSION["biography"] ?></textarea></p>
                                            <p>Jogo Favorito:<input type="text" name="new_game" value="<?php echo $_SESSION["favorite_game"] ?>"></p><br>
                                            <p>Senha Atual:<input type="password" name = "curr_password"/></p>
                                            <p><button type="submit">Efetivar Alterações</button></p>
                                        </form>
                                    </div>
                        </section>
                        </body>
                        </html>