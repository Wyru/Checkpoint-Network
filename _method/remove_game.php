<?php

/* Autor: Nixon Silva
 * Data: 16/06/2016
 * Função: Trata os casos da remoção de um jogo da lista de um usuário
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

// Proteção contra MySQL injection
$game_id = $_GET['game_id'];
$game_id = stripslashes ($game_id);
$game_id = mysql_real_escape_string ($game_id);

$remove_query_name = "DELETE FROM `games_played` WHERE `user_id` = '".$_SESSION["id"]."' AND `game_id` = '".$game_id."'";
$remove_query      = mysqli_query ($conn, $remove_query_name);

if ($remove_query)
{
    mysqli_close($conn);
    header("location:../games.php?user_id=" . $_SESSION["id"]);
}
else
{
    // Retorna o erro na deleção do post
    echo "<script> 
            alert('Erro ao remover jogo da lista!');
            window.location.href='../show_profile.php?user_id=" .$_SESSION["id"]. "' </script>";
    mysqli_close($conn);
}

?>