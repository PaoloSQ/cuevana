// URL CONSTANTES
const BASE_URL = 'https://www.paolosq.com/proyectos/cuevana/';
const CSS_URL = BASE_URL + 'public/css/';
const JS_URL = BASE_URL + 'public/js/';
const IMG_URL = BASE_URL + 'public/img/';
const BUSQUEDA_URL = BASE_URL + 'busqueda/';
const PELICULAS_URL = BASE_URL + 'public/peliculas/';
const PELICULAS_PHP_URL = BASE_URL + 'pelicula/';

// HOVER CON JS PARA LOS DROPDOWN DEL NAVBAR
document.addEventListener("DOMContentLoaded", function() {
    
    let dropdownButton = document.querySelectorAll('.dropdown-toggle');
    let dropdownMenu =document.querySelectorAll('.dropdown-menu');

    for (let i = 0; i < dropdownButton.length; i++) {
        const button = dropdownButton[i];
        const menu = dropdownMenu[i];

        button.addEventListener('mouseenter', function () {
            button.click();
        });

        button.addEventListener('mouseleave', function () {
            document.dispatchEvent(new Event('click'));
        });

        menu.addEventListener('mouseenter', function () {
            button.click();
        });

        menu.addEventListener('mouseleave', function () {
            document.dispatchEvent(new Event('click'));
        });
    }
  });

// TOOLTIP BOOTSTRAP

function declararTooltip(){
    document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach((tooltip) => {
        new bootstrap.Tooltip(tooltip);
    });
}

// NAV MOBILE

const menuBoton = document.querySelector("#menu-boton");
const navMobile = document.querySelector("#nav-mobile");
const sombra = document.querySelector("#sombra");
const nav = document.querySelector("nav");

menuBoton.addEventListener("click", function(){

    navMobile.classList.toggle("show");
    sombra.classList.toggle("show");
    nav.classList.toggle("nav-fixed");
})

// CREAR CONTENEDOR DE PREVIEWS
function crearFilmPreview(film) {
    const button = document.createElement('button');
    button.type = 'button';
    button.classList.add('preview');
    button.dataset.bsToggle = 'tooltip';
    button.dataset.bsHtml = 'true';
    button.setAttribute('data-bs-target', `#${film.id}`);
  
    const tooltipContent = `
        <div class='preview-hover'>
            <h4 class='ph-title'>${film.original_title}</h4>
            <div class='ph-info'>
                <p class='info-valoracion'>${film.vote_average}/10</p>
                <p class='info-fecha'>${film.release_date}</p>
            </div>
            <div class='ph-description'>
                <p>${film.overview}</p>
                ${film.genres ? 
                    `<p><span class='white-text'>Géneros: ${Array.isArray(film.genres) ? 
                        film.genres.join(', ') : 
                        film.genres}</span></p>` : ''}                
            </div>
        </div>
    `;
  
    button.dataset.bsTitle = tooltipContent;
  
      const imgContainer = document.createElement('a');
      imgContainer.href = PELICULAS_PHP_URL + (film.original_title.includes(' ') ? film.original_title.replace(/\s+/g, '-') : film.original_title);
      imgContainer.classList.add('preview-img-container');
  
      const img = document.createElement('img');
      img.src = film.poster_path;
      img.alt = film.original_title;
  
      const lanzamiento = document.createElement('span');
      lanzamiento.classList.add('preview-lanzamiento');
      lanzamiento.textContent = film.release_date;
  
      imgContainer.appendChild(img);
      imgContainer.appendChild(lanzamiento);
  
      const title = document.createElement('a');
      title.href = PELICULAS_PHP_URL + (film.original_title.includes(' ') ? film.original_title.replace(/\s+/g, '-') : film.original_title);
      title.classList.add('preview-title', 'link');
      title.textContent = film.original_title;
  
      const playIcon = document.createElement('a');
      playIcon.classList.add('preview-play', 'fa-solid', 'fa-play');
      playIcon.href = PELICULAS_PHP_URL + (film.original_title.includes(' ') ? film.original_title.replace(/\s+/g, '-') : film.original_title);
  
      button.appendChild(imgContainer);
      button.appendChild(title);
      button.appendChild(playIcon);
  
      return button;
  }
  
  
  // FUNCIONALIDAD BUSCADOR
  document.addEventListener("DOMContentLoaded", function () {
    const searchMobile = document.querySelector("#search-input-mobile");
    const botonMobile = document.querySelector("#search-button-mobile");
  
    const searchDefault = document.querySelector("#search-input-default");
    const botonDefault = document.querySelector("#search-button-default");
  
    botonDefault.addEventListener("click", function () {
      const busqueda = searchDefault.value.replace(/ /g, "-");
      location.href = BUSQUEDA_URL + 'search?q=' + busqueda;
    });
  
    botonMobile.addEventListener("click", function () {
      const busqueda = searchMobile.value.replace(/ /g, "-");
      location.href = BUSQUEDA_URL + 'search?q=' + busqueda;
    });
  });
  