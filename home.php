<?php
/* Autores: Nixon Silva, Will Saymon e Rogério JR.
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
    header("location:index.html");
    exit;
}


$page_id   = $_GET['page'];
$page_id   = stripslashes ($page_id);
$page_id   = mysql_real_escape_string ($page_id);

?>

<!DOCTYPE html>
<!--
Autor: Will Saymon
Data de Criação: 28/05/2016
Data de Alteração: 28/05/2016
Descrição: Página que mostras as ultimas publicações dos amigos do ususário.
-->
<html>
    <head>   
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--<link href="_bootstrap/css/bootstrap.min.css" rel="stylesheet">-->
        <link rel="stylesheet" type="text/css" href="_css/show_profile.css">
        <!--<link rel="stylesheet" type="text/css" href="_css/home.css">-->
        <!--Não adicione nada antes disso-->
        
    </head>
    <body>
        <header>
            <?php
                $var_name = $_SESSION["name"];
                include("default_header.php");
            ?>
             
        </header> 
        <section id="page-content" class="container">

            
            <div class="col-lg-8  " id="main">
                <div class="row">
                    <?php include("default_publish.php"); ?>
                </div>
                
                <div class="col-md-12">
                    <p> Publicações - Página: <?php echo $page_id+1 ?></p>                 
                    <?php
                        include './_method/mysql_connect.php';
                        $array = array(); // array de amigos
                        $result = mysqli_query($conn, "SELECT * FROM `friends` WHERE (`user_id` = '" .$_SESSION["id"]. "' OR `friend_id` = '" .$_SESSION["id"]. "') AND `accepted` = 1  ORDER BY `user_id`");
                        array_push($array, $_SESSION["id"]);
                        while ($rows = mysqli_fetch_row($result)) 
                        {
                            if ($rows[2] == $_SESSION["id"])
                            {
                                $friend_id = $rows[1];
                            }
                            else
                            {
                                $friend_id = $rows[2];
                            }
                            array_push($array, $friend_id);
                        }
                        $ids = join("','", $array); //ids de todos os amigos, separada por ","
                                include './_method/mysql_connect.php';
                                $j = $page_id*20;
                                $result2 = mysqli_query($conn, "SELECT * FROM `posts` WHERE origin IN ('$ids') AND `deleted` = 0  ORDER BY  `time` DESC LIMIT 20 OFFSET " .$j."");
                                $num = mysqli_num_rows($result2);
                                $k = $page_id*20+20;
                                while ($rows2 = mysqli_fetch_row($result2) and $j < $k) 
                                {
                                    echo "<div id='publ'>";

                                        echo "<div class='col-lg-12' id='publHeader'>";
                                            $content = $rows2[2];
                                            $timestamp = $rows2[3];
                                            $likes = $rows2[6];
                                            $himself = $_SESSION["id"];
                                            $query_amigo = "SELECT * FROM `users` WHERE `id` = ".$rows2[1]. "";
                                            $query_name = "SELECT * FROM `users` WHERE `id` = " .$rows2[5]. "";
                                            $result_3 = mysqli_query($conn, $query_name);
                                            $result_4 = mysqli_query($conn, $query_amigo);
                                            $amigo = mysqli_fetch_row($result_4);
                                            $name = mysqli_fetch_row($result_3);
                                            $db_query_upvote = "SELECT * FROM `upvotes` WHERE `post_id` = " .$rows2[0]. " AND `user_id` = " .$_SESSION["id"]. "";
                                            $query_upvote = mysqli_query($conn, $db_query_upvote);
                                            if (!$query_upvote || mysqli_num_rows($query_upvote) == 0)
                                            {
                                                $like = true;
                                            }
                                            else
                                            {
                                                $like = false;
                                            }
                                            if($name[14])
                                                echo "<img class='responsive pull-left' id='userPic' src = '$name[14]'>";
                                            else    
                                                echo "<img class='responsive pull-left' id='userPic' src = 'http://tedxnashville.com/wp-content/uploads/2015/11/profile.png'>";
                                            //echo "<img  class='responsive pull-left'id='userPic' src='http://tedxnashville.com/wp-content/uploads/2015/11/profile.png'/>";

                                            if ($name[1] != $amigo[1] and $name[0]){
                                                echo "<p><a href = 'show_profile.php?user_id=".$name[0]."'>".$name[1]."</a> > <a href = 'show_profile.php?user_id=".$amigo[0]."'>".$amigo[1]."</a></p>";
                                            }
                                            else{
                                                echo "<a href = 'show_profile.php?user_id=".$name[0]."'>".$name[1]."</a>";
                                            }
                                            echo "<div id='dayAndTime'>".$timestamp."</div>";
                                            if ($name[0] == $himself or $rows[0] == $himself){
                                                echo " <a id= 'del' class='btn-primary pull-right'href = './_method/delete_post.php?post_id=".$rows2[0]."&page=".$page_id."'><i class='fa fa-trash fa-lg'></i></a> ";
                                            }
                                            echo "<div class='clearfix'></div>";
                                        echo "</div>";


                                        echo "<div class='col-lg-12' id='publBody'>";
                                            echo $content;
                                        echo "</div>";


                                        echo "<div class='form-group' col-lg-12' id='publFooter'>";
                                            // Verifica estado da curtida

                                            echo "<form class='pull-left' role='form' action='./_method/upvote_post.php?post_id=".$rows2[0]."&page=".$page_id."' method='POST'>";

                                                    echo "<input type='hidden' name='origin_id' value=".$friend_id.">";
                                                    echo "<button type='submit' class='btn-primary'>";
                                                    if (!$like) { echo "Descurtir"; } else { echo "Curtir"; }
                                                    echo "</button>";  

                                            echo "</form>";

                                            echo "<form  class='pull-left' role='form' action='#' method='#' ";
                                               echo "<input type='hidden' name='#' value='#'>"; 
                                               echo "<button type='submit' class='btn-primary'><i class='fa fa-comment fa-lg'></i></button>";
                                            echo "</form>";


                                            echo "<form class='pull-left' role='form'  action='#' method='#' ";
                                                echo "<input type='hidden' name='#' value='#'>";
                                                echo "<button type='submit' class='btn-primary'><i class='fa fa-share-alt fa-lg'></i></button>";

                                            echo "</form>";
                                            echo"<div  class='pull-left' id=numLikes>";
                                                if ($likes == 1){

                                                    echo $likes . " pessoa curtiu essa postagem!";
                                                }
                                                else if ($likes == 0){

                                                }
                                                else{
                                                    echo $likes . " pessoas curtiram essa postagem!";
                                                }
                                            echo "</div>";

                                            echo "<form id='shareFace' class='pull-right' role='form'  action='#' method='#' ";
                                                echo "<input type='hidden' name='#' value='#'>";
                                                echo "<button type='submit' class='btn-primary'><i class=' fa fa-facebook-square fa-2x' aria-hidden='true' fa-lg'></i></button>";

                                            echo "</form>";
                                            echo "<div class='clearfix'></div>";


                                        echo "</div>";
                                    echo "</div>";
                                    $j++;   
                                }    
                                // Encerra conexão após a query
                                mysqli_close($conn);
                                $next_id = $page_id+1;
                                if($page_id > 0){
                                    $previous_id = $page_id-1;
                                    echo "<font size='+3'><a href='home.php?page=".$previous_id."'> PAGINA ANTERIOR       </a></font>";
                                }
                                if($num == 20)
                                echo "<font size='+3'><a href='home.php?page=".$next_id."'>PRÓXIMA PÁGINA</a></font>";
                        


                        ?>
                    
                </div>
                
                
                
            </div>
            
            
        </section>
        
              
        <!--Não coloque  nada abaixo disso-->
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="_jquery/jquery.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="_bootstrap/js/bootstrap.min.js"></script>   
    </body>
</html>
