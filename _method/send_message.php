<?php

/* Autor: Nixon Silva
 * Data: 09/06/2016
 * Função: Método responsável pelo envio de mensagens privadas a outro usuário
 */

// Inicializa a sessão
session_start();

// Se a sessão não tiver sido validada antes, retorna à tela de login;
if (!$_SESSION["login_status"])
{
    echo "<script> 
        alert('Faça login para continuar!');
        window.location.href='../login.html';
    </script>";
    exit;
}

include 'mysql_connect.php';

if (!empty($_POST['message']))
{
    // Atribui o comentário a uma string
    $message = $_POST['message'];
    $message = stripslashes($message);
    $message = mysql_real_escape_string($message);
    
    $receiver  = $_POST['receiver'];
    $receiver  = $stripslashes($receiver);
    $receiver  = mysql_real_escape_string($receiver);
    
    $sender    = $_SESSION['id'];
}
else
{
    // Retorna à pagina de perfil caso nrrada tenha sido digitado
    header("location:../profile.php");
}

$query = "INSERT INTO `message` (`sender`, `receiver`, `content`) VALUES (" .$sender. "," .$receiver. "," .$message. ")";
$result = mysqli_query($conn, $query);

if (!$result)
{
    echo "<script> 
        alert('Faça login para continuar!');
        window.location.href='../login.html';
    </script>";
    exit;
}

// Encerra conexão com o banco de dados
mysqli_close ($conn);

// Retorna à página do perfil
header("location:../messages.php?user_id=" .$receiver. "");

?>
