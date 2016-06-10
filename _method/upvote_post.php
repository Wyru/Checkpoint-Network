<?php

/* Autor: Nixon Silva
 * Data: 02/06/2016
 * Função: Código acionado quando uma postagem é curtida
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
$post_id = $_GET['post_id'];
$post_id = stripslashes ($post_id);
$post_id = mysql_real_escape_string ($post_id);

$origin_id = $_POST['origin_id'];
$origin_id = stripslashes($origin_id);
$origin_id = mysql_real_escape_string($origin_id);

$db_query_1 = "SELECT * FROM `upvotes` WHERE `post_id` = " .$post_id. " AND `user_id` = " .$_SESSION["id"]. "";
$query_1 = mysqli_query($conn, $db_query_1);

if (!$query_1 || mysqli_num_rows($query_1) == 0) // Caso o post ainda não tenha sido curtido
{
    // Query = Incrementa a contagem de likes do post
    $db_query_2 = "UPDATE `posts` SET `likes` = `likes` + 1 WHERE `id` = " .$post_id. "";
    $query_2 = mysqli_query($conn, $db_query_2);
    // Query = Armazena o dado do like
    $db_query_3 = "INSERT INTO`upvotes` (`post_id`, `user_id`) VALUES ('".$post_id."', '".$_SESSION["id"]."')";
    $query_3 = mysqli_query($conn, $db_query_3);
    if (!$query_3) 
    {
        echo "<script> 
            alert('Erro ao realizar consulta no banco de dados!');
            window.location.href='../show_profile.php?user_id=" .$origin_id. "
        </script>";
    }
    header("location:../show_profile.php?user_id=" .$origin_id. ""); 
}
else // Caso o post já tenha sido curtido
{
    // Query = Remove informações do like
    $db_query_4 = "DELETE FROM `upvotes` WHERE `post_id` = " .$post_id. " AND `user_id` = " .$_SESSION["id"]. "";
    $query_4 = mysqli_query($conn, $db_query_4);
    // Query = Decrementa contagem de likes do post
    $db_query_5 = "UPDATE `posts` SET `likes` = `likes` - 1 WHERE `id` = " .$post_id. "";
    $query_5 = mysqli_query($conn, $db_query_5);
    header("location:../show_profile.php?user_id=" .$origin_id. "");
}

?>