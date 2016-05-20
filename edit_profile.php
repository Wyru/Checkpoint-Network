<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="_css/edit_profile.css">
	<meta charset="utf-8">
	<title>Editar Perfil</title>
</head>
<body>
	<header>
            <div id="profilePic">
                <img src="http://tedxnashville.com/wp-content/uploads/2015/11/profile.png"/>
                <p><?php echo $_SESSION["name"]; ?></p>
            </div>

            <div id= "navBar">
                <form class = "search" action="search_profile.php" method="POST">
                    <input type="text" name="value" placeholder=" Pesquisar">
                </form>
                <ul>
                    <li> 
                        <div>
                            <a href="home.php"><img src="_imagens/_icones/home.png">Página Inicial</a>
                        </div>
                    </li>
                    <li> 
                        <div>
                            <a href="my_profile.php"><img src="_imagens/_icones/profile.png">Meu Perfil</a>
                        </div>
                    </li>
                    <li> 
                        <div>
                            <a href="my_photos.php"><img src="_imagens/_icones/screenshots.png">Screenshots</a>
                        </div>
                    </li>
                    <li> 
                        <div>
                            <a href="my_videos"><img src="_imagens/_icones/gamePlay.png">Gameplays</a>
                        </div>
                    </li>
                    <li> 
                        <div>
                            <a href="my_games"><img src="_imagens/_icones/games.png">Game List</a>
                        </div>
                    </li>
                    <li> 
                        <div>
                            <a href="my_groups"><img src="_imagens/_icones/guilds.png">Guildas</a>
                        </div>
                    </li>
                    <li> 
                        <div>
                            <a href="my_friends"><img src="_imagens/_icones/friends.png">Amigos</a>
                        </div>
                    </li>
                </ul>			
            </div>
        </header>
        
	<section id="editables">
		<div id = "profile">
			<h1>Perfil</h1>
			<div id="profilePhoto">
				
			</div>
			<div id="name">
				
			</div>
			<div id="bio">
				
			</div>
			<div id="favoGame">
						
			</div>
			<div id="favoPlat">
						
			</div>
			<div id="steamId">
						
			</div>
			<div id="psnId">
						
			</div>
			<div id="xboxLive">
						
			</div>
			<div id="nintendoNetworkID">
						
			</div>
		</div>
		<div id="account">
			<h1>Conta</h1>
			<div id="email">
						
			</div>
			<div id="password">
						
			</div>
			<div id="sex">
						
			</div>
			<div id="birthday">
						
			</div>
			
			
		</div>

	</section>

</body>
</html>