<?php
require_once 'config/app.php';
loadEnv();

class CustomSearchApi {

    private $api_key;
    private $search_engine_id;

    public function __construct() {
        $this->api_key = $_ENV['API_KEY'];
        $this->search_engine_id = $_ENV['ENGINE_ID'];
    }

    public function getSearchResults($search_term) {
        $url = "https://www.googleapis.com/customsearch/v1?key={$this->api_key}&cx={$this->search_engine_id}&q={$search_term}";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);

        $results = json_decode($response);

        return $results;
    }
}
?>






