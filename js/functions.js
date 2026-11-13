document.addEventListener("DOMContentLoaded", function () {

    console.log("JavaScript cargado correctamente");

    // =========================
    // CARRUSEL
    // =========================

    const imagen = document.getElementById("imagenCarrusel");

    if (imagen) {
        const imagenes = [
            "./img_carrousel/img1.jpg",
            "./img_carrousel/img2.jpg",
            "./img_carrousel/img3.jpg"
        ];

        let indice = 0;

        function mostrarImagen(nuevoIndice) {
            indice = (nuevoIndice + imagenes.length) % imagenes.length;
            imagen.src = imagenes[indice];
        }

        setInterval(function () {
            mostrarImagen(indice + 1);
        }, 1000);

        const anterior = document.getElementById("anterior");
        const siguiente = document.getElementById("siguiente");

        if (anterior) {
            anterior.addEventListener("click", function () {
                mostrarImagen(indice - 1);
            });
        }

        if (siguiente) {
            siguiente.addEventListener("click", function () {
                mostrarImagen(indice + 1);
            });
        }
    }

});

async function toggleMenu() 
{
    const menu = document.getElementById("menuCategorias");
    const button = document.getElementById("menuButton");

    const abierto = button.getAttribute("aria-expanded") === "true";

    menu.hidden = abierto;
    button.setAttribute("aria-expanded", !abierto);
}

function carrusel_next()
{

}

/*
async function cargarCategorias() {

    const categories = document.getElementById("categories");

    if (categories.dataset.loaded === "true") {
        return;
    }

    try {
        const response = await fetch("../controller/llistar_categories.php");

        if (!response.ok) {
            throw new Error("Error AJAX");
        }

        const datos = await response.json();

        categories.innerHTML = "";

        datos.forEach(categoria => {
            const elemento = document.createElement("p");
            elemento.textContent = categoria.nombre;

            categories.appendChild(elemento);
        });

        categories.dataset.loaded = "true";

    } catch (error) {
        console.error(error);
        categories.textContent = "Error al cargar categorías";
    }
}*/