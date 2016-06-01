<?php

/* Autor: Nixon Silva
 * Data: 01/06/2016
 * Função: Código acionado quando um usuário adiciona um amigo
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
$friend_id = $_GET['friend_id'];
$friend_id = stripslashes ($friend_id);
$friend_id = mysql_real_escape_string ($friend_id);

if ($friend_id == $_SESSION["id"])
{
     echo "<script>
            alert('Operação não permitida!');
            window.location.href='../my_profile.php';
        </script>";
     mysqli_close($conn);
     exit;
}

// Verifica se a amizade já não existe
$query_1 = "SELECT * FROM `friends` WHERE `user_id` = " .$_SESSION["id"]. " AND WHERE `friend_id` = " . $friend_id . "";
$exists = mysqli_query ($conn, $query_1);
// No caso da amizade já existir, não faça nada
if ($exists)
{
    echo "<script> 
        alert('Amizade já existente!');
        window.location.href='../my_profile.php';
    </script>";
}
else
{
    // Adição da amizade
    $query_2 = "INSERT INTO `friends`(`user_id`, `friend_id`) VALUES ('".$_SESSION["id"]."','".$friend_id."')";
    $query_3 = "INSERT INTO `friends`(`user_id`, `friend_id`) VALUES ('".$friend_id."','".$_SESSION["id"]."')";
    $result_1 = mysqli_query ($conn, $query_2);
    if (!$result_1)
    {
        echo "<script>
            alert('Erro durante a consulta ao banco de dados!');
            window.location.href='../my_profile.php';
        </script>";
    }
    $result_2 = mysqli_query ($conn, $query_3);
    if (!$result_2)
    {
        echo "<script>
            alert('Erro durante a consulta ao banco de dados!');
            window.location.href='../my_profile.php';
        </script>";
    }
}

mysqli_close ($conn);

?>