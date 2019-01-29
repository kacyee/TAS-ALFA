<?php
if( !isset( $_SESSION ) ) session_start();
include "../settings/db_connect.php";
$title = $_POST["title"];
$meta_desc = $_POST["meta_desc"];
$text = $_POST["post_text"];
$userlogin=$_SESSION['user'];
$avatar_path = $mysqli->real_escape_string('../blog-post/img/post/'.$_FILES['avatar']['name']);
$query="SELECT user_id FROM user WHERE username='$userlogin'";
if ($result=mysqli_query($mysqli,$query)){
    while ($row=mysqli_fetch_row($result)){
           $userid=$row[0];
    }
}
if (preg_match("!image!", $_FILES['avatar']['type'])){
    if(copy($_FILES['avatar']['tmp_name'], $avatar_path)){
        $sql = $mysqli->prepare("INSERT INTO post VALUES (NULL,?, ?, ?, ?, ?,NOW(),NOW());");
        if ($sql){
            $sql->bind_param("issss",$userid,$title,$meta_desc,$text,$avatar_path);
            $sql->execute();
            $sql->close();
        }
else echo "ERROR";
    }
}
$mysqli->close();
header('Location: index.php');
?>