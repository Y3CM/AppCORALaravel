<?php
require '../vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client();
try {
    $response = $client->request('GET', 'https://www.google.com');
    echo $response->getStatusCode(); // 200
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
