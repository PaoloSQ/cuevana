async function cargarPeliculas() {
    try {       
        let filtros = [];
        const pelicula = ObtenerFiltroURL();
        let resultado;
        
        if (!pelicula || pelicula === "" || pelicula === "/") {
            resultado = await obtenerPeliculas('busqueda/cargarPeliculas', 'GET');
        } else {
            filtros = pelicula.split('/');
            
            if (filtros[1].startsWith('search?q=', 0)) {
                filtros[2] = filtros[1].substring('search?q='.length);
                filtros[1] = "search";
            }

            resultado = await obtenerPeliculas('busqueda/cargarPeliculas', 'POST', filtros);
        }   

        return resultado;
    } catch (error) {
        console.error('Error al cargar estrenos:', error);
        throw error;
    }
}

function ObtenerFiltroURL() {
    const parameterKeyword = 'busqueda';
    const parameterIndex = window.location.href.indexOf(parameterKeyword);
    
    if (parameterIndex !== -1) {
        return window.location.href.substring(parameterIndex + parameterKeyword.length);
    } else {
        return null;
    }
}
