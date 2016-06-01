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
    header("location:login.html");
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
                include("default_header.php");
            ?>
             
        </header>  
        <!--Não coloque  nada abaixo disso-->
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>   
    </body>
</html>
