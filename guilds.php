<!DOCTYPE html>
<!--
Autor: Will Saymon e Nixon Moreira Silva
Data de Criação: 28/05/2016
Data de Alteração: 26/06/2016
Descrição: Tela em que será mostrado todos as guildas de que o jogador faz parte.
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

$user_id = $_GET['user_id'];
$user_id = stripcslashes ($user_id);
$user_id = mysql_real_escape_string ($user_id);

?>

<html>
    <head>   
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="_bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="_css/guilds.css">
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
            <div id="title" class="col-lg-12">
                <h1>Guildas</h1>   
            </div>
            <aside class="col-lg-3 pull-right">
                <div>
                    <div id="createGuild" class="col-lg-12">
                        <a class="btn-primary btn-block" href='create_guild.php'>Criar Guilda</a> 
                    </div>  
                </div>
                <div>
                    <?php
                    if ($user_id == $_SESSION["id"])
                    {
                        echo "<div id='asideTitle' class='col-lg-12'>";
                            echo "<h1>Suas Guildas</h1>";
                        echo "</div>";
                        echo "<div id='asideContet' class='col-lg-12'>";

                        // Conecta ao banco de dados
                        include './_method/mysql_connect.php';

                        $my_guilds_name  = "SELECT * FROM `guilds_users` WHERE `user_id` = '".$_SESSION["id"]."' AND `user_type` = 1";
                        $my_guilds_query = mysqli_query ($conn, $my_guilds_name);
                        if ($my_guilds_query)
                        {

                            if (mysqli_num_rows ($my_guilds_query) > 0)
                            {
                                echo "<ul class='list-unstyled'>";
                                while ($my_guilds_rows = mysqli_fetch_row ($my_guilds_query))
                                {
                                    $my_guild_id           = $my_guilds_rows[1]; 
                                    $admin_guilds_name     = "SELECT * FROM `guilds` WHERE `id` = '".$my_guild_id."'";
                                    $admin_guilds_query    = mysqli_query ($conn, $admin_guilds_name);
                                    if ($admin_guilds_query)
                                    {
                                        $admin_guilds_row  = mysqli_fetch_row ($admin_guilds_query);
                                        echo "<a href='show_guild.php?guild_id=".$my_guild_id."'><li>" .$admin_guilds_row[1]. "</li></a>";
                                    }
                                    else
                                    {
                                        echo "Erro na conexão!";
                                    }
                                }
                                echo "</ul>";
                            }
                            else
                            {
                                echo "<p>Você não adminsitra nenhuma guilda!</p>";
                            }
                        }
                        mysqli_close ($conn);
                    }
                    ?>
                    </div>  
                </div>
                
                
                
            </aside >
            <div id="guildContet" class="col-lg-9 pull-right">
                <?php
                    // Conecta ao banco de dados
                    include './_method/mysql_connect.php';

                    $query_guilds_name = "SELECT * FROM `guilds_users` WHERE `user_id` = '".$user_id."'";
                    $query_guilds      = mysqli_query ($conn, $query_guilds_name);

                    if ($query_guilds and mysqli_num_rows ($query_guilds) > 0)
                    {
                          while ($guilds_rows = mysqli_fetch_row ($query_guilds))
                          {
                              $guild_identifier    = $guilds_rows[1];
                              $query_guildsid_name = "SELECT * FROM `guilds` WHERE `id` = '".$guild_identifier."' LIMIT 1";
                              $query_guildsid      = mysqli_query ($conn, $query_guildsid_name);
                              $guildsid_rows       = mysqli_fetch_row ($query_guildsid);
                              $guild_name          = $guildsid_rows[1];
                              $guild_id            = $guildsid_rows[0];
                              echo "<div id= 'guild' class='col-lg-3'>";
                                echo "<div id='guildContent' class='col-lg-12'>";
                                    echo "<a href = 'show_guild.php?guild_id=".$guild_identifier."'>";
                                        echo "<div class='row'>";
                                        if (!empty ($guildsid_rows[4]))
                                            echo"<img src='".$guildsid_rows[4]."'/>";
                                        else
                                            echo"<img src='_imagens/guild_pic/sword.png'/>";
                                        echo"</div>";
                                        echo"<div class='row'>";
                                            echo" <p>".$guild_name."</p> ";
                                        echo"</div>";
                                    echo "</a>";
                                echo "</div>";
                              echo "</div>";
                          }
                    }
                    else
                    {
                        echo "<div class='col-lg-8 col-lg-offset-2'>";
                        if ($user_id == $_SESSION["id"])
                            echo "Você não está em nenhuma guilda!";
                        else
                            echo "Usuário não está em nenhuma guilda!";
                        echo "</p></div>";
                    }
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
