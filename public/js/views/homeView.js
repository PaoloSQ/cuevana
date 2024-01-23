// CREA EL HTML DEL CARRUSEL.
function crearItemCarrusel(pelicula) {
    const carouselItem = document.createElement('div');
    carouselItem.classList.add('carousel-item');
    carouselItem.setAttribute('data-bs-target', `#${pelicula.id}`);
    carouselItem.style.backgroundImage = 'url(' + pelicula.backdrop_path + ')';
  
    const itemContainer = document.createElement('div');
    itemContainer.classList.add('item-container');
  
    const estrenoContainer = document.createElement('div');
    estrenoContainer.classList.add('estreno-container');
  
    const estrenoTituloContainer = document.createElement('div');
    estrenoTituloContainer.classList.add('estreno-titulo-container');
  
    const estrenoTitulo = document.createElement('a');
    estrenoTitulo.classList.add('estreno-titulo');
    estrenoTitulo.href = PELICULAS_PHP_URL + (pelicula.original_title.includes(' ') ? pelicula.original_title.replace(/\s+/g, '-') : pelicula.original_title);
    estrenoTitulo.textContent = pelicula.original_title;
  
    const estrenoTipo = document.createElement('span');
    estrenoTipo.classList.add('estreno-tipo');
    estrenoTipo.textContent = 'Pelicula';
  
    const estrenoFecha = document.createElement('span');
    estrenoFecha.classList.add('estreno-fecha');
    estrenoFecha.textContent = pelicula.release_date;
  
    const estrenoDescripcion = document.createElement('p');
    estrenoDescripcion.classList.add('estreno-descripcion');
    estrenoDescripcion.textContent = pelicula.overview;
  
    const botonVerPelicula = document.createElement('a');
    botonVerPelicula.href = PELICULAS_PHP_URL + (pelicula.original_title.includes(' ') ? pelicula.original_title.replace(/\s+/g, '-') : pelicula.original_title);
  
    const iconoPlay = document.createElement('i');
    iconoPlay.classList.add('fa-solid', 'fa-play');
    botonVerPelicula.appendChild(iconoPlay);
  
    botonVerPelicula.innerHTML += 'Ver Película';
    botonVerPelicula.classList.add('boton-ver_pelicula');
  
    estrenoTituloContainer.appendChild(estrenoTitulo);
    estrenoTituloContainer.appendChild(estrenoTipo);
  
    estrenoContainer.appendChild(estrenoTituloContainer);
    estrenoContainer.appendChild(estrenoFecha);
    estrenoContainer.appendChild(estrenoDescripcion);
    estrenoContainer.appendChild(botonVerPelicula);
  
    itemContainer.appendChild(estrenoContainer);
  
    carouselItem.appendChild(itemContainer);
  
    return carouselItem;
  }
  
// CARGA LAS PELÍCULAS Y LAS INCLUYE EN CARRUSEL.
async function crearCarrusel() {
    const carouselInner = document.querySelector('.carousel-inner');
    const carouselIndicators = document.querySelector('.carousel-indicators');

    try {
        const data = await cargarEstrenos();

        for (let i = 0; i < data.length; i++) {
            const pelicula = data[i];

            const carouselItem = crearItemCarrusel(pelicula);

            carouselInner.appendChild(carouselItem);

            const button = document.createElement('button');
            button.type = 'button';
            button.dataset.bsTarget = '#carouselExampleIndicators';
            button.dataset.bsSlideTo = i.toString();
            button.ariaLabel = `Slide ${i + 1}`;

            if (i === 0) {
                button.classList.add('active');
                carouselItem.classList.add('active');
                button.ariaCurrent = 'true';
            }

            carouselIndicators.appendChild(button);
        }
    } catch (error) {
        console.error('Error al cargar estrenos:', error);
    }
}

// CARGA LAS PELÍCULAS Y LAS INCLUYE EN CONTAINER DE PELÍCULAS.
async function cargarPeliculasContainer() {
    const peliculasContainer = document.querySelector('.peliculas-container');

    try {
        const data = await cargarPeliculas();
        
        for (const pelicula of data) {
            const film = await crearFilmPreview(pelicula);
            peliculasContainer.appendChild(film);
        }
    } catch (error) {
        console.error('Error al cargar películas:', error);
    }

    let botonCargarMas = document.createElement('a');
    botonCargarMas.href = BUSQUEDA_URL;
    botonCargarMas.classList.add('boton-load_more');
    botonCargarMas.textContent = 'Cargar más películas';

    peliculasContainer.appendChild(botonCargarMas);
    declararTooltip();
    
}
  
  document.addEventListener('DOMContentLoaded', async function () {
    await crearCarrusel();
    await cargarPeliculasContainer();
  });
  