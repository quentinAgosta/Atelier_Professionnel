<?php
require_once "../app/models/NewsModel.php";

class NewsController {

    private $model;

    public function __construct() {
        $this->model = new NewsModel();
    }

    public function index() {
        return $this->model->getAll();
    }

    public function store() {
        $this->model->create(
            $_POST['title'],
            $_POST['article'],
            $_POST['by']
        );
    }

    public function delete() {
        $this->model->delete($_POST['id']);
    }
}