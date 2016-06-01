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
        <link href="_bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="_css/home.css">
        <!--Não adicione nada antes disso-->
        
    </head>
    <body>
        <header>
            <?php
                include("default_header.php");
            ?>
             
        </header> 
        <section class="container-fluid">
            <div class="col-md-2 pull-left" id="left">
                
                    <p>Alguma coisa aqui</p>
                    

                
                
            </div>
            <div class="col-md-2 pull-right" id="right">
                
                   <?php include("default_notifications.php");?>
   
            </div>
            <div class="col-md-8 pull-right" id="main">
                <div class="row">
                    <?php include("default_publish.php"); ?>
                </div>
                
                <div class="col-md-12">
                    <p> Publicações:</p>
                    
                    
                    <!--Faça a magia acontecer aqui Nixon!!!-->
                    
                    
                    
                    
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
