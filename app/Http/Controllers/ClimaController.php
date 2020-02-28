<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Curl;

class ClimaController extends Controller
{
    public function verClima() {
        $data = Curl::to('https://www.metaweather.com/api/location/468739/')->get();
        dd(json_decode($data, true));
    }
}
