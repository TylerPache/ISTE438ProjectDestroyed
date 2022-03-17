<?php

namespace App\Controllers;
//require 'vendor/autoload.php';
use MongoDB;
use MongoDB\Driver\Manager;
use MongoDB\Driver\ServerApi;

class Mongo extends BaseController
{

    public function index()
    {
        return view('test');
    }
    public function connect(){
//        $response = file_get_contents('https://data.mongodb-api.com/app/data-gpuzw/endpoint/data/beta/find');
//        $response = json_decode($response);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_URL, 'https://data.mongodb-api.com/app/data-gpuzw/endpoint/data/beta/action/findOne');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, '{"collection":"ParkData","database":"NYParkData","dataSource":"Project"}');

        $headers = array();
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Access-Control-Request-Headers: *';
        $headers[] = 'Api-Key: pCRSCtR3SGFORyBuPVxyU7eHWLOKZclGLxKlzoQ0klEfkd5ObFL5XtcJB5Avai0M';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }

        $resp = curl_exec($ch);

        $data = [
            "title" => 'testing',
            "info" => $resp
        ];
        curl_close($ch);
        return view("testFind", $data);
    }

}