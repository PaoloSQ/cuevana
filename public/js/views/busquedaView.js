document.addEventListener('DOMContentLoaded', async function () {
    try {
        const data = await cargarPeliculas();

        const titulo = data.titulo;
        const peliculas = data.peliculas;
        
        document.querySelector(".titulo").innerHTML = titulo;

        peliculas.forEach(pelicula => {
            document.querySelector(".preview-container").appendChild(crearFilmPreview(pelicula));
        });

        declararTooltip();

    } catch (error) {
        console.error('Error al cargar la película:', error);
    }
});
