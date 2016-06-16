<?php
/* Autores: Nixon Silva e Will Saymon
 * Data: 19/05/2016
 * Função: Código referente à pagina de edição de perfil
 */

/* TODO: Escrever rotina de redefinição de senha
 * 
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
 
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="_bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="_css/edit_profile.css">
        
        <!--Não adicione nada antes disso-->

        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script>$(function ()
            {
                $("#datepicker").datepicker();
            });
        </script>
        <meta charset="utf-8">
        <title>Editar Perfil</title>
    </head>
    <body>

        <header>
            <?php
                $var_name = $_SESSION["name"];
                include("default_header.php");
            ?>
        </header>
        <section class="container-fluid" id="page-content">
            <div class="row" >
                <div class="col-lg-12" id="title">
                    <h1><i class="fa fa-pencil fa-lg"></i>Editar Perfil</h1>
                </div>

            </div>
            <div class="row" id="Editaveis">
                <form enctype="multipart/form-data" role="form" method="POST" action="./_method/edit_user.php">
                <div class="col-lg-4 col-lg-offset-1  form-group">
                    <img class="resposive" id="picEditProfile" 
                        <?php
                        if(isset($rows)){
                            if($rows[14])
                                echo "src = '".$rows[14]."'";
                            else    
                                echo "src = 'http://tedxnashville.com/wp-content/uploads/2015/11/profile.png'";
                        }
                        else if($_SESSION["profile_pic"])
                                echo "src = '".$_SESSION["profile_pic"]."'";
                        else    
                            echo "src = 'http://tedxnashville.com/wp-content/uploads/2015/11/profile.png'";
                    ?>>
                    <p><b>Selecione uma imagem:</b> <input name="arquivo" type="file" /></p>
                    <label for="Name">Nome:</label>
                    <input class="form-control" id="Name" type="text" name="new_name" value="<?php echo $_SESSION["name"] ?>">
                    <label for="sex">Sexo:</label>
                    
                    <select class="form-control" name="sex" id="sex">
                            <option value="male">Masculino</option>
                            <option value="female">Feminino</option>
                            <option value="other">Outro</option>
                        </select>
                    <label for="datepicker">Data de Nascimento:</label> 
                    <input class="form-control" type="text" id="datepicker" name="new_date" value="<?php echo $_SESSION["birthday"] ?>">
                    <label for="email">E-mail:</label>
                    <input class="form-control" id="email" type="email" name="dummy_email" value="<?php echo $_SESSION["email"]; ?>" readonly>
                    <label for="senha">Senha:</label>
                    <input class="form-control" id="senha" type="password" name="dummy_pass_1" value="">
                    <label for="senha">Confirmar Senha:</label>
                    <input class="form-control" id="senha" type="password" name="dummy_pass_2" value="">
                </div>
                <div class="col-lg-4 col-lg-offset-1">
                    <label for="bio">Biografia:</label>
                    <textarea class="form-control" id="bio" rows="5" name="new_biography"><?php echo $_SESSION["biography"] ?></textarea></p>
                    <label for="favoGame">Jogo Preferida:</label>
                    <input class="form-control" type="text" id="favoGame" name="new_game" value="<?php echo $_SESSION["favorite_game"] ?>"></p> 
                    <label for="favoPlat">Plataforma Preferida:</label>
                    <input class="form-control" type="text" id="favoPlat" name="new_console" value="<?php echo $_SESSION["platform"] ?>"></p>
                    <label for="psn">PSN:</label>
                    <input class="form-control" type="text" id="psn" name="new_psn" value="<?php echo $_SESSION["psn"] ?>"></p>
                    <label for="steam">Steam:</label>
                    <input class="form-control" type="text" name="new_steam" id="steam" value="<?php echo $_SESSION["steam"] ?>"></p>
                    <label for="live">Xbox Live:</label>
                    <input class="form-control" type="text" name="new_live" id="live" value="<?php echo $_SESSION["xbox_live"] ?>"></p>
                    <label for="nintendo">Nintendo ID:</label>
                    <input class="form-control" type="text" name="new_nintendo" id="nintendo" value="<?php echo $_SESSION["nintendo"] ?>"></p>
                    
                </div>
                    <div class="col-lg-12">
                        <h3>Coloque sua senha para salvar as mudanças</h3>
                        <label for="Password">Senha:</label>
                    <input class="form-control" id="Password" type="password" name="curr_password" >
                        <p><button class="btn btn-primary" type="submit">Salvar</button></p>
                    </div>
                </form>
  
            </div>
        </section>
    </body>
</html>