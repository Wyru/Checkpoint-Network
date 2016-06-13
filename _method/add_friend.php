<?php

/* Autor: Nixon Silva
 * Data: 01/06/2016
 * Função: Código acionado quando um usuário adiciona um amigo
 */

// Inicia sessão
session_start ();
// Verifica se a variável de login está ativada
if (!$_SESSION["login_status"])
{
    // Envia para a página de login caso não esteja	
    header ("location:login.html");
    exit;
}

// Conecta ao banco de dados
include 'mysql_connect.php';
// Proteção contra MySQL injection
$friend_id = $_GET['friend_id'];
$friend_id = stripslashes ($friend_id);
$friend_id = mysql_real_escape_string ($friend_id);
// Origin
$previous_page = $_GET['prev'];
$previous_page = stripslashes ($friend_id);
$previous_page = mysql_real_escape_string ($friend_id);

if ($friend_id == $_SESSION["id"])
{
    echo "<script> 
        alert('Erro ao remover postagem!');
        window.location.href='../show_profile.php?user_id=" .$_SESSION["id"]. "' </script>";
     mysqli_close($conn);
     exit;
}

// Verifica se a amizade já não existe
$query_1 = "SELECT * FROM `friends` WHERE `user_id` = " .$_SESSION["id"]. " AND WHERE `friend_id` = " . $friend_id . "";
$exists = mysqli_query ($conn, $query_1);
// No caso da amizade já existir, não faça nada
if ($exists)
{
    echo "<script> 
        alert('Erro ao remover postagem!');
        window.location.href='../show_profile.php?user_id=" .$_SESSION["id"]. "' </script>";
}
else
{
    // Adição da amizade - "User_id = Quem enviou a solicitação" - "Friend_id" = Quem recebeu a solicitação
    $query_2 = "INSERT INTO `friends`(`user_id`, `friend_id`) VALUES ('".$_SESSION["id"]."','".$friend_id."')";
    $result_1 = mysqli_query ($conn, $query_2);
    if (!$result_1)
    {
        echo "<script> 
            alert('Erro ao remover postagem!');
            window.location.href='../show_profile.php?user_id=" .$_SESSION["id"]. "' </script>";
    }
}

if (!empty($_GET['prev']))
{
    header("location:../show_profile.php?user_id=" .$_SESSION["id"]. "");
}
else
{
    header("location:../show_profile.php?user_id=" .$friend_id. "");
}
mysqli_close ($conn);

?>