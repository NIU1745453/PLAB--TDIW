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


    // Consulta AJAX per carregar productes per categoria
    const llista = document.getElementById("product-list");

    if (llista) {
        // Un sol listener per a tot el contingut de #product-list (delegació d'events).
        // Funciona amb elements afegits després per fetch (productes, detall, botons).
        llista.addEventListener("click", function (e) {

            // 1. Clic en una categoria -> carregar els seus productes
            const enllac = e.target.closest(".link-categoria");
            if (enllac) {
                e.preventDefault(); // Evitem que l'enllaç recarregui la pàgina
                carregarProductes(enllac.dataset.categoria);
                return;
            }

            // 2. Clic al botó "Afegir a la cistella" (de moment només el mostrem per consola)
            //    Es comprova abans que .producte per si algun dia el botó està dins d'una targeta.
            const boto = e.target.closest(".afegir-cistella");
            if (boto) {
                console.log("Afegir a la cistella el producte", boto.dataset.id);
                return;
            }

            // 3. Clic al botó "Tornar" -> tornar a la llista de la categoria actual
            if (e.target.closest(".tornar")) {
                carregarProductes(categoriaActual);
                return;
            }

            // 4. Clic en un producte de la llista -> carregar el seu detall
            const producte = e.target.closest(".producte");
            if (producte) {
                carregarDetall(producte.dataset.id);
                return;
            }
        });
    }

});

// Categoria que s'està mostrant ara mateix (la fa servir el botó "Tornar").
// Si la pàgina s'ha carregat directament (index.php?accio=llistar-productes&categoria=X),
// la llegim del títol que ha posat el PHP.
let categoriaActual = null;

document.addEventListener("DOMContentLoaded", function () {
    const titol = document.getElementById("tituloProductos");
    if (titol && new URLSearchParams(location.search).has("categoria")) {
        categoriaActual = titol.textContent.trim();
    }
});

function toggleMenu() 
{
    const menu = document.getElementById("menuCategorias");
    const button = document.getElementById("menuButton");

    const abierto = button.getAttribute("aria-expanded") === "true";

    menu.hidden = abierto;
    button.setAttribute("aria-expanded", !abierto);
}

async function carregarProductes(categoria) {
    const llista = document.getElementById("product-list");
    const titol = document.getElementById("tituloProductos");

    llista.textContent = "Carregant productes...";

    try {
        const response = await fetch(
            "index.php?accio=ajax-productes&categoria=" + encodeURIComponent(categoria)
        );

        if (!response.ok) {
            throw new Error("Error HTTP " + response.status);
        }

        const html = await response.text();
        llista.innerHTML = html;
        if (titol) titol.textContent = categoria;

        // Recordem la categoria per poder-hi tornar des del detall
        categoriaActual = categoria;

    } catch (error) {
        console.error(error);
        llista.textContent = "Error al carregar els productes.";
    }
}

/**
 * Demana al servidor el detall d'un producte i el mostra a #product-list.
 * El servidor (index.php?accio=ajax-detall-producte) retorna un fragment HTML
 * generat per la vista views/detall_producte.php.
 */
async function carregarDetall(id) {
    const llista = document.getElementById("product-list");

    llista.textContent = "Carregant producte...";

    try {
        const response = await fetch(
            "index.php?accio=ajax-detall-producte&id=" + encodeURIComponent(id)
        );

        // Si el producte no existeix, el controlador retorna 404 -> response.ok és false
        if (!response.ok) {
            throw new Error("Error HTTP " + response.status);
        }

        llista.innerHTML = await response.text();

    } catch (error) {
        console.error(error);
        llista.textContent = "Error al carregar el producte.";
    }
}
