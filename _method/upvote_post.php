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

$db_query = "UPDATE `posts` SET `likes` = `likes` + 1 WHERE `id` = " .$post_id. "";
$query = mysqli_query($conn, $db_query);

if (!$query) 
{
    echo "<script> 
        alert('Erro ao realizar consulta no banco de dados!');
        window.location.href='../show_profile.php?user_id=" .$origin_id. "
    </script>";
}

header("location:../show_profile.php?user_id=" .$origin_id. "");

?>