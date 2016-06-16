<?php

/* Autor: Nixon Silva
 * Data: 15/06/2016
 * Função: Código acionado quando o usuário submete um jogo ao sistema
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
$game_name       = $_POST['game_name'];
$game_name       = stripslashes ($game_name);
$game_name       = mysql_real_escape_string ($game_name);

$game_genre      = $_POST['game_genre'];
$game_genre      = stripslashes ($game_genre);
$game_genre      = mysql_real_escape_string ($game_genre);

$game_developer  = $_POST['game_developer'];
$game_developer  = stripslashes ($game_developer);
$game_developer  = mysql_real_escape_string ($game_developer);

// Proteção contra MySQL injection em campos opcionais

if (!empty($_POST['game_publisher']))
{
    $game_publisher        = $_POST['game_publisher'];
    $game_publisher        = stripslashes ($game_publisher);
    $game_publisher        = mysql_real_escape_string ($game_publisher);
}
else
{
    $game_publisher        = NULL;
}

if (!empty($_POST['game_description']))
{
    $game_description        = $_POST['game_description'];
    $game_description        = stripslashes ($game_description);
    $game_description        = mysql_real_escape_string ($game_description);
}
else
{
    $game_description        = NULL;
}

if (!empty($_POST['game_release']))
{
    $game_release           = $_POST['game_release'];
    $game_release           = stripslashes ($game_release);
    $game_release           = mysql_real_escape_string ($game_release);
}
else
{
    $game_release           = NULL;
}

// Verifica se um arquivo foi enviado para a atre

if (isset($_FILES['game_art']['name']) && $_FILES['game_art']['error'] == 0)
{
    $file_tmp  = $_FILES['game_art']['tmp_name'];
    $file_name = $_FILES['game_art']['name'];
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
        $file_destination   = '../_imagens/game_art/' . $file_new_name;
        if (@move_uploaded_file ($file_tmp, $file_destination))
        {
            $game_art = '_imagens/game_art/' . $file_new_name;
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
$query_game_insert_name = "INSERT INTO `games`"
        . "(`name`, `genre`, `launch_date`, `developer`, `publisher`, `description`, `art`) "
        . "VALUES ('".$game_name."','".$game_genre."','".$game_release."','".$game_developer."',"
        . "'".$game_publisher."','".$game_description."','".$game_art."')";
$query_game_insert = mysqli_query ($conn, $query_game_insert_name);

if (!$query_game_insert)
{
     echo "<script> alert('Erro ao fazer conexão com o banco de dados!'); </script>";
}

header ("location:../show_profile.php?user_id=" .$_SESSION["id"]. "");
mysqli_close ($conn);
ob_end_flush ();

?>