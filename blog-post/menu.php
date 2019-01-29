<div class="dropdown">
<div id="menuwrap">
  <button class="btn btn-light dropdown-toggle btn-lg" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Menu
  </button> 
  <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
    <li><a href="#about">O mnie</a></li>
    <li><a href="#post">Posty</a></a></li>
    <li class="dividera"></li>
    <?php
    if(isset($_SESSION['user'])){?>
    <li><a href="../admin-zone/">Panel Administratora</a></li>
    <?php } ?>
    <li><a href="../index.php">Strona główna</a></li>
  </div>
</div>
</div>