<?php

/* Autor: Nixon Silva
 * Data: 18/05/2016
 * Função: Código acionado quando um usuário clica no botão cadastro, o código
 * é responsável por efetuar as validações dos dados e o cadastra efetivamente
 * logo em seguida caso sejam informações válidas.
 */

include 'mysql_connect.php';

// Verifica se os valores digitados são válidos
if (!empty($_POST['name']) and !empty($_POST['email']) and !empty($_POST['password_1'])
        and !empty($_POST['password_2']) and !empty($_POST['sex']) and !empty($_POST['date']))
{  
    // Atribui os valores entrado no formulário à variáveis
    $input_name     = $_POST['name'];
    $input_email    = $_POST['email'];
    $input_pass     = $_POST['password_1'];
    $input_pass_2   = $_POST['password_2'];
    $input_sex      = $_POST['sex'];
    $input_date     = $_POST['date'];
    
    // Verifica se as senhas são iguais
    if ($input_pass != $input_pass_2)
    {
        echo "<script> 
            alert('As senhas inseridas são diferentes!');
            window.location.href='../index.html';
        </script>";
        exit;
    }
}
else
{
    echo "<script> 
        alert('Os campos obrigatórios devem ser preenchidos!');
        window.location.href='../index.html';
    </script>";
    exit;
}

// Proteção contra MySQL Injection
$input_name     = stripslashes ($input_name);
$input_email    = stripslashes ($input_email);
$input_pass     = stripslashes ($input_pass);
$input_pass_2   = stripslashes ($input_pass_2);
$input_sex      = stripslashes ($input_sex);
$input_date     = stripslashes ($input_date);
$input_name     = mysql_real_escape_string ($input_name);
$input_email    = mysql_real_escape_string ($input_email);
$input_pass     = mysql_real_escape_string ($input_pass);
$input_pass_2   = mysql_real_escape_string ($input_pass_2);
$input_sex      = mysql_real_escape_string ($input_sex);
$input_date     = mysql_real_escape_string ($input_date);

// Verificação de se o e-mail já está cadastrado
$not_double     = mysqli_query($conn, 
        "SELECT * FROM `users` WHERE `email` LIKE '".$input_email."'");
$count_rows     = mysqli_num_rows ($not_double);
if ($count_rows >= 1)
{
    // Se tiver, informa ao usuário o erro
    echo "<script> 
        alert('Endereço de E-mail já cadastrado!');
        window.location.href='../index.html';
    </script>";
    exit;
}

// Inserção no banco de dados
$result = mysqli_query($conn, "INSERT INTO `users`(`username`, `email`, `password`, `sex`, `birthday`) VALUES ('".$input_name."','".$input_email."','".$input_pass."', '".$input_sex."', '".$input_date."')");
if (!$result)
{
    echo "Erro ao inserir no banco de dados!";
    exit;
}
else
{
    // Inicia a sessão do usuário
    session_start ();
    echo "Cadastro efetuado com sucesso!";   
}

// Termina a conexão com o banco de dados
mysqli_close ($conn);

?>