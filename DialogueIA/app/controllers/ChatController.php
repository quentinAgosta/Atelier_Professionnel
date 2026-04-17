<?php
require_once "../app/services/GeminiService.php";

class ChatController {

    private $gemini;

    public function __construct() {
        $this->gemini = new GeminiService();
    }

    public function send() {
        $message = $_POST['message'] ?? '';
        return $this->gemini->sendMessage($message);
    }
}