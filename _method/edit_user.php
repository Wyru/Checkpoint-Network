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
    
    if (!empty($_POST['new_console']))
    {
        $new_console  = $_POST['new_console'];
        $new_console  = stripslashes ($new_console);
        $new_console  = mysql_real_escape_string ($new_console);
    }
    else
    {
        if (!empty($_SESSION["plaftorm"]))
            $new_console  = $_SESSION["platform"];
        else
            $new_console  = NULL;
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
    if(!empty($_POST['new_pass1']) and $_POST['new_pass1']== $_POST['new_pass2'])
    {
        $new_pass       = $_POST['new_pass1'];
        $new_pass       = stripslashes($new_pass);
        $new_pass       = mysql_real_escape_string($new_pass);
    }
    else
    {
        $new_pass = $_SESSION["password"];
    }
    
    $my_id          = $_SESSION["id"];

// verifica se foi enviado um arquivo
    if ( isset( $_FILES[ 'arquivo' ][ 'name' ] ) && $_FILES[ 'arquivo' ][ 'error' ] == 0 ) {
        
    $arquivo_tmp = $_FILES[ 'arquivo' ][ 'tmp_name' ];
    $nome = $_FILES[ 'arquivo' ][ 'name' ];
 
    // Pega a extensão
    $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
 
    // Converte a extensão para minúsculo
    $extensao = strtolower ( $extensao );
 
    // Somente imagens, .jpg;.jpeg;.gif;.png
    // Aqui eu enfileiro as extensões permitidas e separo por ';'
    // Isso serve apenas para eu poder pesquisar dentro desta String
    if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
        // Cria um nome único para esta imagem
        // Evita que duplique as imagens no servidor.
        // Evita nomes com acentos, espaços e caracteres não alfanuméricos
        $novoNome = uniqid ( time () ) . "." . $extensao;
 
        // Concatena a pasta com o nome
        $destino = '../_imagens/profile_pic/' . $novoNome;
 
        // tenta mover o arquivo para o destino
        if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
            
            $new_pic = '_imagens/profile_pic/' . $novoNome;
            echo "<script>     
                alert('Arquivo salvo com sucesso em : $new_pic'); 
            </script>";
        }
        else
            echo "<script> 
            alert('Erro ao salvar o arquivo de foto');
            </script>";
    }
    else
            echo "<script> 
            alert('Só são permitidos arquivos *.jpg;*.jpeg;*.gif;*.png');
            </script>";
}
else
    $new_pic = $_SESSION["profile_pic"];

}

// Atualização do banco de dados
$query_name = "UPDATE `users` SET `username`='".$new_name."',`password`='".$new_pass."',"
        . "`sex`='".$new_sex."',`birthday`=STR_TO_DATE('".$new_date."', '%d/%m/%Y'),`psn`='".$new_psn."',`steam`='".$new_steam."',"
        . "`xbox_live`='".$new_live."',`nintendo`='".$new_nintendo."',`biography`='".$new_biography."',"
        . "`favorite_game`='".$new_game."', `profile_pic`='".$new_pic."', `platform`='".$new_console."' WHERE id = '".$my_id."'";
echo $query_name;
echo "<br>";
$query_result = mysqli_query($conn, $query_name);

if ($query_result)
{
    // Caso a query tenha sido efetuada com sucesso, atualiza os dados da sessão
    $_SESSION["password"]           = $new_pass;
    $_SESSION["name"]               = $new_name;
    $_SESSION["sex"]                = $new_sex;
    $_SESSION["birthday"]           = $new_date;
    $_SESSION["psn"]                = $new_psn;
    $_SESSION["steam"]              = $new_steam;
    $_SESSION["xbox_live"]          = $new_live;
    $_SESSION["nintendo"]           = $new_nintendo;
    $_SESSION["biography"]          = $new_biography;
    $_SESSION["favorite_game"]      = $new_game;
    $_SESSION["platform"]           = $new_console;
    $_SESSION["profile_pic"]        = $new_pic;
    // Redireciona à pagina de perfil inicial
    header("location:../show_profile.php?user_id=" .$_SESSION["id"]. "");
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