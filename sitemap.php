<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sitemap</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=FONT_NAME:weights&display=swap" rel="stylesheet" />
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
            <h1>Sitemap</h1>
            <div class="scroll-text">Navega por nuestro sitio</div>
        </section>

        <div class="product-grid" role="list">
            <div class="category-block" role="listitem" aria-label="Categoría Tartas">
                <h3><a href="index.php">Homepage</a></h3>
                <ul class="category-item-list">
                    <li><a href="instore.php">in store</a></li>
                    <li><a href="pedido.php">Ordenar</a></li>
                    <li><a href="contacto.php">Contacto</a></li>
                    <li><a href="ayuda.php">Ayuda</a></li>
                </ul>
            </div>
            <!-- Puedes agregar más categorías aquí -->
        </div>
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

</body>

</html>