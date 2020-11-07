<?php

namespace App\src\services;

use Exception;

use App\src\DAO;

class CmcApiService
{

    public function APICall ()
    {
        try
        {
            $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest';
            $parameters = [
            'start' => '1',
            'limit' => '25',
            'sort' => 'market_cap',
            'sort_dir' => 'desc',
            'convert' => 'EUR'
            ];
            $headers = [
            'Accepts: application/json',
            'X-CMC_PRO_API_KEY: 7e6f7524-6f77-49b4-b9e2-3d28d9c4603a'
            ];
            $query_string = http_build_query($parameters); // query string encode the parameters
            $request = "{$url}?{$query_string}"; // create the request URL
    
            $curl = curl_init(); // Get cURL resource
            // Set cURL options
            curl_setopt_array($curl, array(
            CURLOPT_URL => $request,            // set the request URL
            CURLOPT_HTTPHEADER => $headers,     // set the headers 
            CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
            ));
    
            $response = curl_exec($curl); // Send the request, save the response
            curl_close($curl); // Close request
            $json = json_decode($response);
            return $json->data;
        }
        catch (Exception $e)
        {
            echo 'La connection à l\'API à échoué';
        }
    }

}