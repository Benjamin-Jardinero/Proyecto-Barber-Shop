<!-- HEADER / INCLUDES -->
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
          <li class="nav-item dropdown" id="dropdown-list">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Yo
              </a>
              <ul class="dropdown-menu dropdown-menu-dark">
                <li><a href="perfil.php"><i class="fa-regular fa-user"></i> Perfil</a></li>
                <li><a href="#"><i class="fa-solid fa-circle-info"></i> Ayuda</a></li>
                <li><a href="../cerrarsesion.php"><i class="fa-solid fa-circle-xmark"></i> Cerrar sesión</a></li>
              </ul>
          </li>
        </ul>
        <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
            <button class="btn btn-outline-light" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
</header>