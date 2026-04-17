<?php

require_once "../config/Database.php";
require_once "../app/controllers/ChatController.php";
require_once "../app/controllers/NewsController.php";

$chatController = new ChatController();
$newsController = new NewsController();

$newsList = $newsController->index();

include "../app/views/layout.php";

$action = $_GET['action'] ?? null;

if ($action === "create") {
    $newsController->store();
    header("Location: index.php");
    exit;
}

if ($action === "delete") {
    $newsController->delete();
    header("Location: index.php");
    exit;
}