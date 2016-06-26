<?php

/* Autor: Nixon Silva
 * Data: 26/06/2016
 * Função: Código acionado quando o usuário cria uma guilda
 */

ob_start ();

// Inicia a sessão
session_start();

// Se a sessão não tiver sido validada antes, retorna à tela de login;
if (!$_SESSION["login_status"])
{
    echo "<script> 
        alert('Faça login para continuar!');
        window.location.href='../login.html';
    </script>";
    exit;
}

// Realiza a conexão com o banco de dados
include 'mysql_connect.php';

// Proteção contra MySQL injection em campos obrigatórios
$guild_name       = $_POST['guild_name'];
$guild_name       = stripslashes ($guild_name);
$guild_name       = mysql_real_escape_string ($guild_name);

$guild_category   = $_POST['guild_category'];
$guild_category   = stripslashes ($guild_category);
$guild_category   = mysql_real_escape_string ($guild_category);

$guild_pic        = $_POST['guild_pic'];
$guild_pic        = stripslashes ($guild_pic);
$guild_pic        = mysql_real_escape_string ($guild_pic);

$guild_privacy    = $_POST['guild_privacy'];
$guild_privacy    = stripslashes ($guild_privacy);
$guild_privacy    = mysql_real_escape_string ($guild_privacy);

// Verifica se um arquivo foi enviado para a capa

if (isset($_FILES['guild_pic']['name']) && $_FILES['guild_pic']['error'] == 0)
{
    $file_tmp  = $_FILES['guild_pic']['tmp_name'];
    $file_name = $_FILES['guild_pic']['name'];
    $file_name = stripslashes ($file_name);
    $file_name = mysql_real_escape_string ($file_name);
    // Extrai a extensão do arquivo
    $file_ext  = pathinfo ($file_name, PATHINFO_EXTENSION);
    // Converte para minúsculo
    $file_ext  = strtolower ($file_ext);
    // Verifica se é uma extensão aceitável
    if (strstr('.jpg;.jpeg;.gif;.png;.jpe', $file_ext))
    {
        $file_new_name      = uniqid (time () ) . "." . $file_ext;
        $file_destination   = '../_imagens/guild_pic/' . $file_new_name;
        if (@move_uploaded_file ($file_tmp, $file_destination))
        {
            $game_art = '_imagens/guild_pic/' . $file_new_name;
        }
        else
        {
            echo "<script> alert ('Erro ao salvar o arquivo de foto'); </script>";
            $game_art = NULL;
        }
    }
    else
    {
        echo "<script> alert ('Extensão inválida! Somente arquivos .png, .jpg e .gif'); </script>";
    }
}

// Inserção no banco de dados
$insert_guild_name  = "INSERT INTO `guilds`(`name`, `type`, `privacy`, `image`) VALUES ('".$guild_name."','".$guild_category."','".$guild_privacy."','".$guild_pic."')";
$insert_guild_query = mysqli_query ($conn, $insert_guild_name);

if ($insert_guild_query)
{
    $insert_last_id   = mysqli_insert_id ($conn);
    // Admin da guilda
    $make_admin_name  = "INSERT INTO `guilds_users`(`guild_id`, `user_id`, `user_type`) VALUES ('".$insert_last_id."','".$_SESSION["id"]."',1)";
    $make_admin_query = mysqli_query ($conn, $make_admin_name);
    if (!$make_admin_query)
        echo "<script> alert('Erro ao fazer conexão com o banco de dados!'); </script>";
}
else
{
    echo "<script> alert('Erro ao fazer conexão com o banco de dados!'); </script>";
}

header ("location:../show_profile.php?user_id=" .$_SESSION["id"]. "");
mysqli_close ($conn);
ob_end_flush ();

?>