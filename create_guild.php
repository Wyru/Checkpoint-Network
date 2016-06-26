<?php

// Autor: Nixon Moreira Silva
// Data de Criação: 26/06/2016
// Data de Alteração: 26/06/2016
// Descrição: Tela para o formulário de criação de guilda

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
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="_bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="_css/edit_profile.css">
        
        <!--Não adicione nada antes disso-->

        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script>$(function ()
            {
                $("#datepicker").datepicker();
            });
        </script>
        <meta charset="utf-8">
        <title>Criar Guilda</title>
    </head>
    <body>
        <header>
            <?php
                $var_name = $_SESSION["name"];
                include("default_header.php");
            ?>
        </header>
        <section class="container-fluid" id="page-content">
            <div class="row" >
                <div class="col-lg-12" id="title">
                    <h1><i class="fa fa-pencil fa-lg"></i>Criar Guilda</h1>
                </div>
            </div>
            <div class="row" id="Editaveis">
                <form enctype="multipart/form-data" role="form" method="POST" action="./_method/add_guild.php">
                    <div class="col-lg-8 col-lg-offset-1  form-group">
                        <br>
                        <label for="guild_pic">Selecione uma imagem:</label>
                        <input name="guild_pic" type="file" />
                        <label for="guild_name">Nome da Guilda:</label>
                        <input class="form-control" id="Name" type="text" name="guild_name" value="" required>
                        <label for="guild_category">Cateogria:</label>
                        <input class="form-control" id="Name" type="text" name ="guild_category" value="" required/>
                        <label for="guild_privacy">Privacidade:</label>
                        <select name="guild_privacy">
                            <option value=0>Pública</option>
                            <option value=1>Privada</option>
                         </select>
                        <br><p><button class="btn btn-primary" type="submit">Criar Guilda</button></p>
                    </div>
                </form>
            </div>
        </section>
    </body>
</html>