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
  <link rel="icon" type="image/png" href="/assets/img/favicon.png">
  <link rel="stylesheet" href="/Views/css/styles.css?v=2.0">
</head>

<body class="data-bs-theme">

  <header class="container text-center pt-4 position-relative">
    <button id="theme-toggle" class="btn btn-outline-secondary position-absolute top-0 end-0 mt-3 me-3">
    </button>
    <h1 class="display-2 titulo mt-4 ">Facundo Ledesma</h1>
    <p class="lead mb-0"><?= $lang['hero_subtitle'] ?></p>
  </header>

  <nav class="navbar navbar-expand-md sticky-top custom-nav navbar-dark">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="d-flex align-items-center lang-divider pe-2 pe-md-3">
        <button data-lang="es" class="lang-btn btn btn-link p-0 text-decoration-none fw-bold <?= $idioma === 'es' ? 'text-primary' : 'theme-text opacity-50' ?>">ES</button>
        <span class="mx-2 theme-text opacity-50">/</span>
        <button data-lang="en" class="lang-btn btn btn-link p-0 text-decoration-none fw-bold <?= $idioma === 'en' ? 'text-primary' : 'theme-text opacity-50' ?>">EN</button>
      </div>

      <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-md-end justify-content-center" id="navbarNav">
        <ul class="navbar-nav align-items-center text-center mt-3 mt-md-0">
          <li class="nav-item"><a class="nav-link theme-text px-3 fw-medium" href="#about"><?= $lang['nav_about'] ?></a></li>
          <li class="nav-item"><a class="nav-link theme-text px-3 fw-medium" href="#projects"><?= $lang['nav_projects'] ?></a></li>
          <li class="nav-item"><a class="nav-link theme-text px-3 fw-medium" href="#contact"><?= $lang['nav_contact'] ?></a></li>

          <li class="nav-item d-md-none mt-3 mb-2 w-100 px-3">
            <a href="../download.php" class="btn btn-primary w-100">
              <?= $lang['nav_download_cv'] ?> <i class="bi bi-file-earmark-pdf"></i>
            </a>
          </li>
        </ul>
      </div>

      <a href="../download.php" class="btn btn-outline-primary ms-lg-4 d-none d-md-inline-block">
        <?= $lang['nav_download_cv'] ?> <i class="bi bi-file-earmark-pdf"></i>
      </a>
    </div>
  </nav>

  <main class="container">

    <section id="about" class="py-4 mt-2" data-aos="fade-up">
      <div class="row align-items-center mb-5">
        <div class="col-lg-8 pr-lg-5">
          <h2 class="display-5 mb-4 border-bottom border-primary border-3 d-inline-block pb-2"><?= $lang['about_title'] ?></h2>
          <p class="lead theme-text mb-2">
            <?= $lang['about_p1'] ?>
          </p>
          <p class="theme-text mb-4">
            <?= $lang['about_p2'] ?>
          </p>

          <a href="../download.php" class="btn btn-primary btn-lg shadow-sm d-md-none">
            <?= $lang['nav_download_cv'] ?> <i class="bi bi-file-earmark-pdf-fill ms-2"></i>
          </a>

        </div>

        <div class="col-lg-4 d-none d-lg-block text-center mt-4 mt-lg-0">
          <i class="bi bi-code-slash text-primary hero-icon-bg"></i>
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
                <span class="badge border border-secondary theme-text p-2 mb-1 fs-6">Node.js</span>
                <span class="badge border border-secondary theme-text p-2 mb-1 fs-6">MySQL</span>
              </div>

              <div class="mb-3">
                <h6 class="theme-text mb-2 fw-bold"><i class="bi bi-browser-chrome"></i> <?= $lang['stack_frontend'] ?></h6>
                <span class="badge border border-secondary theme-text p-2 mb-1">HTML</span>
                <span class="badge border border-secondary theme-text p-2 mb-1">CSS</span>
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
      </section>

    </main>

  <footer class="text-center py-3 mt-2 border-top">
    </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="../script.js?v=2.0"></script>
  <script>
    AOS.init();
  </script>

</body>

</html>