<?php
session_start();
require_once('db_conexion.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Producto con Carrusel y Listado</title>

    <!-- Google Material Icons CDN -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="css/instore.css" />
    <link rel="stylesheet" href="css/index.css" />
    <link rel="stylesheet" href="css/custom.css" />

</head>

<body>
  <header>
    <div class="nav-container container" role="navigation" aria-label="Main navigation">
      <button aria-label="Abrir menú" aria-expanded="false" aria-controls="mobile-menu"
        class="hamburger-btn material-icons" id="hamburger-btn">
        menu
      </button>
      <div class="logo" aria-label="1004 Cake Boutique">
      <a href="index.php"><img src="img/toram.png" alt="" width="70" height="70">
        1004<span>Cake Boutique</span>
      </div></a>
      <nav class="desktop-nav" aria-label="Navegación principal">
        <a href="instore.php" tabindex="0">In Store</a>
        <?php if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true): ?>
          <a href="register.php" tabindex="0">Register</a>
          <a href="login.php" tabindex="0">Login</a>
        <?php else: ?>
          <a href="logout.php" tabindex="0">Logout</a> <!-- Logout link -->
        <?php endif; ?>
        <a href="contact.php" tabindex="0">Contact</a>
        <a href="pedido.php" tabindex="0">Order</a>
      </nav>
    </div>

    <nav id="mobile-menu" class="mobile-nav" aria-label="Menú móvil">
      <a href="instore.php" tabindex="-1">In Store</a>
      <?php if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true): ?>
        <a href="register.php" tabindex="-1">Register</a>
        <a href="login.php" tabindex="-1">Login</a>
      <?php else: ?>
        <a href="logout.php" tabindex="-1">Logout</a> <!-- Logout link -->
      <?php endif; ?>
      <a href="contact.php" tabindex="-1">Contact</a>
    </nav>
  </header>

    <main>
        <!-- Carousel Section -->
        <section aria-label="Carrusel de pasteles grandes" class="carousel-wrapper" id="carousel">
            <button class="carousel-button prev" aria-label="Anterior">
                <span class="material-icons">chevron_left</span>
            </button>
            <div class="carousel-track" aria-live="polite" aria-atomic="true">
                <!-- Carousel cards -->
                <div class="carousel-card">
                    <img src="img/burnt.jpg" alt="Pastel Salted Caramel en plato azul con diseño delicado" />
                    <div class="carousel-caption">Salted Caramel</div>
                </div>
                <div class="carousel-card">
                    <img src="img/pistache.jpg" alt="Pastel Baked Chocolate con glaseado de chocolate y polvo" />
                    <div class="carousel-caption">Baked Chocolate</div>
                </div>
                <div class="carousel-card">
                    <img src="img/frutas.jpg" alt="Pastel de chocolate sin harina con ganache y arándanos frescos" />
                    <div class="carousel-caption">Chocolate Flourless w/ Choc Ganache &amp; Blueberries</div>
                </div>
                <div class="carousel-card">
                    <img src="img/donut.jpg"
                        alt="Pastel Triple Chocolate con glaseado espejo y detalles de frutos rojos" />
                    <div class="carousel-caption">Triple Chocolate</div>
                </div>
            </div>
            <button class="carousel-button next" aria-label="Siguiente">
                <span class="material-icons">chevron_right</span>
            </button>
        </section>

        <!-- Product Listing Section -->
        <section class="product-listing" id="products" aria-labelledby="productsTitle">
            <h2 id="productsTitle">Listado de Productos</h2>
            <div class="product-grid" role="list">
                <div class="category-block" role="listitem" aria-label="Categoría Tartas">
                    <h3>Tartas</h3>
                    <ul class="category-item-list">
                        <li><a href="#">Portuguese Tart</a></li>
                        <li><a href="#">Portuguese Tart Blueberry</a></li>
                        <li><a href="#">Portuguese Tart Raspberry</a></li>
                        <li><a href="#">Coconut Tart</a></li>
                        <li><a href="#">Almond &amp; Hazelnut Tart</a></li>
                        <li><a href="#">Salted Caramel Tart</a></li>
                        <li><a href="#">Baked Chocolate Tart</a></li>
                    </ul>
                </div>
                <div class="category-block" role="listitem" aria-label="Categoría Mousse">
                    <h3>Mousses</h3>
                    <ul class="category-item-list">
                        <li><a href="#">Lime Mousse GF</a></li>
                        <li><a href="#">Jaffa GF</a></li>
                        <li><a href="#">Triple Chocolate</a></li>
                        <li><a href="#">Roche Mousse</a></li>
                        <li><a href="#">Passionfruit Mousse</a></li>
                        <li><a href="#">Blueberry Cheesecake</a></li>
                    </ul>
                </div>
                <div class="category-block" role="listitem" aria-label="Categoría Hojaldres">
                    <h3>Pasteles Hojaldre</h3>
                    <ul class="category-item-list">
                        <li><a href="#">Palmier</a></li>
                        <li><a href="#">Egg Jam Palmier</a></li>
                        <li><a href="#">Jesuita</a></li>
                        <li><a href="#">Portuguese Delicious</a></li>
                        <li><a href="#">Vanilla Slice</a></li>
                        <li><a href="#">Apple Puff</a></li>
                    </ul>
                </div>

                <div class="category-block" role="listitem" aria-label="Categoría Donas">
                    <h3>Donuts</h3>
                    <ul class="category-item-list">
                        <li><a href="#">Cinnamon Sugar</a></li>
                        <li><a href="#">Egg Jam</a></li>
                        <li><a href="#">Vanilla</a></li>
                        <li><a href="#">Chocolate &amp; Hazelnut</a></li>
                        <li><a href="#">Dulce de Leche</a></li>
                    </ul>
                </div>
                <div class="category-block" role="listitem" aria-label="Categoría Brioche">
                    <h3>Brioche Pastry</h3>
                    <ul class="category-item-list">
                        <li><a href="#">Pão de Leite / Milk Bread</a></li>
                        <li><a href="#">Pão de Deus / Coconut Bun</a></li>
                        <li><a href="#">Croissant</a></li>
                        <li><a href="#">Chocolate &amp; Hazelnut Croissant</a></li>
                        <li><a href="#">Rhubarb, Raspberry &amp; Almond Croissant</a></li>
                        <li><a href="#">Raisin Scroll</a></li>
                        <li><a href="#">Seasonal Fruit Danish w/ Vanilla Cream</a></li>
                    </ul>
                </div>
                <div class="category-block" role="listitem" aria-label="Categoría Pasteles Pequeños">
                    <h3>Small Cakes</h3>
                    <ul class="category-item-list">
                        <li><a href="#">Raspberry Coconut Cake GF</a></li>
                        <li><a href="#">Molotoff with Salted Caramel and Nuts GF</a></li>
                        <li><a href="#">Cream Caramel GF</a></li>
                        <li><a href="#">Orange Flourless GF</a></li>
                        <li><a href="#">Orange &amp; Hazelnut Flourless GF</a></li>
                        <li><a href="#">Orange Flourless w/ Pistachio Butter Cream GF</a></li>
                        <li><a href="#">Chocolate Flourless w/ Chocolate Ganache GF</a></li>
                        <li><a href="#">Orange Roulade GF</a></li>
                        <li><a href="#">Almond &amp; Raspberry Friand</a></li>
                        <li><a href="#">Pineapple Cake</a></li>
                        <li><a href="#">Portuguese Lamington</a></li>
                        <li><a href="#">Carrot Cake</a></li>
                        <li><a href="#">Cinnamon Queijada</a></li>
                        <li><a href="#">Orange Queijada</a></li>
                        <li><a href="#">Seasonal Fruit Frangipane</a></li>
                        <li><a href="#">Chocolate Brownie</a></li>
                    </ul>
                </div>
            </div>
        </section>
    </main>

  <footer>
    <div class="footer-container container">
      <div class="footer-column" aria-label="Logo panadería">
        <img src="img/cake.png" alt="Logo blanco y dorado de 1004 Cake Boutique con dibujo de edificio"
          class="footer-logo" tabindex="0" />
      </div>
      <div class="footer-column" aria-label="Contacto">
        <h4>Get in Touch</h4>
        <form method="POST">
          <div class="header">Nuevo mensaje de cliente</div>
          <fieldset>
            <legend>Contact Information</legend>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required />

            <label for="email">Correo:</label>
            <input type="email" id="email" name="email" required />

            <label for="asunto">Asunto:</label>
            <input type="text" id="asunto" name="asunto" required />

            <label for="mensaje">Mensaje:</label>
            <textarea id="mensaje" name="mensaje" required></textarea>
          </fieldset>

          <button id="contacto" type="submit">Enviar</button>
        </form>


        <a href="tel:+123456789" tabindex="0" aria-label="Llamar a la panadería">Ph: +1 234 567 89</a>
        <a href="mailto:1004shuahae@gmail.com" tabindex="0" aria-label="Correo electrónico">Email:
          1004suahae@gmail.com</a>
      </div>
      <div class="footer-column" aria-label="Sitemap">
        <h4>Sitemap</h4>
        <p><a href="sitemap.php" tabindex="0" aria-label="Ver el sitemap">View Sitemap</a></p>
      </div>
      <div class="footer-column" aria-label="Horario">
        <h4>Opening Hours</h4>
        <p>Monday to Saturday: 8:30am - 5pm</p>
        <p>Sunday: 9am - 4pm</p>
      </div>
    </div>
  </footer>

    <script src="js/contact.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Script de Chatbase -->
    <script src="js/chatbase.js"></script>
    <script src="js/instore.js"></script>
</body>

</html>