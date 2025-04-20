<?php
require_once 'config/db.php';

class Publisher {
    private $db;

    public function __construct() {
        $this->db = (new Database())->conn;
    }

    public function getAllPublisher() {
        $stmt = $this->db->query("SELECT * FROM publisher");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getPublisherById($id) {
        $stmt = $this->db->prepare("SELECT * FROM publisher WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function deletePublisher($id) {
        $stmt = $this->db->prepare("DELETE FROM publisher WHERE id = ?");
        $result = $stmt->execute([$id]);
        return $result;
    }
    public function updatePublisher($id, $nama, $tahun, $negara, $email) {
        $stmt = $this->db->prepare("UPDATE publisher SET nama_publisher = ?, tahun_berdiri = ?, negara_asal = ?, email_kontak = ? WHERE id = ?");
        $result = $stmt->execute([$nama, $tahun, $negara, $email, $id]);
        return $result;
    }
    public function addPublisher($nama, $tahun, $negara, $email) {
        $stmt = $this->db->prepare("INSERT INTO publisher VALUES ('', ?, ?, ?, ?) ");
        $result = $stmt->execute([$nama, $tahun, $negara, $email]);
        return $result;
    }

    public function searchPublisher($keyword) {
        $keyword = "%$keyword%"; // Untuk pencarian partial match
        $stmt = $this->db->prepare("SELECT *
                                    FROM publisher 
                                    WHERE nama_publisher LIKE ? OR negara_asal LIKE ?");
        $stmt->execute([$keyword, $keyword]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>