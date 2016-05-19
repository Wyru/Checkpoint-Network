<?php

/* Autor: Nixon Silva e Will Saymon
 * Data: 19/05/2016
 * Função: Retira as informações digitadas para a postagem na linha do tempo e
 * salva elas num banco de dados, recarregando a página logo em seguida, exibindo
 * também esta nova postagem
 */

// Inicializa a sessão
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

include 'mysql_connect.php';

if (!empty($_POST['comment']))
{
    // Atribui o comentário a uma string
    $post_content = $_POST['comment'];
}
else
{
    // Retorna à pagina de perfil caso nada tenha sido digitado
    header("location:../profile.php");
}

// Evita tentativas de MySQL injection
$post_content   = stripslashes ($post_content);
$post_content   = mysql_real_escape_string ($post_content);

// Insere os valores no banco de dados
$result = mysqli_query ($conn, "INSERT INTO `posts`(`user_id`, `content`) VALUES ('".$_SESSION["id"]."', '".$post_content."')");

if (!$result)
{
    echo "<script> 
        alert('Faça login para continuar!');
        window.location.href='../login.html';
    </script>";
    exit;
}

// Encerra conexão com o banco de dados
mysqli_close ($conn);

// Retorna à página do perfil
header("location:../my_profile.php");

?>