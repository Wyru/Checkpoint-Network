<?php

/* Autor: Nixon Silva
 * Data: 18/05/2016
 * Função: Código acionado quando um usuário clica no botão cadastro, o código
 * é responsável por efetuar as validações dos dados e o cadastra efetivamente
 * logo em seguida caso sejam informações válidas.
 */


include 'mysql_connect.php';

ob_start ();

// Verifica se o formulário de login está preenchido
if (!empty($_POST['email']) and !empty($_POST['password_1']))
{
    // Atribui os valores lido do formulário para variáveis
    $input_email    = $_POST['email'];
    $input_password = $_POST['password_1'];
}
else
{
    // Imprime alerta que retorna a pagina anterior após sua confirmação
    echo "<script> 
        alert('Todos os campos devem ser preenchidos para o Login!');
        window.location.href='../login.html';
    </script>";
    exit;
}    

// Proteção contra MySQL Injection
$input_email    = stripslashes ($input_email);
$input_password = stripslashes ($input_password);
$input_email    = mysql_real_escape_string ($input_email);
$input_password = mysql_real_escape_string ($input_password);
   
// Consulta no banco de dados
$query_result = mysqli_query ($conn, 
        "SELECT * FROM `users` WHERE `email` LIKE '".$input_email."' AND `password` LIKE '".$input_password."'");
// Verifica quantas linhas são compatíveis com o resultado
$count_rows     = mysqli_num_rows ($query_result);
$actual_rows    = mysqli_fetch_row ($query_result);

if ($count_rows == 1)
{
    // Verifica se não é um usuário desativado
    if ($actual_rows[14] == 1)
    {
        echo "<script> 
            alert('Usuário desativado!');
            window.location.href='../login.html';
        </script>";
        exit;        
    }
    // Inicia a sessão do usuário
    session_start ();
    // Atribui seus dados para a sessão
    $_SESSION["id"]             = $actual_rows[0];
    $_SESSION["name"]           = $actual_rows[1];
    $_SESSION["email"]          = $actual_rows[2];
    $_SESSION["password"]       = $actual_rows[3];
    $_SESSION["sex"]            = $actual_rows[4];
    $_SESSION["birthday"]       = $actual_rows[5];
    $_SESSION["psn"]            = $actual_rows[6];
    $_SESSION["steam"]          = $actual_rows[7];
    $_SESSION["xbox_live"]      = $actual_rows[8];
    $_SESSION["nintendo"]       = $actual_rows[9];
    $_SESSION["biography"]      = $actual_rows[10];
    $_SESSION["favorite_game"]  = $actual_rows[11];
    $_SESSION["user_type"]      = $actual_rows[12];
    $_SESSION["profile_pic"]    = $actual_rows[13];
    $_SESSION["login_status"]   = true;
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
            "A login attempt where two or more correct results in the"
            . "database where queried just happened. Check the `users` table"
            . "to check for further information");
}

ob_end_flush ();

?>