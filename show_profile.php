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
    header ("location:index.html");
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
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        
        <title><?php echo$rows[1] ?></title>
        
    </head>
    <body>  
        <header>
            <div>
                 <?php include("default_header.php");?>
             </div>
        </header>
        
        <div id="page-content">
            <header class="col-lg-9" id="header">
                <div class="jumbotron" id="userBackgroud">

                </div>
                <div class="container">
                    <div id="userPicAndName" class="row">
                        <img  
                                <?php
                                if(isset($rows)){
                                    if($rows[14])
                                        echo "src = '".$rows[14]."'";
                                    else    
                                        echo "src = 'http://tedxnashville.com/wp-content/uploads/2015/11/profile.png'";
                                }
                                else if($_SESSION["profile_pic"])
                                        echo "src = '".$_SESSION["profile_pic"]."'";
                                else    
                                    echo "src = 'http://tedxnashville.com/wp-content/uploads/2015/11/profile.png'";
                            ?>>
                        <p id="OtherUserName"><?php echo $rows[1]; ?></p>
                    </div>
                    <ul id="perfilNav" class="list-inline" >
              
                        <li><a href="show_profile.php?user_id=<?php echo $rows[0]; ?>"><i class="fa fa-user fa-lg" aria-hidden="true"></i>Perfil</a></li>
                        <li><a href="screenshots.php"><i class="fa fa-picture-o fa-lg" aria-hidden="true"></i>Screenshots</a></li>
                        <li><a href="gameplays.php"><i class="fa fa-film fa-lg" aria-hidden="true"></i> Gameplays</a></li>
                        <li><a href="games.php"><i class="fa fa-gamepad fa-lg" aria-hidden="true"></i> Games</a></li>
                        <li><a href="friends.php"><i class="fa fa-users fa-lg" aria-hidden="true"></i> Amigos</a></li>
                        <li><a href="guilds.php"><i class="fa fa-home fa-lg" aria-hidden="true"></i> Guildas</a></li>
                        <?php
                            if ($rows[0] != $_SESSION["id"])
                            {
                                include './_method/mysql_connect.php';
                                $check_iffriend_name = "SELECT * FROM `friends` WHERE (`user_id` = '".$_SESSION["id"]."' AND `friend_id` = '".$rows[0]."') OR (`user_id` = '".$rows[0]."' AND `friend_id` = '".$_SESSION["id"]."')";
                                $check_iffriend = mysqli_query ($conn, $check_iffriend_name);
                                if ($new_row = mysqli_fetch_row($check_iffriend))
                                {
                                    if ($new_row[4])
                                        echo "<li><i class='fa fa-home fa-lg' aria-hidden='true'></i> Já são amigos!</li>";
                                    else
                                        echo "<li><i class='fa fa-home fa-lg' aria-hidden='true'></i> Solicitação enviada!</li>";
                                }
                                else
                                {
                                    echo "<li><a href='./_method/add_friend.php?friend_id=".$rows[0]."&prev=1'><i class='fa fa-home fa-lg' aria-hidden='true'></i>Adicionar aos amigos</a></li>";
                                }
                            }
                        ?>
                    </ul>
                </div>
            </header>
            <div class="col-lg-3">
                <h1>ADS aqui :v</h1>
            </div>
            <div class="clearfix"></div>
            <aside class="col-lg-3 pull-left">
                <?php include("default_about_me.php");?>
            </aside>
            <aside  id ="myGames" class="col-lg-3 pull-right">
                <h1>Meus Games</h1>
                <div>
                    <div class='pull-right col-lg-5'>
                        <img class='col-lg-12 resposive' src='http://vignette3.wikia.nocookie.net/monsterhunter/images/c/c9/Logo-MH1.png/revision/latest?cb=20140731093534'/>
                        <p>Monster Hunter</p>
                        
                    </div>
                    
                    <div class='pull-right col-lg-5'>
                        <img class='col-lg-12 resposive' src='https://logodownload.org/wp-content/uploads/2014/09/lol-logo-league-of-legends-2.png'/>
                        <p>League of Legends</p>
                        
                    </div>
                    <div class='pull-right col-lg-5'>
                        <img class='col-lg-12 resposive' src='http://vignette2.wikia.nocookie.net/yugioh/images/c/ce/TFSP-VideoGameJP.png/revision/latest?cb=20141205132955'/>
                        <p>Yu-Gi-Oh Tag Force Ark-V</p>   
                    </div>
                    
                </div>
                <div class="clearfix"></div>
                <a class=" pull-right"> ver todos</a>
            </aside>
            <section class="col-lg-6 pull-left" id="main">
                
                <?php include("default_publish.php");?>
                
                <div class="col-lg-12" id = "timeLine">
                    <?php
                    include './_method/mysql_connect.php';
                    $result = mysqli_query($conn, "SELECT * FROM `posts` WHERE `user_id` = '" . $user_id . "'  ORDER BY  `time` DESC");
                    // Imprime os dez resultados de forma decrescente
                    $i = 0;
                    while ($rows2 = mysqli_fetch_row($result) and $i < 10) 
                    {
                        if ($rows2[4] == 0)
                        {
                            echo "<div id='publ'>";
                            
                                echo "<div class='col-lg-12' id='publHeader'>";
                                    $content = $rows2[2];
                                    $timestamp = $rows2[3];
                                    $likes = $rows2[6];
                                    $himself = $_SESSION["id"];
                                    $query_name = "SELECT * FROM `users` WHERE `id` = " .$rows2[5]. "";
                                    $result_3 = mysqli_query($conn, $query_name);
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
                                    
                                    if ($name[1] != $rows[1] and $name[0]){
                                        echo "<p><a href = 'show_profile.php?user_id=".$name[0]."'>".$name[1]."</a> ><a href = 'show_profile.php?user_id=".$rows[0]."'> ".$rows[1]."</a></p>";
                                    }
                                    else{
                                        echo "<a href = 'show_profile.php?user_id=".$rows[0]."'>".$rows[1]."</a>";
                                    }
                                    echo "<div id='dayAndTime'>".$timestamp."</div>";
                                    if ($name[0] == $himself or $rows[0] == $himself){
                                        echo " <a id= 'del' class='btn-primary pull-right'href = './_method/delete_post.php?post_id=".$rows2[0]."'><i class='fa fa-trash fa-lg'></i></a> ";
                                    }
                                    echo "<div class='clearfix'></div>";
                                echo "</div>";
                            
                           
                                echo "<div class='col-lg-12' id='publBody'>";
                                    echo $content;
                                echo "</div>";
                            
                            
                                echo "<div class='form-group' col-lg-12' id='publFooter'>";
                                    // Verifica estado da curtida
                                    
                                    echo "<form class='pull-left' role='form' action='./_method/upvote_post.php?post_id=".$rows2[0]."' method='POST'>";

                                            echo "<input type='hidden' name='origin_id' value=".$user_id.">";
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
                            $i++;    
                        }
                    }
                    // Encerra conexão após a query
                    mysqli_close($conn);
                    ?>
                </div>
            </section
            
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="_jquery/jquery.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="_bootstrap/js/bootstrap.min.js"></script> 
        
    </body>
</html>