<?php
// Include necessary files
// Initialize genre object
$genre = new Genre();

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_genre'])) {
    // Collect form data
    $nama = $_POST['nama_genre'];
    $deskripsi = $_POST['deskripsi'];
    
    // Add Genre
    $result = $genre->addGenre( $nama, $deskripsi);
    
    if ($result) {
        // Redirect with success message
        header('Location: ?page=genre');
        exit;
    } else {
        $error = "Gagal add data Genre";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Genre</title>
</head>
<body>
    <h2>Add Genre</h2>
    
    <form method="POST">
        <div class="form-group">
            <label for="nama_genre">Nama Genre:</label>
            <input type="text" id="nama_genre" name="nama_genre" required>
        </div>
        
        <div class="form-group">
            <label for="deskripsi">Deskripsi:</label>
            <input type="text" id="deskripsiun " name="deskripsi" required>
        </div>
        
        <div class="form-group">
            <button type="submit" name="add_genre">Add Genre</button>
            <a href="?page=genre" style="margin-left: 10px; text-decoration: none;">Kembali</a>
        </div>
    </form>
</body>
</html>