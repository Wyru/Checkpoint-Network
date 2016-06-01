 <?php
/* Autores: Will Saymon e Nixon Silva
 * Data: 28/05/2016
 * Função: Tela em que exibirá os amigos do usuário
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

<!DOCTYPE html>
<html>
    <head>   
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="_bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="_css/friends.css">
        <!--Não adicione nada antes disso-->
        
    </head>
    <body>
        <header>
            <?php
                include("default_header.php");
            ?>
        </header>
        <section class="col-md-8 pull-right" id="main">
            <p><br></p>
            <p><br></p>
            <?php
            // Exibição dos amigos
            // TODO: Separar por páginas
            include './_method/mysql_connect.php';
            $result = mysqli_query($conn, "SELECT * FROM `friends` WHERE `user_id` = '" . $_SESSION["id"] . "'  ORDER BY  `friend_id`");
            // Imprime os vinte e cinco resultados em ordem de id de usuário
            $i = 0;
            while ($rows = mysqli_fetch_row($result) and $i < 25) 
            {
                $friend_id = $rows[2];
                $query_name = "SELECT * FROM `users` WHERE `id` = '" . $friend_id . "'";
                $query_2 = mysqli_query($conn, $query_name);
                $rows_2 = mysqli_fetch_row($query_2);
                $friend_name = $rows_2[1];
                echo "<p>";
                echo "<br><a href = 'show_profile.php?user_id=".$friend_id."'>".$friend_name."</a><br>";
                echo "<a href = './_method/undo_friend.php?user_id=" .$friend_id. "'>Desfazer Amizade</a>";
                echo "</p>";
                $i++;    
            }
            // Encerra conexão após a query
            mysqli_close($conn);

            ?>
        </section>
        <!--Não coloque  nada abaixo disso-->
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>   
    </body>
</html>
