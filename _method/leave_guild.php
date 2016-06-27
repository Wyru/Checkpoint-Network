<?php

/* Autor: Nixon Silva
 * Data: 26/06/2016
 * Função: Código acionado quando um usuário participa de uma guilda
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
$guild_id = $_GET['guild_id'];
$guild_id = stripslashes ($guild_id);
$guild_id = mysql_real_escape_string ($guild_id);

$verify_guild_name  = "SELECT * FROM `guilds_users` WHERE `user_id` = '".$_SESSION["id"]."' AND `guild_id` = '".$guild_id."'";
$verify_guild_query = mysqli_query ($conn, $verify_guild_name);

if (mysqli_num_rows ($verify_guild_query) > 0)
{
    // Abandono da Guilda
    $leave_guild_name  = "DELETE FROM `guilds_users` WHERE `user_id` = '".$_SESSION["id"]."' AND `guild_id` = '".$guild_id."'";
    $leave_guild_query = mysqli_query ($conn, $leave_guild_name);
    if (!$leave_guild_query)
    {
        echo "<script> 
            alert('Erro ao entrar na guilda!');
            window.location.href='../show_profile.php?user_id=" .$_SESSION["id"]. "' </script>";
    }
}
else
{
    echo "<script> 
        alert('Erro: Você não faz parte desta guilda!');
        window.location.href='../show_profile.php?user_id=" .$_SESSION["id"]. "' </script>";
}

mysqli_close ($conn);
header("location:../show_profile.php?user_id=" .$_SESSION["id"]. "");

?>