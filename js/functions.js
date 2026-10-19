document.addEventListener("DOMContentLoaded", function () {

    console.log("JavaScript cargado correctamente");

    // =========================
    // REFERENCIAS AL DOM (declaradas una sola vez)
    // =========================

    const productosContainer  = document.getElementById("product-list");
    const categoriasContainer = document.getElementById("categories");
    const tituloProductos     = document.getElementById("tituloProductos");
    const menuButton          = document.getElementById("menuButton");
    const menuCategorias      = document.getElementById("menuCategorias");

    // =========================
    // LOGIN
    // =========================

    const formulario = document.getElementById("formLogin");

    if (formulario) {
        formulario.addEventListener("submit", function (evento) {
            evento.preventDefault();

            const usuario = document.getElementById("usuario").value.trim();
            const password = document.getElementById("password").value;
            const mensaje = document.getElementById("mensajeLogin");

            if (usuario === "admin" && password === "1234") {
                localStorage.setItem("usuario", usuario);
                window.location.assign("index.html");
            } else if (mensaje) {
                mensaje.textContent = "Usuario o contraseña incorrectos.";
                mensaje.style.color = "red";
            }
        });
    }

    // =========================
    // BOTÓN LOGIN / LOGOUT
    // =========================

    const botonLogin = document.getElementById("botonLogin");

    if (botonLogin) {
        function actualizarBotonLogin() {
            const usuarioGuardado = localStorage.getItem("usuario");

            if (usuarioGuardado) {
                botonLogin.textContent = usuarioGuardado;
                botonLogin.onclick = function () {
                    if (confirm("¿Quieres cerrar sesión?")) {
                        localStorage.removeItem("usuario");
                        window.location.reload();
                    }
                };
            } else {
                botonLogin.textContent = "Log in";
                botonLogin.onclick = function () {
                    window.location.href = "login.html";
                };
            }
        }

        actualizarBotonLogin();
    }

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

    // =========================
    // MENÚ DESPLEGABLE
    // =========================

    if (menuButton && menuCategorias) {
        menuButton.addEventListener("click", function () {
            const estaCerrado = menuCategorias.hidden;

            menuCategorias.hidden = !estaCerrado;
            menuButton.setAttribute("aria-expanded", String(estaCerrado));

            console.log("Menú:", estaCerrado ? "abierto" : "cerrado");
        });
    } else {
        console.error("No se encuentra menuButton o menuCategorias");
    }

    // =========================
    // CARGAR PRODUCTOS
    // =========================

    async function cargarProductos(idCategoria) {
        if (!productosContainer) return;

        productosContainer.textContent = "Cargando productos...";

        try {
            const respuesta = await fetch(
                "php/productesCategoria.php?id_categoria=" +
                encodeURIComponent(idCategoria)
            );

            if (!respuesta.ok) {
                throw new Error("Error HTTP: " + respuesta.status);
            }

            const productos = await respuesta.json();

            productosContainer.replaceChildren();

            if (!Array.isArray(productos) || productos.length === 0) {
                productosContainer.textContent =
                    "No hay productos en esta categoría.";
                return;
            }

            productos.forEach(function (producto) {
                const articulo = document.createElement("article");
                articulo.className = "prod1";

                const titulo = document.createElement("h3");
                titulo.textContent = producto.nom;

                const precio = document.createElement("p");
                const valorPrecio = Number(producto.preu);

                precio.textContent = Number.isFinite(valorPrecio)
                    ? valorPrecio.toFixed(2) + " €"
                    : "Precio no disponible";

                articulo.append(titulo, precio);
                productosContainer.appendChild(articulo);
            });

        } catch (error) {
            console.error("Error al cargar productos:", error);

            productosContainer.textContent =
                "No se pudieron cargar los productos.";
        }
    }

    // =========================
    // CARGAR CATEGORÍAS
    // =========================

    async function cargarCategorias() {
        if (!categoriasContainer) 
        {
            console.warn("No existe el contenedor #categories");
            return;
        }

        try
        {
            const respuesta = await fetch("php/categories.php");

            if (!respuesta.ok) {
                throw new Error("Error HTTP: " + respuesta.status);
            }

            const categorias = await respuesta.json();

            if (!Array.isArray(categorias)) {
                throw new Error("La respuesta no es una lista de categorías");
            }

            categoriasContainer.replaceChildren();

            if (categorias.length === 0) {
                categoriasContainer.textContent =
                    "No hay categorías disponibles.";
                return;
            }

            categorias.forEach(function (categoria) {
                const boton = document.createElement("button");

                boton.type = "button";
                boton.textContent = categoria.nom;

                boton.addEventListener("click", function () {

                    // Cerrar el desplegable
                    if (menuCategorias && menuButton) {
                        menuCategorias.hidden = true;
                        menuButton.setAttribute("aria-expanded", "false");
                    }

                    // Cambiar el título
                    if (tituloProductos) {
                        tituloProductos.textContent = categoria.nom;
                    }

                    // Mostrar los productos
                    cargarProductos(categoria.id_categoria);
                });

                categoriasContainer.appendChild(boton);
            });

            console.log("Categorías cargadas:", categorias.length);

        } catch (error) {
            console.error("Error al cargar categorías:", error);

            categoriasContainer.textContent = "No se pudieron cargar las categorías.";
        }
    }

    cargarCategorias();

});