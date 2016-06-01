<?php

/* Autor: Nixon Silva
 * Data: 20/05/2016
 * Função: Trata os casos de deleção de um post
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

// Realiza a conexão com o banco de dados
include 'mysql_connect.php';

// Obtém a ID do usuário
$my_id = $_SESSION["id"];
// Obtém o ID do post a ser deletado
$post_id = $_GET['post_id'];
// Proteção contra MySQL inject
$post_id = stripslashes($post_id);
$post_id = mysql_real_escape_string($post_id);

// Atualização do banco de dados
$query_name = "UPDATE `posts` SET `deleted` = 1 WHERE id = '".$post_id."'";
$query = mysqli_query($conn, $query_name);

if ($query)
{
    // Manda para a página do usuário
    header("location:../my_profile.php");
    mysqli_close($conn);
}
else
{
    // Retorna o erro na deleção do post
    echo "<script> 
            alert('Erro ao remover postagem!');
            window.location.href='../my_profile.php';
    </script>";
    mysqli_close($conn);
}


?>