<?php
 if( !isset( $_SESSION ) ) session_start();
if(empty($_SESSION['user'])){
    header('Location: ./login.php');
}
?>

<html>
 <head>
  <meta charset="utf-8">
  <title>Panel CMS</title>
  <meta charset="utf-8">
    <meta name="robots" content="noindex,nofollow" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
     
     <!-- JS STYLE AND BS -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="../css/style2.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
 </head>
 <body>
 <?php
 include "../settings/db_connect.php";
 $user=$_SESSION['user'];
 $password=$_SESSION['password'];
// Getting informations about user's account
$blogdata = mysqli_query($mysqli, "SELECT * FROM user WHERE password='$password' AND username='$user'");
$inforow = mysqli_fetch_array($blogdata);
$user_blog_id = $inforow['user_id'];
$_SESSION['user_blog_id']=$user_blog_id;
?>
<div class="wrapper">
    <?php include "sidebar.php"; ?>
    <div id="content">
     <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                
                <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                <i class="glyphicon glyphicon-align-left"></i>
                <span>Toggle Sidebar</span>
                </button>
            </div>
         </div>
      </nav> 
  <table class="table table-striped" style="margin-left:10px;">
   <tr>
     <th>ID Postu</th>
     <th>Tytuł</th>
     <th>Meta Description</th>
     <th>Obraz postu</th>
     <th>Data dodania</th>
     <th>Data modyfikacji</th>
   </tr>
<?php
$trash = '';

      //SELECT * FROM post JOIN user ON post.blog_id=user.user_id WHERE user.username='$user' AND user.password='$password' ORDER BY data_dodania
if ($sql =  $mysqli->prepare("SELECT * FROM post WHERE blog_id IN (SELECT user_id FROM user WHERE username='$user' AND password='$password') ORDER BY data_dodania"))
{
        $sql->execute();
        $sql->bind_result($post_id,$trash,$title,$description,$main,$img,$date,$mod_date);
        while ($sql->fetch())
        {?>
                <tr>
                        <td><?php echo $post_id;?></td>
                        <td><?php echo $title; ?></td>
                        <td><?php echo $description; ?></td>
                        <td><img style="margin-left:20px;" width="50" height= "50" src="../blog-post/<?php echo $img; ?>"></td>
                        <td><?php echo $date; ?></td>
                        <td><?php echo $mod_date; ?></td>
                        <td><a href="edit.php?post_id=<?php echo $post_id; ?>" class="btn btn-info">Edytuj</a></td>
                        <td><a href="delete_post.php?post_id=<?php echo $post_id; ?>" class="btn btn-danger" onclick="javascript:return confirm('Czy na pewno usunąć?'); ">Usuń</a></td>
                   </tr>
        <?php }
        $sql->close();
 }
else die( "Błąd w zapytaniu SQL! Sprawdź kod SQL w PhpMyAdmin. $user $password" );

 $mysqli->close();
?>
  </table>
  <a href="add_post.php" style="margin-left:10px;" class="btn btn-success">Dodawanie nowego</a>
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
 </body>
</html>