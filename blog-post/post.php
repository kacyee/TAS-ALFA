<?php if( !isset( $_SESSION ) ) session_start();
?>

<?php
include "../settings/db_connect.php";
$post = $_GET['post'];

if ($sql =  $mysqli->prepare("SELECT blog_id FROM post WHERE post_id =$post"))
{
        $sql->execute();
        $sql->bind_result($id_blog);
        while ($sql->fetch())
        {
        $blog_id=$id_blog;
        }
}
$sql->close();

?>


<html lang="pl-PL">
<head>
  <meta charset="utf-8">
  <title>Bloggero</title>
  <link rel="Shortcut icon" href="img/name-label.png" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  <link href="https://fonts.googleapis.com/css?family=Oswald:400,300,700|Lato:400,700" rel="stylesheet"> 
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
  <!-- ikony -->

</head>

<body>
	<div class="dropdown">
    <div id="menuwrap">
  <button class="btn btn-light dropdown-toggle btn-lg" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Menu
  </button> 
  <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
    <li><a href="blog.php?user_id=<?php echo $blog_id; ?>">Wróć do bloga</a></li>
    <li><a href="../admin-zone/">Panel Administratora</a></li>
    <li><a href="../index.php">Strona główna</a></li>
  </div>
</div>
</div>
	<div id="aboutdown">
  <section id="about" name="about"></section>
  

  <div id="aboutwrap">
  
    <div class="container">
	
      <div class="row">


<?php

//wyliczanie średniej dla posta
if ($sql =  $mysqli->prepare("SELECT ROUND(AVG(R1.rating),1) as averageRating  FROM rating R1 RIGHT JOIN (SELECT MAX(R2.timestamp) AS timestamp FROM rating R2 GROUP BY R2.username) R2 ON R1.timestamp=R2.timestamp WHERE post_id=$post"))
{							
						$sql->execute();
						$sql->bind_result($averageRating); 
						while ($sql->fetch()){}}
//ocena uzytkownika
if(!empty($_SESSION['user'])){ 
$user=$_SESSION['user']; 
if ($sql =  $mysqli->prepare("SELECT rating FROM rating WHERE post_id=$post AND username='$user'"))
{
						$sql->execute();
						$sql->bind_result($userRating); 
while ($sql->fetch()){}}		}				

$trash = '';
if ($sql =  $mysqli->prepare("SELECT * FROM post WHERE post_id =$post"))
{
        $sql->execute();
        $sql->bind_result($post_id,$trash,$title,$description,$main,$image,$date,$mod_date);
        while ($sql->fetch())
        { ?>
			<div class="col-lg-12 name foto2 cover foto1">
           
	
					<img class="align-text-bottom" src="<?php echo $image; ?>" alt="">
				
				
				<h1><?php echo $title; ?></h1>
			</div>	
			 
			 <div class="col-lg-12 name-desc">
			<h3><?php echo $description; ?></h3>
			</div>

			<div class="col-lg-12 name-desc">
			<post><?php echo $main; ?></post>
			<br>
		</div> 
		
			

	<?php		if(empty($_SESSION['user'])){   ?>

				        
					
					<div class="container">
			            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  name-desc">
							<h4><?php echo $date; ?></h4>
						</div><br><br>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12  name-desc">
                          
                             		
										<div class="rate2">
										<z>Średnia ocena: <?php echo $averageRating ?> </z>
										</div>
									
                                
                        
						</div>
					</div>
	<?php } 
else{
?> 
						
		<div id="particles-js">
            <div class="container">
				<form class="form" action="rating.php?post=<?php echo $post; ?>" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div class="row registerMain">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  name-desc">
							<h4><?php echo $date; ?></h4>
						</div><br><br>
						
						
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12  name-desc elementsOnRegisterMain">
                            <div class="form-group inputmain">
                             		<div class="form-group">
										<div class="rate">
										<z>Twoja ocena: <?php echo $userRating ?> </z> <br>
										

												
												<input type="submit" id="star5" name="rating" value=5 />
												<input type="submit" id="star4" name="rating" value=4 />
												<input type="submit" id="star3" name="rating" value=3 />
												<input type="submit" id="star2" name="rating" value=2 />
												<input type="submit" id="star1" name="rating" value=1 />
						
												<label for="star5" title="5 gwiazdek">5 stars</label>
												<label for="star4" title="4 gwiazdki">4 stars</label>
												<label for="star3" title="3 gwiazdki">3 stars</label>
												<label for="star2" title="2 gwiazdki">2 stars</label>
												<label for="star1" title="1 gwiazdka">1 star</label>
												
										
										</div><z>Średnia ocena: <?php echo $averageRating ?> </z> 
									</div><br>
                            </div>          
                        
						</div>

					</div>
				</form>
			 </div>
		</div>
						
						
						
						<?php ;} ?>

		
		
		
		
        <?php }
        $sql->close();
 }
else die( "Błąd w zapytaniu SQL! Sprawdź kod SQL w PhpMyAdmin." );
				
		

if ($sql =  $mysqli->prepare("SELECT comments.comment_id, comments.post_id, comments.username, comments.tekst, comments.data_dodania, comments.data_modyfikacji, user.user_id FROM comments LEFT JOIN user ON comments.username=user.username WHERE post_id =$post ORDER BY comment_id"))
{
        $sql->execute();
        $sql->bind_result($comment_id,$post_id,$username,$tekst,$data_dodania, $data_modyfikacji, $user_id); ?>
	       <div class="name-desc"> <h1>Komentarze</h1> </div>
        <?php while ($sql->fetch())
        { ?> 

				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 name-desc">
						<a href="../blog-post/blog.php?user_id=<?php echo $user_id; ?>"><po><?php echo $username; ?></po></a>
					 <h6><?php echo $tekst; ?></h6>
					<h5><?php echo $data_modyfikacji; ?></h5>
        </div>
        <?php }
        $sql->close();
        $mysqli->close();  
 } ?>
 
 
			<div class="name"> <h2> Dodaj komentarz:</h2> </div>


<?php
	
			if(empty($_SESSION['user'])){ ?>
			
			            <div class="container">
                <form class="form" action="../admin-zone/login.php?post=<?php echo $post; ?>" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div class="row registerFooter">
                        <div class="offset-3 col-6 offset-3 elementsOnRegisterFooter">
                            <div>
                              <input type="submit" value="Zaloguj się by komentować i oceniać wpisy" name="register" class="btn btn-block" />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
			<?php
			}
else{
?> 
            <div class="container">
                <form class="form" action="comment.php?post=<?php echo $post; ?>" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div class="row registerMain">
                        <div class="offset-3 col-6 offset-3 elementsOnRegisterMain">
                            <div class="form-group inputmain">
                             		<div class="form-group">
										<textarea class="form-control" rows="4" id="tekst" name="tekst" required></textarea>
									</div>
                            </div>          
                        </div>
                    </div>
                    <div class="row registerFooter">
                        <div class="offset-3 col-6 offset-3 elementsOnRegisterFooter">
                            <div>
                              <input type="submit" value="Dodaj" name="register" class="btn btn-block" />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
<?php ;} ?>
  </body>
</html>
