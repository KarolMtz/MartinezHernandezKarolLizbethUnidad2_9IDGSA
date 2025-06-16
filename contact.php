<?php
session_start();
require_once('db_conexion.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Panadería 1004 - Contacto</title>
  <link href="https://fonts.googleapis.com/css2?family=FONT_NAME:weights&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="css/index.css" />
  <link rel="stylesheet" href="css/custom.css" />
  <link rel="stylesheet" href="css/contact.css" />

</head>

<body>
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
      <h1>Contacto</h1>
      <p>Si tienes alguna pregunta, no dudes en contactarnos.</p>
      <div class="contact-form-container">
        <h4>Get in Touch</h4>
        <form method="POST">
          <div class="content">
            <label for="nombre">Nombre:</label>
            <input type="text" id="name" name="nombre" required />

            <label for="email">Correo:</label>
            <input type="email" id="email" name="email" required />

            <label for="asunto">Asunto:</label>
            <input type="text" id="asunto" name="asunto" required />

            <label for="mensaje">Mensaje:</label>
            <textarea id="mensaje" name="mensaje" required></textarea>
          </div>
          <button id="contacto" type="button">Enviar</button>
        </form>
      </div>
    </section>
  </main>



  <footer>
    <div class="footer-container container">
      <div class="footer-column" aria-label="Logo panadería">
        <img
          src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/bd5ad28b-3a87-4b86-9f6c-44fa195d22ae.png"
          alt="Logo" class="footer-logo" tabindex="0" />
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


  <!-- Script de Chatbase -->
  <script src="js/chatbase.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="js/panaderia.js"></script>
  <script src="js/contact.js"></script>
</body>

</html>