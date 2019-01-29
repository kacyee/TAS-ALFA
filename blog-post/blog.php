<?php if( !isset( $_SESSION ) ) session_start();
$_SESSION['user_id']=$_GET['user_id'];
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

<?php include "menu.php" ?>

	
	<div id="aboutdown">
  <section id="about" name="about"></section>
  

  <div id="aboutwrap">
  
    <div class="container">
	
      <div class="row">
       


<?php
include "../settings/db_connect.php";
if(isset($_GET['user_id'])){
$user_id = $_GET['user_id'];
$checkIfExists = $mysqli->query("SELECT * FROM user WHERE user_id =$user_id");
if ($checkIfExists) { 
    if($checkIfExists->num_rows === 0)
    {
        include "404.php";
    }
    else
    {
if ($sql =  $mysqli->prepare("SELECT * FROM user WHERE user_id =$user_id "))
{
        $sql->execute();
        $sql->bind_result($user_id,$username,$email,$password,$avatar, $about_short, $about_me, $about_blog, $FB, $TW);
        while ($sql->fetch())
        { ?>
          <div class="col-lg-8 name-desc">
          <h2><?php echo $about_short; ?></h2>


          <div class="col-md-11">
            <p><?php echo $about_me; ?></p>
            <p><?php echo $about_blog; ?></p>
  
          </div>

        </div>
				
				
				
				<div class="col-lg-4 name foto cover foto1">
	       <img  src="<?php echo $avatar; ?>" class="align-text-bottom">
          <p><?php echo $username; ?></p>
		  
				<a href="https://www.facebook.com/<?php echo $FB; ?>">
				<div class="col-md-6">
		        <div class="fa fa-facebook-official" style="font-size:36px">
		
				<div class="ikona"> <i><p1> <?php echo $FB; ?> </p1></i> </div>
				</div> </div> </a> 
				
				
				<a href="https://twitter.com/<?php echo $TW; ?>">
				    <div class="col-md-6">
				    <div class="fa fa-twitter-square" style="font-size:36px">
				        <div class="ikona"><i><p1> <?php echo $TW; ?> </p1></i> </div>
				    </div> 
				    </div> 
                </a>
   
        </div>
      </div>
      <!-- /row -->
    </div>
    <!-- /container -->

  <!-- /aboutwrap -->
  
        <?php }
        $sql->close();
 }
else die( "Błąd w zapytaniu SQL! Sprawdź kod SQL w PhpMyAdmin." );



$trash = '';
if ($sql =  $mysqli->prepare("SELECT * FROM post WHERE blog_id=$user_id ORDER BY data_dodania DESC"))
{
  $checkIfHasPost = $mysqli->query("SELECT * FROM post WHERE blog_id=$user_id");
  if ($checkIfHasPost) { 
    if($checkIfHasPost->num_rows === 0)
    {?>
      <section id="post" name="post"></section>
      <div id="postwrap">
       <div class="container">
      <div class="row">
      <h2>Brak Postów</h2>
    <?php }
    else{?>
      <section id="post" name="post"></section>
      <div id="postwrap">
       <div class="container">
      <div class="row">
      <h2>Najnowsze Wpisy</h2>
       <?php $sql->execute();
        $sql->bind_result($post_id,$trash,$title,$description,$main,$image,$date,$mod_date);
        
        while ($sql->fetch())
        { ?>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 desc">

            <div class="project">
              <div class="photo-wrapper">
                <div class="name foto2 cover foto1 photo">
	
					<a href="post.php?post=<?php echo $post_id; ?>"><img class="img-responsive" src="<?php echo $image; ?>" alt="">
				  <div class="text-block"> 
					<p1><?php echo $date; ?></p1>
					</div>
                </div>
  
              </div>
            </div>	<h1> <?php echo $title; ?></h1></a>
        </div> 
        <?php }
      }
        $sql->close();
    }
 }
else die( "Błąd w zapytaniu SQL! Sprawdź kod SQL w PhpMyAdmin." );

 $mysqli->close();
}
}
}
else{
    include "404.php";
}
?>
  </body>
</html>
