<?php
require_once 'config/db.php';

class Genre {
    private $db;

    public function __construct() {
        $this->db = (new Database())->conn;
    }

    public function getAllGenre() {
        $stmt = $this->db->query("SELECT * FROM genre");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getGenreById($id) {
        $stmt = $this->db->prepare("SELECT * FROM genre WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function deleteGenre($id) {
        $stmt = $this->db->prepare("DELETE FROM genre WHERE id = ?");
        $result = $stmt->execute([$id]);
        return $result;
    }
    public function updateGenre($id, $nama, $deskripsi) {
        $stmt = $this->db->prepare("UPDATE genre SET nama_genre = ?, deskripsi = ? WHERE id = ?");
        $result = $stmt->execute([$nama, $deskripsi, $id]);
        return $result;
    }
    public function addGenre($nama, $deskripsi){
        $stmt = $this->db->prepare("INSERT INTO genre VALUES ('', ?, ?) ");
        $result = $stmt->execute([$nama, $deskripsi]);
        return $result;
    }
    public function searchGenre($keyword) {
        $keyword = "%$keyword%"; // Untuk pencarian partial match
        $stmt = $this->db->prepare("SELECT *
                                    FROM genre 
                                    WHERE nama_genre LIKE ? OR deskripsi LIKE ?");
        $stmt->execute([$keyword, $keyword]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>