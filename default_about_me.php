

<!--Página Meu Perfil-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="_bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="_css/default_about_me.css">
        <!--Não adicione nada antes disso-->

    </head>
    <body>
            
        <section class="col-md-12" id="aboutMe">
                    <div id="data">
                        <div class="row" >
                            <div class="col-md-12">
                                <h3>Bio: </h3>
                                <div id="Bio">
                                    <?php echo $rows[10]; ?>
                                </div>   
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Game Preferido:</h3>
                                <div id="favoGame">
                                    <?php echo $rows[11]; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Plataforma Preferida:</h3>
                                <div id="favoPlat">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Steam ID: </h3>
                                <div id="steamId">
                                    <?php echo $rows[7]; ?>
                                </div>
                            </div >
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h3>PSN ID: </h3>
                                <div id="psnId">
                                    <?php echo $rows[6]; ?>
                                </div>
                            </div >
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Xbox Live ID: </h3>
                                <div id="xboxLive">
                                    <?php echo $rows[8]; ?>
                                </div>
                            </div >
                        </div>
                        <div class="row">
                            <div class="col-md-12"> 
                                <h3>Nintendo Network ID: </h3>
                                <div id="nintendoNetworkID">
                                    <?php echo $rows[9]; ?>
                                </div>
                            </div >
                        </div >
                    </div>
                </section>

            
        <!--Não coloque  nada abaixo disso-->
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>  
    </body>
</html>