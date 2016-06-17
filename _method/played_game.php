<?php

/* Autor: Nixon Silva
 * Data: 16/06/2016
 * Função: Código acionado quando um usuário adiciona um jogo a sua lista
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
$game_id = $_GET['game_id'];
$game_id = stripslashes ($game_id);
$game_id = mysql_real_escape_string ($game_id);
// Origin
//$previous_page = $_GET['prev'];
//$previous_page = stripslashes ($previous_page);
//$previous_page = mysql_real_escape_string ($previous_page);

// Verifica se o jogo já não foi adicionado à lista
$query_verify_game_name = "SELECT * FROM `games_played` WHERE `user_id` = '".$_SESSION["id"]."' AND `game_id` = '".$game_id."'";
$query_verify_game = mysqli_query ($conn, $query_verify_game_name);
// No caso do jogo já estiver sido adicionado a lista, não faça nada
if (mysqli_fetch_row ($query_verify_game))
{
    echo "<script> 
        alert('Erro: Jogo já contido em sua lista!');
        window.location.href='../show_profile.php?user_id=" .$_SESSION["id"]. "' </script>";
}
else
{
    // Adição da amizade - "User_id = Quem enviou a solicitação" - "Friend_id" = Quem recebeu a solicitação
    $query_add_game_name = "INSERT INTO `games_played`(`user_id`, `game_id`) VALUES ('".$_SESSION["id"]."','".$game_id."')";
    $query_add_game = mysqli_query ($conn, $query_add_game_name);
    if (!$query_add_game)
    {
        echo "<script> 
            alert('Erro ao adicionar jogo a sua lista!');
            window.location.href='../show_profile.php?user_id=" .$_SESSION["id"]. "' </script>";
    }
}

if (!empty($_GET['prev']))
{
    header("location:../show_profile.php?user_id=" .$_SESSION["id"]. "");
}
else
{
    header("location:../show_profile.php?user_id=" .$_SESSION["id"]. "");
    // header("location:../show_game.php?user_id=" .$game_id. "");
}

?>