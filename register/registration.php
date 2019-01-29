<?php
include "../settings/db_connect.php";
$_SESSION['message'] = '';
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if ($_POST['password'] == $_POST['confirmpassword']){
        $username = $mysqli->real_escape_string($_POST['username']);
        $email = $mysqli->real_escape_string($_POST['email']);
        $password = md5($_POST['password']);
        $avatar_path = $mysqli->real_escape_string('../images/avatars/'.$_FILES['avatar']['name']);
        $checkUser = $mysqli->query("SELECT * FROM user WHERE username='$username'");
        if ($checkUser->num_rows === 1){
            $_SESSION['message'] = "Użytkownik o tej nazwie już istnieje";
        }
        else{
        if (preg_match("!image!", $_FILES['avatar']['type'])){
            if(copy($_FILES['avatar']['tmp_name'], $avatar_path)){
                $_SESSION['username'] = $username;
                $_SESSION['avatar'] = $avatar_path;
                

                $sql = "INSERT INTO user (username,email,password,avatar)"
                        . "Values ('$username','$email','$password','$avatar_path')";
                
                if($mysqli->query($sql) === true){
                    $_SESSION['message'] = "Rejestracja się powiodła!";
                    header("location: ../admin-zone/");
                }
                else{
                    $_SESSION['message'] = "Nie udało się dodać użytkownika!";
                }
            }
            else{
                $_SESION['message'] = "Nie udało się dodać pliku!";            
            }
        }
        else{
            $_SESSION['message'] = "Dostępne typy plików to JPG, PNG, GIF";
        }
    }
}
    else{
        $_SESSION['message'] = "Hasła nie są identyczne!";
    }
}
echo $_SESSION['message'];

?>
<p></p>
<a href="index.php">Powrót do rejestracji </a>