<?php

/* Autor: Nixon Silva
 * Data: 19/05/2016
 * Função: Código acionado quando um usuário edita seu perfil, aqui é realizado
 * o processo de verificação dessa alteração, validação dos dados e a atualização
 * dos mesmos no banco de dados
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

// Verifica a completude do formulário
if (!empty($_POST['new_name']) and !empty($_POST['sex']) and !empty($_POST['newdate'])
        and !empty($_POST['new_psn']) and !empty($_POST['new_steam']) and !empty($_POST['new_live'])
        and !empty($_POST['new_nintendo']) and !empty($_POST['new_biography'])
        and !empty($_POST['new_game']) and !empty($_POST['curr_password']))
{
    $new_name       = $_POST['new_name'];
    $new_sex        = $_POST['new_sex'];
    $new_date       = $_POST['new_date'];
    $new_psn        = $_POST['new_psn'];
    $new_steam      = $_POST['new_steam'];
    $new_live       = $_POST['new_live'];
    $new_nintendo   = $_POST['new_nintendo'];
    $new_biography  = $_POST['new_biography'];
    $new_game       = $_POST['new_game'];
    $my_id          = $_SESSION["id"];
}
else if ($_POST['curr_password'] != $_SESSION['password'])
{
    // Imprime alerta que retorna a pagina anterior após sua confirmação
    echo "<script> 
        alert('Senha incorreta!');
        window.location.href='../edit_profile.php';
    </script>";
    exit;
}
else
{
    // Imprime alerta que retorna a pagina anterior após sua confirmação
    echo "<script> 
        alert('Algum dos campos não foram preenchidos!');
        window.location.href='../edit_profile.php';
    </script>";
    exit;
}    

// Proteção contra MySQL Injection
$new_name       = stripslashes ('new_name');
$new_sex        = stripslashes ('new_sex');
$new_date       = stripslashes ('new_date');
$new_psn        = stripslashes ('new_psn');
$new_steam      = stripslashes ('new_steam');
$new_live       = stripslashes ('new_live');
$new_nintendo   = stripslashes ('new_nintendo');
$new_biography  = stripslashes ('new_biography');
$new_game       = stripslashes ('new_game');
$new_name       = mysql_real_escape_string ('new_name');
$new_sex        = mysql_real_escape_string ('new_sex');
$new_date       = mysql_real_escape_string ('new_date');
$new_psn        = mysql_real_escape_string ('new_psn');
$new_steam      = mysql_real_escape_string ('new_steam');
$new_live       = mysql_real_escape_string ('new_live');
$new_nintendo   = mysql_real_escape_string ('new_nintendo');
$new_biography  = mysql_real_escape_string ('new_biography');
$new_game       = mysql_real_escape_string ('new_game');

// Realiza a conexão com o banco de dados
include 'mysql_connect.php';

// Atualização do banco de dados
$result = mysqli_query($conn, "UPDATE `users` SET `username`='".$new_name."'"
        . "`sex`='".$new_sex."',`birthday`='".$new_date."',`psn`='".$new_psn."',`steam`='".$new_steam."',"
        . "`xbox_live`='".$new_live."',`nintendo`='".$new_nintendo."',`biography`='".$new_biography."',"
        . "`favorite_game`='".$new_game."' WHERE id = $my_id");
$count_rows     = mysqli_num_rows ($query_result);

if ($count_rows == 1)
{
    // Inicia a sessão do usuário
    session_start ();
    // Atualiza os dados da sessão
    $_SESSION["name"]               = $new_name;
    $_SESSION["sex"]                = $new_sex;
    $_SESSION["birthday"]           = $new_date;
    $_SESSION["psn"]                = $new_psn;
    $_SESSION["steam"]              = $new_steam;
    $_SESSION["xbox_live"]          = $new_live;
    $_SESSION["nintendo"]           = $new_nintendo;
    $_SESSION["biography"]          = $new_biography;
    $_SESSION["favorite_game"]      = $new_game;
    // Redireciona à pagina de perfil inicial
    header("location:../my_profile.php");
    exit;
}
else if ($count_rows == 0)
{
    // Caso não haja nenhum resultado no banco de dados referente às informações
    echo "<script> 
        alert('E-Mail ou Senha incorretos!');
        window.location.href='../login.html';
    </script>";
    exit;
}
else
{
    // Caso haja dois registros similares no banco de dados, envia e-mail ao admin
    mail ("nixonmoreira@hotmail.com", "Warning 01 - Checkpoint Network",
            "It was discovered that two or more rows containing duplicated ids"
            . "is inside the database, check it for further information.");
}

// Encerra a conexão com o banco de dados
mysqli_close ($conn);

ob_end_flush ();

?>