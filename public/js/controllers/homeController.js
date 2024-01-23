async function cargarEstrenos() {
    try {
        const response = await obtenerPeliculas('home/cargarUltimosEstrenos', 'GET');
        console.log(response);
        return response;
    } catch (error) {
        console.error('Error al cargar estrenos:', error);
        throw error;
    }
}

async function cargarPeliculas() {
    try {
        const response = await obtenerPeliculas('home/cargarPeliculas', 'GET');
        console.log(response);
        return response;
    } catch (error) {
        console.error('Error al cargar películas:', error);
        throw error;
    }
}