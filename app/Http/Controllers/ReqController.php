<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReqController extends Controller
{
    public function index() {
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
            $curl_response = curl_exec($ch);
            curl_close($ch);
            $resposta = json_decode($curl_response);

            if (isset($resposta->message) && $resposta->message == 'Not Found') {
                $resposta = null;
            }

        } else {
            $resposta = '';
        }

        return view('welcome',['user' => $resposta, 'search' => $search]);
    }
}
