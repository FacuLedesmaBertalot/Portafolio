<?php
session_start();

if (isset($_GET['lang'])) {
    $idioma = $_GET['lang'];
    $_SESSION['lang'] = $idioma;
} else {
    $idioma = $_SESSION['lang'] ?? 'es';
}

if (!in_array($idioma, ['es', 'en'])) {
    $idioma = 'es';
}

$lang = require_once __DIR__ . "/../Lang/" . $idioma . ".php";
require_once __DIR__ . "/../API/APIProjects.php";
?>

<!DOCTYPE html>
<html lang="<?= $idioma ?>" data-bs-theme="dark">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= $lang['title'] ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="/Views/css/styles.css">
</head>

<body class="data-bs-theme">

  <header class="container text-center py-2 position-relative">
    <button id="theme-toggle" class="btn btn-outline-secondary position-absolute top-0 end-0 mt-3 me-3">
    </button>

    <h1 class="display-2 titulo mt-4">Facundo Ledesma</h1>
    <p class="lead"><?= $lang['hero_subtitle'] ?></p>
  </header>

  <nav class="nav justify-content-center py-3 mb-4 align-items-center sticky-top custom-nav">

    <div class="d-flex align-items-center me-2 me-md-4 border-end pe-3 pe-md-4" style="border-color: var(--card-border) !important;">
      <button data-lang="es" class="lang-btn btn btn-link p-0 text-decoration-none fw-bold <?= $idioma === 'es' ? 'text-primary' : 'theme-text opacity-50' ?>">ES</button>
      <span class="mx-2 theme-text opacity-50">/</span>
      <button data-lang="en" class="lang-btn btn btn-link p-0 text-decoration-none fw-bold <?= $idioma === 'en' ? 'text-primary' : 'theme-text opacity-50' ?>">EN</button>
    </div>

    <a class="nav-link theme-text px-2 px-md-3 fw-medium" href="#about"><?= $lang['nav_about'] ?></a>
    <a class="nav-link theme-text px-2 px-md-3 fw-medium" href="#projects"><?= $lang['nav_projects'] ?></a>
    <a class="nav-link theme-text px-2 px-md-3 fw-medium" href="#contact"><?= $lang['nav_contact'] ?></a>

    <a href="../assets/docs/Facundo_Ledesma_CV_<?= $idioma ?>.pdf" class="btn btn-outline-primary ms-3 ms-lg-4 d-none d-md-inline-block" download>
      <?= $lang['nav_download_cv'] ?> <i class="bi bi-file-earmark-pdf"></i>
    </a>

  </nav>

  <main class="container">

    <section id="about" class="py-4 mt-2" data-aos="fade-up">
      <div class="row align-items-center mb-5">
        <div class="col-lg-8 pr-lg-5">
          <h2 class="display-5 mb-4 fw-bold titulo border-bottom border-primary border-3 d-inline-block pb-2"><?= $lang['about_title'] ?></h2>
          <p class="lead theme-text mb-3">
            <?= $lang['about_p1'] ?>
          </p>
          <p class="theme-text mb-4">
            <?= $lang['about_p2'] ?>
          </p>

          <a href="../assets/docs/Facundo_Ledesma_CV.pdf" class="btn btn-primary btn-lg shadow-sm d-md-none" download>
            <?= $lang['nav_download_cv'] ?> <i class="bi bi-file-earmark-pdf-fill ms-2"></i>
          </a>
        </div>

        <div class="col-lg-4 d-none d-lg-block text-center mt-4 mt-lg-0">
          <i class="bi bi-code-slash text-primary" style="font-size: 10rem; opacity: 0.8;"></i>
        </div>
      </div>

      <div class="row g-4 mb-5">
        <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="card h-100 shadow-sm border-0 bg-transparent">
            <div class="card-body p-4 border rounded">
              <h4 class="card-title mb-4 titulo"><i class="bi bi-pc-display me-2 text-primary"></i> <?= $lang['stack_title'] ?></h4>

              <div class="mb-3">
                <h6 class="theme-text mb-2 fw-bold"><i class="bi bi-database"></i> <?= $lang['stack_backend'] ?></h6>
                <span class="badge border border-secondary theme-text p-2 mb-1 fs-6">PHP</span>
                <span class="badge border border-secondary theme-text p-2 mb-1 fs-6">MySQL</span>
              </div>

              <div class="mb-3">
                <h6 class="theme-text mb-2 fw-bold"><i class="bi bi-browser-chrome"></i> <?= $lang['stack_frontend'] ?></h6>
                <span class="badge border border-secondary theme-text p-2 mb-1">HTML5</span>
                <span class="badge border border-secondary theme-text p-2 mb-1">CSS3</span>
                <span class="badge border border-secondary theme-text p-2 mb-1">JavaScript</span>
                <span class="badge border border-secondary theme-text p-2 mb-1">SASS</span>
                <span class="badge border border-secondary theme-text p-2 mb-1">Bootstrap</span>
              </div>

              <div>
                <h6 class="theme-text mb-2 fw-bold"><i class="bi bi-tools"></i> <?= $lang['stack_tools'] ?></h6>
                <span class="badge border border-secondary theme-text p-2 mb-1">Composer</span>
                <span class="badge border border-secondary theme-text p-2 mb-1">NPM</span>
                <span class="badge border border-secondary theme-text p-2 mb-1">Git / GitHub</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="card h-100 shadow-sm border-0 bg-transparent">
            <div class="card-body p-4 border rounded">
              <h4 class="card-title mb-4 titulo"><i class="bi bi-rocket-takeoff me-2 text-primary"></i> <?= $lang['learning_title'] ?></h4>

              <ul class="list-group list-group-flush bg-transparent">
                <li class="list-group-item bg-transparent theme-text d-flex align-items-center border-bottom-0 pb-3">
                  <i class="bi bi-check-circle text-secondary me-3 fs-5"></i>
                  <div>
                    <strong>Laravel</strong><br>
                    <small class="text-muted"><?= $lang['learning_laravel'] ?></small>
                  </div>
                </li>
                <li class="list-group-item bg-transparent theme-text d-flex align-items-center border-bottom-0 pb-3">
                  <i class="bi bi-check-circle text-secondary me-3 fs-5"></i>
                  <div>
                    <strong>Docker</strong><br>
                    <small class="text-muted"><?= $lang['learning_docker'] ?></small>
                  </div>
                </li>
                <li class="list-group-item bg-transparent theme-text d-flex align-items-center border-bottom-0 pb-3">
                  <i class="bi bi-check-circle text-secondary me-3 fs-5"></i>
                  <div>
                    <strong>React</strong><br>
                    <small class="text-muted"><?= $lang['learning_react'] ?></small>
                  </div>
                </li>
                <li class="list-group-item bg-transparent theme-text d-flex align-items-center border-bottom-0 pb-3">
                  <i class="bi bi-check-circle text-secondary me-3 fs-5"></i>
                  <div>
                    <strong>Tailwind CSS</strong><br>
                    <small class="text-muted"><?= $lang['learning_tailwind'] ?></small>
                  </div>
                </li>
                <li class="list-group-item bg-transparent theme-text d-flex align-items-center border-bottom-0">
                  <i class="bi bi-check-circle text-secondary me-3 fs-5"></i>
                  <div>
                    <strong>Python</strong><br>
                    <small class="text-muted"><?= $lang['learning_python'] ?></small>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>

      </div>

      <div class="row text-center mt-5" data-aos="fade-up" data-aos-delay="300">
        <div class="col-12">
          <h4 class="mb-4 titulo"><?= $lang['skills_title'] ?></h4>
          <div class="d-flex flex-wrap justify-content-center gap-2">
            <span class="badge border border-secondary text-secondary p-2 px-3 fs-6 rounded-pill"><?= $lang['skill_1'] ?></span>
            <span class="badge border border-secondary text-secondary p-2 px-3 fs-6 rounded-pill"><?= $lang['skill_2'] ?></span>
            <span class="badge border border-secondary text-secondary p-2 px-3 fs-6 rounded-pill"><?= $lang['skill_3'] ?></span>
            <span class="badge border border-secondary text-secondary p-2 px-3 fs-6 rounded-pill"><?= $lang['skill_4'] ?></span>
          </div>
        </div>
      </div>
    </section>

    <section id="projects" class="py-5" data-aos="fade-up">
      <h2 class="display-5 mb-4 border-bottom border-primary border-3 d-inline-block pb-2"><?= $lang['projects_title'] ?></h2>
      <div class="row gy-4 mt-2">
        <?php
        $max_visible = 3;
        $total_projects = count($projects);

        foreach ($projects as $index => $project):
          $card_classes = ($index >= $max_visible) ? 'd-none extra-project' : '';
        ?>
          <div class="col-md-6 col-lg-4 <?= $card_classes; ?>" data-aos="fade-up">
            <div class="card h-100 shadow-sm">
              <img src="<?= $project['img'] ?>" class="card-img-top" alt="<?= $project['title'] ?>">
              <div class="card-body d-flex flex-column">
                <h5 class="card-title fw-bold"><?= $project['title'] ?></h5>
                <p class="card-text"><?= $project['desc'] ?></p>
                <p class="card-text mb-4"><small class="theme-text"><strong><?= $lang['projects_tech'] ?></strong> <?= $project['tech'] ?></small></p>

                <div class="mt-auto d-flex flex-wrap gap-2">

                  <?php if (!empty($project['link_github']) && $project['link_github'] !== '#'): ?>
                    <a href="<?= $project['link_github'] ?>" target="_blank" class="btn btn-outline-theme flex-grow-1"><i class="bi bi-github"></i> <?= $lang['projects_btn_code'] ?></a>
                  <?php endif; ?>

                  <?php if (!empty($project['link_live']) && $project['link_live'] !== '#'): ?>
                    <a href="<?= $project['link_live'] ?>" target="_blank" class="btn btn-primary flex-grow-1"><?= $lang['projects_btn_demo'] ?></a>
                  <?php endif; ?>

                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <?php if ($total_projects > $max_visible): ?>
        <div class="text-center mt-5">
          <button id="show-more-projects" class="btn btn-outline-primary px-4 py-2">
            <?= $lang['projects_btn_more'] ?> <i class="bi bi-arrow-down-circle ms-2"></i>
          </button>

          <button id="hide-projects" class="btn btn-outline-secondary px-4 py-2 d-none">
            <?= $lang['projects_btn_less'] ?> <i class="bi bi-arrow-up-circle ms-2"></i>
          </button>
        </div>
      <?php endif; ?>
    </section>

    <section id="contact" class="py-5 text-center" data-aos="fade-up">
      <h2 class="display-5 mb-4 border-bottom border-primary border-3 d-inline-block pb-2"><?= $lang['contact_title'] ?></h2>
      <p class="fs-5 mt-4">
        <i class="bi bi-envelope-fill text-primary"></i>
        <a href="mailto:faculedesmabertalot@gmail.com" class="theme-text ms-2">faculedesmabertalot@gmail.com</a>
      </p>
      <p class="fs-2 mt-3">
        <a href="https://github.com/FacuLedesmaBertalot" target="_blank" class="theme-text mx-3"><i class="bi bi-github"></i></a>
        <a href="https://www.linkedin.com/in/facundo-ledesma-23737b185/" target="_blank" class="theme-text mx-3"><i class="bi bi-linkedin"></i></a>
      </p>
    </section>
  </main>

  <footer class="text-center py-4 mt-5 bg-secondary text-white">
    <p class="mb-0">© 2026 Facundo Ledesma | <?= $lang['footer_text'] ?> <i class="bi bi-laptop"></i> y <i class="bi bi-cup-hot-fill"></i></p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="../script.js"></script>
  <script>
    AOS.init();
  </script>

</body>

</html>