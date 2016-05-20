<?php

/* Autor: Nixon Silva e Will Saymon
 * Data: 19/05/2016
 * Função: Template de exibição de uma página de usuário.
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

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
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
                echo "<p>Ich heisse " . $rows[1] . "</p>";  
            }
            else
            {
                echo "Error while querying the database!";
            }
            
            mysqli_close ($conn);
        ?>
    </body>
</html>
