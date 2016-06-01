<?php
/* Autores: Nixon Silva e Will Saymon
 * Data: 19/05/2016
 * Função: Código de tratamento básico para páginas de exibição de perfil do usuário
 * logado.
 */

// Inicia sessão
session_start ();
                     
// Verifica se a variável de login está ativada
if (!$_SESSION["login_status"])
{
    // Envia para a página de login caso não esteja	
    header("location:login.html");
    exit;
}

?>

<!--Página Meu Perfil-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="_bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="_css/my_profile.css">
        <!--Não adicione nada antes disso-->
        <title>Meu Perfil</title>
    </head>
    <body >
        
        <header >
            <?php 
            $var_name = $_SESSION["name"];
            include("default_header.php"); 
            ?>
        </header>
        
        <section  class="container-fluid">
            <div class="col-md-2 pull-left" id="left">
                <section id="aboutMe">
                    
                    <div id="data">
                        <div class="row" >
                            <div class="col-md-12">
                                <h3>Bio: </h3>
                                <div id="Bio">
                                    <?php echo $_SESSION["biography"]; ?>
                                </div>   
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Game Preferido:</h3>
                                <div id="favoGame">
                                    <?php echo $_SESSION["favorite_game"]; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Plataforma Preferida:</h3>
                                <div id="favoPlat">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Steam ID: </h3>
                                <div id="steamId">
                                    <?php echo $_SESSION["steam"]; ?>
                                </div>
                            </div >
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h3>PSN ID: </h3>
                                <div id="psnId">
                                    <?php echo $_SESSION["psn"]; ?>
                                </div>
                            </div >
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Xbox Live ID: </h3>
                                <div id="xboxLive">
                                    <?php echo $_SESSION["xbox_live"]; ?>
                                </div>
                            </div >
                        </div>
                        <div class="row">
                            <div class="col-md-12"> 
                                <h3>Nintendo Network ID: </h3>
                                <div id="nintendoNetworkID">
                                    <?php echo $_SESSION["nintendo"]; ?>
                                </div>
                            </div >
                        </div >
                    </div>
                </section>
            </div>
            
            <section class="col-md-2 pull-right" id="right">
                <?php include("default_notifications.php");?>
            </section>
            
            <section class="col-md-8 pull-right" id="main">
                
                <?php include("default_publish.php");?>
                
                
                <div style=" clear:both; width:100%"></div>
                
                
                <div class="container" id = "timeLine">
                    <?php
                    include './_method/mysql_connect.php';
                    $result = mysqli_query($conn, "SELECT * FROM `posts` WHERE `user_id` = '" . $_SESSION["id"] . "'  ORDER BY  `time` DESC");
                    // Imprime os dez resultados de forma decrescente
                    $i = 0;
                    while ($rows = mysqli_fetch_row($result) and $i < 10) 
                    {
                        if ($rows[4] == 0)
                        {
                            $content = $rows[2];
                            $timestamp = $rows[3];
                            echo "<p>";
                            echo $timestamp . "    <a href = './_method/delete_post.php?post_id=".$rows[0]."'>Deletar</a> ";
                            $query_name = "SELECT * FROM `users` WHERE `id` = " .$rows[5]. "";
                            $result_3 = mysqli_query($conn, $query_name);
                            $name = mysqli_fetch_row($result_3);
                            if ($name[1] != $_SESSION["name"])
                                echo "From user:" .$name[1]. "<br>";
                            else
                            {
                                echo "Por si mesmo.";
                            }
                            echo "</p>";
                            echo "<p>";
                            echo $content . "<br>";
                            echo "</p>";
                            $i++;    
                        }
                    }
                    // Encerra conexão após a query
                    mysqli_close($conn);
                    ?>
                </div>
            </section>
            
        </section>
        <!--Não coloque  nada abaixo disso-->
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>  
    </body>
</html>