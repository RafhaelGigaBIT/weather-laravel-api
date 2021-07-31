<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function byCity(Request $request)
    {
        $response = Http::get("https://api.openweathermap.org/data/2.5/weather", [
            'q' => $request->city,
            'appid' => '316ad68ed146d85f032f168b1fa32e68'
        ]);
        return response($response, 200)->header('Content-Type', 'application/json');
    }

    public function byZipCode(Request $request)
    {
        $response = Http::get("https://api.openweathermap.org/data/2.5/weather", [
            'q' => "$request->zipCode, $request->country",
            'appid' => '316ad68ed146d85f032f168b1fa32e68'
        ]);
        return response($response, 200)->header('Content-Type', 'application/json');
    }
}
