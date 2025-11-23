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