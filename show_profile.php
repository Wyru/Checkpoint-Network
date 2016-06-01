<?php

/* Autor: Nixon Silva, Will Saymon, Rogério Júnior
 * Data: 01/06/2016
 * Função: Página de Usuário.
 */

/* TODO: Implementar o layout da página em HTML
 * Tarefa da equipe de front-end
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

 // Conecta ao banco de dados
            include './_method/mysql_connect.php';
            // Proteção contra MySQL Inject
            $user_id = $_GET['user_id'];
            $user_id = stripslashes ($user_id);
            $user_id = mysql_real_escape_string ($user_id);

            $result = mysqli_query ($conn, "SELECT * FROM `users` WHERE `id` = " .$user_id. "");
            
            if ($result)
            {
                $rows = mysqli_fetch_row ($result);
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
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="_bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="_css/my_profile.css">
        <title><?php echo$rows[1] ?></title>
    </head>
    <body>
         <header>
            <?php 
            $var_name = $rows[1];
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
                                    <?php echo $rows[10]; ?>
                                </div>   
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Game Preferido:</h3>
                                <div id="favoGame">
                                    <?php echo $rows[11]; ?>
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
                                    <?php echo $rows[7]; ?>
                                </div>
                            </div >
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h3>PSN ID: </h3>
                                <div id="psnId">
                                    <?php echo $rows[6]; ?>
                                </div>
                            </div >
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Xbox Live ID: </h3>
                                <div id="xboxLive">
                                    <?php echo $rows[8]; ?>
                                </div>
                            </div >
                        </div>
                        <div class="row">
                            <div class="col-md-12"> 
                                <h3>Nintendo Network ID: </h3>
                                <div id="nintendoNetworkID">
                                    <?php echo $rows[9]; ?>
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
                    $result = mysqli_query($conn, "SELECT * FROM `posts` WHERE `user_id` = '" . $user_id . "'  ORDER BY  `time` DESC");
                    // Imprime os dez resultados de forma decrescente
                    $i = 0;
                    while ($rows2 = mysqli_fetch_row($result) and $i < 10) 
                    {
                        if ($rows2[4] == 0)
                        {
                            $content = $rows2[2];
                            $timestamp = $rows2[3];
                            echo "<p>";
                            echo $timestamp;
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
