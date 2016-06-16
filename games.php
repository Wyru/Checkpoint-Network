<!DOCTYPE html>
<!--
Autor: Will Saymon e Nixon Moreira Silva
Data de Criação: 28/05/2016
Data de Alteração: 16/06/2016
Descrição: Página que mostra todos os games adicionados pelo jogador em sua conta.
-->
<?php
// Inicia sessão
session_start ();
                     
// Verifica se a variável de login está ativada
if (!$_SESSION["login_status"])
{
    // Envia para a página de login caso não esteja	
    header("location:index.html");
    exit;
}

// Conecta ao banco de dados
include './_method/mysql_connect.php';
// Proteção contra MySQL Inject
$user_id = $_GET['user_id'];
$user_id = stripslashes ($user_id);
$user_id = mysql_real_escape_string ($user_id);

$result = mysqli_query ($conn, "SELECT * FROM `users` WHERE `id` = " .$user_id. "");

if ($result)
{
    $user_row = mysqli_fetch_row ($result);
}
else
{
  echo "<script> 
        alert('Algo de errado não está certo');
        window.location.href='default_error.html';
        </script>";
    exit;

}
mysqli_close ($conn);

?>

<html>
    <head>   
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="_bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="_css/games.css">
        <!--Não adicione nada antes disso-->
        
    </head>
    <body>
        <header>
            <?php
                $var_name = $_SESSION["name"];
                include("default_header.php");
            ?>     
        </header>
        <section class= "container-fluid" id="page-content">
            <div class = "col-lg-3">
                <?php
                    // Conexão com o banco de dados
                    include './_method/mysql_connect.php';
                    $game_query_name = "SELECT * FROM `games_played` WHERE `user_id` = '".$user_id."'";
                    $game_query      = mysqli_query ($conn, $game_query_name);
                    while ($game_row = mysqli_fetch_row ($game_query))
                    {
                        // $game_row[2] = game_id column in games_played table
                        $gamedata_query_name = "SELECT * FROM `games` WHERE `id` = '".$game_row[2]."'";
                        $gamedata_query      = mysqli_query ($conn, $gamedata_query_name);
                        $gamedata_row        = mysqli_fetch_row ($gamedata_query);
                        echo "<div>";
                        // $gamedata_row[1] = name column in games table
                        echo $gamedata_row[1];
                        echo "</div>";
                    }
                    // Encerra a conexão com o banco de dados
                    mysqli_close ($conn);
                ?>
            </div>
        </section>    
       
              
        <!--Não coloque  nada abaixo disso-->
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>   
    </body>
</html>
