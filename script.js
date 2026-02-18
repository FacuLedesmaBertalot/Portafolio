document.addEventListener("DOMContentLoaded", () => {
  // ------------------------------------
  //  MANEJO DEL TEMA (CLARO/OSCURO)
  // ------------------------------------
  const themeToggle = document.getElementById("theme-toggle");
  const htmlElement = document.documentElement;
  const moonIcon = '<i class="bi bi-moon-fill"></i>';
  const sunIcon = '<i class="bi bi-sun-fill"></i>';

  const applyTheme = (theme) => {
    htmlElement.setAttribute("data-bs-theme", theme);
    themeToggle.innerHTML = theme === "dark" ? sunIcon : moonIcon;
  };

  themeToggle.addEventListener("click", () => {
    const currentTheme = htmlElement.getAttribute("data-bs-theme");
    const newTheme = currentTheme === "dark" ? "light" : "dark";
    localStorage.setItem("theme", newTheme);
    applyTheme(newTheme);
  });

  const savedTheme = localStorage.getItem("theme") || "dark";
  applyTheme(savedTheme);

  // ------------------------------------
  //  LÓGICA VER MÁS/MENOS PROYECTOS
  // ------------------------------------
  const setupProjectToggle = () => {
    const showMoreBtn = document.getElementById("show-more-projects");
    const hideBtn = document.getElementById("hide-projects");
    const extraProjects = document.querySelectorAll(".extra-project");

    if (!showMoreBtn || !hideBtn) return;

    showMoreBtn.addEventListener("click", () => {
      extraProjects.forEach((p) => p.classList.remove("d-none"));
      showMoreBtn.classList.add("d-none");
      hideBtn.classList.remove("d-none");
    });

    hideBtn.addEventListener("click", () => {
      extraProjects.forEach((p) => p.classList.add("d-none"));
      hideBtn.classList.add("d-none");
      showMoreBtn.classList.remove("d-none");
      document
        .getElementById("projects")
        .scrollIntoView({ behavior: "smooth" });
    });
  };

  setupProjectToggle();

  // ------------------------------------
  //  MANTENER POSICIÓN DE SCROLL AL CAMBIAR IDIOMA
  // ------------------------------------

  // 1. Restaurar la posición del scroll si venimos de una recarga de idioma
  const scrollPosition = sessionStorage.getItem("scrollPosition");
  if (scrollPosition) {
    // Hacemos el scroll de forma instantánea al cargar la página
    window.scrollTo(0, parseInt(scrollPosition));
    // Limpiamos el dato para que no interfiera en recargas normales
    sessionStorage.removeItem("scrollPosition");
  }

  // 2. Interceptar el clic en los botones de idioma
  const langButtons = document.querySelectorAll(".lang-btn");
  langButtons.forEach((btn) => {
    btn.addEventListener("click", (e) => {
      e.preventDefault();

      sessionStorage.setItem("scrollPosition", window.scrollY);

      const selectedLang = btn.getAttribute("data-lang");

      // Usamos URLSearchParams para mantener cualquier otro parámetro
      // y asegurar que recargue la página actual correctamente
      const url = new URL(window.location.href);
      url.searchParams.set("lang", selectedLang);

      window.location.href = url.toString();
    });
  });
});
