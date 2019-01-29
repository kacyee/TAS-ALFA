<?php if( !isset( $_SESSION ) ) session_start();
include "../settings/db_connect.php";
$_SESSION['message'] = '';
$post=$_GET['post'];
$user=$_SESSION['user']; 
if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $rating = $mysqli->real_escape_string($_POST['rating']);
                $_SESSION['rating'] = $rating;
                $sql = "INSERT INTO rating (post_id, username, rating)"
                        . "Values ($post, '$user', $rating)";
                
                if($mysqli->query($sql) === true){
                    $_SESSION['message'] = "Dodanie oceny się powiodło!";
                    header("location:post.php?post=$post");
                }
                else{
                    $_SESSION['message'] = "Nie udało się dodać ooceny!";
                }
            }
           



?>