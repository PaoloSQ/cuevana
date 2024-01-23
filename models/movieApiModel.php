<?php
class MovieApiModel extends Model
{
    private $urlBaseApi = 'https://api.themoviedb.org/3/';
    private $claveApi = '9c4fc029ecddbadd93329f2ef8e0ad3e';
    private $generosCache;

    public function obtenerNombreGenero($id){
        $this->cargarGeneros();

        return $this->generosCache[$id];
    }

    public function obtenerUltimosEstrenos(){
        $result = $this->obtenerPeliculas($this->getRuta('movie/now_playing'));
        return array_slice($result, 0 , 5);
    }

    public function obtenerPeliculasRecientes()
    {
        return $this->obtenerPeliculas($this->getRuta('movie/popular'));
    }

    public function obtenerDetallesPorNombre($tituloOriginal)
    {
        $this->cargarGeneros();


        $parametros = ['language' => 'es-ES', 'query' => $tituloOriginal];
        $respuesta = $this->hacerSolicitudApi('GET', $this->getRuta('search/movie'), $parametros);

        if (count($respuesta['results']) > 0) {
            $pelicula = $respuesta['results'][0];

            $pelicula['backdrop_path'] = "https://image.tmdb.org/t/p/original" . $pelicula['backdrop_path'];
            $pelicula['poster_path'] = "https://image.tmdb.org/t/p/original" . $pelicula['poster_path'];
            $pelicula['release_date'] = date('Y', strtotime($pelicula['release_date']));
            $pelicula['genres'] = [];
                foreach ($pelicula['genre_ids'] as $genreId) {
                    if (isset($this->generosCache[$genreId])) {
                        $pelicula['genres'][] = $this->generosCache[$genreId];
                    }
                }
            $pelicula['vote_average'] = round($pelicula['vote_average'], 1);

            return $pelicula;
        } else {
            return [];
        }
    }

    public function obtenerVideo($peliculaId){

    $parametros = ['language' => 'es-ES'];
    $respuesta = $this->hacerSolicitudApi('GET', $this->getRuta("movie/{$peliculaId}/videos"), $parametros);

    if (isset($respuesta['results']) && count($respuesta['results']) > 0) {
        $videoKey = $respuesta['results'][0]['key'];
        $videoUrl = "https://www.youtube.com/watch?v={$videoKey}";

        return $videoUrl;
    } else {
        return null;
    }
}


    private function obtenerPeliculas($ruta){
        $this->cargarGeneros();

        $parametros = ['language' => 'es-ES', 'page' => 1];
        $respuesta = $this->hacerSolicitudApi('GET', $ruta, $parametros);

        foreach ($respuesta['results'] as &$pelicula) {
            $pelicula['backdrop_path'] = "https://image.tmdb.org/t/p/original" . $pelicula['backdrop_path'];
            $pelicula['poster_path'] = "https://image.tmdb.org/t/p/original" . $pelicula['poster_path'];
            $pelicula['release_date'] = date('Y', strtotime($pelicula['release_date']));
            $pelicula['genres'] = [];
                foreach ($pelicula['genre_ids'] as $genreId) {
                    if (isset($this->generosCache[$genreId])) {
                        $pelicula['genres'][] = $this->generosCache[$genreId];
                    }
                }
            $pelicula['vote_average'] = round($pelicula['vote_average'], 1);
        }

        return $respuesta['results'];
    }

    private function cargarGeneros()
    {
        $parametros = ['language' => 'es'];
        $respuesta = $this->hacerSolicitudApi('GET', $this->getRuta('genre/movie/list'), $parametros);
        $generosArray = $respuesta['genres'];
    
        foreach ($generosArray as $genero) {
            $this->generosCache[$genero['id']] = $genero['name'];
        }
    }
    

    
    public function obtenerPeliculasPorBusqueda($busqueda, $pagina)
    {
        $this->cargarGeneros();

        $parametros = [
            'language' => 'es-ES',
            'query' => $busqueda,
            'page' => $pagina
        ];
        $respuesta = $this->hacerSolicitudApi('GET', $this->getRuta('search/movie'), $parametros);

        foreach ($respuesta['results'] as &$pelicula) {
            $pelicula['backdrop_path'] = "https://image.tmdb.org/t/p/original" . $pelicula['backdrop_path'];
            $pelicula['poster_path'] = "https://image.tmdb.org/t/p/original" . $pelicula['poster_path'];
            $pelicula['release_date'] = date('Y', strtotime($pelicula['release_date']));
            $pelicula['genres'] = [];
                foreach ($pelicula['genre_ids'] as $genreId) {
                    if (isset($this->generosCache[$genreId])) {
                        $pelicula['genres'] = $this->generosCache[$genreId];
                    }
                }
            $pelicula['vote_average'] = round($pelicula['vote_average'], 1);
        }

        return $respuesta['results'];
    }

    public function obtenerPeliculasPorGenero($genero, $pagina)
    {
        $this->cargarGeneros();

        $parametros = [
            'language' => 'es-ES',
            'with_genres' => $genero,
            'page' => $pagina
        ];

        $respuesta = $this->hacerSolicitudApi('GET', $this->getRuta('discover/movie'), $parametros);

        foreach ($respuesta['results'] as &$pelicula) {
            $pelicula['backdrop_path'] = "https://image.tmdb.org/t/p/original" . $pelicula['backdrop_path'];
            $pelicula['poster_path'] = "https://image.tmdb.org/t/p/original" . $pelicula['poster_path'];
            $pelicula['release_date'] = date('Y', strtotime($pelicula['release_date']));
            $pelicula['genres'] = [];
                foreach ($pelicula['genre_ids'] as $genreId) {
                    if (isset($this->generosCache[$genreId])) {
                        $pelicula['genres'][] = $this->generosCache[$genreId];
                    }
                }
            $pelicula['vote_average'] = round($pelicula['vote_average'], 1);
        }

        return $respuesta['results'];
    }

    public function obtenerUltimasPublicadas($pagina) {
        
        $parametros = ['language' => 'es-ES', 'page' => $pagina];
        $respuesta = $this->hacerSolicitudApi('GET', $this->getRuta('movie/now_playing'), $parametros);

        $this->cargarGeneros();

        foreach ($respuesta['results'] as &$pelicula) {
            $pelicula['backdrop_path'] = "https://image.tmdb.org/t/p/original" . $pelicula['backdrop_path'];
            $pelicula['poster_path'] = "https://image.tmdb.org/t/p/original" . $pelicula['poster_path'];
            $pelicula['release_date'] = date('Y', strtotime($pelicula['release_date']));
            $pelicula['genres'] = [];
                foreach ($pelicula['genre_ids'] as $genreId) {
                    if (isset($this->generosCache[$genreId])) {
                        $pelicula['genres'][] = $this->generosCache[$genreId];
                    }
                }
            $pelicula['vote_average'] = round($pelicula['vote_average'], 1);
        }
        return $respuesta['results'];
    }
    
    
    private function getRuta($ruta)
    {
        return $this->urlBaseApi . $ruta;
    }

    private function hacerSolicitudApi($metodo, $ruta, $parametros = [])
    {
        $url = $ruta;
        $parametros['api_key'] = $this->claveApi;

        $cliente = new \GuzzleHttp\Client();

        try {
            $respuesta = $cliente->request($metodo, $url, ['query' => $parametros]);

            return json_decode($respuesta->getBody(), true);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            throw new Exception('Error al realizar la solicitud: ' . $e->getMessage());
        }
    }
}