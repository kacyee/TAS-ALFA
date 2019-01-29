<?php 
    include "logincheck.php"; 

    if(isset($_GET['post'])) {
        if( !isset( $_SESSION ) ) session_start();
        $_SESSION['post'] = $_GET['post'];
    }
?>
<html>
    <head>
        <title>Logowanie - Projekt blogowy</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <link rel="Shortcut icon" href="../blog-post/img/name-label.png"/>
        <link rel="stylesheet" href="../css/global.css"/>
        <link rel="stylesheet" href="../css/login.css" type="text/css"/>
        
        <!-- bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        
        <!-- bootstrap js -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>    
		

		
    </head>
    <body>
        <div id="particles-js"></div>
            <div class="container">
                <header>
                    <div class="row loginHeader">
                        <div class="offset-3 col-6 offset-3 elementsOnLoginHeader">
                            <img class="avatar" src="../images/logo.png">
                            <h3 class="d-md-inline-flex">Logowanie</h3>
                        </div>
                    </div>
                </header>
                <form action="" method="POST">
                    <div class="row loginMain">
                        <div class="offset-3 col-6 offset-3 elementsOnLoginMain">
                            <div class="form-group inputmain">
                                <input type="text" class="form-control" id="user" name="user" required>
                                <label>Login</label>
                            </div>
                            <div class="form-group inputmain">
                                <input type="password" class="form-control" id="password" name="password" required>
                                <label>Hasło</label>
                            </div>
                            <div class="checkbox">
                                <label class="box">Zapamiętaj
                                    <input type="checkbox"> 
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="form-group toregister">
                                <a href="../register">Nie mam konta</a>
                            </div>
                        </div>
                    </div>
                    <div class="row loginFooter">
                        <div class="offset-3 col-6 offset-3 elementsOnLoginFooter">
                            <span><?php echo $error; ?></span>
                            <div class="form-group"><br>
                                <input type="submit" class="btn" value="Login" name="submitas" />
                            </div>
                        </div>
                    </div>
                </form>  
            </div>
		
        <script src="../js/particles.js"></script>
        <script src="../js/app.js"></script>
        
        <script> 
            particlesJS.load('particles-js', '../js/particles.json', function() {
			console.log('callback - particles.js config loaded'); });
        </script>
        
    </body>
</html>