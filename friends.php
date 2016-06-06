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
        <section class="container-fluid" id="main">
            
            <div class="row">
                
                <div class="col-lg-8 col-lg-offset-1" id="friends">
                    <div class="col-md-12" id="title">
                        <h1 ><i class="fa fa-users fa-lg"></i>Amigos</h1>
                    </div>
                    <div class="col-md-12">
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
                                    echo" </div>
                                    <div class='col-lg-4 '>
                                        <a href = './_method/undo_friend.php?user_id=" .$friend_id. "'>Desfazer Amizade</a>
                                    </div>
                                    
                                    
                                </div>";
                            $i++;    
                        }
                        // Encerra conexão após a query
                        mysqli_close($conn);

                        ?>   
                    </div>        
                </div>
                    
                <div class="col-lg-3" >
                    
                    <div class="col-lg-12" id="friend_request">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3>Solicitações de Amizade</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <p>pedidos de amizade aqui :v</p>
                            </div>
                        </div>
                        
                    </div>
                    

                </div>
            </div>
            
            
        </section>
        <!--Não coloque  nada abaixo disso-->
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>   
    </body>
</html>
