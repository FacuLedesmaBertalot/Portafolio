document.addEventListener('DOMContentLoaded', () => {

    // ------------------------------------
    //  MANEJO DEL TEMA (CLARO/OSCURO)
    // ------------------------------------

    const themeToggle = document.getElementById('theme-toggle');
    const htmlElement = document.documentElement;
    const moonIcon = '<i class="bi bi-moon-fill"></i>';
    const sunIcon = '<i class="bi bi-sun-fill"></i>';

    // Seleccionamos todos los elementos de texto que deben cambiar de color
    const themeTextElements = document.querySelectorAll('.theme-text');

    const applyTheme = (theme) => {
        if (theme === 'dark') {
            htmlElement.setAttribute('data-bs-theme', 'dark');
            themeToggle.innerHTML = sunIcon;

            // Cuando es oscuro, añadimos 'text-white' y quitamos 'text-dark'
            themeTextElements.forEach(el => {
                el.classList.add('text-white');
                el.classList.remove('text-dark');
            });

        } else {
            htmlElement.setAttribute('data-bs-theme', 'light');
            themeToggle.innerHTML = moonIcon;

            // Cuando es claro, añadimos 'text-dark' y quitamos 'text-white'
            themeTextElements.forEach(el => {
                el.classList.add('text-dark');
                el.classList.remove('text-white');
            });
        }
    };

    themeToggle.addEventListener('click', () => {
        const currentTheme = htmlElement.getAttribute('data-bs-theme');
        const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
        
        localStorage.setItem('theme', newTheme);
        applyTheme(newTheme);
    });

    // Carga el tema guardado o usa 'dark' por defecto al iniciar
    const savedTheme = localStorage.getItem('theme') || 'dark';
    applyTheme(savedTheme);


    // ------------------------------------
    //  FUNCIONALIDAD DE VER MÁS/MENOS PROYECTOS
    // ------------------------------------

    const setupProjectToggle = () => {
        const showMoreButton = document.getElementById('show-more-projects');
        const hideButton = document.getElementById('hide-projects');
        const extraProjects = document.querySelectorAll('.extra-project');

        // Si no hay botones (porque hay 3 proyectos o menos), no hace nada.
        if (!showMoreButton || !hideButton) return; 

        // Lógica para MOSTRAR proyectos extra
        showMoreButton.addEventListener('click', () => {
            extraProjects.forEach(project => {
                project.classList.remove('d-none'); 
            });

            showMoreButton.classList.add('d-none'); 
            hideButton.classList.remove('d-none'); 
        });

        // Lógica para OCULTAR proyectos extra
        hideButton.addEventListener('click', () => {
            extraProjects.forEach(project => {
                project.classList.add('d-none'); 
            });

            hideButton.classList.add('d-none'); 
            showMoreButton.classList.remove('d-none'); 
            
            // Desplaza la vista suavemente a la sección de proyectos
            document.getElementById('projects').scrollIntoView({ behavior: 'smooth' });
        });
    };

    // Inicializa la funcionalidad de los botones de proyectos
    setupProjectToggle(); 
});