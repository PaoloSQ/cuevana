async function obtenerPeliculaIndividual(url, method, nombre) {
    let UrlFinal = 'index.php?url=' + url;
    let data = { nombre: nombre };
    return FetchRequest(UrlFinal, method, data);
}

async function obtenerVideoPelicula(url, method, id) {
    let UrlFinal = 'index.php?url=' + url;
    let data = { id: id };
    return FetchRequest(UrlFinal, method, data);
}

async function obtenerPeliculas(url, method, filtros = []) {
    const pageParam = filtros.find(filtro => filtro.includes('page='));
    const page = pageParam ? parseInt(pageParam.split('=')[1]) : 1;

    let UrlFinal = 'index.php?url=' + url;
    let data = { filtros: filtros, page : page};
    return FetchRequest(UrlFinal, method, data);
}
