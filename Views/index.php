<?php
  require_once __DIR__ . '/../API/APIProjects.php';
?>
<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Facundo Ledesma | Backend Developer</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body class="data-bs-theme">

  <header class="container text-center py-2 position-relative">
    <button id="theme-toggle" class="btn btn-outline-secondary position-absolute top-0 end-0 mt-3 me-3">
    </button>

    <h1 class="display-2">Facundo Ledesma</h1>
    <p class="lead">Backend Developer</p>
    <nav class="nav justify-content-center mt-4">
      <a class="nav-link theme-text" href="#about">Sobre mí</a>
      <a class="nav-link theme-text" href="#projects">Proyectos</a>
      <a class="nav-link theme-text" href="#contact">Contacto</a>
    </nav>
  </header>

  <main class="container">
    <section id="about" class="py-5" data-aos="fade-up">
      <h2 class="display-5 mb-4">Sobre mí</h2>
      <p>
        Soy un desarrollador web en formación, actualmente cursando la Tecnicatura en Desarrollo Web en la Universidad Nacional del Comahue. Aunque tengo una sólida comprensión del desarrollo Full Stack, mi gran pasión y objetivo profesional es especializarme en el Backend. Disfruto creando la lógica, la estructura y las bases de datos que dan vida a las aplicaciones web, buscando siempre soluciones robustas y escalables. Cuento con un nivel de inglés B1/B2, lo que me permite consumir documentación técnica y colaborar en entornos bilingües.

        Siempre en busca de nuevos desafíos, estoy expandiendo activamente mis habilidades para seguir creciendo como profesional del desarrollo.
      </p>
      <div class="row text-center">
        <div class="col-lg-6">
          <h3 class="mb-3">💻 Tecnologías que manejo</h3>
          <ul class="list-unstyled p-2">
            <li><strong>Backend:</strong> PHP, MySQL</li>
            <li><strong>Frontend:</strong> HTML, CSS, JavaScript, SASS, Bootstrap</li>
            <li><strong>Herramientas:</strong> Composer, NPM, Git</li>
          </ul>
        </div>

        <div class="col-lg-6 mt-4 mt-lg-0">
          <h3 class="mb-3">🚀 Actualmente aprendiendo</h3>
          <ul class="list-unstyled p-2">
            <li>Laravel (PHP Framework)</li>
            <li>React (Librería de JavaScript)</li>
            <li>Tailwind CSS (CSS Framework)</li>
            <li>Python</li>
          </ul>
        </div>
      </div>
    </section>

<section id="projects" class="py-5 " data-aos="fade-up">
      <h2 class="display-5 mb-4">Proyectos destacados</h2>
      <div class="row gy-4">
        <?php
        $max_visible = 3;
        $total_projects = count($projects);

        foreach ($projects as $index => $project):
          $card_classes = ($index >= $max_visible) ? 'd-none extra-project' : '';
        ?>
          <div class="col-md-6 col-lg-4 <?= $card_classes; ?>">
            <div class="card bg-dark h-100 border-light">
              <img src="<?= $project['img'] ?>" class="card-img-top" alt="<?= $project['title'] ?>">
              <div class="card-body d-flex flex-column">
                <h5 class="card-title"><?= $project['title'] ?></h5>
                <p class="card-text"><?= $project['desc'] ?></p>
                <p class="card-text mb-4"><small class="text-light"><strong>Tecnologías:</strong> <?= $project['tech'] ?></small></p>
                
                <div class="mt-auto d-flex flex-wrap gap-2">
                  
                  <a href="proyecto.php?id=<?= $index ?>" class="btn btn-dark flex-grow-1">Más Info</a>
                  
                  <?php if (!empty($project['link_github']) && $project['link_github'] !== '#'): ?>
                    <a href="<?= $project['link_github'] ?>" target="_blank" class="btn btn-outline-light flex-grow-1"><i class="bi bi-github"></i> Código</a>
                  <?php endif; ?>
                  
                  <?php if (!empty($project['link_live']) && $project['link_live'] !== '#'): ?>
                    <a href="<?= $project['link_live'] ?>" target="_blank" class="btn btn-primary flex-grow-1">Ver Demo</a>
                  <?php endif; ?>

                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <?php if ($total_projects > $max_visible): ?>
        <div class="text-center mt-5">
          <button id="show-more-projects" class="btn btn-outline-primary">
            Ver Más <i class="bi bi-arrow-down-circle"></i>
          </button>

          <button id="hide-projects" class="btn btn-outline-secondary d-none">
            Ver Menos <i class="bi bi-arrow-up-circle"></i>
          </button>
        </div>
      <?php endif; ?>
    </section>

    <section id="contact" class="py-5 text-center" data-aos="fade-up">
      <h2 class="display-5 mb-4">Contacto</h2>
      <p class="fs-5">
        <i class="bi bi-envelope-fill"></i>
        <a href="mailto:faculedesmabertalot@gmail.com" class="">faculedesmabertalot@gmail.com</a>
      </p>
      <p class="fs-4">
        <a href="https://github.com/FacuLedesmaBertalot" target="_blank" class="theme-text mx-2"><i class="bi bi-github"></i></a>
        <a href="https://www.linkedin.com/in/facundo-ledesma-23737b185/" target="_blank" class="theme-text mx-2"><i class="bi bi-linkedin"></i></a>
      </p>
    </section>
  </main>

  <footer class="text-center py-4 mt-5 bg-secondary">
    <p class="mb-0">© 2025 Facundo Ledesma | Hecho con <i class="bi bi-laptop"></i> y <i class="bi bi-cup-hot-fill"></i></p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="../script.js"></script>
  <script>
    AOS.init();
  </script>


</body>

</html>