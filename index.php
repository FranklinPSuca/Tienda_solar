<!DOCTYPE html>
<html lang="es" data-bs-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Soluciones en energía solar para hogares y negocios. Paneles solares, instalación y mantenimiento.">
  <title>Energía Solar | Soluciones Sostenibles</title>
  
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
  
  <!-- Preload critical resources -->
  <link rel="preload" href="assets/css/styles.css" as="style">
  <link rel="preload" href="assets/js/main.js" as="script">
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
      <a class="navbar-brand" href="#">
        <i class="bi bi-sun-fill text-warning me-2"></i>
        <span class="fw-bold">Energía</span>Solar
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
              aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" href="#inicio">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#servicios">Servicios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#nosotros">Nosotros</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contacto">Contacto</a>
          </li>
          <li class="nav-item ms-lg-3 mt-2 mt-lg-0">
            <a href="#cotizar" class="btn btn-warning btn-sm">Cotizar Ahora</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <header id="inicio" class="hero">
    <div class="container">
      <div class="row min-vh-100 align-items-center">
        <div class="col-lg-7" data-aos="fade-right">
          <h1 class="display-3 fw-bold mb-4">Energía Solar para un Futuro Sostenible</h1>
          <p class="lead mb-5">Ahorra hasta un 80% en tu factura eléctrica con nuestros sistemas de energía solar de última generación. Soluciones personalizadas para hogares y negocios.</p>
          <div class="d-flex flex-wrap gap-3">
            <a href="#contacto" class="btn btn-warning btn-lg px-4 py-3 fw-bold">Solicitar Cotización</a>
            <a href="#servicios" class="btn btn-outline-light btn-lg px-4 py-3">Ver Servicios</a>
          </div>
          
          <div class="d-flex align-items-center mt-5 pt-3">
            <div class="d-flex">
              <div class="me-4 text-center">
                <div class="h2 mb-0 fw-bold counter" data-target="250">0</div>
                <span>Proyectos Completados</span>
              </div>
              <div class="me-4 text-center">
                <div class="h2 mb-0 fw-bold counter" data-target="15">0</div>
                <span>Años de Experiencia</span>
              </div>
              <div class="text-center">
                <div class="h2 mb-0 fw-bold counter" data-target="98">0</div>
                <span>Clientes Satisfechos</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5 d-none d-lg-block" data-aos="fade-left">
          <div class="hero-form bg-white p-4 rounded-3 shadow">
            <h3 class="h4 mb-4 text-center">Calcula tu ahorro</h3>
            <form id="savingsCalculator" class="needs-validation" novalidate>
              <div class="mb-3">
                <label for="consumo" class="form-label">Consumo mensual (kWh)</label>
                <input type="number" class="form-control" id="consumo" required>
                <div class="invalid-feedback">Por favor ingresa tu consumo mensual</div>
              </div>
              <div class="mb-3">
                <label for="tarifa" class="form-label">Tarifa eléctrica actual ($/kWh)</label>
                <input type="number" step="0.01" class="form-control" id="tarifa" value="0.20" required>
              </div>
              <button type="submit" class="btn btn-warning w-100">Calcular Ahorro</button>
            </form>
            <div id="resultadoAhorro" class="mt-3 text-center d-none">
              <h4 class="h5">Tu ahorro estimado:</h4>
              <div class="display-6 fw-bold text-success" id="ahorroMensual">$0</div>
              <p class="small text-muted">por mes en tu factura eléctrica</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Scroll Down Indicator -->
    <a href="#servicios" class="scroll-down" aria-label="Desplazarse hacia abajo">
      <i class="bi bi-chevron-down"></i>
    </a>
  </header>

  <!-- Servicios Section -->
  <section id="servicios" class="py-5 bg-light">
    <div class="container py-5">
      <div class="text-center mb-5" data-aos="fade-up">
        <span class="text-uppercase text-warning fw-bold d-block mb-2">Nuestros Servicios</span>
        <h2 class="display-5 fw-bold mb-3">Soluciones a tu Medida</h2>
        <div class="divider bg-warning mx-auto"></div>
      </div>

      <div class="row justify-content-center g-4">
        <!-- Servicio 1 -->
        <div class="col-md-6 col-lg-5" data-aos="fade-up" data-aos-delay="100">
          <div class="card h-100 border-0 shadow-sm service-card">
            <div class="card-body p-4 text-center">
              <div class="service-icon mb-3">
                <i class="bi bi-sun"></i>
              </div>
              <h3 class="h4">Venta de Paneles Solares</h3>
              <p class="text-muted">Ofrecemos los mejores paneles solares del mercado con las últimas tecnologías para hogares y negocios. Ahorre en su factura eléctrica con nuestros productos de alta eficiencia.</p>
              <ul class="text-start text-muted small">
                <li>Amplio catálogo de marcas líderes</li>
                <li>Productos de última generación</li>
                <li>Garantía del fabricante</li>
                <li>Asesoría técnica especializada</li>
              </ul>
              <a href="catalogo.php" class="btn btn-outline-warning mt-3">Ver Catálogo</a>
            </div>
          </div>
        </div>

        <!-- Servicio 2 -->
        <div class="col-md-6 col-lg-5" data-aos="fade-up" data-aos-delay="200">
          <div class="card h-100 border-0 shadow-sm service-card">
            <div class="card-body p-4 text-center">
              <div class="service-icon mb-3">
                <i class="bi bi-tools"></i>
              </div>
              <h3 class="h4">Mantenimiento</h3>
              <p class="text-muted">Mantenimiento preventivo y correctivo para garantizar el máximo rendimiento de su sistema solar.</p>
              <ul class="text-start text-muted small">
                <li>Limpieza de paneles</li>
                <li>Revisión de componentes</li>
                <li>Diagnóstico profesional</li>
              </ul>
              <a href="#contacto" class="btn btn-outline-warning mt-3">Solicitar Mantenimiento</a>
            </div>
          </div>
        </div>
      </div>

      <div class="text-center mt-5" data-aos="fade-up">
        <a href="#contacto" class="btn btn-warning btn-lg px-5 py-3">Solicitar Estudio Personalizado</a>
      </div>
    </div>
  </section>

  <!-- Sobre Nosotros Section -->
  <section id="nosotros" class="py-5">
    <div class="container py-5">
      <div class="row align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right">
          <img src="https://images.unsplash.com/photo-1509391366360-2e959784a276?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1472&q=80" 
               alt="Equipo de trabajo" class="img-fluid rounded-4 shadow">
        </div>
        <div class="col-lg-6 ps-lg-5" data-aos="fade-left">
          <span class="text-uppercase text-warning fw-bold d-block mb-2">Sobre Nosotros</span>
          <h2 class="display-5 fw-bold mb-4">Expertos en Energía Solar</h2>
          <p class="lead">Somos una empresa comprometida con el medio ambiente, ofreciendo soluciones de energía renovable desde hace más de 15 años.</p>
          <p>Nuestro equipo de profesionales certificados está dedicado a proporcionar las mejores soluciones en energía solar, garantizando calidad, eficiencia y sostenibilidad en cada proyecto.</p>
          
          <div class="row mt-4">
            <div class="col-md-6 mb-4">
              <div class="d-flex">
                <div class="me-3">
                  <div class="icon-box bg-warning bg-opacity-10 text-warning rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                    <i class="bi bi-check-lg fs-4"></i>
                  </div>
                </div>
                <div>
                  <h5 class="h6 fw-bold mb-1">Calidad Garantizada</h5>
                  <p class="text-muted small mb-0">Productos de primera calidad con garantía extendida</p>
                </div>
              </div>
            </div>
            <div class="col-md-6 mb-4">
              <div class="d-flex">
                <div class="me-3">
                  <div class="icon-box bg-warning bg-opacity-10 text-warning rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                    <i class="bi bi-people fs-4"></i>
                  </div>
                </div>
                <div>
                  <h5 class="h6 fw-bold mb-1">Equipo Experto</h5>
                  <p class="text-muted small mb-0">Profesionales certificados y con amplia experiencia</p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex">
                <div class="me-3">
                  <div class="icon-box bg-warning bg-opacity-10 text-warning rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                    <i class="bi bi-shield-check fs-4"></i>
                  </div>
                </div>
                <div>
                  <h5 class="h6 fw-bold mb-1">Soporte Post-Venta</h5>
                  <p class="text-muted small mb-0">Atención personalizada durante y después de la instalación</p>
                </div>
              </div>
            </div>
          </div>
          
          <div class="mt-4 pt-2">
            <a href="#contacto" class="btn btn-warning px-4 py-2 me-2">Contáctanos</a>
            <a href="#" class="btn btn-outline-secondary px-4 py-2">Ver Proyectos</a>
          </div>
        </div>
      </div>
    </div>
  </section>

          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- Contacto Section -->
  <section id="contacto" class="py-5 bg-light">
    <div class="container py-5">
      <div class="text-center mb-5" data-aos="fade-up">
        <span class="text-uppercase text-warning fw-bold d-block mb-2">Contáctanos</span>
        <h2 class="display-5 fw-bold mb-3">Estamos para Ayudarte</h2>
        <div class="divider bg-warning mx-auto"></div>
      </div>

      <div class="row g-4">
        <div class="col-lg-5" data-aos="fade-right">
          <div class="contact-info h-100">
            <h3 class="h4 fw-bold mb-4">Información de Contacto</h3>
            
            <div class="d-flex mb-4">
              <div class="contact-icon">
                <i class="bi bi-geo-alt"></i>
              </div>
              <div>
                <h4 class="h6 fw-bold mb-1">Dirección</h4>
                <p class="text-muted mb-0">Av. Principal 123, Col. Centro<br>Ciudad de México, 06000</p>
              </div>
            </div>
            
            <div class="d-flex mb-4">
              <div class="contact-icon">
                <i class="bi bi-telephone"></i>
              </div>
              <div>
                <h4 class="h6 fw-bold mb-1">Teléfono</h4>
                <p class="text-muted mb-0">
                  <a href="tel:+525512345678" class="text-decoration-none text-dark">+52 55 1234 5678</a>
                </p>
              </div>
            </div>
            
            <div class="d-flex mb-4">
              <div class="contact-icon">
                <i class="bi bi-envelope"></i>
              </div>
              <div>
                <h4 class="h6 fw-bold mb-1">Correo Electrónico</h4>
                <p class="text-muted mb-0">
                  <a href="mailto:info@energiasolar.com" class="text-decoration-none text-dark">info@energiasolar.com</a>
                </p>
              </div>
            </div>
            
            <div class="d-flex mb-4">
              <div class="contact-icon">
                <i class="bi bi-clock"></i>
              </div>
              <div>
                <h4 class="h6 fw-bold mb-1">Horario de Atención</h4>
                <p class="text-muted mb-0">Lunes a Viernes: 9:00 AM - 6:00 PM<br>Sábado: 9:00 AM - 2:00 PM</p>
              </div>
            </div>
            
            <div class="mt-5">
              <h4 class="h6 fw-bold mb-3">Síguenos</h4>
              <div class="social-icons">
                <a href="#" class="me-2" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="me-2" aria-label="Twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="me-2" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="me-2" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
                <a href="#" class="me-2" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-lg-7" data-aos="fade-left">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-4 p-lg-5">
              <h3 class="h4 fw-bold mb-4">Envíanos un Mensaje</h3>
              <form id="contactForm" class="needs-validation" novalidate>
                <div class="row g-3">
                  <div class="col-md-6">
                    <label for="nombre" class="form-label">Nombre completo *</label>
                    <input type="text" class="form-control" id="nombre" required>
                    <div class="invalid-feedback">Por favor ingresa tu nombre completo</div>
                  </div>
                  
                  <div class="col-md-6">
                    <label for="email" class="form-label">Correo electrónico *</label>
                    <input type="email" class="form-control" id="email" required>
                    <div class="invalid-feedback">Por favor ingresa un correo electrónico válido</div>
                  </div>
                  
                  <div class="col-12">
                    <label for="telefono" class="form-label">Teléfono *</label>
                    <input type="tel" class="form-control" id="telefono" required>
                    <div class="invalid-feedback">Por favor ingresa tu número de teléfono</div>
                  </div>
                  
                  <div class="col-12">
                    <label for="asunto" class="form-label">Asunto *</label>
                    <select class="form-select" id="asunto" required>
                      <option value="" selected disabled>Selecciona un asunto</option>
                      <option value="cotizacion">Solicitar cotización</option>
                      <option value="informacion">Solicitar información</option>
                      <option value="soporte">Soporte técnico</option>
                      <option value="trabajo">Oportunidades de trabajo</option>
                      <option value="otro">Otro</option>
                    </select>
                    <div class="invalid-feedback">Por favor selecciona un asunto</div>
                  </div>
                  
                  <div class="col-12">
                    <label for="mensaje" class="form-label">Mensaje *</label>
                    <textarea class="form-control" id="mensaje" rows="5" required></textarea>
                    <div class="invalid-feedback">Por favor escribe tu mensaje</div>
                  </div>
                  
                  <div class="col-12">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="privacidad" required>
                      <label class="form-check-label small" for="privacidad">
                        Acepto la <a href="#" class="text-decoration-none">Política de Privacidad</a> y el tratamiento de mis datos personales.
                      </label>
                      <div class="invalid-feedback">Debes aceptar la política de privacidad</div>
                    </div>
                  </div>
                  
                  <div class="col-12">
                    <button type="submit" class="btn btn-warning px-4 py-2">
                      <i class="bi bi-send me-2"></i>Enviar Mensaje
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Mapa -->
  <div class="map-container" style="height: 400px;">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3762.888215335049!2d-99.16782692477548!3d19.42702098185817!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1ff2b3f509719%3A0x2d1c0a4eeb5b0b1b!2sPalacio%20de%20Bellas%20Artes!5e0!3m2!1ses!2smx!4v1620000000000!5m2!1ses!2smx" 
            width="100%" 
            height="100%" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy"
            aria-label="Ubicación en el mapa">
    </iframe>
  </div>

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
            <li class="mb-2"><a href="#inicio" class="text-white-50 text-decoration-none">Inicio</a></li>
            <li class="mb-2"><a href="#servicios" class="text-white-50 text-decoration-none">Servicios</a></li>
            <li class="mb-2"><a href="#nosotros" class="text-white-50 text-decoration-none">Sobre Nosotros</a></li>
            <li><a href="#contacto" class="text-white-50 text-decoration-none">Contacto</a></li>
          </ul>
        </div>
        
        <div class="col-lg-3 col-md-4 mb-4 mb-md-0">
          <h5 class="text-uppercase fw-bold mb-4">Nuestros Servicios</h5>
          <ul class="list-unstyled">
            <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Paneles Solares</a></li>
            <li><a href="#" class="text-white-50 text-decoration-none">Servicio de Mantenimiento</a></li>
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
  
  <!-- Initialize AOS -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Initialize AOS
      AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: true,
        disable: 'mobile'
      });
      
      // Form submission
      const forms = document.querySelectorAll('.needs-validation');
      
      // Loop over them and prevent submission
      Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
          if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
          } else {
            // Form is valid, you can add AJAX submission here
            event.preventDefault();
            alert('¡Gracias por tu mensaje! Nos pondremos en contacto contigo pronto.');
            form.reset();
          }
          
          form.classList.add('was-validated');
        }, false);
      });
      
      // Savings calculator
      const savingsForm = document.getElementById('savingsCalculator');
      if (savingsForm) {
        savingsForm.addEventListener('submit', function(e) {
          e.preventDefault();
          const consumo = parseFloat(document.getElementById('consumo').value) || 0;
          const tarifa = parseFloat(document.getElementById('tarifa').value) || 0;
          const ahorroMensual = consumo * tarifa * 0.8; // 80% de ahorro estimado
          
          document.getElementById('ahorroMensual').textContent = `$${ahorroMensual.toFixed(2)}`;
          document.getElementById('resultadoAhorro').classList.remove('d-none');
        });
      }
      
      // Back to top button
      const backToTopButton = document.querySelector('.back-to-top');
      
      window.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
          backToTopButton.classList.add('show');
        } else {
          backToTopButton.classList.remove('show');
        }
      });
      
      backToTopButton.addEventListener('click', (e) => {
        e.preventDefault();
        window.scrollTo({ top: 0, behavior: 'smooth' });
      });
    });
  </script>
</body>
</html>