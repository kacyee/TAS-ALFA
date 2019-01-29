<html>
    <head>
        <title>Logowanie - Projekt blogowy</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <link rel="Shortcut icon" href="../blog-post/img/name-label.png"/>
        <link rel="stylesheet" href="../css/global.css">
        <link rel="stylesheet" href="../css/register.css" type="text/css">

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
                    <div class="row registerHeader">
                        <div class="offset-3 col-6 offset-3 elementsOnRegisterHeader">
                            <img class="avatar" src="../images/logo.png">
                            <h3>Rejestracja</h3>
                        </div>
                    </div>
                </header>
                <form class="form" action="registration.php" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div class="row registerMain">
                        <div class="offset-3 col-6 offset-3 elementsOnRegisterMain">
                            <div class="form-group inputmain">
                                <input class="form-control" type="text" name="username" required />
                                <label>Login</label>
                            </div>    
                            <div class="form-group inputmain">
                                <input class="form-control" type="email" name="email" required />
                                <label>E-mail</label>
                            </div>    
                            <div class="form-group inputmain">
                                <input class="form-control" type="password" name="password" autocomplete="new-password" required />
                                <label>Hasło</label>
                            </div>
                            <div class="form-group inputmain">
                                <input class="form-control" type="password" name="confirmpassword" autocomplete="new-password" required />
                                <label>Potwierdź Hasło</label>
                            </div>
                            <div class="form-group avatar">
                                <label>Wybierz swój avatar: </label>
                                <input type="file" name="avatar" accept="image/*" required />
                            </div>
                            <div class="form-group tologin">
                                <a href="../admin-zone/login.php">Mam już konto</a>
                            </div>
                        </div>
                    </div>
                    <div class="row registerFooter">
                        <div class="offset-3 col-6 offset-3 elementsOnRegisterFooter">
                            <div><br>
                                <input type="submit" value="Register" name="register" class="btn" />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
                
        <script src="../js/particles.js"></script>
        <script src="../js/app.js"></script>
        
        <script> 
            particlesJS.load('particles-js', '../js/particles.json', function() {
                console.log('callback - particles.js config loaded'); 
            });
        </script>
        
    </body>
</html>