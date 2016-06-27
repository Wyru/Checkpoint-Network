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

$page_id   = $_GET['page'];
$page_id   = stripslashes ($page_id);
$page_id   = mysql_real_escape_string ($page_id);


// Atualização do banco de dados
$query_name = "UPDATE `posts` SET `deleted` = 1 WHERE id = '".$post_id."'";
$query = mysqli_query($conn, $query_name);

$query_name2 = "SELECT * FROM `posts` WHERE `id` = '" .$post_id. "'";
$query2 = mysqli_query($conn, $query_name2);
$rowsNEW = mysqli_fetch_row($query2);

if ($query and $query2)
{
    mysqli_close($conn);
    // Manda para a página do usuário
     if ($page_id == 0)
        header("location:../show_profile.php?user_id=" .$post_id. "");  
    else
        header("location:../home.php");

}
else
{
    // Retorna o erro na deleção do post
        mysqli_close($conn);
    echo "<script> 
            alert('Erro ao remover postagem!');
            window.location.href='../show_profile.php?user_id=" .$rowsNEW[1]. "' </script>";
}


?>