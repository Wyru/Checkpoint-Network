<?php


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
        $destino = '../_imagens/profile_cover/' . $novoNome;
 
        // tenta mover o arquivo para o destino
        if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
            
            $new_cover = '_imagens/profile_pic/' . $novoNome;
            echo "<script>     
                alert('Arquivo salvo com sucesso em : $new_cover'); 
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
else{
    $new_cover = $_SESSION["profile_pic"];

}

?>