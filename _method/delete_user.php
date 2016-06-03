<?php

/* Autor: Nixon Silva
 * Data: 20/05/2016
 * Função: Código acionado quando um usuário deseja desativar seu perfil, para
 * tal, ele deverá inserir uma senha para a confirmação desta operação
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

if ($_POST['curr_password'] != $_SESSION['password'])
{
    // Imprime alerta que retorna a pagina anterior após sua confirmação
    echo "<script> 
        alert('Senha incorreta!');
        window.location.href='../edit_profile.php';
    </script>";
    exit;
}

// Obtém a ID do usuário
$my_id = $_SESSION["id"];

// Atualização do banco de dados
$query_name = "UPDATE `users` SET `removed` = 1 WHERE id = '".$my_id."'";

if (!$query_name)
{
    echo "<script> 
        alert('Erro ao desativar conta! Contate o administrador para mais informações');
        window.location.href='../edit_profile.php';
    </script>";
}
else
{
    // Encerra a sessão e retorna o usuário para a página de login
    session_unset ();
    echo "<script> 
            alert('Conta desativada!');
            window.location.href='../index.html';
    </script>";   
}

?>