<!DOCTYPE html>
<!--
Autor: Will Saymon
Data de Criação: 28/05/2016
Data de Alteração: 28/05/2016
Descrição: Página que mostrará todos os vídeos postados pelo usuário.
-->
<?php
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
<html>
    <head>   
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="_bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="_css/my_gameplays.css">
        <!--Não adicione nada antes disso-->
        
    </head>
    <body>
        <header>
            <?php
                $var_name = $_SESSION["name"];
                include("default_header.php");
            ?>
             
        </header> 
        
        <div class="container-fluid" id="content">
            <div class="col-md-offset-1">
                <h1 id="title"><i class="fa fa-film fa-lg"></i>Gameplays</h1>
            </div>
            <div class="jumbotron">
                
                
                
                <!--Faça a magia acontecer aqui Nixon!!!-->
                
                
                
            </div>
            
        </div>
              
        <!--Não coloque  nada abaixo disso-->
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>   
    </body>
</html>
