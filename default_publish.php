<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="_bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="_css/publish_default.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

        <!--Não adicione nada antes disso-->
        
    </head>
    <body>
        
        <div class="col-lg-12"id="publish">
            <form action="./_method/new_post.php" method="POST">
                <div class="form-group">
                    <textarea class="form-control" rows="4"name="comment" id="comment" placeholder="O que você está jogando agora?"></textarea>  
                    <div class="input-group-btn pull-left" >
                            <button class="btn btn-primary" type="submit"><i class="fa fa-gamepad fa-lg"></i></i></i></button>
                            <button class="btn btn-primary" type="submit"><i class="fa fa-picture-o fa-lg"></i></button>
                            <button class="btn btn-primary" type="submit"><i class="fa fa-video-camera fa-lg"></i></button>
                        </div>
                    <p>
                    <input type="hidden" name="where" value="<?php if (!empty($_GET['user_id'])){echo $user_id;}else{echo "-1";}?>"/>          
                    <button class="btn-primary pull-right" type="submit">Publicar</button></p>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
       
        
        <!--Não coloque  nada abaixo disso-->
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="_bootstrap/js/bootstrap.min.js"></script> 
    </body>
</html>
