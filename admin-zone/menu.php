<div class="dropdown">
    <div id="menuwrap">
      <button class="btn btn-info navbar-btn dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Menu
      </button> 
          <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
            <li><a href="index.php">Posty</a></li>
            <li><a href="account_settings.php">Ustawienia Konta</a></li>
            <li class="divider"></li>
            <li><a href="../index.html">Strona główna</a></li>
            <li><a href="../blog-post/blog.php?user_id=<?php echo $_SESSION['user_blog_id']; ?>">Przejdź do Bloga</a></li>
            <li><a href="logout.php">Wyloguj</a> </li>
        </div>
    </div>
</div>