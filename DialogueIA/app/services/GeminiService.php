<?php

class GeminiService {

    private $apiKey = "";
    private $model = "gemini-3-flash-preview";

    public function sendMessage($message) {

        $url = "https://generativelanguage.googleapis.com/v1beta/models/"
            . $this->model . ":generateContent?key=" . $this->apiKey;

        $data = [
            "contents" => [
                [
                    "parts" => [
                        ["text" => $message]
                    ]
                ]
            ]
        ];

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);
        curl_close($ch);

        $result = json_decode($response, true);

        return $result['candidates'][0]['content']['parts'][0]['text'] ?? "Erreur IA";
    }
}