<?php
require_once "../config/Database.php";

class NewsModel {

    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function getAll() {
        return $this->db->query("SELECT * FROM News ORDER BY new_id DESC")->fetchAll();
    }

    public function create($title, $article, $by) {
        $stmt = $this->db->prepare(
            "INSERT INTO News (new_title, new_article, new_date, new_by)
             VALUES (?, ?, GETDATE(), ?)"
        );
        return $stmt->execute([$title, $article, $by]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM News WHERE new_id = ?");
        return $stmt->execute([$id]);
    }
}