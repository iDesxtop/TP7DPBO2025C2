<?php
// Include necessary files
// Initialize genre object
$genre = new Genre();

$id = $_GET['id'];

// Get Genre data
$genreData = $genre->getGenreById($id);

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_genre'])) {
    // Collect form data
    $nama = $_POST['nama_genre'];
    $deskripsi = $_POST['deskripsi'];
    
    // Update Genre
    $result = $genre->updateGenre($id, $nama, $deskripsi);
    
    if ($result) {
        // Redirect with success message
        header('Location: ?page=genre');
        exit;
    } else {
        $error = "Gagal mengupdate data Genre";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Genre</title>
</head>
<body>
    <h2>Update Genre</h2>
    
    <form method="POST">
        <div class="form-group">
            <label for="nama_genre">Nama Genre:</label>
            <input type="text" id="nama_genre" name="nama_genre" value="<?= htmlspecialchars($genreData['nama_genre']) ?>" required>
        </div>
        
        <div class="form-group">
            <label for="deskripsi">Deskripsi:</label>
            <input type="text" id="deskripsiun " name="deskripsi" value="<?= htmlspecialchars($genreData['deskripsi']) ?>" required>
        </div>
        
        <div class="form-group">
            <button type="submit" name="update_genre">Update Genre</button>
            <a href="?page=genre" style="margin-left: 10px; text-decoration: none;">Kembali</a>
        </div>
    </form>
</body>
</html>