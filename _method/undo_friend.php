<?php

/* Autor: Nixon Silva
 * Data: 01/06/2016
 * Função: Código acionado quando um usuário desfaz uma amizade
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
$friend_id = $_GET['user_id'];
$friend_id = stripslashes ($friend_id);
$friend_id = mysql_real_escape_string ($friend_id);

$deletion_1 = "DELETE FROM `friends` WHERE `user_id` = " .$_SESSION["id"]. " AND `friend_id` = " .$friend_id. "";
$deletion_2 = "DELETE FROM `friends` WHERE `user_id` = " .$friend_id. " AND `friend_id` = " .$_SESSION["id"]. "";

$query_1 = mysqli_query($conn, $deletion_1);
$query_2 = mysqli_query($conn, $deletion_2);

if (!$query_1 or !$query_2) 
{
    echo "<script> 
        alert('Erro ao realizar consulta no banco de dados!');
        window.location.href='../login.html';
    </script>";
}

header("location:../my_profile.php");
mysqli_close ($conn);

?>