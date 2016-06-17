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
               
                <?php
                    if($rows[10]){
                    echo "<div id='data'>
                            <div class='row' >
                                <div class='col-md-12'>
                                    <h3>Bio: </h3>
                                    <div id='dataBio'>
                                        " . $rows[10] . "
                                    </div>   
                                </div>
                            </div>";
                            }
                ?>
                <?php
                    if($rows[11]){
                        echo "<div class='row'>
                                <div class='col-md-12'>
                                    <h3>Game Preferido:</h3>
                                    <div id='dataBio'>
                                        " . $rows[11] . "
                                    </div>
                                </div>
                            </div>";
                        }
                ?>
            <?php
                if($rows[16]){
                        echo "<div class='row'>
                                <div class='col-md-12'>
                                    <h3>Plataforma Preferida:</h3>
                                    <div id='dataBio'>
                                         " . $rows[16] . "
                                    </div>
                                </div>
                            </div>";
                }
            ?>    
            <?php        
                    if($rows[7]){
                        echo "<div class='row'>
                                <div class='col-md-12'>
                                    <h3>Steam ID: </h3>
                                    <div id='dataBio'>
                                       " . $rows[7] . "
                                    </div>
                                </div >
                            </div>";
                    }
                ?>
                <?php
                    if($rows[6]){
                        echo "<div class='row'>
                                <div class='col-md-12'>
                                    <h3>PSN ID: </h3>
                                    <div id='dataBio'>
                                    " . $rows[6] . "
                                </div>
                            </div>
                        </div>";
                    }
                ?>
                <?php
                    if($rows[8]){
                        echo "<div class='row'>
                                <div class='col-md-12'>
                                    <h3>Xbox Live ID: </h3>
                                    <div id='dataBio'>
                                        " . $rows[8] . "
                                    </div>
                                </div >
                            </div>";
                    }
                ?>
                <?php
                    if($rows[9]){
                        echo "<div class='row'>
                                <div class='col-md-12'> 
                                    <h3>Nintendo Network ID: </h3>
                                    <div id='dataBio'>
                                        " . $rows[9] . "
                                    </div>
                                </div>
                            </div>
                        </div>";
                    }
                ?>
                </section>

            
        <!--Não coloque  nada abaixo disso-->
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>  
    </body>
</html>