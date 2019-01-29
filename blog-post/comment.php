<?php if( !isset( $_SESSION ) ) session_start();
include "../settings/db_connect.php";
$_SESSION['message'] = '';
$post=$_GET['post'];
$user=$_SESSION['user']; 
if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $tekst = $mysqli->real_escape_string($_POST['tekst']);
                $_SESSION['tekst'] = $tekst;
                $sql = "INSERT INTO comments (post_id, username, tekst)"
                        . "Values ('$post' , '$user' , '$tekst')";				
                if($mysqli->query($sql) === true){
                    $_SESSION['message'] = "Dodanie komentarza się powiodło!";
                    header("location:post.php?post=$post");
                }
                else{
                    $_SESSION['message'] = "Nie udało się dodać komentarza!";
                }
            }
           



?>