<?php
if( !isset( $_SESSION ) ) session_start();
$error='';
if(isset($_POST['submitas'])){
    if(empty($_POST['user']) || empty($_POST['password'])){
        $error='Login lub hasło jest nieprawidłowe!';
    }
    else{
        $user=$_POST['user'];
        $password=md5($_POST['password']);
        include "../settings/db_connect.php";
        $query = mysqli_query($mysqli, "SELECT * FROM user WHERE password='$password' AND username='$user'"); 
        $rows = mysqli_num_rows($query);
        if($rows == 1){
            $_SESSION['user']=$user;
            $_SESSION['password']=$password;
            $_SESSION['loggedIn']=1;
            if (isset($_SESSION['post'])) {
                $post = $_SESSION['post'];
                header("Location: ../blog-post/post.php?post=$post");
            }
            else {
                header("Location: index.php");
            }
        }
        else{
            $error="Login lub hasło są nieprawidłowe!";
        }
        mysqli_close($mysqli);      
    }
}
?>