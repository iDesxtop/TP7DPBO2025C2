<?php 
$publisher = new Publisher();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_publisher'])) {
    // Collect form data
    $nama = $_POST['nama_publisher'];
    $tahun = $_POST['tahun_berdiri'];
    $negara = $_POST['negara_asal'];
    $email = $_POST['email_kontak'];
    
    // Update publisher
    $result = $publisher->addPublisher($nama, $tahun, $negara, $email);
    
    if ($result) {
        // Redirect with success message
        header('Location: ?page=publisher');
        exit;
    } else {
        $error = "Gagal mengupdate data publisher";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Publisher</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Add Publisher</h2>
    
    <form method="POST">
        <div class="form-group">
            <label for="nama_publisher">Nama Publisher:</label>
            <input type="text" id="nama_publisher" name="nama_publisher" required>
        </div>
        <div class="form-group">
            <label for="tahun_berdiri">Tahun Berdiri:</label>
            <input type="number" id="tahun_berdiri" name="tahun_berdiri" required>
        </div>
        <div class="form-group">
            <label for="negara_asal">Negara Asal:</label>
            <input type="text" id="negara_asal" name="negara_asal" required>
        </div>
        <div class="form-group">
            <label for="email_kontak">Email Kontak:</label>
            <input type="email" id="email_kontak" name="email_kontak" required>
        </div>
        <div class="form-group">
            <button type="submit" name="add_publisher">Add Publisher</button>
            <a href="?page=publisher" style="margin-left: 10px; text-decoration: none;">Kembali</a>
        </div>
    </form>

