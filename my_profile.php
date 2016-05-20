<<<<<<< HEAD
<!--Página Meu Perfil-->




<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="_css/my_profile.css">
	<meta charset="utf-8">
	<title>Meu Perfil</title>
</head>
<body>
	<header>
		<div id="profilePic">
			<img src="http://tedxnashville.com/wp-content/uploads/2015/11/profile.png"/>
			<p>Nome</p>
		</div>
		
		<div id= "navBar">
			<form class = "search" action="#" method="POST">
			 <input type="" name="" placeholder=" Pesquisar">
			</form>
			<ul>
				<li> 
					<div>
						<a href="#">Página Inicial</a>
					</div>
				</li>
				<li> 
					<div>
						<a href="#">Meu Perfil</a>
					</div>
				</li>
				<li> 
					<div>
						<a href="#">Screenshots</a>
					</div>
				</li>
				<li> 
					<div>
						<a href="#">Gameplays</a>
					</div>
				</li>
				<li> 
					<div>
						<a href="#">Game List</a>
					</div>
				</li>
				<li> 
					<div>
						<a href="#">Guildas</a>
					</div>
				</li>
				<li> 
					<div>
						<a href="#">Amigos</a>
					</div>
				</li>
			</ul>			
		</div>
	</header>
		<section id = "profileBody">
		<div id="left">
			<section id="aboutMe">
				<p><a href="edit_profile.php">Editar Perfil</a></p>
				<div >
					<h3>Bio: </h3>
					<div id="Bio">
						
					</div>
				</div>
				<div>
					<h3>Game Preferido:</h3>
					<div id="favoGame">
						
					</div>
				</div>
				<div>
					<h3>Plataforma Preferida:</h3>
					<div id="favoPlat">
						
					</div>
				</div>
				<div>
					<h3>Steam ID: </h3>
					<div id="steamId">
						
					</div>
				</div>
				<div>
					<h3>PSN ID: </h3>
					<div id="psnId">
						
					</div>
				</div>
				<div>
					<h3>Xbox Live ID: </h3>
					<div id="xboxLive">
						
					</div>
				</div>
				<div>
					<h3>Nintendo Network ID: </h3>
					<div id="nintendoNetworkID">
						
					</div>
				</div>
			</section>
		</div>
		<section id="content">
			<div id = "timeLine">
				
=======
<?php
/* Autores: Nixon Silva e Will Saymon
 * Data: 19/05/2016
 * Função: Código de tratamento básico para páginas de exibição de perfil do usuário
 * logado.
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

<!--Página Meu Perfil-->
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="_css/my_profile.css">
        <meta charset="utf-8">
        <title>Meu Perfil</title>
    </head>
    <body>
        <header>
            <div id="profilePic">
                <img src="http://tedxnashville.com/wp-content/uploads/2015/11/profile.png"/>
                <p><?php 
                    echo $_SESSION["name"];
                ?></p>
            </div>

            <div id= "navBar">
                <form class = "search" action="search_profile.php" method="POST">
                    <input type="text" name="value" placeholder=" Pesquisar">
                </form>
                <ul>
                    <li> 
                        <div>
                            <a href="#">Página Inicial</a>
                        </div>
                    </li>
                    <li> 
                        <div>
                            <a href="#">Meu Perfil</a>
                        </div>
                    </li>
                    <li> 
                        <div>
                            <a href="#">Screenshots</a>
                        </div>
                    </li>
                    <li> 
                        <div>
                            <a href="#">Gameplays</a>
                        </div>
                    </li>
                    <li> 
                        <div>
                            <a href="#">Game List</a>
                        </div>
                    </li>
                    <li> 
                        <div>
                            <a href="#">Guildas</a>
                        </div>
                    </li>
                    <li> 
                        <div>
                            <a href="#">Amigos</a>
                        </div>
                    </li>
                </ul>			
            </div>
        </header>
        <section id = "profileBody">
            <div id="left">
                <section id="aboutMe">
                    <p><a href="edit_profile.php">Editar Perfil</a></p>
                    <div >
                        <h3>Bio: </h3>
                        <div id="Bio">

                        </div>
                    </div>
                    <div>
                        <h3>Game Preferido:</h3>
                        <div id="favoGame">

                        </div>
                    </div>
                    <div>
                        <h3>Plataforma Preferida:</h3>
                        <div id="favoPlat">

                        </div>
                    </div>
                    <div>
                        <h3>Steam ID: </h3>
                        <div id="steamId">

                        </div>
                    </div>
                    <div>
                        <h3>PSN ID: </h3>
                        <div id="psnId">

                        </div>
                    </div>
                    <div>
                        <h3>Xbox Live ID: </h3>
                        <div id="xboxLive">

                        </div>
                    </div>
                    <div>
                        <h3>Nintendo Network ID: </h3>
                        <div id="nintendoNetworkID">

                        </div>
                    </div>
                </section>
            </div>
            <section id="content">
                <div>
                    <form action="./_method/new_post.php" method="POST">
                    <p>
                    <textarea name="comment" id="comment" maxlenght=256 >Compartilhe-nos sua jogatina!</textarea><br>
                    <p><button type="submit">Enviar</button><p>
                    </form>
                </div>
                <div id = "timeLine">
                    <?php
                        include './_method/mysql_connect.php';
                        $result = mysqli_query($conn, "SELECT * FROM `posts` WHERE `user_id` = '".$_SESSION["id"]."'  ORDER BY  `time` DESC");
                        // Imprime os dez resultados de forma decrescente
                        $i = 0;
                        while ($rows = mysqli_fetch_row ($result) and $i < 10)
                        {
                            $content = $rows[2];
                            $timestamp = $rows[3];
                            echo "<p>";
                            echo $timestamp . "<br>";
                            echo "</p>";
                            echo "<p>"; 
                            echo $content . "<br>";
                            echo "</p>";
                            $i++;
                        }
                        // Encerra conexão após a query
                        mysqli_close ($conn);
                    ?>
                </div>
>>>>>>> origin/php_integration_v03

            </section>

        </section>


    </body>
</html>