<?php

require_once 'api/CustomSearchApi.php';

$search_term = $_GET['keyword'];
if (empty($search_term)) {
    $result = '検索キーワードを入力してください';
} else {
    $custom_search_api = new CustomSearchApi();

    $results = $custom_search_api->getSearchResults($search_term);
}

require 'views/SearchResult.php';
?>