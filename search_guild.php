<?php

/* Autor: Nixon Silva
 * Data: 26/06/2016
 * Função: Busca usuários e dispõe link para a visita do perfil dos
 * mesmos
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
        <link rel="stylesheet" type="text/css" href="_css/search_guild.css">
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
                        <li><i class="fa fa-home fa-lg"></i><a href='search_guild.php?value=<?php echo $value; ?>'>Guildas</a></li>
                        <li><i class="fa fa-gamepad fa-lg"></i><a href='search_game.php?value=<?php echo $value; ?>'>Games</a></li>
                    </ul> 
                </div>
            </aside>
            <div class="col-lg-6  pull-left">
                <?php
                    include './_method/mysql_connect.php';
                    $guild_search_name = "SELECT * FROM `guilds` WHERE `name` LIKE '%".$value."%' AND `removed` = 0";
                    $guild_search       = mysqli_query($conn, $guild_search_name);
                    if ($guild_search)
                    {
                        $rows = $guild_search->fetch_row();
                        // Imprime os resultados
                        while ($rows)
                        {
                            $guild_id          = $rows[0];
                            $guild_privacy     = $rows[3];
                            $guild_image       = $rows[4];
                            $guild_name        = "SELECT * FROM `guilds_users` WHERE `user_id` = '".$_SESSION["id"]."' AND `guild_id` = '".$guild_id."'";
                            $guild_query       = mysqli_query ($conn, $guild_name);
                            $guild_count_name  = "SELECT * FROM `guilds_users` WHERE `guild_id` = '".$guild_id."'";
                            $guild_count_query = mysqli_query ($conn, $guild_count_name);
                            $members_qty       = mysqli_num_rows ($guild_count_query);
                            echo"<div class='col-lg-12' id='results'>";
                                echo"<div class='row'id = 'resultsHeader'>";
                                    echo"<div class='col-lg-12'>";
                                    // Mudar para o link de exibir o jogo.
                                    echo "<a class='pull-left' href ='./show_guild.php?guild_id=".$rows[0]."'>".$rows[1]."</a>";
                                    if ($guild_query and mysqli_num_rows ($guild_query))
                                    {
                                        echo "<p class='pull-right'>Já é membro!</p>";
                                    }
                                    else
                                    {
                                        if (!$guild_privacy)
                                            echo "<a class='btn-primary pull-right' href ='./_method/join_guild.php?guild_id=".$guild_id."'>Participar</a>";
                                        else
                                            echo "Guilda privada!";
                                    }    
                                    echo"</div>";
                                echo "</div>";
                                echo"<div class='row' id='resultsBody'>";
                                    echo"<div>";
                                        if($rows[4])
                                            echo "<img class='responsive pull-left' id='img_game' src = '$guild_image'>";
                                         else    
                                            echo "<img class='responsive pull-left' id='userPic' src = '_imagens/guild_pic/sword.png'>";
                                    echo"</div>";
                                    echo"<div class=''>";
                                        echo "<p>Categoria: ".$rows[2]."</p>";
                                        echo "<p>". $members_qty . " usuário(s) faz(em) parte desta guilda</p>";
                                    echo"</div>";
                                echo "</div>";
                            echo"</div>";
                            $rows = $guild_search->fetch_row();
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
