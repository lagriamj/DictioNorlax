<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DictionaryController extends Controller
{
    private function getAPI($term)
    {

        $result1 = $result2 = $result3 = '';
        if (isset($term)) {

            $curl = curl_init();

            curl_setopt_array(
                $curl,
                [
                    CURLOPT_URL => "https://api.wordnik.com/v4/word.json/" . $term . "/definitions?limit=200&includeRelated=false&useCanonical=false&includeTags=false&api_key=phvx7g6v7fx7q8iv9bs5ou9ygvr97e6jbpab7u90c0gyr3j77",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_HTTPHEADER => array(
                        'Accept: application/json'
                    )
                ]
            );
            $response = curl_exec($curl);
            curl_close($curl);
            $jsondata = json_decode($response, true);
            $result1 = (strip_tags($jsondata[1]['text']));
            $result2 = (strip_tags($jsondata[2]['text']));
            $result3 = (strip_tags($jsondata[3]['text']));
        }

        $curl1 = curl_init();
        curl_setopt_array(
            $curl1,
            [
                CURLOPT_URL =>  "https://api.wordnik.com/v4/words.json/wordOfTheDay?api_key=phvx7g6v7fx7q8iv9bs5ou9ygvr97e6jbpab7u90c0gyr3j77",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    'Accept: application/json'
                )
            ]
        );
        $wordoftheday = curl_exec($curl1);
        curl_close($curl1);

        $curl2 = curl_init();

        curl_setopt_array($curl2, [
            CURLOPT_URL => "https://random-words-with-pronunciation.p.rapidapi.com/word",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "x-rapidapi-host: random-words-with-pronunciation.p.rapidapi.com",
                "x-rapidapi-key: 52623433eemshb9a3b9e53365e0fp1a3e67jsn34168127902f"
            ],
        ]);

        $vocabulary1 = curl_exec($curl2);
        $vocabulary2 = curl_exec($curl2);
        $vocabulary3 = curl_exec($curl2);
        curl_close($curl2);

        return [
            'wordoftheday' => json_decode($wordoftheday, true),
            'vocabulary1' => json_decode($vocabulary1, true),
            'vocabulary2' => json_decode($vocabulary2, true),
            'vocabulary3' => json_decode($vocabulary3, true),
            'meaning1' => $result1,
            'meaning2' => $result2,
            'meaning3' => $result3
        ];
    }

    public function index(Request $request)
    {
        $term = $request->input('term');

        $data = $this->getAPI($term);

        return view('index')
            ->with('wordofthedayArray', $data['wordoftheday'])
            ->with('vocabulary1Array', $data['vocabulary1'])
            ->with('vocabulary2Array', $data['vocabulary2'])
            ->with('vocabulary3Array', $data['vocabulary3']);
    }

    public function search(Request $request)
    {

        $term = $request->term;

        $data = $this->getAPI($term);

        return view('index', ['term' => $term, 'result1' => $data['meaning1'], 'result2' => $data['meaning2'], 'result3' => $data['meaning3']])
            ->with('wordofthedayArray', $data['wordoftheday'])
            ->with('vocabulary1Array', $data['vocabulary1'])
            ->with('vocabulary2Array', $data['vocabulary2'])
            ->with('vocabulary3Array', $data['vocabulary3']);
    }

    public function formSubmit(Request $request)
    {
        $term = $request->input('term');

        return redirect()->route('search', ['term' => strtolower($term)]);
    }
}
