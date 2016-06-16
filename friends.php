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
    header("location:index.html");
    exit;
}

$user_id_page = $_GET['user_id'];
$user_id_page = stripcslashes ($user_id_page);
$user_id_page = mysql_real_escape_string ($user_id_page);

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
                $var_name = $_SESSION["name"];
                include("default_header.php");
            ?>
        </header>
        <section class="container-fluid" id="page-content">
            
           
                <div class="col-lg-12" id="title">
                        <h1 ><i class="fa fa-users fa-lg"></i>Amigos</h1>
                </div>
            
                <div class="col-lg-10" id="friends">
                    
                    <div class="col-md-12">
                        <?php
                        // Exibição dos amigos
                        // TODO: Separar por páginas
                        include './_method/mysql_connect.php';
                        $result = mysqli_query($conn, "SELECT * FROM `friends` WHERE (`user_id` = '" .$user_id_page. "' OR `friend_id` = '" .$user_id_page. "') AND `accepted` = 1  ORDER BY `friend_id`");
                        // Imprime os vinte e cinco resultados em ordem de id de usuário
                        $i = 0;
                        while ($rows = mysqli_fetch_row($result) and $i < 25) 
                        {
                            if ($rows[2] == $user_id_page)
                            {
                                $friend_id = $rows[1];
                            }
                            else
                            {
                                $friend_id = $rows[2];
                            }
                            $query_name = "SELECT * FROM `users` WHERE `id` = '" . $friend_id . "'";
                            $query_2 = mysqli_query($conn, $query_name);
                            $rows_2 = mysqli_fetch_row($query_2);
                            $friend_name = $rows_2[1];
                            echo "<div class ='col-lg-3' id = 'user'>
                            <div class='row'>
                                <div class='col-lg-offset-1'>
                                    <p><a href = 'show_profile.php?user_id=".$friend_id."'>".$friend_name."</a><p>
                                </div>
                            </div>
                            <div class='col-lg-8'>";
                            if($rows_2[14])
                                echo "<img class='responsive pull-left' id='userPic' src = '$rows_2[14]'>";
                            else    
                                echo "<img class='responsive pull-left' id='userPic' src = 'http://tedxnashville.com/wp-content/uploads/2015/11/profile.png'>";
                            //<img src='http://tedxnashville.com/wp-content/uploads/2015/11/profile.png'/>    
                            echo "</div>";
                            if ($user_id_page == $_SESSION["id"])
                            {
                                echo "<div id='destroyFriendship' class='col-lg-4'>
                                        <a href = './_method/undo_friend.php?user_id=" .$friend_id. "'>Desfazer Amizade</a>
                                      </div>";
                            }
                            echo "</div>";
                            $i++;    
                        }
                        // Encerra conexão após a query
                        mysqli_close($conn);

                        ?>   
                    </div>        
                </div>
                <?php
                    if ($user_id_page == $_SESSION["id"])
                    {
                        echo "<div class='col-lg-2'>";
                            echo "<div class='col-lg-12' id='friend_request'>";
                                echo "<div class='row'>";
                                    echo "<div class='col-lg-12'>";
                                        echo "<h3>Solicitações de Amizade</h3>";
                                    echo "</div>";
                                echo "</div>";
                                echo "<div class='row'>";
                                    echo "<div class='col-lg-12'>";
                                        include './_method/mysql_connect.php';
                                        $query_solic_name = "SELECT * FROM `friends` WHERE `friend_id` = '" .$_SESSION["id"]. "' AND `accepted` = 0";
                                        $query_solic = mysqli_query ($conn, $query_solic_name);
                                        if ($query_solic)
                                        {
                                            while ($rows_solic = mysqli_fetch_row ($query_solic))
                                            {
                                                if ($rows_solic[2] == $_SESSION["id"])
                                                {
                                                    $friend_req_id = $rows_solic[1];
                                                }
                                                else
                                                {
                                                    $friend_req_id = $rows_solic[2];
                                                }
                                                $query_username_name = "SELECT * FROM `users` WHERE `id` = '" .$friend_req_id. "'";
                                                $query_username = mysqli_query ($conn, $query_username_name);
                                                if ($rows_username = mysqli_fetch_row ($query_username))
                                                {
                                                    // Imprime o nome
                                                    echo $rows_username[1];
                                                    // Imprime link para aceitar
                                                    echo "<br><a href = './_method/accept_friend.php?id=" .$friend_req_id. "'>Aceitar</a><br>";
                                                }
                                            }
                                        }  
                                    echo "</div>";
                                echo "</div>";        
                            echo "</div>";
                        echo "</div>";
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
