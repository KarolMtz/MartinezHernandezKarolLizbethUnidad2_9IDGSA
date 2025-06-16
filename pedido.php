<?php
session_start();
require_once('db_conexion.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Panadería 1004 - Pedido Personalizado</title>
  <link href="https://fonts.googleapis.com/css2?family=FONT_NAME:weights&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="css/custom.css" />
  <link rel="stylesheet" href="css/index.css" />
</head>

<body>
  <header>
    <div class="nav-container container" role="navigation" aria-label="Main navigation">
      <button aria-label="Abrir menú" aria-expanded="false" aria-controls="mobile-menu" class="hamburger-btn material-icons" id="hamburger-btn">
        menu
      </button>
      <div class="logo" aria-label="1004 Cake Boutique">
        1004<span>Cake Boutique</span>
      </div>
      <nav class="desktop-nav" aria-label="Navegación principal">
        <a href="index.php" tabindex="0">Home</a>
        <a href="instore.php" tabindex="0">In Store</a>
        <a href="register.php" tabindex="0">Register</a>
        <a href="login.php" tabindex="0">Login</a>
        <a href="contact.php" tabindex="0">Contact</a>
      </nav>
      <button class="btn-order" tabindex="0"><a href="pedido.php">Order</a></button>
    </div>
  </header>

  <main>
    <section class="hero-section">
      <h1>Pedido Personalizado</h1>
      <form id="customOrderForm">
        <label for="sabor">Sabor:</label>
        <input type="text" id="sabor" name="sabor" required />

        <label for="tamano">Tamaño:</label>
        <input type="text" id="tamano" name="tamano" required />

        <label for="relleno">Relleno:</label>
        <input type="text" id="relleno" name="relleno" required />

        <label for="cobertura">Cobertura:</label>
        <input type="text" id="cobertura" name="cobertura" required />

        <label for="decoracion">Decoración:</label>
        <input type="text" id="decoracion" name="decoracion" required />

        <label for="texto">Texto Personalizado:</label>
        <input type="text" id="texto" name="texto" required />

        <label for="tematica">Temática:</label>
        <input type="text" id="tematica" name="tematica" required />

        <button type="submit">Crear Pedido</button>
      </form>
    </section>
  </main>

  <footer>
    <div class="footer-container container">
      <div class="footer-column" aria-label="Logo panadería">
        <img
          src="img/Tarta artesanal.jpg"
          alt="Logo blanco y dorado de 1004 Cake Boutique con dibujo de edificio" class="footer-logo"
          tabindex="0" />
      </div>
      <div class="footer-column" aria-label="Contacto">
        <h4>Get in Touch</h4>
        <form method="POST">
          <div class="header">Nuevo mensaje de cliente</div>
          <div class="content">
            <label for="nombre">Nombre:</label>
            <input type="text" id="name" name="nombre" required />

            <label for="email">Correo:</label>
            <input type="email" id="email" name="email" required />
            <br>
            <label for="asunto">Asunto:</label>
            <input type="text" id="asunto" name="asunto" required />

            <label for="mensaje">Mensaje:</label>
            <textarea id="mensaje" name="mensaje" required></textarea>
          </div>
          <button id="contacto" type="button">Enviar</button>
        </form>

        <a href="tel:+123456789" tabindex="0" aria-label="Llamar a la panadería">Ph: +1 234 567 89</a>
        <a href="mailto:1004shuahae@gmail.com" tabindex="0" aria-label="Correo electrónico">Email:
          1004suahae@gmail.com</a>
      </div>
      <div class="footer-column" aria-label="Visítanos">
        <h4>Visit Us</h4>
        <address>
          38 New Canterbury Road Petersham 2049<br />
          <a href="https://maps.google.com/?q=38 New Canterbury Road Petersham 2049" tabindex="0"
            aria-label="Abrir mapa con dirección">Get Directions</a>
        </address>
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

  
  <!-- Script de Chatbase -->
  <script src="js/chatbase.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="js/panaderia.js"></script>
</body>

</html>
