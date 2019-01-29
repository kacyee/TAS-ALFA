<?php if( !isset( $_SESSION ) ) session_start();
?>
<!DOCTYPE html>
<html lang="pl">
    <head>
        <title>Projekt blogowy</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <!-- bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        
        <link rel="stylesheet" href="css/global.css">
        <link href="blog-post/css/style.css" rel="stylesheet">
        <!-- bootstrap js -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        
    </head>
    
    <body class="body">
	<?php
include "settings/db_connect.php";?>
        <header>
        <div class="navHeader">
            <img src="./images/artist-camera-dslr-22185.jpg" alt="Bloggero - najlepszy serwis blogowy!">
        </div>
            <div class="row elementsOnHeader">
 				<div class="col-md-2 login">
                    <?php 	if(empty($_SESSION['user'])){ ?> <a href="admin-zone/login.php" class="button" role="button">Zarządzaj blogiem</a><?php } 
							else {  $user=$_SESSION['user'];  ?>
									<a href="admin-zone/index.php" class="button" role="button">Zarządzaj blogiem</a> <?php }	 ?>
                </div>
                <div class="col-md-4 register"r>
                    <h1>Centrum Blogów</h1>
                    <a href="register/index.php" class="button" role="button">Zacznij swą blogową przygodę</a>
                </div>

            </div>
        </header>
          
                <div class="col-md-12 col-lg-12 "><h2>Najnowsze wpisy:</h2></div>
          <div id="postwrap">
    <div class="container">
      <div class="row">      
<?php $trash = '';
if ($sql =  $mysqli->prepare("SELECT * FROM post ORDER BY data_dodania DESC"))
{
        $sql->execute();
        $sql->bind_result($post_id,$trash,$title,$description,$main,$image,$date,$mod_date);
        while ($sql->fetch())
        { ?>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 desc">

            <div class="project">
              <div class="photo-wrapper">
                <div class="name foto2 cover foto1 photo">
	
					<a href="blog-post/post.php?post=<?php echo $post_id; ?>"><img class="img-responsive" src="blog-post/<?php echo $image; ?>" alt="">
				  <div class="text-block"> 
					<p1><?php echo $date; ?></p1>
					</div>
                </div>
  
              </div>
            </div>	<h1> <?php echo $title; ?></h1></a>
        </div> 
        <?php }
        $sql->close();
 } 
else die( "Błąd w zapytaniu SQL! Sprawdź kod SQL w PhpMyAdmin." );?>
            </div> </div> </div>
            <div class="row footer">
                <div class="col-md-12">
                    <p>Grupa Alfa 2018</p>
                </div>
            </div>
        </div>
    </body>
    
</html>