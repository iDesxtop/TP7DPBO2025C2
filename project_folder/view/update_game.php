<?php
// Include necessary files
// Initialize genre object
$genre = new Genre();
$game = new Game();
$publisher = new Publisher();

$id = $_GET['id'];

// Get Genre data
$gameData = $game->getGameById($id);

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_game'])) {
    // Collect form data
    $nama = $_POST['nama_game'];
    $genre_id = $_POST['genre_id'];
    $publisher_id = $_POST['publisher_id'];
    $harga = $_POST['harga'];
    $tahun_rilis = $_POST['tahun_rilis'];
    $platform = $_POST['platform'];
    $deskripsi = $_POST['deskripsi'];
    
    // Update game
    $result = $game->updateGame($id, $nama, $genre_id, $publisher_id, $harga, $tahun_rilis, $platform, $deskripsi);
    
    if ($result) {
        // Redirect with success message
        header('Location: ?page=game');
        exit;
    } else {
        $error = "Gagal mengupdate data game";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Game</title>
</head>
<body>
    <h2>Update Game</h2>
    
    <form method="POST">
        <div class="form-group">
            <label for="nama_game">Nama Game:</label>
            <input type="text" id="nama_game" name="nama_game" value="<?= htmlspecialchars($gameData['nama_game']) ?>" required>
        </div>

        <div class="form-group">
            <label for="genre_id">Genre:</label>
            <select id="genre_id" name="genre_id" required>
                <?php foreach ($genre->getAllGenre() as $g): ?>
                    <option value="<?= $g['id'] ?>" <?= $g['id'] == $gameData['genre_id'] ? 'selected' : '' ?>><?= $g['nama_genre'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="publisher_id">Publisher:</label>
            <select id="publisher_id" name="publisher_id" required>
                <?php foreach ($publisher->getAllPublisher() as $p): ?>
                    <option value="<?= $p['id'] ?>" <?= $p['id'] == $gameData['publisher_id'] ? 'selected' : '' ?>><?= $p['nama_publisher'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="harga">Harga:</label>
            <input type="number" id="harga" name="harga" value="<?= htmlspecialchars($gameData['harga']) ?>" required>
        </div> 

        <div class="form-group">
            <label for="tahun_rilis">Tahun Rilis:</label>
            <input type="number" id="tahun_rilis" name="tahun_rilis" value="<?= htmlspecialchars($gameData['tahun_rilis']) ?>" required>
        </div>

        <div class="form-group">
            <label for="platform">Platform:</label>
            <input type="text" id="platform" name="platform" value="<?= htmlspecialchars($gameData['platform']) ?>" required>
        </div>  
        
        <div class="form-group">
            <label for="deskripsi">Deskripsi:</label>
            <input type="text" id="deskripsi " name="deskripsi" value="<?= htmlspecialchars($gameData['deskripsi_game']) ?>" required>
        </div>
        
        <div class="form-group">
            <button type="submit" name="update_game">Update Game</button>
            <a href="?page=game" style="margin-left: 10px; text-decoration: none;">Kembali</a>
        </div>
    </form>
</body>
</html>