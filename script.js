document.addEventListener("DOMContentLoaded", function () {
    const enlaces = document.querySelectorAll("nav ul li a");
    const pantallas = document.querySelectorAll(".screen");

    function showScreen(screenId) {
        pantallas.forEach((pantalla) => pantalla.classList.remove("active"));
        document.getElementById(screenId)?.classList.add("active");
    }

    enlaces.forEach((enlace) => {
        enlace.addEventListener("click", function (e) {
            e.preventDefault();
            const pantallaId = this.getAttribute("data-screen");
            showScreen(pantallaId);
        });
    });

    // Mostrar la pantalla "inicio" por defecto
    showScreen("inicio");
});
