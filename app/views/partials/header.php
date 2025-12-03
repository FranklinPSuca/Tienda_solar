<!DOCTYPE html>
<html lang="es" data-bs-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Soluciones en energía solar para hogares y negocios. Paneles solares, instalación y mantenimiento.">
  <title><?= $title ?? 'Energía Solar | Soluciones Sostenibles' ?></title>
  
  <!-- Favicon -->
  <link rel="icon" type="image/png" href="<?= BASE_URL ?>assets/img/favicon.png">
  
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  
  <!-- AOS Animation -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  
  <!-- Custom CSS -->
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/styles.css">
</head>
<body>
  <!-- WhatsApp Float Button -->
  <a href="https://wa.me/1234567890" class="whatsapp-float" target="_blank" rel="noopener noreferrer" aria-label="Chatea con nosotros por WhatsApp">
    <i class="bi bi-whatsapp"></i>
  </a>

  <!-- Back to Top Button -->
  <a href="#" class="back-to-top" id="backToTop" aria-label="Volver arriba">
    <i class="bi bi-arrow-up"></i>
  </a>

  <!-- Navigation -->
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
      <div class="container">
        <a class="navbar-brand" href="<?= BASE_URL ?>">
          <i class="bi bi-sun-fill text-warning me-2"></i>
          <span class="fw-bold">Energía</span>Solar
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link active" href="<?= BASE_URL ?>home">Inicio</a></li>
            <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>home#servicios">Servicios</a></li>
            <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>home#nosotros">Nosotros</a></li>
            <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>home#contacto">Contacto</a></li>
            <ul class="navbar-nav ms-auto">
              <?php if (isset($_SESSION['usuario_id'])): ?>
                <!-- Opción visible solo si el usuario está logueado -->
                <li class="nav-item">
                  <a class="btn btn-outline-success ms-3" href="index.php?page=catalogo">
                    <i class="bi bi-book-fill me-1"></i> Catalogo
                  </a>
                </li>
                <li class="nav-item">
                  <a class="btn btn-outline-success ms-3" href="index.php?page=carrito">
                    <i class="bi bi-cart-fill me-1"></i> Mi carrito
                  </a>
                </li>
                <li class="nav-item">
                  <a class="btn btn-outline-danger ms-3" href="index.php?page=logout">
                    <i class="bi bi-box-arrow-right me-1"></i> Cerrar sesión
                  </a>
                </li>
              <?php else: ?>
                <li class="nav-item">
                  <a class="btn btn-outline-primary ms-3" href="index.php?page=login">
                    <i class="bi bi-person-circle me-1"></i> Iniciar sesión
                  </a>
                </li>
              <?php endif; ?>
            </ul>
          </ul>
        </div>
      </div>
    </nav>
  </header>