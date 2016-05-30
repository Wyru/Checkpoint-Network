    <?php
/* Autores: Nixon Silva e Will Saymon
 * Data: 19/05/2016
 * Função: Código de tratamento básico para páginas de exibição de perfil do usuário
 * logado.
 */

// Inicia sessão
//session_start ();
                     
// Verifica se a variável de login está ativada
/*if (!$_SESSION["login_status"])
{
    // Envia para a página de login caso não esteja	
    header("location:login.html");
    exit;
}
*/
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
    <body>
        <header>
            <?php 
                include("header_default.php");
            ?>
        </header>
        <section  class="container"id = "profileBody">
            <div class="col-md-3 pull-left">
                <section id="aboutMe">
                    <p><a href="edit_profile.php">Editar Perfil</a></p>
                    <div class="data">
                        <div >
                            <h3>Bio: </h3>
                            <div id="Bio">

                            </div>
                        </div>
                        <div>
                            <h3>Game Preferido:</h3>
                            <div id="favoGame">

                            </div>
                        </div>
                        <div>
                            <h3>Plataforma Preferida:</h3>
                            <div id="favoPlat">

                            </div>
                        </div>
                        <div>
                            <h3>Steam ID: </h3>
                            <div id="steamId">

                            </div>
                        </div>
                        <div>
                            <h3>PSN ID: </h3>
                            <div id="psnId">

                            </div>
                        </div>
                        <div>
                            <h3>Xbox Live ID: </h3>
                            <div id="xboxLive">

                            </div>
                        </div>
                        <div>
                            <h3>Nintendo Network ID: </h3>
                            <div id="nintendoNetworkID">

                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <section class="col-md-8 pull-right">
                <div id="share">
                    <form action="./_method/new_post.php" method="POST">
                        <p> <textarea name="comment" id="comment">Compartilhe-nos sua jogatina!</textarea></p>
                        <p><button type="submit">Enviar</button></p>
                    </form>
                </div>
                <div style=" clear:both; width:100%"></div>
                <div id = "timeLine">
                    <?php
                    include './_method/mysql_connect.php';
                    $result = mysqli_query($conn, "SELECT * FROM `posts` WHERE `user_id` = '" . $_SESSION["id"] . "'  ORDER BY  `time` DESC");
                    // Imprime os dez resultados de forma decrescente
                    $i = 0;
                    while ($rows = mysqli_fetch_row($result) and $i < 10) {
                        $content = $rows[2];
                        $timestamp = $rows[3];
                        echo "<p>";
                        echo $timestamp . "<br>";
                        echo "</p>";
                        echo "<p>";
                        echo $content . "<br>";
                        echo "</p>";
                        $i++;
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