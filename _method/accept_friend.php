<?php

/* Autor: Nixon Silva
 * Data: 12/06/2016
 * Função: Código acionado quando um usuário aceita uma solicitação de amizade
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
$friend_id = $_GET['id'];
$friend_id = stripslashes ($friend_id);
$friend_id = mysql_real_escape_string ($friend_id);

$update_friend = "UPDATE `friends` SET `accepted` = 1 WHERE `user_id` = '" .$friend_id. "' AND `friend_id` = '" .$_SESSION["id"]. "'";

$query_update = mysqli_query ($conn, $update_friend);

if (!$query_update) 
{
    echo "<script> 
        alert('Erro ao realizar consulta no banco de dados!');
        window.location.href='../login.html';
    </script>";
}

header("location:../friends.php?user_id=". $_SESSION["id"]);
mysqli_close ($conn);