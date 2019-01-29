<?php
    if( !isset( $_SESSION ) ) session_start();
    $_SESSION['message']='';
    if(empty($_SESSION['user'])){
        header('Location: login.php');
    }
    include "../settings/db_connect.php";
        
    $user=$_SESSION['user'];
    $password=$_SESSION['password'];
    $data = mysqli_query($mysqli, "SELECT * FROM user WHERE password='$password' AND username='$user'");
    $row = mysqli_fetch_array($data);
    $about_short = $row['about_short'];
    $about_me = $row['about_me'];
    $about_blog = $row['about_blog'];

    if(isset($_POST['password_change'])){
        if(!empty($_POST['password']) && !empty($_POST['newpassword']) && !empty($_POST['confirmpassword'])) {
            if($password != md5($_POST['newpassword'])) {
                if($_POST['newpassword'] == $_POST['confirmpassword']) {
                    if(md5($_POST['password']) == $password) {
                        $newpassword=md5($_POST['newpassword']);
                        $sql = "UPDATE user SET password='$newpassword' WHERE password='$password' AND username='$user'";
                        if($mysqli->query($sql) === true){
                            $_SESSION['user']=$user;
                            $_SESSION['password']=$newpassword;
                            $_SESSION['loggedIn']=1;
                            $_SESSION['message'] = "Hasło: Hasło zostało zmienione!";
                        }
                        else{
                            $_SESSION['message'] = "Hasło: Coś poszło nie tak, spróbuj ponownie później.";
                        }
                        mysqli_close($mysqli); 
                    }
                    else {
                        $_SESSION['message'] = "Hasło: Błędne hasło!";
                    }
                }
                else{
                    $_SESSION['message'] = "Hasło: Potwierdź hasło ponownie";
                }
            }
            else{
                $_SESSION['message'] = "Hasło: Nowe hasło nie może być takie samo jak obecne";
            }
        }
        else{
            $_SESSION['message'] = "Hasło: Należy wypełnić wszystkie wmagane pola";
        }
    }

    if(isset($_POST['email_change'])){
        $email=$row['email'];
        if(!empty($_POST['password']) && !empty($_POST['newemail']) && !empty($_POST['confirmemail'])) {
            if($email != md5($_POST['newemail'])) {
                if($_POST['newemail'] == $_POST['confirmemail']) {
                    if(md5($_POST['password']) == $password) {
                        $newemail=$_POST['newemail'];
                        $sql = "UPDATE user SET email='$newemail' WHERE password='$password' AND username='$user'";
                        if($mysqli->query($sql) === true){
                            $_SESSION['message'] = "E-mail: email został zmieniony!";
                        }
                        else{
                            $_SESSION['message'] = "E-mail: Coś poszło nie tak, spróbuj ponownie później.";
                        }
                        mysqli_close($mysqli); 
                    }
                    else {
                        $_SESSION['message'] = "E-mail: Błędne hasło!";
                    }
                }
                else{
                    $_SESSION['message'] = "E-mail: Potwierdź email ponownie";
                }
            }
            else{
                $_SESSION['message'] = "E-mail: Nowy email nie może być taki sam jak obecny";
            }
        }
        else{
            $_SESSION['message'] = "E-mail: Należy wypełnić wszystkie wmagane pola";
        }
    }

    if(isset($_POST['avatar_change'])){
        $currentavatar = $row['avatar'];
        $avatar_path = $mysqli->real_escape_string('../images/avatars/'.$_FILES['avatar']['name']);
        if (preg_match("!image!", $_FILES['avatar']['type'])){
            if(copy($_FILES['avatar']['tmp_name'], $avatar_path)){
                $sql = "UPDATE user SET avatar='$avatar_path' WHERE password='$password' AND username='$user'";
                if($mysqli->query($sql) === true){
                    if($currentavatar != $avatar_path){
                        unlink($currentavatar);
                    }
                    $_SESSION['message'] = "Avatar: avatar został zmieniony!";
                }
                else{
                    $_SESSION['message'] = "Avatar: Coś poszło nie tak, spróbuj ponownie później.";
                }
                mysqli_close($mysqli); 
            }
            else{
                $_SESSION['message'] = "Avatar: Coś poszło nie tak, spróbuj ponownie później.";
            }
        }
        else{
            $_SESSION['message'] = "Avatar: Plik musi byc graficzny";
        }
    }

    if(isset($_POST['aboutshort_change'])){
        $newabout_short = $_POST['aboutshort'];
        if($about_short != $newabout_short){
            $sql = "UPDATE user SET about_short='$newabout_short' WHERE password='$password' AND username='$user'";
            if($mysqli->query($sql) === true){
                $_SESSION['message'] = "Krótko o mnie: Zmiany zostały zatwierdzone!";
                $about_short = $row['about_short'];
                header('Location: account_settings.php');
            }
            else{
                $_SESSION['message'] = "Krótko o mnie: Coś poszło nie tak, spróbuj ponownie później.";
            }
        }
        else{
            $_SESSION['message'] = "Krótko o mnie: Brak zmian";
        }
    }

    if(isset($_POST['aboutme_change'])){
        $newabout_me = $_POST['aboutme'];
        if($about_me != $newabout_me){
            $sql = "UPDATE user SET about_me='$newabout_me' WHERE password='$password' AND username='$user'";
            if($mysqli->query($sql) === true){
                $_SESSION['message'] = "O mnie: Zmiany zostały zatwierdzone!";
                $about_me = $row['about_me'];
                header('Location: account_settings.php');
            }
            else{
                $_SESSION['message'] = "O mnie: Coś poszło nie tak, spróbuj ponownie później.";
            }
        }
        else{
            $_SESSION['message'] = "O mnie: Brak zmian";
        }
    }

    if(isset($_POST['aboutblog_change'])){
        $newabout_blog = $_POST['aboutblog'];
        if($about_blog != $newabout_blog){
            $sql = "UPDATE user SET about_blog='$newabout_blog' WHERE password='$password' AND username='$user'";
            if($mysqli->query($sql) === true){
                $_SESSION['message'] = "Opis bloga: Zmiany zostały zatwierdzone!";
                $about_blog = $row['about_blog'];
                header('Location: account_settings.php');
            }
            else{
                $_SESSION['message'] = "Opis bloga: Coś poszło nie tak, spróbuj ponownie później.";
            }
        }
        else{
            $_SESSION['message'] = "Opis bloga: Brak zmian";
        }
    }

    if(isset($_POST['face_change'])){
        if(!empty($_POST['FB'])) {
            $face = $row['FB'];
            $newface = $_POST['FB'];
            if($face != $newface) {
                $sql = "UPDATE user SET FB='$newface' WHERE password='$password' AND username='$user'";
                if($mysqli->query($sql) === true){
                    $_SESSION['message'] = "Social media: Zmiany zostały zatwierdzone!";
                }
                else{
                    $_SESSION['message'] = "Social media: Coś poszło nie tak, spróbuj ponownie później.";
                }
            }
            else{
                $_SESSION['message'] = "Social media: Brak zmian";
            }
        }
    }
    if(isset($_POST['twit_change'])){
        if(!empty($_POST['TW'])) {
            $twit = $row['FB'];
            $newtwit = $_POST['TW'];
            if($twit != $newtwit) {
                $sql = "UPDATE user SET TW='$newtwit' WHERE password='$password' AND username='$user'";
                if($mysqli->query($sql) === true){
                    $_SESSION['message'] = "Social media: Zmiany zostały zatwierdzone!";
                }
                else{
                    $_SESSION['message'] = "Social media: Coś poszło nie tak, spróbuj ponownie później.";
                }
            }
            else{
                $_SESSION['message'] = "Social media: Brak zmian";
            }
        }
    }
?>