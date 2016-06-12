<!DOCTYPE html>
<!--
Autor: Will Saymon e Nixon Moreira Silva
Data de Criação: 28/05/2016
Data de Alteração: 09/06/2016
Descrição: Tela em que será mostrado todos as mensagens recebidas e enviadas pelo jogador parte.
-->
<?php
// Inicia sessão
session_start ();
                     
// Verifica se a variável de login está ativada
if (!$_SESSION["login_status"])
{
    // Envia para a página de login caso não esteja	
    header("location:index.html");
    exit;
}

?>

<html>
    <head>   
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="_bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="_css/messages.css">
        <!--Não adicione nada antes disso-->
        
    </head>
    <body>
        <header>
           <?php
                $var_name = $_SESSION["name"];
                include("default_header.php");
            ?>
        </header>
        <!-- Temporário -->
        <div style = 'padding-left:200px;' >
            <?php 
                // Lista os amigos do usuário
                include './_method/mysql_connect.php';
                $query_name_friends = "SELECT * FROM `friends` WHERE `user_id` = '" . $_SESSION["id"] . "'  ORDER BY  `friend_id`";
                $query_friends = mysqli_query ($conn, $query_name_friends);
                // Print the friend (one row) until there are no more valid results
                while ($friends_row = mysqli_fetch_row ($query_friends))
                {
                    $query_name_users = "SELECT * FROM `users` WHERE `id` = '" . $friends_row[2] . "'";
                    $query_users = mysqli_query ($conn, $query_name_users);
                    $users_row = mysqli_fetch_row ($query_users);
                    echo "<a href = messages.php?receiver=" . $friends_row[2] . ">" . $users_row[1] . "</a><br>";
                }
            ?>
        </div>
        <div style = 'padding-left: 600px;' >
            <?php
            
            // Após escolher um receptor
            $receiver = $_GET['receiver'];
            $receiver = stripslashes ($receiver);
            $receiver = mysql_real_escape_string ($receiver);
            // Consulta das mensagens para o tal receptor    
            $query_name_msg = "SELECT * FROM `message` WHERE (`sender` = '" .$_SESSION["id"]. "' AND `receiver` = '" .$receiver. "') OR (`sender` = '" .$receiver. "' AND `receiver` = '" .$_SESSION["id"]. "')";
            $query_msg = mysqli_query ($conn, $query_name_msg);
            // Consulta do nome do receptor
            $query_name_users_2 = "SELECT * FROM `users` WHERE `id` = '" . $receiver . "'";
            $query_users_2 = mysqli_query ($conn, $query_name_users_2);
            // Get the name of the user of this conversation
            $users_2_rows = mysqli_fetch_row ($query_users_2);
            $receiver_name = $users_2_rows[1];
            $i = 0;
            // Lista as mensagens do usuário
            if ($query_msg)
            {
                while ($message_rows = mysqli_fetch_row ($query_msg) and $i < 25)
                {
                    if ($message_rows[1] == $_SESSION["id"])
                    {
                        // Enviado pelo usuário da sessão
                        echo $_SESSION["name"] . ":<br>"; 
                        echo $message_rows[3] . "<br>";
                    }
                    else
                    {
                        // Enviado pelo outro usuário
                        echo $receiver_name . ":<br>";
                        echo $message_rows[3] . "<br>";
                    }
                    $i ++;
                }    
            }
            else
            {
                // Caso eles não possuírem mensagens
                echo "Vocês não possuem mensagens!<br>";
            }
            echo "<br>";
            ?>
        </div>
        <div style = 'padding-left: 600px;'>
            <form action="./_method/send_message.php" method="POST">
                    <textarea class="form-control" rows="4" name="message" id="comment" placeholder="Envie uma mensagem para <?php echo $receiver_name ?>"></textarea>  
                    <input type="hidden" name="receiver" value = "<?php echo $receiver; ?>"> 
                    <br>
                    <p><button class="btn-primary pull-left" type="submit">Enviar</button></p>
            </form>
        </div>
        <!--Não coloque  nada abaixo disso-->
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>   
    </body>
</html>
