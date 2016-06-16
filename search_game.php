<?php

/* Autor: Nixon Silva, Will Saymon e Rogério Júnior
 * Data: 19/05/2016
 * Função: Busca usuários e dispõe link para a visita do perfil dos
 * mesmos
 */

/*
 *  TODO: Verificar se o usuário já não está adicionado como amigo
 */

// Inicia sessão
session_start ();
// Verifica se a variável de login está ativada
if (!$_SESSION["login_status"])
{
    // Envia para a página de login caso não esteja	
    header ("location:index.html");
    exit;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="_bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="_css/search_game.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <!--Não adicione nada antes disso-->
        
        
    </head>
    <body>
        <header>
            <?php 
                $var_name = $_SESSION["name"];
                include("default_header.php");
            ?>
        </header>
        <section class="container-fluid" id="page-content">
            <div class=" col-lg-12" id="header">
                <div>
                    <h1>Resultados para: <?php echo $_GET['value']; ?></h1>
                </div> 
            </div>
            <aside class="col-lg-2 pull-left">
                <div class="col-lg-12" id="searchNav">
                    <ul  class="list-unstyled">
                        <li>Pesquisar apenas por:</li>
                        <?php 
                            if (empty($_GET['value']))
                            {
                                $value = "";
                            }
                            else
                            {
                                $value = $_GET['value'];
                                $value = stripslashes($value);
                                $value = mysql_real_escape_string($value); 
                            }
                        ?>
                        <li><i class="fa fa-users fa-lg"></i><a href='search_profile.php?value=<?php echo $value; ?>'>Pessoas</a></li>
                        <li><i class="fa fa-home fa-lg"></i>Guildas </li>
                        <li><i class="fa fa-gamepad fa-lg"></i><a href='search_game.php?value=<?php echo $value; ?>'>Games</a></li>
                    </ul> 
                </div>
            </aside>
            <div class="col-lg-6  pull-left">
                <?php
                    include './_method/mysql_connect.php';
                    $game_search_name = "SELECT * FROM `games` WHERE `name` LIKE '%".$value."%' AND `removed` = 0";
                    $game_search      = mysqli_query($conn, $game_search_name);
                    if ($game_search)
                    {
                        $rows = $game_search->fetch_row();
                        // Imprime os resultados
                        while ($rows)
                        {
                            $game_id = $rows[0];
                            $played_game_name = "SELECT * FROM `games_played` WHERE `user_id` = '".$_SESSION["id"]."' AND `game_id` = '".$game_id."'";
                            $played_game = mysqli_query ($conn, $played_game_name);
                            echo"<div class='col-lg-12' id='results'>";
                                echo"<div class='row'id = 'resultsHeader'>";
                                    echo"<div class='col-lg-12'>";
                                    // Mudar para o link de exibir o jogo.
                                    echo "<a class='pull-left' href ='#'>".$rows[1]."</a>";
                                    if ($rows_played = mysqli_fetch_row ($played_game))
                                    {
                                        echo "<p class='pull-right'>Já está na sua lista!</p>";
                                    }
                                    else
                                    {
                                        echo"<a class='btn-primary pull-right'href ='./_method/played_game.php?game_id=".$rows[0]."'>Adicionar a sua lista</a>";
                                    }    
                                    echo"</div>";
                                echo "</div>";
                                echo"<div class='row' id='resultsBody'>";
                                    echo"<div class='col-lg-3'>";
                                        if($rows[7])
                                            echo "<img class='responsive pull-left' id='img_game' src = '$rows[7]'>";
                                         else    
                                            echo "<img class='responsive pull-left' id='userPic' src = 'http://tedxnashville.com/wp-content/uploads/2015/11/profile.png'>";
                                    echo"</div>";
                                    echo"<div class='col-lg-9'>";
                                        echo "<p>Gênero: ".$rows[2]."</p>";
                                        echo "<p>Desenvolvedora: ".$rows[4]."</p>";
                                        echo "<p>Publicadora: ".$rows[5]."</p>";
                                        echo "<p>Descrição: ".$rows[6]."</p>";
                                    echo"</div>";
                                echo "</div>";
                            echo"</div>";
                            $rows = $game_search->fetch_row();
                        }
                        // Encerra conexão após a query
                        mysqli_close ($conn);
                    }
                    else
                    {
                        echo "Não houve resultados";
                        exit;
                    }
                ?>       
            </div>
        </section>
        
        
        <!--Não coloque  nada abaixo disso-->
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="_bootstrap/js/bootstrap.min.js"></script> 
    </body>
</html>
