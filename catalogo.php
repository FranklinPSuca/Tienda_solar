<?php
// Include database configuration
require_once 'config/db.php';

// Get categories
$categorias = [];
$sql_categorias = "SELECT * FROM categorias ORDER BY nombre";
$result_categorias = $conn->query($sql_categorias);

if ($result_categorias && $result_categorias->num_rows > 0) {
    while($row = $result_categorias->fetch_assoc()) {
        $categorias[] = $row;
    }
}

// Get products with category names
$productos = [];
$sql_productos = "SELECT p.*, c.nombre as categoria_nombre 
                 FROM productos p 
                 LEFT JOIN categorias c ON p.categoria_id = c.id 
                 ORDER BY p.nombre";
$result_productos = $conn->query($sql_productos);

if ($result_productos) {
    if ($result_productos->num_rows > 0) {
        while($row = $result_productos->fetch_assoc()) {
            $productos[] = $row;
        }
        // Debug: Show number of products loaded
        error_log("Productos cargados: " . count($productos));
    } else {
        error_log("No se encontraron productos en la base de datos");
    }
} else {
    error_log("Error en la consulta SQL: " . $conn->error);
}

$sql = "SELECT nombre, precio, imagen FROM productos WHERE id = ?";
?>
<!DOCTYPE html>
<html lang="es" data-bs-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Catálogo de paneles solares y productos de energía renovable. Las mejores marcas y precios del mercado.">
  <title>Catálogo de Productos | Energía Solar</title>
  
  <!-- Favicon -->
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  
  <!-- AOS Animation -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  
  <!-- Custom CSS -->
  <link rel="stylesheet" href="assets/css/styles.css">
  
  <style>
    .product-card {
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      height: 100%;
    }
    .product-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    .product-img-container {
      height: 200px;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 1rem;
      background-color: #f8f9fa;
    }
    .product-img {
      max-height: 100%;
      max-width: 100%;
      object-fit: contain;
    }
    .price {
      font-size: 1.25rem;
      font-weight: 600;
      color: #fd7e14;
    }
  </style>
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
  <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">
        <i class="bi bi-sun-fill text-warning me-2"></i>
        <span class="fw-bold">Energía</span>Solar
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
              aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto align-items-lg-center">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php#servicios">Servicios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="catalogo.php">Catálogo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php#nosotros">Nosotros</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php#contacto">Contacto</a>
          </li>
          <li class="nav-item ms-lg-3 mt-2 mt-lg-0">
            <a href="#contacto" class="btn btn-warning btn-sm">Cotizar Ahora</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Header -->
  <header class="page-header py-5 mt-5 bg-light">
    <div class="container py-5">
      <div class="row justify-content-center text-center">
        <div class="col-lg-8" data-aos="fade-up">
          <h1 class="display-5 fw-bold mb-3">Nuestro Catálogo de Productos</h1>
          <p class="lead text-muted">Descubre nuestra amplia selección de paneles solares y accesorios de las mejores marcas del mercado.</p>
          <div class="divider bg-warning mx-auto my-4"></div>
        </div>
      </div>
    </div>
  </header>

 <main class="py-5 mt-5">
    <div class="container">
      <!-- Category Filter -->
      <div class="row mb-4">
        <div class="col-md-4">
          <label for="categoria" class="form-label">Filtrar por categoría:</label>
          <select class="form-select" id="categoria" name="categoria">
            <option value="" selected>Todas las categorías</option>
            <?php foreach ($categorias as $categoria): ?>
              <option value="<?php echo $categoria['id']; ?>">
                <?php echo htmlspecialchars($categoria['nombre']); ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>

       <!-- Products Grid -->
      <div class="row g-4">
        <?php if (!empty($productos)): ?>
          <?php foreach ($productos as $producto): ?>
            <div class="col-md-6 col-lg-4 col-xl-3" data-aos="fade-up">
              <div class="card h-100 border-0 shadow-sm product-card">
                <div class="product-img-container">
                  <img src="<?php echo !empty($producto['imagen']) ? htmlspecialchars($producto['imagen']) : 'https://via.placeholder.com/300x200?text=Producto+Sin+Imagen'; ?>" 
                       alt="<?php echo htmlspecialchars($producto['nombre']); ?>" 
                       class="product-img"
                       onerror="this.src='https://via.placeholder.com/300x200?text=Imagen+No+Disponible'">
                </div>
                <div class="card-body text-center">
                  <?php if (!empty($producto['categoria_nombre'])): ?>
                    <span class="badge bg-warning text-dark mb-2"><?php echo htmlspecialchars($producto['categoria_nombre']); ?></span>
                  <?php endif; ?>
                  <h3 class="h5 fw-bold"><?php echo htmlspecialchars($producto['nombre']); ?></h3>
                  <p class="text-muted small">
                    <?php 
                    $descripcion = !empty($producto['descripcion']) ? $producto['descripcion'] : 'Sin descripción';
                    echo htmlspecialchars(mb_strimwidth($descripcion, 0, 100, '...')); 
                    ?>
                  </p>
                  <div class="price mb-3">S/. <?php echo number_format($producto['precio'], 2); ?> </div>
                  <div class="d-grid gap-2">
                    <a href="producto.php?id=<?php echo $producto['id']; ?>" class="btn btn-outline-warning btn-sm">Ver Detalles</a>
                    <button class="btn btn-warning btn-sm agregar-carrito" data-id="<?php echo $producto['id']; ?>">Agregar al Carrito</button>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <div class="col-12 text-center py-5">
            <div class="alert alert-info">No hay productos disponibles en este momento.</div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </main>

      <!-- Paginación -->
      <nav aria-label="Navegación de productos" class="mt-5">
        <ul class="pagination justify-content-center">
          <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
          </li>
          <li class="page-item active" aria-current="page">
            <a class="page-link" href="#">1</a>
          </li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#">Siguiente</a>
          </li>
        </ul>
      </nav>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="py-5 bg-warning text-white">
    <div class="container py-5 text-center">
      <h2 class="display-5 fw-bold mb-4">¿Necesitas ayuda para elegir?</h2>
      <p class="lead mb-5">Nuestros expertos están listos para asesorarte y encontrar la mejor solución para tus necesidades.</p>
      <a href="index.php#contacto" class="btn btn-dark btn-lg px-5 py-3 me-3">Contactar a un Asesor</a>
      <a href="tel:+1234567890" class="btn btn-outline-light btn-lg px-5 py-3">
        <i class="bi bi-telephone-fill me-2"></i> Llamar Ahora
      </a>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-dark text-white pt-5 pb-4">
    <div class="container">
      <div class="row g-4">
        <div class="col-lg-4 mb-4 mb-lg-0">
          <h5 class="text-uppercase fw-bold mb-4">Energía Solar</h5>
          <p>Líderes en soluciones de energía renovable. Ofrecemos productos y servicios de la más alta calidad para hogares y negocios.</p>
          <div class="social-icons mt-4">
            <a href="#" class="me-2" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="me-2" aria-label="Twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="me-2" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="me-2" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
            <a href="#" class="me-2" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
          </div>
        </div>
        
        <div class="col-lg-2 col-md-4 mb-4 mb-md-0">
          <h5 class="text-uppercase fw-bold mb-4">Enlaces Rápidos</h5>
          <ul class="list-unstyled">
            <li class="mb-2"><a href="index.php" class="text-white-50 text-decoration-none">Inicio</a></li>
            <li class="mb-2"><a href="index.php#servicios" class="text-white-50 text-decoration-none">Servicios</a></li>
            <li class="mb-2"><a href="catalogo.php" class="text-white-50 text-decoration-none">Catálogo</a></li>
            <li class="mb-2"><a href="index.php#nosotros" class="text-white-50 text-decoration-none">Sobre Nosotros</a></li>
            <li><a href="index.php#contacto" class="text-white-50 text-decoration-none">Contacto</a></li>
          </ul>
        </div>
        
        <div class="col-lg-3 col-md-4 mb-4 mb-md-0">
          <h5 class="text-uppercase fw-bold mb-4">Nuestros Servicios</h5>
          <ul class="list-unstyled">
            <li class="mb-2"><a href="catalogo.php" class="text-white-50 text-decoration-none">Paneles Solares</a></li>
            <li><a href="catalogo.php" class="text-white-50 text-decoration-none">Servicio de Mantenimiento</a></li>
          </ul>
        </div>
        
        <div class="col-lg-3 col-md-4">
          <h5 class="text-uppercase fw-bold mb-4">Boletín Informativo</h5>
          <p class="text-white-50">Suscríbete para recibir noticias y ofertas especiales.</p>
          <form class="mb-3">
            <div class="input-group">
              <input type="email" class="form-control" placeholder="Tu correo" aria-label="Tu correo">
              <button class="btn btn-warning" type="button">
                <i class="bi bi-arrow-right"></i>
              </button>
            </div>
          </form>
          <p class="small text-white-50">Respetamos tu privacidad. Nunca compartiremos tu información.</p>
        </div>
      </div>
      
      <hr class="my-4 bg-secondary">
      
      <div class="row align-items-center">
        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
          <p class="mb-0 small text-white-50">&copy; <?= date('Y') ?> Energía Solar. Todos los derechos reservados.</p>
        </div>
        <div class="col-md-6 text-center text-md-end">
          <a href="#" class="text-white-50 text-decoration-none small me-3">Términos y Condiciones</a>
          <a href="#" class="text-white-50 text-decoration-none small me-3">Política de Privacidad</a>
          <a href="#" class="text-white-50 text-decoration-none small">Aviso Legal</a>
        </div>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <!-- Bootstrap JS Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  
  <!-- AOS Animation -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  
  <!-- Custom JS -->
  <script src="assets/js/main.js"></script>
  
  <script>
    // Initialize AOS
    document.addEventListener('DOMContentLoaded', function() {
      AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: true,
        disable: 'mobile'
      });

      // Back to top button
      const backToTopButton = document.getElementById('backToTop');
      
      window.addEventListener('scroll', function() {
        if (window.pageYOffset > 300) {
          backToTopButton.classList.add('show');
        } else {
          backToTopButton.classList.remove('show');
        }
      });
      
      backToTopButton.addEventListener('click', function(e) {
        e.preventDefault();
        window.scrollTo({ top: 0, behavior: 'smooth' });
      });
    });
  </script>
</body>
</html>
