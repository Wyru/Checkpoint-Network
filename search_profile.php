<?php

/* Autor: Nixon Silva, Will Saymon e Rogério Júnior
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
    header ("location:index.html");
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
        <header>
            <?php 
                $var_name = $_SESSION["name"];
                include("default_header.php");
            ?>
        </header>
        <section class="container-fluid" id="page-content">
            <div class=" col-lg-12" id="header">
                <div>
                    <h1>Resultados para: ...</h1>
                </div> 
            </div>
            <aside class="col-lg-2 pull-left">
                <div class="col-lg-12" id="searchNav">
                    <ul  class="list-unstyled">
                        <li>Pesquisar apenas por:</li>
                        <?php 
                            if (empty($_GET['value']))
                            {
                                $value = "";
                            }
                            else
                            {
                                $value = $_GET['value'];
                                $value = stripslashes($value);
                                $value = mysql_real_escape_string($value); 
                            }
                        ?>
                        <li><i class="fa fa-users fa-lg"></i><a href='search_profile.php?value=<?php echo $value; ?>'>Pessoas</a></li>
                        <li><i class="fa fa-home fa-lg"></i><a href='search_guild.php?value=<?php echo $value; ?>'>Guildas</a></li>
                        <li><i class="fa fa-gamepad fa-lg"></i><a href='search_game.php?value=<?php echo $value; ?>'>Games</a></li>
                    </ul> 
                </div>
            </aside>
            <div class="col-lg-6  pull-left">
                <?php
                    include './_method/mysql_connect.php';
                    $result = mysqli_query($conn, "SELECT * FROM `users` WHERE `username` LIKE '%".$value."%' AND `REMOVED` = 0");
                    if ($result)
                    {
                        $rows = $result->fetch_row();
                        // Imprime os resultados
                        while ($rows)
                        {
                            $id = $rows[0];
                            $friendship_exists = "SELECT * FROM `friends` WHERE (`user_id` = '".$_SESSION["id"]."' AND `friend_id` = '".$id."') OR (`user_id` = '".$id."' AND `friend_id` = '".$_SESSION["id"]."')";
                            $exists = mysqli_query ($conn, $friendship_exists);
                            if ($rows_verify = mysqli_fetch_row($exists))
                            {
                                echo"<div class='col-lg-12' id='results'>";
                                    echo"<div class='row'id = 'resultsHeader'>";
                                        echo"<div class='col-lg-12'>";
                                            echo "<a class='pull-left' href ='show_profile.php?user_id=".$rows[0]."'>".$rows[1]."</a>";
                                            if ($rows_verify[4] == 1)
                                            {
                                                echo "<p class='pull-right' >Já é um amigo!</p>";
                                            }
                                            else
                                            {
                                                echo "<p class='pull-right' >Solicitação enviada!</p>";
                                            }
                                        echo"</div>";
                                    echo "</div>";
                                    echo"<div class='row' id='resultsBody'>";
                                        echo"<div class='col-lg-3'>";
                                            if($rows[14])
                                                echo "<img class='responsive pull-left' id='img_user' src = '$rows[14]'>";
                                             else    
                                                echo "<img class='responsive pull-left' id='img_user' src = 'http://tedxnashville.com/wp-content/uploads/2015/11/profile.png'>";
                                        echo"</div>";
                                        echo"<div class='col-lg-9'>";
                                            echo "<p>Bio: ".$rows[10]."</p>";
                                            echo "<p>Games:</p>";
                                            echo "<p>Possuem X games em comum</p>";
                                        echo"</div>";
                                    echo "</div>";
                                echo"</div>";
                            }
                            else if ($id == $_SESSION["id"]){
                                
                                
                                echo"<div class='col-lg-12' id='results'>";
                                    echo"<div class='row'id = 'resultsHeader'>";
                                        echo"<div class='col-lg-12'>";
                                            echo "<a href ='show_profile.php?user_id=".$rows[0]."'>".$rows[1]."</a>";
                                            
                                        echo"</div>";
                                    echo "</div>";
                                    echo"<div class='row' id='resultsBody'>";
                                        echo"<div class='col-lg-3'>";
                                            if($rows[14])
                                                echo "<img class='responsive pull-left' id='userPic' src = '$rows[14]'>";
                                             else    
                                                echo "<img class='responsive pull-left' id='userPic' src = 'http://tedxnashville.com/wp-content/uploads/2015/11/profile.png'>";
                                        echo"</div>";
                                        echo"<div class='col-lg-9'>";
                                            echo "<p>Bio: ".$rows[10]."</p>";
                                            echo "<p>Games:</p>";
                                            echo "<p>Possuem X games em comum</p>";
                                        echo"</div>";
                                    echo "</div>";
                                    
                                echo"</div>";
                                
                            }
                            else{
                                
                                
                                echo"<div class='col-lg-12' id='results'>";
                                    echo"<div class='row'id = 'resultsHeader'>";
                                        echo"<div class='col-lg-12'>";
                                            echo "<a class='pull-left'href ='show_profile.php?user_id=".$rows[0]."'>".$rows[1]."</a>";
                                            echo"<a class='btn-primary pull-right'href ='./_method/add_friend.php?friend_id=".$rows[0]."'>Adicionar aos amigos</a>";
                                        echo"</div>";
                                    echo "</div>";
                                    echo"<div class='row' id='resultsBody'>";
                                        echo"<div class='col-lg-3'>";
                                        if($rows[14])
                                                echo "<img class='responsive pull-left' id='userPic' src = '$rows[14]'>";
                                             else    
                                                echo "<img class='responsive pull-left' id='userPic' src = 'http://tedxnashville.com/wp-content/uploads/2015/11/profile.png'>";
                                        echo"</div>";
                                        echo"<div class='col-lg-9'>";
                                            echo "<p>Bio: ".$rows[10]."</p>";
                                            echo "<p>Games:</p>";
                                            echo "<p>Possuem X games em comum</p>";
                                        echo"</div>";
                                    echo "</div>";
                                echo"</div>";                           
                            }
                            
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
