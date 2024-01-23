<?php

class Model {

    public function __construct() {
        logMessage(__CLASS__, __METHOD__);
    }

    public function queryApi($url, $method = 'GET', $headers = [], $data = []) {
        $client = new \GuzzleHttp\Client();

        try {
            $options = ['headers' => $headers];

            if ($method === 'POST') {
                $options['json'] = $data;
            }

            $response = $client->request($method, $url, $options);

            return json_decode($response->getBody(), true);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            return [];
        }
    }
}

?>