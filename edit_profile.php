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
    <head>
        <link rel="stylesheet" type="text/css" href="_css/edit_profile.css">
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
                        </div>
                    </li>
                    <li> 
                        <div>
                            <a href="#">Meu Perfil</a>
                        </div>
                    </li>
                    <li> 
                        <div>
                            <a href="#">Screenshots</a>
                        </div>
                    </li>
                    <li> 
                        <div>
                            <a href="#">Gameplays</a>
                        </div>
                    </li>
                    <li> 
                        <div>
                            <a href="#">Game List</a>
                        </div>
                    </li>
                    <li> 
                        <div>
                            <a href="#">Guildas</a>
                        </div>
                    </li>
                    <li> 
                        <div>
                            <a href="#">Amigos</a>
                        </div>
                    </li>
                </ul>			
            </div>

        </header>
        <section>
            <div id = "profile">
                <h1>Perfil</h1>
                <form method="POST" action="./_method/edit_user.php">
                    <p>Nome:<input type="text" name="new_name"><?php echo $_SESSION["name"] ?></input></p>
                    <p>Sexo:<select name="sex">
                        <option value="male">Masculino</option>
                        <option value="female">Feminino</option>
                        <option value="other">Outro</option>
                    </select></p>
                    <p>Data de Nascimento: <input type="text" id="datepicker" name="new_date"/></p>
                    <p>PSN:<input type="text" name="new_psn"><?php echo $_SESSION["psn"] ?></input></p>
                    <p>Steam:<input type="text" name="new_steam"><?php echo $_SESSION["steam"] ?></input></p>
                    <p>Live:<input type="text" name="new_live"><?php echo $_SESSION["xbox_live"] ?></input></p>
                    <p>Nintendo ID:<input type="text" name="new_nintendo"><?php echo $_SESSION["nintendo"] ?></input></p>
                    <p>Biografia:<textarea name="new_biography"><?php echo $_SESSION["biography"] ?></textarea></p>
                    <p>Jogo Favorito:<input type="text" name="new_game"><?php echo $_SESSION["favorite_game"] ?></input></p><br>
                    <p>Senha Atual:<input type="password" name = "curr_password"/></p>
                    <p><button type="submit">Efetivar Alterações</button></p>
                </form>
                </div>
            </div>
            <div id="account">
                <h1>Conta</h1>
                <div id="email">

                </div>
                <div id="password">

                </div>
                <div id="sex">

                </div>
                <div id="birthday">

                </div>


            </div>

        </section>

    </body>
</html>