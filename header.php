<?php
// header.php - common navigation header
?>
<header>
    <div class="nav-container container" role="navigation" aria-label="Main navigation">
        <button aria-label="Abrir menú" aria-expanded="false" aria-controls="mobile-menu"
            class="hamburger-btn material-icons" id="hamburger-btn">
            menu
        </button>
        <div class="logo" aria-label="1004 Cake Boutique">
            1004<span>Cake Boutique</span>
        </div>
        <nav class="desktop-nav" aria-label="Navegación principal">
            <a href="instore.php" tabindex="0">In Store</a>
            <a href="register.php" tabindex="0">Register</a>
            <a href="login.php" tabindex="0">Login</a>
            <a href="contact.php" tabindex="0">Contact</a>
        </nav>
        <button class="pedido.php" tabindex="0"><a href="pedido.php">Order</a></button>
    </div>

    <nav id="mobile-menu" class="mobile-nav" aria-label="Menú móvil">
        <a href="instore.php" tabindex="-1">In Store</a>
        <a href="register.php" tabindex="-1">Register</a>
        <a href="login.php" tabindex="-1">Login</a>
        <a href="contact.php" tabindex="-1">Contact</a>
    </nav>
</header>
