<?php

/* Autor: Nixon Silva e Will Saymon
 * Data: 19/05/2016
 * Função: Busca usuários e dispõe link para a visita do perfil dos
 * mesmos
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
            
            include './_method/mysql_connect.php';
            $result = mysqli_query($conn, "SELECT * FROM `users` WHERE `username` LIKE '%".$_POST['value']."%'");
            if ($result)
            {
                $rows = $result->fetch_row();
                // Imprime os resultados
                while ($rows)
                {
                    echo "<p>" .$rows[1] . "</p>";
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
    </body>
</html>