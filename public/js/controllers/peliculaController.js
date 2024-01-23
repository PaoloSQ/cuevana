async function cargarInfo() {
    try {       
        const pelicula = ObtenerPeliculaURL();

        if(!pelicula) throw "No existe la pelicula";

        const response = await obtenerPeliculaIndividual('pelicula/obtenerPelicula', 'POST', pelicula);
        return response;
    } catch (error) {
        console.error('Error al cargar estrenos:', error);
        throw error;
    }
}

async function cargarVideo(id) {
    try {       
        const response = await obtenerVideoPelicula('pelicula/obtenerVideo', 'POST', id);
        return response;
    } catch (error) {
        console.error('Error al cargar estrenos:', error);
        throw error;
    }
}

function ObtenerPeliculaURL(){
    const parameterKeyword = 'pelicula/';
    const parameterIndex = window.location.pathname.indexOf(parameterKeyword);
    
    if (parameterIndex !== -1) {
        const pelicula = window.location.pathname.substring(parameterIndex + parameterKeyword.length);
        return pelicula;
    } else {
        return null;
    }
}
