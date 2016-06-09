<!DOCTYPE html>
<!--
Autor: Will Saymon e Nixon Moreira Silva
Data de Criação: 28/05/2016
Data de Alteração: 09/06/2016
Descrição: Tela em que será mostrado todos as mensagens recebidas e enviadas pelo jogador parte.
-->
<?php
// Inicia sessão
session_start ();
                     
// Verifica se a variável de login está ativada
if (!$_SESSION["login_status"])
{
    // Envia para a página de login caso não esteja	
    header("location:login.html");
    exit;
}

$receiver = $_GET['receiver'];
$receiver = stripslashes($receiver);
$receiver = mysql_real_escape_string ($receiver);

?>

<html>
    <head>   
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="_bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="_css/messages.css">
        <!--Não adicione nada antes disso-->
        
    </head>
    <body>
        <header>
           <?php
                $var_name = $_SESSION["name"];
                include("default_header.php");
            ?>
        </header>
        <!-- Temporário -->
        <div>
            <?php
                include './_method/mysql_connect.php';
                $query = "SELECT * FROM `messages` WHERE `sender` = " .$_SESSION["id"]. ", `receiver` = " .$receiver. " OR `sender` = " .$receiver. ", `receiver` = " .$_SESSION["id"]. "";
                $result = mysqli_query ($conn, $query);
                $i = 0;
                while ($rows = mysqli_fetch_row ($result) and $i < 25)
                {
                    if ($rows[1] == $_SESSION["id"])
                    {
                        // Enviado pelo usuário da sessão
                    }
                    else
                    {
                        // Enviado pelo outro usuário
                    }
                    $i ++;
                }
            ?>
        </div>
        <!--Não coloque  nada abaixo disso-->
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>   
    </body>
</html>
