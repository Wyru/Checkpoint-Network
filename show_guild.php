<?php

/* Autor: Nixon Silva
 * Data: 26/06/2016
 * Função: Página de uma Guilda
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

 // Conecta ao banco de dados
include './_method/mysql_connect.php';
// Proteção contra MySQL Inject
$guild_id = $_GET['guild_id'];
$guild_id = stripslashes ($guild_id);
$guild_id = mysql_real_escape_string ($guild_id);

$get_name  = "SELECT * FROM `guilds` WHERE `id` = '".$guild_id."'";
$get_query = mysqli_query ($conn, $get_name);

if ($get_query)
{
    $get_rows = mysqli_fetch_row ($get_query);
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

<!DOCTYPE hmtl>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="_bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="_css/show_guild.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <title><?php echo $get_rows[1]; ?></title>
    </head>
    <body>
        <header>
            <div>
                 <?php include("default_header.php");?>
            </div>
        </header>
        <div  class="container-fluid" id="page-content">
            
            <div id="title" class="col-lg-12">
                <h1><?php echo $get_rows[1]; ?></h1>   
            </div>
            <aside class="col-lg-3 pull-right">
                 <?php
                 // Conecta ao banco de dados
                include './_method/mysql_connect.php';
                
                // Caso a guilda seja privada, não exibir as informações
                if ($get_rows[3] == 0)
                {
                    // Verificar estado do usuário perante a guilda
                    $verify_guild_name  = "SELECT * FROM `guilds_users` WHERE `guild_id` = '".$guild_id."' AND `user_id` = '".$_SESSION["id"]."'";
                    $verify_guild_query = mysqli_query ($conn, $verify_guild_name);
                    
                    echo "<div  class='col-lg-12'>";
                        echo "<h2>Opções:</h2>";
                        if ($verify_guild_query and $verify_guild_rows = mysqli_fetch_row ($verify_guild_query))
                        {
                            // Caso o usuário esteja na guilda
                            // Verifica se o usuário não é o adminstrador da guilda
                            if ($verify_guild_rows[3] == 1)
                                echo "Você é o administrador desta guilda!";
                            else
                                echo "<a href = './_method/leave_guild.php?guild_id=".$guild_id."'>Abandonar Guilda</a>";

                        }
                        else
                        {
                            // Caso o usuário não esteja na guilda
                            echo "<a href = './_method/join_guild.php?guild_id=".$guild_id."'>Participar da Guilda</a>";
                        }
                    echo "</div>";
                    

                    // Listar Membros
                    echo "<aside id= 'members' class='col-lg-12 pull-right'>";
                    
                        echo "<h2>Membros:</h2>";
                        $show_users_name  = "SELECT * FROM `guilds_users` WHERE `guild_id` = '".$guild_id."'";
                        $show_users_query = mysqli_query ($conn, $show_users_name);
                        // Caso a query tenha sido bem sucedida
                        if ($show_users_query)
                        {
                            while ($show_users_rows = mysqli_fetch_row ($show_users_query))
                            {
                                $show_user_id    = $show_users_rows[2];
                                $show_info_name  = "SELECT * FROM `users` WHERE `id` = '".$show_user_id."'";
                                $show_info_query = mysqli_query ($conn, $show_info_name);
                                if ($show_info_query)
                                {
                                    $show_info_rows = mysqli_fetch_row ($show_info_query);
                                    $show_user_name = $show_info_rows[1];
                                    echo "<p><a href = 'show_profile.php?user_id=".$show_user_id."'>";
                                    echo $show_user_name . "</a></p>";
                                }
                            }
                        }
                    echo "</aside>";

                }
                else
                {
                    echo "Guilda privada.";
                }
            ?>
            </aside>
            <section>
                
                
            </section>
           
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="_jquery/jquery.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="_bootstrap/js/bootstrap.min.js"></script> 
        
    </body>
</html>