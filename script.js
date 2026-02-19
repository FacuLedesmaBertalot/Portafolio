// RECUPERAR SCROLL SIN PANTALLAZO 
const savedScroll = sessionStorage.getItem("scrollPosition");
if (savedScroll) {
  window.scrollTo(0, parseInt(savedScroll));
  sessionStorage.removeItem("scrollPosition");
}


document.addEventListener("DOMContentLoaded", () => {
  
  // MANEJO DEL TEMA (CLARO/OSCURO)
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


  // LÓGICA VER MÁS/MENOS PROYECTOS
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


  // GUARDAR POSICIÓN AL CAMBIAR IDIOMA
  const langButtons = document.querySelectorAll(".lang-btn");
  langButtons.forEach((btn) => {
    btn.addEventListener("click", (e) => {
      e.preventDefault();

      sessionStorage.setItem("scrollPosition", window.scrollY);

      const selectedLang = btn.getAttribute("data-lang");
      const url = new URL(window.location.href);
      url.searchParams.set("lang", selectedLang);

      window.location.href = url.toString();
    });
  });

  
  // LIMPIAR ALERTAS DE LA URL (CONTACTO)
  if (window.history.replaceState) {
    const currentUrl = new URL(window.location.href);
    if (currentUrl.searchParams.has("status")) {
      currentUrl.searchParams.delete("status");
      window.history.replaceState(null, null, currentUrl.toString());
    }
  }

});