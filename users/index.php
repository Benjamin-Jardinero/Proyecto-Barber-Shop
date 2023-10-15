<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Benja Lazarte</title>
    <link rel="icon" href="img/tienda/navaja.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
</head>
<body class="bg-dark">
<!--HEADER / LOGO / NAVEGADOR-->
    <header class="header-nav">
          <nav class="navbar navbar-expand-lg bg-dark navbar-dark ">
           <div class="container-fluid">
              <a class="navbar-brand logo__a" href="index.php">
                <img src="img/logo.png" alt="Logo"  class="d-inline-block align-text-top logo">
              </a>

              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse header__item" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="tienda.php">Tienda</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="sobremi.php">Sobre mí</a>
                  </li>
                   <li class="nav-item">
                    <a class="nav-link" href="contacto.php">Contacto</a>
                  </li>
                </ul>
                
                <div class="dropdown" id="dropdown-list">
                  <a class="btn btn-secondary dropdown-toggle"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-regular fa-user"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-dark">
                    <li><a class="dropdown-item" href="#">Perfil</a></li>
                    <li><a class="dropdown-item" href="#">Ayuda</a></li>
                    <li><a class="dropdown-item" href="../cerrarsesion.php">Cerrar sesión</a></li>
                  </ul>
                </div>

                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">Search</button>
                </form>
              </div>
            </div>
          </nav>
    </header>
<!--SECTION / BANER --->
    <section class="section__inicio">
      <div class="bg-dark div-img">
        <img src="img/section-inicio.jpg" alt="BARBER SHOP" class="container-fluid">
      </div>
      <div class="section__inicio--div">
        <a href="https://api.whatsapp.com/send?phone=541127088361"><i class="bi bi-whatsapp"></i> ¡Reserva tu turno! </a>
      </div>
    </section>
<!--ASIDE / CORTES -->
    <aside id="grilla__aside--principal" class="bg-dark">
      <div class="cortes__modernos">
          <div>
            <img src="img/Cortes modernos.jpg" alt="Cortes modernos">
          </div>
          <div>
            <h1>¡Cortes de pelo Modernos!</h1>
            <p>Tenemos variedades de cortes modernos para que el cliente se vaya con un buen corte de pelo, realizado por los mejores barberos, peluqueros y estilistas de toda Argentina.</p>
          </div>
      </div>
      <div class="cortes__clasicos">
        <div>
          <img src="img/Cortes clasicos.jpg" alt="Cortes clasicos">
        </div>
        <div>
            <h1>¡Cortes clasicos!</h1>
            <p>Realizamos cortes de pelo clasicos, hechos por peluqueros con amplia experiencia en este tipo de cortes.</p>
        </div>
      </div>
      <div class="cortes__niños">
        <div>
          <img src="img/Corte niños.jpg" alt="Cortes de niños">
        </div>
        <div>
            <h1>¡Cortes para niños!</h1>
            <p>Nos encontramos cortando el pelo a niños, con ayuda de profesionales en lo que es el area de Kids.</p>
      </div>
        </div>
        
      </div>
      <div class="cortes__estilistas">
        <div>
          <img src="img/estilistas profesionales.jpg" alt="estilistas profesionales">
        </div>
        <div>
            <h1>¡Cortes de estilistas!</h1>
            <p>En nuestra compania, contamos con los mejores estilistas que pueda haber en toda la Argentina, con mas de 10 años de experiencia, en lo que es lavado,secado, corte, etc.</p>
        </div>
      </div>
    </aside>
<!--FOOTER / REDES SOCIALES-->
    <footer class="bg-dark footer-redes">
      <div class="footer__div--redes">
        <ul>
          <li><a href="#"><i class="fa-brands fa-whatsapp"></i><span> Whatsapp</span></a></li>
          <li><a href="https://www.facebook.com/BenjaCARP2"><i class="fa-brands fa-facebook-square"></i><span> Facebook</span></a></li>
          <li><a href="https://www.instagram.com/benja_laza"><i class="fa-brands fa-instagram"></i><span> Instagram</span></a></li>
          <li><a href="https://twitter.com/BenjaLaza1"><i class="fa-brands fa-twitter"></i><span> Twitter</span></a></li>
        </ul>
      </div>
      <div class="footer-copy">
        <p><i class="fa-solid fa-copyright"></i> Todos los derechos estan reservados 2022</p>
      </div>
      </footer>

    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/ffb39b6180.js" crossorigin="anonymous"></script>
  </body>
</html>