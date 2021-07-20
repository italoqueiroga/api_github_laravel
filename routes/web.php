<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $search = request('busca');

    if($search) {
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => "https://api.github.com/users/" . $search,
            CURLOPT_HTTPHEADER  => [
                "Accept: application/vnd.github.v3+json",
                "Content-Type: text/plain",
                "User-Agent: mfmfneko"
            ],
            CURLOPT_RETURNTRANSFER => true,
        ]);
        $response = curl_exec($ch);
        curl_close($ch);
        $resposta = json_decode($response);

        if (isset($resposta->message) && $resposta->message == 'Not Found') {
            $resposta = null;
        }

    } else {
        $resposta = '';
    }

    return view('welcome',['user' => $resposta, 'search' => $search]);
});
