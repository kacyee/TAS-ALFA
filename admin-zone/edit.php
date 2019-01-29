<?php
 if( !isset( $_SESSION ) ) session_start();
if(empty($_SESSION['user'])){
    header('Location: login.php');
}
else{
    $user=$_SESSION['user'];
}
?>
<html>
 <head>
  <meta charset="utf-8">
  <link rel="Shortcut icon" href="../blog-post/img/name-label.png"/>

  <!-- SEO FRIENDLY ZONE -->
  <title>Panel CMS</title>
  <meta charset="utf-8">
  <meta name="robots" content="noindex,nofollow" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- END OF SEO FRIENDLY ZONE -->

    <!-- CSS LOADER --> 
	<link rel="stylesheet" href="css/samples.css">
	<link rel="stylesheet" href="toolbarconfigurator/lib/codemirror/neo.css">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- END OF CSS LOADER -->

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
            <div class="flex-column">
                <form class="form" method="post" action="update_post.php">
                    <div class="addPostForm">
                        <?php
                        include "../settings/db_connect.php";
                        $post_id = $_GET['post_id'];
                        $_SESSION['post_id']=$post_id;
                        if ( $sql = $mysqli->prepare( "SELECT tytul,opis,tekst FROM post WHERE post_id= ?;"))
                        {
                            $sql->bind_param("i" ,$post_id);
                            $sql->execute();
                            $sql->bind_result($title,$meta_desc,$text);
                            if (!$sql->fetch())  die("Blad!!! Brak rekordu do edycji w bazie!!! Liczba rekodow:".$sql->num_rows);
                        ?>
                        <p>Tytuł posta:</p>
                            <input type="text" class="form-control" name="title" size="120" value='<?php echo $title;?>'>
                        <p>Meta opis</p>
                            <input type="text" class="form-control" name="meta_desc" size="120" value='<?php echo $meta_desc; ?>'>
                        <p>Treść posta</p>
                            <textarea name="post_text" id="editor1" rows="10" cols="80"><?php echo $text; ?></textarea>
                        <input type="submit" class="btn btn-success" value="Edytuj Post">
                        <?php 
                        $sql->close();
                        }
                        $mysqli->close();
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
         
    <!-- SCRIPTS LOADER -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="ckeditor/ckeditor.js"></script>
	<script src="js/sample.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <!-- Bootstrap Js CDN -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- CKEDITOR REPLACE -->
    <script>
    CKEDITOR.replace('editor1');</script>
    <!-- Toggle sidebar -->
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
     <!-- END OF SCRIPTS LOADER --> 
 </body>
</html>