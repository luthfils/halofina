<?php
$current = "";
$path = explode('/', $_SERVER['REQUEST_URI']);
$current = (end($path));
?>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top font-regular" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" id="logo-header" href="http://halofina.id">
            <img src="img/logo-halofina.svg" alt="logo halofina">
        </a>
        
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fas fa-1x fa-bars "></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="./kisahkami" class="<?php if ($current == 'kisahkami') echo 'current' ?>" id="menu-kisah">KISAH KAMI
                        <?php if ($current == 'kisahkami') echo '<div class="tcenter list-menu"></div>' ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./pakar" class="<?php if ($current == 'pakar') echo 'current' ?>" id="menu-pakar">PAKAR
                        <?php if ($current == 'pakar') echo '<div class="tcenter list-menu"></div>' ?>
                    </a>
                </li>
            </ul>
        </div>
        
    </div>
</nav>