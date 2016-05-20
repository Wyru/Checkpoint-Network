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
else
{
    // Proteção contra MySQL Injection
    if (!empty($_POST['new_name']))
    {
        $new_name       = $_POST['new_name'];
        $new_name       = stripslashes ($new_name);
        $new_name       = mysql_real_escape_string ($new_name);
    }
    else
        $new_name       = $_SESSION["name"];
            
    if (!empty($_POST['new_sex']))
    {
        $new_sex        = $_POST['new_sex'];
        $new_sex        = stripslashes ($new_sex);
        $new_sex        = mysql_real_escape_string ($new_sex);
    }
    else
        $new_sex        = $_SESSION["sex"];
    
    if (!empty($_POST['new_date']))
    {
        $new_date       = $_POST['new_date'];
        $new_date       = stripslashes ($new_date);
        $new_date       = mysql_real_escape_string ($new_date);
    }
    else
        $new_date       = $_SESSION["birthday"];
    
    if (!empty($_POST['new_psn']))
    {
        $new_psn        = $_POST['new_psn'];
        $new_psn        = stripslashes ($new_psn);
        $new_psn        = mysql_real_escape_string ($new_psn);
    }
    else
    {
        if (!empty($_SESSION["psn"]))
            $new_psn        = $_SESSION["psn"];
        else
            $new_psn        = NULL;
    }
            
    if (!empty($_POST['new_steam']))
    {
        $new_steam      = $_POST['new_steam'];
        $new_steam      = stripslashes ($new_steam);
        $new_steam      = mysql_real_escape_string ($new_steam);
    }
    else
    {
        if (!empty($_SESSION["steam"]))
            $new_steam        = $_SESSION["steam"];
        else
            $new_steam        = NULL;
    }
        
    if (!empty($_POST['new_live']))
    {
        $new_live       = $_POST['new_live'];
        $new_live       = stripslashes ($new_live);
        $new_live       = mysql_real_escape_string ($new_live);
    }
    else
    {
        if (!empty($_SESSION["xbox_live"]))
            $new_live   = $_SESSION["xbox_live"];
        else
            $new_live   = NULL;
    }
        
    if (!empty($_POST['new_nintendo']))
    {
        $new_nintendo   = $_POST['new_nintendo'];
        $new_nintendo   = stripslashes ($new_nintendo);
        $new_nintendo   = mysql_real_escape_string ($new_nintendo);
    }
    else
    {
        if (!empty($_SESSION["nintendo"]))
            $new_nintendo   = $_SESSION["nintendo"];
        else
            $new_nintendo   = NULL;
    }
        
    if (!empty($_POST['new_biography']))
    {
        $new_biography  = $_POST['new_biography'];
        $new_biography  = stripslashes ($new_biography);
        $new_biography  = mysql_real_escape_string ($new_biography);
    }
    else
    {
        if (!empty($_SESSION["biography"]))
            $new_biography  = $_SESSION["biography"];
        else
            $new_biography  = NULL;
    }   
    
    if (!empty($_POST['new_game']))
    {
        $new_game       = $_POST['new_game'];
        $new_game       = stripslashes ($new_game);
        $new_game       = mysql_real_escape_string ($new_game);
    }
    else
    {
        if (!empty($_SESSION["favorite_game"]))
            $new_game  = $_SESSION["favorite_game"];
        else
            $new_game  = NULL;
    }
    
    $my_id          = $_SESSION["id"];
}

// Atualização do banco de dados
$query_name = "UPDATE `users` SET `username`='".$new_name."',"
        . "`sex`='".$new_sex."',`birthday`='".$new_date."',`psn`='".$new_psn."',`steam`='".$new_steam."',"
        . "`xbox_live`='".$new_live."',`nintendo`='".$new_nintendo."',`biography`='".$new_biography."',"
        . "`favorite_game`='".$new_game."' WHERE id = '".$my_id."'";
echo $query_name;
echo "<br>";
$query_result = mysqli_query($conn, $query_name);

if ($query_result)
{
    // Caso a query tenha sido efetuada com sucesso, atualiza os dados da sessão
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
    // Encerra a conexão com o banco de dados
    mysqli_close ($conn);
    exit;
}
else
{
    // Caso a query tenha dado errado, envia um e-mail ao Ademir
    mail ("nixonmoreira@hotmail.com", "Warning 02 - Checkpoint Network:"
            . " An user just tried to update his information but the database didn't"
            . "found any register of his user_id, something might be wrong, check"
            . "the database for further information.");
    // Encerra a conexão com o banco de dados
    mysqli_close ($conn);
    
}

ob_end_flush ();

?>