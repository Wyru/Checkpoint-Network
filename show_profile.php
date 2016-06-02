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
        <link rel="stylesheet" type="text/css" href="_css/show_profile.css">
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
                <?php
                    include("default_about_me.php");
                ?>
            </div>
            
            <section class="col-md-2 pull-right" id="right">
                <?php include("default_notifications.php");?>
            </section>
            
            <section class="col-md-8 pull-right" id="main">
                
                <?php include("default_publish.php");?>

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
                            echo "<div class='col-lg-12' id='publ'>
                                <div class='row'>";
                                    echo "<div class='col-lg-12' id='publHeader'>";
                                        $content = $rows2[2];
                                        $timestamp = $rows2[3];
                                        echo "<img  class='responsive pull-left'id='userPic' src='http://tedxnashville.com/wp-content/uploads/2015/11/profile.png'/>";
                                        $himself = $_SESSION["id"];
                                        $query_name = "SELECT * FROM `users` WHERE `id` = " .$rows2[5]. "";
                                        $result_3 = mysqli_query($conn, $query_name);
                                        $name = mysqli_fetch_row($result_3);
                                        if ($name[1] != $rows[1])
                                            echo "<p><a href = 'show_profile.php?user_id=".$name[0]."'>".$name[1]."</a> > ".$rows[1]."</p>";
                                        else
                                            echo $rows[1];
                                        echo "<div>".$timestamp."</div>";
                                        if ($name[0] == $himself or $rows[0] == $himself) 
                                        {
                                            echo " <a class='btn-primary pull-right'href = './_method/delete_post.php?post_id=".$rows2[0]."'>Deletar</a> ";
                                        }
                                    echo "</div>";
                                echo "</div>";
                                echo "<div class='row'>";
                                    echo "<div class='col-lg-12' id='publBody'>";
                                         echo $content;
                                    echo "</div>";
                                echo "</div>";
                            echo "</div>";
                    
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
