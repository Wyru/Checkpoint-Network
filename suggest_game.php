<?php
/* Autores: Nixon Silva
 * Data: 15/06/2016
 * Função: Código referente à pagina de adição de jogos ao sistema
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
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="_bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="_css/edit_profile.css">
        
        <!--Não adicione nada antes disso-->

        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script>$(function ()
            {
                $("#datepicker").datepicker();
            });
        </script>
        <meta charset="utf-8">
        <title>Adicionar Jogo</title>
    </head>
    <body>
        <header>
            <?php
                $var_name = $_SESSION["name"];
                include("default_header.php");
            ?>
        </header>
        <section class="container-fluid" id="page-content">
            <div class="row" >
                <div class="col-lg-12" id="title">
                    <h1><i class="fa fa-pencil fa-lg"></i>Adicionar Jogo</h1>
                </div>
            </div>
            <div class="row" id="Editaveis">
                <form enctype="multipart/form-data" role="form" method="POST" action="./_method/add_game.php">
                    <div class="col-lg-8 col-lg-offset-1  form-group">
                        <br>
                        <label for="game_art">Selecione uma imagem:</label>
                        <input name="game_art" type="file" />
                        <label for="game_name">Nome do Jogo:</label>
                        <input class="form-control" id="Name" type="text" name="game_name" value="" required>
                        <label for="game_genre">Gênero:</label>
                        <input class="form-control" id="Name" type="text" name ="game_genre" value="" required/>
                        <label for="game_release">Data de Lançamento:</label> 
                        <input class="form-control" id="Name" type="date" id="datepicker" name="game_release" value="" />
                        <label for="game_developer">Desenvolvedora:</label>
                        <input class="form-control" id="Name" type="text" name="game_developer" value="" required />
                        <label for="game_publisher">Publicadora:</label>
                        <input class="form-control" id="Name" type="text" name="game_publisher" value="" />
                        <label for="game_description">Descrição:</label>
                        <textarea class="form-control" rows="4" id="senha" name="game_description" placeholder="Entre com uma breve descrição do jogo."></textarea>
                        <br><p><button class="btn btn-primary" type="submit">Enviar</button></p>
                    </div>
                </form>
            </div>
        </section>
    </body>
</html>