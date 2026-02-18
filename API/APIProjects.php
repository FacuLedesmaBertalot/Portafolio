<?php

$idioma_actual = $_SESSION['lang'] ?? 'es';

if ($idioma_actual === 'en') {
    // ==========================================
    // ARRAY DE PROYECTOS EN INGLÉS
    // ==========================================
    $projects = [
        [
            "title" => "Barbershop Appointment System",
            "desc" => "A functional web application to optimize appointment scheduling, allowing clients to register and book appointments intuitively.",
            "long_desc" => "<strong>BarberShop App</strong> is a complete solution to modernize appointment management in barbershops. The platform features a secure authentication system for clients and administrators. Clients can view services, select an available time on a dynamic calendar, and confirm their appointment. The admin panel allows managing all appointments, services, and schedules. The frontend is fully responsive, ensuring an optimal user experience.",
            "tech" => "PHP, MySQL, JavaScript, SASS, Composer, NPM",
            "img" => "../assets/img/fondo.jpeg",
            "link_github" => "https://github.com/FacuLedesmaBertalot/DevWebCamp",
            "link_live" => "#"
        ],
        [
            "title" => "Analytics Dashboard",
            "desc" => "An administrative control panel that visualizes key server data using interactive charts.",
            "long_desc" => "This project consists of a backend that processes and exposes data through a REST API. The frontend consumes this API and uses the Chart.js library to render bar, pie, and line charts, showing metrics such as CPU usage, network traffic, and user registrations in real-time.",
            "tech" => "PHP, Chart.js, API REST",
            "img" => "../assets/img/fondo.jpeg",
            "link_github" => "https://github.com/FacuLedesmaBertalot/UpTask_MVC",
            "link_live" => "#"
        ],
        [
            "title" => "Custom Backend Blog",
            "desc" => "A simple yet powerful blog system with post management and a lightweight SQLite database.",
            "long_desc" => "Development of a blog backend that allows creating, reading, updating, and deleting (CRUD) articles. Pure PHP was used for server logic and SQLite as the database for its simplicity and portability. The frontend is built with TailwindCSS for a fast and modern design.",
            "tech" => "PHP, SQLite, TailwindCSS",
            "img" => "../assets/img/fondo.jpeg",
            "link_github" => "https://github.com/FacuLedesmaBertalot/directorioPaginaProgramacionEstatica",
            "link_live" => "#"
        ],
        [
            "title" => "Salon Appointment System",
            "desc" => "A functional web application to optimize appointment scheduling, allowing clients to register and book appointments intuitively.",
            "long_desc" => "<strong>BarberShop App</strong> is a complete solution to modernize appointment management in hair salons. The platform features a secure authentication system for clients and administrators. Clients can view services, select an available time on a dynamic calendar, and confirm their appointment. The admin panel allows managing all appointments, services, and schedules. The frontend is fully responsive, ensuring an optimal user experience.",
            "tech" => "PHP, MySQL, JavaScript, SASS, Composer, NPM",
            "img" => "../assets/img/fondo.jpeg",
            "link_github" => "https://github.com/FacuLedesmaBertalot/DirectorioAppSalon",
            "link_live" => "#"
        ],
        [
            "title" => "Regal Realty - Real Estate Platform",
            "desc" => "Static web application for a real estate agency, focused on property presentation, DOM manipulation, and user interactivity.",
            "tech" => "HTML5, CSS3, JavaScript (Vanilla)",
            "img" => "../assets/img/RegalRealty.png",
            "link_github" => "https://github.com/FacuLedesmaBertalot/directorioPaginaProgramacionEstatica",
            "link_live" => "https://regalrealty.devledesmabertalot.com/"
        ]
    ];
} else {
    // ==========================================
    // ARRAY DE PROYECTOS EN ESPAÑOL
    // ==========================================
    $projects = [
        [
            "title" => "Sistema de Citas para Peluquería",
            "desc" => "Una aplicación web funcional para optimizar la gestión de turnos, permitiendo a los clientes registrarse y agendar citas de forma intuitiva.",
            "long_desc" => "<strong>BarberShop App</strong> es una solución completa para modernizar la gestión de citas en peluquerías. La plataforma cuenta con un sistema de autenticación seguro para clientes y administradores. Los clientes pueden ver los servicios, seleccionar un horario disponible en un calendario dinámico y confirmar su cita. El panel de administración permite gestionar todos los turnos, servicios y horarios. El frontend es totalmente responsivo, asegurando una experiencia de usuario óptima.",
            "tech" => "PHP, MySQL, JavaScript, SASS, Composer, NPM",
            "img" => "../assets/img/fondo.jpeg",
            "link_github" => "https://github.com/FacuLedesmaBertalot/DevWebCamp",
            "link_live" => "#"
        ],
        [
            "title" => "Dashboard de Analíticas",
            "desc" => "Un panel de control administrativo que visualiza datos clave del servidor utilizando gráficos interactivos.",
            "long_desc" => "Este proyecto consiste en un backend que procesa y expone datos a través de una API REST. El frontend consume esta API y utiliza la librería Chart.js para renderizar gráficos de barras, circulares y de líneas, mostrando métricas como uso de CPU, tráfico de red y registros de usuarios en tiempo real.",
            "tech" => "PHP, Chart.js, API REST",
            "img" => "../assets/img/fondo.jpeg",
            "link_github" => "https://github.com/FacuLedesmaBertalot/UpTask_MVC",
            "link_live" => "#"
        ],
        [
            "title" => "Blog con Backend Propio",
            "desc" => "Un sistema de blog simple pero potente, con gestión de posts y una base de datos ligera SQLite.",
            "long_desc" => "Desarrollo de un backend para un blog que permite crear, leer, actualizar y eliminar (CRUD) artículos. Se utilizó PHP puro para la lógica del servidor y SQLite como base de datos por su simplicidad y portabilidad. El frontend está maquetado con TailwindCSS para un diseño rápido y moderno.",
            "tech" => "PHP, SQLite, TailwindCSS",
            "img" => "../assets/img/fondo.jpeg",
            "link_github" => "https://github.com/FacuLedesmaBertalot/directorioPaginaProgramacionEstatica",
            "link_live" => "#"
        ],
        [
            "title" => "Sistema de Citas para Peluquería",
            "desc" => "Una aplicación web funcional para optimizar la gestión de turnos, permitiendo a los clientes registrarse y agendar citas de forma intuitiva.",
            "long_desc" => "<strong>BarberShop App</strong> es una solución completa para modernizar la gestión de citas en peluquerías. La plataforma cuenta con un sistema de autenticación seguro para clientes y administradores. Los clientes pueden ver los servicios, seleccionar un horario disponible en un calendario dinámico y confirmar su cita. El panel de administración permite gestionar todos los turnos, servicios y horarios. El frontend es totalmente responsivo, asegurando una experiencia de usuario óptima.",
            "tech" => "PHP, MySQL, JavaScript, SASS, Composer, NPM",
            "img" => "../assets/img/fondo.jpeg",
            "link_github" => "https://github.com/FacuLedesmaBertalot/DirectorioAppSalon",
            "link_live" => "#"
        ],
        [
            "title" => "Regal Realty - Plataforma Inmobiliaria",
            "desc" => "Aplicación web estática para una inmobiliaria ficticia, enfocada en la presentación de propiedades, manipulación del DOM e interactividad del usuario.",
            "tech" => "HTML5, CSS3, JavaScript (Vanilla)",
            "img" => "../assets/img/RegalRealty.png",
            "link_github" => "https://github.com/FacuLedesmaBertalot/directorioPaginaProgramacionEstatica",
            "link_live" => "https://regalrealty.devledesmabertalot.com/"
        ]
    ];
}
