// Crea la informacion HTML
function crearInformacion(pelicula) {
    const article = document.createElement('article');
    article.classList.add('info-article');

    const img = document.createElement('img');
    img.src = pelicula.poster_path;
    img.alt = pelicula.original_title;

    const tituloContainer = document.createElement('div');
    tituloContainer.classList.add('titulo-container');

    const h2 = document.createElement('h2');
    h2.textContent = pelicula.original_title;

    const p = document.createElement('p');
    p.textContent = pelicula.original_title;

    tituloContainer.appendChild(h2);
    tituloContainer.appendChild(p);

    const datosContainer = document.createElement('div');
    datosContainer.classList.add('datos-container');

    const datos = document.createElement('div');
    datos.classList.add('datos');

    const valoracion = document.createElement('span');
    valoracion.classList.add('valoracion');
    valoracion.textContent = pelicula.vote_average.toFixed(2) + "%";

    const duracion = document.createElement('p');
    duracion.textContent = '110 Min.';

    const anio = document.createElement('p');
    anio.textContent = pelicula.release_date;

    datos.appendChild(valoracion);
    datos.appendChild(duracion);
    datos.appendChild(anio);

    const redesSocialesContainer = document.createElement('div');
    redesSocialesContainer.classList.add('redes-sociales-container');

    const shareIcon = document.createElement('i');
    shareIcon.classList.add('fa-solid', 'fa-share-nodes');

    const shareText = document.createElement('span');
    shareText.classList.add('white-text');
    shareText.textContent = 'Compartir';

    const facebookIcon = document.createElement('i');
    facebookIcon.classList.add('fa-brands', 'fa-facebook');

    const twitterIcon = document.createElement('i');
    twitterIcon.classList.add('fa-brands', 'fa-twitter');

    redesSocialesContainer.appendChild(shareIcon);
    redesSocialesContainer.appendChild(shareText);
    redesSocialesContainer.appendChild(facebookIcon);
    redesSocialesContainer.appendChild(twitterIcon);

    datosContainer.appendChild(datos);
    datosContainer.appendChild(redesSocialesContainer);

    const descripcion = document.createElement('p');
    descripcion.classList.add('descripcion');
    descripcion.textContent = pelicula.overview;

    const datosExtraContainer = document.createElement('div');
    datosExtraContainer.classList.add('datos-extra-container');

    const generoP = document.createElement('p');
    generoP.textContent = `Género: `;
    const generoSpan = document.createElement('span');
    generoSpan.classList.add('white-text');
    generoSpan.textContent =  `${Array.isArray(pelicula.genres) ? 
        pelicula.genres.join(', ') : 
        pelicula.genres}`;       

    generoP.appendChild(generoSpan);

    const actoresP = document.createElement('p');
    actoresP.textContent = `Actores: `;

    datosExtraContainer.appendChild(generoP);
    datosExtraContainer.appendChild(actoresP);

    article.appendChild(img);
    article.appendChild(tituloContainer);
    article.appendChild(datosContainer);
    article.appendChild(descripcion);
    article.appendChild(datosExtraContainer);

    document.querySelector('.info-section').style.background = `url('${pelicula.backdrop_path}')`;
    document.querySelector('.info-section').appendChild(article);
}


//Crea el video

function crearVideo(urlVideo) {
    const peliculaContainer = document.querySelector('.pelicula-container');

    function obtenerIDYoutube(url) {
        const match = url.match(/[?&]v=([^&]+)/);
        return match ? match[1] : url;
    }

    const iframe = document.createElement('iframe');
    iframe.src = `https://www.youtube.com/embed/${obtenerIDYoutube(urlVideo)}`;
    iframe.allowFullscreen = true;

    peliculaContainer.insertBefore(iframe, peliculaContainer.firstChild);
}


document.addEventListener('DOMContentLoaded', async function () {
    try {
        let pelicula = await cargarInfo();
        crearInformacion(pelicula);

        let video = await cargarVideo(pelicula.id);
        crearVideo(video);
    } catch (error) {
        console.error('Error al cargar la pelicula:', error);
    }
});



