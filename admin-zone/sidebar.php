
<nav id="sidebar">
        <div class="sidebar-header">
            <h3 style="text-align:center;">Panel użytkownika</h3>
            <h4 style="text-align:center;">Witaj <?php echo $_SESSION['user']; ?></h4>
        </div>
        
        <ul class="list-unstyled components">
            <li><a href="../index.php">Strona główna</a></li>
            <li class="active"><a name="dodajemy" href="index.php">Posty</a></li>
            <li><a href="account_settings.php">Ustawienia Konta</a></li>
        </ul>

        <div>
            <ul class="list-unstyled components">
            <li><a href="../blog-post/blog.php?user_id=<?php echo $_SESSION['user_blog_id']; ?>">Przejdź do Bloga</a></li>
            <li><a href="logout.php">Wyloguj</a> </li>
        </ul>
        </nav>