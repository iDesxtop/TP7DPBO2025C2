<?php
require_once 'config/db.php';

class Game {
    private $db;

    public function __construct() {
        $this->db = (new Database())->conn;
    }

    public function getAllGame() {
        $stmt = $this->db->query("SELECT game.*, genre.nama_genre, publisher.nama_publisher 
                                FROM game 
                                LEFT JOIN genre ON game.genre_id = genre.id 
                                LEFT JOIN publisher ON game.publisher_id = publisher.id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getGameById($id) {
        $stmt = $this->db->prepare("SELECT game.*, genre.nama_genre, publisher.nama_publisher 
                                    FROM game 
                                    LEFT JOIN genre ON game.genre_id = genre.id 
                                    LEFT JOIN publisher ON game.publisher_id = publisher.id 
                                    WHERE game.id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function deleteGame($id) {
        $stmt = $this->db->prepare("DELETE FROM game 
                                    WHERE id = ?");
        $result = $stmt->execute([$id]);
        return $result;
    }
    public function updateGame($id, $nama, $genre_id, $publisher_id, $harga, $tahun_rilis, $platform, $deskripsi) {
        $stmt = $this->db->prepare("UPDATE game 
                                    SET nama_game = ?, genre_id = ?, publisher_id = ?, harga = ?, tahun_rilis = ?, platform = ?, deskripsi_game = ? 
                                    WHERE id = ?");
        $result = $stmt->execute([$nama, $genre_id, $publisher_id, $harga, $tahun_rilis, $platform, $deskripsi, $id]);
        return $result;
    }
    public function addGame($nama, $genre_id, $publisher_id, $harga, $tahun_rilis, $platform, $deskripsi){
        $stmt = $this->db->prepare("INSERT INTO game 
                                    VALUES ('', ?, ?, ?, ?, ?, ?, ?) ");
        $result = $stmt->execute([$nama, $genre_id, $publisher_id, $harga, $tahun_rilis, $platform, $deskripsi]);
        return $result;
    }

    public function searchGames($keyword) {
        $keyword = "%$keyword%"; // Untuk pencarian partial match
        $stmt = $this->db->prepare("SELECT game.*, genre.nama_genre, publisher.nama_publisher 
                                    FROM game 
                                    LEFT JOIN genre ON game.genre_id = genre.id 
                                    LEFT JOIN publisher ON game.publisher_id = publisher.id 
                                    WHERE game.nama_game LIKE ? OR game.deskripsi_game LIKE ?");
        $stmt->execute([$keyword, $keyword]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>