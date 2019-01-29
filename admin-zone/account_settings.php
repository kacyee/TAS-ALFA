<?php
if( !isset( $_SESSION ) ) session_start();
if(empty($_SESSION['user'])){
    header('Location: login.php');
}
include "acc_settings.php";
?>
<html>
 <head>
    <meta charset="utf-8">
    <link rel="Shortcut icon" href="../blog-post/img/name-label.png"/>
    
    <!-- SEO FRIENDLY ZONE -->
    <title>Ustawienia Konta CMS - Bloggero</title>
    <meta name="robots" content="noindex,nofollow" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- END OF SEO FRIENDLY ZONE -->
    
    <!-- JS STYLE AND BS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/style2.css">

    <!-- BOOTSTRAP SCRIPT LOADER --> 
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>    
    <!-- END OF BOOTSTRAP SCRIPT LOADER --> 
 </head>
 <body>
    <div class="wrapper">
        <?php include "sidebar.php"; ?>
        <div id="content" class="container-fluid">
            <nav class="navbar navbar-default">
                <div class="flex-row">
                    <div class="navbar-header flex-column">
                        <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                        <i class="glyphicon glyphicon-align-left"></i>
                        <span>Toggle Sidebar</span>
                        </button>
                        <?php include "menu.php" ?>
                        <div id="aboutdown"></div>
                    </div>
                </div>
            </nav> 
            <div class="flex-row">
                <div class="info"> 
                    <span><?php echo $_SESSION['message']; ?></span>
                </div>
                <div class="flex-column">
                    <div class="tabs">
                        <button id="open" class="tabbutton" onclick="openTab(event, 'passwordrow')">Hasło</button>
                        <button class="tabbutton" onclick="openTab(event, 'mailrow')">E-mail</button>
                        <button class="tabbutton" onclick="openTab(event, 'avatarrow')">Avatar</button>
                        <button class="tabbutton" onclick="openTab(event, 'aboutshortrow')">Krótko o mnie</button>
                        <button class="tabbutton" onclick="openTab(event, 'aboutmerow')">O mnie</button>
                        <button class="tabbutton" onclick="openTab(event, 'aboutblogrow')">Opis bloga</button>
                        <button class="tabbutton" onclick="openTab(event, 'socialrow')">Social media</button>
                    </div>
                </div>
            </div>
            <div id="passwordrow" class="flex-row tabcontent">
                <div class="flex-column">
                    <form class="form" action="" method="POST">
                        <p>Zmiana hasła</p>
                        <div class="inputbox">
                            <input type="password" class="form-control" id="password" name="password" required />
                            <label>Hasło</label>
                        </div>
                        <div class="inputbox">
                            <input type="password" class="form-control" id="newpassword" name="newpassword" required />
                            <label>Nowe Hasło</label>
                        </div>
                        <div class="inputbox">
                            <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" required />
                            <label>Potwierdź Nowe Hasło</label>
                        </div>
                        <input type="submit" class="button" value="Zmień Hasło" name="password_change" />
                    </form>
                </div>
            </div>
            <div id="mailrow" class="flex-row tabcontent">
                <div class="flex-column">
                    <form class="form" action="" method="POST">
                        <p>Zmiana adresu e-mail</p>
                        <div class="inputbox">
                            <input type="password" class="form-control" id="password" name="password" required />
                            <label>Hasło</label>
                        </div>
                        <div class="inputbox">
                            <input type="email" class="form-control" id="newemail" name="newemail" required />
                            <label>E-mail</label>
                        </div>
                        <div class="inputbox">
                            <input type="email" class="form-control" id="confirmemail" name="confirmemail" required />
                            <label>Potwierdź e-mail</label>
                        </div>
                        <input type="submit" class="button" value="Zmień email" name="email_change" />
                    </form>
                </div>
            </div>
            <div id="avatarrow"  class="flex-row tabcontent">
                <div class="flex-column">
                    <form class="form" action="" method="POST" enctype="multipart/form-data">
                        <p>Zmiana avatara</p>
                        <label>Wybierz nowy avatar: </label>
                        <input class="avatarchange" type="file" name="avatar" accept="image/*" required />
                        <input type="submit" class="button" value="Zmień avatar" name="avatar_change"/>
                    </form>
                </div>
            </div>
            <div id="aboutshortrow" class="flex-row tabcontent">
                <div class="flex-column">
                    <form class="form" action="" method="POST">
                        <p>Krótko o mnie</p>
                        <textarea name="aboutshort" rows="10" cols="80"><?php echo $about_short; ?></textarea><br>

                        <input type="submit" class="button" value="Zatwierdź" name="aboutshort_change" />
                    </form>
                </div>
            </div>
            <div id="aboutmerow" class="flex-row tabcontent">
                <div class="flex-column">
                    <form class="form" action="" method="POST">
                        <p>O mnie</p>
                        <textarea name="aboutme" rows="10" cols="80"><?php echo $about_me; ?></textarea><br>
                        <input type="submit" class="button" value="Zatwierdź" name="aboutme_change" onClick="info()" />
                    </form>
                </div>
            </div>
            <div id="aboutblogrow" class="flex-row tabcontent">
                <div class="flex-column">
                    <form class="form" action="" method="POST">
                        <p>Opis Bloga</p>
                        <textarea name="aboutblog" maxlength="50" rows="10" cols="80"><?php echo $about_blog; ?></textarea><br>
                        <input type="submit" class="button" value="Zatwierdź" name="aboutblog_change" />
                    </form>
                </div>
            </div>
            <div id="socialrow" class="flex-row tabcontent">
                <div class="flex-column">
                    <form class="form" action="" method="POST">
                        <p>Social Media</p>
                        <div class="inputbox">
                            <input type="text" class="form-control" id="FB" name="FB" required />
                            <label>Facebook</label>
                        </div>
                        <input type="submit" class="button" value="Zatwierdź" name="face_change" />
                    </form>
                    <form class="form" action="" method="POST">
                        <div class="inputbox">
                            <input type="text" class="form-control" id="TW" name="TW" required />
                            <label>Twitter</label>
                        </div>
                        <input type="submit" class="button" value="Zatwierdź" name="twit_change" />
                    </form>
                </div>
            </div>
        </div>
    </div>
     <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
     
     <!-- Bootstrap Js CDN -->
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     
     <!-- jQuery Custom Scroller CDN -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
     
     <script type="text/javascript">
         $(document).ready(function () {
             $("#sidebar").mCustomScrollbar({
                 theme: "minimal"
             });
             
             $('#sidebarCollapse').on('click', function () {
                 $('#sidebar, #content').toggleClass('active');
                 $('.collapse.in').toggleClass('in');
                 $('a[aria-expanded=true]').attr('aria-expanded', 'false');
             });
             
             $('#dodajemy').click(function(){
                 $("#zawartosc").load('index.php');
             }); 
         });
     </script>
     <script>
        function openTab(event, contentID) {
            var tab = document.getElementsByClassName("tabcontent");
            for(var i=0; i<tab.length; i++) {
                tab[i].style.display = "none";
            }
            
            var btn = document.getElementsByClassName("tabbutton");
            for(var i=0; i<btn.length; i++) {
                btn[i].className = btn[i].className.replace(" active", "");
            }
            
            document.getElementById(contentID).style.display = "block";
            event.currentTarget.className += " active";
        }
        document.getElementById("open").click();
     </script> 
 </body>
</html>