<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class FetchModel extends Model
{
    protected $table            = 'jenis_kendaraan_table';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['jenis_kendaraan'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';


    public function getToken()
    {
        $client = service('curlrequest');


        $usersname_api = 'dalops-dishub';
        $password_api = 'L4ncarJKT';

        $credential = $usersname_api . ":" .  $password_api;

        $base_64 = base64_encode($credential);

        $url = "https://pesankir.jakarta.go.id/apis_vendor/v2/getTknKirDishub";
        $headers = [
            'Authorization' => 'Basic ' . $base_64
        ];

        try {
            $response = $client->request('POST', $url, ["headers" => $headers, 'http_errors' => false]);

            $body = $response->getBody();

            $token = json_decode($body, true);

            return $token;
        } catch (\CodeIgniter\HTTP\Exceptions\HTTPException $e) {
            // Handle HTTP errors (e.g., 401 Unauthorized, 404 Not Found)
            return $this->response->setStatusCode($e->getCode())->setBody($e->getMessage());
        } catch (\Exception $e) {
            // Handle other general exceptions
            return $this->response->setStatusCode(500)->setBody('An error occurred: ' . $e->getMessage());
        }
    }

    public function FetchModel($nomor)
    {
        // Instantiate the CURLRequest service
        $client = service('curlrequest');

        // $nomor = 'B2992TV';
        // Define your API endpoint
        $url = "https://pesankir.jakarta.go.id/apis_vendor/v2/dishub/cekK1R?noujis=$nomor";
        $headers_data = [
            'x-access-token' => session()->get('csrf')
        ];

        try {
            // Send a GET request with Basic Authorization
            $response = $client->request(
                'GET',
                $url,
                [
                    "headers" => $headers_data,
                    'http_errors' => false
                ]
            );
            // Get the response body
            $body = $response->getBody();
            // Process the data (e.g., decode JSON)
            $kendaraan = json_decode($body, true);

            return $kendaraan;
        } catch (\CodeIgniter\HTTP\Exceptions\HTTPException $e) {
            // Handle HTTP errors (e.g., 401 Unauthorized, 404 Not Found)
            return $this->response->setStatusCode($e->getCode())->setBody($e->getMessage());
        } catch (\Exception $e) {
            // Handle other general exceptions
            return $this->response->setStatusCode(500)->setBody('An error occurred: ' . $e->getMessage());
        }
    }

    public function FetchModelNoUji($nouji)
    {
        // Instantiate the CURLRequest service
        $client = service('curlrequest');

        // $nomor = 'B2992TV';
        // Define your API endpoint
        $url = "https://pesankir.jakarta.go.id/apis_vendor/v2/dishub/cekK1R?noujis=$nouji";
        $headers_data = [
            'x-access-token' => session()->get('csrf')
        ];

        try {
            // Send a GET request with Basic Authorization
            $response = $client->request(
                'GET',
                $url,
                [
                    "headers" => $headers_data,
                    'http_errors' => false
                ]
            );
            // Get the response body
            $body = $response->getBody();
            // Process the data (e.g., decode JSON)
            $kendaraan = json_decode($body, true);

            return $kendaraan;
        } catch (\CodeIgniter\HTTP\Exceptions\HTTPException $e) {
            // Handle HTTP errors (e.g., 401 Unauthorized, 404 Not Found)
            return $this->response->setStatusCode($e->getCode())->setBody($e->getMessage());
        } catch (\Exception $e) {
            // Handle other general exceptions
            return $this->response->setStatusCode(500)->setBody('An error occurred: ' . $e->getMessage());
        }
    }
}
