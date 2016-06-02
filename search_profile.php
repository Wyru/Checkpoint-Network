<?php

/* Autor: Nixon Silva e Will Saymon
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
    header ("location:login.html");
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
        <link rel="stylesheet" type="text/css" href="_css/search_profile.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <!--Não adicione nada antes disso-->
        
        
    </head>
    <body>
        <header class="col-lg-12">
            <?php 
                include("default_header.php");
            ?>
        </header>
        <section class="container" id="main">
            <div class="col-lg-12">
                <?php
                    include './_method/mysql_connect.php';
                    $value = $_POST['value'];
                    $value = stripslashes($value);
                    $value = mysql_real_escape_string($value);
                    $result = mysqli_query($conn, "SELECT * FROM `users` WHERE `username` LIKE '%".$value."%' AND `REMOVED` = 0");
                    if ($result)
                    {
                        $rows = $result->fetch_row();
                        // Imprime os resultados
                        while ($rows)
                        {
                            $id = $rows[0];
                            $friendship_exists = "SELECT * FROM `friends` WHERE `user_id` = " .$_SESSION["id"]. " AND `friend_id` = " . $id . "";
                            $exists = mysqli_query ($conn, $friendship_exists);
                            if (mysqli_fetch_row($exists))
                                echo "<p><a href ='show_profile.php?user_id=".$rows[0]."'>".$rows[1]."</a> Já é um amigo!</p>";
                            else if ($id == $_SESSION["id"])
                                echo "<p><a href ='show_profile.php?user_id=".$rows[0]."'>".$rows[1]."</a> </p>";
                            else
                                echo "<p><a href ='show_profile.php?user_id=".$rows[0]."'>".$rows[1]."</a> <a href ='./_method/add_friend.php?friend_id=".$rows[0]."'>Add friend</a></p>";
                            echo "<br>";
                            $rows = $result->fetch_row();
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
